<?php

namespace Drupal\ai_agents_form_integration\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\ai\OperationType\Chat\ChatInput;
use Drupal\ai\OperationType\Chat\ChatMessage;
use Drupal\ai\OperationType\GenericType\ImageFile;
use Drupal\ai_agents\Task\Task;
use Drupal\node\Entity\NodeType;
use Drupal\unstructured\Formatters\MarkdownFormatter;
use League\HTMLToMarkdown\HtmlConverter;

/**
 * AI Content Types form.
 */
class ContentTypes extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'ai_agents_form_integration_content_types';
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
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('node_content_type_agent');

    $prompt = "Based on the following possible title and prompt can you generate a content type for me?";
    $prompt .= "\n\nTitle: " . $form_state->getValue('title');
    $prompt .= "\n\nPrompt: " . $form_state->getValue('prompt');

    $task = new Task($prompt);
    $agent->setTask($task);
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $solvability = $agent->determineSolvability();
    if (!$solvability) {
      $context['results']['error'] = "The AI agent could not solve the task.";
      return;
    }
    $solution = $agent->solve();
    $bundle = $solution['data_name'];
    // Create content type.
    NodeType::create([
      'type' => $bundle,
      'name' => $form_state->getValue('title'),
    ])->save();

    // Check if the body storage field exists.
    $field_storage = \Drupal::entityTypeManager()->getStorage('field_storage_config')->load('node.body');
    // If it does not exist, create it.
    if (!$field_storage) {
      \Drupal::entityTypeManager()->getStorage('field_storage_config')->create([
        'field_name' => 'body',
        'entity_type' => 'node',
        'type' => 'text_with_summary',
        'settings' => [
          'display_summary' => TRUE,
        ],
      ])->save();
    }
    // Attach the body field to the content type.
    \Drupal::entityTypeManager()->getStorage('field_config')->create([
      'field_name' => 'body',
      'entity_type' => 'node',
      'bundle' => $bundle,
      'label' => 'Body',
    ])->save();

    $fieldContext = $this->generateFieldContext($form_state->getValue('prompt'), $form_state->getValue('file'), $form_state->getValue('website'));
    // Create a batch job.
    $batch = [
      'title' => $this->t('Generating Content Type'),
      'finished' => '\Drupal\ai_agents_form_integration\Batch\ContentTypeGeneration::generateContentTypeFinished',
    ];
    foreach ($fieldContext as $key => $fieldPrompt) {
      $batch['operations'][] = [
        '\Drupal\ai_agents_form_integration\Batch\ContentTypeGeneration::generateFieldType', [
          $fieldPrompt,
          $bundle,
        ],
      ];
    }
    batch_set($batch);
  }

  /**
   * Generate field context.
   *
   * @param string $prompt
   *   The prompt.
   * @param array $file_id
   *   The file id.
   * @param string $website
   *   The website.
   *
   * @return array
   *   The fields.
   */
  public function generateFieldContext($prompt, $file_id, $website) {
    // If its a file we look into the file.
    $file_context = "";
    $fields = [];

    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $provider = $provider_service->createInstance($default['provider_id']);

    if (!empty($file_id)) {
      /** @var \Drupal\file\Entity\File $file */
      $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id[0]);
      if (!in_array($file->getMimeType(), [
        'image/jpeg',
        'image/png',
        'image/gif',
      ])) {
        // Run unstructured data extraction.
        $data = \Drupal::service('unstructured.api')->structure($file);
        $format = new MarkdownFormatter();
        $text = $format->format($data, "all");
        if (isset($text[0])) {
          $file_context = $text[0];
          $message = new ChatMessage("user",
            "Based on the following prompt and the following context of a file, could you extract the possible fields and describe them in maximum two sentences and what they do and with an example of each field. Respond with a json array with the field names and descriptions. Respond with a json array with the field names and descriptions.

" . $this->extraData() . "

Prompt:
$prompt

File Context:
$file_context");
          $input = new ChatInput([$message]);
          $result = $provider->chat($input, $default['model_id'])->getNormalized();
          $fields = \Drupal::service('ai.prompt_json_decode')->decode($result);
        }
      }
      else {
        // Prepare image data for prompt.
        $images = [];
        $image = new ImageFile();
        $images[] = $image->setFileFromFile($file);
        $message = new ChatMessage("user", "Can you look at the image and describe it in such a way that you can create a content type and fields from it. Explain the fields one by one each on a new row. Be verbose. Make up a name for the content type. The image might depict instructions or might be general data that we want to generate a content type from. Respond with a json array with the field names and descriptions.

" . $this->extraData() . "

Prompt:
$prompt

```", $images);
        $input = new ChatInput([$message]);
        $result = $provider->chat($input, $default['model_id'])->getNormalized();
        $fields = \Drupal::service('ai.prompt_json_decode')->decode($result);
      }
    }

    if ($website) {
      /** @var \Drupal\simple_crawler\Crawler */
      $crawler = \Drupal::service('simple_crawler.crawler');
      $page = $crawler->scrapePageAsBrowser($website, FALSE);

      $converter = new HtmlConverter();
      $page = $converter->convert($page);
      $message = new ChatMessage("user", "Based on the following prompt and the following context of a website, could you extract the possible fields and describe them in maximum two sentences and what they do and with an example of each field. Respond with a json array with the field names and descriptions.

" . $this->extraData() . "

Prompt:
$prompt

Website Context:
$page");
      $input = new ChatInput([$message]);
      $result = $provider->chat($input, $default['model_id'])->getNormalized();
      $fields = \Drupal::service('ai.prompt_json_decode')->decode($result);
    }
    return $fields;
  }

  /**
   * Extra data for the prompt.
   *
   * @return string
   *   The extra data.
   */
  public function extraData() {
    return "The field name should be in natural language, with spaces and not more then 255 characters.

You will be given a list of field types, think about the prompt and the context of the document/webpage/image and what field type it should be.

Images should in general be media field with image when it makes sense.
Categories should be entity_reference field type with the description that it should be a taxonomy if they look clickable.

Do not use custom field or fivestar field.

For the title, author, created and updated you do not have to set fields, since they already exists on the node.

Each object should have a key called fieldName, fieldType, description and example, with a string value for each key. Like this
```json
[
    \"fieldName\": \"Title\",
    \"fieldType\": \"string\",
    \"description\": \"The title of the page.\",
    \"example\": \"My first blog post\"
  },
  {
    \"fieldName\": \"Body\",
    \"fieldType\": \"text_long\",
    \"description\": \"The body of the page, should only be generated once.\"
    \"example\": \"This is the body of the page.\"
  }
]
```

List of field types:\n" . \Drupal::service('ai_agents.field_agent_helper')->getFieldTypesList();
  }

}
