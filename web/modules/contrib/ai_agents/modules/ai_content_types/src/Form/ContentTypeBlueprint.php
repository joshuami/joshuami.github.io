<?php

namespace Drupal\ai_content_types\Form;

use Drupal\ai_agents\Plugin\AiAgent\ContentType;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * AI Content Types form.
 */
class ContentTypeBlueprint extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'ai_content_types_blueprint';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ContentType $aiAgent = NULL) {
    $form['#tree'] = TRUE;

    $content_type = \Drupal::cache()->get('ai_content_types_blueprint')->data;
    unset($content_type['action']);
    $parts = Yaml::dump($content_type, 10, 2);
    $form['blueprint_content_type'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Blueprint Content Type'),
      '#description' => $this->t('This is a data dump of your blueprint that will be generated, please check or change what you feel necessary.'),
      '#default_value' => $parts,
      '#required' => TRUE,
      '#attributes' => [
        'rows' => 11,
      ],
    ];

    $field_types = \Drupal::cache()->get('ai_field_types_blueprint')->data;
    unset($content_type['action']);
    $parts = Yaml::dump($field_types, 10, 2);
    $form['blueprint_field_type'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Blueprint Field Type'),
      '#description' => $this->t('This is a data dump of your blueprint that will be generated, please check or change what you feel necessary.'),
      '#default_value' => $parts,
      '#required' => TRUE,
      '#attributes' => [
        'rows' => 11,
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate Content Type'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('node_content_type_agent');
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $data = Yaml::parse($form_state->getValue('blueprint_content_type'));
    $data['action'] = 'create';
    $agent->setData($data);
    $agent->solve();

    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('field_type_agent');
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $field_data = Yaml::parse($form_state->getValue('blueprint_field_type'));
    $agent->setData($field_data);
    $agent->solve();

    \Drupal::messenger()->addMessage($this->t('Content type %name generated.', [
      '%name' => $data['readable_name'],
    ]));
    // Set redirect.
    $form_state->setRedirect('entity.node_type.collection', [
      'node_type' => $data['data_name'],
    ]);
  }
}
