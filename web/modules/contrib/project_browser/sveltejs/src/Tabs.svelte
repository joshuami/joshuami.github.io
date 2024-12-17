<script>
  import { createEventDispatcher } from 'svelte';
  import { activeTab } from './stores';

  const { Drupal } = window;
  const dispatch = createEventDispatcher();

  // eslint-disable-next-line import/no-mutable-exports,import/prefer-default-export
  export let dataArray = [];
  let tabButtons;
</script>

<nav class="tabs-wrapper tabs-wrapper--secondary is-horizontal">
  <div
    role="tablist"
    id="plugin-tabs"
    aria-label={Drupal.t('Plugin tabs')}
    bind:this={tabButtons}
    class="tabs tabs--secondary pb-tabs"
  >
    {#each dataArray.map( (item) => ({ ...item, isActive: item.pluginId === $activeTab }), ) as { pluginId, pluginLabel, totalResults, isActive }}
      <span
        class="tabs__tab pb-tabs__tab"
        class:is-active={isActive === true}
        class:pb-tabs__tab--active={isActive === true}
      >
        <button
          type="button"
          role="tab"
          aria-selected={isActive ? 'true' : 'false'}
          aria-controls={pluginId}
          tabindex="0"
          id={pluginId}
          class="pb-tabs__link tabs__link"
          class:is-active={isActive === true}
          class:pb-tabs__link--active={isActive === true}
          value={pluginId}
          on:click={(event) => {
            dispatch('tabChange', {
              pluginId,
              event,
            });
          }}
        >
          {pluginLabel}
          <br />
          {Drupal.formatPlural(totalResults, '1 result', '@count results')}
          {#if isActive}
            <span class="visually-hidden">({Drupal.t('active tab')})</span>
          {/if}
        </button>
      </span>
    {/each}
  </div>
</nav>
