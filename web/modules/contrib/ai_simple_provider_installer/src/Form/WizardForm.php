<?php

namespace Drupal\ai_simple_provider_installer\Form;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ExtensionDiscovery;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ModuleInstallerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\ai\AiProviderPluginManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure simple providers.
 */
class WizardForm extends FormBase {

  /**
   * Constructs a new OpenAIConfigForm object.
   */
  final public function __construct(
    protected AiProviderPluginManager $aiProviderPluginManager,
    protected ModuleHandlerInterface $moduleHandler,
    protected ModuleInstallerInterface $moduleInstaller,
    protected EntityTypeManagerInterface $entityTypeManager,
  ) {
  }

  /**
   * {@inheritdoc}
   */
  final public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ai.provider'),
      $container->get('module_handler'),
      $container->get('module_installer'),
      $container->get('entity_type.manager'),
    );
  }

  /**
   * The list of possible modules.
   *
   * @var array
   */
  protected $modules = [
    'ai_provider_anthropic' => [
      'module_name' => 'ai_provider_anthropic',
      'module_title' => 'Anthropic (Claude)',
      'link' => 'https://console.anthropic.com/settings/keys',
      'config' => 'ai_provider_anthropic.settings',
      'key' => 'api_key',
      'provider_name' => 'anthropic',
      'test_model' => 'claude-3-5-sonnet-20240620',
      'defaults' => [
        'chat' => 'claude-3-5-sonnet-20240620',
        'chat_with_image_vision' => 'claude-3-5-sonnet-20240620',
        'chat_with_complex_json' => 'claude-3-5-sonnet-20240620',
      ],
    ],
    'fireworksai' => [
      'module_name' => 'fireworksai',
      'module_title' => 'Fireworks AI',
      'link' => 'https://fireworks.ai/account/api-keys',
      'config' => 'fireworksai.settings',
      'key' => 'api_key',
      'provider_name' => 'fireworks',
      'test_model' => 'accounts/fireworks/models/llama-v3p2-3b-instruct',
      'defaults' => [
        'chat' => 'accounts/fireworks/models/llama-v3p2-3b-instruct',
        'chat_with_image_vision' => 'accounts/fireworks/models/llama-v3p2-90b-vision-instruct',
        'chat_with_complex_json' => 'accounts/fireworks/models/llama-v3p1-405b-instruct',
        'text_to_image' => 'flux-1-dev-fp8',
        'embeddings' => 'thenlper/gte-large',
        'speech_to_text' => 'whisper-v3',
      ],
    ],
    'ai_provider_openai' => [
      'module_name' => 'ai_provider_openai',
      'module_title' => 'OpenAI (ChatGPT)',
      'link' => 'https://platform.openai.com/api-keys',
      'config' => 'ai_provider_openai.settings',
      'key' => 'api_key',
      'provider_name' => 'openai',
      'test_model' => 'gpt-3.5-turbo',
      'defaults' => [
        'chat' => 'gpt-4o',
        'chat_with_image_vision' => 'gpt-4o',
        'chat_with_complex_json' => 'gpt-4o',
        'text_to_image' => 'dall-e-3',
        'embeddings' => 'text-embedding-3-small',
        'text_to_speech' => 'tts-1-hd',
        'speech_to_text' => 'whisper-1',
      ],
    ],
  ];

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ai_simple_provider_installer_wizard_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // If a provider is already set for chat, then we don't need to do anything.
    $providers = $this->aiProviderPluginManager->getDefaultProviderForOperationType('chat');
    if (!empty($providers)) {
      $form['already_set'] = [
        '#markup' => $this->t('You already have setup AI. If you want to change it, you can choose default models in the <a href=":link">AI Settings</a> or setup new providers in the <a href=":provider_link">provider pages</a>.', [
          ':link' => Url::fromRoute('ai.settings_form')->toString(),
          ':provider_link' => Url::fromRoute('ai.admin_providers')->toString(),
        ]),
      ];
      return $form;
    }

    $downloaded = [];
    $discovery = new ExtensionDiscovery(\Drupal::root());
    $available_modules = $discovery->scan('module');
    // First check that any provider is downloaded.
    foreach ($this->modules as $module => $info) {
      // Check if its downloaded, it doesn't have to be enabled.
      if (isset($available_modules[$info['module_name']])) {
        $downloaded[$info['module_name']] = $info['module_title'];
      }
    }

    if (empty($downloaded)) {
      $markup = $this->t('<p>To be able to use the AI module you need to first download a so-called AI provider that will give you access to do AI calls on your Drupal site.</p>');
      $markup .= $this->t('<p>Below you will find a list of available providers that you can download. Once you have downloaded a provider you can set it up it here and start using it.</p>');
      $markup .= '<ul>';
      foreach ($this->modules as $module) {
        $markup .= '<li><a href="https://www.drupal.org/project/' . $module['module_name'] . '" target="_blank">' . $module['module_title'] . '</a></li>';
      }
      $markup .= '</ul>';
      if ($this->moduleHandler->moduleExists('project_browser')) {
        $markup .= $this->t('<p>Since you have Project Browser installed, you can also download one of them by searching in <a href="/admin/modules/browse?destination=:link" title="Visit the Module Browser page on your site for assistance with modules">the Module Browsers page</a> for your site.</p>', [
          ':link' => Url::fromRoute('project_browser.browse')->toString(),
        ]);
      }
      $form['no_modules'] = [
        '#markup' => $markup,
      ];
      return $form;
    }

    // Otherwise that is the choice.
    $form['provider'] = [
      '#type' => 'select',
      '#title' => $this->t('Select AI Provider'),
      '#description' => $this->t('The AI Provider is the service that you want to use to do AI calls on your Drupal site.'),
      '#options' => $downloaded,
      '#required' => TRUE,
      '#empty_option' => $this->t('- Select -'),
      // Set default if only one.
      '#default_value' => count($downloaded) === 1 ? key($downloaded) : NULL,
      '#ajax' => [
        'callback' => '::updateApiKeyDescription',
        'wrapper' => 'provider-ajax-wrapper',
      ],
      '#limit_validation_errors' => [],
    ];

    // The API Key to add.
    $form['api_key'] = [
      '#type' => 'password',
      '#required' => TRUE,
      '#prefix' => '<div id="provider-ajax-wrapper">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          ':input[name="provider"]' => ['!value' => ''],
        ],
      ],
      '#maxlength' => 255,
      '#attributes' => [
        'maxlength' => 255,
      ],
      '#limit_validation_errors' => [],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Setup AI'),
      '#states' => [
        'visible' => [
          ':input[name="provider"]' => ['!value' => ''],
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $provider = $this->modules[$form_state->getValue('provider')];
    // Install the module if it is not installed.
    if (!$this->moduleHandler->moduleExists($form_state->getValue('provider'))) {
      $this->moduleInstaller->install([$form_state->getValue('provider')]);
    }
    // Create a key.
    $key = $this->createKey($form_state->getValue('provider'), $form_state->getValue('api_key'));
    // Set that key on the config.
    $config = $this->configFactory()->getEditable($provider['config']);
    $config->set($provider['key'], $key->id());
    $this->messenger()->addMessage($this->t('The AI has been setup with :provider.', [
      ':provider' => $provider['module_title'],
    ]));

    // Set the default models.
    foreach ($provider['defaults'] as $operation => $model) {
      $this->aiProviderPluginManager->defaultIfNone($operation, $provider['provider_name'], $model);
    }
    $installer_config = $this->configFactory()->get('ai_simple_provider_installer.settings');
    $deletions = $installer_config->get('content_removal');
    // Delete on UUID where available.
    if (!empty($deletions)) {
      foreach ($deletions as $entity) {
        $parts = explode(':', $entity);
        if (count($parts) === 2) {
          $entity_type = $parts[0];
          $uuid = $parts[1];
          $entities = $this->entityTypeManager->getStorage($entity_type)->loadByProperties(['uuid' => $uuid]);
          if (!empty($entities)) {
            $entity = reset($entities);
            $entity->delete();
          }
        }
      }
    }
    $route = $installer_config->get('redirect_route');
    if ($route) {
      $form_state->setRedirect($route);
    }
    $config->save();
  }

  /**
   * Ajax callback to update the description of the API key.
   */
  public function updateApiKeyDescription(array &$form, FormStateInterface $form_state) {
    $provider = $form_state->getValue('provider');
    $form['api_key']['#title'] = $this->modules[$provider]['module_title'] . ' ' . $this->t('API Key');
    $description = $this->t('The API key for the provider @provider. You can find or create one in the following link: <a href=":link" target="_blank">:link</a>', [
      '@provider' => $this->modules[$provider]['module_title'],
      ':link' => $this->modules[$provider]['link'],
    ]);
    $form['api_key']['#description'] = $description;
    return $form['api_key'];
  }

  /**
   * Reset the configuration on fail.
   *
   * @param string $provider
   *   The provider.
   * @param bool $disabled
   *   If the module was disabled.
   */
  protected function resetConfiguration(string $provider, bool $disabled) {
    $this->deleteKey($provider);
    $config = $this->configFactory()->getEditable($this->modules[$provider]['config']);
    $config->set($this->modules[$provider]['key'], '');
    $config->save();
    if ($disabled) {
      $this->moduleInstaller->uninstall([$provider]);
    }
    drupal_flush_all_caches();
  }

  /**
   * Create a key.
   *
   * @param string $provider
   *   The provider.
   * @param string $api_key
   *   The API key.
   *
   * @return \Drupal\key\Entity\Key
   *   The key entity.
   */
  protected function createKey(string $provider, string $api_key) {
    $values = [
      'label' => $this->modules[$provider]['module_title'] . ' API Key',
      'id' => $provider . '_simple_provider_key',
      'key_type' => 'authentication',
      'key_type_settings' => [],
      'key_provider' => 'config',
      'key_provider_settings' => [
        'key_value' => $api_key,
      ],
      'key_input' => 'text_field',
      'description' => 'Automatically created by the AI Core module.',
    ];
    $key = $this->entityTypeManager->getStorage('key')->create($values);
    $key->save();
    return $key;
  }

  /**
   * Delete a key.
   *
   * @param string $provider
   *   The provider.
   */
  protected function deleteKey(string $provider) {
    $id = $provider . '_simple_provider_key';
    $key = $this->entityTypeManager->getStorage('key')->load($id);
    if ($key) {
      $key->delete();
    }
  }

}
