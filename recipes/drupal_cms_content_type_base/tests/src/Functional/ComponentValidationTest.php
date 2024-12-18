<?php

declare(strict_types=1);

namespace Drupal\Tests\drupal_cms_content_type_base\Functional;

use Composer\InstalledVersions;
use Drupal\FunctionalTests\Core\Recipe\RecipeTestTrait;
use Drupal\Tests\BrowserTestBase;

/**
 * @group drupal_cms_content_type_base
 */
class ComponentValidationTest extends BrowserTestBase {

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

  public function testContentEditorPermissions(): void {
    $dir = InstalledVersions::getInstallPath('drupal/drupal_cms_page');
    $this->applyRecipe($dir);

    // Create an unpublished page.
    $node = $this->drupalCreateNode(['type' => 'page']);
    $this->assertFalse($node->isPublished());

    // Log in as a content editor and ensure we can see the front page,
    // regardless of its publication status.
    $account = $this->drupalCreateUser();
    $account->addRole('content_editor')->save();
    $this->drupalLogin($account);
    $this->drupalGet($node->toUrl());
    $assert_session = $this->assertSession();
    $assert_session->statusCodeEquals(200);
    $assert_session->pageTextContains($node->getTitle());
    $node->set('moderation_state', 'published')->save();
    $this->assertTrue($node->isPublished());
    $this->getSession()->reload();
    $assert_session->statusCodeEquals(200);
  }

}
