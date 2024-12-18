<?php

declare(strict_types=1);

namespace Drupal\Tests\drupal_cms_page\Functional;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\FunctionalTests\Core\Recipe\RecipeTestTrait;
use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\drupal_cms_content_type_base\ContentModelTestTrait;

/**
 * @group drupal_cms_page
 */
class ComponentValidationTest extends BrowserTestBase {

  use ContentModelTestTrait;
  use RecipeTestTrait;

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  public function test(): void {
    $dir = realpath(__DIR__ . '/../../..');
    // The recipe should apply cleanly.
    $this->applyRecipe($dir);
    // Apply it again to prove that it is idempotent.
    $this->applyRecipe($dir);

    $this->assertContentModel([
      'page' => [
        'title' => [
          'type' => 'string',
          'cardinality' => 1,
          'required' => TRUE,
          'translatable' => TRUE,
          'label' => 'Title',
          'input type' => 'text',
          'help text' => '',
        ],
        'field_description' => [
          'type' => 'string_long',
          'cardinality' => 1,
          'required' => TRUE,
          'translatable' => TRUE,
          'label' => 'Description',
          'input type' => 'textarea',
          'help text' => 'Describe the page content. This appears as the description in search engine results.',
        ],
        'field_featured_image' => [
          'type' => 'entity_reference',
          'cardinality' => 1,
          'required' => FALSE,
          'translatable' => FALSE,
          'label' => 'Featured image',
          'input type' => 'media library',
          'help text' => 'Include an image. This appears as the image in search engine results.',
        ],
        'field_content' => [
          'type' => 'text_long',
          'cardinality' => 1,
          'required' => FALSE,
          'translatable' => TRUE,
          'label' => 'Content',
          'input type' => 'wysiwyg',
          'help text' => 'The content of this page.',
        ],
        'field_tags' => [
          'type' => 'entity_reference',
          'cardinality' => FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED,
          'required' => FALSE,
          'translatable' => FALSE,
          'label' => 'Tags',
          'input type' => 'text',
          'help text' => 'Include tags for relevant topics.',
        ],
      ],
    ]);
  }

}
