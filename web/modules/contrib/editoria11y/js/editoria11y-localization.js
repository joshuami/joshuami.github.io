const ed11yLangDrupal = {

  // Main Panel
  toggleAccessibilityTools: Drupal.t("Toggle accessibility tools"),
  toggleDisabled: Drupal.t('Editorially is disabled.'),
  panelCount0 : Drupal.t("No issues detected.",{},{context: 'problems'}),
  panelCountAllDismissed : Drupal.t("All issues hidden.",{},{context: 'problems'}),
  panelCount1 : Drupal.t("One issue detected.",{},{context: 'problems'}),
  panelCountMultiple: Drupal.t(" issues detected.",{},{context: 'problems'}),
  panelCountBase: Drupal.t("<span class='count'>No</span> <span class='content-type'>issues detected</span>.",{},{context: 'problems'}),
  panelControls: Drupal.t('Editorially'),
  buttonToolsContent: Drupal.t('Show headings & alt text'),
  buttonOutlineContent: Drupal.t('Headings'),
  buttonAltsContent: Drupal.t('Alt Text'),
  buttonFirstContent: Drupal.t('Go to first alert'),
  buttonNextContent: Drupal.t('Go to next alert'),
  buttonPrevContent: Drupal.t('Go to previous alert'),
  buttonShowHiddenAlert: Drupal.t('Show hidden alert'),
  buttonHideHiddenAlert: Drupal.t('Hide hidden alert'),
  buttonShowHiddenAlerts: (count) => Drupal.t('Show') + ' ' + count + ' ' + Drupal.t('hidden alerts'),
  buttonHideHiddenAlerts: (count) => Drupal.t('Hide') + ' ' + count + ' ' + Drupal.t('hidden alerts'),
  buttonShowAlerts: Drupal.t('Show accessibility alerts'),
  buttonShowNoAlert: Drupal.t('Show accessibility checker'),
  buttonHideChecker: Drupal.t('Hide accessibility checker'),
  buttonHideAlerts: Drupal.t('Hide accessibility alerts'),
  panelCheckOutline: '<p>' + Drupal.t('This shows the <a href="https://www.w3.org/WAI/tutorials/page-structure/headings/" target="_blank" title="Opens in new tab">heading outline</a>. Check that it matches how the content is organized visually.') + '</p>',
  panelCheckAltText: '<p>' + Drupal.t('Check that each image <a href="https://www.w3.org/WAI/tutorials/images/informative/" target="_blank" title="Opens in new tab">describes what it means in context</a>, and that there are no images of text.') + '</p>',
  altLabelPrefix: Drupal.t("Alt text: "),
  errorAltMissing: Drupal.t("(missing!)"),
  errorAltNull: Drupal.t("(none; image marked as decorative)"),
  errorOutlinePrefixSkippedLevel: Drupal.t("(flagged for skipped level) "),
  errorOutlinePrefixHeadingEmpty: Drupal.t("(empty heading) "),
  errorOutlinePrefixHeadingIsLong: Drupal.t("(flagged for length) "),

  // Errors and alerts
  consoleNotSupported: Drupal.t('This browser can not run Editoria11y.'),
  jumpedToInvisibleTip: Drupal.t("Note: this content may not be visible. Look for it inside the outlined container."),
  jumpedToAriaHiddenTip: Drupal.t("The item with this issue may be invisible or off screen.",{},{context: 'problems'}),

  // Strings used in tests
  suspiciousWords: [
    Drupal.t("image of"),
    Drupal.t("graphic of"),
    Drupal.t("picture of"),
    Drupal.t("placeholder"),
    Drupal.t("photo of"),
    Drupal.t('spacer'),
    Drupal.t('tbd'),
    Drupal.t('todo')
  ],
  meaninglessAlt: [
    Drupal.t('alt'),
    Drupal.t('chart'),
    Drupal.t('decorative'),
    Drupal.t('image'),
    Drupal.t('graphic'),
    Drupal.t('photo'),
    Drupal.t('placeholder'),
    Drupal.t('placeholder image'),
    Drupal.t('spacer'),
    Drupal.t('tbd'),
    Drupal.t('todo'),
    Drupal.t('to do')
  ],
  linksUrls: ['http:/', 'https:/', '.asp', '.htm', '.php', '.edu/', '.com/'],
  linkStringsNewWindows: new RegExp(`(${[
    Drupal.t('window',{},{context: 'Browser window'}),
    Drupal.t('tab',{},{context: 'Browser tab'}),
    Drupal.t('download'),
    'window','tab','download',
  ].join('|')})`, 'g'),
  linksMeaningless: new RegExp(`(
    ${[
      'learn','to','more','now','this','page','link','site','website','check','out','view','our','read','download','form','here','click',
      Drupal.t('learn'),
      Drupal.t('to'),
      Drupal.t('more'),
      Drupal.t('now'),
      Drupal.t('this'),
      Drupal.t('page'),
      Drupal.t('link'),
      Drupal.t('site'),
      Drupal.t('website'),
      Drupal.t('check'),
      Drupal.t('out'),
      Drupal.t('view'),
      Drupal.t('our'),
      Drupal.t('read'),
      Drupal.t('download'),
      Drupal.t('form'),
      Drupal.t('here'),
      Drupal.t('click'),
      Drupal.t('learn more'),
      Drupal.t('this page'),
      Drupal.t('this link'),
      Drupal.t('this site'),
      Drupal.t('our website'),
      Drupal.t('check out'),
      Drupal.t('view our'),
      Drupal.t('click here'),
      '\\.',"'",'"',":",'<','>','\\s','\\?','-',',',':'
    ].join('|')})+`, 'g'),

  // Tooltips base ======================================

  toggleManualCheck: Drupal.t("manual check needed"),
  toggleAlert: Drupal.t("alert"),
  toggleAriaLabel: (label) => Drupal.t("Accessibility %label", {
    '%label': label
  }),
  dismissOkButtonContent: Drupal.t('Mark as checked and OK'),
  dismissHideButtonContent: Drupal.t('Hide alert'),
  dismissOkTitle: Drupal.t('Hides this alert for all editors'),
  dismissHideTitle: Drupal.t('Hides this alert for you'),
  undismissOKButton: Drupal.t('Restore this alert marked as OK'),
  undismissHideButton: Drupal.t('Restore this hidden alert'),
  undismissNotePermissions: Drupal.t('This alert has been hidden by an administrator'),
  closeTip: 'Close',
  panelHelp: Drupal.t("" +
    "<p><a href='@demo' target='_blank'>Editoria11y</a> checks for common accessibility needs, such as image alternative text, meaningful heading outlines and well-named links.</p> " +
    "<p>Many alerts are \"manual checks.\" Manual checks can be dismissed:</p>" +
    "<ul><li>\"Mark as checked and OK\" hides the alert for all editors.</li>" +
    "<li>\"Ignore this manual check\" leaves the tip visible to other editors.</li></ul>" +
    "<p>Dismissed alerts can be found via the \"Show hidden alerts\" toggle.</p>" +
    "<p>If an incorrect alert is appearing on many pages, site administrators can tell the checker to ignore particular elements and page regions.</p>" +
    "<p>And remember that automated checkers cannot replace <a href='@testing' target='_blank'>proofreading and testing for accessibility</a>.<p>" +
    "<p><br><a href='@github' class='ed11y-small' target='_blank'>Report bugs & request changes <span aria-hidden='true'>&raquo;</span></a></p>",  {'@demo': 'https://editoria11y.princeton.edu','@testing': 'https://webaim.org/resources/evalquickref/','@github':'https://github.com/itmaybejj/editoria11y/issues',}),


  // Tooltips for heading tests =========================

  headingExample : Drupal.t("" +
    "<ul>" +
    "    <li>Heading level 1" +
    "        <ul>" +
    "            <li>Heading level 2: a topic" +
    "                <ul>" +
    "                    <li>Heading level 3: a subtopic</li>" +
    "                </ul>" +
    "            </li>" +
    "            <li>Heading level 2: a new topic</li>" +
    "        </ul>" +
    "    </li>" +
    "</ul>"
  ),

  // todo: import rewritten tips from library.
  headingLevelSkipped : {
    title: Drupal.t("Manual check: was a heading level skipped?"),
    tip: (prevLevel, level) => Drupal.t("" +
      `<p>Headings and subheadings create a <a target="_blank" title="Opens in new tab" href="@url">navigable table of contents</a> for assistive devices. The numbers indicate indents in a nesting relationship:</p>`, {
        '@url': "https://www.w3.org/WAI/tutorials/page-structure/headings/"}) +
      Ed11y.M.headingExample + Drupal.t("" +
      "<p>This heading skipped from level %prevLevel to level %level. From a screen reader, this sounds like content is missing.</p>" +
      "<p><strong>To fix:</strong> adjust levels to form an accurate outline, without gaps.</p>", {
      '%prevLevel': prevLevel,
      '%level': level
    }),
  },

  headingEmpty : {
    title: Drupal.t("Heading tag without any text"),
    tip: () => Drupal.t( "" +
      `<p>Headings and subheadings create a <a href="@url" target="_blank" title="Opens in new tab">navigable table of contents</a> for assistive devices. The numbers indicate indents in a nesting relationship:</p>`, {
        '@url': "https://www.w3.org/WAI/tutorials/page-structure/headings/"
      }) +
      Ed11y.M.headingExample + Drupal.t("" +
      "<p>Empty headings create confusing gaps in this outline: they could mean the following content is still part of the previous section, or that the text was unpronounceable for some reason.</p>" +
      "<p><strong>To fix:</strong> add text to this heading, or delete this empty line.</p>"
    ),
  },

  headingIsLong : {
    title: Drupal.t("Manual check: long heading"),
    tip: () => Drupal.t( "" +
        "<p>Headings and subheadings create a <a href=\"@url\" target=\"_blank\" title=\"Opens in new tab\">navigable table of contents</a> for assistive devices. The numbers indicate indents in a nesting relationship:</p>", {
        '@url': "https://www.w3.org/WAI/tutorials/page-structure/headings/"
      }) +
      Ed11y.M.headingExample + Drupal.t("" +
      "<p><strong>To fix:</strong> shorten this heading if possible, or remove the heading style if it was only applied to this text to provide visual emphasis.</p>"),
  },

  blockquoteIsShort : {
    title: Drupal.t("Manual check: is this a blockquote?"),
    tip: () => Drupal.t("<p>Blockquote formatting tells screen readers that the text should be announced as a quotation. This was flagged because short blockquotes are <em>sometimes</em> actually <a href=\"@url\" target=\"_blank\" title=\"Opens in new tab\">headings</a>. If this is a heading and not a quotation, use heading formatting instead, so this appears in the page outline.</p>", {'@url': "https://www.w3.org/WAI/tutorials/page-structure/headings/"}),
  },

  // Tooltips for image tests

  // Reusable example for tips:
  altAttributeExample : Drupal.t(`<p>Note that a <a href="@url" target="_blank" title="Opens in new tab">good alt describes the image's message</a>, not simply what it contains. Depending on the context, the alt for the picture of a child kicking a ball might emphasize the setting, the child, the kick or the ball:</p>
      <ul>
          <li>Child happily kicking a ball on a summer day</li>
          <li>A.J. playing in the new team uniform</li>
          <li>A.J.'s game-winning kick curved in from the left sideline!</li>
          <li>The \"medium\" ball is the right size for this 9-year-old child</li>
      </ul>`, {'@url': 'https://www.w3.org/WAI/tutorials/images/informative'}
  ),

  altMissing : {
    title: Drupal.t("Image has no alternative text attribute"),
    tip: () => Drupal.t(`<p>When screen readers encounter an image with no alt attribute at all, they dictate the url of the image file instead, often one letter at a time.</p><p>To fix: either add an empty alt (alt="") to indicate this image should be ignored by screen readers, or add descriptive alt text.</p>`) +
      Ed11y.M.altAttributeExample,
  },

  altNull : {
    title: Drupal.t("Manual check: image has no alt text"),
    tip: () => Drupal.t("" +
      "<p>Unless this image is purely decorative (a spacer icon or background texture), an alt should probably be provided. Photos in page content <strong>almost always need alt text.</strong> Since many screen reader users can see there is an image present, it can be very confusing to move the cursor across the place on the page where an image is visible, but hear nothing.</p>") +
       Ed11y.M.altAttributeExample,
  },

  altURL : {
    title: Drupal.t("Image's text alternative is a URL"),
    tip: (alt) => Drupal.t("" +
        `<p>This image's alt text is "%alt," which probably describes the file name, not the contents of the image.</p><p><strong>To fix:</strong> set this image's alternative text to a concise description of what this image means in this context.</p>`, {'%alt': alt}) +
      Ed11y.M.altAttributeExample,
  },

  altMeaningless : {
    title: Drupal.t('Alt text is meaningless'),
    tip: (alt) => Drupal.t("" +
      `This image's alt text is "%alt," which was flagged for being common placeholder text.</p>
        <p><strong>To fix:</strong> set this image's alternative text to a concise description of what this image means in this context.</p>`, {
          '%alt': alt,
      }) + Ed11y.M.altAttributeExample,
  },
  altMeaninglessLinked : {
    title: 'Linked alt text is meaningless',
    tip: (alt) =>
      Drupal.t("" +
        `This image's alt text is "%alt," which probably does not describe this link.</p>
        <p>When a link includes an image, <a href="@url" target="_blank" title="Opens in new tab">the image's alt text becomes the link text</a> announced by screen readers.
            Links should clearly and concisely describe their destination, even out of context.</p>`, {
        '%alt': alt,
        '@url': "https://webaim.org/techniques/hypertext/link_text#alt_link"
      })
    ,
  },

  altURLLinked : {
    title: Drupal.t("Linked image's text alternative is a URL"),
    tip: (alt) => Drupal.t("" +
      `This image's alt text is "%alt," which probably does describe this link.</p>
        <p>When a link is wrapped around an image and there is no other text, the <a href="@url" target="_blank" title="Opens in new tab">the image's alt text becomes the link text</a> announced by screen readers.
            Links should clearly and concisely describe their destination; a URL (usually pronounced by the screen reader one letter at a time) does not.</p>
            <ul>
                <li>Good link text: "About us"</li>
                <li>Bad link text: "H T T P S colon forward slash forward slash example dot com forward slash aye bee oh you tee you ess</li>
            </ul>`, {
      '%alt': alt,
      '@url': "https://webaim.org/techniques/hypertext/link_text#alt_link"
    }),
  },

  altImageOf : {
    title: 'Manual check: possibly redundant text in alt',
    tip: (alt) => Drupal.t(
      `This image's alt text is "%alt," which mentions that this image is an image.</p>
        <p>Screen readers announce they are describing an image when reading alt text, so 
            phrases like "image of" and "photo of" are usually redundant in alt text; the screen reader user hears "image: image of something."</p>
            <p>Note that this is OK if the format is referring to the <strong>content</strong> of the image:</p>
            <ul><li>Format is redundant: "<em>photo of</em> a VHS tape"</li>
            <li>Format is relevant: "<em>photo of</em> a VHS tape in a photo album being discussed in a history class"</li></ul>`, {'%alt': alt,}),
  },

  altImageOfLinked : {
    title: Drupal.t("Manual check: possibly redundant text in linked image"),
    tip: (alt) => Drupal.t("" +
      `This image's alt text is "%alt," which mentions that this image is an image.</p>
        <p>Links should clearly and concisely describe their destination. Since words like "image," "graphic" or "photo" are already redundant in text alternatives (screen readers already identify the image as an image), their presence in a linked image usually means the image's text alternative is <a href="@url" target="_blank" title="Opens in new tab">describing the image instead of the link</a>.</p>
        <ul>
                <li>Good link text: "About us"</li>
                <li>Bad link text: "Image of five people jumping"</li>
            </ul>`, {
      '%alt': alt,
      '@url': "https://webaim.org/techniques/hypertext/link_text#alt_link"
    }),
  },

  altDeadspace : {
    title: Drupal.t( "Image's text alternative is unpronounceable"),
    tip: (alt) => Drupal.t("" +
        `This image's alt text is "%alt," which only contains unpronounceable symbols and/or spaces. Screen readers will announce that an image is present, and then pause awkwardly: "image: ____."</p>
        <p><strong>To fix:</strong> add a descriptive alt, or provide a <em>completely</em> empty alt (alt="") if this is just an icon or spacer, and screen readers should ignore it.</p>`, {
        '%alt': alt,
      }) +
      Ed11y.M.altAttributeExample,
  },

  altEmptyLinked : {
    title: Drupal.t("Linked Image has no alt text"),
    tip: () => Drupal.t(`<p>When a link is wrapped around an image, the image's alt text <a href="@url" title="Opens in new tab" target="_blank">provides the link's title for screen readers</a>.</p>
        <p><strong>To fix:</strong> set this image's alternative text to something that describes the link's destination, or add text next to the image, within the link.</p>`, {'@url': "https://webaim.org/techniques/hypertext/link_text#alt_link"}
    ),
  },

  altLong : {
    title: Drupal.t("Manual check: very long alternative text"),
    tip: (alt) => Drupal.t(`<p>Image text alternatives are announced by screen readers as a single run-on sentence; listeners must listen to the entire alt a second time if they miss something. If this cannot be reworded to something succinct, it is better to use the alt to reference a <em>visible</em>  <a href="@url" title="Opens in new tab" target="_blank">text alternative for complex images</a>. For example:</p>
            <ul><li>"Event poster; details follow in caption"</li>
            <li>"Chart showing our issues going to zero; details follow in table"</li></ul>
            <p>This image's alt text is: %alt</p>`, {
      '@url': "https://www.w3.org/WAI/tutorials/images/complex/",
      '%alt': alt,
      }
    ),
  },

  altLongLinked : {
    title: Drupal.t("Manual check: very long alternative text in linked image"),
    tip: (alt) => Drupal.t(`<p><a href="@url" title="Opens in new tab" target="_blank">The alt text on a linked image is used to describe the link destination</a>. Links should be brief, clear and concise, as screen reader users often listen to the list of links on the page to find content of interest. Long alternative text inside a link often indicates that the image's text alternative is describing the image instead rather than the link.</p>
        This image's alt text is: <em>%alt</em>`, {
        '@url': "https://webaim.org/techniques/hypertext/link_text#alt_link",
        '%alt': alt,
      }
    ),
  },

  altPartOfLinkWithText : {
    title: Drupal.t("Manual check: link contains both text and an image"),
    tip: (alt) => Drupal.t(`<p>When a link includes an image, screen readers <a href="@url" title="Opens in new tab" target="_blank">speak the image's alt text as part of the link</a>.
            This can be confusing if the image's alt is irrelevant to the link.</p>
            <p>E.g., for a card-style link with both text and a stock photo, compare:</p>
            <ul>
                <li>"Link, image, five people jumping and high-fiving around a conference table, About us"</li>
                <li>"Link, About us"</li>
            </ul>
            <p>If the content of this image is not relevant, it may be better to leave this alt text blank.</p>
            <p>This image's alt text is: <em>%alt</em>`, {
        '@url': "https://www.w3.org/WAI/tutorials/images/functional/",
        '%alt': alt,
      }
    ),
  },

  linkNoTextExample: Drupal.t('<p>Screen readers will either say nothing when they reach this link: <br><em>"Link, [...awkward pause where the link title should be...],"</em><br>or read the URL: <br><em>"Link, H-T-T-P-S forward-slash forward-slash example dot com"</em></p>'),

  linkTextIgnored: (ignoredText) => Drupal.t('<p>Screen readers will only read the text of the link type indicator on this link:<br><em>"<strong>%text</strong>"</em></p>', {
    '%text': ignoredText,
    }
  ),

  linkNoText : {
    title: Drupal.t("Link with no accessible text"),
    tip: (ignoredText) =>
      Drupal.t(`<p>This link is either a typo (a linked space character), or a linked image with no text alternative.</p>`) +
      `${ignoredText ? Ed11y.M.linkTextIgnored(ignoredText) : Ed11y.M.linkNoTextExample}` +
        Drupal.t(`<p><strong>To fix:</strong></p>
<ul><li>If this a typo, delete it. Note that typo links can be hard to see if they are next to a "real" link: one will be on the text, one on a space.</li><li>If it is a real link, add text to describe where it goes.</li>`)
  },

  linkText: (text) =>
    "<p>" + Drupal.t("This link's text is:") + " <strong>" + text + "</strong></p>",

  linkTextIsURL : {
    title: Drupal.t("Manual check: is this link text a URL?"),
    tip: (text) => Ed11y.M.linkText(text) + Drupal.t(`<p><a href="https://webaim.org/techniques/hypertext/link_text" title="Opens in new tab" target="_blank">Links should be meaningful and concise</a>. Readers often skim by link titles. This is especially true of screen reader users, who navigate using a list of on-page links.</p>
         <p>A linked URL breaks this pattern; the reader has to read the preceding paragraph to figure out the link's purpose from context.</p>
            <ul>
                <li>Meaningful and concise link: "Tips for writing meaningful links"</li>
                <li>Linked URL, as pronounced by a screen reader: "H T T P S colon forward-slash forward-slash example dot com forward-slash tips forward-slash meaningful-links"</li>
            </ul>`, {}),
  },

  linkTextIsGeneric : {
    title: Drupal.t("Manual check: is this link meaningful and concise?"),
    tip: (text) => Ed11y.M.linkText(text) + Drupal.t("" +
      "<p>Readers skim for links. This is especially true of screen reader users, who navigate using a list of on-page links.</p>" +
      "<p>Generic links like \"click here\", \"read more\" or \"download\" expect the reader be reading slowly and carefully, such that they figure out each link's purpose from context for themselves. Few readers do this, so click-through rates on meaningless links are extremely poor.</p>" +
      "<ul>" +
      "    <li>Not meaningful: \"<a href='https://www.google.com/search?q=writing+meaningful+links'>Click here</a> to learn about meaningful links\".</li>" +
      "    <li>Not concise: \"<a href='https://www.google.com/search?q=writing+meaningful+links'>Click here to learn about meaningful links</a>\"</li>" +
      "    <li>Ideal: \"Learn about <a href='https://www.google.com/search?q=writing+meaningful+links'>meaningful links</a>\"</li>" +
      "</ul>"),
  },

  linkDocument : {
    title : Drupal.t( "Manual check: is the linked document accessible?"),
    tip: () => Drupal.t(`<p>Many mobile and assistive device users struggle to read content in PDFs. PDFs generally do not allow for changing font sizes, and often contain features that are incompatible with screen readers.</p>
        <p>Ideally make the content of this linked PDF available on a Web page or in an editable document, and only link to this PDF as a "printable" alternative. If this PDF is the only way you are providing to access this content, you will need to <a href='@url' target='_blank' title="Opens in new tab">manually check that the PDF is well-structured</a>, with headings, lists and table headers, and provides alt text for its images.</p>`, {
      '@url': 'https://webaim.org/techniques/acrobat/',
      }
    ),
  },

  linkNewWindow : {
    title: Drupal.t("Manual check: is opening a new window expected?"),
    tip: () => Drupal.t("" +
      "<p>Readers can always choose to open a link a new window. When a link forces open a new window, it can be confusing and annoying, especially for assistive device users who may wonder why their browser's \"back\" button is suddenly disabled.</p>" +
      "<p>There are two general exceptions:</p>" +
      "<ul>" +
      "    <li>When the user is filling out a form, and opening a link in the same window would cause them to lose their work.</li>" +
      "    <li>When the user is clearly warned a link will open a new window.</li>" +
      "</ul>" +
      "<p>To fix: set this link back its default target, or add a screen-reader accessible warning (text or an icon with alt text).</p>"
    ),
  },

  // Tooltips for Text QA

  tableNoHeaderCells : {
    title: Drupal.t("Table has no header cells"),
    tip: () => Drupal.t(`<p>To fix:</p>
                <ul><li>If this table contains data that is meaningfully organized by row and column, edit the table's properties and specify whether headers have been placed in the first row, column or both. This lets screen reader users hear the headers repeated while navigating the content.</li>
                <li>If this table does not contain rows and columns of data, but is instead being used for visual layout, remove it. Tables overflow the page rather than reflowing on mobile devices, and should only be used when the horizontal relationships are necessary to understand the content.</li></ul>`
    ),
  },

  tableContainsContentHeading : {
    title: Drupal.t("Content heading inside a table"),
    tip: () => Drupal.t(`<p>To fix: remove heading formatting. Use row and column headers instead.</p>
        <p>Content headings ("Heading 1", "Heading 2") form a navigable table of contents for screen reader users,  
        labelling all content <strong>until the next heading</strong>. Table headers label specific columns or rows within a table.</p> 
            <p></p>
            <table><tr><th>1</th><th>2</th><th>3</th><td rowspan="2">To illustrate: a <strong>table</strong> header in cell 2 would only label its column: cell B. <br><br>
            A <strong>content</strong> heading in cell 2 would label all subsequent text, reading from left to right: cells 3, A, B and C, as well as this text!</td></tr>
            <tr><td>A</td><td>B</td><td>C</td></table>`
    ),
  },

  tableEmptyHeaderCell : {
    title: Drupal.t("Empty table header cell"),
    tip: () => Drupal.t("<p>When exploring tables, screen readers repeat table header cells as needed to orient users. Without headers, it is very easy to get lost; screen reader users have to count columns and rows and try to remember which columns went with which rows.</p><p><strong>To fix:</strong> make sure each header cell in this table contains text.</p>"),
  },

  textPossibleList : {
    title: Drupal.t("Manual check: should this have list formatting?"),
    tip : (text) => Drupal.t("" +
      "<p>List formatting is structural:</p>" +
      "<ol>" +
      "    <li>List formatting indents and reflows on overflow. Text aligns vertically with text, rather than the \"%text\"</li>" +
      "    <li>Lists are machine-readable. Screen readers can orient their users, announcing this as \"list item, 2 of 2.\"</li>" +
      "</ol>" +
      "<p>3. Whereas this unformatted item (just a number, typed as text) is not visually or audibly included in the list.</p>" +
      "<p>To fix: if this \"%text\" starts a list, replace it with list formatting.</p>", {
      '%text': text
    }),
  },

  textPossibleHeading : {
    title: Drupal.t("Manual check: should this be a heading?"),
    tip : () => Drupal.t('<p>If this all-bold line of text is functioning as a heading for the following text rather than a visual emphasis, replace the bold formatting with the appropriately numbered heading. Otherwise, dismiss this alert.</p>\n        <p>Headings and subheadings create a <a href="@url" title="Opens in new tab" target="_blank">navigable table of contents</a> for assistive devices. The heading\'s <strong><em>number</em></strong> indicates its <strong><em>depth</em></strong> in the page outline; e.g.:</p>', {
      '@url': 'https://www.w3.org/WAI/tutorials/page-structure/headings/',
      }) +
      Ed11y.M.headingExample,
  },

  textUppercase : {
    title: Drupal.t("Manual check: is this uppercase text needed?"),
    tip : () => Drupal.t("" +
      "<p>UPPERCASE TEXT CAN BE MORE DIFFICULT TO READ FOR MANY PEOPLE, AND IS OFTEN INTERPRETED AS SHOUTING.</p>" +
      "<p>Consider using sentence case instead, and using bold text or font changes for visual emphasis, or structural formatting like headings for emphasis that will also be announced by screen readers.</p>"
    ),
  },

  embedVideo : {
    title: Drupal.t("Manual check: is this video accurately captioned?"),
    tip : () => Drupal.t("" +
      "<p>If a recorded video contains speech or meaningful sounds, it must <a href=\"@url\" title=\"Opens in new window\" target=\"_blank\">provide captions</a>.</p>" +
      "<p>Note that automatic, machine-generated captions must be proofread, and speaker identifications must be added, before being considered an equal alternative.</p>", {
      '@url': 'https://www.w3.org/WAI/media/av/captions/',
      }
    ),
  },
  embedAudio : {
    title: Drupal.t("Manual check: is an accurate transcript provided?"),
    tip : () => Drupal.t("" +
      "<p>If this audio contains speech, a <a href=\"@url\" target=\"_blank\" title=\"Opens in new window\">text alternative</a> must be provided on this page or linked.</p>" +
      "<p>Note that automatic, machine-generated transcripts must be proofread, and speaker identifications must be added, before being considered an equal alternative</p>", {
      '@url': 'https://www.w3.org/WAI/media/av/transcribing/',
      }
    ),
  },
  embedVisualization : {
    title: Drupal.t("Manual check: is this visualization accessible?"),
    tip : () => Drupal.t("" +
      "<p>Visualization widgets are often difficult or impossible for assistive devices to operate, and can be difficult to understand for readers with low vision or colorblindness.</p>" +
      "<p>Unless this particular widget has high visual contrast, can be operated by a keyboard and described by a screen reader, assume that an alternate format (text description, data table or downloadable spreadsheet) should also be provided.</p>"
    ),
  },
  embedTwitter : {
    title: Drupal.t("Manual check: is this embed a keyboard trap?"),
    tip : () => Drupal.t("" +
      "<p>If embedded feeds are set to show a high number of items, keyboard users may have to click the tab key dozens or hundreds of times to exit the component.</p>" +
      "<p>Check to make sure only a small number of items auto-load immediately or while scrolling. Having additional items load on request (\"show more\") is fine.</p>"
    ),
  },
  embedCustom : {
    title: Drupal.t("Manual check: is this embedded content accessible?"),
    tip : () => Drupal.t("<p>Please make sure images inside this embed have alt text, videos have captions, and interactive components can be <a href='https://webaim.org/techniques/keyboard/'>operated by a keyboard</a>.</p>"),
  }

};
