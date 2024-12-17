<?php

namespace Drupal\ai_views\Form;

use Drupal\ai_agents\Plugin\AiAgent\ContentType;
use Drupal\ai_agents\Task\Task;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * AI Content Types form.
 */
class ViewsBlueprint extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'ai_views_blueprint';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ContentType $aiAgent = NULL) {
    $form['#tree'] = TRUE;

    $form['prompt'] = [
      '#type' => 'value',
      '#value' => \Drupal::cache()->get('ai_views_prompt')->data,
    ];

    $views_data = \Drupal::cache()->get('ai_views_blueprint')->data;
    $parts = Yaml::dump($views_data, 10, 2);
    $form['blueprint_views'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Blueprint Views'),
      '#description' => $this->t('This is a data dump of your blueprint that will be generated, please check or change what you feel necessary.'),
      '#default_value' => $parts,
      '#required' => TRUE,
      '#attributes' => [
        'rows' => 11,
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate Views'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('views_agent');
    $task = new Task($form_state->getValue('prompt'));
    $agent->setTask($task);
    $agent->setData(Yaml::parse($form_state->getValue('blueprint_views')));
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);

    $page = $agent->solve();
    if (!$page) {
      throw new \Exception('The task could not be solved.');
      return;
    }
    // Flush the route cache.
    \Drupal::service('router.builder')->rebuild();
    // Set redirect.
    $form_state->setRedirectUrl($page);
  }
}
