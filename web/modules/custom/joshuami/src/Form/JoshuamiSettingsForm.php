<?php

namespace Drupal\joshuami\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure joshuami settings for this site.
 */
class JoshuamiSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'joshuami_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['joshuami.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('joshuami.settings');

    $form['auto_tour_enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable automatic tours for anonymous users'),
      '#default_value' => $config->get('auto_tour_enabled'),
      '#description' => $this->t('When enabled, tours will automatically open for anonymous users on specified routes.'),
    ];

    $form['auto_tour_routes'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Routes for automatic tours'),
      '#default_value' => implode("\n", $config->get('auto_tour_routes') ?? []),
      '#description' => $this->t('Enter one route per line. Tours will automatically open for anonymous users on these routes.'),
      '#rows' => 10,
    ];

    $form['show_on_first_visit'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show tours on first visit'),
      '#default_value' => $config->get('show_on_first_visit'),
      '#description' => $this->t('When enabled, tours will show for anonymous users on their first visit to any page with available tours.'),
    ];

    $form['debug_mode'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable debug mode'),
      '#default_value' => $config->get('debug_mode'),
      '#description' => $this->t('When enabled, debug information will be shown in the browser console for administrators.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('joshuami.settings');
    
    // Process routes - split by newlines and clean up
    $routes = array_filter(
      array_map('trim', explode("\n", $form_state->getValue('auto_tour_routes'))),
      function($route) { return !empty($route); }
    );

    $config
      ->set('auto_tour_enabled', $form_state->getValue('auto_tour_enabled'))
      ->set('auto_tour_routes', $routes)
      ->set('show_on_first_visit', $form_state->getValue('show_on_first_visit'))
      ->set('debug_mode', $form_state->getValue('debug_mode'))
      ->save();

    parent::submitForm($form, $form_state);
  }

} 