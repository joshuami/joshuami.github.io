<?php

declare(strict_types=1);

namespace Drupal\ai_content_suggestions\Plugin\AiContentSuggestions;

use Drupal\Core\Form\FormStateInterface;
use Drupal\ai_content_suggestions\AiContentSuggestionsPluginBase;

/**
 * Plugin implementation of the ai_content_suggestions.
 *
 * @AiContentSuggestions(
 *   id = "tone",
 *   label = @Translation("Alter tone"),
 *   description = @Translation("Allow an LLM to provide tone suggestions about the content."),
 *   operation_type = "chat"
 * )
 */
final class Tone extends AiContentSuggestionsPluginBase {

  /**
   * {@inheritdoc}
   */
  public function alterForm(array &$form, FormStateInterface $form_state, array $fields): void {
    $form[$this->getPluginId()] = $this->getAlterFormTemplate($fields);
    $form[$this->getPluginId()]['tone'] = [
      '#type' => 'select',
      '#title' => $this->t('Choose tone'),
      '#description' => $this->t('Selecting one of the options will adjust/reword the body content to be appropriate for the target audience.'),
      '#options' => [
        'friendly' => $this->t('Friendly'),
        'professional' => $this->t('Professional'),
        'helpful' => $this->t('Helpful'),
        'easier for a high school educated reader' => $this->t('High school level reader'),
        'easier for a college educated reader' => $this->t('College level reader'),
        'explained to a five year old' => $this->t("Explain like I'm 5"),
      ],
      '#weight' => 0,
    ];
    $form[$this->getPluginId()][$this->getPluginId() . '_submit']['#value'] = $this->t('Adjust Tone');
  }

  /**
   * {@inheritdoc}
   */
  public function updateFormWithResponse(array &$form, FormStateInterface $form_state): void {
    if ($value = $this->getTargetFieldValue($form_state)) {
      if ($tone = $this->getFormFieldValue('tone', $form_state)) {
        $message = $this->sendChat('Change the tone of the following text to be ' . $tone . ' using the same language as the following text:\r\n"' . $value . '"');
      }
      else {
        $message = $this->t('Please select a tone for the LLM to suggest.');
      }
    }
    else {
      $message = $this->t('The selected field has no text. Please supply content to the field.');
    }

    $form[$this->getPluginId()]['response']['response']['#context']['response']['response'] = [
      '#markup' => $message,
      '#weight' => 100,
    ];
  }

}
