/* @license GPL-2.0-or-later https://www.drupal.org/licensing/faq */
let ed11yOnce;let ed11yInitialized;let ed11yWaiting=false;const ed11yInitializer=function(){if(ed11yInitialized==='disabled'||ed11yInitialized==='pending')return;ed11yInitialized='pending';let options={};options.checkRoots=drupalSettings.editoria11y.content_root?drupalSettings.editoria11y.content_root:false;options.ignoreElements=!!drupalSettings.editoria11y.ignore_elements?`#toolbar-administration *, ${drupalSettings.editoria11y.ignore_elements}`:'#toolbar-administration *';options.panelNoCover=!!drupalSettings.editoria11y.panel_no_cover?drupalSettings.editoria11y.panel_no_cover:'#klaro-cookie-notice, #klaro_toggle_dialog, .same-page-preview-dialog.ui-dialog-position-side, #gin_sidebar';options.ignoreAllIfAbsent=!!drupalSettings.editoria11y.ignore_all_if_absent?drupalSettings.editoria11y.ignore_all_if_absent:false;const editors=(Drupal.editors&&(Object.hasOwn(Drupal.editors,'ckeditor5')||Object.hasOwn(Drupal.editors,'gutenberg')));let delay=drupalSettings.path.currentPathIsAdmin?250:0;if(document.URL.indexOf('mode=same_page_preview')>-1){ed11yOnce=true;ed11yInitialized='disabled';return;}else{if(drupalSettings.path.currentPathIsAdmin&&(!!drupalSettings.editoria11y.disable_live||!editors)){ed11yInitialized=false;return;}}if(document.querySelector('.layout-builder-form')){ed11yOnce=true;ed11yInitialized='disabled';return;}else{if(editors){if(drupalSettings.path.currentPathIsAdmin&&!!drupalSettings.editoria11y.disable_live){ed11yOnce=true;ed11yInitialized='disabled';return;}options.inlineAlerts=false;if(Object.hasOwn(Drupal.editors,'gutenberg')){options.ignoreAriaOnElements='h1,h2,h3,h4,h5,h6';delay=1000;window.setTimeout(function(){if(Ed11y.results.length===0)Ed11y.checkAll();},6000);}options.checkRoots='.gutenberg__editor .is-root-container, [contenteditable="true"]:not(.gutenberg__editor [contenteditable], [contenteditable="true"] [contenteditable])';options.ignoreElements+=', [hidden], [style*="display: none"], [style*="display:none"], [hidden] *, [style*="display: none"] *, [style*="display:none"] *, [data-drupal-message-type]';options.ignoreAllIfAbsent=options.ignoreAllIfAbsent?options.ignoreAllIfAbsent+', [contenteditable="true"], .gutenberg__editor .is-root-container':'[contenteditable="true"], .gutenberg__editor .is-root-container';options.editorHeadingLevel=[];if(drupalSettings.editoria11y.live_h2)options.editorHeadingLevel.push({selector:drupalSettings.editoria11y.live_h2,previousHeading:1});if(drupalSettings.editoria11y.live_h3)options.editorHeadingLevel.push({selector:drupalSettings.editoria11y.live_h3,previousHeading:2});if(drupalSettings.editoria11y.live_h4)options.editorHeadingLevel.push({selector:drupalSettings.editoria11y.live_h4,previousHeading:3});if(drupalSettings.editoria11y.live_h_inherit)options.editorHeadingLevel.push({selector:drupalSettings.editoria11y.live_h_inherit,previousHeading:'inherit'});options.editorHeadingLevel.push({selector:'*',previousHeading:0});}}ed11yOnce=true;let urlParams=new URLSearchParams(window.location.search);let lang=drupalSettings.editoria11y.lang?drupalSettings.editoria11y.lang:'en';if(lang!=='en'){lang='dynamic';ed11yLang.dynamic=ed11yLangDrupal;options.langSanitizes=true;}let ed11yAlertMode=drupalSettings.editoria11y.assertiveness?drupalSettings.editoria11y.assertiveness:'assertive';const now=new Date();if(drupalSettings.path.currentPathIsAdmin&&(Drupal.editors&&(Object.hasOwn(Drupal.editors,'ckeditor5')||Object.hasOwn(Drupal.editors,'gutenberg')))&&drupalSettings.editoria11y.assertiveness!=='polite')ed11yAlertMode='active';else{if(urlParams.has('ed1ref')||(ed11yAlertMode==='smart'&&((now/1000)-drupalSettings.editoria11y.changed<60)))ed11yAlertMode='assertive';}options.lang=lang;options.ignoreByKey={'p':'table:not(.field-multiple-table) p','h':'.filter-guidelines-item *, nav *, [id$="-local-tasks"] *, .tabledrag h4','img':'[aria-hidden], [aria-hidden] img','a':`[aria-hidden][tabindex], [id$="-local-tasks"] a, .filter-help > a, .contextual-region > nav a ${drupalSettings.path.currentPathIsAdmin?', a[target="_blank"]':''}`,'table':'[role="presentation"], .tabledrag'};options.alertMode=ed11yAlertMode;options.currentPage=drupalSettings.editoria11y.page_path;options.allowHide=!!drupalSettings.editoria11y.allow_hide;options.allowOK=!!drupalSettings.editoria11y.allow_ok;options.syncedDismissals=drupalSettings.editoria11y.dismissals;options.showDismissed=urlParams.has('ed1ref');options.preventCheckingIfPresent=!!drupalSettings.editoria11y.no_load?drupalSettings.editoria11y.no_load+'.layout-builder-form':'.layout-builder-form';options.linkStringsNewWindows=!!drupalSettings.editoria11y.link_strings_new_windows?new RegExp(drupalSettings.editoria11y.link_strings_new_windows,'g'):!!drupalSettings.editoria11y.ignore_link_strings?new RegExp(drupalSettings.editoria11y.ignore_link_strings,'g'):new RegExp('('+Drupal.t('download')+')|(\\s'+Drupal.t('tab')+')|('+Drupal.t('window')+')','g');options.linkIgnoreStrings=!!drupalSettings.editoria11y.ignore_link_strings?new RegExp(drupalSettings.editoria11y.ignore_link_strings,'g'):new RegExp('('+Drupal.t('link is external')+')|('+Drupal.t('link sends email')+')','g');options.linkIgnoreSelector=!!drupalSettings.editoria11y.link_ignore_selector?drupalSettings.editoria11y.link_ignore_selector:false;options.hiddenHandlers=!!drupalSettings.editoria11y.hidden_handlers?drupalSettings.editoria11y.hidden_handlers:'';options.theme=!!drupalSettings.editoria11y.theme?drupalSettings.editoria11y.theme:'sleekTheme';options.embeddedContent=!!drupalSettings.editoria11y.embedded_content_warning?drupalSettings.editoria11y.embedded_content_warning:false;options.documentLinks=!!drupalSettings.editoria11y.download_links?drupalSettings.editoria11y.download_links:`a[href$='.pdf'], a[href*='.pdf?']`;options.customTests=drupalSettings.editoria11y.custom_tests;options.cssUrls=!!drupalSettings.editoria11y.css_url?[drupalSettings.editoria11y.css_url+'/library/css/editoria11y.css']:false;options.buttonZIndex=99999;if(!!drupalSettings.editoria11y.view_reports)options.reportsURL=drupalSettings.editoria11y.dashboard_url;if(typeof editoria11yOptionsOverride!=='undefined'&&typeof editoria11yOptions==='function')options=editoria11yOptions(options);ed11yWaiting=true;window.setTimeout(function(){ed11yInitialized=true;const ed11y=new Ed11y(options);ed11yWaiting=false;window.addEventListener('keyup',(e)=>{if(!e.target.closest('.ed11y-wrapper, [contenteditable="true"]')&&Ed11y.bodyStyle){Ed11y.incrementalAlign();Ed11y.alignPending=false;}});window.addEventListener('click',(e)=>{if(!e.target.closest('.ed11y-wrapper, [contenteditable="true"]')&&Ed11y.bodyStyle){Ed11y.incrementalAlign();Ed11y.alignPending=false;Ed11y.incrementalCheck();}});},delay);let csrfToken=false;function getCsrfToken(action,data){fetch(`${drupalSettings.editoria11y.session_url}`,{method:"GET"}).then((res)=>res.text()).then((token)=>{csrfToken=token;postData(action,data).catch((err)=>console.error(err));}).catch((err)=>console.error(err));;}let postData=async function(action,data){if(!csrfToken)getCsrfToken(action,data);else{let apiRoot=drupalSettings.editoria11y.api_url.replace('results/report','');let url=`${apiRoot}${action}`;fetch(url,{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-Token':csrfToken},body:JSON.stringify(data)}).catch((error)=>console.error('Error:',error));}};if(urlParams.has('ed1ref')&&urlParams.get('ed1ref')!==drupalSettings.editoria11y.page_path){let data={page_path:urlParams.get('ed1ref')};window.setTimeout(function(){postData('purge/page',data);},0,data);}let results={};let oks={};let total=0;let extractResults=function(){results={};oks={};total=0;Ed11y.results.forEach((result)=>{if(result.dismissalStatus!=="ok"){let testName=result.test;testName=Ed11y.M[testName].title;if(results[testName]){results[testName]=parseInt(results[testName])+1;total++;}else{results[testName]=1;total++;}}if(result.dismissalStatus==="ok")if(!results[result.test])oks[result.test]=Ed11y.M[result.test].title;});};let sendResults=function(){window.setTimeout(function(){total=0;extractResults();let url=window.location.pathname+window.location.search;url=url.length>1000?url.substring(0,1000):url;let data={page_title:drupalSettings.editoria11y.page_title,page_path:drupalSettings.editoria11y.page_path,entity_id:drupalSettings.editoria11y.entity_id,page_count:total,language:drupalSettings.editoria11y.lang,entity_type:drupalSettings.editoria11y.entity_type,route_name:drupalSettings.editoria11y.route_name,results,oks,page_url:url};postData('results/report',data);},100);};let firstRun=true;if(drupalSettings.editoria11y.dismissals&&drupalSettings.editoria11y.sync!=='dismissals'&&drupalSettings.editoria11y.sync!=='disable')document.addEventListener('ed11yResults',function(){if(firstRun){sendResults();firstRun=false;}});let sendDismissal=function(detail){if(!!detail){let data={};if(detail.dismissAction==='reset'){data={page_path:drupalSettings.editoria11y.page_path,language:drupalSettings.editoria11y.lang,route_name:drupalSettings.editoria11y.route_name,dismissal_status:'reset'};if(drupalSettings.editoria11y.sync!=='dismissals')window.setTimeout(function(){sendResults();},100);}else{data={page_title:drupalSettings.editoria11y.page_title,page_path:drupalSettings.editoria11y.page_path,entity_id:drupalSettings.editoria11y.entity_id,language:drupalSettings.editoria11y.lang,entity_type:drupalSettings.editoria11y.entity_type,route_name:drupalSettings.editoria11y.route_name,result_name:Ed11y.M[detail.dismissTest].title,result_key:detail.dismissTest,element_id:detail.dismissKey,dismissal_status:detail.dismissAction};if(detail.dismissAction==='ok'&&drupalSettings.editoria11y.sync!=='dismissals')window.setTimeout(function(){sendResults();},100);}postData('dismiss/'+detail.dismissAction,data);}};if(drupalSettings.editoria11y.dismissals&&drupalSettings.editoria11y.sync!=='disable')document.addEventListener('ed11yDismissalUpdate',function(e){sendDismissal(e.detail);},false);};Drupal.behaviors.editoria11y={attach:function(context,settings){if(ed11yInitialized===true&&ed11yOnce)window.setTimeout(function(){Ed11y.forceFullCheck=true;if(drupalSettings.editor||typeof (DrupalGutenberg)==='object')Ed11y.options.inlineAlerts=false;if(Ed11y.bodyStyle)Ed11y.incrementalCheck();else Ed11y.checkAll();},1000);else{if(ed11yOnce&&(!ed11yInitialized||ed11yInitialized!=='pending')&&!drupalSettings.editoria11y.disable_live&&Drupal.editors&&(Object.hasOwn(Drupal.editors,'ckeditor5')||Object.hasOwn(Drupal.editors,'gutenberg')))window.setTimeout(function(){if(ed11yInitialized!==true)ed11yInitializer();},1000);}if(context===document&&!ed11yOnce&&CSS.supports('selector(:is(body))')){ed11yOnce=true;window.setTimeout(()=>{ed11yInitializer();},100);}}};;
(function($,Drupal){Drupal.behaviors.filterGuidelines={attach(context){function updateFilterGuidelines(event){const $this=$(event.target);const {value}=event.target;$this.closest('.js-filter-wrapper').find('[data-drupal-format-id]').hide().filter(`[data-drupal-format-id="${value}"]`).show();}$(once('filter-guidelines','.js-filter-guidelines',context)).find(':header').hide().closest('.js-filter-wrapper').find('select.js-filter-list').on('change.filterGuidelines',updateFilterGuidelines).trigger('change.filterGuidelines');}};})(jQuery,Drupal);;
((Drupal,drupalSettings,once)=>{Drupal.behaviors.ginEscapeAdmin={attach:(context)=>{once("ginEscapeAdmin","[data-gin-toolbar-escape-admin]",context).forEach(((el)=>{const escapeAdminPath=sessionStorage.getItem("escapeAdminPath");drupalSettings.path.currentPathIsAdmin&&null!==escapeAdminPath&&el.setAttribute("href",escapeAdminPath);}));}};})(Drupal,drupalSettings,once);;
((Drupal,once)=>{Drupal.behaviors.ginCoreNavigation={attach:(context)=>{Drupal.ginCoreNavigation.initKeyboardShortcut(context);}},Drupal.ginCoreNavigation={initKeyboardShortcut:function(context){once("ginToolbarKeyboardShortcut",".admin-toolbar__expand-button",context).forEach((()=>{document.addEventListener("keydown",((e)=>{!0===e.altKey&&"KeyT"===e.code&&this.toggleToolbar();}));})),once("ginToolbarClickHandler",".top-bar__burger, .admin-toolbar__expand-button",context).forEach(((button)=>{button.addEventListener("click",(()=>{window.innerWidth<1280&&button.getAttribute("aria-expanded","false")&&Drupal.ginSidebar?.collapseSidebar();}));}));},toggleToolbar(){let toolbarTrigger=document.querySelector(".admin-toolbar__expand-button");toolbarTrigger&&toolbarTrigger.click();},collapseToolbar:function(){document.querySelectorAll(".top-bar__burger, .admin-toolbar__expand-button").forEach(((button)=>{button.setAttribute("aria-expanded","false");})),document.documentElement.setAttribute("data-admin-toolbar","collapsed"),Drupal.displace(!0);}};})(Drupal,once);;
((Drupal,drupalSettings,once)=>{Drupal.behaviors.ginAccent={attach:function(context){once("ginAccent","body",context).forEach((()=>{Drupal.ginAccent.checkDarkmode(),Drupal.ginAccent.setAccentColor(),Drupal.ginAccent.setFocusColor();}));}},Drupal.ginAccent={setAccentColor:function(){let preset=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,color=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;const accentColorPreset=null!=preset?preset:drupalSettings.gin.preset_accent_color;document.body.setAttribute("data-gin-accent",accentColorPreset),"custom"===accentColorPreset&&this.setCustomAccentColor(color);},setCustomAccentColor:function(){let color=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,element=arguments.length>1&&void 0!==arguments[1]?arguments[1]:document.body;const accentColor=null!=color?color:drupalSettings.gin.accent_color;if(accentColor){this.clearAccentColor(element);const strippedAccentColor=accentColor.replace("#",""),darkAccentColor=this.mixColor("ffffff",strippedAccentColor,65).replace("#",""),style=document.createElement("style");style.className="gin-custom-colors",style.innerHTML=`\n          [data-gin-accent="custom"] {\n            --gin-color-primary-rgb: ${this.hexToRgb(accentColor)};\n            --gin-color-primary-hover: ${this.shadeColor(accentColor,-10)};\n            --gin-color-primary-active: ${this.shadeColor(accentColor,-15)};\n            --gin-bg-app-rgb: ${this.hexToRgb(this.mixColor("ffffff",strippedAccentColor,97))};\n            --gin-bg-header: ${this.mixColor("ffffff",strippedAccentColor,85)};\n            --gin-color-sticky-rgb: ${this.hexToRgb(this.mixColor("ffffff",strippedAccentColor,92))};\n          }\n          .gin--dark-mode[data-gin-accent="custom"],\n          .gin--dark-mode [data-gin-accent="custom"] {\n            --gin-color-primary-rgb: ${this.hexToRgb(darkAccentColor)};\n            --gin-color-primary-hover: ${this.mixColor("ffffff",strippedAccentColor,55)};\n            --gin-color-primary-active: ${this.mixColor("ffffff",strippedAccentColor,50)};\n            --gin-bg-header: ${this.mixColor("2A2A2D",darkAccentColor,88)};\n          }\n        `,element.append(style);}},clearAccentColor:function(){let element=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.body;if(element.querySelectorAll(".gin-custom-colors").length>0){const removeElement=element.querySelector(".gin-custom-colors");removeElement.parentNode.removeChild(removeElement);}},setFocusColor:function(){let preset=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,color=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;const focusColorPreset=null!=preset?preset:drupalSettings.gin.preset_focus_color;document.body.setAttribute("data-gin-focus",focusColorPreset),"custom"===focusColorPreset&&this.setCustomFocusColor(color);},setCustomFocusColor:function(){let color=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,element=arguments.length>1&&void 0!==arguments[1]?arguments[1]:document.body;const accentColor=null!=color?color:drupalSettings.gin.focus_color;if(accentColor){this.clearFocusColor(element);const strippedAccentColor=accentColor.replace("#",""),darkAccentColor=this.mixColor("ffffff",strippedAccentColor,65),style=document.createElement("style");style.className="gin-custom-focus",style.innerHTML=`\n          [data-gin-focus="custom"] {\n            --gin-color-focus: ${accentColor};\n          }\n          .gin--dark-mode[data-gin-focus="custom"],\n          .gin--dark-mode [data-gin-focus="custom"] {\n            --gin-color-focus: ${darkAccentColor};\n          }`,element.append(style);}},clearFocusColor:function(){let element=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.body;if(element.querySelectorAll(".gin-custom-focus").length>0){const removeElement=element.querySelector(".gin-custom-focus");removeElement.parentNode.removeChild(removeElement);}},checkDarkmode:()=>{const darkmodeClass=drupalSettings.gin.darkmode_class;window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",((e)=>{e.matches&&"auto"===window.ginDarkmode&&document.querySelector("html").classList.add(darkmodeClass);})),window.matchMedia("(prefers-color-scheme: light)").addEventListener("change",((e)=>{e.matches&&"auto"===window.ginDarkmode&&document.querySelector("html").classList.remove(darkmodeClass);}));},hexToRgb:(hex)=>{hex=hex.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i,(function(m,r,g,b){return r+r+g+g+b+b;}));var result=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);return result?`${parseInt(result[1],16)}, ${parseInt(result[2],16)}, ${parseInt(result[3],16)}`:null;},mixColor:(color_1,color_2,weight)=>{function h2d(h){return parseInt(h,16);}weight=void 0!==weight?weight:50;for(var color="#",i=0;i<=5;i+=2){for(var v1=h2d(color_1.substr(i,2)),v2=h2d(color_2.substr(i,2)),val=Math.floor(v2+weight/100*(v1-v2)).toString(16);val.length<2;)val="0"+val;color+=val;}return color;},shadeColor:(color,percent)=>{const num=parseInt(color.replace("#",""),16),amt=Math.round(2.55*percent),R=(num>>16)+amt,B=(num>>8&255)+amt,G=(255&num)+amt;return `#${(16777216+65536*(R<255?R<1?0:R:255)+256*(B<255?B<1?0:B:255)+(G<255?G<1?0:G:255)).toString(16).slice(1)}`;}};})(Drupal,drupalSettings,once);;
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
    typeof define === 'function' && define.amd ? define(['exports'], factory) :
      (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.FloatingUICore = {}));
})(this, (function (exports) { 'use strict';

  function getAlignment(placement) {
    return placement.split('-')[1];
  }

  function getLengthFromAxis(axis) {
    return axis === 'y' ? 'height' : 'width';
  }

  function getSide(placement) {
    return placement.split('-')[0];
  }

  function getMainAxisFromPlacement(placement) {
    return ['top', 'bottom'].includes(getSide(placement)) ? 'x' : 'y';
  }

  function computeCoordsFromPlacement(_ref, placement, rtl) {
    let {
      reference,
      floating
    } = _ref;
    const commonX = reference.x + reference.width / 2 - floating.width / 2;
    const commonY = reference.y + reference.height / 2 - floating.height / 2;
    const mainAxis = getMainAxisFromPlacement(placement);
    const length = getLengthFromAxis(mainAxis);
    const commonAlign = reference[length] / 2 - floating[length] / 2;
    const side = getSide(placement);
    const isVertical = mainAxis === 'x';
    let coords;
    switch (side) {
      case 'top':
        coords = {
          x: commonX,
          y: reference.y - floating.height
        };
        break;
      case 'bottom':
        coords = {
          x: commonX,
          y: reference.y + reference.height
        };
        break;
      case 'right':
        coords = {
          x: reference.x + reference.width,
          y: commonY
        };
        break;
      case 'left':
        coords = {
          x: reference.x - floating.width,
          y: commonY
        };
        break;
      default:
        coords = {
          x: reference.x,
          y: reference.y
        };
    }
    switch (getAlignment(placement)) {
      case 'start':
        coords[mainAxis] -= commonAlign * (rtl && isVertical ? -1 : 1);
        break;
      case 'end':
        coords[mainAxis] += commonAlign * (rtl && isVertical ? -1 : 1);
        break;
    }
    return coords;
  }

  /**
   * Computes the `x` and `y` coordinates that will place the floating element
   * next to a reference element when it is given a certain positioning strategy.
   *
   * This export does not have any `platform` interface logic. You will need to
   * write one for the platform you are using Floating UI with.
   */
  const computePosition = async (reference, floating, config) => {
    const {
      placement = 'bottom',
      strategy = 'absolute',
      middleware = [],
      platform
    } = config;
    const validMiddleware = middleware.filter(Boolean);
    const rtl = await (platform.isRTL == null ? void 0 : platform.isRTL(floating));
    let rects = await platform.getElementRects({
      reference,
      floating,
      strategy
    });
    let {
      x,
      y
    } = computeCoordsFromPlacement(rects, placement, rtl);
    let statefulPlacement = placement;
    let middlewareData = {};
    let resetCount = 0;
    for (let i = 0; i < validMiddleware.length; i++) {
      const {
        name,
        fn
      } = validMiddleware[i];
      const {
        x: nextX,
        y: nextY,
        data,
        reset
      } = await fn({
        x,
        y,
        initialPlacement: placement,
        placement: statefulPlacement,
        strategy,
        middlewareData,
        rects,
        platform,
        elements: {
          reference,
          floating
        }
      });
      x = nextX != null ? nextX : x;
      y = nextY != null ? nextY : y;
      middlewareData = {
        ...middlewareData,
        [name]: {
          ...middlewareData[name],
          ...data
        }
      };
      if (reset && resetCount <= 50) {
        resetCount++;
        if (typeof reset === 'object') {
          if (reset.placement) {
            statefulPlacement = reset.placement;
          }
          if (reset.rects) {
            rects = reset.rects === true ? await platform.getElementRects({
              reference,
              floating,
              strategy
            }) : reset.rects;
          }
          ({
            x,
            y
          } = computeCoordsFromPlacement(rects, statefulPlacement, rtl));
        }
        i = -1;
        continue;
      }
    }
    return {
      x,
      y,
      placement: statefulPlacement,
      strategy,
      middlewareData
    };
  };

  function evaluate(value, param) {
    return typeof value === 'function' ? value(param) : value;
  }

  function expandPaddingObject(padding) {
    return {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0,
      ...padding
    };
  }

  function getSideObjectFromPadding(padding) {
    return typeof padding !== 'number' ? expandPaddingObject(padding) : {
      top: padding,
      right: padding,
      bottom: padding,
      left: padding
    };
  }

  function rectToClientRect(rect) {
    return {
      ...rect,
      top: rect.y,
      left: rect.x,
      right: rect.x + rect.width,
      bottom: rect.y + rect.height
    };
  }

  /**
   * Resolves with an object of overflow side offsets that determine how much the
   * element is overflowing a given clipping boundary on each side.
   * - positive = overflowing the boundary by that number of pixels
   * - negative = how many pixels left before it will overflow
   * - 0 = lies flush with the boundary
   * @see https://floating-ui.com/docs/detectOverflow
   */
  async function detectOverflow(state, options) {
    var _await$platform$isEle;
    if (options === void 0) {
      options = {};
    }
    const {
      x,
      y,
      platform,
      rects,
      elements,
      strategy
    } = state;
    const {
      boundary = 'clippingAncestors',
      rootBoundary = 'viewport',
      elementContext = 'floating',
      altBoundary = false,
      padding = 0
    } = evaluate(options, state);
    const paddingObject = getSideObjectFromPadding(padding);
    const altContext = elementContext === 'floating' ? 'reference' : 'floating';
    const element = elements[altBoundary ? altContext : elementContext];
    const clippingClientRect = rectToClientRect(await platform.getClippingRect({
      element: ((_await$platform$isEle = await (platform.isElement == null ? void 0 : platform.isElement(element))) != null ? _await$platform$isEle : true) ? element : element.contextElement || (await (platform.getDocumentElement == null ? void 0 : platform.getDocumentElement(elements.floating))),
      boundary,
      rootBoundary,
      strategy
    }));
    const rect = elementContext === 'floating' ? {
      ...rects.floating,
      x,
      y
    } : rects.reference;
    const offsetParent = await (platform.getOffsetParent == null ? void 0 : platform.getOffsetParent(elements.floating));
    const offsetScale = (await (platform.isElement == null ? void 0 : platform.isElement(offsetParent))) ? (await (platform.getScale == null ? void 0 : platform.getScale(offsetParent))) || {
      x: 1,
      y: 1
    } : {
      x: 1,
      y: 1
    };
    const elementClientRect = rectToClientRect(platform.convertOffsetParentRelativeRectToViewportRelativeRect ? await platform.convertOffsetParentRelativeRectToViewportRelativeRect({
      rect,
      offsetParent,
      strategy
    }) : rect);
    return {
      top: (clippingClientRect.top - elementClientRect.top + paddingObject.top) / offsetScale.y,
      bottom: (elementClientRect.bottom - clippingClientRect.bottom + paddingObject.bottom) / offsetScale.y,
      left: (clippingClientRect.left - elementClientRect.left + paddingObject.left) / offsetScale.x,
      right: (elementClientRect.right - clippingClientRect.right + paddingObject.right) / offsetScale.x
    };
  }

  const min = Math.min;
  const max = Math.max;

  function within(min$1, value, max$1) {
    return max(min$1, min(value, max$1));
  }

  /**
   * Provides data to position an inner element of the floating element so that it
   * appears centered to the reference element.
   * @see https://floating-ui.com/docs/arrow
   */
  const arrow = options => ({
    name: 'arrow',
    options,
    async fn(state) {
      const {
        x,
        y,
        placement,
        rects,
        platform,
        elements
      } = state;
      // Since `element` is required, we don't Partial<> the type.
      const {
        element,
        padding = 0
      } = evaluate(options, state) || {};
      if (element == null) {
        return {};
      }
      const paddingObject = getSideObjectFromPadding(padding);
      const coords = {
        x,
        y
      };
      const axis = getMainAxisFromPlacement(placement);
      const length = getLengthFromAxis(axis);
      const arrowDimensions = await platform.getDimensions(element);
      const isYAxis = axis === 'y';
      const minProp = isYAxis ? 'top' : 'left';
      const maxProp = isYAxis ? 'bottom' : 'right';
      const clientProp = isYAxis ? 'clientHeight' : 'clientWidth';
      const endDiff = rects.reference[length] + rects.reference[axis] - coords[axis] - rects.floating[length];
      const startDiff = coords[axis] - rects.reference[axis];
      const arrowOffsetParent = await (platform.getOffsetParent == null ? void 0 : platform.getOffsetParent(element));
      let clientSize = arrowOffsetParent ? arrowOffsetParent[clientProp] : 0;

      // DOM platform can return `window` as the `offsetParent`.
      if (!clientSize || !(await (platform.isElement == null ? void 0 : platform.isElement(arrowOffsetParent)))) {
        clientSize = elements.floating[clientProp] || rects.floating[length];
      }
      const centerToReference = endDiff / 2 - startDiff / 2;

      // If the padding is large enough that it causes the arrow to no longer be
      // centered, modify the padding so that it is centered.
      const largestPossiblePadding = clientSize / 2 - arrowDimensions[length] / 2 - 1;
      const minPadding = min(paddingObject[minProp], largestPossiblePadding);
      const maxPadding = min(paddingObject[maxProp], largestPossiblePadding);

      // Make sure the arrow doesn't overflow the floating element if the center
      // point is outside the floating element's bounds.
      const min$1 = minPadding;
      const max = clientSize - arrowDimensions[length] - maxPadding;
      const center = clientSize / 2 - arrowDimensions[length] / 2 + centerToReference;
      const offset = within(min$1, center, max);

      // If the reference is small enough that the arrow's padding causes it to
      // to point to nothing for an aligned placement, adjust the offset of the
      // floating element itself. This stops `shift()` from taking action, but can
      // be worked around by calling it again after the `arrow()` if desired.
      const shouldAddOffset = getAlignment(placement) != null && center != offset && rects.reference[length] / 2 - (center < min$1 ? minPadding : maxPadding) - arrowDimensions[length] / 2 < 0;
      const alignmentOffset = shouldAddOffset ? center < min$1 ? min$1 - center : max - center : 0;
      return {
        [axis]: coords[axis] - alignmentOffset,
        data: {
          [axis]: offset,
          centerOffset: center - offset + alignmentOffset
        }
      };
    }
  });

  const sides = ['top', 'right', 'bottom', 'left'];
  const allPlacements = /*#__PURE__*/sides.reduce((acc, side) => acc.concat(side, side + "-start", side + "-end"), []);

  const oppositeSideMap = {
    left: 'right',
    right: 'left',
    bottom: 'top',
    top: 'bottom'
  };
  function getOppositePlacement(placement) {
    return placement.replace(/left|right|bottom|top/g, side => oppositeSideMap[side]);
  }

  function getAlignmentSides(placement, rects, rtl) {
    if (rtl === void 0) {
      rtl = false;
    }
    const alignment = getAlignment(placement);
    const mainAxis = getMainAxisFromPlacement(placement);
    const length = getLengthFromAxis(mainAxis);
    let mainAlignmentSide = mainAxis === 'x' ? alignment === (rtl ? 'end' : 'start') ? 'right' : 'left' : alignment === 'start' ? 'bottom' : 'top';
    if (rects.reference[length] > rects.floating[length]) {
      mainAlignmentSide = getOppositePlacement(mainAlignmentSide);
    }
    return {
      main: mainAlignmentSide,
      cross: getOppositePlacement(mainAlignmentSide)
    };
  }

  const oppositeAlignmentMap = {
    start: 'end',
    end: 'start'
  };
  function getOppositeAlignmentPlacement(placement) {
    return placement.replace(/start|end/g, alignment => oppositeAlignmentMap[alignment]);
  }

  function getPlacementList(alignment, autoAlignment, allowedPlacements) {
    const allowedPlacementsSortedByAlignment = alignment ? [...allowedPlacements.filter(placement => getAlignment(placement) === alignment), ...allowedPlacements.filter(placement => getAlignment(placement) !== alignment)] : allowedPlacements.filter(placement => getSide(placement) === placement);
    return allowedPlacementsSortedByAlignment.filter(placement => {
      if (alignment) {
        return getAlignment(placement) === alignment || (autoAlignment ? getOppositeAlignmentPlacement(placement) !== placement : false);
      }
      return true;
    });
  }
  /**
   * Optimizes the visibility of the floating element by choosing the placement
   * that has the most space available automatically, without needing to specify a
   * preferred placement. Alternative to `flip`.
   * @see https://floating-ui.com/docs/autoPlacement
   */
  const autoPlacement = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      name: 'autoPlacement',
      options,
      async fn(state) {
        var _middlewareData$autoP, _middlewareData$autoP2, _placementsThatFitOnE;
        const {
          rects,
          middlewareData,
          placement,
          platform,
          elements
        } = state;
        const {
          crossAxis = false,
          alignment,
          allowedPlacements = allPlacements,
          autoAlignment = true,
          ...detectOverflowOptions
        } = evaluate(options, state);
        const placements = alignment !== undefined || allowedPlacements === allPlacements ? getPlacementList(alignment || null, autoAlignment, allowedPlacements) : allowedPlacements;
        const overflow = await detectOverflow(state, detectOverflowOptions);
        const currentIndex = ((_middlewareData$autoP = middlewareData.autoPlacement) == null ? void 0 : _middlewareData$autoP.index) || 0;
        const currentPlacement = placements[currentIndex];
        if (currentPlacement == null) {
          return {};
        }
        const {
          main,
          cross
        } = getAlignmentSides(currentPlacement, rects, await (platform.isRTL == null ? void 0 : platform.isRTL(elements.floating)));

        // Make `computeCoords` start from the right place.
        if (placement !== currentPlacement) {
          return {
            reset: {
              placement: placements[0]
            }
          };
        }
        const currentOverflows = [overflow[getSide(currentPlacement)], overflow[main], overflow[cross]];
        const allOverflows = [...(((_middlewareData$autoP2 = middlewareData.autoPlacement) == null ? void 0 : _middlewareData$autoP2.overflows) || []), {
          placement: currentPlacement,
          overflows: currentOverflows
        }];
        const nextPlacement = placements[currentIndex + 1];

        // There are more placements to check.
        if (nextPlacement) {
          return {
            data: {
              index: currentIndex + 1,
              overflows: allOverflows
            },
            reset: {
              placement: nextPlacement
            }
          };
        }
        const placementsSortedByMostSpace = allOverflows.map(d => {
          const alignment = getAlignment(d.placement);
          return [d.placement, alignment && crossAxis ?
            // Check along the mainAxis and main crossAxis side.
            d.overflows.slice(0, 2).reduce((acc, v) => acc + v, 0) :
            // Check only the mainAxis.
            d.overflows[0], d.overflows];
        }).sort((a, b) => a[1] - b[1]);
        const placementsThatFitOnEachSide = placementsSortedByMostSpace.filter(d => d[2].slice(0,
          // Aligned placements should not check their opposite crossAxis
          // side.
          getAlignment(d[0]) ? 2 : 3).every(v => v <= 0));
        const resetPlacement = ((_placementsThatFitOnE = placementsThatFitOnEachSide[0]) == null ? void 0 : _placementsThatFitOnE[0]) || placementsSortedByMostSpace[0][0];
        if (resetPlacement !== placement) {
          return {
            data: {
              index: currentIndex + 1,
              overflows: allOverflows
            },
            reset: {
              placement: resetPlacement
            }
          };
        }
        return {};
      }
    };
  };

  function getExpandedPlacements(placement) {
    const oppositePlacement = getOppositePlacement(placement);
    return [getOppositeAlignmentPlacement(placement), oppositePlacement, getOppositeAlignmentPlacement(oppositePlacement)];
  }

  function getSideList(side, isStart, rtl) {
    const lr = ['left', 'right'];
    const rl = ['right', 'left'];
    const tb = ['top', 'bottom'];
    const bt = ['bottom', 'top'];
    switch (side) {
      case 'top':
      case 'bottom':
        if (rtl) return isStart ? rl : lr;
        return isStart ? lr : rl;
      case 'left':
      case 'right':
        return isStart ? tb : bt;
      default:
        return [];
    }
  }
  function getOppositeAxisPlacements(placement, flipAlignment, direction, rtl) {
    const alignment = getAlignment(placement);
    let list = getSideList(getSide(placement), direction === 'start', rtl);
    if (alignment) {
      list = list.map(side => side + "-" + alignment);
      if (flipAlignment) {
        list = list.concat(list.map(getOppositeAlignmentPlacement));
      }
    }
    return list;
  }

  /**
   * Optimizes the visibility of the floating element by flipping the `placement`
   * in order to keep it in view when the preferred placement(s) will overflow the
   * clipping boundary. Alternative to `autoPlacement`.
   * @see https://floating-ui.com/docs/flip
   */
  const flip = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      name: 'flip',
      options,
      async fn(state) {
        var _middlewareData$flip;
        const {
          placement,
          middlewareData,
          rects,
          initialPlacement,
          platform,
          elements
        } = state;
        const {
          mainAxis: checkMainAxis = true,
          crossAxis: checkCrossAxis = true,
          fallbackPlacements: specifiedFallbackPlacements,
          fallbackStrategy = 'bestFit',
          fallbackAxisSideDirection = 'none',
          flipAlignment = true,
          ...detectOverflowOptions
        } = evaluate(options, state);
        const side = getSide(placement);
        const isBasePlacement = getSide(initialPlacement) === initialPlacement;
        const rtl = await (platform.isRTL == null ? void 0 : platform.isRTL(elements.floating));
        const fallbackPlacements = specifiedFallbackPlacements || (isBasePlacement || !flipAlignment ? [getOppositePlacement(initialPlacement)] : getExpandedPlacements(initialPlacement));
        if (!specifiedFallbackPlacements && fallbackAxisSideDirection !== 'none') {
          fallbackPlacements.push(...getOppositeAxisPlacements(initialPlacement, flipAlignment, fallbackAxisSideDirection, rtl));
        }
        const placements = [initialPlacement, ...fallbackPlacements];
        const overflow = await detectOverflow(state, detectOverflowOptions);
        const overflows = [];
        let overflowsData = ((_middlewareData$flip = middlewareData.flip) == null ? void 0 : _middlewareData$flip.overflows) || [];
        if (checkMainAxis) {
          overflows.push(overflow[side]);
        }
        if (checkCrossAxis) {
          const {
            main,
            cross
          } = getAlignmentSides(placement, rects, rtl);
          overflows.push(overflow[main], overflow[cross]);
        }
        overflowsData = [...overflowsData, {
          placement,
          overflows
        }];

        // One or more sides is overflowing.
        if (!overflows.every(side => side <= 0)) {
          var _middlewareData$flip2, _overflowsData$filter;
          const nextIndex = (((_middlewareData$flip2 = middlewareData.flip) == null ? void 0 : _middlewareData$flip2.index) || 0) + 1;
          const nextPlacement = placements[nextIndex];
          if (nextPlacement) {
            // Try next placement and re-run the lifecycle.
            return {
              data: {
                index: nextIndex,
                overflows: overflowsData
              },
              reset: {
                placement: nextPlacement
              }
            };
          }

          // First, find the candidates that fit on the mainAxis side of overflow,
          // then find the placement that fits the best on the main crossAxis side.
          let resetPlacement = (_overflowsData$filter = overflowsData.filter(d => d.overflows[0] <= 0).sort((a, b) => a.overflows[1] - b.overflows[1])[0]) == null ? void 0 : _overflowsData$filter.placement;

          // Otherwise fallback.
          if (!resetPlacement) {
            switch (fallbackStrategy) {
              case 'bestFit':
              {
                var _overflowsData$map$so;
                const placement = (_overflowsData$map$so = overflowsData.map(d => [d.placement, d.overflows.filter(overflow => overflow > 0).reduce((acc, overflow) => acc + overflow, 0)]).sort((a, b) => a[1] - b[1])[0]) == null ? void 0 : _overflowsData$map$so[0];
                if (placement) {
                  resetPlacement = placement;
                }
                break;
              }
              case 'initialPlacement':
                resetPlacement = initialPlacement;
                break;
            }
          }
          if (placement !== resetPlacement) {
            return {
              reset: {
                placement: resetPlacement
              }
            };
          }
        }
        return {};
      }
    };
  };

  function getSideOffsets(overflow, rect) {
    return {
      top: overflow.top - rect.height,
      right: overflow.right - rect.width,
      bottom: overflow.bottom - rect.height,
      left: overflow.left - rect.width
    };
  }
  function isAnySideFullyClipped(overflow) {
    return sides.some(side => overflow[side] >= 0);
  }
  /**
   * Provides data to hide the floating element in applicable situations, such as
   * when it is not in the same clipping context as the reference element.
   * @see https://floating-ui.com/docs/hide
   */
  const hide = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      name: 'hide',
      options,
      async fn(state) {
        const {
          rects
        } = state;
        const {
          strategy = 'referenceHidden',
          ...detectOverflowOptions
        } = evaluate(options, state);
        switch (strategy) {
          case 'referenceHidden':
          {
            const overflow = await detectOverflow(state, {
              ...detectOverflowOptions,
              elementContext: 'reference'
            });
            const offsets = getSideOffsets(overflow, rects.reference);
            return {
              data: {
                referenceHiddenOffsets: offsets,
                referenceHidden: isAnySideFullyClipped(offsets)
              }
            };
          }
          case 'escaped':
          {
            const overflow = await detectOverflow(state, {
              ...detectOverflowOptions,
              altBoundary: true
            });
            const offsets = getSideOffsets(overflow, rects.floating);
            return {
              data: {
                escapedOffsets: offsets,
                escaped: isAnySideFullyClipped(offsets)
              }
            };
          }
          default:
          {
            return {};
          }
        }
      }
    };
  };

  function getBoundingRect(rects) {
    const minX = min(...rects.map(rect => rect.left));
    const minY = min(...rects.map(rect => rect.top));
    const maxX = max(...rects.map(rect => rect.right));
    const maxY = max(...rects.map(rect => rect.bottom));
    return {
      x: minX,
      y: minY,
      width: maxX - minX,
      height: maxY - minY
    };
  }
  function getRectsByLine(rects) {
    const sortedRects = rects.slice().sort((a, b) => a.y - b.y);
    const groups = [];
    let prevRect = null;
    for (let i = 0; i < sortedRects.length; i++) {
      const rect = sortedRects[i];
      if (!prevRect || rect.y - prevRect.y > prevRect.height / 2) {
        groups.push([rect]);
      } else {
        groups[groups.length - 1].push(rect);
      }
      prevRect = rect;
    }
    return groups.map(rect => rectToClientRect(getBoundingRect(rect)));
  }
  /**
   * Provides improved positioning for inline reference elements that can span
   * over multiple lines, such as hyperlinks or range selections.
   * @see https://floating-ui.com/docs/inline
   */
  const inline = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      name: 'inline',
      options,
      async fn(state) {
        const {
          placement,
          elements,
          rects,
          platform,
          strategy
        } = state;
        // A MouseEvent's client{X,Y} coords can be up to 2 pixels off a
        // ClientRect's bounds, despite the event listener being triggered. A
        // padding of 2 seems to handle this issue.
        const {
          padding = 2,
          x,
          y
        } = evaluate(options, state);
        const nativeClientRects = Array.from((await (platform.getClientRects == null ? void 0 : platform.getClientRects(elements.reference))) || []);
        const clientRects = getRectsByLine(nativeClientRects);
        const fallback = rectToClientRect(getBoundingRect(nativeClientRects));
        const paddingObject = getSideObjectFromPadding(padding);
        function getBoundingClientRect() {
          // There are two rects and they are disjoined.
          if (clientRects.length === 2 && clientRects[0].left > clientRects[1].right && x != null && y != null) {
            // Find the first rect in which the point is fully inside.
            return clientRects.find(rect => x > rect.left - paddingObject.left && x < rect.right + paddingObject.right && y > rect.top - paddingObject.top && y < rect.bottom + paddingObject.bottom) || fallback;
          }

          // There are 2 or more connected rects.
          if (clientRects.length >= 2) {
            if (getMainAxisFromPlacement(placement) === 'x') {
              const firstRect = clientRects[0];
              const lastRect = clientRects[clientRects.length - 1];
              const isTop = getSide(placement) === 'top';
              const top = firstRect.top;
              const bottom = lastRect.bottom;
              const left = isTop ? firstRect.left : lastRect.left;
              const right = isTop ? firstRect.right : lastRect.right;
              const width = right - left;
              const height = bottom - top;
              return {
                top,
                bottom,
                left,
                right,
                width,
                height,
                x: left,
                y: top
              };
            }
            const isLeftSide = getSide(placement) === 'left';
            const maxRight = max(...clientRects.map(rect => rect.right));
            const minLeft = min(...clientRects.map(rect => rect.left));
            const measureRects = clientRects.filter(rect => isLeftSide ? rect.left === minLeft : rect.right === maxRight);
            const top = measureRects[0].top;
            const bottom = measureRects[measureRects.length - 1].bottom;
            const left = minLeft;
            const right = maxRight;
            const width = right - left;
            const height = bottom - top;
            return {
              top,
              bottom,
              left,
              right,
              width,
              height,
              x: left,
              y: top
            };
          }
          return fallback;
        }
        const resetRects = await platform.getElementRects({
          reference: {
            getBoundingClientRect
          },
          floating: elements.floating,
          strategy
        });
        if (rects.reference.x !== resetRects.reference.x || rects.reference.y !== resetRects.reference.y || rects.reference.width !== resetRects.reference.width || rects.reference.height !== resetRects.reference.height) {
          return {
            reset: {
              rects: resetRects
            }
          };
        }
        return {};
      }
    };
  };

  async function convertValueToCoords(state, options) {
    const {
      placement,
      platform,
      elements
    } = state;
    const rtl = await (platform.isRTL == null ? void 0 : platform.isRTL(elements.floating));
    const side = getSide(placement);
    const alignment = getAlignment(placement);
    const isVertical = getMainAxisFromPlacement(placement) === 'x';
    const mainAxisMulti = ['left', 'top'].includes(side) ? -1 : 1;
    const crossAxisMulti = rtl && isVertical ? -1 : 1;
    const rawValue = evaluate(options, state);

    // eslint-disable-next-line prefer-const
    let {
      mainAxis,
      crossAxis,
      alignmentAxis
    } = typeof rawValue === 'number' ? {
      mainAxis: rawValue,
      crossAxis: 0,
      alignmentAxis: null
    } : {
      mainAxis: 0,
      crossAxis: 0,
      alignmentAxis: null,
      ...rawValue
    };
    if (alignment && typeof alignmentAxis === 'number') {
      crossAxis = alignment === 'end' ? alignmentAxis * -1 : alignmentAxis;
    }
    return isVertical ? {
      x: crossAxis * crossAxisMulti,
      y: mainAxis * mainAxisMulti
    } : {
      x: mainAxis * mainAxisMulti,
      y: crossAxis * crossAxisMulti
    };
  }

  /**
   * Modifies the placement by translating the floating element along the
   * specified axes.
   * A number (shorthand for `mainAxis` or distance), or an axes configuration
   * object may be passed.
   * @see https://floating-ui.com/docs/offset
   */
  const offset = function (options) {
    if (options === void 0) {
      options = 0;
    }
    return {
      name: 'offset',
      options,
      async fn(state) {
        const {
          x,
          y
        } = state;
        const diffCoords = await convertValueToCoords(state, options);
        return {
          x: x + diffCoords.x,
          y: y + diffCoords.y,
          data: diffCoords
        };
      }
    };
  };

  function getCrossAxis(axis) {
    return axis === 'x' ? 'y' : 'x';
  }

  /**
   * Optimizes the visibility of the floating element by shifting it in order to
   * keep it in view when it will overflow the clipping boundary.
   * @see https://floating-ui.com/docs/shift
   */
  const shift = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      name: 'shift',
      options,
      async fn(state) {
        const {
          x,
          y,
          placement
        } = state;
        const {
          mainAxis: checkMainAxis = true,
          crossAxis: checkCrossAxis = false,
          limiter = {
            fn: _ref => {
              let {
                x,
                y
              } = _ref;
              return {
                x,
                y
              };
            }
          },
          ...detectOverflowOptions
        } = evaluate(options, state);
        const coords = {
          x,
          y
        };
        const overflow = await detectOverflow(state, detectOverflowOptions);
        const mainAxis = getMainAxisFromPlacement(getSide(placement));
        const crossAxis = getCrossAxis(mainAxis);
        let mainAxisCoord = coords[mainAxis];
        let crossAxisCoord = coords[crossAxis];
        if (checkMainAxis) {
          const minSide = mainAxis === 'y' ? 'top' : 'left';
          const maxSide = mainAxis === 'y' ? 'bottom' : 'right';
          const min = mainAxisCoord + overflow[minSide];
          const max = mainAxisCoord - overflow[maxSide];
          mainAxisCoord = within(min, mainAxisCoord, max);
        }
        if (checkCrossAxis) {
          const minSide = crossAxis === 'y' ? 'top' : 'left';
          const maxSide = crossAxis === 'y' ? 'bottom' : 'right';
          const min = crossAxisCoord + overflow[minSide];
          const max = crossAxisCoord - overflow[maxSide];
          crossAxisCoord = within(min, crossAxisCoord, max);
        }
        const limitedCoords = limiter.fn({
          ...state,
          [mainAxis]: mainAxisCoord,
          [crossAxis]: crossAxisCoord
        });
        return {
          ...limitedCoords,
          data: {
            x: limitedCoords.x - x,
            y: limitedCoords.y - y
          }
        };
      }
    };
  };
  /**
   * Built-in `limiter` that will stop `shift()` at a certain point.
   */
  const limitShift = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      options,
      fn(state) {
        const {
          x,
          y,
          placement,
          rects,
          middlewareData
        } = state;
        const {
          offset = 0,
          mainAxis: checkMainAxis = true,
          crossAxis: checkCrossAxis = true
        } = evaluate(options, state);
        const coords = {
          x,
          y
        };
        const mainAxis = getMainAxisFromPlacement(placement);
        const crossAxis = getCrossAxis(mainAxis);
        let mainAxisCoord = coords[mainAxis];
        let crossAxisCoord = coords[crossAxis];
        const rawOffset = evaluate(offset, state);
        const computedOffset = typeof rawOffset === 'number' ? {
          mainAxis: rawOffset,
          crossAxis: 0
        } : {
          mainAxis: 0,
          crossAxis: 0,
          ...rawOffset
        };
        if (checkMainAxis) {
          const len = mainAxis === 'y' ? 'height' : 'width';
          const limitMin = rects.reference[mainAxis] - rects.floating[len] + computedOffset.mainAxis;
          const limitMax = rects.reference[mainAxis] + rects.reference[len] - computedOffset.mainAxis;
          if (mainAxisCoord < limitMin) {
            mainAxisCoord = limitMin;
          } else if (mainAxisCoord > limitMax) {
            mainAxisCoord = limitMax;
          }
        }
        if (checkCrossAxis) {
          var _middlewareData$offse, _middlewareData$offse2;
          const len = mainAxis === 'y' ? 'width' : 'height';
          const isOriginSide = ['top', 'left'].includes(getSide(placement));
          const limitMin = rects.reference[crossAxis] - rects.floating[len] + (isOriginSide ? ((_middlewareData$offse = middlewareData.offset) == null ? void 0 : _middlewareData$offse[crossAxis]) || 0 : 0) + (isOriginSide ? 0 : computedOffset.crossAxis);
          const limitMax = rects.reference[crossAxis] + rects.reference[len] + (isOriginSide ? 0 : ((_middlewareData$offse2 = middlewareData.offset) == null ? void 0 : _middlewareData$offse2[crossAxis]) || 0) - (isOriginSide ? computedOffset.crossAxis : 0);
          if (crossAxisCoord < limitMin) {
            crossAxisCoord = limitMin;
          } else if (crossAxisCoord > limitMax) {
            crossAxisCoord = limitMax;
          }
        }
        return {
          [mainAxis]: mainAxisCoord,
          [crossAxis]: crossAxisCoord
        };
      }
    };
  };

  /**
   * Provides data that allows you to change the size of the floating element —
   * for instance, prevent it from overflowing the clipping boundary or match the
   * width of the reference element.
   * @see https://floating-ui.com/docs/size
   */
  const size = function (options) {
    if (options === void 0) {
      options = {};
    }
    return {
      name: 'size',
      options,
      async fn(state) {
        const {
          placement,
          rects,
          platform,
          elements
        } = state;
        const {
          apply = () => {},
          ...detectOverflowOptions
        } = evaluate(options, state);
        const overflow = await detectOverflow(state, detectOverflowOptions);
        const side = getSide(placement);
        const alignment = getAlignment(placement);
        const axis = getMainAxisFromPlacement(placement);
        const isXAxis = axis === 'x';
        const {
          width,
          height
        } = rects.floating;
        let heightSide;
        let widthSide;
        if (side === 'top' || side === 'bottom') {
          heightSide = side;
          widthSide = alignment === ((await (platform.isRTL == null ? void 0 : platform.isRTL(elements.floating))) ? 'start' : 'end') ? 'left' : 'right';
        } else {
          widthSide = side;
          heightSide = alignment === 'end' ? 'top' : 'bottom';
        }
        const overflowAvailableHeight = height - overflow[heightSide];
        const overflowAvailableWidth = width - overflow[widthSide];
        const noShift = !state.middlewareData.shift;
        let availableHeight = overflowAvailableHeight;
        let availableWidth = overflowAvailableWidth;
        if (isXAxis) {
          const maximumClippingWidth = width - overflow.left - overflow.right;
          availableWidth = alignment || noShift ? min(overflowAvailableWidth, maximumClippingWidth) : maximumClippingWidth;
        } else {
          const maximumClippingHeight = height - overflow.top - overflow.bottom;
          availableHeight = alignment || noShift ? min(overflowAvailableHeight, maximumClippingHeight) : maximumClippingHeight;
        }
        if (noShift && !alignment) {
          const xMin = max(overflow.left, 0);
          const xMax = max(overflow.right, 0);
          const yMin = max(overflow.top, 0);
          const yMax = max(overflow.bottom, 0);
          if (isXAxis) {
            availableWidth = width - 2 * (xMin !== 0 || xMax !== 0 ? xMin + xMax : max(overflow.left, overflow.right));
          } else {
            availableHeight = height - 2 * (yMin !== 0 || yMax !== 0 ? yMin + yMax : max(overflow.top, overflow.bottom));
          }
        }
        await apply({
          ...state,
          availableWidth,
          availableHeight
        });
        const nextDimensions = await platform.getDimensions(elements.floating);
        if (width !== nextDimensions.width || height !== nextDimensions.height) {
          return {
            reset: {
              rects: true
            }
          };
        }
        return {};
      }
    };
  };

  exports.arrow = arrow;
  exports.autoPlacement = autoPlacement;
  exports.computePosition = computePosition;
  exports.detectOverflow = detectOverflow;
  exports.flip = flip;
  exports.hide = hide;
  exports.inline = inline;
  exports.limitShift = limitShift;
  exports.offset = offset;
  exports.rectToClientRect = rectToClientRect;
  exports.shift = shift;
  exports.size = size;

  Object.defineProperty(exports, '__esModule', { value: true });

}));
;
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('@floating-ui/core')) :
    typeof define === 'function' && define.amd ? define(['exports', '@floating-ui/core'], factory) :
      (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.FloatingUIDOM = {}, global.FloatingUICore));
})(this, (function (exports, core) { 'use strict';

  function getWindow(node) {
    var _node$ownerDocument;
    return ((_node$ownerDocument = node.ownerDocument) == null ? void 0 : _node$ownerDocument.defaultView) || window;
  }

  function getComputedStyle$1(element) {
    return getWindow(element).getComputedStyle(element);
  }

  function isNode(value) {
    return value instanceof getWindow(value).Node;
  }
  function getNodeName(node) {
    if (isNode(node)) {
      return (node.nodeName || '').toLowerCase();
    }
    // Mocked nodes in testing environments may not be instances of Node. By
    // returning `#document` an infinite loop won't occur.
    // https://github.com/floating-ui/floating-ui/issues/2317
    return '#document';
  }

  function isHTMLElement(value) {
    return value instanceof getWindow(value).HTMLElement;
  }
  function isElement(value) {
    return value instanceof getWindow(value).Element;
  }
  function isShadowRoot(node) {
    // Browsers without `ShadowRoot` support.
    if (typeof ShadowRoot === 'undefined') {
      return false;
    }
    return node instanceof getWindow(node).ShadowRoot || node instanceof ShadowRoot;
  }
  function isOverflowElement(element) {
    const {
      overflow,
      overflowX,
      overflowY,
      display
    } = getComputedStyle$1(element);
    return /auto|scroll|overlay|hidden|clip/.test(overflow + overflowY + overflowX) && !['inline', 'contents'].includes(display);
  }
  function isTableElement(element) {
    return ['table', 'td', 'th'].includes(getNodeName(element));
  }
  function isContainingBlock(element) {
    const safari = isSafari();
    const css = getComputedStyle$1(element);

    // https://developer.mozilla.org/en-US/docs/Web/CSS/Containing_block#identifying_the_containing_block
    return css.transform !== 'none' || css.perspective !== 'none' || !safari && (css.backdropFilter ? css.backdropFilter !== 'none' : false) || !safari && (css.filter ? css.filter !== 'none' : false) || ['transform', 'perspective', 'filter'].some(value => (css.willChange || '').includes(value)) || ['paint', 'layout', 'strict', 'content'].some(value => (css.contain || '').includes(value));
  }
  function isSafari() {
    if (typeof CSS === 'undefined' || !CSS.supports) return false;
    return CSS.supports('-webkit-backdrop-filter', 'none');
  }
  function isLastTraversableNode(node) {
    return ['html', 'body', '#document'].includes(getNodeName(node));
  }

  const min = Math.min;
  const max = Math.max;
  const round = Math.round;
  const floor = Math.floor;
  const createEmptyCoords = v => ({
    x: v,
    y: v
  });

  function getCssDimensions(element) {
    const css = getComputedStyle$1(element);
    // In testing environments, the `width` and `height` properties are empty
    // strings for SVG elements, returning NaN. Fallback to `0` in this case.
    let width = parseFloat(css.width) || 0;
    let height = parseFloat(css.height) || 0;
    const hasOffset = isHTMLElement(element);
    const offsetWidth = hasOffset ? element.offsetWidth : width;
    const offsetHeight = hasOffset ? element.offsetHeight : height;
    const shouldFallback = round(width) !== offsetWidth || round(height) !== offsetHeight;
    if (shouldFallback) {
      width = offsetWidth;
      height = offsetHeight;
    }
    return {
      width,
      height,
      $: shouldFallback
    };
  }

  function unwrapElement(element) {
    return !isElement(element) ? element.contextElement : element;
  }

  function getScale(element) {
    const domElement = unwrapElement(element);
    if (!isHTMLElement(domElement)) {
      return createEmptyCoords(1);
    }
    const rect = domElement.getBoundingClientRect();
    const {
      width,
      height,
      $
    } = getCssDimensions(domElement);
    let x = ($ ? round(rect.width) : rect.width) / width;
    let y = ($ ? round(rect.height) : rect.height) / height;

    // 0, NaN, or Infinity should always fallback to 1.

    if (!x || !Number.isFinite(x)) {
      x = 1;
    }
    if (!y || !Number.isFinite(y)) {
      y = 1;
    }
    return {
      x,
      y
    };
  }

  const noOffsets = /*#__PURE__*/createEmptyCoords(0);
  function getVisualOffsets(element, isFixed, floatingOffsetParent) {
    var _win$visualViewport, _win$visualViewport2;
    if (isFixed === void 0) {
      isFixed = true;
    }
    if (!isSafari()) {
      return noOffsets;
    }
    const win = element ? getWindow(element) : window;
    if (!floatingOffsetParent || isFixed && floatingOffsetParent !== win) {
      return noOffsets;
    }
    return {
      x: ((_win$visualViewport = win.visualViewport) == null ? void 0 : _win$visualViewport.offsetLeft) || 0,
      y: ((_win$visualViewport2 = win.visualViewport) == null ? void 0 : _win$visualViewport2.offsetTop) || 0
    };
  }

  function getBoundingClientRect(element, includeScale, isFixedStrategy, offsetParent) {
    if (includeScale === void 0) {
      includeScale = false;
    }
    if (isFixedStrategy === void 0) {
      isFixedStrategy = false;
    }
    const clientRect = element.getBoundingClientRect();
    const domElement = unwrapElement(element);
    let scale = createEmptyCoords(1);
    if (includeScale) {
      if (offsetParent) {
        if (isElement(offsetParent)) {
          scale = getScale(offsetParent);
        }
      } else {
        scale = getScale(element);
      }
    }
    const visualOffsets = getVisualOffsets(domElement, isFixedStrategy, offsetParent);
    let x = (clientRect.left + visualOffsets.x) / scale.x;
    let y = (clientRect.top + visualOffsets.y) / scale.y;
    let width = clientRect.width / scale.x;
    let height = clientRect.height / scale.y;
    if (domElement) {
      const win = getWindow(domElement);
      const offsetWin = offsetParent && isElement(offsetParent) ? getWindow(offsetParent) : offsetParent;
      let currentIFrame = win.frameElement;
      while (currentIFrame && offsetParent && offsetWin !== win) {
        const iframeScale = getScale(currentIFrame);
        const iframeRect = currentIFrame.getBoundingClientRect();
        const css = getComputedStyle(currentIFrame);
        const left = iframeRect.left + (currentIFrame.clientLeft + parseFloat(css.paddingLeft)) * iframeScale.x;
        const top = iframeRect.top + (currentIFrame.clientTop + parseFloat(css.paddingTop)) * iframeScale.y;
        x *= iframeScale.x;
        y *= iframeScale.y;
        width *= iframeScale.x;
        height *= iframeScale.y;
        x += left;
        y += top;
        currentIFrame = getWindow(currentIFrame).frameElement;
      }
    }
    return core.rectToClientRect({
      width,
      height,
      x,
      y
    });
  }

  function getDocumentElement(node) {
    return ((isNode(node) ? node.ownerDocument : node.document) || window.document).documentElement;
  }

  function getNodeScroll(element) {
    if (isElement(element)) {
      return {
        scrollLeft: element.scrollLeft,
        scrollTop: element.scrollTop
      };
    }
    return {
      scrollLeft: element.pageXOffset,
      scrollTop: element.pageYOffset
    };
  }

  function convertOffsetParentRelativeRectToViewportRelativeRect(_ref) {
    let {
      rect,
      offsetParent,
      strategy
    } = _ref;
    const isOffsetParentAnElement = isHTMLElement(offsetParent);
    const documentElement = getDocumentElement(offsetParent);
    if (offsetParent === documentElement) {
      return rect;
    }
    let scroll = {
      scrollLeft: 0,
      scrollTop: 0
    };
    let scale = createEmptyCoords(1);
    const offsets = createEmptyCoords(0);
    if (isOffsetParentAnElement || !isOffsetParentAnElement && strategy !== 'fixed') {
      if (getNodeName(offsetParent) !== 'body' || isOverflowElement(documentElement)) {
        scroll = getNodeScroll(offsetParent);
      }
      if (isHTMLElement(offsetParent)) {
        const offsetRect = getBoundingClientRect(offsetParent);
        scale = getScale(offsetParent);
        offsets.x = offsetRect.x + offsetParent.clientLeft;
        offsets.y = offsetRect.y + offsetParent.clientTop;
      }
    }
    return {
      width: rect.width * scale.x,
      height: rect.height * scale.y,
      x: rect.x * scale.x - scroll.scrollLeft * scale.x + offsets.x,
      y: rect.y * scale.y - scroll.scrollTop * scale.y + offsets.y
    };
  }

  function getWindowScrollBarX(element) {
    // If <html> has a CSS width greater than the viewport, then this will be
    // incorrect for RTL.
    return getBoundingClientRect(getDocumentElement(element)).left + getNodeScroll(element).scrollLeft;
  }

  // Gets the entire size of the scrollable document area, even extending outside
  // of the `<html>` and `<body>` rect bounds if horizontally scrollable.
  function getDocumentRect(element) {
    const html = getDocumentElement(element);
    const scroll = getNodeScroll(element);
    const body = element.ownerDocument.body;
    const width = max(html.scrollWidth, html.clientWidth, body.scrollWidth, body.clientWidth);
    const height = max(html.scrollHeight, html.clientHeight, body.scrollHeight, body.clientHeight);
    let x = -scroll.scrollLeft + getWindowScrollBarX(element);
    const y = -scroll.scrollTop;
    if (getComputedStyle$1(body).direction === 'rtl') {
      x += max(html.clientWidth, body.clientWidth) - width;
    }
    return {
      width,
      height,
      x,
      y
    };
  }

  function getParentNode(node) {
    if (getNodeName(node) === 'html') {
      return node;
    }
    const result =
      // Step into the shadow DOM of the parent of a slotted node.
      node.assignedSlot ||
      // DOM Element detected.
      node.parentNode ||
      // ShadowRoot detected.
      isShadowRoot(node) && node.host ||
      // Fallback.
      getDocumentElement(node);
    return isShadowRoot(result) ? result.host : result;
  }

  function getNearestOverflowAncestor(node) {
    const parentNode = getParentNode(node);
    if (isLastTraversableNode(parentNode)) {
      return node.ownerDocument ? node.ownerDocument.body : node.body;
    }
    if (isHTMLElement(parentNode) && isOverflowElement(parentNode)) {
      return parentNode;
    }
    return getNearestOverflowAncestor(parentNode);
  }

  function getOverflowAncestors(node, list) {
    var _node$ownerDocument;
    if (list === void 0) {
      list = [];
    }
    const scrollableAncestor = getNearestOverflowAncestor(node);
    const isBody = scrollableAncestor === ((_node$ownerDocument = node.ownerDocument) == null ? void 0 : _node$ownerDocument.body);
    const win = getWindow(scrollableAncestor);
    if (isBody) {
      return list.concat(win, win.visualViewport || [], isOverflowElement(scrollableAncestor) ? scrollableAncestor : []);
    }
    return list.concat(scrollableAncestor, getOverflowAncestors(scrollableAncestor));
  }

  function getViewportRect(element, strategy) {
    const win = getWindow(element);
    const html = getDocumentElement(element);
    const visualViewport = win.visualViewport;
    let width = html.clientWidth;
    let height = html.clientHeight;
    let x = 0;
    let y = 0;
    if (visualViewport) {
      width = visualViewport.width;
      height = visualViewport.height;
      const visualViewportBased = isSafari();
      if (!visualViewportBased || visualViewportBased && strategy === 'fixed') {
        x = visualViewport.offsetLeft;
        y = visualViewport.offsetTop;
      }
    }
    return {
      width,
      height,
      x,
      y
    };
  }

  // Returns the inner client rect, subtracting scrollbars if present.
  function getInnerBoundingClientRect(element, strategy) {
    const clientRect = getBoundingClientRect(element, true, strategy === 'fixed');
    const top = clientRect.top + element.clientTop;
    const left = clientRect.left + element.clientLeft;
    const scale = isHTMLElement(element) ? getScale(element) : createEmptyCoords(1);
    const width = element.clientWidth * scale.x;
    const height = element.clientHeight * scale.y;
    const x = left * scale.x;
    const y = top * scale.y;
    return {
      width,
      height,
      x,
      y
    };
  }
  function getClientRectFromClippingAncestor(element, clippingAncestor, strategy) {
    let rect;
    if (clippingAncestor === 'viewport') {
      rect = getViewportRect(element, strategy);
    } else if (clippingAncestor === 'document') {
      rect = getDocumentRect(getDocumentElement(element));
    } else if (isElement(clippingAncestor)) {
      rect = getInnerBoundingClientRect(clippingAncestor, strategy);
    } else {
      const visualOffsets = getVisualOffsets(element);
      rect = {
        ...clippingAncestor,
        x: clippingAncestor.x - visualOffsets.x,
        y: clippingAncestor.y - visualOffsets.y
      };
    }
    return core.rectToClientRect(rect);
  }
  function hasFixedPositionAncestor(element, stopNode) {
    const parentNode = getParentNode(element);
    if (parentNode === stopNode || !isElement(parentNode) || isLastTraversableNode(parentNode)) {
      return false;
    }
    return getComputedStyle$1(parentNode).position === 'fixed' || hasFixedPositionAncestor(parentNode, stopNode);
  }

  // A "clipping ancestor" is an `overflow` element with the characteristic of
  // clipping (or hiding) child elements. This returns all clipping ancestors
  // of the given element up the tree.
  function getClippingElementAncestors(element, cache) {
    const cachedResult = cache.get(element);
    if (cachedResult) {
      return cachedResult;
    }
    let result = getOverflowAncestors(element).filter(el => isElement(el) && getNodeName(el) !== 'body');
    let currentContainingBlockComputedStyle = null;
    const elementIsFixed = getComputedStyle$1(element).position === 'fixed';
    let currentNode = elementIsFixed ? getParentNode(element) : element;

    // https://developer.mozilla.org/en-US/docs/Web/CSS/Containing_block#identifying_the_containing_block
    while (isElement(currentNode) && !isLastTraversableNode(currentNode)) {
      const computedStyle = getComputedStyle$1(currentNode);
      const currentNodeIsContaining = isContainingBlock(currentNode);
      if (!currentNodeIsContaining && computedStyle.position === 'fixed') {
        currentContainingBlockComputedStyle = null;
      }
      const shouldDropCurrentNode = elementIsFixed ? !currentNodeIsContaining && !currentContainingBlockComputedStyle : !currentNodeIsContaining && computedStyle.position === 'static' && !!currentContainingBlockComputedStyle && ['absolute', 'fixed'].includes(currentContainingBlockComputedStyle.position) || isOverflowElement(currentNode) && !currentNodeIsContaining && hasFixedPositionAncestor(element, currentNode);
      if (shouldDropCurrentNode) {
        // Drop non-containing blocks.
        result = result.filter(ancestor => ancestor !== currentNode);
      } else {
        // Record last containing block for next iteration.
        currentContainingBlockComputedStyle = computedStyle;
      }
      currentNode = getParentNode(currentNode);
    }
    cache.set(element, result);
    return result;
  }

  // Gets the maximum area that the element is visible in due to any number of
  // clipping ancestors.
  function getClippingRect(_ref) {
    let {
      element,
      boundary,
      rootBoundary,
      strategy
    } = _ref;
    const elementClippingAncestors = boundary === 'clippingAncestors' ? getClippingElementAncestors(element, this._c) : [].concat(boundary);
    const clippingAncestors = [...elementClippingAncestors, rootBoundary];
    const firstClippingAncestor = clippingAncestors[0];
    const clippingRect = clippingAncestors.reduce((accRect, clippingAncestor) => {
      const rect = getClientRectFromClippingAncestor(element, clippingAncestor, strategy);
      accRect.top = max(rect.top, accRect.top);
      accRect.right = min(rect.right, accRect.right);
      accRect.bottom = min(rect.bottom, accRect.bottom);
      accRect.left = max(rect.left, accRect.left);
      return accRect;
    }, getClientRectFromClippingAncestor(element, firstClippingAncestor, strategy));
    return {
      width: clippingRect.right - clippingRect.left,
      height: clippingRect.bottom - clippingRect.top,
      x: clippingRect.left,
      y: clippingRect.top
    };
  }

  function getDimensions(element) {
    return getCssDimensions(element);
  }

  function getTrueOffsetParent(element, polyfill) {
    if (!isHTMLElement(element) || getComputedStyle$1(element).position === 'fixed') {
      return null;
    }
    if (polyfill) {
      return polyfill(element);
    }
    return element.offsetParent;
  }
  function getContainingBlock(element) {
    let currentNode = getParentNode(element);
    while (isHTMLElement(currentNode) && !isLastTraversableNode(currentNode)) {
      if (isContainingBlock(currentNode)) {
        return currentNode;
      } else {
        currentNode = getParentNode(currentNode);
      }
    }
    return null;
  }

  // Gets the closest ancestor positioned element. Handles some edge cases,
  // such as table ancestors and cross browser bugs.
  function getOffsetParent(element, polyfill) {
    const window = getWindow(element);
    if (!isHTMLElement(element)) {
      return window;
    }
    let offsetParent = getTrueOffsetParent(element, polyfill);
    while (offsetParent && isTableElement(offsetParent) && getComputedStyle$1(offsetParent).position === 'static') {
      offsetParent = getTrueOffsetParent(offsetParent, polyfill);
    }
    if (offsetParent && (getNodeName(offsetParent) === 'html' || getNodeName(offsetParent) === 'body' && getComputedStyle$1(offsetParent).position === 'static' && !isContainingBlock(offsetParent))) {
      return window;
    }
    return offsetParent || getContainingBlock(element) || window;
  }

  function getRectRelativeToOffsetParent(element, offsetParent, strategy) {
    const isOffsetParentAnElement = isHTMLElement(offsetParent);
    const documentElement = getDocumentElement(offsetParent);
    const isFixed = strategy === 'fixed';
    const rect = getBoundingClientRect(element, true, isFixed, offsetParent);
    let scroll = {
      scrollLeft: 0,
      scrollTop: 0
    };
    const offsets = createEmptyCoords(0);
    if (isOffsetParentAnElement || !isOffsetParentAnElement && !isFixed) {
      if (getNodeName(offsetParent) !== 'body' || isOverflowElement(documentElement)) {
        scroll = getNodeScroll(offsetParent);
      }
      if (isHTMLElement(offsetParent)) {
        const offsetRect = getBoundingClientRect(offsetParent, true, isFixed, offsetParent);
        offsets.x = offsetRect.x + offsetParent.clientLeft;
        offsets.y = offsetRect.y + offsetParent.clientTop;
      } else if (documentElement) {
        offsets.x = getWindowScrollBarX(documentElement);
      }
    }
    return {
      x: rect.left + scroll.scrollLeft - offsets.x,
      y: rect.top + scroll.scrollTop - offsets.y,
      width: rect.width,
      height: rect.height
    };
  }

  const platform = {
    getClippingRect,
    convertOffsetParentRelativeRectToViewportRelativeRect,
    isElement,
    getDimensions,
    getOffsetParent,
    getDocumentElement,
    getScale,
    async getElementRects(_ref) {
      let {
        reference,
        floating,
        strategy
      } = _ref;
      const getOffsetParentFn = this.getOffsetParent || getOffsetParent;
      const getDimensionsFn = this.getDimensions;
      return {
        reference: getRectRelativeToOffsetParent(reference, await getOffsetParentFn(floating), strategy),
        floating: {
          x: 0,
          y: 0,
          ...(await getDimensionsFn(floating))
        }
      };
    },
    getClientRects: element => Array.from(element.getClientRects()),
    isRTL: element => getComputedStyle$1(element).direction === 'rtl'
  };

  // https://samthor.au/2021/observing-dom/
  function observeMove(element, onMove) {
    let io = null;
    let timeoutId;
    const root = getDocumentElement(element);
    function cleanup() {
      clearTimeout(timeoutId);
      io && io.disconnect();
      io = null;
    }
    function refresh(skip, threshold) {
      if (skip === void 0) {
        skip = false;
      }
      if (threshold === void 0) {
        threshold = 1;
      }
      cleanup();
      const {
        left,
        top,
        width,
        height
      } = element.getBoundingClientRect();
      if (!skip) {
        onMove();
      }
      if (!width || !height) {
        return;
      }
      const insetTop = floor(top);
      const insetRight = floor(root.clientWidth - (left + width));
      const insetBottom = floor(root.clientHeight - (top + height));
      const insetLeft = floor(left);
      const rootMargin = -insetTop + "px " + -insetRight + "px " + -insetBottom + "px " + -insetLeft + "px";
      let isFirstUpdate = true;
      io = new IntersectionObserver(entries => {
        const ratio = entries[0].intersectionRatio;
        if (ratio !== threshold) {
          if (!isFirstUpdate) {
            return refresh();
          }
          if (ratio === 0) {
            timeoutId = setTimeout(() => {
              refresh(false, 1e-7);
            }, 100);
          } else {
            refresh(false, ratio);
          }
        }
        isFirstUpdate = false;
      }, {
        rootMargin,
        threshold
      });
      io.observe(element);
    }
    refresh(true);
    return cleanup;
  }

  /**
   * Automatically updates the position of the floating element when necessary.
   * Should only be called when the floating element is mounted on the DOM or
   * visible on the screen.
   * @returns cleanup function that should be invoked when the floating element is
   * removed from the DOM or hidden from the screen.
   * @see https://floating-ui.com/docs/autoUpdate
   */
  function autoUpdate(reference, floating, update, options) {
    if (options === void 0) {
      options = {};
    }
    const {
      ancestorScroll = true,
      ancestorResize = true,
      elementResize = true,
      layoutShift = typeof IntersectionObserver === 'function',
      animationFrame = false
    } = options;
    const referenceEl = unwrapElement(reference);
    const ancestors = ancestorScroll || ancestorResize ? [...(referenceEl ? getOverflowAncestors(referenceEl) : []), ...getOverflowAncestors(floating)] : [];
    ancestors.forEach(ancestor => {
      ancestorScroll && ancestor.addEventListener('scroll', update, {
        passive: true
      });
      ancestorResize && ancestor.addEventListener('resize', update);
    });
    const cleanupIo = referenceEl && layoutShift ? observeMove(referenceEl, update) : null;
    let resizeObserver = null;
    if (elementResize) {
      resizeObserver = new ResizeObserver(update);
      if (referenceEl && !animationFrame) {
        resizeObserver.observe(referenceEl);
      }
      resizeObserver.observe(floating);
    }
    let frameId;
    let prevRefRect = animationFrame ? getBoundingClientRect(reference) : null;
    if (animationFrame) {
      frameLoop();
    }
    function frameLoop() {
      const nextRefRect = getBoundingClientRect(reference);
      if (prevRefRect && (nextRefRect.x !== prevRefRect.x || nextRefRect.y !== prevRefRect.y || nextRefRect.width !== prevRefRect.width || nextRefRect.height !== prevRefRect.height)) {
        update();
      }
      prevRefRect = nextRefRect;
      frameId = requestAnimationFrame(frameLoop);
    }
    update();
    return () => {
      ancestors.forEach(ancestor => {
        ancestorScroll && ancestor.removeEventListener('scroll', update);
        ancestorResize && ancestor.removeEventListener('resize', update);
      });
      cleanupIo && cleanupIo();
      resizeObserver && resizeObserver.disconnect();
      resizeObserver = null;
      if (animationFrame) {
        cancelAnimationFrame(frameId);
      }
    };
  }

  /**
   * Computes the `x` and `y` coordinates that will place the floating element
   * next to a reference element when it is given a certain CSS positioning
   * strategy.
   */
  const computePosition = (reference, floating, options) => {
    // This caches the expensive `getClippingElementAncestors` function so that
    // multiple lifecycle resets re-use the same result. It only lives for a
    // single call. If other functions become expensive, we can add them as well.
    const cache = new Map();
    const mergedOptions = {
      platform,
      ...options
    };
    const platformWithCache = {
      ...mergedOptions.platform,
      _c: cache
    };
    return core.computePosition(reference, floating, {
      ...mergedOptions,
      platform: platformWithCache
    });
  };

  Object.defineProperty(exports, 'arrow', {
    enumerable: true,
    get: function () { return core.arrow; }
  });
  Object.defineProperty(exports, 'autoPlacement', {
    enumerable: true,
    get: function () { return core.autoPlacement; }
  });
  Object.defineProperty(exports, 'detectOverflow', {
    enumerable: true,
    get: function () { return core.detectOverflow; }
  });
  Object.defineProperty(exports, 'flip', {
    enumerable: true,
    get: function () { return core.flip; }
  });
  Object.defineProperty(exports, 'hide', {
    enumerable: true,
    get: function () { return core.hide; }
  });
  Object.defineProperty(exports, 'inline', {
    enumerable: true,
    get: function () { return core.inline; }
  });
  Object.defineProperty(exports, 'limitShift', {
    enumerable: true,
    get: function () { return core.limitShift; }
  });
  Object.defineProperty(exports, 'offset', {
    enumerable: true,
    get: function () { return core.offset; }
  });
  Object.defineProperty(exports, 'shift', {
    enumerable: true,
    get: function () { return core.shift; }
  });
  Object.defineProperty(exports, 'size', {
    enumerable: true,
    get: function () { return core.size; }
  });
  exports.autoUpdate = autoUpdate;
  exports.computePosition = computePosition;
  exports.getOverflowAncestors = getOverflowAncestors;
  exports.platform = platform;

  Object.defineProperty(exports, '__esModule', { value: true });

}));
;
((Drupal,once,_ref)=>{let {computePosition,offset,shift,flip}=_ref;Drupal.theme.ginTooltipWrapper=(dataset,title)=>`<div class="gin-tooltip ${dataset.drupalTooltipClass||""}">\n      ${dataset.drupalTooltip||title}\n    </div>`,Drupal.behaviors.ginTooltip={attach:(context)=>{Drupal.ginTooltip.init(context);}},Drupal.ginTooltip={init:function(context){once("ginTooltipInit","[data-gin-tooltip]",context).forEach(((trigger)=>{const title=trigger.title;title&&(trigger.title=""),trigger.insertAdjacentHTML("afterend",Drupal.theme.ginTooltipWrapper(trigger.dataset,title));const tooltip=trigger.nextElementSibling,updatePosition=()=>{this.computePosition(trigger,tooltip);};new ResizeObserver(updatePosition).observe(trigger),new MutationObserver(updatePosition).observe(trigger,{attributes:!0,childList:!0,subtree:!0}),trigger.addEventListener("mouseover",updatePosition),trigger.addEventListener("focus",updatePosition);}));},computePosition:function(trigger,tooltip){let placement=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"bottom-end";computePosition(trigger,tooltip,{strategy:"absolute",placement:trigger.dataset.drupalTooltipPosition||placement,middleware:[flip({padding:16}),offset(6),shift({padding:16})]}).then(((_ref2)=>{let {x,y}=_ref2;Object.assign(tooltip.style,{"inset-inline-start":`${x}px`,"inset-block-start":`${y}px`});}));}};})(Drupal,once,FloatingUIDOM);;
((Drupal)=>{Drupal.behaviors.ginSticky={attach:(context)=>{once("ginSticky",".region-sticky-watcher").forEach((()=>{const observer=new IntersectionObserver(((_ref)=>{let [e]=_ref;const regionSticky=context.querySelector(".region-sticky");regionSticky.classList.toggle("region-sticky--is-sticky",e.intersectionRatio<1),regionSticky.toggleAttribute("data-offset-top",e.intersectionRatio<1),Drupal.displace(!0);}),{threshold:[1]}),element=context.querySelector(".region-sticky-watcher");element&&observer.observe(element);}));}};})(Drupal);;
(($,Drupal,once)=>{Drupal.behaviors.claroAutoCompete={attach(context){once('claroAutoComplete','input.form-autocomplete',context).forEach((value)=>{const $input=$(value);const classRemove=($autoCompleteElem)=>{$autoCompleteElem.removeClass('is-autocompleting');$autoCompleteElem.siblings('[data-drupal-selector="autocomplete-message"]').addClass('hidden');};$input.autocomplete({search(event){const result=Drupal.autocomplete.options.search(event);if(result){$(event.target).addClass('is-autocompleting');$(event.target).siblings('[data-drupal-selector="autocomplete-message"]').removeClass('hidden');}return result;},response(event){classRemove($(event.target));}});});}};})(jQuery,Drupal,once);;
!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.CKEditor5=e():(t.CKEditor5=t.CKEditor5||{},t.CKEditor5.linkit=e())}(self,(()=>(()=>{var t={"ckeditor5/src/core.js":(t,e,i)=>{t.exports=i("dll-reference CKEditor5.dll")("./src/core.js")},"ckeditor5/src/typing.js":(t,e,i)=>{t.exports=i("dll-reference CKEditor5.dll")("./src/typing.js")},"dll-reference CKEditor5.dll":t=>{"use strict";t.exports=CKEditor5.dll}},e={};function i(n){var s=e[n];if(void 0!==s)return s.exports;var o=e[n]={exports:{}};return t[n](o,o.exports,i),o.exports}i.d=(t,e)=>{for(var n in e)i.o(e,n)&&!i.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},i.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e);var n={};return(()=>{"use strict";i.d(n,{default:()=>u});var t=i("ckeditor5/src/core.js"),e=i("ckeditor5/src/typing.js");class s extends t.Plugin{init(){this.attrs=["linkDataEntityType","linkDataEntityUuid","linkDataEntitySubstitution"],this.attrsView=["data-entity-type","data-entity-uuid","data-entity-substitution"],this._allowAndConvertExtraAttributes(),this._removeExtraAttributesOnUnlinkCommandExecute(),this._refreshExtraAttributeValues(),this._addExtraAttributesOnLinkCommandExecute()}_allowAndConvertExtraAttributes(){const t=this.editor;t.model.schema.extend("$text",{allowAttributes:this.attrs}),this.attrs.forEach(((e,i)=>{t.conversion.for("downcast").attributeToElement({model:e,view:(t,{writer:e})=>{const n=e.createAttributeElement("a",{[this.attrsView[i]]:t},{priority:5});return e.setCustomProperty("link",!0,n),n}}),t.conversion.for("upcast").elementToAttribute({view:{name:"a",attributes:{[this.attrsView[i]]:!0}},model:{key:e,value:t=>t.getAttribute(this.attrsView[i])}})}))}_addExtraAttributesOnLinkCommandExecute(){const t=this.editor,e=t.commands.get("link");let i=!1;e.on("execute",((e,n)=>{if(n.length<3)return;if(i)return void(i=!1);e.stop(),i=!0;const s=n[n.length-1],o=this.editor.model,r=o.document.selection;o.change((e=>{t.execute("link",...n);const i=r.getFirstPosition();this.attrs.forEach((t=>{if(r.isCollapsed){const n=i.textNode||i.nodeBefore;s[t]?e.setAttribute(t,s[t],e.createRangeOn(n)):e.removeAttribute(t,e.createRangeOn(n)),e.removeSelectionAttribute(t)}else{const i=o.schema.getValidRanges(r.getRanges(),t);for(const n of i)s[t]?e.setAttribute(t,s[t],n):e.removeAttribute(t,n)}}))}))}),{priority:"high"})}_removeExtraAttributesOnUnlinkCommandExecute(){const t=this.editor,i=t.commands.get("unlink"),n=this.editor.model,s=n.document.selection;let o=!1;i.on("execute",(i=>{o||(i.stop(),n.change((()=>{o=!0,t.execute("unlink"),o=!1,n.change((t=>{let i;this.attrs.forEach((o=>{i=s.isCollapsed?[(0,e.findAttributeRange)(s.getFirstPosition(),o,s.getAttribute(o),n)]:n.schema.getValidRanges(s.getRanges(),o);for(const e of i)t.removeAttribute(o,e)}))}))})))}),{priority:"high"})}_refreshExtraAttributeValues(){const t=this.editor,e=this.attrs,i=t.commands.get("link"),n=this.editor.model,s=n.document.selection;e.forEach((t=>{i.set(t,null)})),n.document.on("change",(()=>{e.forEach((t=>{i[t]=s.getAttribute(t)}))}))}static get pluginName(){return"LinkitEditing"}}const o=jQuery;function r(t,e){var i=o("<li>").addClass("linkit-result-line"),n=o("<div>").addClass("linkit-result-line-wrapper");return n.addClass(e.status),n.append(o("<span>").html(e.label).addClass("linkit-result-line--title")),e.hasOwnProperty("description")&&n.append(o("<span>").html(e.description).addClass("linkit-result-line--description")),i.append(n).appendTo(t)}function a(t,e){var i=this.element.autocomplete("instance"),n={};e.forEach((function(t){const e=t.hasOwnProperty("group")?t.group:"";n.hasOwnProperty(e)||(n[e]=[]),n[e].push(t)})),o.each(n,(function(e,n){e.length&&t.append('<li class="linkit-result-line--group ui-menu-divider">'+e+"</li>"),o.each(n,(function(e,n){i._renderItemData(t,n)}))}))}class l extends t.Plugin{static get requires(){return[s]}init(){this._state={};const t=this.editor;t.config.get("linkit");t.plugins.get("LinkUI")._createViews(),this._enableLinkAutocomplete(),this._handleExtraFormFieldSubmit(),this._handleDataLoadingIntoExtraFormField()}_enableLinkAutocomplete(){const t=this.editor,e=t.config.get("linkit"),i=t.plugins.get("LinkUI").formView,n=i.urlInputView.fieldView.element;let s=!1;i.extendTemplate({attributes:{class:["ck-vertical-form","ck-link-form_layout-vertical"]}}),t.plugins.get("ContextualBalloon").on("set:visibleView",((t,l,u,d)=>{if(u!==i||s)return;let c;!function(t,e){const{autocompleteUrl:i,selectHandler:n,closeHandler:s,openHandler:l}=e,u={cache:{},ajax:{dataType:"json",jsonp:!1}},d={appendTo:t.closest(".ck-labeled-field-view"),source:function(t,e){const{cache:n}=u;var s=t.term;n.hasOwnProperty(s)?e(n[s]):o.ajax(i,{success:function(t){n[s]=t.suggestions,e(t.suggestions)},data:{q:s},...u.ajax})},select:n,focus:()=>!1,search:()=>!d.isComposing,close:s,open:l,minLength:1,isComposing:!1},c=o(t).autocomplete(d),p=c.data("ui-autocomplete");p.widget().menu("option","items","> :not(.linkit-result-line--group)"),p._renderMenu=a,p._renderItem=r,c.autocomplete("widget").addClass("linkit-ui-autocomplete ck-reset_all-excluded"),c.on("click",(function(){c.autocomplete("search",c.val())})),c.on("compositionstart.autocomplete",(function(){d.isComposing=!0})),c.on("compositionend.autocomplete",(function(){d.isComposing=!1}))}(n,{...e,selectHandler:(t,{item:e})=>{if(!e.path)throw"Missing path param."+JSON.stringify(e);if(e.entity_type_id||e.entity_uuid||e.substitution_id){if(!e.entity_type_id||!e.entity_uuid||!e.substitution_id)throw"Missing path param."+JSON.stringify(e);this.set("entityType",e.entity_type_id),this.set("entityUuid",e.entity_uuid),this.set("entitySubstitution",e.substitution_id)}else this.set("entityType",null),this.set("entityUuid",null),this.set("entitySubstitution",null);return i.urlInputView.fieldView.set("value",e.path),c=!0,!1},openHandler:t=>{c=!1},closeHandler:t=>{c=!1}}),s=!0,i.urlInputView.fieldView.template.attributes.class.push("form-linkit-autocomplete")}))}_handleExtraFormFieldSubmit(){const t=this.editor,e=t.plugins.get("LinkUI").formView,i=t.commands.get("link"),n=t.plugins.get("Linkit");e.urlInputView.fieldView.element.addEventListener("input",(function(t){n.set("entityType",null),n.set("entityUuid",null),n.set("entitySubstitution",null)})),this.listenTo(e,"submit",(()=>{const t={linkDataEntityType:this.entityType,linkDataEntityUuid:this.entityUuid,linkDataEntitySubstitution:this.entitySubstitution};i.once("execute",((e,i)=>{if(i.length<3)i.push(t);else{if(3!==i.length)throw Error("The link command has more than 3 arguments.");Object.assign(i[2],t)}}),{priority:"highest"})}),{priority:"high"})}_handleDataLoadingIntoExtraFormField(){const t=this.editor.commands.get("link");this.bind("entityType").to(t,"linkDataEntityType"),this.bind("entityUuid").to(t,"linkDataEntityUuid"),this.bind("entitySubstitution").to(t,"linkDataEntitySubstitution")}static get pluginName(){return"Linkit"}}const u={Linkit:l}})(),n=n.default})()));;
(function($,Drupal,{focusable}){Drupal.behaviors.dialog={attach(context,settings){const $context=$(context);if(!$('#drupal-modal').length)$('<div id="drupal-modal" class="ui-front"></div>').hide().appendTo('body');const $dialog=$context.closest('.ui-dialog-content');if($dialog.length){if($dialog.dialog('option','drupalAutoButtons'))$dialog.trigger('dialogButtonsChange');setTimeout(function(){if(!$dialog[0].contains(document.activeElement)){$dialog.dialog('instance')._focusedElement=null;$dialog.dialog('instance')._focusTabbable();}},0);}const originalClose=settings.dialog.close;settings.dialog.close=function(event,...args){originalClose.apply(settings.dialog,[event,...args]);const $element=$(event.target);const ajaxContainer=$element.data('uiDialog')?$element.data('uiDialog').opener.closest('[data-drupal-ajax-container]'):[];if(ajaxContainer.length&&(document.activeElement===document.body||$(document.activeElement).not(':visible'))){const focusableChildren=focusable(ajaxContainer[0]);if(focusableChildren.length>0)setTimeout(()=>{focusableChildren[0].focus();},0);}$(event.target).remove();};},prepareDialogButtons($dialog){const buttons=[];const $buttons=$dialog.find('.form-actions input[type=submit], .form-actions a.button, .form-actions a.action-link');$buttons.each(function(){const $originalButton=$(this);this.style.display='none';buttons.push({text:$originalButton.html()||$originalButton.attr('value'),class:$originalButton.attr('class'),'data-once':$originalButton.data('once'),click(e){if($originalButton[0].tagName==='A')$originalButton[0].click();else $originalButton.trigger('mousedown').trigger('mouseup').trigger('click');e.preventDefault();}});});return buttons;}};Drupal.AjaxCommands.prototype.openDialog=function(ajax,response,status){if(!response.selector)return false;let $dialog=$(response.selector);if(!$dialog.length)$dialog=$(`<div id="${response.selector.replace(/^#/,'')}" class="ui-front"></div>`).appendTo('body');if(!ajax.wrapper)ajax.wrapper=$dialog.attr('id');response.command='insert';response.method='html';ajax.commands.insert(ajax,response,status);response.dialogOptions=response.dialogOptions||{};if(typeof response.dialogOptions.drupalAutoButtons==='undefined')response.dialogOptions.drupalAutoButtons=true;else if(response.dialogOptions.drupalAutoButtons==='false')response.dialogOptions.drupalAutoButtons=false;else response.dialogOptions.drupalAutoButtons=!!response.dialogOptions.drupalAutoButtons;if(!response.dialogOptions.buttons&&response.dialogOptions.drupalAutoButtons)response.dialogOptions.buttons=Drupal.behaviors.dialog.prepareDialogButtons($dialog);$dialog.on('dialogButtonsChange',()=>{const buttons=Drupal.behaviors.dialog.prepareDialogButtons($dialog);$dialog.dialog('option','buttons',buttons);});response.dialogOptions=response.dialogOptions||{};const dialog=Drupal.dialog($dialog.get(0),response.dialogOptions);if(response.dialogOptions.modal)dialog.showModal();else dialog.show();$dialog.parent().find('.ui-dialog-buttonset').addClass('form-actions');};Drupal.AjaxCommands.prototype.closeDialog=function(ajax,response,status){const $dialog=$(response.selector);if($dialog.length){Drupal.dialog($dialog.get(0)).close();if(!response.persist)$dialog.remove();}$dialog.off('dialogButtonsChange');};Drupal.AjaxCommands.prototype.setDialogOption=function(ajax,response,status){const $dialog=$(response.selector);if($dialog.length)$dialog.dialog('option',response.optionName,response.optionValue);};window.addEventListener('dialog:aftercreate',(event)=>{const $element=$(event.target);const dialog=event.dialog;$element.on('click.dialog','.dialog-cancel',(e)=>{dialog.close('cancel');e.preventDefault();e.stopPropagation();});});window.addEventListener('dialog:beforeclose',(e)=>{const $element=$(e.target);$element.off('.dialog');});Drupal.AjaxCommands.prototype.openModalDialogWithUrl=function(ajax,response){const dialogOptions=response.dialogOptions||{};const elementSettings={progress:{type:'throbber'},dialogType:'modal',dialog:dialogOptions,url:response.url,httpMethod:'GET'};Drupal.ajax(elementSettings).execute();};})(jQuery,Drupal,window.tabbable);;
/* @license MIT https://raw.githubusercontent.com/SortableJS/Sortable/1.15.6/LICENSE */
/*! Sortable 1.15.6 - MIT | git://github.com/SortableJS/Sortable.git */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t=t||self).Sortable=e()}(this,function(){"use strict";function e(e,t){var n,o=Object.keys(e);return Object.getOwnPropertySymbols&&(n=Object.getOwnPropertySymbols(e),t&&(n=n.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable})),o.push.apply(o,n)),o}function I(o){for(var t=1;t<arguments.length;t++){var i=null!=arguments[t]?arguments[t]:{};t%2?e(Object(i),!0).forEach(function(t){var e,n;e=o,t=i[n=t],n in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t}):Object.getOwnPropertyDescriptors?Object.defineProperties(o,Object.getOwnPropertyDescriptors(i)):e(Object(i)).forEach(function(t){Object.defineProperty(o,t,Object.getOwnPropertyDescriptor(i,t))})}return o}function o(t){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function a(){return(a=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n,o=arguments[e];for(n in o)Object.prototype.hasOwnProperty.call(o,n)&&(t[n]=o[n])}return t}).apply(this,arguments)}function i(t,e){if(null==t)return{};var n,o=function(t,e){if(null==t)return{};for(var n,o={},i=Object.keys(t),r=0;r<i.length;r++)n=i[r],0<=e.indexOf(n)||(o[n]=t[n]);return o}(t,e);if(Object.getOwnPropertySymbols)for(var i=Object.getOwnPropertySymbols(t),r=0;r<i.length;r++)n=i[r],0<=e.indexOf(n)||Object.prototype.propertyIsEnumerable.call(t,n)&&(o[n]=t[n]);return o}function r(t){return function(t){if(Array.isArray(t))return l(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(t){if("string"==typeof t)return l(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Map"===(n="Object"===n&&t.constructor?t.constructor.name:n)||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?l(t,e):void 0}}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function l(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,o=new Array(e);n<e;n++)o[n]=t[n];return o}function t(t){if("undefined"!=typeof window&&window.navigator)return!!navigator.userAgent.match(t)}var y=t(/(?:Trident.*rv[ :]?11\.|msie|iemobile|Windows Phone)/i),w=t(/Edge/i),s=t(/firefox/i),u=t(/safari/i)&&!t(/chrome/i)&&!t(/android/i),c=t(/iP(ad|od|hone)/i),n=t(/chrome/i)&&t(/android/i),d={capture:!1,passive:!1};function h(t,e,n){t.addEventListener(e,n,!y&&d)}function p(t,e,n){t.removeEventListener(e,n,!y&&d)}function f(t,e){if(e&&(">"===e[0]&&(e=e.substring(1)),t))try{if(t.matches)return t.matches(e);if(t.msMatchesSelector)return t.msMatchesSelector(e);if(t.webkitMatchesSelector)return t.webkitMatchesSelector(e)}catch(t){return}}function g(t){return t.host&&t!==document&&t.host.nodeType?t.host:t.parentNode}function P(t,e,n,o){if(t){n=n||document;do{if(null!=e&&(">"!==e[0]||t.parentNode===n)&&f(t,e)||o&&t===n)return t}while(t!==n&&(t=g(t)))}return null}var m,v=/\s+/g;function k(t,e,n){var o;t&&e&&(t.classList?t.classList[n?"add":"remove"](e):(o=(" "+t.className+" ").replace(v," ").replace(" "+e+" "," "),t.className=(o+(n?" "+e:"")).replace(v," ")))}function R(t,e,n){var o=t&&t.style;if(o){if(void 0===n)return document.defaultView&&document.defaultView.getComputedStyle?n=document.defaultView.getComputedStyle(t,""):t.currentStyle&&(n=t.currentStyle),void 0===e?n:n[e];o[e=!(e in o||-1!==e.indexOf("webkit"))?"-webkit-"+e:e]=n+("string"==typeof n?"":"px")}}function b(t,e){var n="";if("string"==typeof t)n=t;else do{var o=R(t,"transform")}while(o&&"none"!==o&&(n=o+" "+n),!e&&(t=t.parentNode));var i=window.DOMMatrix||window.WebKitCSSMatrix||window.CSSMatrix||window.MSCSSMatrix;return i&&new i(n)}function D(t,e,n){if(t){var o=t.getElementsByTagName(e),i=0,r=o.length;if(n)for(;i<r;i++)n(o[i],i);return o}return[]}function O(){var t=document.scrollingElement;return t||document.documentElement}function X(t,e,n,o,i){if(t.getBoundingClientRect||t===window){var r,a,l,s,c,u,d=t!==window&&t.parentNode&&t!==O()?(a=(r=t.getBoundingClientRect()).top,l=r.left,s=r.bottom,c=r.right,u=r.height,r.width):(l=a=0,s=window.innerHeight,c=window.innerWidth,u=window.innerHeight,window.innerWidth);if((e||n)&&t!==window&&(i=i||t.parentNode,!y))do{if(i&&i.getBoundingClientRect&&("none"!==R(i,"transform")||n&&"static"!==R(i,"position"))){var h=i.getBoundingClientRect();a-=h.top+parseInt(R(i,"border-top-width")),l-=h.left+parseInt(R(i,"border-left-width")),s=a+r.height,c=l+r.width;break}}while(i=i.parentNode);return o&&t!==window&&(o=(e=b(i||t))&&e.a,t=e&&e.d,e&&(s=(a/=t)+(u/=t),c=(l/=o)+(d/=o))),{top:a,left:l,bottom:s,right:c,width:d,height:u}}}function Y(t,e,n){for(var o=M(t,!0),i=X(t)[e];o;){var r=X(o)[n];if(!("top"===n||"left"===n?r<=i:i<=r))return o;if(o===O())break;o=M(o,!1)}return!1}function B(t,e,n,o){for(var i=0,r=0,a=t.children;r<a.length;){if("none"!==a[r].style.display&&a[r]!==jt.ghost&&(o||a[r]!==jt.dragged)&&P(a[r],n.draggable,t,!1)){if(i===e)return a[r];i++}r++}return null}function F(t,e){for(var n=t.lastElementChild;n&&(n===jt.ghost||"none"===R(n,"display")||e&&!f(n,e));)n=n.previousElementSibling;return n||null}function j(t,e){var n=0;if(!t||!t.parentNode)return-1;for(;t=t.previousElementSibling;)"TEMPLATE"===t.nodeName.toUpperCase()||t===jt.clone||e&&!f(t,e)||n++;return n}function E(t){var e=0,n=0,o=O();if(t)do{var i=b(t),r=i.a,i=i.d}while(e+=t.scrollLeft*r,n+=t.scrollTop*i,t!==o&&(t=t.parentNode));return[e,n]}function M(t,e){if(!t||!t.getBoundingClientRect)return O();var n=t,o=!1;do{if(n.clientWidth<n.scrollWidth||n.clientHeight<n.scrollHeight){var i=R(n);if(n.clientWidth<n.scrollWidth&&("auto"==i.overflowX||"scroll"==i.overflowX)||n.clientHeight<n.scrollHeight&&("auto"==i.overflowY||"scroll"==i.overflowY)){if(!n.getBoundingClientRect||n===document.body)return O();if(o||e)return n;o=!0}}}while(n=n.parentNode);return O()}function S(t,e){return Math.round(t.top)===Math.round(e.top)&&Math.round(t.left)===Math.round(e.left)&&Math.round(t.height)===Math.round(e.height)&&Math.round(t.width)===Math.round(e.width)}function _(e,n){return function(){var t;m||(1===(t=arguments).length?e.call(this,t[0]):e.apply(this,t),m=setTimeout(function(){m=void 0},n))}}function H(t,e,n){t.scrollLeft+=e,t.scrollTop+=n}function C(t){var e=window.Polymer,n=window.jQuery||window.Zepto;return e&&e.dom?e.dom(t).cloneNode(!0):n?n(t).clone(!0)[0]:t.cloneNode(!0)}function T(t,e){R(t,"position","absolute"),R(t,"top",e.top),R(t,"left",e.left),R(t,"width",e.width),R(t,"height",e.height)}function x(t){R(t,"position",""),R(t,"top",""),R(t,"left",""),R(t,"width",""),R(t,"height","")}function L(n,o,i){var r={};return Array.from(n.children).forEach(function(t){var e;P(t,o.draggable,n,!1)&&!t.animated&&t!==i&&(e=X(t),r.left=Math.min(null!==(t=r.left)&&void 0!==t?t:1/0,e.left),r.top=Math.min(null!==(t=r.top)&&void 0!==t?t:1/0,e.top),r.right=Math.max(null!==(t=r.right)&&void 0!==t?t:-1/0,e.right),r.bottom=Math.max(null!==(t=r.bottom)&&void 0!==t?t:-1/0,e.bottom))}),r.width=r.right-r.left,r.height=r.bottom-r.top,r.x=r.left,r.y=r.top,r}var K="Sortable"+(new Date).getTime();function A(){var e,o=[];return{captureAnimationState:function(){o=[],this.options.animation&&[].slice.call(this.el.children).forEach(function(t){var e,n;"none"!==R(t,"display")&&t!==jt.ghost&&(o.push({target:t,rect:X(t)}),e=I({},o[o.length-1].rect),!t.thisAnimationDuration||(n=b(t,!0))&&(e.top-=n.f,e.left-=n.e),t.fromRect=e)})},addAnimationState:function(t){o.push(t)},removeAnimationState:function(t){o.splice(function(t,e){for(var n in t)if(t.hasOwnProperty(n))for(var o in e)if(e.hasOwnProperty(o)&&e[o]===t[n][o])return Number(n);return-1}(o,{target:t}),1)},animateAll:function(t){var c=this;if(!this.options.animation)return clearTimeout(e),void("function"==typeof t&&t());var u=!1,d=0;o.forEach(function(t){var e=0,n=t.target,o=n.fromRect,i=X(n),r=n.prevFromRect,a=n.prevToRect,l=t.rect,s=b(n,!0);s&&(i.top-=s.f,i.left-=s.e),n.toRect=i,n.thisAnimationDuration&&S(r,i)&&!S(o,i)&&(l.top-i.top)/(l.left-i.left)==(o.top-i.top)/(o.left-i.left)&&(t=l,s=r,r=a,a=c.options,e=Math.sqrt(Math.pow(s.top-t.top,2)+Math.pow(s.left-t.left,2))/Math.sqrt(Math.pow(s.top-r.top,2)+Math.pow(s.left-r.left,2))*a.animation),S(i,o)||(n.prevFromRect=o,n.prevToRect=i,e=e||c.options.animation,c.animate(n,l,i,e)),e&&(u=!0,d=Math.max(d,e),clearTimeout(n.animationResetTimer),n.animationResetTimer=setTimeout(function(){n.animationTime=0,n.prevFromRect=null,n.fromRect=null,n.prevToRect=null,n.thisAnimationDuration=null},e),n.thisAnimationDuration=e)}),clearTimeout(e),u?e=setTimeout(function(){"function"==typeof t&&t()},d):"function"==typeof t&&t(),o=[]},animate:function(t,e,n,o){var i,r;o&&(R(t,"transition",""),R(t,"transform",""),i=(r=b(this.el))&&r.a,r=r&&r.d,i=(e.left-n.left)/(i||1),r=(e.top-n.top)/(r||1),t.animatingX=!!i,t.animatingY=!!r,R(t,"transform","translate3d("+i+"px,"+r+"px,0)"),this.forRepaintDummy=t.offsetWidth,R(t,"transition","transform "+o+"ms"+(this.options.easing?" "+this.options.easing:"")),R(t,"transform","translate3d(0,0,0)"),"number"==typeof t.animated&&clearTimeout(t.animated),t.animated=setTimeout(function(){R(t,"transition",""),R(t,"transform",""),t.animated=!1,t.animatingX=!1,t.animatingY=!1},o))}}}var N=[],W={initializeByDefault:!0},z={mount:function(e){for(var t in W)!W.hasOwnProperty(t)||t in e||(e[t]=W[t]);N.forEach(function(t){if(t.pluginName===e.pluginName)throw"Sortable: Cannot mount plugin ".concat(e.pluginName," more than once")}),N.push(e)},pluginEvent:function(e,n,o){var t=this;this.eventCanceled=!1,o.cancel=function(){t.eventCanceled=!0};var i=e+"Global";N.forEach(function(t){n[t.pluginName]&&(n[t.pluginName][i]&&n[t.pluginName][i](I({sortable:n},o)),n.options[t.pluginName]&&n[t.pluginName][e]&&n[t.pluginName][e](I({sortable:n},o)))})},initializePlugins:function(n,o,i,t){for(var e in N.forEach(function(t){var e=t.pluginName;(n.options[e]||t.initializeByDefault)&&((t=new t(n,o,n.options)).sortable=n,t.options=n.options,n[e]=t,a(i,t.defaults))}),n.options){var r;n.options.hasOwnProperty(e)&&(void 0!==(r=this.modifyOption(n,e,n.options[e]))&&(n.options[e]=r))}},getEventProperties:function(e,n){var o={};return N.forEach(function(t){"function"==typeof t.eventProperties&&a(o,t.eventProperties.call(n[t.pluginName],e))}),o},modifyOption:function(e,n,o){var i;return N.forEach(function(t){e[t.pluginName]&&t.optionListeners&&"function"==typeof t.optionListeners[n]&&(i=t.optionListeners[n].call(e[t.pluginName],o))}),i}};function G(t){var e=t.sortable,n=t.rootEl,o=t.name,i=t.targetEl,r=t.cloneEl,a=t.toEl,l=t.fromEl,s=t.oldIndex,c=t.newIndex,u=t.oldDraggableIndex,d=t.newDraggableIndex,h=t.originalEvent,p=t.putSortable,f=t.extraEventProperties;if(e=e||n&&n[K]){var g,m=e.options,t="on"+o.charAt(0).toUpperCase()+o.substr(1);!window.CustomEvent||y||w?(g=document.createEvent("Event")).initEvent(o,!0,!0):g=new CustomEvent(o,{bubbles:!0,cancelable:!0}),g.to=a||n,g.from=l||n,g.item=i||n,g.clone=r,g.oldIndex=s,g.newIndex=c,g.oldDraggableIndex=u,g.newDraggableIndex=d,g.originalEvent=h,g.pullMode=p?p.lastPutMode:void 0;var v,b=I(I({},f),z.getEventProperties(o,e));for(v in b)g[v]=b[v];n&&n.dispatchEvent(g),m[t]&&m[t].call(e,g)}}function U(t,e){var n=(o=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{}).evt,o=i(o,q);z.pluginEvent.bind(jt)(t,e,I({dragEl:Z,parentEl:$,ghostEl:Q,rootEl:J,nextEl:tt,lastDownEl:et,cloneEl:nt,cloneHidden:ot,dragStarted:mt,putSortable:ct,activeSortable:jt.active,originalEvent:n,oldIndex:it,oldDraggableIndex:at,newIndex:rt,newDraggableIndex:lt,hideGhostForTarget:Xt,unhideGhostForTarget:Yt,cloneNowHidden:function(){ot=!0},cloneNowShown:function(){ot=!1},dispatchSortableEvent:function(t){V({sortable:e,name:t,originalEvent:n})}},o))}var q=["evt"];function V(t){G(I({putSortable:ct,cloneEl:nt,targetEl:Z,rootEl:J,oldIndex:it,oldDraggableIndex:at,newIndex:rt,newDraggableIndex:lt},t))}var Z,$,Q,J,tt,et,nt,ot,it,rt,at,lt,st,ct,ut,dt,ht,pt,ft,gt,mt,vt,bt,yt,wt,Dt=!1,Et=!1,St=[],_t=!1,Ct=!1,Tt=[],xt=!1,Ot=[],Mt="undefined"!=typeof document,At=c,Nt=w||y?"cssFloat":"float",It=Mt&&!n&&!c&&"draggable"in document.createElement("div"),Pt=function(){if(Mt){if(y)return!1;var t=document.createElement("x");return t.style.cssText="pointer-events:auto","auto"===t.style.pointerEvents}}(),kt=function(t,e){var n=R(t),o=parseInt(n.width)-parseInt(n.paddingLeft)-parseInt(n.paddingRight)-parseInt(n.borderLeftWidth)-parseInt(n.borderRightWidth),i=B(t,0,e),r=B(t,1,e),a=i&&R(i),l=r&&R(r),s=a&&parseInt(a.marginLeft)+parseInt(a.marginRight)+X(i).width,t=l&&parseInt(l.marginLeft)+parseInt(l.marginRight)+X(r).width;if("flex"===n.display)return"column"===n.flexDirection||"column-reverse"===n.flexDirection?"vertical":"horizontal";if("grid"===n.display)return n.gridTemplateColumns.split(" ").length<=1?"vertical":"horizontal";if(i&&a.float&&"none"!==a.float){e="left"===a.float?"left":"right";return!r||"both"!==l.clear&&l.clear!==e?"horizontal":"vertical"}return i&&("block"===a.display||"flex"===a.display||"table"===a.display||"grid"===a.display||o<=s&&"none"===n[Nt]||r&&"none"===n[Nt]&&o<s+t)?"vertical":"horizontal"},Rt=function(t){function l(r,a){return function(t,e,n,o){var i=t.options.group.name&&e.options.group.name&&t.options.group.name===e.options.group.name;if(null==r&&(a||i))return!0;if(null==r||!1===r)return!1;if(a&&"clone"===r)return r;if("function"==typeof r)return l(r(t,e,n,o),a)(t,e,n,o);e=(a?t:e).options.group.name;return!0===r||"string"==typeof r&&r===e||r.join&&-1<r.indexOf(e)}}var e={},n=t.group;n&&"object"==o(n)||(n={name:n}),e.name=n.name,e.checkPull=l(n.pull,!0),e.checkPut=l(n.put),e.revertClone=n.revertClone,t.group=e},Xt=function(){!Pt&&Q&&R(Q,"display","none")},Yt=function(){!Pt&&Q&&R(Q,"display","")};Mt&&!n&&document.addEventListener("click",function(t){if(Et)return t.preventDefault(),t.stopPropagation&&t.stopPropagation(),t.stopImmediatePropagation&&t.stopImmediatePropagation(),Et=!1},!0);function Bt(t){if(Z){t=t.touches?t.touches[0]:t;var e=(i=t.clientX,r=t.clientY,St.some(function(t){var e=t[K].options.emptyInsertThreshold;if(e&&!F(t)){var n=X(t),o=i>=n.left-e&&i<=n.right+e,e=r>=n.top-e&&r<=n.bottom+e;return o&&e?a=t:void 0}}),a);if(e){var n,o={};for(n in t)t.hasOwnProperty(n)&&(o[n]=t[n]);o.target=o.rootEl=e,o.preventDefault=void 0,o.stopPropagation=void 0,e[K]._onDragOver(o)}}var i,r,a}function Ft(t){Z&&Z.parentNode[K]._isOutsideThisEl(t.target)}function jt(t,e){if(!t||!t.nodeType||1!==t.nodeType)throw"Sortable: `el` must be an HTMLElement, not ".concat({}.toString.call(t));this.el=t,this.options=e=a({},e),t[K]=this;var n,o,i={group:null,sort:!0,disabled:!1,store:null,handle:null,draggable:/^[uo]l$/i.test(t.nodeName)?">li":">*",swapThreshold:1,invertSwap:!1,invertedSwapThreshold:null,removeCloneOnHide:!0,direction:function(){return kt(t,this.options)},ghostClass:"sortable-ghost",chosenClass:"sortable-chosen",dragClass:"sortable-drag",ignore:"a, img",filter:null,preventOnFilter:!0,animation:0,easing:null,setData:function(t,e){t.setData("Text",e.textContent)},dropBubble:!1,dragoverBubble:!1,dataIdAttr:"data-id",delay:0,delayOnTouchOnly:!1,touchStartThreshold:(Number.parseInt?Number:window).parseInt(window.devicePixelRatio,10)||1,forceFallback:!1,fallbackClass:"sortable-fallback",fallbackOnBody:!1,fallbackTolerance:0,fallbackOffset:{x:0,y:0},supportPointer:!1!==jt.supportPointer&&"PointerEvent"in window&&(!u||c),emptyInsertThreshold:5};for(n in z.initializePlugins(this,t,i),i)n in e||(e[n]=i[n]);for(o in Rt(e),this)"_"===o.charAt(0)&&"function"==typeof this[o]&&(this[o]=this[o].bind(this));this.nativeDraggable=!e.forceFallback&&It,this.nativeDraggable&&(this.options.touchStartThreshold=1),e.supportPointer?h(t,"pointerdown",this._onTapStart):(h(t,"mousedown",this._onTapStart),h(t,"touchstart",this._onTapStart)),this.nativeDraggable&&(h(t,"dragover",this),h(t,"dragenter",this)),St.push(this.el),e.store&&e.store.get&&this.sort(e.store.get(this)||[]),a(this,A())}function Ht(t,e,n,o,i,r,a,l){var s,c,u=t[K],d=u.options.onMove;return!window.CustomEvent||y||w?(s=document.createEvent("Event")).initEvent("move",!0,!0):s=new CustomEvent("move",{bubbles:!0,cancelable:!0}),s.to=e,s.from=t,s.dragged=n,s.draggedRect=o,s.related=i||e,s.relatedRect=r||X(e),s.willInsertAfter=l,s.originalEvent=a,t.dispatchEvent(s),c=d?d.call(u,s,a):c}function Lt(t){t.draggable=!1}function Kt(){xt=!1}function Wt(t){return setTimeout(t,0)}function zt(t){return clearTimeout(t)}jt.prototype={constructor:jt,_isOutsideThisEl:function(t){this.el.contains(t)||t===this.el||(vt=null)},_getDirection:function(t,e){return"function"==typeof this.options.direction?this.options.direction.call(this,t,e,Z):this.options.direction},_onTapStart:function(e){if(e.cancelable){var n=this,o=this.el,t=this.options,i=t.preventOnFilter,r=e.type,a=e.touches&&e.touches[0]||e.pointerType&&"touch"===e.pointerType&&e,l=(a||e).target,s=e.target.shadowRoot&&(e.path&&e.path[0]||e.composedPath&&e.composedPath()[0])||l,c=t.filter;if(!function(t){Ot.length=0;var e=t.getElementsByTagName("input"),n=e.length;for(;n--;){var o=e[n];o.checked&&Ot.push(o)}}(o),!Z&&!(/mousedown|pointerdown/.test(r)&&0!==e.button||t.disabled)&&!s.isContentEditable&&(this.nativeDraggable||!u||!l||"SELECT"!==l.tagName.toUpperCase())&&!((l=P(l,t.draggable,o,!1))&&l.animated||et===l)){if(it=j(l),at=j(l,t.draggable),"function"==typeof c){if(c.call(this,e,l,this))return V({sortable:n,rootEl:s,name:"filter",targetEl:l,toEl:o,fromEl:o}),U("filter",n,{evt:e}),void(i&&e.preventDefault())}else if(c=c&&c.split(",").some(function(t){if(t=P(s,t.trim(),o,!1))return V({sortable:n,rootEl:t,name:"filter",targetEl:l,fromEl:o,toEl:o}),U("filter",n,{evt:e}),!0}))return void(i&&e.preventDefault());t.handle&&!P(s,t.handle,o,!1)||this._prepareDragStart(e,a,l)}}},_prepareDragStart:function(t,e,n){var o,i=this,r=i.el,a=i.options,l=r.ownerDocument;n&&!Z&&n.parentNode===r&&(o=X(n),J=r,$=(Z=n).parentNode,tt=Z.nextSibling,et=n,st=a.group,ut={target:jt.dragged=Z,clientX:(e||t).clientX,clientY:(e||t).clientY},ft=ut.clientX-o.left,gt=ut.clientY-o.top,this._lastX=(e||t).clientX,this._lastY=(e||t).clientY,Z.style["will-change"]="all",o=function(){U("delayEnded",i,{evt:t}),jt.eventCanceled?i._onDrop():(i._disableDelayedDragEvents(),!s&&i.nativeDraggable&&(Z.draggable=!0),i._triggerDragStart(t,e),V({sortable:i,name:"choose",originalEvent:t}),k(Z,a.chosenClass,!0))},a.ignore.split(",").forEach(function(t){D(Z,t.trim(),Lt)}),h(l,"dragover",Bt),h(l,"mousemove",Bt),h(l,"touchmove",Bt),a.supportPointer?(h(l,"pointerup",i._onDrop),this.nativeDraggable||h(l,"pointercancel",i._onDrop)):(h(l,"mouseup",i._onDrop),h(l,"touchend",i._onDrop),h(l,"touchcancel",i._onDrop)),s&&this.nativeDraggable&&(this.options.touchStartThreshold=4,Z.draggable=!0),U("delayStart",this,{evt:t}),!a.delay||a.delayOnTouchOnly&&!e||this.nativeDraggable&&(w||y)?o():jt.eventCanceled?this._onDrop():(a.supportPointer?(h(l,"pointerup",i._disableDelayedDrag),h(l,"pointercancel",i._disableDelayedDrag)):(h(l,"mouseup",i._disableDelayedDrag),h(l,"touchend",i._disableDelayedDrag),h(l,"touchcancel",i._disableDelayedDrag)),h(l,"mousemove",i._delayedDragTouchMoveHandler),h(l,"touchmove",i._delayedDragTouchMoveHandler),a.supportPointer&&h(l,"pointermove",i._delayedDragTouchMoveHandler),i._dragStartTimer=setTimeout(o,a.delay)))},_delayedDragTouchMoveHandler:function(t){t=t.touches?t.touches[0]:t;Math.max(Math.abs(t.clientX-this._lastX),Math.abs(t.clientY-this._lastY))>=Math.floor(this.options.touchStartThreshold/(this.nativeDraggable&&window.devicePixelRatio||1))&&this._disableDelayedDrag()},_disableDelayedDrag:function(){Z&&Lt(Z),clearTimeout(this._dragStartTimer),this._disableDelayedDragEvents()},_disableDelayedDragEvents:function(){var t=this.el.ownerDocument;p(t,"mouseup",this._disableDelayedDrag),p(t,"touchend",this._disableDelayedDrag),p(t,"touchcancel",this._disableDelayedDrag),p(t,"pointerup",this._disableDelayedDrag),p(t,"pointercancel",this._disableDelayedDrag),p(t,"mousemove",this._delayedDragTouchMoveHandler),p(t,"touchmove",this._delayedDragTouchMoveHandler),p(t,"pointermove",this._delayedDragTouchMoveHandler)},_triggerDragStart:function(t,e){e=e||"touch"==t.pointerType&&t,!this.nativeDraggable||e?this.options.supportPointer?h(document,"pointermove",this._onTouchMove):h(document,e?"touchmove":"mousemove",this._onTouchMove):(h(Z,"dragend",this),h(J,"dragstart",this._onDragStart));try{document.selection?Wt(function(){document.selection.empty()}):window.getSelection().removeAllRanges()}catch(t){}},_dragStarted:function(t,e){var n;Dt=!1,J&&Z?(U("dragStarted",this,{evt:e}),this.nativeDraggable&&h(document,"dragover",Ft),n=this.options,t||k(Z,n.dragClass,!1),k(Z,n.ghostClass,!0),jt.active=this,t&&this._appendGhost(),V({sortable:this,name:"start",originalEvent:e})):this._nulling()},_emulateDragOver:function(){if(dt){this._lastX=dt.clientX,this._lastY=dt.clientY,Xt();for(var t=document.elementFromPoint(dt.clientX,dt.clientY),e=t;t&&t.shadowRoot&&(t=t.shadowRoot.elementFromPoint(dt.clientX,dt.clientY))!==e;)e=t;if(Z.parentNode[K]._isOutsideThisEl(t),e)do{if(e[K])if(e[K]._onDragOver({clientX:dt.clientX,clientY:dt.clientY,target:t,rootEl:e})&&!this.options.dragoverBubble)break}while(e=g(t=e));Yt()}},_onTouchMove:function(t){if(ut){var e=this.options,n=e.fallbackTolerance,o=e.fallbackOffset,i=t.touches?t.touches[0]:t,r=Q&&b(Q,!0),a=Q&&r&&r.a,l=Q&&r&&r.d,e=At&&wt&&E(wt),a=(i.clientX-ut.clientX+o.x)/(a||1)+(e?e[0]-Tt[0]:0)/(a||1),l=(i.clientY-ut.clientY+o.y)/(l||1)+(e?e[1]-Tt[1]:0)/(l||1);if(!jt.active&&!Dt){if(n&&Math.max(Math.abs(i.clientX-this._lastX),Math.abs(i.clientY-this._lastY))<n)return;this._onDragStart(t,!0)}Q&&(r?(r.e+=a-(ht||0),r.f+=l-(pt||0)):r={a:1,b:0,c:0,d:1,e:a,f:l},r="matrix(".concat(r.a,",").concat(r.b,",").concat(r.c,",").concat(r.d,",").concat(r.e,",").concat(r.f,")"),R(Q,"webkitTransform",r),R(Q,"mozTransform",r),R(Q,"msTransform",r),R(Q,"transform",r),ht=a,pt=l,dt=i),t.cancelable&&t.preventDefault()}},_appendGhost:function(){if(!Q){var t=this.options.fallbackOnBody?document.body:J,e=X(Z,!0,At,!0,t),n=this.options;if(At){for(wt=t;"static"===R(wt,"position")&&"none"===R(wt,"transform")&&wt!==document;)wt=wt.parentNode;wt!==document.body&&wt!==document.documentElement?(wt===document&&(wt=O()),e.top+=wt.scrollTop,e.left+=wt.scrollLeft):wt=O(),Tt=E(wt)}k(Q=Z.cloneNode(!0),n.ghostClass,!1),k(Q,n.fallbackClass,!0),k(Q,n.dragClass,!0),R(Q,"transition",""),R(Q,"transform",""),R(Q,"box-sizing","border-box"),R(Q,"margin",0),R(Q,"top",e.top),R(Q,"left",e.left),R(Q,"width",e.width),R(Q,"height",e.height),R(Q,"opacity","0.8"),R(Q,"position",At?"absolute":"fixed"),R(Q,"zIndex","100000"),R(Q,"pointerEvents","none"),jt.ghost=Q,t.appendChild(Q),R(Q,"transform-origin",ft/parseInt(Q.style.width)*100+"% "+gt/parseInt(Q.style.height)*100+"%")}},_onDragStart:function(t,e){var n=this,o=t.dataTransfer,i=n.options;U("dragStart",this,{evt:t}),jt.eventCanceled?this._onDrop():(U("setupClone",this),jt.eventCanceled||((nt=C(Z)).removeAttribute("id"),nt.draggable=!1,nt.style["will-change"]="",this._hideClone(),k(nt,this.options.chosenClass,!1),jt.clone=nt),n.cloneId=Wt(function(){U("clone",n),jt.eventCanceled||(n.options.removeCloneOnHide||J.insertBefore(nt,Z),n._hideClone(),V({sortable:n,name:"clone"}))}),e||k(Z,i.dragClass,!0),e?(Et=!0,n._loopId=setInterval(n._emulateDragOver,50)):(p(document,"mouseup",n._onDrop),p(document,"touchend",n._onDrop),p(document,"touchcancel",n._onDrop),o&&(o.effectAllowed="move",i.setData&&i.setData.call(n,o,Z)),h(document,"drop",n),R(Z,"transform","translateZ(0)")),Dt=!0,n._dragStartId=Wt(n._dragStarted.bind(n,e,t)),h(document,"selectstart",n),mt=!0,window.getSelection().removeAllRanges(),u&&R(document.body,"user-select","none"))},_onDragOver:function(n){var o,i,r,t,e,a=this.el,l=n.target,s=this.options,c=s.group,u=jt.active,d=st===c,h=s.sort,p=ct||u,f=this,g=!1;if(!xt){if(void 0!==n.preventDefault&&n.cancelable&&n.preventDefault(),l=P(l,s.draggable,a,!0),O("dragOver"),jt.eventCanceled)return g;if(Z.contains(n.target)||l.animated&&l.animatingX&&l.animatingY||f._ignoreWhileAnimating===l)return A(!1);if(Et=!1,u&&!s.disabled&&(d?h||(i=$!==J):ct===this||(this.lastPutMode=st.checkPull(this,u,Z,n))&&c.checkPut(this,u,Z,n))){if(r="vertical"===this._getDirection(n,l),o=X(Z),O("dragOverValid"),jt.eventCanceled)return g;if(i)return $=J,M(),this._hideClone(),O("revert"),jt.eventCanceled||(tt?J.insertBefore(Z,tt):J.appendChild(Z)),A(!0);var m=F(a,s.draggable);if(m&&(S=n,c=r,x=X(F((E=this).el,E.options.draggable)),E=L(E.el,E.options,Q),!(c?S.clientX>E.right+10||S.clientY>x.bottom&&S.clientX>x.left:S.clientY>E.bottom+10||S.clientX>x.right&&S.clientY>x.top)||m.animated)){if(m&&(t=n,e=r,C=X(B((_=this).el,0,_.options,!0)),_=L(_.el,_.options,Q),e?t.clientX<_.left-10||t.clientY<C.top&&t.clientX<C.right:t.clientY<_.top-10||t.clientY<C.bottom&&t.clientX<C.left)){var v=B(a,0,s,!0);if(v===Z)return A(!1);if(D=X(l=v),!1!==Ht(J,a,Z,o,l,D,n,!1))return M(),a.insertBefore(Z,v),$=a,N(),A(!0)}else if(l.parentNode===a){var b,y,w,D=X(l),E=Z.parentNode!==a,S=(S=Z.animated&&Z.toRect||o,x=l.animated&&l.toRect||D,_=(e=r)?S.left:S.top,t=e?S.right:S.bottom,C=e?S.width:S.height,v=e?x.left:x.top,S=e?x.right:x.bottom,x=e?x.width:x.height,!(_===v||t===S||_+C/2===v+x/2)),_=r?"top":"left",C=Y(l,"top","top")||Y(Z,"top","top"),v=C?C.scrollTop:void 0;if(vt!==l&&(y=D[_],_t=!1,Ct=!S&&s.invertSwap||E),0!==(b=function(t,e,n,o,i,r,a,l){var s=o?t.clientY:t.clientX,c=o?n.height:n.width,t=o?n.top:n.left,o=o?n.bottom:n.right,n=!1;if(!a)if(l&&yt<c*i){if(_t=!_t&&(1===bt?t+c*r/2<s:s<o-c*r/2)?!0:_t)n=!0;else if(1===bt?s<t+yt:o-yt<s)return-bt}else if(t+c*(1-i)/2<s&&s<o-c*(1-i)/2)return function(t){return j(Z)<j(t)?1:-1}(e);if((n=n||a)&&(s<t+c*r/2||o-c*r/2<s))return t+c/2<s?1:-1;return 0}(n,l,D,r,S?1:s.swapThreshold,null==s.invertedSwapThreshold?s.swapThreshold:s.invertedSwapThreshold,Ct,vt===l)))for(var T=j(Z);(w=$.children[T-=b])&&("none"===R(w,"display")||w===Q););if(0===b||w===l)return A(!1);bt=b;var x=(vt=l).nextElementSibling,E=!1,S=Ht(J,a,Z,o,l,D,n,E=1===b);if(!1!==S)return 1!==S&&-1!==S||(E=1===S),xt=!0,setTimeout(Kt,30),M(),E&&!x?a.appendChild(Z):l.parentNode.insertBefore(Z,E?x:l),C&&H(C,0,v-C.scrollTop),$=Z.parentNode,void 0===y||Ct||(yt=Math.abs(y-X(l)[_])),N(),A(!0)}}else{if(m===Z)return A(!1);if((l=m&&a===n.target?m:l)&&(D=X(l)),!1!==Ht(J,a,Z,o,l,D,n,!!l))return M(),m&&m.nextSibling?a.insertBefore(Z,m.nextSibling):a.appendChild(Z),$=a,N(),A(!0)}if(a.contains(Z))return A(!1)}return!1}function O(t,e){U(t,f,I({evt:n,isOwner:d,axis:r?"vertical":"horizontal",revert:i,dragRect:o,targetRect:D,canSort:h,fromSortable:p,target:l,completed:A,onMove:function(t,e){return Ht(J,a,Z,o,t,X(t),n,e)},changed:N},e))}function M(){O("dragOverAnimationCapture"),f.captureAnimationState(),f!==p&&p.captureAnimationState()}function A(t){return O("dragOverCompleted",{insertion:t}),t&&(d?u._hideClone():u._showClone(f),f!==p&&(k(Z,(ct||u).options.ghostClass,!1),k(Z,s.ghostClass,!0)),ct!==f&&f!==jt.active?ct=f:f===jt.active&&ct&&(ct=null),p===f&&(f._ignoreWhileAnimating=l),f.animateAll(function(){O("dragOverAnimationComplete"),f._ignoreWhileAnimating=null}),f!==p&&(p.animateAll(),p._ignoreWhileAnimating=null)),(l===Z&&!Z.animated||l===a&&!l.animated)&&(vt=null),s.dragoverBubble||n.rootEl||l===document||(Z.parentNode[K]._isOutsideThisEl(n.target),t||Bt(n)),!s.dragoverBubble&&n.stopPropagation&&n.stopPropagation(),g=!0}function N(){rt=j(Z),lt=j(Z,s.draggable),V({sortable:f,name:"change",toEl:a,newIndex:rt,newDraggableIndex:lt,originalEvent:n})}},_ignoreWhileAnimating:null,_offMoveEvents:function(){p(document,"mousemove",this._onTouchMove),p(document,"touchmove",this._onTouchMove),p(document,"pointermove",this._onTouchMove),p(document,"dragover",Bt),p(document,"mousemove",Bt),p(document,"touchmove",Bt)},_offUpEvents:function(){var t=this.el.ownerDocument;p(t,"mouseup",this._onDrop),p(t,"touchend",this._onDrop),p(t,"pointerup",this._onDrop),p(t,"pointercancel",this._onDrop),p(t,"touchcancel",this._onDrop),p(document,"selectstart",this)},_onDrop:function(t){var e=this.el,n=this.options;rt=j(Z),lt=j(Z,n.draggable),U("drop",this,{evt:t}),$=Z&&Z.parentNode,rt=j(Z),lt=j(Z,n.draggable),jt.eventCanceled||(_t=Ct=Dt=!1,clearInterval(this._loopId),clearTimeout(this._dragStartTimer),zt(this.cloneId),zt(this._dragStartId),this.nativeDraggable&&(p(document,"drop",this),p(e,"dragstart",this._onDragStart)),this._offMoveEvents(),this._offUpEvents(),u&&R(document.body,"user-select",""),R(Z,"transform",""),t&&(mt&&(t.cancelable&&t.preventDefault(),n.dropBubble||t.stopPropagation()),Q&&Q.parentNode&&Q.parentNode.removeChild(Q),(J===$||ct&&"clone"!==ct.lastPutMode)&&nt&&nt.parentNode&&nt.parentNode.removeChild(nt),Z&&(this.nativeDraggable&&p(Z,"dragend",this),Lt(Z),Z.style["will-change"]="",mt&&!Dt&&k(Z,(ct||this).options.ghostClass,!1),k(Z,this.options.chosenClass,!1),V({sortable:this,name:"unchoose",toEl:$,newIndex:null,newDraggableIndex:null,originalEvent:t}),J!==$?(0<=rt&&(V({rootEl:$,name:"add",toEl:$,fromEl:J,originalEvent:t}),V({sortable:this,name:"remove",toEl:$,originalEvent:t}),V({rootEl:$,name:"sort",toEl:$,fromEl:J,originalEvent:t}),V({sortable:this,name:"sort",toEl:$,originalEvent:t})),ct&&ct.save()):rt!==it&&0<=rt&&(V({sortable:this,name:"update",toEl:$,originalEvent:t}),V({sortable:this,name:"sort",toEl:$,originalEvent:t})),jt.active&&(null!=rt&&-1!==rt||(rt=it,lt=at),V({sortable:this,name:"end",toEl:$,originalEvent:t}),this.save())))),this._nulling()},_nulling:function(){U("nulling",this),J=Z=$=Q=tt=nt=et=ot=ut=dt=mt=rt=lt=it=at=vt=bt=ct=st=jt.dragged=jt.ghost=jt.clone=jt.active=null,Ot.forEach(function(t){t.checked=!0}),Ot.length=ht=pt=0},handleEvent:function(t){switch(t.type){case"drop":case"dragend":this._onDrop(t);break;case"dragenter":case"dragover":Z&&(this._onDragOver(t),function(t){t.dataTransfer&&(t.dataTransfer.dropEffect="move");t.cancelable&&t.preventDefault()}(t));break;case"selectstart":t.preventDefault()}},toArray:function(){for(var t,e=[],n=this.el.children,o=0,i=n.length,r=this.options;o<i;o++)P(t=n[o],r.draggable,this.el,!1)&&e.push(t.getAttribute(r.dataIdAttr)||function(t){var e=t.tagName+t.className+t.src+t.href+t.textContent,n=e.length,o=0;for(;n--;)o+=e.charCodeAt(n);return o.toString(36)}(t));return e},sort:function(t,e){var n={},o=this.el;this.toArray().forEach(function(t,e){e=o.children[e];P(e,this.options.draggable,o,!1)&&(n[t]=e)},this),e&&this.captureAnimationState(),t.forEach(function(t){n[t]&&(o.removeChild(n[t]),o.appendChild(n[t]))}),e&&this.animateAll()},save:function(){var t=this.options.store;t&&t.set&&t.set(this)},closest:function(t,e){return P(t,e||this.options.draggable,this.el,!1)},option:function(t,e){var n=this.options;if(void 0===e)return n[t];var o=z.modifyOption(this,t,e);n[t]=void 0!==o?o:e,"group"===t&&Rt(n)},destroy:function(){U("destroy",this);var t=this.el;t[K]=null,p(t,"mousedown",this._onTapStart),p(t,"touchstart",this._onTapStart),p(t,"pointerdown",this._onTapStart),this.nativeDraggable&&(p(t,"dragover",this),p(t,"dragenter",this)),Array.prototype.forEach.call(t.querySelectorAll("[draggable]"),function(t){t.removeAttribute("draggable")}),this._onDrop(),this._disableDelayedDragEvents(),St.splice(St.indexOf(this.el),1),this.el=t=null},_hideClone:function(){ot||(U("hideClone",this),jt.eventCanceled||(R(nt,"display","none"),this.options.removeCloneOnHide&&nt.parentNode&&nt.parentNode.removeChild(nt),ot=!0))},_showClone:function(t){"clone"===t.lastPutMode?ot&&(U("showClone",this),jt.eventCanceled||(Z.parentNode!=J||this.options.group.revertClone?tt?J.insertBefore(nt,tt):J.appendChild(nt):J.insertBefore(nt,Z),this.options.group.revertClone&&this.animate(Z,nt),R(nt,"display",""),ot=!1)):this._hideClone()}},Mt&&h(document,"touchmove",function(t){(jt.active||Dt)&&t.cancelable&&t.preventDefault()}),jt.utils={on:h,off:p,css:R,find:D,is:function(t,e){return!!P(t,e,t,!1)},extend:function(t,e){if(t&&e)for(var n in e)e.hasOwnProperty(n)&&(t[n]=e[n]);return t},throttle:_,closest:P,toggleClass:k,clone:C,index:j,nextTick:Wt,cancelNextTick:zt,detectDirection:kt,getChild:B,expando:K},jt.get=function(t){return t[K]},jt.mount=function(){for(var t=arguments.length,e=new Array(t),n=0;n<t;n++)e[n]=arguments[n];(e=e[0].constructor===Array?e[0]:e).forEach(function(t){if(!t.prototype||!t.prototype.constructor)throw"Sortable: Mounted plugin must be a constructor function, not ".concat({}.toString.call(t));t.utils&&(jt.utils=I(I({},jt.utils),t.utils)),z.mount(t)})},jt.create=function(t,e){return new jt(t,e)};var Gt,Ut,qt,Vt,Zt,$t,Qt=[],Jt=!(jt.version="1.15.6");function te(){Qt.forEach(function(t){clearInterval(t.pid)}),Qt=[]}function ee(){clearInterval($t)}var ne,oe=_(function(n,t,e,o){if(t.scroll){var i,r=(n.touches?n.touches[0]:n).clientX,a=(n.touches?n.touches[0]:n).clientY,l=t.scrollSensitivity,s=t.scrollSpeed,c=O(),u=!1;Ut!==e&&(Ut=e,te(),Gt=t.scroll,i=t.scrollFn,!0===Gt&&(Gt=M(e,!0)));var d=0,h=Gt;do{var p=h,f=X(p),g=f.top,m=f.bottom,v=f.left,b=f.right,y=f.width,w=f.height,D=void 0,E=void 0,S=p.scrollWidth,_=p.scrollHeight,C=R(p),T=p.scrollLeft,f=p.scrollTop,E=p===c?(D=y<S&&("auto"===C.overflowX||"scroll"===C.overflowX||"visible"===C.overflowX),w<_&&("auto"===C.overflowY||"scroll"===C.overflowY||"visible"===C.overflowY)):(D=y<S&&("auto"===C.overflowX||"scroll"===C.overflowX),w<_&&("auto"===C.overflowY||"scroll"===C.overflowY)),T=D&&(Math.abs(b-r)<=l&&T+y<S)-(Math.abs(v-r)<=l&&!!T),f=E&&(Math.abs(m-a)<=l&&f+w<_)-(Math.abs(g-a)<=l&&!!f);if(!Qt[d])for(var x=0;x<=d;x++)Qt[x]||(Qt[x]={});Qt[d].vx==T&&Qt[d].vy==f&&Qt[d].el===p||(Qt[d].el=p,Qt[d].vx=T,Qt[d].vy=f,clearInterval(Qt[d].pid),0==T&&0==f||(u=!0,Qt[d].pid=setInterval(function(){o&&0===this.layer&&jt.active._onTouchMove(Zt);var t=Qt[this.layer].vy?Qt[this.layer].vy*s:0,e=Qt[this.layer].vx?Qt[this.layer].vx*s:0;"function"==typeof i&&"continue"!==i.call(jt.dragged.parentNode[K],e,t,n,Zt,Qt[this.layer].el)||H(Qt[this.layer].el,e,t)}.bind({layer:d}),24))),d++}while(t.bubbleScroll&&h!==c&&(h=M(h,!1)));Jt=u}},30),n=function(t){var e=t.originalEvent,n=t.putSortable,o=t.dragEl,i=t.activeSortable,r=t.dispatchSortableEvent,a=t.hideGhostForTarget,t=t.unhideGhostForTarget;e&&(i=n||i,a(),e=e.changedTouches&&e.changedTouches.length?e.changedTouches[0]:e,e=document.elementFromPoint(e.clientX,e.clientY),t(),i&&!i.el.contains(e)&&(r("spill"),this.onSpill({dragEl:o,putSortable:n})))};function ie(){}function re(){}ie.prototype={startIndex:null,dragStart:function(t){t=t.oldDraggableIndex;this.startIndex=t},onSpill:function(t){var e=t.dragEl,n=t.putSortable;this.sortable.captureAnimationState(),n&&n.captureAnimationState();t=B(this.sortable.el,this.startIndex,this.options);t?this.sortable.el.insertBefore(e,t):this.sortable.el.appendChild(e),this.sortable.animateAll(),n&&n.animateAll()},drop:n},a(ie,{pluginName:"revertOnSpill"}),re.prototype={onSpill:function(t){var e=t.dragEl,t=t.putSortable||this.sortable;t.captureAnimationState(),e.parentNode&&e.parentNode.removeChild(e),t.animateAll()},drop:n},a(re,{pluginName:"removeOnSpill"});var ae,le,se,ce,ue,de=[],he=[],pe=!1,fe=!1,ge=!1;function me(n,o){he.forEach(function(t,e){e=o.children[t.sortableIndex+(n?Number(e):0)];e?o.insertBefore(t,e):o.appendChild(t)})}function ve(){de.forEach(function(t){t!==se&&t.parentNode&&t.parentNode.removeChild(t)})}return jt.mount(new function(){function t(){for(var t in this.defaults={scroll:!0,forceAutoScrollFallback:!1,scrollSensitivity:30,scrollSpeed:10,bubbleScroll:!0},this)"_"===t.charAt(0)&&"function"==typeof this[t]&&(this[t]=this[t].bind(this))}return t.prototype={dragStarted:function(t){t=t.originalEvent;this.sortable.nativeDraggable?h(document,"dragover",this._handleAutoScroll):this.options.supportPointer?h(document,"pointermove",this._handleFallbackAutoScroll):t.touches?h(document,"touchmove",this._handleFallbackAutoScroll):h(document,"mousemove",this._handleFallbackAutoScroll)},dragOverCompleted:function(t){t=t.originalEvent;this.options.dragOverBubble||t.rootEl||this._handleAutoScroll(t)},drop:function(){this.sortable.nativeDraggable?p(document,"dragover",this._handleAutoScroll):(p(document,"pointermove",this._handleFallbackAutoScroll),p(document,"touchmove",this._handleFallbackAutoScroll),p(document,"mousemove",this._handleFallbackAutoScroll)),ee(),te(),clearTimeout(m),m=void 0},nulling:function(){Zt=Ut=Gt=Jt=$t=qt=Vt=null,Qt.length=0},_handleFallbackAutoScroll:function(t){this._handleAutoScroll(t,!0)},_handleAutoScroll:function(e,n){var o,i=this,r=(e.touches?e.touches[0]:e).clientX,a=(e.touches?e.touches[0]:e).clientY,t=document.elementFromPoint(r,a);Zt=e,n||this.options.forceAutoScrollFallback||w||y||u?(oe(e,this.options,t,n),o=M(t,!0),!Jt||$t&&r===qt&&a===Vt||($t&&ee(),$t=setInterval(function(){var t=M(document.elementFromPoint(r,a),!0);t!==o&&(o=t,te()),oe(e,i.options,t,n)},10),qt=r,Vt=a)):this.options.bubbleScroll&&M(t,!0)!==O()?oe(e,this.options,M(t,!1),!1):te()}},a(t,{pluginName:"scroll",initializeByDefault:!0})}),jt.mount(re,ie),jt.mount(new function(){function t(){this.defaults={swapClass:"sortable-swap-highlight"}}return t.prototype={dragStart:function(t){t=t.dragEl;ne=t},dragOverValid:function(t){var e=t.completed,n=t.target,o=t.onMove,i=t.activeSortable,r=t.changed,a=t.cancel;i.options.swap&&(t=this.sortable.el,i=this.options,n&&n!==t&&(t=ne,ne=!1!==o(n)?(k(n,i.swapClass,!0),n):null,t&&t!==ne&&k(t,i.swapClass,!1)),r(),e(!0),a())},drop:function(t){var e,n,o=t.activeSortable,i=t.putSortable,r=t.dragEl,a=i||this.sortable,l=this.options;ne&&k(ne,l.swapClass,!1),ne&&(l.swap||i&&i.options.swap)&&r!==ne&&(a.captureAnimationState(),a!==o&&o.captureAnimationState(),n=ne,t=(e=r).parentNode,l=n.parentNode,t&&l&&!t.isEqualNode(n)&&!l.isEqualNode(e)&&(i=j(e),r=j(n),t.isEqualNode(l)&&i<r&&r++,t.insertBefore(n,t.children[i]),l.insertBefore(e,l.children[r])),a.animateAll(),a!==o&&o.animateAll())},nulling:function(){ne=null}},a(t,{pluginName:"swap",eventProperties:function(){return{swapItem:ne}}})}),jt.mount(new function(){function t(o){for(var t in this)"_"===t.charAt(0)&&"function"==typeof this[t]&&(this[t]=this[t].bind(this));o.options.avoidImplicitDeselect||(o.options.supportPointer?h(document,"pointerup",this._deselectMultiDrag):(h(document,"mouseup",this._deselectMultiDrag),h(document,"touchend",this._deselectMultiDrag))),h(document,"keydown",this._checkKeyDown),h(document,"keyup",this._checkKeyUp),this.defaults={selectedClass:"sortable-selected",multiDragKey:null,avoidImplicitDeselect:!1,setData:function(t,e){var n="";de.length&&le===o?de.forEach(function(t,e){n+=(e?", ":"")+t.textContent}):n=e.textContent,t.setData("Text",n)}}}return t.prototype={multiDragKeyDown:!1,isMultiDrag:!1,delayStartGlobal:function(t){t=t.dragEl;se=t},delayEnded:function(){this.isMultiDrag=~de.indexOf(se)},setupClone:function(t){var e=t.sortable,t=t.cancel;if(this.isMultiDrag){for(var n=0;n<de.length;n++)he.push(C(de[n])),he[n].sortableIndex=de[n].sortableIndex,he[n].draggable=!1,he[n].style["will-change"]="",k(he[n],this.options.selectedClass,!1),de[n]===se&&k(he[n],this.options.chosenClass,!1);e._hideClone(),t()}},clone:function(t){var e=t.sortable,n=t.rootEl,o=t.dispatchSortableEvent,t=t.cancel;this.isMultiDrag&&(this.options.removeCloneOnHide||de.length&&le===e&&(me(!0,n),o("clone"),t()))},showClone:function(t){var e=t.cloneNowShown,n=t.rootEl,t=t.cancel;this.isMultiDrag&&(me(!1,n),he.forEach(function(t){R(t,"display","")}),e(),ue=!1,t())},hideClone:function(t){var e=this,n=(t.sortable,t.cloneNowHidden),t=t.cancel;this.isMultiDrag&&(he.forEach(function(t){R(t,"display","none"),e.options.removeCloneOnHide&&t.parentNode&&t.parentNode.removeChild(t)}),n(),ue=!0,t())},dragStartGlobal:function(t){t.sortable;!this.isMultiDrag&&le&&le.multiDrag._deselectMultiDrag(),de.forEach(function(t){t.sortableIndex=j(t)}),de=de.sort(function(t,e){return t.sortableIndex-e.sortableIndex}),ge=!0},dragStarted:function(t){var e,n=this,t=t.sortable;this.isMultiDrag&&(this.options.sort&&(t.captureAnimationState(),this.options.animation&&(de.forEach(function(t){t!==se&&R(t,"position","absolute")}),e=X(se,!1,!0,!0),de.forEach(function(t){t!==se&&T(t,e)}),pe=fe=!0)),t.animateAll(function(){pe=fe=!1,n.options.animation&&de.forEach(function(t){x(t)}),n.options.sort&&ve()}))},dragOver:function(t){var e=t.target,n=t.completed,t=t.cancel;fe&&~de.indexOf(e)&&(n(!1),t())},revert:function(t){var n,o,e=t.fromSortable,i=t.rootEl,r=t.sortable,a=t.dragRect;1<de.length&&(de.forEach(function(t){r.addAnimationState({target:t,rect:fe?X(t):a}),x(t),t.fromRect=a,e.removeAnimationState(t)}),fe=!1,n=!this.options.removeCloneOnHide,o=i,de.forEach(function(t,e){e=o.children[t.sortableIndex+(n?Number(e):0)];e?o.insertBefore(t,e):o.appendChild(t)}))},dragOverCompleted:function(t){var e,n=t.sortable,o=t.isOwner,i=t.insertion,r=t.activeSortable,a=t.parentEl,l=t.putSortable,t=this.options;i&&(o&&r._hideClone(),pe=!1,t.animation&&1<de.length&&(fe||!o&&!r.options.sort&&!l)&&(e=X(se,!1,!0,!0),de.forEach(function(t){t!==se&&(T(t,e),a.appendChild(t))}),fe=!0),o||(fe||ve(),1<de.length?(o=ue,r._showClone(n),r.options.animation&&!ue&&o&&he.forEach(function(t){r.addAnimationState({target:t,rect:ce}),t.fromRect=ce,t.thisAnimationDuration=null})):r._showClone(n)))},dragOverAnimationCapture:function(t){var e=t.dragRect,n=t.isOwner,t=t.activeSortable;de.forEach(function(t){t.thisAnimationDuration=null}),t.options.animation&&!n&&t.multiDrag.isMultiDrag&&(ce=a({},e),e=b(se,!0),ce.top-=e.f,ce.left-=e.e)},dragOverAnimationComplete:function(){fe&&(fe=!1,ve())},drop:function(t){var o,i,r,a,n,e,l,s=t.originalEvent,c=t.rootEl,u=t.parentEl,d=t.sortable,h=t.dispatchSortableEvent,p=t.oldIndex,t=t.putSortable,f=t||this.sortable;s&&(o=this.options,i=u.children,ge||(o.multiDragKey&&!this.multiDragKeyDown&&this._deselectMultiDrag(),k(se,o.selectedClass,!~de.indexOf(se)),~de.indexOf(se)?(de.splice(de.indexOf(se),1),ae=null,G({sortable:d,rootEl:c,name:"deselect",targetEl:se,originalEvent:s})):(de.push(se),G({sortable:d,rootEl:c,name:"select",targetEl:se,originalEvent:s}),s.shiftKey&&ae&&d.el.contains(ae)?(r=j(ae),a=j(se),~r&&~a&&r!==a&&function(){for(var e,t=r<a?(e=r,a):(e=a,r+1),n=o.filter;e<t;e++)~de.indexOf(i[e])||P(i[e],o.draggable,u,!1)&&(n&&("function"==typeof n?n.call(d,s,i[e],d):n.split(",").some(function(t){return P(i[e],t.trim(),u,!1)}))||(k(i[e],o.selectedClass,!0),de.push(i[e]),G({sortable:d,rootEl:c,name:"select",targetEl:i[e],originalEvent:s})))}()):ae=se,le=f)),ge&&this.isMultiDrag&&(fe=!1,(u[K].options.sort||u!==c)&&1<de.length&&(n=X(se),e=j(se,":not(."+this.options.selectedClass+")"),!pe&&o.animation&&(se.thisAnimationDuration=null),f.captureAnimationState(),pe||(o.animation&&(se.fromRect=n,de.forEach(function(t){var e;t.thisAnimationDuration=null,t!==se&&(e=fe?X(t):n,t.fromRect=e,f.addAnimationState({target:t,rect:e}))})),ve(),de.forEach(function(t){i[e]?u.insertBefore(t,i[e]):u.appendChild(t),e++}),p===j(se)&&(l=!1,de.forEach(function(t){t.sortableIndex!==j(t)&&(l=!0)}),l&&(h("update"),h("sort")))),de.forEach(function(t){x(t)}),f.animateAll()),le=f),(c===u||t&&"clone"!==t.lastPutMode)&&he.forEach(function(t){t.parentNode&&t.parentNode.removeChild(t)}))},nullingGlobal:function(){this.isMultiDrag=ge=!1,he.length=0},destroyGlobal:function(){this._deselectMultiDrag(),p(document,"pointerup",this._deselectMultiDrag),p(document,"mouseup",this._deselectMultiDrag),p(document,"touchend",this._deselectMultiDrag),p(document,"keydown",this._checkKeyDown),p(document,"keyup",this._checkKeyUp)},_deselectMultiDrag:function(t){if(!(void 0!==ge&&ge||le!==this.sortable||t&&P(t.target,this.options.draggable,this.sortable.el,!1)||t&&0!==t.button))for(;de.length;){var e=de[0];k(e,this.options.selectedClass,!1),de.shift(),G({sortable:this.sortable,rootEl:this.sortable.el,name:"deselect",targetEl:e,originalEvent:t})}},_checkKeyDown:function(t){t.key===this.options.multiDragKey&&(this.multiDragKeyDown=!0)},_checkKeyUp:function(t){t.key===this.options.multiDragKey&&(this.multiDragKeyDown=!1)}},a(t,{pluginName:"multiDrag",utils:{select:function(t){var e=t.parentNode[K];e&&e.options.multiDrag&&!~de.indexOf(t)&&(le&&le!==e&&(le.multiDrag._deselectMultiDrag(),le=e),k(t,e.options.selectedClass,!0),de.push(t))},deselect:function(t){var e=t.parentNode[K],n=de.indexOf(t);e&&e.options.multiDrag&&~n&&(k(t,e.options.selectedClass,!1),de.splice(n,1))}},eventProperties:function(){var n=this,o=[],i=[];return de.forEach(function(t){var e;o.push({multiDragElement:t,index:t.sortableIndex}),e=fe&&t!==se?-1:fe?j(t,":not(."+n.options.selectedClass+")"):j(t),i.push({multiDragElement:t,index:e})}),{items:r(de),clones:[].concat(he),oldIndicies:o,newIndicies:i}},optionListeners:{multiDragKey:function(t){return"ctrl"===(t=t.toLowerCase())?t="Control":1<t.length&&(t=t.charAt(0).toUpperCase()+t.substr(1)),t}}})}),jt});;
/* @license GPL-2.0-or-later https://www.drupal.org/licensing/faq */
(($,Drupal,Sortable)=>{Drupal.behaviors.MediaLibraryWidgetSortable={attach(context){const selection=context.querySelectorAll('.js-media-library-selection');selection.forEach((widget)=>{Sortable.create(widget,{draggable:'.js-media-library-item',handle:'.js-media-library-item-preview',onEnd:()=>{$(widget).children().each((index,child)=>{$(child).find('.js-media-library-item-weight')[0].value=index;});}});});}};Drupal.behaviors.MediaLibraryWidgetToggleWeight={attach(context){const strings={show:Drupal.t('Show media item weights'),hide:Drupal.t('Hide media item weights')};const mediaLibraryToggle=once('media-library-toggle','.js-media-library-widget-toggle-weight',context);$(mediaLibraryToggle).on('click',(e)=>{e.preventDefault();const $target=$(e.currentTarget);e.currentTarget.textContent=$target.hasClass('active')?strings.show:strings.hide;$target.toggleClass('active').closest('.js-media-library-widget').find('.js-media-library-item-weight').parent().toggle();});mediaLibraryToggle.forEach((item)=>{item.textContent=strings.show;});$(once('media-library-toggle','.js-media-library-item-weight',context)).parent().hide();}};Drupal.behaviors.MediaLibraryWidgetDisableButton={attach(context){once('media-library-disable','.js-media-library-open-button[data-disabled-focus="true"]',context).forEach((button)=>{$(button).focus();setTimeout(()=>{$(button).attr('disabled','disabled');},50);});}};})(jQuery,Drupal,Sortable);;
/* @license MIT https://github.com/floating-ui/floating-ui/blob/@floating-ui/dom@1.6.12/LICENSE */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(exports):"function"==typeof define&&define.amd?define(["exports"],e):e((t="undefined"!=typeof globalThis?globalThis:t||self).FloatingUICore={})}(this,(function(t){"use strict";const e=["top","right","bottom","left"],n=["start","end"],i=e.reduce(((t,e)=>t.concat(e,e+"-"+n[0],e+"-"+n[1])),[]),o=Math.min,r=Math.max,a={left:"right",right:"left",bottom:"top",top:"bottom"},l={start:"end",end:"start"};function s(t,e,n){return r(t,o(e,n))}function f(t,e){return"function"==typeof t?t(e):t}function c(t){return t.split("-")[0]}function u(t){return t.split("-")[1]}function m(t){return"x"===t?"y":"x"}function d(t){return"y"===t?"height":"width"}function g(t){return["top","bottom"].includes(c(t))?"y":"x"}function p(t){return m(g(t))}function h(t,e,n){void 0===n&&(n=!1);const i=u(t),o=p(t),r=d(o);let a="x"===o?i===(n?"end":"start")?"right":"left":"start"===i?"bottom":"top";return e.reference[r]>e.floating[r]&&(a=w(a)),[a,w(a)]}function y(t){return t.replace(/start|end/g,(t=>l[t]))}function w(t){return t.replace(/left|right|bottom|top/g,(t=>a[t]))}function x(t){return"number"!=typeof t?function(t){return{top:0,right:0,bottom:0,left:0,...t}}(t):{top:t,right:t,bottom:t,left:t}}function v(t){const{x:e,y:n,width:i,height:o}=t;return{width:i,height:o,top:n,left:e,right:e+i,bottom:n+o,x:e,y:n}}function b(t,e,n){let{reference:i,floating:o}=t;const r=g(e),a=p(e),l=d(a),s=c(e),f="y"===r,m=i.x+i.width/2-o.width/2,h=i.y+i.height/2-o.height/2,y=i[l]/2-o[l]/2;let w;switch(s){case"top":w={x:m,y:i.y-o.height};break;case"bottom":w={x:m,y:i.y+i.height};break;case"right":w={x:i.x+i.width,y:h};break;case"left":w={x:i.x-o.width,y:h};break;default:w={x:i.x,y:i.y}}switch(u(e)){case"start":w[a]-=y*(n&&f?-1:1);break;case"end":w[a]+=y*(n&&f?-1:1)}return w}async function A(t,e){var n;void 0===e&&(e={});const{x:i,y:o,platform:r,rects:a,elements:l,strategy:s}=t,{boundary:c="clippingAncestors",rootBoundary:u="viewport",elementContext:m="floating",altBoundary:d=!1,padding:g=0}=f(e,t),p=x(g),h=l[d?"floating"===m?"reference":"floating":m],y=v(await r.getClippingRect({element:null==(n=await(null==r.isElement?void 0:r.isElement(h)))||n?h:h.contextElement||await(null==r.getDocumentElement?void 0:r.getDocumentElement(l.floating)),boundary:c,rootBoundary:u,strategy:s})),w="floating"===m?{x:i,y:o,width:a.floating.width,height:a.floating.height}:a.reference,b=await(null==r.getOffsetParent?void 0:r.getOffsetParent(l.floating)),A=await(null==r.isElement?void 0:r.isElement(b))&&await(null==r.getScale?void 0:r.getScale(b))||{x:1,y:1},R=v(r.convertOffsetParentRelativeRectToViewportRelativeRect?await r.convertOffsetParentRelativeRectToViewportRelativeRect({elements:l,rect:w,offsetParent:b,strategy:s}):w);return{top:(y.top-R.top+p.top)/A.y,bottom:(R.bottom-y.bottom+p.bottom)/A.y,left:(y.left-R.left+p.left)/A.x,right:(R.right-y.right+p.right)/A.x}}function R(t,e){return{top:t.top-e.height,right:t.right-e.width,bottom:t.bottom-e.height,left:t.left-e.width}}function P(t){return e.some((e=>t[e]>=0))}function T(t){const e=o(...t.map((t=>t.left))),n=o(...t.map((t=>t.top)));return{x:e,y:n,width:r(...t.map((t=>t.right)))-e,height:r(...t.map((t=>t.bottom)))-n}}t.arrow=t=>({name:"arrow",options:t,async fn(e){const{x:n,y:i,placement:r,rects:a,platform:l,elements:c,middlewareData:m}=e,{element:g,padding:h=0}=f(t,e)||{};if(null==g)return{};const y=x(h),w={x:n,y:i},v=p(r),b=d(v),A=await l.getDimensions(g),R="y"===v,P=R?"top":"left",T=R?"bottom":"right",D=R?"clientHeight":"clientWidth",O=a.reference[b]+a.reference[v]-w[v]-a.floating[b],E=w[v]-a.reference[v],L=await(null==l.getOffsetParent?void 0:l.getOffsetParent(g));let k=L?L[D]:0;k&&await(null==l.isElement?void 0:l.isElement(L))||(k=c.floating[D]||a.floating[b]);const C=O/2-E/2,B=k/2-A[b]/2-1,H=o(y[P],B),S=o(y[T],B),F=H,j=k-A[b]-S,z=k/2-A[b]/2+C,M=s(F,z,j),V=!m.arrow&&null!=u(r)&&z!==M&&a.reference[b]/2-(z<F?H:S)-A[b]/2<0,W=V?z<F?z-F:z-j:0;return{[v]:w[v]+W,data:{[v]:M,centerOffset:z-M-W,...V&&{alignmentOffset:W}},reset:V}}}),t.autoPlacement=function(t){return void 0===t&&(t={}),{name:"autoPlacement",options:t,async fn(e){var n,o,r;const{rects:a,middlewareData:l,placement:s,platform:m,elements:d}=e,{crossAxis:g=!1,alignment:p,allowedPlacements:w=i,autoAlignment:x=!0,...v}=f(t,e),b=void 0!==p||w===i?function(t,e,n){return(t?[...n.filter((e=>u(e)===t)),...n.filter((e=>u(e)!==t))]:n.filter((t=>c(t)===t))).filter((n=>!t||u(n)===t||!!e&&y(n)!==n))}(p||null,x,w):w,R=await A(e,v),P=(null==(n=l.autoPlacement)?void 0:n.index)||0,T=b[P];if(null==T)return{};const D=h(T,a,await(null==m.isRTL?void 0:m.isRTL(d.floating)));if(s!==T)return{reset:{placement:b[0]}};const O=[R[c(T)],R[D[0]],R[D[1]]],E=[...(null==(o=l.autoPlacement)?void 0:o.overflows)||[],{placement:T,overflows:O}],L=b[P+1];if(L)return{data:{index:P+1,overflows:E},reset:{placement:L}};const k=E.map((t=>{const e=u(t.placement);return[t.placement,e&&g?t.overflows.slice(0,2).reduce(((t,e)=>t+e),0):t.overflows[0],t.overflows]})).sort(((t,e)=>t[1]-e[1])),C=(null==(r=k.filter((t=>t[2].slice(0,u(t[0])?2:3).every((t=>t<=0))))[0])?void 0:r[0])||k[0][0];return C!==s?{data:{index:P+1,overflows:E},reset:{placement:C}}:{}}}},t.computePosition=async(t,e,n)=>{const{placement:i="bottom",strategy:o="absolute",middleware:r=[],platform:a}=n,l=r.filter(Boolean),s=await(null==a.isRTL?void 0:a.isRTL(e));let f=await a.getElementRects({reference:t,floating:e,strategy:o}),{x:c,y:u}=b(f,i,s),m=i,d={},g=0;for(let n=0;n<l.length;n++){const{name:r,fn:p}=l[n],{x:h,y:y,data:w,reset:x}=await p({x:c,y:u,initialPlacement:i,placement:m,strategy:o,middlewareData:d,rects:f,platform:a,elements:{reference:t,floating:e}});c=null!=h?h:c,u=null!=y?y:u,d={...d,[r]:{...d[r],...w}},x&&g<=50&&(g++,"object"==typeof x&&(x.placement&&(m=x.placement),x.rects&&(f=!0===x.rects?await a.getElementRects({reference:t,floating:e,strategy:o}):x.rects),({x:c,y:u}=b(f,m,s))),n=-1)}return{x:c,y:u,placement:m,strategy:o,middlewareData:d}},t.detectOverflow=A,t.flip=function(t){return void 0===t&&(t={}),{name:"flip",options:t,async fn(e){var n,i;const{placement:o,middlewareData:r,rects:a,initialPlacement:l,platform:s,elements:m}=e,{mainAxis:d=!0,crossAxis:p=!0,fallbackPlacements:x,fallbackStrategy:v="bestFit",fallbackAxisSideDirection:b="none",flipAlignment:R=!0,...P}=f(t,e);if(null!=(n=r.arrow)&&n.alignmentOffset)return{};const T=c(o),D=g(l),O=c(l)===l,E=await(null==s.isRTL?void 0:s.isRTL(m.floating)),L=x||(O||!R?[w(l)]:function(t){const e=w(t);return[y(t),e,y(e)]}(l)),k="none"!==b;!x&&k&&L.push(...function(t,e,n,i){const o=u(t);let r=function(t,e,n){const i=["left","right"],o=["right","left"],r=["top","bottom"],a=["bottom","top"];switch(t){case"top":case"bottom":return n?e?o:i:e?i:o;case"left":case"right":return e?r:a;default:return[]}}(c(t),"start"===n,i);return o&&(r=r.map((t=>t+"-"+o)),e&&(r=r.concat(r.map(y)))),r}(l,R,b,E));const C=[l,...L],B=await A(e,P),H=[];let S=(null==(i=r.flip)?void 0:i.overflows)||[];if(d&&H.push(B[T]),p){const t=h(o,a,E);H.push(B[t[0]],B[t[1]])}if(S=[...S,{placement:o,overflows:H}],!H.every((t=>t<=0))){var F,j;const t=((null==(F=r.flip)?void 0:F.index)||0)+1,e=C[t];if(e)return{data:{index:t,overflows:S},reset:{placement:e}};let n=null==(j=S.filter((t=>t.overflows[0]<=0)).sort(((t,e)=>t.overflows[1]-e.overflows[1]))[0])?void 0:j.placement;if(!n)switch(v){case"bestFit":{var z;const t=null==(z=S.filter((t=>{if(k){const e=g(t.placement);return e===D||"y"===e}return!0})).map((t=>[t.placement,t.overflows.filter((t=>t>0)).reduce(((t,e)=>t+e),0)])).sort(((t,e)=>t[1]-e[1]))[0])?void 0:z[0];t&&(n=t);break}case"initialPlacement":n=l}if(o!==n)return{reset:{placement:n}}}return{}}}},t.hide=function(t){return void 0===t&&(t={}),{name:"hide",options:t,async fn(e){const{rects:n}=e,{strategy:i="referenceHidden",...o}=f(t,e);switch(i){case"referenceHidden":{const t=R(await A(e,{...o,elementContext:"reference"}),n.reference);return{data:{referenceHiddenOffsets:t,referenceHidden:P(t)}}}case"escaped":{const t=R(await A(e,{...o,altBoundary:!0}),n.floating);return{data:{escapedOffsets:t,escaped:P(t)}}}default:return{}}}}},t.inline=function(t){return void 0===t&&(t={}),{name:"inline",options:t,async fn(e){const{placement:n,elements:i,rects:a,platform:l,strategy:s}=e,{padding:u=2,x:m,y:d}=f(t,e),p=Array.from(await(null==l.getClientRects?void 0:l.getClientRects(i.reference))||[]),h=function(t){const e=t.slice().sort(((t,e)=>t.y-e.y)),n=[];let i=null;for(let t=0;t<e.length;t++){const o=e[t];!i||o.y-i.y>i.height/2?n.push([o]):n[n.length-1].push(o),i=o}return n.map((t=>v(T(t))))}(p),y=v(T(p)),w=x(u);const b=await l.getElementRects({reference:{getBoundingClientRect:function(){if(2===h.length&&h[0].left>h[1].right&&null!=m&&null!=d)return h.find((t=>m>t.left-w.left&&m<t.right+w.right&&d>t.top-w.top&&d<t.bottom+w.bottom))||y;if(h.length>=2){if("y"===g(n)){const t=h[0],e=h[h.length-1],i="top"===c(n),o=t.top,r=e.bottom,a=i?t.left:e.left,l=i?t.right:e.right;return{top:o,bottom:r,left:a,right:l,width:l-a,height:r-o,x:a,y:o}}const t="left"===c(n),e=r(...h.map((t=>t.right))),i=o(...h.map((t=>t.left))),a=h.filter((n=>t?n.left===i:n.right===e)),l=a[0].top,s=a[a.length-1].bottom;return{top:l,bottom:s,left:i,right:e,width:e-i,height:s-l,x:i,y:l}}return y}},floating:i.floating,strategy:s});return a.reference.x!==b.reference.x||a.reference.y!==b.reference.y||a.reference.width!==b.reference.width||a.reference.height!==b.reference.height?{reset:{rects:b}}:{}}}},t.limitShift=function(t){return void 0===t&&(t={}),{options:t,fn(e){const{x:n,y:i,placement:o,rects:r,middlewareData:a}=e,{offset:l=0,mainAxis:s=!0,crossAxis:u=!0}=f(t,e),d={x:n,y:i},p=g(o),h=m(p);let y=d[h],w=d[p];const x=f(l,e),v="number"==typeof x?{mainAxis:x,crossAxis:0}:{mainAxis:0,crossAxis:0,...x};if(s){const t="y"===h?"height":"width",e=r.reference[h]-r.floating[t]+v.mainAxis,n=r.reference[h]+r.reference[t]-v.mainAxis;y<e?y=e:y>n&&(y=n)}if(u){var b,A;const t="y"===h?"width":"height",e=["top","left"].includes(c(o)),n=r.reference[p]-r.floating[t]+(e&&(null==(b=a.offset)?void 0:b[p])||0)+(e?0:v.crossAxis),i=r.reference[p]+r.reference[t]+(e?0:(null==(A=a.offset)?void 0:A[p])||0)-(e?v.crossAxis:0);w<n?w=n:w>i&&(w=i)}return{[h]:y,[p]:w}}}},t.offset=function(t){return void 0===t&&(t=0),{name:"offset",options:t,async fn(e){var n,i;const{x:o,y:r,placement:a,middlewareData:l}=e,s=await async function(t,e){const{placement:n,platform:i,elements:o}=t,r=await(null==i.isRTL?void 0:i.isRTL(o.floating)),a=c(n),l=u(n),s="y"===g(n),m=["left","top"].includes(a)?-1:1,d=r&&s?-1:1,p=f(e,t);let{mainAxis:h,crossAxis:y,alignmentAxis:w}="number"==typeof p?{mainAxis:p,crossAxis:0,alignmentAxis:null}:{mainAxis:0,crossAxis:0,alignmentAxis:null,...p};return l&&"number"==typeof w&&(y="end"===l?-1*w:w),s?{x:y*d,y:h*m}:{x:h*m,y:y*d}}(e,t);return a===(null==(n=l.offset)?void 0:n.placement)&&null!=(i=l.arrow)&&i.alignmentOffset?{}:{x:o+s.x,y:r+s.y,data:{...s,placement:a}}}}},t.rectToClientRect=v,t.shift=function(t){return void 0===t&&(t={}),{name:"shift",options:t,async fn(e){const{x:n,y:i,placement:o}=e,{mainAxis:r=!0,crossAxis:a=!1,limiter:l={fn:t=>{let{x:e,y:n}=t;return{x:e,y:n}}},...u}=f(t,e),d={x:n,y:i},p=await A(e,u),h=g(c(o)),y=m(h);let w=d[y],x=d[h];if(r){const t="y"===y?"bottom":"right";w=s(w+p["y"===y?"top":"left"],w,w-p[t])}if(a){const t="y"===h?"bottom":"right";x=s(x+p["y"===h?"top":"left"],x,x-p[t])}const v=l.fn({...e,[y]:w,[h]:x});return{...v,data:{x:v.x-n,y:v.y-i}}}}},t.size=function(t){return void 0===t&&(t={}),{name:"size",options:t,async fn(e){const{placement:n,rects:i,platform:a,elements:l}=e,{apply:s=(()=>{}),...m}=f(t,e),d=await A(e,m),p=c(n),h=u(n),y="y"===g(n),{width:w,height:x}=i.floating;let v,b;"top"===p||"bottom"===p?(v=p,b=h===(await(null==a.isRTL?void 0:a.isRTL(l.floating))?"start":"end")?"left":"right"):(b=p,v="end"===h?"top":"bottom");const R=x-d.top-d.bottom,P=w-d.left-d.right,T=o(x-d[v],R),D=o(w-d[b],P),O=!e.middlewareData.shift;let E=T,L=D;if(y?L=h||O?o(D,P):P:E=h||O?o(T,R):R,O&&!h){const t=r(d.left,0),e=r(d.right,0),n=r(d.top,0),i=r(d.bottom,0);y?L=w-2*(0!==t||0!==e?t+e:r(d.left,d.right)):E=x-2*(0!==n||0!==i?n+i:r(d.top,d.bottom))}await s({...e,availableWidth:L,availableHeight:E});const k=await a.getDimensions(l.floating);return w!==k.width||x!==k.height?{reset:{rects:!0}}:{}}}}}));
;
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(exports,require("@floating-ui/core")):"function"==typeof define&&define.amd?define(["exports","@floating-ui/core"],e):e((t="undefined"!=typeof globalThis?globalThis:t||self).FloatingUIDOM={},t.FloatingUICore)}(this,(function(t,e){"use strict";const n=Math.min,o=Math.max,i=Math.round,r=Math.floor,c=t=>({x:t,y:t});function l(){return"undefined"!=typeof window}function s(t){return d(t)?(t.nodeName||"").toLowerCase():"#document"}function f(t){var e;return(null==t||null==(e=t.ownerDocument)?void 0:e.defaultView)||window}function u(t){var e;return null==(e=(d(t)?t.ownerDocument:t.document)||window.document)?void 0:e.documentElement}function d(t){return!!l()&&(t instanceof Node||t instanceof f(t).Node)}function a(t){return!!l()&&(t instanceof Element||t instanceof f(t).Element)}function h(t){return!!l()&&(t instanceof HTMLElement||t instanceof f(t).HTMLElement)}function p(t){return!(!l()||"undefined"==typeof ShadowRoot)&&(t instanceof ShadowRoot||t instanceof f(t).ShadowRoot)}function g(t){const{overflow:e,overflowX:n,overflowY:o,display:i}=b(t);return/auto|scroll|overlay|hidden|clip/.test(e+o+n)&&!["inline","contents"].includes(i)}function m(t){return["table","td","th"].includes(s(t))}function y(t){return[":popover-open",":modal"].some((e=>{try{return t.matches(e)}catch(t){return!1}}))}function w(t){const e=x(),n=a(t)?b(t):t;return"none"!==n.transform||"none"!==n.perspective||!!n.containerType&&"normal"!==n.containerType||!e&&!!n.backdropFilter&&"none"!==n.backdropFilter||!e&&!!n.filter&&"none"!==n.filter||["transform","perspective","filter"].some((t=>(n.willChange||"").includes(t)))||["paint","layout","strict","content"].some((t=>(n.contain||"").includes(t)))}function x(){return!("undefined"==typeof CSS||!CSS.supports)&&CSS.supports("-webkit-backdrop-filter","none")}function v(t){return["html","body","#document"].includes(s(t))}function b(t){return f(t).getComputedStyle(t)}function T(t){return a(t)?{scrollLeft:t.scrollLeft,scrollTop:t.scrollTop}:{scrollLeft:t.scrollX,scrollTop:t.scrollY}}function L(t){if("html"===s(t))return t;const e=t.assignedSlot||t.parentNode||p(t)&&t.host||u(t);return p(e)?e.host:e}function R(t){const e=L(t);return v(e)?t.ownerDocument?t.ownerDocument.body:t.body:h(e)&&g(e)?e:R(e)}function C(t,e,n){var o;void 0===e&&(e=[]),void 0===n&&(n=!0);const i=R(t),r=i===(null==(o=t.ownerDocument)?void 0:o.body),c=f(i);if(r){const t=E(c);return e.concat(c,c.visualViewport||[],g(i)?i:[],t&&n?C(t):[])}return e.concat(i,C(i,[],n))}function E(t){return t.parent&&Object.getPrototypeOf(t.parent)?t.frameElement:null}function S(t){const e=b(t);let n=parseFloat(e.width)||0,o=parseFloat(e.height)||0;const r=h(t),c=r?t.offsetWidth:n,l=r?t.offsetHeight:o,s=i(n)!==c||i(o)!==l;return s&&(n=c,o=l),{width:n,height:o,$:s}}function F(t){return a(t)?t:t.contextElement}function O(t){const e=F(t);if(!h(e))return c(1);const n=e.getBoundingClientRect(),{width:o,height:r,$:l}=S(e);let s=(l?i(n.width):n.width)/o,f=(l?i(n.height):n.height)/r;return s&&Number.isFinite(s)||(s=1),f&&Number.isFinite(f)||(f=1),{x:s,y:f}}const D=c(0);function H(t){const e=f(t);return x()&&e.visualViewport?{x:e.visualViewport.offsetLeft,y:e.visualViewport.offsetTop}:D}function P(t,n,o,i){void 0===n&&(n=!1),void 0===o&&(o=!1);const r=t.getBoundingClientRect(),l=F(t);let s=c(1);n&&(i?a(i)&&(s=O(i)):s=O(t));const u=function(t,e,n){return void 0===e&&(e=!1),!(!n||e&&n!==f(t))&&e}(l,o,i)?H(l):c(0);let d=(r.left+u.x)/s.x,h=(r.top+u.y)/s.y,p=r.width/s.x,g=r.height/s.y;if(l){const t=f(l),e=i&&a(i)?f(i):i;let n=t,o=E(n);for(;o&&i&&e!==n;){const t=O(o),e=o.getBoundingClientRect(),i=b(o),r=e.left+(o.clientLeft+parseFloat(i.paddingLeft))*t.x,c=e.top+(o.clientTop+parseFloat(i.paddingTop))*t.y;d*=t.x,h*=t.y,p*=t.x,g*=t.y,d+=r,h+=c,n=f(o),o=E(n)}}return e.rectToClientRect({width:p,height:g,x:d,y:h})}function W(t,e){const n=T(t).scrollLeft;return e?e.left+n:P(u(t)).left+n}function M(t,e,n){void 0===n&&(n=!1);const o=t.getBoundingClientRect();return{x:o.left+e.scrollLeft-(n?0:W(t,o)),y:o.top+e.scrollTop}}function z(t,n,i){let r;if("viewport"===n)r=function(t,e){const n=f(t),o=u(t),i=n.visualViewport;let r=o.clientWidth,c=o.clientHeight,l=0,s=0;if(i){r=i.width,c=i.height;const t=x();(!t||t&&"fixed"===e)&&(l=i.offsetLeft,s=i.offsetTop)}return{width:r,height:c,x:l,y:s}}(t,i);else if("document"===n)r=function(t){const e=u(t),n=T(t),i=t.ownerDocument.body,r=o(e.scrollWidth,e.clientWidth,i.scrollWidth,i.clientWidth),c=o(e.scrollHeight,e.clientHeight,i.scrollHeight,i.clientHeight);let l=-n.scrollLeft+W(t);const s=-n.scrollTop;return"rtl"===b(i).direction&&(l+=o(e.clientWidth,i.clientWidth)-r),{width:r,height:c,x:l,y:s}}(u(t));else if(a(n))r=function(t,e){const n=P(t,!0,"fixed"===e),o=n.top+t.clientTop,i=n.left+t.clientLeft,r=h(t)?O(t):c(1);return{width:t.clientWidth*r.x,height:t.clientHeight*r.y,x:i*r.x,y:o*r.y}}(n,i);else{const e=H(t);r={x:n.x-e.x,y:n.y-e.y,width:n.width,height:n.height}}return e.rectToClientRect(r)}function A(t,e){const n=L(t);return!(n===e||!a(n)||v(n))&&("fixed"===b(n).position||A(n,e))}function V(t,e,n){const o=h(e),i=u(e),r="fixed"===n,l=P(t,!0,r,e);let f={scrollLeft:0,scrollTop:0};const d=c(0);if(o||!o&&!r)if(("body"!==s(e)||g(i))&&(f=T(e)),o){const t=P(e,!0,r,e);d.x=t.x+e.clientLeft,d.y=t.y+e.clientTop}else i&&(d.x=W(i));const a=!i||o||r?c(0):M(i,f);return{x:l.left+f.scrollLeft-d.x-a.x,y:l.top+f.scrollTop-d.y-a.y,width:l.width,height:l.height}}function B(t){return"static"===b(t).position}function N(t,e){if(!h(t)||"fixed"===b(t).position)return null;if(e)return e(t);let n=t.offsetParent;return u(t)===n&&(n=n.ownerDocument.body),n}function I(t,e){const n=f(t);if(y(t))return n;if(!h(t)){let e=L(t);for(;e&&!v(e);){if(a(e)&&!B(e))return e;e=L(e)}return n}let o=N(t,e);for(;o&&m(o)&&B(o);)o=N(o,e);return o&&v(o)&&B(o)&&!w(o)?n:o||function(t){let e=L(t);for(;h(e)&&!v(e);){if(w(e))return e;if(y(e))return null;e=L(e)}return null}(t)||n}const k={convertOffsetParentRelativeRectToViewportRelativeRect:function(t){let{elements:e,rect:n,offsetParent:o,strategy:i}=t;const r="fixed"===i,l=u(o),f=!!e&&y(e.floating);if(o===l||f&&r)return n;let d={scrollLeft:0,scrollTop:0},a=c(1);const p=c(0),m=h(o);if((m||!m&&!r)&&(("body"!==s(o)||g(l))&&(d=T(o)),h(o))){const t=P(o);a=O(o),p.x=t.x+o.clientLeft,p.y=t.y+o.clientTop}const w=!l||m||r?c(0):M(l,d,!0);return{width:n.width*a.x,height:n.height*a.y,x:n.x*a.x-d.scrollLeft*a.x+p.x+w.x,y:n.y*a.y-d.scrollTop*a.y+p.y+w.y}},getDocumentElement:u,getClippingRect:function(t){let{element:e,boundary:i,rootBoundary:r,strategy:c}=t;const l=[..."clippingAncestors"===i?y(e)?[]:function(t,e){const n=e.get(t);if(n)return n;let o=C(t,[],!1).filter((t=>a(t)&&"body"!==s(t))),i=null;const r="fixed"===b(t).position;let c=r?L(t):t;for(;a(c)&&!v(c);){const e=b(c),n=w(c);n||"fixed"!==e.position||(i=null),(r?!n&&!i:!n&&"static"===e.position&&i&&["absolute","fixed"].includes(i.position)||g(c)&&!n&&A(t,c))?o=o.filter((t=>t!==c)):i=e,c=L(c)}return e.set(t,o),o}(e,this._c):[].concat(i),r],f=l[0],u=l.reduce(((t,i)=>{const r=z(e,i,c);return t.top=o(r.top,t.top),t.right=n(r.right,t.right),t.bottom=n(r.bottom,t.bottom),t.left=o(r.left,t.left),t}),z(e,f,c));return{width:u.right-u.left,height:u.bottom-u.top,x:u.left,y:u.top}},getOffsetParent:I,getElementRects:async function(t){const e=this.getOffsetParent||I,n=this.getDimensions,o=await n(t.floating);return{reference:V(t.reference,await e(t.floating),t.strategy),floating:{x:0,y:0,width:o.width,height:o.height}}},getClientRects:function(t){return Array.from(t.getClientRects())},getDimensions:function(t){const{width:e,height:n}=S(t);return{width:e,height:n}},getScale:O,isElement:a,isRTL:function(t){return"rtl"===b(t).direction}};const q=e.detectOverflow,U=e.offset,j=e.autoPlacement,X=e.shift,Y=e.flip,$=e.size,_=e.hide,G=e.arrow,J=e.inline,K=e.limitShift;t.arrow=G,t.autoPlacement=j,t.autoUpdate=function(t,e,i,c){void 0===c&&(c={});const{ancestorScroll:l=!0,ancestorResize:s=!0,elementResize:f="function"==typeof ResizeObserver,layoutShift:d="function"==typeof IntersectionObserver,animationFrame:a=!1}=c,h=F(t),p=l||s?[...h?C(h):[],...C(e)]:[];p.forEach((t=>{l&&t.addEventListener("scroll",i,{passive:!0}),s&&t.addEventListener("resize",i)}));const g=h&&d?function(t,e){let i,c=null;const l=u(t);function s(){var t;clearTimeout(i),null==(t=c)||t.disconnect(),c=null}return function f(u,d){void 0===u&&(u=!1),void 0===d&&(d=1),s();const{left:a,top:h,width:p,height:g}=t.getBoundingClientRect();if(u||e(),!p||!g)return;const m={rootMargin:-r(h)+"px "+-r(l.clientWidth-(a+p))+"px "+-r(l.clientHeight-(h+g))+"px "+-r(a)+"px",threshold:o(0,n(1,d))||1};let y=!0;function w(t){const e=t[0].intersectionRatio;if(e!==d){if(!y)return f();e?f(!1,e):i=setTimeout((()=>{f(!1,1e-7)}),1e3)}y=!1}try{c=new IntersectionObserver(w,{...m,root:l.ownerDocument})}catch(t){c=new IntersectionObserver(w,m)}c.observe(t)}(!0),s}(h,i):null;let m,y=-1,w=null;f&&(w=new ResizeObserver((t=>{let[n]=t;n&&n.target===h&&w&&(w.unobserve(e),cancelAnimationFrame(y),y=requestAnimationFrame((()=>{var t;null==(t=w)||t.observe(e)}))),i()})),h&&!a&&w.observe(h),w.observe(e));let x=a?P(t):null;return a&&function e(){const n=P(t);!x||n.x===x.x&&n.y===x.y&&n.width===x.width&&n.height===x.height||i();x=n,m=requestAnimationFrame(e)}(),i(),()=>{var t;p.forEach((t=>{l&&t.removeEventListener("scroll",i),s&&t.removeEventListener("resize",i)})),null==g||g(),null==(t=w)||t.disconnect(),w=null,a&&cancelAnimationFrame(m)}},t.computePosition=(t,n,o)=>{const i=new Map,r={platform:k,...o},c={...r.platform,_c:i};return e.computePosition(t,n,{...r,platform:c})},t.detectOverflow=q,t.flip=Y,t.getOverflowAncestors=C,t.hide=_,t.inline=J,t.limitShift=K,t.offset=U,t.platform=k,t.shift=X,t.size=$}));
;
/* @license GPL-2.0-or-later https://www.drupal.org/licensing/faq */
((Drupal,once,{computePosition,offset,shift,flip})=>{Drupal.behaviors.dropdownInit={attach:(context)=>{once('dropdown-trigger','[data-drupal-dropdown]',context).forEach((trigger)=>{const dropdown=trigger.nextElementSibling;const updatePosition=()=>{computePosition(trigger,dropdown,{strategy:'fixed',placement:trigger.dataset.drupalDropdownPosition||'bottom',middleware:[flip({padding:16}),offset(6),shift({padding:16})]}).then(({x,y})=>{Object.assign(dropdown.style,{left:`${x}px`,top:`${y}px`});});};trigger.addEventListener('click',(e)=>{updatePosition();trigger.setAttribute('aria-expanded',e.currentTarget.getAttribute('aria-expanded')==='false');});document.addEventListener('click',(e)=>{const isButtonClicked=trigger.contains(e.target);if(!isButtonClicked)trigger.setAttribute('aria-expanded','false');});});}};})(Drupal,once,FloatingUIDOM);;
const POPOVER_OPEN_DELAY=150;const POPOVER_CLOSE_DELAY=400;const POPOVER_NO_CLICK_DELAY=500;((Drupal,once)=>{Drupal.behaviors.navigationProcessPopovers={attach:(context)=>{once('toolbar-popover',context.querySelectorAll('[data-toolbar-popover]')).forEach((popover)=>{const button=popover.querySelector('[data-toolbar-popover-control]');const tooltip=popover.querySelector('[data-toolbar-popover-wrapper]');if(!button||!tooltip)return;const expandPopover=()=>{popover.classList.add('toolbar-popover--expanded');button.dataset.drupalNoClick='true';tooltip.removeAttribute('inert');setTimeout(()=>{delete button.dataset.drupalNoClick;},POPOVER_NO_CLICK_DELAY);};const collapsePopover=()=>{popover.classList.remove('toolbar-popover--expanded');tooltip.setAttribute('inert',true);delete button.dataset.drupalNoClick;};const toggleState=(state,initialLoad=false)=>{state&&!initialLoad?expandPopover():collapsePopover();button.setAttribute('aria-expanded',state&&!initialLoad);const text=button.querySelector('[data-toolbar-action]');if(text)text.textContent=state?Drupal.t('Collapse'):Drupal.t('Extend');popover.dispatchEvent(new CustomEvent('toolbar-popover-toggled',{bubbles:true,detail:{state}}));};const isPopoverHoverOrFocus=()=>popover.contains(document.activeElement)||popover.matches(':hover');const delayedClose=()=>{setTimeout(()=>{if(isPopoverHoverOrFocus())return;close();},POPOVER_CLOSE_DELAY);};const open=()=>{['mouseleave','focusout'].forEach((e)=>{button.addEventListener(e,delayedClose,false);tooltip.addEventListener(e,delayedClose,false);});};const close=()=>{toggleState(false);['mouseleave','focusout'].forEach((e)=>{button.removeEventListener(e,delayedClose);tooltip.removeEventListener(e,delayedClose);});};button.addEventListener('mouseover',()=>{if(window.matchMedia('(max-width: 1023px)').matches)return;setTimeout(()=>{if(!button.matches(':hover')||!button.getAttribute('aria-expanded')==='false')return;toggleState(true);open();},POPOVER_OPEN_DELAY);});button.addEventListener('click',(e)=>{const state=e.currentTarget.getAttribute('aria-expanded')==='false';if(!e.currentTarget.dataset.drupalNoClick)toggleState(state);});popover.addEventListener('toolbar-popover-close',()=>{close();});popover.addEventListener('toolbar-popover-open',()=>{toggleState(true);});popover.addEventListener('toolbar-active-url',()=>{toggleState(true,true);});});}};})(Drupal,once);;
((Drupal,once)=>{function handleMouseMove({currentTarget:{style},clientX,clientY}){style.setProperty('--safe-triangle-cursor-x',`${clientX}px`);style.setProperty('--safe-triangle-cursor-y',`${clientY}px`);}Drupal.behaviors.safeTriangleInit={attach:(context)=>{once('safe-triangle','[data-has-safe-triangle]',context).forEach((button)=>{button.insertAdjacentHTML('beforeend','<div data-safe-triangle></div>');button.addEventListener('mousemove',handleMouseMove);});},detach:(context,settings,trigger)=>{if(trigger==='unload')once.remove('safe-triangle','[data-has-safe-triangle]',context).forEach((button)=>{button.querySelector('[data-safe-triangle]')?.remove();button.removeEventListener('mousemove',handleMouseMove);});}};})(Drupal,once);;
((Drupal,once)=>{const TOOLBAR_MENU_SET_TOGGLE='toolbar-menu-set-toggle';Drupal.behaviors.navigationProcessToolbarMenuTriggers={attach:(context)=>{once('toolbar-menu-trigger','[data-toolbar-menu-trigger]',context).forEach((button)=>{const menu=button.nextElementSibling;const text=button.querySelector('[data-toolbar-action]');const toggleButtonState=(state)=>{button.setAttribute('aria-expanded',state);if(text)text.textContent=state?Drupal.t('Collapse'):Drupal.t('Extend');if(state)menu.removeAttribute('inert');else menu.setAttribute('inert',true);};button.addEventListener('click',(e)=>{const level=e.currentTarget.dataset.toolbarMenuTrigger;const state=e.currentTarget.getAttribute('aria-expanded')==='false';toggleButtonState(state);button.dispatchEvent(new CustomEvent('toolbar-menu-toggled',{bubbles:true,detail:{state,level}}));});button.addEventListener(TOOLBAR_MENU_SET_TOGGLE,(e)=>{const newState=e.detail.state;toggleButtonState(newState);});});}};Drupal.behaviors.navigationProcessToolbarMenuLinks={attach:(context)=>{once('toolbar-menu-link','a.toolbar-menu__link, a.toolbar-button',context).forEach((link)=>{if(document.URL===link.href){link.classList.add('current','is-active');link.dispatchEvent(new CustomEvent('toolbar-active-url',{bubbles:true}));const menu=link.closest('.toolbar-menu');if(menu)menu.previousElementSibling.dispatchEvent(new CustomEvent(TOOLBAR_MENU_SET_TOGGLE,{detail:{state:true}}));}});}};})(Drupal,once);;
((Drupal,once,{computePosition,offset,shift,flip})=>{Drupal.theme.tooltipWrapper=(dataset)=>`<div class="toolbar-tooltip ${dataset.drupalTooltipClass||''}">
      ${dataset.drupalTooltip}
    </div>`;Drupal.behaviors.tooltipInit={attach:(context)=>{once('tooltip-trigger','[data-drupal-tooltip]',context).forEach((trigger)=>{trigger.insertAdjacentHTML('afterend',Drupal.theme.tooltipWrapper(trigger.dataset));const tooltip=trigger.nextElementSibling;const updatePosition=()=>{computePosition(trigger,tooltip,{strategy:'fixed',placement:trigger.dataset.drupalTooltipPosition||'right',middleware:[flip({padding:16}),offset(6),shift({padding:16})]}).then(({x,y})=>{Object.assign(tooltip.style,{left:`${x}px`,top:`${y}px`});});};const ro=new ResizeObserver(updatePosition);ro.observe(trigger);trigger.addEventListener('mouseover',updatePosition);trigger.addEventListener('focus',updatePosition);});}};})(Drupal,once,FloatingUIDOM);;
((Drupal,once)=>{Drupal.behaviors.navigation={attach(context){once('navigation','.admin-toolbar',context).forEach((sidebar)=>{const backButton=sidebar.querySelector('[data-toolbar-back-control]');if(!backButton)return;const buttons=sidebar.querySelectorAll('[data-toolbar-menu-trigger]');const tooltips=sidebar.querySelectorAll('[data-drupal-tooltip]');const closeButtons=()=>{buttons.forEach((button)=>{button.dispatchEvent(new CustomEvent('toolbar-menu-set-toggle',{detail:{state:false}}));});};const closePopovers=(current=false)=>{sidebar.querySelectorAll('[data-toolbar-popover]').forEach((popover)=>{if(current&&current instanceof Element&&popover.isEqualNode(current))return;popover.dispatchEvent(new CustomEvent('toolbar-popover-close',{}));});};sidebar.addEventListener('click',(e)=>{if(e.target.matches('button, button *'))e.target.closest('button').focus();});sidebar.addEventListener('toggle-admin-toolbar-content',(e)=>{if(!e.detail.state)closePopovers();});sidebar.addEventListener('toolbar-popover-toggled',(e)=>{if(e.detail.state){closeButtons();closePopovers(e.target);}});sidebar.addEventListener('toolbar-menu-toggled',(e)=>{if(e.detail.state){const targetLevel=e.detail.level;buttons.forEach((button)=>{const buttonLevel=button.dataset.toolbarMenuTrigger;if(!button.isEqualNode(e.target)&&+buttonLevel===+targetLevel)button.dispatchEvent(new CustomEvent('toolbar-menu-set-toggle',{detail:{state:false}}));});}});backButton.addEventListener('click',closePopovers);tooltips.forEach((tooltip)=>{['mouseover','focus'].forEach((e)=>{tooltip.addEventListener(e,closePopovers);});});});}};})(Drupal,once);;
((Drupal,once)=>{const HTML_TRIGGER_EVENT='toggle-admin-toolbar';const SIDEBAR_CONTENT_EVENT='toggle-admin-toolbar-content';Drupal.behaviors.navigationProcessHtmlListener={attach:(context)=>{if(context===document)if(once('admin-toolbar-document-triggers-listener',document.documentElement).length){const doc=document.documentElement;setTimeout(()=>{doc.setAttribute('data-admin-toolbar-transitions',true);},200);doc.addEventListener(HTML_TRIGGER_EVENT,(e)=>{const newState=e.detail.state;const isUserInput=e.detail.manual;document.documentElement.setAttribute('data-admin-toolbar',newState?'expanded':'collapsed');document.documentElement.setAttribute('data-admin-toolbar-body-scroll',newState?'locked':'unlocked');doc.querySelector('.admin-toolbar').dispatchEvent(new CustomEvent(SIDEBAR_CONTENT_EVENT,{detail:{state:newState}}));if(isUserInput)document.documentElement.setAttribute('data-admin-toolbar-animating',true);setTimeout(()=>{document.documentElement.removeAttribute('data-admin-toolbar-animating');},200);Drupal.displace(true);});const initDisplace=()=>{const displaceElement=doc.querySelector('.admin-toolbar')?.querySelector('.admin-toolbar__displace-placeholder');const edge=document.documentElement.dir==='rtl'?'right':'left';displaceElement?.setAttribute(`data-offset-${edge}`,'');Drupal.displace(true);};initDisplace();}}};Drupal.behaviors.navigationProcessToolbarTriggers={attach:(context)=>{const triggers=once('admin-toolbar-trigger','[aria-controls="admin-toolbar"]',context);const toggleTriggers=(toState)=>{triggers.forEach((trigger)=>{trigger.setAttribute('aria-expanded',toState);const text=trigger.querySelector('[data-toolbar-text]')||trigger.querySelector('[data-toolbar-action]');if(text)text.textContent=toState?Drupal.t('Collapse sidebar'):Drupal.t('Expand sidebar');});};let firstState=localStorage.getItem('Drupal.navigation.sidebarExpanded')!=='false';if(window.matchMedia('(max-width: 1023px)').matches)firstState=false;toggleTriggers(firstState);document.documentElement.dispatchEvent(new CustomEvent(HTML_TRIGGER_EVENT,{bubbles:true,detail:{state:firstState,manual:false}}));triggers.forEach((trigger)=>{trigger.addEventListener('click',(e)=>{const state=e.currentTarget.getAttribute('aria-expanded')==='false';trigger.dispatchEvent(new CustomEvent(HTML_TRIGGER_EVENT,{bubbles:true,detail:{state,manual:true}}));toggleTriggers(state);localStorage.setItem('Drupal.navigation.sidebarExpanded',state);});});}};})(Drupal,once);;
((Drupal,once,{focusable})=>{Drupal.behaviors.keyboardNavigation={attach:(context)=>{once('keyboard-processed','.admin-toolbar',context).forEach((sidebar)=>{const IS_RTL=document.documentElement.dir==='rtl';const isInteractive=(element)=>element.getAttribute('aria-expanded');const getFocusableGroup=(element)=>element.closest('[class*="toolbar-menu--level-"]')||element.closest('[data-toolbar-popover-wrapper]')||element.closest('.admin-toolbar');const findFirstElementByChar=(focusableElements,targetChar)=>{const elementWIthChar=Array.prototype.find.call(focusableElements,(element)=>{const dataText=element.dataset.indexText;return dataText&&dataText[0]===targetChar;});return elementWIthChar;};const checkChar=({key,target})=>{const currentGroup=getFocusableGroup(target);const foundElementWithIndexChar=findFirstElementByChar(focusable(currentGroup),key);if(foundElementWithIndexChar)foundElementWithIndexChar.focus();};const focusFirstInGroup=(focusableElements)=>{focusableElements[0].focus();};const focusLastInGroup=(focusableElements)=>{focusableElements[focusableElements.length-1].focus();};const focusNextInGroup=(focusableElements,element)=>{const currentIndex=Array.prototype.indexOf.call(focusableElements,element);if(currentIndex===focusableElements.length-1)focusableElements[0].focus();else focusableElements[currentIndex+1].focus();};const focusPreviousInGroup=(focusableElements,element)=>{const currentIndex=Array.prototype.indexOf.call(focusableElements,element);if(currentIndex===0)focusableElements[focusableElements.length-1].focus();else focusableElements[currentIndex-1].focus();};const toggleMenu=(element,state)=>element.dispatchEvent(new CustomEvent('toolbar-menu-set-toggle',{bubbles:false,detail:{state}}));const closePopover=(element)=>element.dispatchEvent(new CustomEvent('toolbar-popover-close',{bubbles:true}));const openPopover=(element)=>element.dispatchEvent(new CustomEvent('toolbar-popover-open',{bubbles:true}));const focusClosestPopoverTrigger=(element)=>{element.closest('[data-toolbar-popover]')?.querySelector('[data-toolbar-popover-control]')?.focus();};const focusFirstMenuElement=(element)=>{const elements=focusable(element.closest('.toolbar-menu__item')?.querySelector('.toolbar-menu'));if(elements?.length)elements[0].focus();};const focusFirstPopoverElement=(element)=>{const elements=focusable(element.closest('[data-toolbar-popover]'));if(elements?.length>=1)elements[1].focus();};const focusLastPopoverElement=(element)=>{const elements=focusable(element.closest('[data-toolbar-popover]'));if(elements?.length>0)elements[elements.length-1].focus();};const closeNonInteractiveElement=(element)=>{if(element.closest('[class*="toolbar-menu--level-"]')){const trigger=element.closest('.toolbar-menu')?.previousElementSibling;toggleMenu(trigger,false);trigger.focus();}else{closePopover(element);focusClosestPopoverTrigger(element);}};const openInteractiveElement=(element)=>{if(element.hasAttribute('data-toolbar-menu-trigger')){toggleMenu(element,true);focusFirstMenuElement(element);}if(element.hasAttribute('data-toolbar-popover-control')){openPopover(element);focusFirstPopoverElement(element);}};const closeInteractiveElement=(element)=>{if(element.hasAttribute('data-toolbar-menu-trigger'))if(element.getAttribute('aria-expanded')==='false')closeNonInteractiveElement(element);else{toggleMenu(element,false);focusFirstMenuElement(element);}if(element.hasAttribute('data-toolbar-popover-control')){openPopover(element);focusLastPopoverElement(element);}};const arrowsSideControl=({key,target})=>{if((key==='ArrowRight'&&!IS_RTL)||(key==='ArrowLeft'&&IS_RTL)){if(isInteractive(target)){openInteractiveElement(target);if(target.getAttribute('aria-controls')==='admin-toolbar'&&target.getAttribute('aria-expanded')==='false')target.click();}}else{if((key==='ArrowRight'&&IS_RTL)||(key==='ArrowLeft'&&!IS_RTL))if(isInteractive(target)){closeInteractiveElement(target);if(target.getAttribute('aria-controls')==='admin-toolbar'&&target.getAttribute('aria-expanded')!=='false')target.click();}else closeNonInteractiveElement(target);}};const arrowsDirectionControl=({key,target})=>{const focusableElements=focusable(getFocusableGroup(target));if(key==='ArrowUp')focusPreviousInGroup(focusableElements,target);else{if(key==='ArrowDown')focusNextInGroup(focusableElements,target);}};sidebar.addEventListener('keydown',(e)=>{switch(e.key){case 'Escape':closePopover(e.target);focusClosestPopoverTrigger(e.target);break;case 'ArrowLeft':case 'ArrowRight':e.preventDefault();arrowsSideControl(e);break;case 'ArrowDown':case 'ArrowUp':e.preventDefault();arrowsDirectionControl(e);break;case 'Home':e.preventDefault();focusFirstInGroup(getFocusableGroup(e.target));break;case 'End':e.preventDefault();focusLastInGroup(getFocusableGroup(e.target));break;default:checkChar(e);break;}});});}};})(Drupal,once,window.tabbable);;
(function($){'use strict';Drupal.behaviors.pathFieldsetSummaries={attach:function(context){$(context).find('.path-form').drupalSetSummary(function(context){var path=$('.js-form-item-path-0-alias input',context).val();var automatic=$('.js-form-item-path-0-pathauto input',context).prop('checked');if(automatic)return Drupal.t('Automatic alias');else if(path)return Drupal.t('Alias: @alias',{'@alias':path});else return Drupal.t('No alias');});}};})(jQuery);;
(function($,Drupal){Drupal.behaviors.textSummary={attach(context,settings){once('text-summary','.js-text-summary',context).forEach((summary)=>{const $widget=$(summary).closest('.js-text-format-wrapper');const $summary=$widget.find('.js-text-summary-wrapper');const $summaryLabel=$summary.find('label').eq(0);const $full=$widget.children('.js-form-type-textarea');let $fullLabel=$full.find('label').eq(0);if($fullLabel.length===0)$fullLabel=$('<label></label>').prependTo($full);if($fullLabel.hasClass('visually-hidden')){$fullLabel.html((index,oldHtml)=>`<span class="visually-hidden">${oldHtml}</span>`);$fullLabel.removeClass('visually-hidden');}const $link=$(`<span class="field-edit-link"> (<button type="button" class="link link-edit-summary">${Drupal.t('Hide summary')}</button>)</span>`);const $button=$link.find('button');let toggleClick=true;$link.on('click',(e)=>{if(toggleClick){$summary.hide();$button.html(Drupal.t('Edit summary'));$link.appendTo($fullLabel);}else{$summary.show();$button.html(Drupal.t('Hide summary'));$link.appendTo($summaryLabel);}e.preventDefault();toggleClick=!toggleClick;}).appendTo($summaryLabel);if(summary.value==='')$link.trigger('click');});}};})(jQuery,Drupal);;
(function($,Drupal,drupalSettings){let activeItem=Drupal.url(drupalSettings.path.currentPath);$.fn.drupalToolbarMenuHorizontal=function(){let currentPath=drupalSettings.path.currentPath;const menu=once('toolbar-menu-horizontal',this);if(menu.length){const $menu=$(menu);if(activeItem){const count=currentPath.split('/').length;for(let i=0;i<count;i++){const $menuItem=$menu.find(`a[data-drupal-link-system-path="${currentPath}"]`);if($menuItem.length!==0){$menuItem.closest('a').addClass('is-active');break;}const lastIndex=currentPath.lastIndexOf('/');currentPath=currentPath.slice(0,lastIndex);}}}};$.fn.drupalToolbarMenu=function(){const ui={handleOpen:Drupal.t('Extend'),handleClose:Drupal.t('Collapse')};function toggleList($item,switcher){const $toggle=$item.children('.toolbar-box').children('.toolbar-handle');switcher=typeof switcher!=='undefined'?switcher:!$item.hasClass('open');$item.toggleClass('open',switcher);$toggle.toggleClass('open',switcher);$toggle.find('.action').each((index,element)=>{element.textContent=switcher?ui.handleClose:ui.handleOpen;});}function toggleClickHandler(event){const $toggle=$(event.target);const $item=$toggle.closest('li');toggleList($item);const $openItems=$item.siblings().filter('.open');toggleList($openItems,false);}function linkClickHandler(event){if(!Drupal.toolbar.models.toolbarModel.get('isFixed'))Drupal.toolbar.models.toolbarModel.set('activeTab',null);event.stopPropagation();}function initItems($menu){const options={class:'toolbar-icon toolbar-handle',action:ui.handleOpen,text:''};$menu.find('li > a').wrap('<div class="toolbar-box">');$menu.find('li').each((index,element)=>{const $item=$(element);if($item.children('ul.toolbar-menu').length){const $box=$item.children('.toolbar-box');const $link=$box.find('a');options.text=Drupal.t('@label',{'@label':$link.length?$link[0].textContent:''});$item.children('.toolbar-box').append($(Drupal.theme('toolbarMenuItemToggle',options)).hide().fadeIn(150));}});}function markListLevels($lists,level){level=!level?1:level;const $lis=$lists.children('li').addClass(`level-${level}`);$lists=$lis.children('ul');if($lists.length)markListLevels($lists,level+1);}function openActiveItem($menu){let currentPath=drupalSettings.path.currentPath;const pathItem=$menu.find(`a[href="${window.location.pathname}"]`);if(pathItem.length&&!activeItem)activeItem=window.location.pathname;if(activeItem){const $activeItem=$menu.find(`a[href="${activeItem}"]`).addClass('menu-item--active');if(pathItem.length===0&&activeItem){const count=currentPath.split('/').length;for(let i=0;i<count;i++){const $menuItem=$menu.find(`a[data-drupal-link-system-path="${currentPath}"]`);if($menuItem.length!==0){const $activeTrail=$menuItem.parentsUntil('.root','li').addClass('menu-item--active-trail');toggleList($activeTrail,true);break;}const lastIndex=currentPath.lastIndexOf('/');currentPath=currentPath.slice(0,lastIndex);}}else{const $activeTrail=$activeItem.parentsUntil('.root','li').addClass('menu-item--active-trail');toggleList($activeTrail,true);}}}return this.each(function(selector){const menu=once('toolbar-menu-vertical',this);if(menu.length){const $menu=$(menu);$menu.on('click.toolbar','.toolbar-box',toggleClickHandler).on('click.toolbar','.toolbar-box a',linkClickHandler);$menu.addClass('root');initItems($menu);markListLevels($menu);openActiveItem($menu);}});};Drupal.theme.toolbarMenuItemToggle=function(options){return `<button class="${options.class}"><span class="action">${options.action}</span> <span class="label">${options.text}</span></button>`;};})(jQuery,Drupal,drupalSettings);;
(function($,Drupal,drupalSettings){(()=>{if(!sessionStorage.getItem('Drupal.toolbar.toolbarState'))return;const toolbarState=JSON.parse(sessionStorage.getItem('Drupal.toolbar.toolbarState'));const {activeTray,orientation,isOriented}=toolbarState;const activeTrayElement=document.querySelector(`.toolbar-tray[data-toolbar-tray="${activeTray}"]`);const activeTrayToggle=document.querySelector(`.toolbar-item[data-toolbar-tray="${activeTray}"]`);if(activeTrayElement){activeTrayElement.classList.add(`toolbar-tray-${orientation}`,'is-active');activeTrayToggle.classList.add('is-active');}if(isOriented)document.querySelector('#toolbar-administration').classList.add('toolbar-oriented');})();const options=$.extend({breakpoints:{'toolbar.narrow':'','toolbar.standard':'','toolbar.wide':''}},drupalSettings.toolbar,{strings:{horizontal:Drupal.t('Horizontal orientation'),vertical:Drupal.t('Vertical orientation')}});Drupal.behaviors.toolbar={attach(context){if(!window.matchMedia('only screen').matches)return;once('toolbar','#toolbar-administration',context).forEach((toolbar)=>{const model=new Drupal.toolbar.ToolbarModel({locked:JSON.parse(localStorage.getItem('Drupal.toolbar.trayVerticalLocked')),activeTab:document.getElementById(JSON.parse(localStorage.getItem('Drupal.toolbar.activeTabID'))),height:$('#toolbar-administration').outerHeight()});Drupal.toolbar.models.toolbarModel=model;Object.keys(options.breakpoints).forEach((label)=>{const mq=options.breakpoints[label];const mql=window.matchMedia(mq);Drupal.toolbar.mql[label]=mql;mql.addListener(Drupal.toolbar.mediaQueryChangeHandler.bind(null,model,label));Drupal.toolbar.mediaQueryChangeHandler.call(null,model,label,mql);});Drupal.toolbar.views.toolbarVisualView=new Drupal.toolbar.ToolbarVisualView({el:toolbar,model,strings:options.strings});Drupal.toolbar.views.toolbarAuralView=new Drupal.toolbar.ToolbarAuralView({el:toolbar,model,strings:options.strings});Drupal.toolbar.views.bodyVisualView=new Drupal.toolbar.BodyVisualView({el:toolbar,model});model.trigger('change:isFixed',model,model.get('isFixed'));model.trigger('change:activeTray',model,model.get('activeTray'));const menuModel=new Drupal.toolbar.MenuModel();Drupal.toolbar.models.menuModel=menuModel;Drupal.toolbar.views.menuVisualView=new Drupal.toolbar.MenuVisualView({el:$(toolbar).find('.toolbar-menu-administration').get(0),model:menuModel,strings:options.strings});Drupal.toolbar.setSubtrees.done((subtrees)=>{menuModel.set('subtrees',subtrees);const theme=drupalSettings.ajaxPageState.theme;localStorage.setItem(`Drupal.toolbar.subtrees.${theme}`,JSON.stringify(subtrees));model.set('areSubtreesLoaded',true);});Drupal.toolbar.views.toolbarVisualView.loadSubtrees();$(document).on('drupalViewportOffsetChange.toolbar',(event,offsets)=>{model.set('offsets',offsets);});model.on('change:orientation',(model,orientation)=>{$(document).trigger('drupalToolbarOrientationChange',orientation);}).on('change:activeTab',(model,tab)=>{$(document).trigger('drupalToolbarTabChange',tab);}).on('change:activeTray',(model,tray)=>{$(document).trigger('drupalToolbarTrayChange',tray);});const toolbarState=sessionStorage.getItem('Drupal.toolbar.toolbarState')?JSON.parse(sessionStorage.getItem('Drupal.toolbar.toolbarState')):{};if(Drupal.toolbar.models.toolbarModel.get('orientation')==='horizontal'&&Drupal.toolbar.models.toolbarModel.get('activeTab')===null&&!toolbarState.orientation)Drupal.toolbar.models.toolbarModel.set({activeTab:$('.toolbar-bar .toolbar-tab:not(.home-toolbar-tab) a').get(0)});window.addEventListener('dialog:aftercreate',(e)=>{const $element=$(e.target);const {settings}=e;const toolbarBar=document.getElementById('toolbar-bar');if(toolbarBar){toolbarBar.style.marginTop='0';if(settings.drupalOffCanvasPosition==='top'){const height=Drupal.offCanvas.getContainer($element).outerHeight();toolbarBar.style.marginTop=`${height}px`;$element.on('dialogContentResize.off-canvas',()=>{const newHeight=Drupal.offCanvas.getContainer($element).outerHeight();toolbarBar.style.marginTop=`${newHeight}px`;});}}});window.addEventListener('dialog:beforeclose',()=>{const toolbarBar=document.getElementById('toolbar-bar');if(toolbarBar)toolbarBar.style.marginTop='0';});});if(once('toolbarAntiFlicker','#toolbar-administration',context).length)Drupal.toolbar.models.toolbarModel.on('change:activeTab change:orientation change:isOriented change:isTrayToggleVisible change:offsets',function(){const userButton=document.querySelector('#toolbar-item-user');const hasActiveTab=!!$(this.get('activeTab')).length>0;const previousToolbarState=sessionStorage.getItem('Drupal.toolbar.toolbarState')?JSON.parse(sessionStorage.getItem('Drupal.toolbar.toolbarState')):{};const toolbarState={...previousToolbarState,orientation:Drupal.toolbar.models.toolbarModel.get('orientation'),hasActiveTab,activeTabId:hasActiveTab?this.get('activeTab').id:null,activeTray:$(this.get('activeTab')).attr('data-toolbar-tray'),isOriented:this.get('isOriented'),isFixed:this.get('isFixed'),userButtonMinWidth:userButton?userButton.clientWidth:0};sessionStorage.setItem('Drupal.toolbar.toolbarState',JSON.stringify(toolbarState));});}};Drupal.toolbar={views:{},models:{},mql:{},setSubtrees:new $.Deferred(),mediaQueryChangeHandler(model,label,mql){switch(label){case 'toolbar.narrow':model.set({isOriented:mql.matches,isTrayToggleVisible:false});if(!mql.matches||!model.get('orientation'))model.set({orientation:'vertical'},{validate:true});break;case 'toolbar.standard':model.set({isFixed:mql.matches});break;case 'toolbar.wide':model.set({orientation:mql.matches&&!model.get('locked')?'horizontal':'vertical'},{validate:true});model.set({isTrayToggleVisible:mql.matches});break;default:break;}}};Drupal.theme.toolbarOrientationToggle=function(){return ('<div class="toolbar-toggle-orientation"><div class="toolbar-lining">'+'<button class="toolbar-icon" type="button"></button>'+'</div></div>');};Drupal.AjaxCommands.prototype.setToolbarSubtrees=function(ajax,response,status){Drupal.toolbar.setSubtrees.resolve(response.subtrees);};})(jQuery,Drupal,drupalSettings);;
(function(Backbone,Drupal){Drupal.toolbar.MenuModel=Backbone.Model.extend({defaults:{subtrees:null}});})(Backbone,Drupal);;
(function(Backbone,Drupal){Drupal.toolbar.ToolbarModel=Backbone.Model.extend({defaults:{activeTab:null,activeTray:null,isOriented:false,isFixed:false,areSubtreesLoaded:false,isViewportOverflowConstrained:false,orientation:'horizontal',locked:false,isTrayToggleVisible:true,height:null,offsets:{top:0,right:0,bottom:0,left:0}},validate(attributes,options){if(attributes.orientation==='horizontal'&&this.get('locked')&&!options.override)return Drupal.t('The toolbar cannot be set to a horizontal orientation when it is locked.');}});})(Backbone,Drupal);;
(function($,Drupal,Backbone){Drupal.toolbar.BodyVisualView=Backbone.View.extend({initialize(){this.listenTo(this.model,'change:activeTray ',this.render);this.listenTo(this.model,'change:isFixed change:isViewportOverflowConstrained',this.isToolbarFixed);},isToolbarFixed(){const isViewportOverflowConstrained=this.model.get('isViewportOverflowConstrained');$('body').toggleClass('toolbar-fixed',isViewportOverflowConstrained||this.model.get('isFixed'));},render(){$('body').toggleClass('toolbar-tray-open',!!this.model.get('activeTray'));}});})(jQuery,Drupal,Backbone);;
(function($,Backbone,Drupal){Drupal.toolbar.MenuVisualView=Backbone.View.extend({initialize(){this.listenTo(this.model,'change:subtrees',this.render);this.render();},render(){this.renderVertical();this.renderHorizontal();},renderHorizontal(){if('drupalToolbarMenu' in $.fn)this.$el.children('.toolbar-menu').drupalToolbarMenuHorizontal();},renderVertical(){const subtrees=this.model.get('subtrees');if(!this.model.get('subtrees'))return;Object.keys(subtrees||{}).forEach((id)=>{$(once('toolbar-subtrees',this.$el.find(`#toolbar-link-${id}`))).after(subtrees[id]);});if('drupalToolbarMenu' in $.fn)this.$el.children('.toolbar-menu').drupalToolbarMenu();}});})(jQuery,Backbone,Drupal);;
(function(Backbone,Drupal){Drupal.toolbar.ToolbarAuralView=Backbone.View.extend({initialize(options){this.strings=options.strings;this.listenTo(this.model,'change:orientation',this.onOrientationChange);this.listenTo(this.model,'change:activeTray',this.onActiveTrayChange);},onOrientationChange(model,orientation){Drupal.announce(Drupal.t('Tray orientation changed to @orientation.',{'@orientation':orientation}));},onActiveTrayChange(model,tray){const relevantTray=tray===null?model.previous('activeTray'):tray;if(!relevantTray)return;const action=tray===null?Drupal.t('closed'):Drupal.t('opened');const trayNameElement=relevantTray.querySelector('.toolbar-tray-name');let text;if(trayNameElement!==null)text=Drupal.t('Tray "@tray" @action.',{'@tray':trayNameElement.textContent,'@action':action});else text=Drupal.t('Tray @action.',{'@action':action});Drupal.announce(text);}});})(Backbone,Drupal);;
(function($,Drupal,drupalSettings,Backbone){Drupal.toolbar.ToolbarVisualView=Backbone.View.extend({events(){const touchEndToClick=function(event){event.preventDefault();event.target.click();};return {'click .toolbar-bar .toolbar-tab .trigger':'onTabClick','click .toolbar-toggle-orientation button':'onOrientationToggleClick','touchend .toolbar-bar .toolbar-tab .trigger':touchEndToClick,'touchend .toolbar-toggle-orientation button':touchEndToClick};},initialize(options){this.strings=options.strings;this.listenTo(this.model,'change:activeTab change:orientation change:isOriented change:isTrayToggleVisible',this.render);this.listenTo(this.model,'change:mqMatches',this.onMediaQueryChange);this.listenTo(this.model,'change:offsets',this.adjustPlacement);this.listenTo(this.model,'change:activeTab change:orientation change:isOriented',this.updateToolbarHeight);this.$el.find('.toolbar-tray .toolbar-lining').has('.toolbar-menu').append(Drupal.theme('toolbarOrientationToggle'));this.model.trigger('change:activeTab');},updateToolbarHeight(){const toolbarTabOuterHeight=$('#toolbar-bar').find('.toolbar-tab').outerHeight()||0;const toolbarTrayHorizontalOuterHeight=$('.is-active.toolbar-tray-horizontal').outerHeight()||0;this.model.set('height',toolbarTabOuterHeight+toolbarTrayHorizontalOuterHeight);$('body')[0].style.paddingTop=`${this.model.get('height')}px`;$('html')[0].style.scrollPaddingTop=`${this.model.get('height')}px`;this.triggerDisplace();},triggerDisplace(){_.defer(()=>{Drupal.displace(true);});},render(){this.updateTabs();this.updateTrayOrientation();this.updateBarAttributes();$('[data-toolbar-anti-flicker-loading]').remove();$('html').removeClass(['toolbar-loading','toolbar-horizontal','toolbar-vertical','toolbar-tray-open','toolbar-fixed','toolbar-oriented','toolbar-anti-flicker']);$('body').removeClass('toolbar-loading');if(this.model.changed.orientation==='vertical'||this.model.changed.activeTab)this.loadSubtrees();return this;},onTabClick(event){if(event.currentTarget.hasAttribute('data-toolbar-tray')){const activeTab=this.model.get('activeTab');const clickedTab=event.currentTarget;this.model.set('activeTab',!activeTab||clickedTab!==activeTab?clickedTab:null);event.preventDefault();event.stopPropagation();}},onOrientationToggleClick(event){const orientation=this.model.get('orientation');const antiOrientation=orientation==='vertical'?'horizontal':'vertical';const locked=antiOrientation==='vertical';if(locked)localStorage.setItem('Drupal.toolbar.trayVerticalLocked','true');else localStorage.removeItem('Drupal.toolbar.trayVerticalLocked');this.model.set({locked,orientation:antiOrientation},{validate:true,override:true});event.preventDefault();event.stopPropagation();},updateTabs(){const $tab=$(this.model.get('activeTab'));$(this.model.previous('activeTab')).removeClass('is-active').prop('aria-pressed',false);$(this.model.previous('activeTray')).removeClass('is-active');localStorage.removeItem('Drupal.toolbar.activeTabID');if($tab.length>0){$tab.addClass('is-active').prop('aria-pressed',true);const name=$tab.attr('data-toolbar-tray');const id=$tab.get(0).id;if(id)localStorage.setItem('Drupal.toolbar.activeTabID',JSON.stringify(id));const $tray=this.$el.find(`[data-toolbar-tray="${name}"].toolbar-tray`);if($tray.length){$tray.addClass('is-active');this.model.set('activeTray',$tray.get(0));}else this.model.set('activeTray',null);}else{this.model.set('activeTray',null);localStorage.removeItem('Drupal.toolbar.activeTabID');}},updateBarAttributes(){const isOriented=this.model.get('isOriented');if(isOriented)this.$el.find('.toolbar-bar').attr('data-offset-top','');else this.$el.find('.toolbar-bar').removeAttr('data-offset-top');this.$el.toggleClass('toolbar-oriented',isOriented);},updateTrayOrientation(){const orientation=this.model.get('orientation');const antiOrientation=orientation==='vertical'?'horizontal':'vertical';$('body').toggleClass('toolbar-vertical',orientation==='vertical').toggleClass('toolbar-horizontal',orientation==='horizontal');const removeClass=antiOrientation==='horizontal'?'toolbar-tray-horizontal':'toolbar-tray-vertical';const $trays=this.$el.find('.toolbar-tray').removeClass(removeClass).addClass(`toolbar-tray-${orientation}`);const iconClass=`toolbar-icon-toggle-${orientation}`;const iconAntiClass=`toolbar-icon-toggle-${antiOrientation}`;const $orientationToggle=this.$el.find('.toolbar-toggle-orientation').toggle(this.model.get('isTrayToggleVisible'));const $orientationToggleButton=$orientationToggle.find('button');$orientationToggleButton[0].value=antiOrientation;$orientationToggleButton.attr('title',this.strings[antiOrientation]).removeClass(iconClass).addClass(iconAntiClass);$orientationToggleButton[0].textContent=this.strings[antiOrientation];const dir=document.documentElement.dir;const edge=dir==='rtl'?'right':'left';$trays.removeAttr('data-offset-left data-offset-right data-offset-top');$trays.filter('.toolbar-tray-vertical.is-active').attr(`data-offset-${edge}`,'');$trays.filter('.toolbar-tray-horizontal.is-active').attr('data-offset-top','');},adjustPlacement(){const $trays=this.$el.find('.toolbar-tray');if(!this.model.get('isOriented'))$trays.removeClass('toolbar-tray-horizontal').addClass('toolbar-tray-vertical');},loadSubtrees(){const $activeTab=$(this.model.get('activeTab'));const orientation=this.model.get('orientation');if(!this.model.get('areSubtreesLoaded')&&typeof $activeTab.data('drupal-subtrees')!=='undefined'&&orientation==='vertical'){const subtreesHash=drupalSettings.toolbar.subtreesHash;const theme=drupalSettings.ajaxPageState.theme;const endpoint=Drupal.url(`toolbar/subtrees/${subtreesHash}`);const cachedSubtreesHash=localStorage.getItem(`Drupal.toolbar.subtreesHash.${theme}`);const cachedSubtrees=JSON.parse(localStorage.getItem(`Drupal.toolbar.subtrees.${theme}`));const isVertical=this.model.get('orientation')==='vertical';if(isVertical&&subtreesHash===cachedSubtreesHash&&cachedSubtrees)Drupal.toolbar.setSubtrees.resolve(cachedSubtrees);else{if(isVertical){localStorage.removeItem(`Drupal.toolbar.subtreesHash.${theme}`);localStorage.removeItem(`Drupal.toolbar.subtrees.${theme}`);Drupal.ajax({url:endpoint}).execute();localStorage.setItem(`Drupal.toolbar.subtreesHash.${theme}`,subtreesHash);}}}}});})(jQuery,Drupal,drupalSettings,Backbone);;
(function($,Drupal,drupalSettings){const pathInfo=drupalSettings.path;const escapeAdminPath=sessionStorage.getItem('escapeAdminPath');const windowLocation=window.location;if(!pathInfo.currentPathIsAdmin&&!/destination=/.test(windowLocation.search))sessionStorage.setItem('escapeAdminPath',windowLocation);Drupal.behaviors.escapeAdmin={attach(){const toolbarEscape=once('escapeAdmin','[data-toolbar-escape-admin]');if(toolbarEscape.length&&pathInfo.currentPathIsAdmin&&escapeAdminPath!==null)$(toolbarEscape).attr('href',escapeAdminPath);}};})(jQuery,Drupal,drupalSettings);;
