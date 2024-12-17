<?php

namespace Drupal\project_browser\Element;

use Drupal\Component\Utility\DeprecationHelper;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\Attribute\RenderElement;
use Drupal\Core\Render\Element;
use Drupal\Core\Render\Element\ElementInterface;
use Drupal\Core\Render\Element\RenderElementBase;
use Drupal\project_browser\DevelopmentStatus;
use Drupal\project_browser\EnabledSourceHandler;
use Drupal\project_browser\InstallReadiness;
use Drupal\project_browser\MaintenanceStatus;
use Drupal\project_browser\Plugin\ProjectBrowserSourceInterface;
use Drupal\project_browser\SecurityStatus;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a render element for the Project Browser.
 *
 * @RenderElement("project_browser")
 */
#[RenderElement('project_browser')]
final class ProjectBrowser implements ElementInterface, ContainerFactoryPluginInterface {

  use DependencySerializationTrait;

  public function __construct(
    private readonly string $pluginId,
    private readonly mixed $pluginDefinition,
    private readonly EnabledSourceHandler $enabledSourceHandler,
    private readonly ?InstallReadiness $installReadiness,
    private readonly ModuleHandlerInterface $moduleHandler,
    private readonly ConfigFactoryInterface $configFactory,
  ) {}

  /**
   * {@inheritdoc}
   */
  public function getPluginId(): string {
    return $this->pluginId;
  }

  /**
   * {@inheritdoc}
   */
  public function getPluginDefinition(): mixed {
    return $this->pluginDefinition;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): static {
    return new static(
      $plugin_id,
      $plugin_definition,
      $container->get(EnabledSourceHandler::class),
      $container->get(InstallReadiness::class, ContainerInterface::NULL_ON_INVALID_REFERENCE),
      $container->get(ModuleHandlerInterface::class),
      $container->get(ConfigFactoryInterface::class),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getInfo(): array {
    return [
      '#theme' => 'project_browser_main_app',
      '#attached' => [
        'library' => [
          'project_browser/svelte',
        ],
        'drupalSettings' => [
          'project_browser' => [],
        ],
      ],
      '#pre_render' => [
        [$this, 'attachProjectBrowserSettings'],
      ],
    ];
  }

  /**
   * Prepares a render element for Project Browser.
   *
   * @param array $element
   *   A render element array.
   *
   * @return array
   *   The render element array.
   */
  public function attachProjectBrowserSettings(array $element): array {
    $element['#attached']['drupalSettings']['project_browser'] = $this->getDrupalSettings(
      $element['#source'] ?? NULL,
      $element['#id'] ?? NULL
    );
    return $element;
  }

  /**
   * Gets the Drupal settings for the Project Browser.
   *
   * @param string|null $source
   *   If viewing a specific project, the ID of its source plugin.
   * @param string|null $id
   *   If viewing a specific project, the project's local ID (as known to the
   *   source plugin).
   *
   * @return array
   *   An array of Drupal settings.
   */
  private function getDrupalSettings(?string $source, ?string $id): array {
    $current_sources = $this->enabledSourceHandler->getCurrentSources();
    if ($source) {
      $current_sources = [
        $source => $current_sources[$source],
      ];
    }

    $package_manager = [
      'available' => (bool) $this->configFactory->get('project_browser.admin_settings')->get('allow_ui_install'),
      'errors' => [],
      'warnings' => [],
      'status_checked' => FALSE,
    ];
    if (empty($source) || empty($id)) {
      if ($package_manager['available']) {
        $package_manager = array_merge($package_manager, $this->installReadiness->validatePackageManager());
        $package_manager['status_checked'] = TRUE;
      }
    }

    return [
      'active_plugins' => array_map(
        fn (ProjectBrowserSourceInterface $source) => $source->getPluginDefinition()['label'],
        $current_sources,
      ),
      'module_path' => $this->moduleHandler->getModule('project_browser')->getPath(),
      'special_ids' => $this->getSpecialIds(),
      'sort_options' => array_map(
        fn (ProjectBrowserSourceInterface $source) => array_values($source->getSortOptions()),
        $current_sources,
      ),
      'maintenance_options' => MaintenanceStatus::asOptions(),
      'security_options' => SecurityStatus::asOptions(),
      'development_options' => DevelopmentStatus::asOptions(),
      'default_plugin_id' => reset($current_sources)->getPluginId(),
      'current_sources_keys' => array_keys($current_sources),
      'package_manager' => $package_manager,
      'filters' => array_map(
        fn (ProjectBrowserSourceInterface $source) => $source->getFilterDefinitions(),
        $current_sources,
      ),
    ];
  }

  /**
   * Return special IDs for some vocabularies.
   *
   * @return array
   *   List of special IDs per vocabulary.
   */
  private static function getSpecialIds(): array {
    $maintained = MaintenanceStatus::Maintained;
    $covered = SecurityStatus::Covered;
    return [
      'maintenance_status' => [
        'id' => $maintained->value,
        'name' => $maintained->label(),
      ],
      'security_coverage' => [
        'id' => $covered->value,
        'name' => $covered->label(),
      ],
      'all_values' => MaintenanceStatus::All->value,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function setAttributes(&$element, $class = []): void {
    DeprecationHelper::backwardsCompatibleCall(
      \Drupal::VERSION,
      '10.3',
      static fn () => RenderElementBase::setAttributes($element, $class),
      static fn () => Element::setAttributes($element, $class)
    );
  }

}
