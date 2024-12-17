/**
 * Drupal initializer.
 * Launch as behavior and pull variables from config.
 */

  // Prevent multiple inits in modules that re-trigger the document context.
let ed11yOnce;
let ed11yInitialized;
let ed11yWaiting = false;

const ed11yInitializer = function () {
  /**
   * Initiate library
   *
   * */

  if (ed11yInitialized === 'disabled' ||
    ed11yInitialized === 'pending') {
    return;
  }
  ed11yInitialized = 'pending';

  let options = {};

  // todo postpone: store dismissalKeys for PDFs in page results, and check dismissals table for page level matches on load.

  options.checkRoots = drupalSettings.editoria11y.content_root ?
    drupalSettings.editoria11y.content_root :
    false;
  options.ignoreElements = !!drupalSettings.editoria11y.ignore_elements ?
    `#toolbar-administration *, ${drupalSettings.editoria11y.ignore_elements}` :
    '#toolbar-administration *';
  options.panelNoCover = !!drupalSettings.editoria11y.panel_no_cover ?
    drupalSettings.editoria11y.panel_no_cover :
    '#klaro-cookie-notice, #klaro_toggle_dialog, .same-page-preview-dialog.ui-dialog-position-side, #gin_sidebar';
  options.ignoreAllIfAbsent = !!drupalSettings.editoria11y.ignore_all_if_absent ?
    drupalSettings.editoria11y.ignore_all_if_absent :
    false;

  const editors = (Drupal.editors && (Object.hasOwn(Drupal.editors, 'ckeditor5') || Object.hasOwn(Drupal.editors, 'gutenberg')));

  let delay = drupalSettings.path.currentPathIsAdmin ? 250 : 0;
  // Way too many race conditions on admin side.
  if (document.URL.indexOf('mode=same_page_preview') > -1) {
    // todo: would need an web worker dance like WP to show issue highlights.
    ed11yOnce = true;
    ed11yInitialized = 'disabled';
    return;
  } else if (drupalSettings.path.currentPathIsAdmin &&
    (!!drupalSettings.editoria11y.disable_live || !editors)
  ) {
    // Ed11y will init later if a behavior brings in something editable.
    ed11yInitialized = false;
    return;
  }

  if (document.querySelector('.layout-builder-form')) {
    // Layout builder checking currently disabled; it breaks scroll.
    ed11yOnce = true;
    ed11yInitialized = 'disabled';
    return;
    /*if (!!drupalSettings.editoria11y.disable_live) {
      return;
    }
    options.inlineAlerts = false;
    delay = 250;*/
  } else if (editors) {
    // Editable content is present.
    // But we don't try to check live inside layout builder.
    if (drupalSettings.path.currentPathIsAdmin &&
      !!drupalSettings.editoria11y.disable_live) {
      // Don't disable in frontend for comment fields.
      ed11yOnce = true;
      ed11yInitialized = 'disabled';
      return;
    }
    options.inlineAlerts = false;
    if (Object.hasOwn(Drupal.editors, 'gutenberg')) {
      options.ignoreAriaOnElements = 'h1,h2,h3,h4,h5,h6';
      delay = 1000;
      window.setTimeout(function () {
        if (Ed11y.results.length === 0) {
          // Ed11y fails to initialize if Gutenberg is really late.
          Ed11y.checkAll();
        }
      }, 6000);
    }
    options.checkRoots = '.gutenberg__editor .is-root-container, [contenteditable="true"]:not(.gutenberg__editor [contenteditable], [contenteditable="true"] [contenteditable])';
    options.ignoreElements += ', [hidden], [style*="display: none"], [style*="display:none"], [hidden] *, [style*="display: none"] *, [style*="display:none"] *, [data-drupal-message-type]';
    // todo merge
    options.ignoreAllIfAbsent = options.ignoreAllIfAbsent ?
      options.ignoreAllIfAbsent + ', [contenteditable="true"], .gutenberg__editor .is-root-container':
      '[contenteditable="true"], .gutenberg__editor .is-root-container';

    //options.ignoreAllIfAbsent = '[contenteditable="true"], .gutenberg__editor .is-root-container';
    options.editorHeadingLevel = [];
    if (drupalSettings.editoria11y.live_h2) {
      options.editorHeadingLevel.push(
        {
          selector: drupalSettings.editoria11y.live_h2,
          previousHeading: 1,
        }
      );
    }
    if (drupalSettings.editoria11y.live_h3) {
      options.editorHeadingLevel.push(
        {
          selector: drupalSettings.editoria11y.live_h3,
          previousHeading: 2,
        }
      );
    }
    if (drupalSettings.editoria11y.live_h4) {
      options.editorHeadingLevel.push(
        {
          selector: drupalSettings.editoria11y.live_h4,
          previousHeading: 3,
        }
      );
    }
    if (drupalSettings.editoria11y.live_h_inherit) {
      options.editorHeadingLevel.push(
        {
          selector: drupalSettings.editoria11y.live_h_inherit,
          previousHeading: 'inherit',
        }
      );
    }
    options.editorHeadingLevel.push({
      selector: '*',
      previousHeading: 0, // Ignores first heading for level skip detection.
    })
  }

  ed11yOnce = true;

  let urlParams = new URLSearchParams(window.location.search);
  let lang = drupalSettings.editoria11y.lang ? drupalSettings.editoria11y.lang : 'en';

  if (lang !== 'en') {
    lang = 'dynamic';
    ed11yLang.dynamic = ed11yLangDrupal;
    options.langSanitizes = true; // Use Drupal string sanitizer.
  }

  let ed11yAlertMode = drupalSettings.editoria11y.assertiveness ? drupalSettings.editoria11y.assertiveness : 'assertive';
  // If assertiveness is "smart" we set it to assertive if the doc was recently changed.
  const now = new Date();
  if (drupalSettings.path.currentPathIsAdmin && (Drupal.editors && (Object.hasOwn(Drupal.editors, 'ckeditor5') || Object.hasOwn(Drupal.editors, 'gutenberg'))) && drupalSettings.editoria11y.assertiveness !== 'polite') {
    ed11yAlertMode = 'active';
  }
  else if (
    urlParams.has('ed1ref') ||
    (ed11yAlertMode === 'smart' &&
      ((now / 1000) - drupalSettings.editoria11y.changed < 60)
    )
  ) {
    ed11yAlertMode = 'assertive';
  }

  options.lang = lang;
  options.ignoreByKey = {
    'p': 'table:not(.field-multiple-table) p',
    'h': '.filter-guidelines-item *, nav *, [id$="-local-tasks"] *, .tabledrag h4',
    // disable alt text tests on unspoken images
    'img': '[aria-hidden], [aria-hidden] img',
    // disable link text check on disabled links:
    'a': `[aria-hidden][tabindex], [id$="-local-tasks"] a, .filter-help > a, .contextual-region > nav a ${drupalSettings.path.currentPathIsAdmin ? ', a[target="_blank"]' : ''}`,
    // 'li': false,
    // 'blockquote': false,
    // 'iframe': false,
    // 'audio': false,
    // 'video': false,
    'table': '[role="presentation"], .tabledrag',
    // todo: report h4 and th issue in docroot/core/includes/theme.inc
  };
  options.alertMode = ed11yAlertMode;
  options.currentPage = drupalSettings.editoria11y.page_path;
  options.allowHide = !!drupalSettings.editoria11y.allow_hide;
  options.allowOK = !!drupalSettings.editoria11y.allow_ok;
  options.syncedDismissals = drupalSettings.editoria11y.dismissals;
  options.showDismissed = urlParams.has('ed1ref');
  // todo postpone: ignoreAllIfPresent
  options.preventCheckingIfPresent = !!drupalSettings.editoria11y.no_load ?
    drupalSettings.editoria11y.no_load + '.layout-builder-form' :
    '.layout-builder-form';
  // todo postpone: preventCheckingIfAbsent
  options.linkStringsNewWindows = !!drupalSettings.editoria11y.link_strings_new_windows ?
    new RegExp (drupalSettings.editoria11y.link_strings_new_windows, 'g')
    : !!drupalSettings.editoria11y.ignore_link_strings ?
      new RegExp(drupalSettings.editoria11y.ignore_link_strings, 'g')
      : new RegExp ('(' + Drupal.t('download') + ')|(\\s' + Drupal.t('tab') + ')|(' + Drupal.t('window') + ')', 'g');
  options.linkIgnoreStrings = !!drupalSettings.editoria11y.ignore_link_strings ? new RegExp(drupalSettings.editoria11y.ignore_link_strings, 'g') : new RegExp('(' + Drupal.t('link is external') + ')|(' + Drupal.t('link sends email') + ')', 'g');
  options.linkIgnoreSelector = !!drupalSettings.editoria11y.link_ignore_selector ? drupalSettings.editoria11y.link_ignore_selector : false;
  options.hiddenHandlers = !!drupalSettings.editoria11y.hidden_handlers ? drupalSettings.editoria11y.hidden_handlers : '';
  options.theme = !!drupalSettings.editoria11y.theme ? drupalSettings.editoria11y.theme : 'sleekTheme';
  options.embeddedContent = !!drupalSettings.editoria11y.embedded_content_warning ? drupalSettings.editoria11y.embedded_content_warning : false;
  options.documentLinks = !!drupalSettings.editoria11y.download_links ? drupalSettings.editoria11y.download_links : `a[href$='.pdf'], a[href*='.pdf?']`;
  options.customTests = drupalSettings.editoria11y.custom_tests;
  options.cssUrls = !!drupalSettings.editoria11y.css_url ? [drupalSettings.editoria11y.css_url + '/library/css/editoria11y.css'] : false;
  options.buttonZIndex = 99999;

  /*let options = {
    // videoContent: 'youtube.com, vimeo.com, yuja.com, panopto.com',
    // audioContent: 'soundcloud.com, simplecast.com, podbean.com, buzzsprout.com, blubrry.com, transistor.fm, fusebox.fm, libsyn.com',
    // dataVizContent: 'datastudio.google.com, tableau',
    // twitterContent: 'twitter-timeline',
    ,
    editableContent: '[contentEditable="true"], #quickedit-entity-toolbar, .layout-builder-form',
    shadowComponents: drupalSettings.editoria11y.shadow_components ? drupalSettings.editoria11y.shadow_components : false,
    ,
  };*/

  if (!!drupalSettings.editoria11y.view_reports) {
    options.reportsURL = drupalSettings.editoria11y.dashboard_url;
  }

  if (typeof editoria11yOptionsOverride !== 'undefined' && typeof editoria11yOptions === 'function') {
    options = editoria11yOptions(options);
  }

  ed11yWaiting = true;
  window.setTimeout(function() {
    ed11yInitialized = true;
    const ed11y = new Ed11y(options);
    ed11yWaiting = false;
    // Listen for events that may modify content without triggering a mutation.
    window.addEventListener('keyup', (e) => {
      if (!e.target.closest('.ed11y-wrapper, [contenteditable="true"]') && Ed11y.bodyStyle) {
        // Arrow changes of radio and select controls.
        Ed11y.incrementalAlign(); // Immediately realign tips.
        Ed11y.alignPending = false;
        //Ed11y.incrementalCheck();
      }
    });
    window.addEventListener('click', (e) => {
      // Click covers mouse, keyboard and touch.
      if (!e.target.closest('.ed11y-wrapper, [contenteditable="true"]') && Ed11y.bodyStyle) {
        Ed11y.incrementalAlign(); // Immediately realign tips.
        Ed11y.alignPending = false;
        Ed11y.incrementalCheck();
      }
    });
  }, delay);

  // Only needed if we have issues with the mutation observers.
  /*window.setTimeout(function() {
    let cks = Drupal.CKEditor5Instances;
    cks?.forEach(ck => {
      console.log(ck);
      ck.model.document.on( 'change:data', () => {
        console.log('change');
        window.setTimeout(() => {Ed11y.incrementalCheck();}, 100);
      } );
    })
  }, 1000);
  */

  /**
   * Initiate sync
   *
   * */

  let csrfToken = false;
  function getCsrfToken(action, data)
  {
    {
      fetch(`${drupalSettings.editoria11y.session_url}`, {
        method: "GET"
      })
        .then(res => res.text())
        .then(token => {
          csrfToken = token;
          postData(action, data).catch(err => console.error(err));
        })
        .catch(err => console.error(err));
    }
  }

  let postData = async function (action, data) {
    if (!csrfToken) {
      getCsrfToken(action, data);
    } else {
      let apiRoot = drupalSettings.editoria11y.api_url.replace('results/report','');
      let url = `${apiRoot}${action}`;
      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-Token': csrfToken,
        },
        body: JSON.stringify(data),
      })
        .catch((error) => console.error('Error:', error))
    }
  }

  // Purge changed aliases & deleted pages.
  if (urlParams.has('ed1ref') && urlParams.get('ed1ref') !== drupalSettings.editoria11y.page_path) {
    let data = {
      page_path: urlParams.get('ed1ref'),
    };
    window.setTimeout(function() {
      postData('purge/page', data);
    },0,data);
  }

  let results = {};
  let oks = {};
  let total = 0;
  let extractResults = function () {
    results = {};
    oks = {};
    total = 0;
    Ed11y.results.forEach(result => {
      if (result.dismissalStatus !== "ok") {
        // log all items not marked as OK
        let testName = result.test;
        testName = Ed11y.M[testName].title;
        if (results[testName]) {
          results[testName] = parseInt(results[testName]) + 1;
          total++;
        } else {
          results[testName] = 1;
          total++;
        }
      }
      if (result.dismissalStatus === "ok") {
        if (!results[result.test]) {
          oks[result.test] = Ed11y.M[result.test].title;
        }
      }
    })
  }

  let sendResults = function () {
    window.setTimeout(function () {
      total = 0;
      extractResults();
      let url = window.location.pathname + window.location.search;
      url = url.length > 1000 ? url.substring(0, 1000) : url;
      let data = {
        page_title: drupalSettings.editoria11y.page_title,
        page_path: drupalSettings.editoria11y.page_path,
        entity_id: drupalSettings.editoria11y.entity_id,
        page_count: total,
        language: drupalSettings.editoria11y.lang,
        entity_type: drupalSettings.editoria11y.entity_type, // node or false
        route_name: drupalSettings.editoria11y.route_name, // e.g., entity.node.canonical or view.frontpage.page_1
        results: results,
        oks: oks,
        page_url: url,
      };
      postData('results/report', data);
      // Short timeout to let execution queue clear.
    }, 100)
  }

  let firstRun = true;
  if (drupalSettings.editoria11y.dismissals && drupalSettings.editoria11y.sync !== 'dismissals' && drupalSettings.editoria11y.sync !== 'disable') {
    document.addEventListener('ed11yResults', function () {
      if (firstRun) {
        sendResults();
        firstRun = false;
      }
    });
  }

  let sendDismissal = function (detail) {
    if (!!detail) {
      let data = {};
      if (detail.dismissAction === 'reset') {
        data = {
          page_path: drupalSettings.editoria11y.page_path,
          language: drupalSettings.editoria11y.lang,
          route_name: drupalSettings.editoria11y.route_name,
          dismissal_status: 'reset', // ok, ignore or reset
        };
        if (drupalSettings.editoria11y.sync !== 'dismissals') {
          window.setTimeout(function() {
            sendResults();
          },100);
        }
      } else {
        data = {
          page_title: drupalSettings.editoria11y.page_title,
          page_path: drupalSettings.editoria11y.page_path,
          entity_id: drupalSettings.editoria11y.entity_id,
          language: drupalSettings.editoria11y.lang,
          entity_type: drupalSettings.editoria11y.entity_type, // node or false
          route_name: drupalSettings.editoria11y.route_name, // e.g., entity.node.canonical or view.frontpage.page_1
          result_name: Ed11y.M[detail.dismissTest].title, // which test is sending a result
          result_key: detail.dismissTest, // which test is sending a result
          element_id: detail.dismissKey, // some recognizable attribute of the item marked
          dismissal_status: detail.dismissAction, // ok, ignore or reset
        };
        if (detail.dismissAction === 'ok' && drupalSettings.editoria11y.sync !== 'dismissals') {
          window.setTimeout(function() {
            sendResults();
          },100);
        }
      }
      postData('dismiss/' + detail.dismissAction, data);
    }
  }
  if (drupalSettings.editoria11y.dismissals && drupalSettings.editoria11y.sync !== 'disable') {
    document.addEventListener('ed11yDismissalUpdate', function (e) {
      sendDismissal(e.detail)}, false);
  }
}

Drupal.behaviors.editoria11y = {
  attach: function (context, settings) {

    if (ed11yInitialized === true && ed11yOnce) {
      // Recheck page about a second after every behavior.
      // Todo: global mutation watch instead or in addition?
      window.setTimeout(function () {
        Ed11y.forceFullCheck = true;
        if (drupalSettings.editor || typeof(DrupalGutenberg) === 'object') {
          Ed11y.options.inlineAlerts = false;
        }
        if (Ed11y.bodyStyle) {
          // todo: shouldn't forceFull make this not necessary?
          Ed11y.incrementalCheck();
        } else {
          Ed11y.checkAll();
        }
      }, 1000);
    } else if (ed11yOnce &&
      (!ed11yInitialized ||
        ed11yInitialized !== 'pending'
      ) &&
      !drupalSettings.editoria11y.disable_live &&
      Drupal.editors &&
      (Object.hasOwn(Drupal.editors, 'ckeditor5') ||
        Object.hasOwn(Drupal.editors, 'gutenberg'))) {
      window.setTimeout(function () {
        if (ed11yInitialized !== true) {
          ed11yInitializer();
        }
      }, 1000);

    }

    if (context === document && !ed11yOnce && CSS.supports('selector(:is(body))')) {
      ed11yOnce = true;
      // Timeout necessary to prevent Paragraphs needing 2 clicks to open.
      window.setTimeout(()=> {
        ed11yInitializer();
      }, 100);
    }
  }
};
