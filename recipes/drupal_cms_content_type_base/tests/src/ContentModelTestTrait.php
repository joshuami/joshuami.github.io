<?php

declare(strict_types=1);

namespace Drupal\Tests\drupal_cms_content_type_base;

use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Field\Entity\BaseFieldOverride;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\Tests\BrowserTestBase;
use PHPUnit\Framework\Assert;

trait ContentModelTestTrait {

  protected function assertContentModel(array $content_model): void {
    assert($this instanceof BrowserTestBase);

    $editor = $this->drupalCreateUser();
    $editor->addRole('content_editor')->save();
    $this->drupalLogin($editor);

    $assert_session = $this->assertSession();
    foreach ($content_model as $node_type => $fields) {
      $this->drupalGet("/node/add/$node_type");
      $assert_session->statusCodeEquals(200);

      $field_definitions = $this->container->get(EntityFieldManagerInterface::class)
        ->getFieldDefinitions('node', $node_type);

      foreach ($fields as $field_name => $spec) {
        Assert::assertArrayHasKey($field_name, $field_definitions);
        $field = $field_definitions[$field_name];

        $storage = $field->getFieldStorageDefinition();
        Assert::assertSame($spec['type'], $storage->getType(), "Field $field_name does not have the expected type.");
        Assert::assertSame($spec['cardinality'], $storage->getCardinality(), "Field $field_name does not have the expected cardinality.");
        Assert::assertSame($spec['required'], $field->isRequired(), "Field $field_name does not have the expected required flag.");
        Assert::assertSame($spec['translatable'], $field->isTranslatable(), "Field $field_name does not have the expected translatability.");
        // The field label might be a TranslatableMarkup object, so use
        // assertEquals() here.
        Assert::assertEquals($spec['label'], $field->getLabel(), "Field $field_name does not have the expected label.");

        if (in_array($spec['input type'], ['text', 'email', 'tel', 'date'], TRUE)) {
          $selector = sprintf('input[name^="%s["]', $field_name);
          Assert::assertSame($spec['input type'], $assert_session->elementExists('css', $selector)->getAttribute('type'));
        }
        elseif ($spec['input type'] === 'textarea') {
          $assert_session->elementExists('css', sprintf('textarea[name^="%s["]', $field_name));
        }
        elseif ($spec['input type'] === 'media library') {
          $assert_session->hiddenFieldExists($field_name . '[media_library_selection]');
        }
        elseif ($spec['input type'] === 'wysiwyg') {
          $selector = sprintf('[name^="%s["][name$="[format]"]', $field_name);
          $assert_session->elementExists('css', $selector);
        }
        elseif ($spec['input type'] === 'address') {
          $selector = sprintf('[name^="%s["][name$="[address][country_code]"]', $field_name);
          $assert_session->elementExists('css', $selector);
        }
        else {
          $this->fail("Unknown input type for field $field_name.");
        }

        if ($spec['help text']) {
          $assert_session->pageTextContains($spec['help text']);
        }
      }
    }
  }

}
