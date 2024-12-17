const delayInMilliseconds = 100;
const filterKeywordSearch = '#pb-text';
const filterDropdownSelector = '.pb-filter__multi-dropdown';

module.exports = {
  '@tags': ['project_browser'],
  before(browser) {
    browser.drupalInstall().drupalInstallModule('project_browser_test', true);
  },
  after(browser) {
    browser.drupalUninstall();
  },
  'Project browser categories': (browser) => {
    const assertFocus = (selector, message) => {
      browser.execute(
        // eslint-disable-next-line func-names, prefer-arrow-callback, no-shadow
        function (selector) {
          return document.activeElement.matches(selector);
        },
        [selector],
        (result) => {
          browser.assert.ok(result.value, message);
        },
      );
    };
    function sendDownKey() {
      return this.actions().sendKeys(browser.Keys.ARROW_DOWN);
    }
    browser.drupalLoginAsAdmin(() => {
      // Open project browser settings page, enable the mock plugin, and disable
      // drupal.org and recipes.
      browser
        .drupalRelativeURL('/admin/config/development/project_browser')
        .waitForElementVisible(
          '#edit-enabled-sources-project-browser-test-mock-status',
        )
        .updateValue(
          '[data-drupal-selector="edit-enabled-sources-project-browser-test-mock-status"]',
          'enabled',
        )
        .updateValue(
          '[data-drupal-selector="edit-enabled-sources-drupalorg-jsonapi-status"]',
          'disabled',
        )
        // Check for presence of Recipe option, as won't exist for < Drupal 10.
        .element(
          'css selector',
          '#edit-enabled-sources-recipes-status',
          function disableRecipes(result) {
            if (result.status !== -1) {
              browser.updateValue(
                '[data-drupal-selector="edit-enabled-sources-recipes-status"]',
                'disabled',
              );
            }
          },
        )
        .click('[data-drupal-selector="edit-submit"]')
        .waitForElementVisible('[data-drupal-messages]')
        .assert.textContains(
          '[data-drupal-messages]',
          'The configuration options have been saved',
        );

      // Open project browser.
      browser
        .drupalRelativeURL('/admin/modules/browse')
        .waitForElementVisible('h1', delayInMilliseconds)
        .assert.textContains('h1', 'Browse projects')
        .waitForElementVisible(filterDropdownSelector);

      // Use mouse to get to search box, and verify it has active focus.
      browser.click(filterKeywordSearch);
      assertFocus(filterKeywordSearch, 'Assert search box has focus.');

      // Press tab to navigate search button.
      browser.keys(browser.Keys.TAB).pause(delayInMilliseconds);
      assertFocus(
        '.search__search-submit',
        'Assert that focus moves to search button on tab.',
      );
      browser
        .keys(browser.Keys.TAB)
        .pause(delayInMilliseconds)
        .assert.textEquals(
          '.pb-filter__multi-dropdown__label',
          'Select categories',
          'Assert that drop-down label has initial select message.',
        )
        .assert.not.visible(
          '.pb-filter__multi-dropdown__items',
          'Assert that category checkboxes are hidden.',
        );
      assertFocus(
        filterDropdownSelector,
        'Assert that focus moves to category drop-down on tab.',
      );

      // Press space to expand categories drop-down, verify focus moves to first
      // checkbox control.
      browser
        .keys(browser.Keys.SPACE)
        .assert.visible(
          '.pb-filter__multi-dropdown__items',
          'Assert category checkboxes are now visible.',
        )
        .pause(1000);
      assertFocus(
        '.pb-filter__checkbox-label:first-child .pb-filter__checkbox',
        'Assert that first category checkbox has focus.',
      );

      // Press down arrow key, verify focus moves to next checkbox.
      browser.perform(sendDownKey).pause(delayInMilliseconds);
      assertFocus(
        '.pb-filter__checkbox-label:nth-child(2) .pb-filter__checkbox',
        'Assert that second category checkbox has focus.',
      );

      // Press space key. Verify active checkbox checked.
      browser
        .keys(browser.Keys.SPACE)
        .pause(delayInMilliseconds)
        .assert.selected(
          '.pb-filter__checkbox-label:nth-child(2) .pb-filter__checkbox',
          'Assert second category is selected.',
        );

      // Press escape key. Verify category drop-down closes and focus goes to
      // overall drop-down.
      browser
        .keys(browser.Keys.ESCAPE)
        .pause(delayInMilliseconds)
        .assert.not.visible(
          '.pb-filter__checkbox',
          'Assert category checkboxes are hidden again.',
        )
        .assert.textEquals(
          '.pb-filter__multi-dropdown__label',
          '1 category selected',
          'Assert that Accessibility on drop-down label.',
        );
      assertFocus(
        filterDropdownSelector,
        'Assert that focus is back on drop-down list.',
      );

      // Verify Accessibility lozenge shown.
      browser.assert.textEquals(
        '.filter-applied:first-child .filter-applied__label',
        'Accessibility',
        'Assert that Accessibility lozenge is shown.',
      );

      // Press space to expand categories drop-down again.
      browser
        .keys(browser.Keys.SPACE)
        .pause(delayInMilliseconds)
        .assert.visible(
          '.pb-filter__multi-dropdown__items',
          'Assert category checkboxes are now visible.',
        );
      assertFocus(
        '.pb-filter__checkbox-label:first-child .pb-filter__checkbox',
        'Assert that first category checkbox has focus.',
      );

      // Press down arrow key to move to second checkbox.
      browser.perform(sendDownKey).pause(delayInMilliseconds);
      assertFocus(
        '.pb-filter__checkbox-label:nth-child(2) .pb-filter__checkbox',
        'Assert that second category checkbox has focus.',
      );

      // Press space key. Verify checkbox cleared.
      browser
        .keys(browser.Keys.SPACE)
        .pause(delayInMilliseconds)
        .assert.not.selected(
          '.pb-filter__checkbox-label:nth-child(2) .pb-filter__checkbox',
          'Assert second category is selected.',
        );

      // Press tab to navigate to next drop-down.
      browser
        .keys(browser.Keys.TAB)
        .pause(delayInMilliseconds)
        .assert.textEquals(
          '.pb-filter__multi-dropdown__label',
          'Select categories',
          'Assert that drop-down label has initial select message.',
        )
        .assert.not.visible(
          '.pb-filter__checkbox',
          'Assert category checkboxes are hidden again.',
        );
      assertFocus(
        '.filter-group__filter-options:nth-child(2) .search__filter-select',
        'Assert that focus has moved to next filter drop-down.',
      );

      // Verify Accessibility lozenge shown.
      browser.assert.not.elementPresent(
        '.filter-applied:first-child .filter-applied__label',
        'Assert that no filter lozenge.',
      );

      // Close out test.
      browser.drupalLogAndEnd({ onlyOnError: false });
    });
  },
};
