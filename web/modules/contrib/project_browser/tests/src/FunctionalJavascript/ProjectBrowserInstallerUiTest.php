<?php

declare(strict_types=1);

namespace Drupal\Tests\project_browser\FunctionalJavascript;

use Behat\Mink\Element\NodeElement;
use Drupal\Core\Recipe\Recipe;
use Drupal\Core\State\StateInterface;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\Tests\project_browser\Traits\PackageManagerFixtureUtilityTrait;
use Drupal\project_browser\EnabledSourceHandler;
use Drupal\project_browser\InstallState;
use Drupal\system\SystemManager;

/**
 * Provides tests for the Project Browser Installer UI.
 *
 * @coversDefaultClass \Drupal\project_browser\Controller\InstallerController
 *
 * @group project_browser
 */
class ProjectBrowserInstallerUiTest extends WebDriverTestBase {

  use ProjectBrowserUiTestTrait, PackageManagerFixtureUtilityTrait;

  /**
   * The install state service.
   *
   * @var \Drupal\project_browser\InstallState
   */
  private InstallState $installState;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'package_manager_bypass',
    'package_manager',
    'package_manager_test_validation',
    'project_browser',
    'project_browser_test',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->initPackageManager();

    $this->installState = $this->container->get(InstallState::class);

    $this->config('project_browser.admin_settings')->set('enabled_sources', ['project_browser_test_mock'])->save(TRUE);
    $this->config('project_browser.admin_settings')->set('allow_ui_install', TRUE)->save();
    $this->drupalLogin($this->drupalCreateUser([
      'administer modules',
      'administer site configuration',
    ]));
  }

  /**
   * Tests the "queue" button functionality.
   */
  public function testSingleModuleAddAndInstall(): void {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $download_button = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $this->assertNotEmpty($download_button);
    $this->assertSame('Select Cream cheese on a bagel', $download_button->getText());
    $download_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $installed_action = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector .project_status-indicator", 30000);
    $this->assertTrue($assert_session->waitForText('✓ Cream cheese on a bagel is Installed'));
    $this->assertSame('✓ Cream cheese on a bagel is Installed', $installed_action->getText());

    // The activator in project_browser_test should have logged a message.
    // @see \Drupal\project_browser_test\TestActivator
    $this->assertContains('Cream cheese on a bagel was activated!', $this->container->get(StateInterface::class)->get('test activator'));
  }

  /**
   * Tests already added project install functionality.
   *
   * This scenario is not possible if only the Project
   * Browser UI is used, but could happen if the module was added differently,
   * such as via the terminal with Compose or a direct file addition.
   */
  public function testInstallModuleAlreadyInFilesystem() {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Pinky and the Brain');
    $pinky_brain_selector = '#project-browser .pb-layout__main ul > li:nth-child(2)';
    $action_button = $assert_session->waitForElementVisible('css', "$pinky_brain_selector button.project__action_button");
    $this->assertNotEmpty($action_button);
    $this->assertSame('Select Pinky and the Brain', $action_button->getText());
    $action_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $popup = $assert_session->waitForElementVisible('css', '.project-browser-popup');
    $this->assertNotEmpty($popup);
    // The Pinky and the Brain module doesn't actually exist in the filesystem,
    // but the test activator pretends it does, in order to test the presence
    // of the "Install" button as opposed vs. the default "Add and Install"
    // button. This happens to be a good way to test mid-install exceptions as
    // well.
    // @see \Drupal\project_browser_test\TestActivator::getStatus()
    $this->assertStringContainsString('MissingDependencyException: Unable to install modules pinky_brain due to missing modules pinky_brain', $popup->getText());
  }

  /**
   * Tests applying a recipe from the project browser UI.
   */
  public function testApplyRecipe(): void {
    if (!class_exists(Recipe::class)) {
      $this->markTestSkipped('This test cannot run because this version of Drupal does not support recipes.');
    }
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $this->config('project_browser.admin_settings')
      ->set('enabled_sources', ['recipes'])
      ->save();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('css', '.pb-projects-list');
    $this->inputSearchField('image', TRUE);
    $assert_session->waitForElementVisible('css', ".search__search-submit")->click();

    // Apply a recipe that ships with core.
    $card = $assert_session->waitForElementVisible('css', '.pb-project:contains("Image media type")');
    $this->assertNotEmpty($card);
    $assert_session->buttonExists('Select', $card)->press();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $recipe_applied = $card->waitFor(30, function (NodeElement $card): bool {
      return $card->has('css', '.project_status-indicator:contains("Installed")');
    });
    $this->assertTrue($recipe_applied);

    // If we reload, the installation status should be remembered.
    $this->getSession()->reload();
    $card = $assert_session->waitForElementVisible('css', '.pb-project:contains("Image media type")');
    $this->assertNotEmpty($card);
    $assert_session->elementExists('css', '.project_status-indicator:contains("Installed")', $card);
  }

  /**
   * Tests install UI not available if not enabled.
   */
  public function testAllowUiInstall(): void {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Pinky and the Brain');

    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $download_button = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $this->assertNotEmpty($download_button);
    $this->assertSame('Select Cream cheese on a bagel', $download_button->getText());
    $this->drupalGet('/admin/config/development/project_browser');
    $page->find('css', '#edit-allow-ui-install')->click();
    $assert_session->checkboxNotChecked('edit-allow-ui-install');
    $this->submitForm([], 'Save');
    $this->assertTrue($assert_session->waitForText('The configuration options have been saved.'));

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    $action_button = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $this->assertNotEmpty($action_button);
    $this->assertSame('View Commands for Cream cheese on a bagel', $action_button->getText());
  }

  /**
   * Confirms stage can be unlocked despite a missing Project Browser lock.
   *
   * @covers ::unlock
   */
  public function testCanBreakStageWithMissingProjectBrowserLock() {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();

    // Find a project we can install.
    $project_id = $this->chooseProjectToInstall();

    // Start install begin.
    $this->drupalGet('admin/modules/project_browser/install-begin');
    $this->installState->deleteAll();
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    // Try beginning another install while one is in progress, but not yet in
    // the applying stage.
    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $cream_cheese_button = $page->find('css', "$cream_cheese_module_selector button.project__action_button");
    $cream_cheese_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');

    $this->assertTrue($assert_session->waitForText('An install staging area claimed by Project Browser exists but has expired. You may unlock the stage and try the install again.'));

    // Click Unlock Install Stage link.
    $this->clickWithWait('#ui-id-1 > p > a');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    // Try beginning another install after breaking lock.
    $cream_cheese_button = $page->find('css', "$cream_cheese_module_selector button.project__action_button");
    $cream_cheese_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $installed_action = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector .project_status-indicator", 30000);
    $assert_session->waitForText('✓ Cream cheese on a bagel is Installed');
    $this->assertSame('✓ Cream cheese on a bagel is Installed', $installed_action->getText());

  }

  /**
   * Confirms the break lock link is available and works.
   *
   * The break lock link is not available once the stage is applying.
   *
   * @covers ::unlock
   */
  public function testCanBreakLock() {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();

    // Find a project we can install.
    $project_id = $this->chooseProjectToInstall(['cream_cheese']);

    // Start install begin.
    $this->drupalGet('admin/modules/project_browser/install-begin');
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    // Try beginning another install while one is in progress, but not yet in
    // the applying stage.
    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $cream_cheese_button = $page->find('css', "$cream_cheese_module_selector button.project__action_button");
    $cream_cheese_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $this->assertTrue($assert_session->waitForText('An install staging area claimed by Project Browser exists but has expired. You may unlock the stage and try the install again.'));
    // Click Unlock Install Stage link.
    $this->clickWithWait('#ui-id-1 > p > a');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    // Try beginning another install after breaking lock.
    $cream_cheese_button = $page->find('css', "$cream_cheese_module_selector button.project__action_button");
    $cream_cheese_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $installed_action = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector .project_status-indicator", 30000);
    $assert_session->waitForText('✓ Cream cheese on a bagel is Installed');
    $this->assertSame('✓ Cream cheese on a bagel is Installed', $installed_action->getText());
  }

  /**
   * Confirm that a status check error prevents download and install.
   */
  public function testPackageManagerErrorPreventsDownload(): void {
    // @see \Drupal\project_browser_test\TestInstallReadiness
    $this->container->get(StateInterface::class)
      ->set('project_browser_test.simulated_result_severity', SystemManager::REQUIREMENT_ERROR);

    $assert_session = $this->assertSession();
    $this->drupalGet('admin/modules/browse');
    $settings = $this->getDrupalSettings();
    $this->assertTrue($settings['project_browser']['package_manager']['status_checked']);
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    $assert_session->statusMessageContains("Simulate an error message for the project browser.", 'error');
    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $download_button_text = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button")
      ?->getText();
    $this->assertSame('View Commands for Cream cheese on a bagel', $download_button_text);
  }

  /**
   * Confirm that a status check warning allows download and install.
   */
  public function testPackageManagerWarningAllowsDownloadInstall(): void {
    // @see \Drupal\project_browser_test\TestInstallReadiness
    $this->container->get(StateInterface::class)
      ->set('project_browser_test.simulated_result_severity', SystemManager::REQUIREMENT_WARNING);

    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    $assert_session->statusMessageContains("Simulate a warning message for the project browser.", 'warning');
    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $download_button = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $this->assertNotEmpty($download_button);
    $this->assertSame('Select Cream cheese on a bagel', $download_button->getText());
    $download_button->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');
    $installed_action = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector .project_status-indicator", 30000);
    $this->assertNotEmpty($installed_action);
    $installed_action = $installed_action->waitFor(30, function ($button) {
      return $button->getText() === '✓ Cream cheese on a bagel is Installed';
    });
    $this->assertTrue($installed_action);
  }

  /**
   * Finds a project, from among the enabled sources, that can be installed.
   *
   * @param string[] $except_these_machine_names
   *   Project machine names that should be ignored.
   *
   * @return string
   *   The project ID to use.
   */
  private function chooseProjectToInstall(array $except_these_machine_names = []): string {
    $handler = $this->container->get(EnabledSourceHandler::class);
    $sources = $handler->getCurrentSources();

    foreach ($handler->getProjects() as $source_id => $projects) {
      $source = $sources[$source_id];

      foreach ($projects->list as $project) {
        if (in_array($project->machineName, $except_these_machine_names, TRUE)) {
          continue;
        }
        if (method_exists($source, 'isProjectSafe') && !$source->isProjectSafe($project)) {
          continue;
        }
        return $project->id;
      }
    }
    $this->fail("Could not find a project to install from amongst the enabled sources.");
  }

  /**
   * Tests the "Install selected projects" button functionality.
   */
  public function testMultipleModuleAddAndInstall(): void {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Cream cheese on a bagel');
    $this->svelteInitHelper('text', 'Kangaroo');
    $assert_session->buttonNotExists('Install selected projects');

    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $queue_button1 = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $this->assertNotEmpty($queue_button1);
    $this->assertSame('Select Cream cheese on a bagel', $queue_button1->getText());
    $queue_button1->click();
    $was_queued = $queue_button1->waitFor(10, fn ($button) => $button->getText() === 'Deselect Cream cheese on a bagel');
    $this->assertTrue($was_queued);

    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));

    $kangaroo_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(4)';
    $queue_button2 = $assert_session->waitForElementVisible('css', "$kangaroo_module_selector button.project__action_button");
    $this->assertNotEmpty($queue_button2);
    $this->assertSame('Select Kangaroo', $queue_button2->getText());
    $queue_button2->click();
    $was_dequeued = $queue_button2->waitFor(10, function ($button) {
      return $button->getText() === 'Deselect Kangaroo';
    });
    $this->assertTrue($was_dequeued);

    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
    $page->pressButton('Install selected projects');

    $installed_action = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector .project_status-indicator", 30000);
    $installed_action = $installed_action->waitFor(30, function ($button) {
      return $button->getText() === '✓ Cream cheese on a bagel is Installed';
    });
    $this->assertTrue($installed_action);

    $installed_action = $assert_session->waitForElementVisible('css', "$kangaroo_module_selector .project_status-indicator", 30000);
    $installed_action = $installed_action->waitFor(30, function ($button) {
      return $button->getText() === '✓ Kangaroo is Installed';
    });
    $this->assertTrue($installed_action);

    // The activator in project_browser_test should have logged a message.
    // @see \Drupal\project_browser_test\TestActivator
    $this->assertContains('Cream cheese on a bagel was activated!', $this->container->get(StateInterface::class)->get('test activator'));
    $this->assertContains('Kangaroo was activated!', $this->container->get(StateInterface::class)->get('test activator'));
  }

  /**
   * Tests that adding projects to queue is plugin specific.
   */
  public function testPluginSpecificQueue() {
    $assert_session = $this->assertSession();
    $this->container->get('module_installer')->install(['project_browser_devel'], TRUE);
    $this->drupalGet('admin/modules/browse');

    $assert_session->buttonNotExists('Install selected projects');
    $cream_cheese_module_selector = '#project-browser .pb-layout__main ul > li:nth-child(1)';
    $queue_button1 = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $queue_button1->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));

    $this->pressWithWait('random_data');
    $assert_session->buttonNotExists('Install selected projects');
    $random_data = '#project-browser .pb-layout__main ul > li:nth-child(2)';
    $queue_button2 = $assert_session->waitForElementVisible('css', "$random_data button.project__action_button");
    $this->assertNotEmpty($queue_button2);
    $queue_button2->click();
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));

    $this->pressWithWait('project_browser_test_mock');
    $queue_button1 = $assert_session->waitForElementVisible('css', "$cream_cheese_module_selector button.project__action_button");
    $queue_button1->click();
    $assert_session->buttonNotExists('Install selected projects');
    $this->pressWithWait('random_data');
    $this->assertNotEmpty($assert_session->waitForButton('Install selected projects'));
  }

}
