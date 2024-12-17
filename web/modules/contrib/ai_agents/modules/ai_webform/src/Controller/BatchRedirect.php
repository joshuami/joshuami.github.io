<?php

namespace Drupal\ai_webform\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Controller for batch redirect.
 */
class BatchRedirect extends ControllerBase {

  /**
   * Redirect to the batch page.
   */
  public function startRedirect() {
    // Get the webform_id, image, and text from cache.
    $info = \Drupal::cache()->get('ai_webform')->data;

    // Delete the cache.
    //\Drupal::cache()->delete('webform_agent');
    // Set 404 if the cache is not there.
    if (empty($info['webform_id'])) {
      throw new NotFoundHttpException();
    }
    // Batch API invoke.
    \batch_set([
      'operations' => [
        ['\Drupal\ai_webform\BatchJob::create_description', [
          $info['webform_id'],
          $info['file'],
          $info['text'],
          $info['blueprint'],
          $info['open'],
          $info['description'],
        ]],
        ['\Drupal\ai_webform\BatchJob::run_agent', [$info['webform_id']]],
      ],
      'finished' => '\Drupal\ai_webform\BatchJob::batch_finished',
      'title' => t('AI Webform Creation'),
    ]);
    return \batch_process();
  }

}
