<?php

namespace Drupal\highlightjs_input_filter\Plugin\Filter;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a filter to attach assets for <code> tags.
 *
 * @Filter(
 *   id = "filter_highlightjs",
 *   title = @Translation("Highlight code using highlight.js"),
 *   description = @Translation("Highlights code inside <code>&lt;pre&gt;&lt;code class='language-*'&gt;</code> tags."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE
 * )
 */
class HighlightJs extends FilterBase implements ContainerFactoryPluginInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected ConfigFactoryInterface $configFactory;

  /**
   * Constructs a new HighlightJs filter.
   *
   * @param array $configuration
   *   Configuration.
   * @param string $plugin_id
   *   Plugin ID.
   * @param mixed $plugin_definition
   *   Definition.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Config factory.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $configFactory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): static {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $config = $this->configFactory->get('highlightjs_input_filter.settings');
    $enable_copy_button = $config->get('enable_copy_button');
    $result = new FilterProcessResult($text);
    $result->addCacheableDependency($config);

    // Regex approximates the className regex in highlight.js itself,
    // also matching the containing `<pre><code>` tags.
    // Using a DOM parser as highlight.js does would probably be cleaner.
    $pattern = '/<pre>\s*<code\s+class="\s*(?:[\w-]+\s+)?\b[\w-]*lang(?:uage)?-([\w-]+)\b/i';

    // If no matches are found, return early.
    if (!preg_match_all($pattern, $result, $matches)) {
      return $result;
    }

    // If matches are found, process.
    foreach ($matches[1] as $language) {
      // Create a uniquely keyed array of languages so the
      // BubbleableMetadata->mergeAttachments() method can properly
      // merge the drupalSettings when adding attachments.
      $languages[$language] = $this->resolveAlias($language);
    }

    // Add needed JS.
    $result->addAttachments([
      'library' => [
        'highlightjs_input_filter/highlightjs',
        'highlightjs_input_filter/highlightjs_input_filter.styles',
      ],
      'drupalSettings' => [
        'enableCopyButton' => $enable_copy_button,
        'highlightJsLanguages' => $languages,
      ],
    ]);

    // Add copy button styles.
    if (isset($enable_copy_button) && $enable_copy_button === TRUE) {
      $result->addAttachments([
        'library' => [
          'highlightjs_input_filter/highlightjs-copy.styles',
        ],
      ]);
    }

    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function tips($long = FALSE) {
    return $this->t('Add assets for code tags');
  }

  /**
   * Resolves the language declared in CSS to its highlight.js alias.
   *
   * @param string $language_id
   *   The language ID as declared via a CSS class.
   * @return string
   *   The language alias of the highlight.js file to import.
   */
  protected function resolveAlias(string $language_id): string {
    $aliases_list = [
      'csharp' => [
        'cs',
      ],
      'javascript' => [
        'js',
        'jsx',
      ],
      'xml' => [
        'html',
        'xhtml',
        'rss',
        'atom',
        'xjb',
        'xsd',
        'xsl',
        'plist',
        'svg',
      ],
    ];

    foreach($aliases_list as $language => $aliases) {
      if (in_array($language_id, $aliases)) {
        $language_id = $language;
        break;
      }
    }

    return $language_id;
  }

}
