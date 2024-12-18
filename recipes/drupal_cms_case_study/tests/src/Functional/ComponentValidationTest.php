<?php

declare(strict_types=1);

namespace Drupal\Tests\drupal_cms_case_study\Functional;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\FunctionalTests\Core\Recipe\RecipeTestTrait;
use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\drupal_cms_content_type_base\ContentModelTestTrait;

/**
 * @group drupal_cms_case_study
 */
class ComponentValidationTest extends BrowserTestBase {

  use ContentModelTestTrait;
  use RecipeTestTrait;

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $dir = realpath(__DIR__ . '/../../..');
    // The recipe should apply cleanly.
    $this->applyRecipe($dir);
    // Apply it again to prove that it is idempotent.
    $this->applyRecipe($dir);
  }

  public function testContentModel(): void {
    $this->assertContentModel([
      'case_study' => [
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
        'field_case_study__client_name' => [
          'type' => 'string',
          'cardinality' => 1,
          'required' => FALSE,
          'translatable' => TRUE,
          'label' => 'Client name',
          'input type' => 'text',
          'help text' => 'Include the name of the client or organization.',
        ],
        'field_case_study__client_logo' => [
          'type' => 'entity_reference',
          'cardinality' => 1,
          'required' => FALSE,
          'translatable' => FALSE,
          'label' => 'Client logo',
          'input type' => 'media library',
          'help text' => 'Include the logo of the client or organization.'
        ],
        'field_case_study__client_link' => [
          'type' => 'link',
          'cardinality' => 1,
          'required' => FALSE,
          'translatable' => FALSE,
          'label' => 'Client link',
          'input type' => 'text',
          'help text' => 'Include a link to the client or organization website.',
        ],
      ],
    ]);
  }

  public function testPathAliasPatternPrecedence(): void {
    $dir = realpath(__DIR__ . '/../../../../drupal_cms_seo_basic');
    $this->applyRecipe($dir);

    // Confirm that case studies have the expected path aliases.
    $node = $this->drupalCreateNode([
      'type' => 'case_study',
      'title' => 'Test Case study',
    ]);
    $this->assertStringEndsWith("/case-studies/test-case-study", $node->toUrl()->toString());
  }

}
