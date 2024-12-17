<?php

namespace Drupal\ai_webform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * AI Content Types form.
 */
class WebformBluePrint extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'ai_webform_blueprint';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, array $blueprint = []) {
    $form['#tree'] = TRUE;
    $blueprint = \Drupal::cache()->get('ai_webform_blueprint')->data;

    $form['blueprint_webform'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Blueprint Webform'),
      '#description' => $this->t('This is a data dump of your blueprint that will be generated, please check or change what you feel necessary.'),
      '#default_value' => $blueprint,
      '#required' => TRUE,
      '#attributes' => [
        'rows' => 11,
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate Webform'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('webform_agent');
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $data = Yaml::parse($form_state->getValue('blueprint_webform'));
    $data['action'] = 'create';
    $agent->setData($data);
    $agent->solve();
    // Set redirect.
    $form_state->setRedirect('entity.webform.canonical', [
      'webform' => $data['id'],
    ]);
  }
}
