<script>
  import { PACKAGE_MANAGER } from '../constants';
  import { openPopup, getCommandsPopupMessage } from '../popup';
  import ProjectButtonBase from './ProjectButtonBase.svelte';
  import ProjectStatusIndicator from './ProjectStatusIndicator.svelte';
  import {
    addToQueue,
    queueList,
    removeFromQueue,
    updated,
    activeTab,
  } from '../stores';

  // eslint-disable-next-line import/no-mutable-exports,import/prefer-default-export
  export let project;

  const { Drupal } = window;

  // Check if a project is in the queue
  function isQueued(projectId) {
    let isInQueue = false;
    queueList.subscribe((currentList) => {
      if (currentList[$activeTab]) {
        isInQueue = currentList[$activeTab].some(
          (item) => item.id === projectId,
        );
      }
    })();
    return isInQueue;
  }

  function handleAddToQueueClick(singleProject) {
    addToQueue($activeTab, singleProject);
    $updated = new Date().getTime();
  }

  function handleDequeueClick(projectId) {
    removeFromQueue($activeTab, projectId);
    $updated = new Date().getTime();
  }
</script>

<div class="pb-actions">
  {#if !project.is_compatible}
    <ProjectStatusIndicator {project} statusText={Drupal.t('Not compatible')} />
  {:else if project.status === 'active'}
    <ProjectStatusIndicator {project} statusText={Drupal.t('Installed')}>
      <span class="pb-actions__icon" aria-hidden="true">&#10003&#x20</span>
    </ProjectStatusIndicator>
  {:else}
    <span>
      {#if PACKAGE_MANAGER.available && PACKAGE_MANAGER.errors.length === 0}
        {#if isQueued(project.id)}
          <ProjectButtonBase click={() => handleDequeueClick(project.id)}>
            {Drupal.t('Deselect')}<span class="visually-hidden"
              >{project.title}</span
            >
          </ProjectButtonBase>
        {:else}
          <ProjectButtonBase click={() => handleAddToQueueClick(project)}>
            {Drupal.t('Select')}<span class="visually-hidden"
              >{project.title}</span
            >
          </ProjectButtonBase>
        {/if}
      {:else if project.commands}
        {#if project.commands.match(/^https?:\/\//)}
          <a href={project.commands} target="_blank" rel="noreferrer"
            ><ProjectButtonBase>{Drupal.t('Install')}</ProjectButtonBase></a
          >
        {:else}
          <ProjectButtonBase
            aria-haspopup="dialog"
            click={() => openPopup(getCommandsPopupMessage(project), project)}
          >
            {Drupal.t('View Commands')}
            <span class="visually-hidden"
              >{Drupal.t(' for ')} {project.title}</span
            >
          </ProjectButtonBase>
        {/if}
      {/if}
    </span>
  {/if}
</div>
