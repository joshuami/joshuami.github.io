<?php

namespace Drupal\ai_agents_extra\Plugin\AiAgent;

use Drupal\ai\AiProviderPluginManager;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Extension\ExtensionPathResolver;
use Drupal\Core\Extension\InfoParserInterface;
use Drupal\Core\Extension\ModuleExtensionList;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ModuleInstallerInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\ai\Service\PromptJsonDecoder\PromptJsonDecoderInterface;
use Drupal\ai_agents\Attribute\AiAgent;
use Drupal\ai_agents\PluginBase\AiAgentBase;
use Drupal\ai_agents\PluginInterfaces\AiAgentInterface;
use Drupal\ai_agents\Service\AgentHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the module enable Agent.
 */
#[AiAgent(
  id: 'module_enable',
  label: new TranslatableMarkup('Module Agent'),
)]
class ModuleEnable extends AiAgentBase implements ContainerFactoryPluginInterface {

  use DependencySerializationTrait;

  /**
   * Constructor for module installer.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    AgentHelper $agentHelper,
    FileSystemInterface $fileSystem,
    ConfigFactoryInterface $configFactory,
    AccountInterface $currentUser,
    ExtensionPathResolver $extensionPathResolver,
    PromptJsonDecoderInterface $promptJsonDecode,
    AiProviderPluginManager $aiProviderPluginManager,
    protected ModuleInstallerInterface $moduleInstaller,
    protected ModuleExtensionList $moduleExtensionList,
    protected ModuleHandlerInterface $moduleHandler,
    protected InfoParserInterface $infoParser,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $agentHelper, $fileSystem, $configFactory, $currentUser, $extensionPathResolver, $promptJsonDecode, $aiProviderPluginManager);
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('ai_agents.agent_helper'),
      $container->get('file_system'),
      $container->get('config.factory'),
      $container->get('current_user'),
      $container->get('extension.path.resolver'),
      $container->get('ai.prompt_json_decode'),
      $container->get('ai.provider'),
      $container->get('module_installer'),
      $container->get('extension.list.module'),
      $container->get('module_handler'),
      $container->get('info_parser'),
    );
  }

  /**
   * Questions to ask.
   *
   * @var array
   */
  protected $questions;

  /**
   * The full data of the initial task.
   *
   * @var array
   */
  protected $data;

  /**
   * Task type.
   *
   * @var string
   */
  protected $taskType;

  /**
   * {@inheritDoc}
   */
  public function getId() {
    return 'module_enable';
  }

  /**
   * {@inheritDoc}
   */
  public function agentsNames() {
    return [
      'Module/Enable-Type Agent',
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function agentsCapabilities() {
    return [
      'module_enable' => [
        'name' => 'Module enable agent',
        'description' => "This is capable of enabling Drupal modules and answering questions about Drupal modules existing on the system. Forward all module quesitons to this agent.",
        'inputs' => [
          'free_text' => [
            'name' => 'Prompt',
            'type' => 'string',
            'description' => 'The prompt to enable drupal modules or a question.',
            'default_value' => '',
          ],
        ],
        'outputs' => [
          'answers' => [
            'description' => 'The answers to the questions asked about enablin modules.',
            'type' => 'string',
          ],
        ],
      ],
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function setData($data) {
    $this->data[] = $data;
  }

  /**
   * {@inheritDoc}
   */
  public function isAvailable() {
    return TRUE;
  }

  /**
   * {@inheritDoc}
   */
  public function isNotAvailableMessage() {
    return $this->t('This is not available.');
  }

  /**
   * {@inheritDoc}
   */
  public function getRetries() {
    return 2;
  }

  /**
   * {@inheritDoc}
   */
  public function getData() {
    return $this->data;
  }

  /**
   * {@inheritDoc}
   */
  public function answerQuestion() {
    $data = $this->agentHelper->runSubAgent('answerQuestion', [
      'All currently available modules' => $this->getModulesAsString(),
    ]);

    $answer = "";
    if (isset($data[0]['answer'])) {
      foreach ($data as $dataPoint) {
        $answer .= $dataPoint['answer'] . "\n";
      }
      return $answer;
    }

    return $this->t("Sorry, I got no answers for you.");
  }

  /**
   * {@inheritDoc}
   */
  public function getHelp() {
    $help = $this->t("This agent can figure out module names of a file. Just upload and ask.");
    return $help;
  }

  /**
   * {@inheritDoc}
   */
  public function hasAccess() {
    // Check for permissions.
    if (!$this->currentUser->hasPermission('administer modules')) {
      return AccessResult::forbidden();
    }
    return parent::hasAccess();
  }

  /**
   * {@inheritDoc}
   */
  public function determineSolvability() {
    parent::determineSolvability();
    $this->taskType = $this->determineTypeOfTask();
    switch ($this->taskType) {
      case 'enable':
        return AiAgentInterface::JOB_SOLVABLE;

      case 'question':
        return AiAgentInterface::JOB_SHOULD_ANSWER_QUESTION;
    }

    return AiAgentInterface::JOB_NOT_SOLVABLE;
  }

  /**
   * {@inheritDoc}
   */
  public function askQuestion() {
    return $this->questions;
  }

  /**
   * {@inheritDoc}
   */
  public function solve() {
    $message = '';
    switch ($this->data[0]['action']) {
      case 'enable':
        try {
          $this->enableModule();
          $message = t('The module %module_name (%module) has been enabled.', [
            '%module_name' => $this->data[0]['readable_name'],
            '%module' => $this->data[0]['module'],
          ]);
        }
        catch (\Exception $e) {
          $message = 'There was an error enabling the module: ' . $e->getMessage();
        }
        break;

      case 'information':
        return $this->answerQuestion();

      default:
        $message = 'We could not figure out what you wanted to do.';
    }
    return $message;
  }

  /**
   * {@inheritDoc}
   */
  public function approveSolution() {
    $this->data[0]['action'] = 'enable';
  }

  /**
   * Check so all requirements are there.
   *
   * @return bool
   *   If all requirements are there.
   */
  public function checkRequirements() {
    return TRUE;
  }

  /**
   * Determine if the context is asking a question or wants a audit done.
   *
   * @return string
   *   The context.
   */
  public function determineTypeOfTask() {
    $data = $this->agentHelper->runSubAgent('determineModuleNameTask', [
      'All currently available modules' => $this->getModulesAsString(),
    ]);

    if (isset($data[0]['action']) && in_array($data[0]['action'], ['enable'])) {
      // If its edit or delete, we need to know if the nmodule exists.
      if (in_array($data[0]['action'], ['enable'])) {
        if (!$this->doesModuleExist($data[0]['module'])) {
          // Check if we can find a similar nmodule.
          $similarModule = $this->findSimilarModule();
          // Fail completely.
          if (empty($similarModule)) {
            throw new \Exception('We could not figure out which module you meant. Please specify better.');
          }
          // If there is a similar, we ask.
          $this->questions[] = 'We could not find the module you are looking for. Do you mean ' . $similarModule['readable_name'] . ' (' . $similarModule['module'] . ')?';
          $data[0]['action'] = 'fail';
        }
      }
      $this->data = $data;
      return $data[0]['action'];
    }
    if (isset($data[0]['action']) && $data[0]['action'] == 'question') {
      return 'question';
    }
    throw new \Exception('Invalid action in Web Determing task.');
  }

  /**
   * Try to get a similar module.
   *
   * @return string|array
   *   The module.
   */
  public function findSimilarModule() {
    $data = $this->agentHelper->runSubAgent('determineModule', [
      'Module List' => $this->getModulesAsString(),
    ]);
    return !empty($data[0]['module']) ? [
      'module' => $data[0]['module'],
      'readable_name' => $data[0]['module'],
    ] : '';
  }

  /**
   * Does the module exist.
   *
   * @param string $dataName
   *   The data name.
   *
   * @return bool
   *   If the module type exists.
   */
  public function doesModuleExist($dataName) {
    $moduleList = $this->moduleExtensionList->getList();
    return array_key_exists($dataName, $moduleList);
  }

  /**
   * Enable the module.
   */
  public function enableModule() {
    $this->moduleInstaller->install([$this->data[0]['module']]);
  }

  /**
   * Get all modules as a string.
   *
   * @return string
   *   The module.
   */
  public function getModulesAsString() {
    $moduleList = $this->moduleExtensionList->getList();
    $list = "";
    foreach ($moduleList as $dataName => $module) {
      $info = $this->infoParser->parse($module->getPathname());
      $realName = $info['name'] ?? $dataName;
      $description = $info['description'] ?? '';
      $status = $this->moduleHandler->moduleExists($dataName) ? 'Enabled' : 'Disabled';
      $list .= "Name $realName, Dataname: $dataName ($status), Description: $description\n";
    }
    return $list;
  }

  /**
   * Get all modules as a string with verbose information.
   *
   * @return string
   *   The modules.
   */
  public function getAvailableModules() {
    $moduleList = $this->moduleExtensionList->getList();
    $list = "";
    foreach ($moduleList as $dataName => $extension) {
      // Load the modules.
      // Show all the configurations.
      $list .= 'Machine name: - dataname: ' . $dataName . "\n";
      $list .= 'Title:: ' . $extension->info['name'] . "\n";
      $list .= 'Description: ' . $extension->info['description'] . "\n";
      $list .= "\n";
    }

    return $list;
  }

}
