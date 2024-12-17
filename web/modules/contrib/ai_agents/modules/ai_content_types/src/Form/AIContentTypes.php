<?php

namespace Drupal\ai_content_types\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * AI Content Types form.
 */
class AIContentTypes extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'ai_content_types';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#tree'] = TRUE;
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('The name of the content type, leave empty if you want AI to come up with one. If you have documents that could allude to having multiple content types, this name helps in figuring out which one you want to generate.'),
    ];

    $form['prompt'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Prompt'),
      '#description' => $this->t('The description of the content type, this is optional if you upload a file. This is either a prompt that explains what you want to create or a helper prompt to fill in the gaps for how you want to create the content type based on the document uploaded.'),
      '#attributes' => [
        'placeholder' => $this->t('I want to generate a hotel review content type that has a title, address, a fivestar rating field and review free text field. All fields should be required.'),
      ],
    ];

    $form['file'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Context File'),
      '#upload_location' => 'public://',
      '#description' => $this->t('The file that contains the context for the content type. This is optional if you provide a description.'),
      '#upload_validators' => [
        'file_validate_extensions' => ['pdf doc docx txt jpg jpeg png gif ppt pptx xls xlsx'],
      ],
    ];

    $form['website'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Website'),
      '#description' => $this->t('The website to scrape for context. This only works with a prompt.'),
      '#attributes' => [
        'placeholder' => $this->t('https://www.example.com'),
      ],
    ];

    $form['show_blueprint'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show Blueprint'),
      '#description' => $this->t('Check this box if you want to see the blueprint of the content type the AI comes up with, before its applied.'),
      '#default_value' => FALSE,
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
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $prompt = $form_state->getValue('prompt');
    $file = $form_state->getValue('file');
    $website = $form_state->getValue('website');
    if (empty($prompt) && empty($file)) {
      $form_state->setErrorByName('prompt', $this->t('You must provide a prompt or a file. One of them is required.'));
    }
    if (!empty($website) && empty($prompt)) {
      $form_state->setErrorByName('website', $this->t('You must provide a prompt to scrape a website.'));
    }
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Create a batch job.
    $batch = [
      'title' => $this->t('Generating Content Type Blueprint'),
      'operations' => [
        ['\Drupal\ai_content_types\Batch\ContentTypeGeneration::generateContext', [
          $form_state->getValue('title'),
          $form_state->getValue('prompt'),
          $form_state->getValue('file'),
          $form_state->getValue('website'),
          $form_state->getValue('blueprint'),
        ]],
        ['\Drupal\ai_content_types\Batch\ContentTypeGeneration::generateContentTypeBlueprint', []],
        ['\Drupal\ai_content_types\Batch\ContentTypeGeneration::generateFieldTypeBlueprint', []],
      ],
      'finished' => '\Drupal\ai_content_types\Batch\ContentTypeGeneration::generateContentTypeBlueprintFinished',
    ];
    if (!$form_state->getValue('show_blueprint')) {
      $batch['operations'][] = ['\Drupal\ai_content_types\Batch\ContentTypeGeneration::saveWithoutBlueprint', []];
    }
    batch_set($batch);
  }

}
