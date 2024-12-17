<?php

declare(strict_types=1);

namespace Drupal\Tests\drupal_cms_privacy_basic\Functional;

use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\FunctionalTests\Core\Recipe\RecipeTestTrait;
use Drupal\Tests\BrowserTestBase;

/**
 * @group drupal_cms_privacy_basic
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
  protected static $modules = ['block'];

  public function test(): void {
    $dir = realpath(__DIR__ . '/../../..');

    // The recipe should apply cleanly.
    $this->applyRecipe($dir);
    // Apply it again to prove that it is idempotent.
    $this->applyRecipe($dir);

    // The privacy links should be visible to anonymous users in the footer.
    $this->drupalPlaceBlock('system_menu_block:footer', ['label' => 'Footer']);
    $this->drupalGet('<front>');
    $footer_menu = $this->assertSession()
      ->elementExists('css', 'nav > h2:contains("Footer") + ul');
    // The privacy links should be visible to anonymous users in the footer, but
    // the privacy policy is unpublished by default, so it shouldn't appear.
    $this->assertTrue($footer_menu->hasLink('My privacy settings'));
    $this->assertFalse($footer_menu->hasLink('Privacy policy'));

    // Publish the privacy policy and ensure it shows up in the footer.
    $this->container->get(EntityRepositoryInterface::class)
      ->loadEntityByUuid('node', '00d105b3-6f05-40c6-a289-3dd61c89480e')
      ?->setPublished()
      ->save();
    $this->getSession()->reload();
    $this->assertTrue($footer_menu->hasLink('Privacy policy'));
  }

}
