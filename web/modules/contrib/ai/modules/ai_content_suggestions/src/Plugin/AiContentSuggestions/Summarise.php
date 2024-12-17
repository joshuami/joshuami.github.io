<?php

declare(strict_types=1);

namespace Drupal\ai_content_suggestions\Plugin\AiContentSuggestions;

use Drupal\Core\Form\FormStateInterface;
use Drupal\ai_content_suggestions\AiContentSuggestionsPluginBase;

/**
 * Plugin implementation of the ai_content_suggestions.
 *
 * @AiContentSuggestions(
 *   id = "summarise",
 *   label = @Translation("Summarise text"),
 *   description = @Translation("Allow an LLM to provide a summary of the content."),
 *   operation_type = "chat"
 * )
 */
final class Summarise extends AiContentSuggestionsPluginBase {

  /**
   * {@inheritdoc}
   */
  public function alterForm(array &$form, FormStateInterface $form_state, array $fields): void {
    $form[$this->getPluginId()] = $this->getAlterFormTemplate($fields);
    $form[$this->getPluginId()][$this->getPluginId() . '_submit']['#value'] = $this->t('Summarize');
  }

  /**
   * {@inheritdoc}
   */
  public function updateFormWithResponse(array &$form, FormStateInterface $form_state): void {
    if ($value = $this->getTargetFieldValue($form_state)) {
      $message = $this->sendChat('Create a detailed summary of the following text in less than 130 words using the same language as the following text:\r\n"' . $value . '"');
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
