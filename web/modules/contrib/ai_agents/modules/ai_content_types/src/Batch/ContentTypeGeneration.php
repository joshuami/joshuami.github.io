<?php

namespace Drupal\ai_content_types\Batch;

use Drupal\ai\OperationType\Chat\ChatInput;
use Drupal\ai\OperationType\Chat\ChatMessage;
use Drupal\ai\OperationType\GenericType\ImageFile;
use Drupal\ai_agents\Task\Task;
use Drupal\Core\Url;
use Drupal\unstructured\Formatters\MarkdownFormatter;
use League\HTMLToMarkdown\HtmlConverter;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ContentTypeGeneration {

  public static function generateContext($title, $prompt, $file_id, $website, $blueprint, &$context) {
    // If its a file we look into the file.
    $file_context = "";

    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $provider = $provider_service->createInstance($default['provider_id']);
    if ($file_id) {
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
        }
      }
      else {
        // Prepare image data for prompt.
        $images = [];
        $image = new ImageFile();
        $images[] = $image->setFileFromFile($file);
        $message = new ChatMessage("user", "Can you look at the image and describe it in such a way that you can create a content type and fields from it. Explain the fields one by one each on a new row. Be verbose. Make up a name for the content type. The image might depict instructions or might be general data that we want to generate a content type from.", $images);
        $input = new ChatInput([$message]);
        $result = $provider->chat($input, $default['model_id'])->getNormalized();
        $file_context = $result->getText();
      }
    }

    if ($website) {
      /** @var \Drupal\simple_crawler\Crawler */
      $crawler = \Drupal::service('simple_crawler.crawler');
      $page = $crawler->scrapePageAsBrowser($website);
      $converter = new HtmlConverter();
      $page = $converter->convert($page);
      $message = new ChatMessage("user", "Based on the following prompt that you should following and the following context of a website, could you extract the possible fields and describe them in maximum two sentences and what they do and with an example of each field. All in a markdown form.

Prompt:
$prompt

Website Context:
$page");
      $input = new ChatInput([$message]);
      $result = $provider->chat($input, $default['model_id'])->getNormalized();
      $file_context = $result->getText();
    }

    $context['results'] = [
      'title' => $title,
      'prompt' => $prompt,
      'file_context' => $file_context,
      'page_context' => $page,
      'blueprint' => $blueprint,
    ];
  }

  public static function generateContentTypeBlueprint(&$context) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('node_content_type_agent');

    $prompt = "Based on the following possible title, prompt and metadata context can you generate a content type for me?";
    if (!empty($context['results']['title'])) {
      $prompt .= "\n\nTitle: " . $context['results']['title'];
    }
    if (!empty($context['results']['prompt'])) {
      $prompt .= "\n\nPrompt: " . $context['results']['prompt'];
    }
    if (!empty($context['results']['file_context'])) {
      $prompt .= "\n\nOther metadata:\n\n " . $context['results']['file_context'];
    }
    if (!empty($context['results']['page_context'])) {
      $prompt .= "\n\nScraped website:\n\n " . $context['results']['page_context'];
    }

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
    $context['results']['bundle'] = $solution['data_name'];
    // Save the agent in cache.
    \Drupal::cache()->set('ai_content_types_blueprint', $solution);
  }

  public static function generateFieldTypeBlueprint(&$context) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('field_type_agent');
    $bundle = $context['results']['bundle'];

    $prompt = "Based on the following possible title, prompt and metadata context can you setup the field types for the entity type node and the bundle $bundle?";
    if (!empty($context['results']['title'])) {
      $prompt .= "\n\nTitle: " . $context['results']['title'];
    }
    if (!empty($context['results']['prompt'])) {
      $prompt .= "\n\nPrompt: " . $context['results']['prompt'];
    }
    if (!empty($context['results']['file_context'])) {
      $prompt .= "\n\nOther metadata\n\n: " . $context['results']['file_context'];
    }
    if (!empty($context['results']['page_context'])) {
      $prompt .= "\n\nScraped website:\n\n " . $context['results']['page_context'];
    }

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
    $solution = $agent->getData();
    $context['results']['without_blueprint'] = FALSE;

    // Save the agent in cache.
    \Drupal::cache()->set('ai_field_types_blueprint', $solution);
  }

  /**
   * Save without blueprint.
   */
  public static function saveWithoutBlueprint(&$context) {
    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('node_content_type_agent');
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $data = \Drupal::cache()->get('ai_content_types_blueprint')->data;
    $data['action'] = 'create';
    $agent->setData($data);
    $agent->solve();

    $agent = \Drupal::service('plugin.manager.ai_agents')->createInstance('field_type_agent');
    $provider_service = \Drupal::service('ai.provider');
    $default = $provider_service->getDefaultProviderForOperationType('chat');
    $agent->setAiProvider($provider_service->createInstance($default['provider_id']));
    $agent->setModelName($default['model_id']);
    $agent->setAiConfiguration([]);
    $field_data = \Drupal::cache()->get('ai_field_types_blueprint')->data;
    $agent->setData($field_data);
    $agent->solve();

    \Drupal::messenger()->addMessage(t('Content type %name generated.', [
      '%name' => $data['readable_name'],
    ]));
    $context['results']['without_blueprint'] = TRUE;
  }

  public static function generateContentTypeBlueprintFinished($success, $results, $operations) {
    // Forward to another route.
    $route = 'ai_content_types.ai_assisted_blueprint';
    if ($results['without_blueprint']) {
      $route = 'entity.node_type.collection';
    }
    return new RedirectResponse(Url::fromRoute($route)->toString());
  }


}
