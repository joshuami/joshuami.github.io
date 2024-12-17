<script>
  import { createEventDispatcher, getContext, onMount } from 'svelte';
  import {
    moduleCategoryFilter,
    moduleCategoryVocabularies,
    activeTab,
  } from './stores';
  import { normalizeOptions, shallowCompare } from './util';
  import { BASE_URL } from './constants';

  const { Drupal } = window;
  const dispatch = createEventDispatcher();
  const stateContext = getContext('state');

  let filterVisible = false;

  function showHideFilter() {
    filterVisible = !filterVisible;
    if (filterVisible) {
      setTimeout(() => {
        document
          .getElementsByClassName('pb-filter__checkbox-label')[0]
          .firstElementChild.focus();
      }, 50);
      return;
    }
    document
      .getElementsByClassName('pb-filter__multi-dropdown__items')[0]
      .focus();
  }

  function onBlur(event) {
    if (
      event.relatedTarget === null ||
      !document
        .getElementsByClassName('pb-filter__multi-dropdown')[0]
        .contains(event.relatedTarget)
    ) {
      filterVisible = false;
    }
  }

  function onKeyDown(event) {
    // Space to open category filter drop-down.
    if (
      event.key === ' ' &&
      event.target.classList.contains('pb-filter__multi-dropdown')
    ) {
      showHideFilter();
      event.preventDefault();
      return;
    }
    // Alt Up/Down opens/closes category filter drop-down.
    if (
      event.altKey &&
      (event.key === 'ArrowDown' || event.key === 'ArrowUp')
    ) {
      showHideFilter();
      event.preventDefault();
      return;
    }
    // Down arrow on checkbox moves to next checkbox.
    if (
      event.target.classList.contains('pb-filter__checkbox') &&
      event.key === 'ArrowDown' &&
      event.target.parentElement.nextElementSibling !== null
    ) {
      event.target.parentElement.nextElementSibling.firstElementChild.focus();
      event.preventDefault();
      return;
    }
    // Up arrow on checkbox moves to previous checkbox.
    if (
      event.target.classList.contains('pb-filter__checkbox') &&
      event.key === 'ArrowUp' &&
      event.target.parentElement.previousElementSibling !== null
    ) {
      event.target.parentElement.previousElementSibling.firstElementChild.focus();
      event.preventDefault();
      return;
    }
    // Tab moves off filter.
    if (event.key === 'Tab') {
      if (event.shiftKey) {
        // Shift+tab moves to search box.
        document.getElementById('pb-text').focus();
        event.preventDefault();
        return;
      }
      // Tab without shift moves to next filter.
      document.getElementsByName('securityCoverage')[0].focus();
      event.preventDefault();
      return;
    }

    // Escape closes filter drop-down.
    if (
      event.target.classList.contains('pb-filter__checkbox') &&
      event.key === 'Escape'
    ) {
      filterVisible = false;
      document.getElementsByClassName('pb-filter__multi-dropdown')[0].focus();
    }
  }

  async function onSelectCategory(event) {
    const state = stateContext.getState();
    const detail = {
      originalEvent: event,
      category: $moduleCategoryFilter,
      page: state.page,
      pageIndex: state.pageIndex,
      pageSize: state.pageSize,
      rows: state.filteredRows,
    };
    dispatch('selectCategory', detail);
    stateContext.setPage(0, 0);
    stateContext.setRows(detail.rows);
    filterVisible = true;
    if (event.target.classList.contains('pb-filter__checkbox')) {
      setTimeout(() => {
        event.target.focus();
      }, 50);
    }
  }

  async function fetchAllCategories() {
    const response = await fetch(`${BASE_URL}project-browser/data/categories`);
    if (response.ok) {
      return response.json();
    }
    return [];
  }

  const apiModuleCategory = fetchAllCategories();
  // eslint-disable-next-line import/no-mutable-exports,import/prefer-default-export
  export async function setModuleCategoryVocabulary() {
    apiModuleCategory.then((value) => {
      const normalizedValue = normalizeOptions(value[$activeTab]);
      const storedValue = $moduleCategoryVocabularies;
      if (
        storedValue === null ||
        !shallowCompare(normalizedValue, storedValue)
      ) {
        moduleCategoryVocabularies.set(normalizedValue);
      }
    });
  }
  onMount(async () => {
    await setModuleCategoryVocabulary();
  });
</script>

<div class="filter-group__filter-options form-item">
  <label for="pb-text" class="form-item__label"
    >{Drupal.t('Filter by category')}</label
  >
  {#await apiModuleCategory then categoryList}
    <div
      role="button"
      tabindex="0"
      class="pb-filter__multi-dropdown form-element form-element--type-select"
      on:click={() => {
        showHideFilter();
      }}
      on:blur={onBlur}
      on:keydown={onKeyDown}
    >
      <span class="pb-filter__multi-dropdown__label">
        {#if $moduleCategoryFilter.length > 0}
          {$moduleCategoryFilter.length === 1
            ? `${$moduleCategoryFilter.length} category selected`
            : `${$moduleCategoryFilter.length} categories selected`}
        {:else}
          {Drupal.t('Select categories')}
        {/if}
      </span>
      <div
        class="pb-filter__multi-dropdown__items
      pb-filter__multi-dropdown__items--{filterVisible ? 'visible' : 'hidden'}"
      >
        {#each categoryList[$activeTab] as dt}
          <div class="pb-filter__checkbox-label">
            <input
              type="checkbox"
              id={dt.id}
              class="pb-filter__checkbox form-checkbox form-boolean form-boolean--type-checkbox"
              bind:group={$moduleCategoryFilter}
              on:change={onSelectCategory}
              on:blur={onBlur}
              on:keydown={onKeyDown}
              value={dt.id}
            />
            <label for={dt.id} class="pb-filter__checkbox-label-txt">
              {dt.name}
            </label>
          </div>
        {/each}
      </div>
    </div>
  {/await}
</div>
