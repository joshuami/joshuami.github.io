<?php

declare(strict_types=1);

namespace Drupal\Tests\project_browser\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

// cspell:ignore cashpresso Adnuntius Paypage Redsys ZURB Superfish TMGMT Toki
// cspell:ignore Webtheme Pitchburgh Gotem Webform Bsecurity Bstatus Cardless

/**
 * ProjectBrowserUITest refactored to use the Drupal.org JSON API endpoint.
 *
 * @group project_browser
 */
class ProjectBrowserUiTestJsonApi extends WebDriverTestBase {

  use ProjectBrowserUiTestTrait;

  // Could be moved into trait under PHP 8.3.
  protected const SECURITY_OPTION_SELECTOR = 'select[name="securityCoverage"] ';
  protected const MAINTENANCE_OPTION_SELECTOR = 'select[name="maintenanceStatus"] ';
  protected const DEVELOPMENT_OPTION_SELECTOR = 'select[name="developmentStatus"] ';
  protected const OPTION_CHECKED = 'option:checked';
  protected const OPTION_FIRST_CHILD = 'option:first-child';
  protected const OPTION_LAST_CHILD = 'option:last-child';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
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
    $this->config('project_browser.admin_settings')->set('enabled_sources', ['drupalorg_jsonapi'])->save(TRUE);
    $this->drupalLogin($this->drupalCreateUser([
      'administer modules',
      'administer site configuration',
    ]));
  }

  /**
   * Tests the grid view.
   */
  public function testGrid(): void {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();

    $this->getSession()->resizeWindow(1250, 1000);
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('css', '.pb-project.pb-project--grid');
    $assert_session->waitForElementVisible('css', '#project-browser .pb-display__button[value="Grid"]');
    $grid_text = $this->getElementText('#project-browser .pb-display__button[value="Grid"]');
    $this->assertEquals('Grid', $grid_text);
    $this->assertTrue($assert_session->waitForText('Results'));
    $assert_session->pageTextNotContains('No records available');
    $page->pressButton('List');
    $this->assertNotNull($assert_session->waitForElementVisible('css', '#project-browser .pb-project.pb-project--list'));
    $assert_session->elementsCount('css', '#project-browser .pb-project.pb-project--list', 12);
    $page->pressButton('Grid');
    $this->assertNotNull($assert_session->waitForElementVisible('css', '#project-browser .pb-project.pb-project--grid'));
    $this->getSession()->resizeWindow(1100, 1000);
    $assert_session->assertNoElementAfterWait('css', '.toggle.list-button');
    $this->assertNotNull($assert_session->waitForElementVisible('css', '#project-browser .pb-project.pb-project--list'));
    $assert_session->elementsCount('css', '#project-browser .pb-project.pb-project--list', 12);
    $this->getSession()->resizeWindow(1210, 1210);
    $this->assertNotNull($assert_session->waitForElementVisible('css', '#project-browser .pb-project.pb-project--grid'));
    $assert_session->elementsCount('css', '#project-browser .pb-project.pb-project--grid', 12);
  }

  /**
   * Tests the available categories.
   */
  public function testCategories(): void {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('css', '.pb-filter__multi-dropdown input[type="checkbox"]');
    $assert_session->elementsCount('css', '.pb-filter__multi-dropdown input[type="checkbox"]', 19);
  }

  /**
   * Tests the clickable category functionality.
   */
  public function testClickableCategory(): void {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Oswald chatbot');
    $assert_session->waitForButton('Oswald chatbot')->click();
  }

  /**
   * Tests category filtering.
   */
  public function testCategoryFiltering(): void {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('css', '.pb-filter__multi-dropdown');
    // Initial results count on page load.
    $this->assertTrue($assert_session->waitForText('1,867 Results'));
    // Open category drop-down.
    $this->clickWithWait('.pb-filter__multi-dropdown', 'E-commerce', TRUE);

    $this->svelteInitHelper('css', '#c69d3284-cf3c-4096-8124-33df86771e6f');
    // Click 'E-commerce' checkbox.
    $this->clickWithWait('#c69d3284-cf3c-4096-8124-33df86771e6f');

    // Use blur event to close drop-down so Clear is visible.
    $this->assertSession()->elementExists('css', '.pb-filter__multi-dropdown')->blur();

    $module_category_e_commerce_filter_selector = 'p.filter-applied:nth-child(1)';
    // Make sure the 'E-commerce' module category filter is applied.
    $this->assertEquals('E-commerce', $this->getElementText("$module_category_e_commerce_filter_selector .filter-applied__label"));

    // This call has the second argument, `$reload`, set to TRUE due to it
    // failing on ~2% of GitLabCI test runs. It is not entirely clear why this
    // specific call intermittently fails while others do not. It's known the
    // Svelte app has occasional initialization problems on GitLabCI that are
    // reliably fixed by a page reload, so we allow that here to prevent random
    // failures that are not representative of real world use.
    $this->assertProjectsVisible([
      'Oswald chatbot', 'Arch', 'Commerce cashpresso', 'AdSense User Consent', 'SKU prefix promotion condition', 'SynCart', 'Adnuntius', 'Commerce Exchanger', 'Address autocomplete (with Photon API)', 'Commerce KBC Paypage', 'Redsys payment module', 'Commerce Order Bulk Delete',
    ], TRUE);

    // Clear the checkbox to verify the results revert to their initial state.
    $this->clickWithWait('.pb-filter__multi-dropdown', 'E-commerce', TRUE);
    $this->svelteInitHelper('css', '#c69d3284-cf3c-4096-8124-33df86771e6f');
    $this->clickWithWait('#c69d3284-cf3c-4096-8124-33df86771e6f', '1,867 Results');
    $this->assertSession()->elementExists('css', '.pb-filter__multi-dropdown')->blur();

    $this->pressWithWait('Clear filters', '2,390 Results');

    // Open category drop-down.
    $assert_session->elementExists('css', '.pb-filter__multi-dropdown')->click();

    // Click 'Media' checkbox.
    $this->clickWithWait('#f70e387f-73be-4523-8af2-a7f7cab8caf6');
    $this->assertTrue($assert_session->waitForText('192 Results'));

    // Click 'Developer Tools' checkbox.
    $this->clickWithWait('#aaed2fd3-3ea0-4cbd-969a-66cdfa4255e3');

    // Make sure the 'Media' module category filter is applied.
    $this->assertEquals('Media', $this->getElementText('p.filter-applied:nth-child(2) .filter-applied__label'));
    // Assert that only media and developer tools module categories are shown.
    $this->assertProjectsVisible([
      'Flex Processor', 'ZURB Foundation Utility', 'Cucumber Core', 'Preprocessor Files', 'Media Entity PodToo', 'Forecast.Solar', 'Field Group', 'Superfish', 'Form Tips', 'Node Revision Delete', 'Anonymous Redirect', 'Virtual Keyboard',
    ]);
    $this->assertTrue($assert_session->waitForText('732 Results'));
  }

  /**
   * Tests the Target blank functionality.
   */
  public function testTargetBlank(): void {
    $assert_session = $this->assertSession();
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Oswald chatbot');
    $assert_session->waitForButton('Oswald chatbot')->click();
  }

  /**
   * Tests paging through results.
   */
  public function testPaging(): void {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', '1,867 Results');

    $this->assertProjectsVisible([
      'Oswald chatbot', 'Arch', 'AT Internet SmartTag for TacJS', 'Orange DAM', 'Simple Secret Registration Code', 'Authenticate by mail', 'Preprocessor Files', 'Noindex on empty views', 'ECA Maestro', 'VBO Maestro', 'Custom Admin URL', 'Media Entity PodToo',
    ]);
    $this->assertPagerItems(['1', '2', '3', '4', '5', '…', 'Next', 'Last']);

    $page->pressButton('Clear filters');
    $this->assertTrue($assert_session->waitForText('2,390 Results'));
    $this->assertProjectsVisible([
      'Mail Actions', 'User Selected Formatter', 'Flex Processor', 'Site integrator', 'AI Translation Management (TMGMT)', 'Tiki Toki', 'Webpage', 'Oswald chatbot', 'Arch', 'Entity Cache Rebuild', 'ZURB Foundation Utility', 'AT Internet SmartTag for TacJS',
    ]);
    $this->assertPagerItems(['1', '2', '3', '4', '5', '…', 'Next', 'Last']);
    $assert_session->elementExists('css', '.pager__item--active > .is-active[aria-label="Page 1"]');

    $this->clickWithWait('[aria-label="Next page"]');
    $this->assertProjectsVisible([
      'Webtheme Default Content', 'Orange DAM', 'Web Doc', 'Simple Secret Registration Code', 'Domain Permissions', 'Authenticate by mail', 'Decoupled Layout Builder Pitchburgh Modules', 'Cucumber Core', 'Cucumber User Roles', 'Greeting Cards', 'Preprocessor Files', 'Noindex on empty views',
    ]);
    $this->assertPagerItems(['First', 'Previous', '1', '2', '3', '4', '5', '6', '…', 'Next', 'Last']);

    $this->clickWithWait('[aria-label="Next page"]');
    $this->assertProjectsVisible([
      'Entity Holder', 'ECA Maestro', 'VBO Maestro', 'Custom Admin URL', 'Media Entity PodToo', 'Forecast.Solar', 'Field IP address PostgreSQL', 'Disable libraries', 'Commerce Squad', 'Field Group', 'User Revision', 'Alerts',
    ]);
    $this->assertPagerItems(['First', 'Previous', '1', '2', '3', '4', '5', '6', '7', '…', 'Next', 'Last']);

    // Ensure that when the number of projects is even divisible by the number
    // shown on a page, the pager has the correct number of items.
    $this->clickWithWait('[aria-label="First page"]');

    // Open category drop-down.
    $assert_session->elementExists('css', '.pb-filter__multi-dropdown')->click();

    // Click 'Accessibility' checkbox.
    $this->clickWithWait('#bafb1104-72cd-4a74-bdcd-3610be685fc5', '', TRUE);

    // Click 'E-commerce' checkbox.
    $this->clickWithWait('#c69d3284-cf3c-4096-8124-33df86771e6f', bypass_wait: TRUE);

    // Click 'Media' checkbox.
    $this->clickWithWait('#f70e387f-73be-4523-8af2-a7f7cab8caf6', '331 Results', TRUE);
    $this->assertPagerItems(['1', '2', '3', '4', '5', '…', 'Next', 'Last']);
  }

  /**
   * Tests advanced filtering.
   */
  public function testAdvancedFiltering(): void {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Oswald chatbot');
    $this->pressWithWait('Clear filters');
    $this->pressWithWait('Recommended filters');
    $this->assertProjectsVisible([
      'Oswald chatbot', 'Arch', 'AT Internet SmartTag for TacJS', 'Orange DAM', 'Simple Secret Registration Code', 'Authenticate by mail', 'Preprocessor Files', 'Noindex on empty views', 'ECA Maestro', 'VBO Maestro', 'Custom Admin URL', 'Media Entity PodToo',
    ]);

    // Make sure the second filter applied is the security covered filter.
    $option = $assert_session->optionExists('securityCoverage', '1');
    $this->assertSame('Show projects covered by a security policy', $option->getText());
    $this->assertTrue($option->isSelected());

    // Clear the security covered filter.
    $this->clickWithWait(self::SECURITY_OPTION_SELECTOR . self::OPTION_LAST_CHILD);
    $this->assertProjectsVisible([
      'Mail Actions', 'User Selected Formatter', 'Flex Processor', 'Site integrator', 'AI Translation Management (TMGMT)', 'Tiki Toki', 'Webpage', 'Oswald chatbot', 'Arch', 'Entity Cache Rebuild', 'ZURB Foundation Utility', 'AT Internet SmartTag for TacJS',
    ]);

    // Click the Active filter.
    $assert_session->waitForElementVisible('css', self::DEVELOPMENT_OPTION_SELECTOR);
    $this->clickWithWait(self::DEVELOPMENT_OPTION_SELECTOR . self::OPTION_FIRST_CHILD);

    // Make sure the correct filter was applied.
    $this->assertEquals('Show projects under active development', $this->getElementText(self::DEVELOPMENT_OPTION_SELECTOR . self::OPTION_CHECKED));
    $assert_session->waitForText('No records available');

    // Clear all filters.
    $this->pressWithWait('Clear filters', 'Results');

    // Click the Actively maintained filter.
    $this->clickWithWait(self::MAINTENANCE_OPTION_SELECTOR . self::OPTION_FIRST_CHILD, '2,328 Results');
    $this->assertEquals('Show actively maintained projects', $this->getElementText(self::MAINTENANCE_OPTION_SELECTOR . self::OPTION_CHECKED));

    $this->assertProjectsVisible([
      'Mail Actions', 'User Selected Formatter', 'Flex Processor', 'Site integrator', 'AI Translation Management (TMGMT)', 'Tiki Toki', 'Webpage', 'Oswald chatbot', 'Arch', 'Entity Cache Rebuild', 'ZURB Foundation Utility', 'AT Internet SmartTag for TacJS',
    ]);
  }

  /**
   * Tests sorting criteria.
   */
  public function testSortingCriteria(): void {
    // Clear filters.
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Clear Filters');
    $this->pressWithWait('Clear filters');

    // Select 'Recently created' option.
    $this->sortBy('created');

    // Assert that the projects are listed in descending order of their date of
    // creation.
    $this->assertProjectsVisible([
      'Gotem Content Moderation', 'Views field comparison', 'Discord Notifications', 'Group XML Sitemap', 'CKEditor5 Youtube', 'Site Studio Webform Element', 'AI: Summarize Document', 'Taxonomy Term Replace', 'SVG sprite field', 'AI Translation Management (TMGMT)', 'Page Deletion Guard', 'SDC -  Component library',
    ]);
  }

  /**
   * Tests search with strings that need URI encoding.
   */
  public function testSearchForSpecialChar(): void {
    $this->markTestSkipped('We are using mocks of real data from Drupal.org, what we currently have does not have content suitable for this test.');
  }

  /**
   * Tests the detail page.
   */
  public function testDetailPage(): void {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Oswald chatbot');
    $assert_session->waitForButton('Oswald chatbot')->click();
  }

  /**
   * Tests that filtering, sorting, paging persists.
   */
  public function testPersistence(): void {
    $this->markTestSkipped('Testing this with the JSON Api endpoint is not needed. The feature is not source dependent.');
  }

  /**
   * Tests recommended filters.
   */
  public function testRecommendedFilter(): void {
    $assert_session = $this->assertSession();
    // Clear filters.
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('text', 'Clear Filters');
    $this->pressWithWait('Clear filters', 'Results');
    $this->pressWithWait('Recommended filters');

    // Check that the actively maintained tag is present.
    $maintenance_checked_option = $this->assertSession()->optionExists('maintenanceStatus', '1');
    $this->assertTrue($maintenance_checked_option->isSelected());
    $this->assertEquals('Show actively maintained projects', $maintenance_checked_option->getText());
    // Make sure the second filter applied is the security covered filter.
    $assert_session->fieldValueEquals('securityCoverage', '1');
    $this->assertTrue($assert_session->waitForText('1,867 Results'));
  }

  /**
   * Tests multiple source plugins at once.
   */
  public function testMultiplePlugins(): void {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();
    // Enable module for extra source plugin.
    $this->container->get('module_installer')->install(['project_browser_devel']);
    // Test categories with multiple plugin enabled.
    $this->drupalGet('admin/modules/browse');

    /** @var \Behat\Mink\Element\NodeElement $categories_filter */
    $categories_filter = $page->waitFor(10, fn ($page) => $page->find('css', '.pb-filter__multi-dropdown'));
    $this->assertCount(19, $categories_filter->findAll('css', 'input[type="checkbox"]'));

    // Count tabs.
    $tabs = $page->waitFor(10, fn ($page) => $page->findAll('css', '.pb-tabs__link'));
    $this->assertCount(2, $tabs);
    $assert_session->pageTextContains('1,867 Results');
    // Get second tab text.
    $second_tab_text = $tabs[1]->getText();

    $page->pressButton('Clear filters');
    $this->waitForPageToContainText('2,390 Results');

    // Open category drop-down.
    $categories_filter->click();
    // Click 'E-commerce' checkbox.
    $this->waitForField('E-commerce', $categories_filter)->check();
    $this->waitForPageToContainText('105 Results');
    // Clicking the 'Developer Tools' checkbox updates first tab results.
    $this->waitForField('Developer Tools', $categories_filter)->check();
    $this->waitForPageToContainText('676 Results');
    // Applying filters will not change second tab results.
    $this->assertSame($second_tab_text, $assert_session->buttonExists('random_data')->getText());

    // Use blur event to close drop-down so Clear is visible.
    $categories_filter->blur();
    $this->assertSame('2 categories selected', $categories_filter->find('css', '.pb-filter__multi-dropdown__label')?->getText());

    // Click other tab.
    $this->pressWithWait('random_data');
    // Open category drop-down.
    $categories_filter->click();
    /** @var \Behat\Mink\Element\NodeElement[] $categories */
    $categories = $categories_filter->waitFor(10, fn ($element) => $element->findAll('css', 'input[type="checkbox"]'));
    $this->assertCount(20, $categories);

    // Apply the second module category filter.
    $this->clickWithWait($categories[1]);

    // Assert that the filters persist.
    $second_label_text = $assert_session->elementExists('css', '.pb-filter__checkbox-label-txt', $categories[1]->getParent())
      ->getText();
    $this->waitForElementToContainText($categories_filter->find('css', '.pb-filter__multi-dropdown__label'), '1 category selected');

    // Save the filter applied in second tab.
    $applied_filter = $this->getElementText('p.filter-applied:nth-child(1) .filter-applied__label');
    // Save the number of results.
    $results_before = count($page->findAll('css', '#project-browser .pb-project.pb-project--list'));

    // Switch back to first tab.
    $this->pressWithWait('drupalorg_jsonapi');
    $this->waitForPageToContainText('Developer Tools');
    $first_filter_element = $page->find('css', 'p.filter-applied:nth-child(1)');
    $this->assertEquals('Developer Tools', $first_filter_element->find('css', '.filter-applied__label')->getText());
    $second_filter_element = $page->find('css', 'p.filter-applied:nth-child(2)');
    $this->assertEquals('E-commerce', $second_filter_element->find('css', '.filter-applied__label')->getText());
    $this->assertSame('2 categories selected', $page->find('css', '.pb-filter__multi-dropdown__label')->getText());

    // Again switch to second tab.
    $this->pressWithWait('random_data');
    // Assert that the filters persist.
    $this->assertEquals($applied_filter, $this->getElementText('p.filter-applied:nth-child(1) .filter-applied__label'));
    $this->assertSame('1 category selected', $page->find('css', '.pb-filter__multi-dropdown__label')->getText());

    // Assert that the number of results is the same.
    $results_after = count($page->findAll('css', '#project-browser .pb-project.pb-project--list'));
    $this->assertEquals($results_before, $results_after);

    // Switch back to first tab.
    $this->pressWithWait('drupalorg_jsonapi');
    // Filter by search text.
    $this->inputSearchField('th', TRUE);
    $assert_session->waitForElementVisible('css', ".search__search-submit")->click();
    $this->assertTrue($assert_session->waitForText('1 Result'));
    $this->assertProjectsVisible([
      'WCAG Drawer',
    ]);
    // Again switch to second tab.
    $this->pressWithWait('random_data');
    // Switch back to first tab.
    $this->pressWithWait('drupalorg_jsonapi');
    $this->svelteInitHelper('css', '#project-browser .pb-project');
    // Assert that the filters persist.
    $this->assertTrue($assert_session->waitForText('1 Result'));
    $this->assertProjectsVisible([
      'WCAG Drawer',
    ]);
  }

  /**
   * Tests filters are displayed if they are defined by source.
   */
  public function testFiltersShownIfDefinedBySource(): void {
    if (version_compare(\Drupal::VERSION, '10.3', '<')) {
      $this->markTestSkipped('This test requires Drupal 10.3 or later.');
    }
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();
    // Enable module for extra source plugin.
    $this->container->get('module_installer')->install(['project_browser_devel']);
    $this->config('project_browser.admin_settings')
      ->set('enabled_sources', ['recipes', 'project_browser_test_mock'])
      ->save();

    $this->drupalGet('admin/modules/browse');
    $this->assertTrue($assert_session->waitForText('Recipes'));
    $page->pressButton('Recipes');
    // Recipes doesn't define any filters so no filters are displayed.
    $this->assertNull($assert_session->waitForElementVisible('css', '.search__form-filters-container'));

    // Set the names of filters which will be defined by the test mock.
    // @see \Drupal\project_browser_test\Plugin\ProjectBrowserSource\ProjectBrowserTestMock::getFilterDefinitions()
    $filters_to_define = ['maintenanceStatus', 'securityCoverage'];
    \Drupal::state()->set('filters_to_define', $filters_to_define);

    $this->drupalGet('admin/modules/browse');
    $this->assertTrue($assert_session->waitForText('Project Browser Mock Plugin'));
    $page->pressButton('Project Browser Mock Plugin');
    // Drupal.org test mock defines only two filters (actively maintained filter
    // and security coverage filter).
    $assert_session->waitForElementVisible('css', '.search__form-filters-container');
    $this->assertTrue($assert_session->waitForText('Maintenance status'));
    $assert_session->waitForElementVisible('css', self::MAINTENANCE_OPTION_SELECTOR);
    $this->assertTrue($assert_session->waitForText('Security advisory coverage'));
    $assert_session->waitForElementVisible('css', self::SECURITY_OPTION_SELECTOR);
    // Make sure no other filters are displayed.
    $this->assertFalse($assert_session->waitForText('Development status'));
    $this->assertNull($assert_session->waitForElementVisible('css', self::DEVELOPMENT_OPTION_SELECTOR));
    $this->assertFalse($assert_session->waitForText('Filter by category'));
    // Make sure category filter element is not visible.
    $this->assertNull($assert_session->waitForElementVisible('css', 'div.search__form-filters-container > div.search__form-filters > section > fieldset > div'));
  }

  /**
   * Tests the view mode toggle keeps its state.
   */
  public function testToggleViewState(): void {
    $assert_session = $this->assertSession();
    $viewSwitches = [
      [
        'selector' => '.pb-display__button[value="Grid"]',
        'value' => 'Grid',
      ], [
        'selector' => '.pb-display__button[value="List"]',
        'value' => 'List',
      ],
    ];
    $this->getSession()->resizeWindow(1300, 1300);

    foreach ($viewSwitches as $selector) {
      $this->drupalGet('admin/modules/browse');
      $this->svelteInitHelper('css', $selector['selector']);
      $this->getSession()->getPage()->pressButton($selector['value']);
      $this->svelteInitHelper('text', 'Oswald chatbot');
      $assert_session->waitForButton('Oswald chatbot')->click();
      $this->svelteInitHelper('text', 'Close');
      $assert_session->waitForButton('Close')->click();
      $this->assertSession()->elementExists('css', $selector['selector'] . '.pb-display__button--selected');
    }
  }

  /**
   * Tests tabledrag on configuration page.
   */
  public function testTabledrag(): void {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();
    $this->container->get('module_installer')->install(['project_browser_devel']);

    $this->drupalGet('admin/modules/browse');
    $assert_session->waitForElementVisible('css', '.pb-display__button');
    // Count tabs.
    $tab_count = $page->findAll('css', '.pb-tabs__link');
    $this->assertCount(2, $tab_count);

    // Verify that the mock plugin is first tab.
    $first_tab = $page->find('css', '.pb-tabs__link:nth-child(1)');
    $this->assertEquals('drupalorg_jsonapi', $first_tab->getValue());

    // Re-order plugins.
    $this->drupalGet('admin/config/development/project_browser');
    $first_plugin = $page->find('css', '#source--drupalorg_jsonapi');
    $second_plugin = $page->find('css', '#source--random_data');
    $first_plugin->find('css', '.tabledrag-handle')->dragTo($second_plugin);
    $this->assertTableRowWasDragged($first_plugin);
    $this->submitForm([], 'Save');

    // Verify that Random data is first tab.
    $this->drupalGet('admin/modules/browse');
    $assert_session->waitForElementVisible('css', '#project-browser .pb-project');
    $first_tab = $page->find('css', '.pb-tabs__link:nth-child(1)');
    $this->assertEquals('random_data', $first_tab->getValue());

    // Disable the mock plugin.
    $this->drupalGet('admin/config/development/project_browser');
    $enabled_row = $page->find('css', '#source--drupalorg_jsonapi');
    $disabled_region_row = $page->find('css', '.status-title-disabled');
    $enabled_row->find('css', '.handle')->dragTo($disabled_region_row);
    $this->assertTableRowWasDragged($enabled_row);
    $this->submitForm([], 'Save');
    $assert_session->pageTextContains('The configuration options have been saved.');

    // Verify that only Random data plugin is enabled.
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('css', '.pb-filter__multi-dropdown input[type="checkbox"]');
    $assert_session->elementsCount('css', '.pb-filter__multi-dropdown input[type="checkbox"]', 20);

    $this->config('project_browser.admin_settings')->set('enabled_sources', ['project_browser_test_mock'])->save(TRUE);
    $this->drupalGet('admin/config/development/project_browser');
    $this->assertTrue($assert_session->optionExists('edit-enabled-sources-project-browser-test-mock-status', 'enabled')->isSelected());
    $this->assertTrue($assert_session->optionExists('edit-enabled-sources-random-data-status', 'disabled')->isSelected());

    // Verify that only the mock plugin is enabled.
    $this->drupalGet('admin/modules/browse');
    $this->svelteInitHelper('css', '.pb-filter__multi-dropdown input[type="checkbox"]');
    $assert_session->elementsCount('css', '.pb-filter__multi-dropdown input[type="checkbox"]', 19);
  }

}
