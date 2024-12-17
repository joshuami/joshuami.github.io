<script>
  import { get } from 'svelte/store';
  import { openPopup } from './popup';
  import { BASE_URL } from './constants';
  import { queueList, updated, activeTab, clearQueueForTab } from './stores';
  import Loading from './Loading.svelte';
  import LoadingEllipsis from './Project/LoadingEllipsis.svelte';

  let loading = false;

  const { Drupal } = window;

  const currentQueueList = get(queueList)[$activeTab] || [];
  const queueLength = Object.keys(currentQueueList).length;
  const projectsToActivate = [];
  const projectsToDownloadAndActivate = [];
  const handleError = async (errorResponse) => {
    // If an error occurred, set loading to false so the UI no longer reports
    // the download/install as in progress.
    loading = false;

    // The error can take on many shapes, so it should be normalized.
    let err = '';
    if (typeof errorResponse === 'string') {
      err = errorResponse;
    } else {
      err = await errorResponse.text();
    }
    try {
      // See if the error string can be parsed as JSON. If not, the block
      // is exited before the `err` string is overwritten.
      const parsed = JSON.parse(err);
      err = parsed;
    } catch (error) {
      // The catch behavior is established before the try block.
    }
    const errorMessage = err.message || err;

    // The popup function expects an element, so a div containing the error
    // message is created here for it to display in a modal.
    const div = document.createElement('div');
    if (err.unlock_url) {
      div.innerHTML += `<p>${errorMessage} <a href="${
        err.unlock_url
      }&destination=admin/modules/browse">${Drupal.t(
        'Unlock Install Stage',
      )}</a></p>`;
    } else {
      div.innerHTML += `<p>${errorMessage}</p>`;
    }
    openPopup(div, {
      title: 'Error while installing package(s)',
    });
  };

  /**
   * Actives already-downloaded projects.
   *
   * @param {string[]} projectIds
   *   An array of project IDs to activate.
   *
   * @return {Promise<void>}
   *   A promise that resolves when the project is activated.
   */
  async function activateProject(projectIds) {
    const url = `${BASE_URL}admin/modules/project_browser/activate`;

    const installResponse = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(projectIds),
    });

    if (!installResponse.ok) {
      await handleError(installResponse);
      loading = false;
      return;
    }
    let responseContent = await installResponse.text();
    try {
      const parsedJson = JSON.parse(responseContent);
      responseContent = parsedJson;
    } catch (err) {
      await handleError(installResponse);
    }
  }

  /**
   * Performs the requests necessary to download and activate project via Package Manager.
   *
   * @param {string[]} projectIds
   *   An array of project IDs to download and activate.
   *
   * @return {Promise<void>}
   *   Returns a promise that resolves once the download and activation process is complete.
   */
  async function doRequests(projectIds) {
    const beginInstallUrl = `${BASE_URL}admin/modules/project_browser/install-begin`;
    const beginInstallResponse = await fetch(beginInstallUrl);
    if (!beginInstallResponse.ok) {
      await handleError(beginInstallResponse);
    } else {
      const beginInstallData = await beginInstallResponse.json();
      const stageId = beginInstallData.stage_id;

      // The process of adding a module is separated into four stages, each
      // with their own endpoint. When one stage completes, the next one is
      // requested.
      const installSteps = [
        {
          url: `${BASE_URL}admin/modules/project_browser/install-require/${stageId}`,
          method: 'POST',
        },
        {
          url: `${BASE_URL}admin/modules/project_browser/install-apply/${stageId}`,
          method: 'GET',
        },
        {
          url: `${BASE_URL}admin/modules/project_browser/install-post_apply/${stageId}`,
          method: 'GET',
        },
        {
          url: `${BASE_URL}admin/modules/project_browser/install-destroy/${stageId}`,
          method: 'GET',
        },
      ];

      // eslint-disable-next-line no-restricted-syntax,guard-for-in
      for (const step of installSteps) {
        const options = {
          method: step.method,
        };

        // Additional options need to be added when the request method is POST.
        // This is specifically required for the `install-require` step.
        if (step.method === 'POST') {
          options.headers = {
            'Content-Type': 'application/json',
          };

          // Set the request body to include the project(s) id as an array.
          options.body = JSON.stringify(projectsToDownloadAndActivate);
        }
        // eslint-disable-next-line no-await-in-loop
        const stepResponse = await fetch(step.url, options);
        if (!stepResponse.ok) {
          // eslint-disable-next-line no-await-in-loop
          const errorMessage = await stepResponse.text();
          // eslint-disable-next-line no-console
          console.warn(
            `failed request to ${step.url}: ${errorMessage}`,
            stepResponse,
          );
          // eslint-disable-next-line no-await-in-loop
          await handleError(errorMessage);
          return;
        }
      }
      await activateProject(projectIds);
    }
  }

  async function processQueue() {
    // eslint-disable-next-line no-restricted-syntax,guard-for-in
    for (const proj of currentQueueList) {
      if (proj.status === 'absent') {
        projectsToDownloadAndActivate.push(proj.id);
      } else if (proj.status === 'present') {
        projectsToActivate.push(proj.id);
      }
    }
    loading = true;
    document.body.style.pointerEvents = 'none';
    if (projectsToActivate.length > 0) {
      await activateProject(projectsToActivate);
    }
    if (projectsToDownloadAndActivate.length > 0) {
      await doRequests(projectsToDownloadAndActivate);
    }
    loading = false;
    document.body.style.pointerEvents = 'auto';
    clearQueueForTab($activeTab);
    // eslint-disable-next-line no-restricted-syntax,guard-for-in
    for (const project of currentQueueList) {
      project.status = 'active';
    }
    $updated = new Date().getTime();
  }
</script>

<button
  class="project__action_button project__action_button--fixed"
  on:click={processQueue}
>
  {#if loading}
    <Loading />
    <LoadingEllipsis
      message={Drupal.formatPlural(
        queueLength,
        'Installing 1 project',
        'Installing @count projects',
      )}
    />
  {:else}
    {Drupal.t('Install selected projects')}
  {/if}
</button>
