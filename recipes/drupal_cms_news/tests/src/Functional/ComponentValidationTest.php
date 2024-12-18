<?php

declare(strict_types=1);

namespace Drupal\Tests\drupal_cms_news\Functional;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\file\Entity\File;
use Drupal\FunctionalTests\Core\Recipe\RecipeTestTrait;
use Drupal\media\Entity\Media;
use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\drupal_cms_content_type_base\ContentModelTestTrait;

/**
 * @group drupal_cms_news
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
      'news' => [
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

  public function testPathAliasPatternPrecedence(): void {
    $dir = realpath(__DIR__ . '/../../../../drupal_cms_seo_basic');
    $this->applyRecipe($dir);

    // Confirm that news items have the expected path aliases.
    $node = $this->drupalCreateNode([
      'type' => 'news',
      'title' => 'Test News',
    ]);
    $now = date('Y-m', $node->getCreatedTime());
    $this->assertStringEndsWith("/news/$now/test-news", $node->toUrl()->toString());
  }

  public function testListingPage(): void {
    $uri = uniqid('public://') . '.png';
    $this->getRandomGenerator()->image($uri, '600x600', '800x800');
    $file = File::create([
      'uri' => $uri,
    ]);
    $file->save();

    $featured_image = Media::create([
      'bundle' => 'image',
      'field_media_image' => $file,
    ]);
    $featured_image->save();

    $this->drupalCreateNode([
      'type' => 'news',
      'title' => 'Item 1',
      'field_featured_image' => $featured_image,
      'moderation_state' => 'published',
    ]);
    $this->drupalCreateNode([
      'type' => 'news',
      'title' => 'Item 2',
      'field_featured_image' => $featured_image,
      'moderation_state' => 'published',
    ]);
    $this->drupalCreateNode([
      'type' => 'news',
      'title' => 'Item 3',
      'field_featured_image' => $featured_image,
      'status' => FALSE,
    ]);
    $this->drupalGet('/news');
    $assert_session = $this->assertSession();
    $assert_session->statusCodeEquals(200);
    $assert_session->linkExists('Item 1');
    $assert_session->linkExists('Item 2');
    $assert_session->linkNotExists('Item 3');
  }

}
