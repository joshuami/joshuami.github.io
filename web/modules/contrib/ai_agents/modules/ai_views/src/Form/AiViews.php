<?php

namespace Drupal\ai_views\Form;

use Drupal\ai\OperationType\Chat\ChatInput;
use Drupal\ai\OperationType\Chat\ChatMessage;
use Drupal\ai\OperationType\GenericType\ImageFile;
use Drupal\ai_agents\PluginInterfaces\AiAgentInterface;
use Drupal\ai_agents\Task\Task;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * AI Views form.
 */
class AiViews extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'ai_views';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#tree'] = TRUE;
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('The name of the view, leave empty if you want AI to come up with one. If you have documents that could allude to having multiple content types, this name helps in figuring out which one you want to generate.'),
    ];

    $form['prompt'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Prompt'),
      '#description' => $this->t('The description of the view, this is optional if you upload a file. This is either a prompt that explains what you want to create or a helper prompt to fill in the gaps for how you want to create the content type based on the document uploaded.'),
      '#attributes' => [
        'placeholder' => $this->t('I want to generate a listings page for the Restaurants with a filter for the title and the publish status.'),
      ],
    ];

    $form['file'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Context Image'),
      '#upload_location' => 'public://',
      '#description' => $this->t('The image that contains the context for the view. This is optional if you provide a description.'),
      '#upload_validators' => [
        'file_validate_extensions' => ['jpg jpeg png gif'],
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
      '#description' => $this->t('Check this box if you want to see the blueprint of the view the AI comes up with, before its applied.'),
      '#default_value' => FALSE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate View'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $prompt = $form_state->getValue('prompt');
    $file = $form_state->getValue('file');
    if (empty($prompt) && empty($file)) {
      $form_state->setErrorByName('prompt', $this->t('You must provide a prompt or a file. One of them is required.'));
    }
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $context = !empty($form_state->getValue('file')) ? $this->generateContext($form_state->getValue('file')[0]) : '';
    $title = $form_state->getValue('title');
    $prompt = $form_state->getValue('prompt');
    $blueprint = $form_state->getValue('show_blueprint');
    $page = $this->generateViewsBlueprint($title, $prompt, $context, $blueprint);
    $form_state->setRedirectUrl($page);
  }

  public function generateViewsBlueprint($title, $user_prompt, $context, $blueprint) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('views_agent');

    $prompt = "Based on the following possible title, prompt and metadata context can you generate a Views for me?";
    if (!empty($title)) {
      $prompt .= "\n\nTitle: " . $title;
    }
    if (!empty($user_prompt)) {
      $prompt .= "\n\nPrompt: " . $user_prompt;
    }
    if (!empty($context)) {
      $prompt .= "\n\nOther metadata\n\n: " . $context;
    }

    $task = new Task($prompt);
    $agent->setTask($task);
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $solvability = $agent->determineSolvability();
    if ($solvability !== AiAgentInterface::JOB_SOLVABLE) {
      throw new \Exception('The task is not solvable.');
      return;
    }
    // If its blueprint we forward.
    if ($blueprint) {
      \Drupal::cache()->set('ai_views_blueprint', $agent->getData());
      \Drupal::cache()->set('ai_views_prompt', $prompt);

      $route = 'ai_views.ai_assisted_blueprint';
      return Url::fromRoute($route);
    }
    $page = $agent->solve();
    if (!$page) {
      throw new \Exception('The task could not be solved.');
      return;
    }
    // Flush the route cache.
    \Drupal::service('router.builder')->rebuild();
    // Redirect to the string page path.
    return $page;
  }

  /**
   * If we need to generate context.
   *
   * @param int $file_id
   *   The file id.
   * @return void
   */
  public function generateContext($file_id) {
    // If its a file we look into the file.
    $file_context = "";

    if ($file_id) {
      /** @var \Drupal\file\Entity\File $file */
      $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
      // Prepare image data for prompt.
      $images = [];
      $image = new ImageFile();
      $image->setFileFromFile($file);
      $images[] = $image;
      $message = new ChatMessage("user", "Can you look at the image and describe it in such a way that you can create a Views in Drupal from it. Explain how the listing works, what fields are exposed, how many items there is, if paginations exists, if there seems to be any filters. Be verbose. Make up a name for the Views. The image might depict instructions or might be general data that we want to generate Views from. Don't make anything up.", $images);
      $input = new ChatInput([$message]);
      $provider_service = \Drupal::service('ai.provider');
      $default = $provider_service->getDefaultProviderForOperationType('chat');
      $result = $provider_service->createInstance($default['provider_id'])->chat($input, $default['model_id'])->getNormalized();
      $file_context = $result->getText();
    }
    return $file_context;
  }

}
