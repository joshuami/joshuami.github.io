---
layout: post
title: "10 Translation Best Practices for Government Websites"
canonical: https://joshuami.com/2023/02/20/ten-translation-best-practices-for-government-websites
description: "Governments increasingly want to support community members with limited language proficiency. There are a range of techniques that encourage proper translation for SEO, usability, equity, and accessibility."
comments: false
---
The following applies to any government website, regardless of country or level of government organization (nation/federal, state/province, local jurisdictions, etc.). That said, the more immigration a country has, versus emigration, the greater the impact created by the translation of governmental resources.
## 1: Know who will benefit from translation

Governments should know demographic information and literacy rates through a combination of census, survey, and immigration data. Demographic data will explain the scope of the possible impact for those that are bilingual, but only by understanding literacy rates can an organization understand the possible reach of translated materials.

Understanding the population impacted by limited proficiency in the source language can be combined with knowledge of the non-government and government organizations supporting these populations.

## 2: Avoid the client-side translation crutch

Many government websites rely on the deprecated [Google Translate Website Translator](https://developers.google.com/search/blog/2020/05/google-translates-website-translator) to provide access to community members with limited proficiency in the provided language. 

The Google Translate Website Translator provides essentially the same level of site translation as submitting a URL to [translate.google.com](https://translate.google.com/), but without the visual cues to help a community member understand that the translation is not being provided by the site. 

Even the developers behind this service will admit it is a crutch to shore up the lack of full translation. The pandemic and the demand to translate health and safety information are why the [widget was partially revived from deprecation](https://developers.google.com/search/blog/2020/05/google-translates-website-translator).

Client-side (browser-based) widgets are an incomplete and misleading solution. 

Policy makers, that speak the language of the government providing the content, assume the widget is providing access to critical content. Aside from providing an easy link to multilingual visitors, client-side translation is not increasing access.

Community members with limited language proficiency that use government websites tend to be familiar with services to help them translate their content. Browsers, such as Chrome or Edge, will automatically attempt to translate pages in a language other than the system or browser setting. There are also dedicated mobile apps to help with client-side translation.

If you speak enough of a language to find a page on a website, you probably know enough to figure out how to translate the page you found.

The real equity issue is finding content in the first place if you don’t speak the language.

Websites that do not have translated content using an alternate URL are not being fully indexed in target languages by search engines such as Google, Bing, DuckDuckGo, etc. That means people who speak a language other than those used in fully-translated content are unable to use their language to search

## 3: Review translations with human professionals

At a minimum, governments should consider automating the translation of content using machine translation—usually via a web service that returns translated content—that is stored in the database for presentation at a unique URL. It’s important that this content is rendered as HTML as a language alternative for the source language rather than being rendered by Javascript. 

While there are techniques for getting Google to index rendered Javascript, these approaches are not always reliable. Even though machine learning has progressed to the point that proxied translation is much more accurate, it still needs human review as of 2023.  

Best practice for all government websites should be full translation at a unique URL in a culturally appropriate design that may be translated by an on-demand service (for speed) but must be reviewed by skilled human translators for accuracy.

## 4: Help search engines rank content with proper metatags

Search engines need data to help determine the relative importance of a page—often in the form of metatags and HTML attributes. Search engines, such as Google, can use link elements (metatags) with a relationship (rel=”alternate”) and hreflang (hreflang=”es”) attribute to help rank content. In this approach, the search engine gives a bit more relevance to translations (alternates) of pages that rank highly in English.

Hreflang can be used to boost the search engine relevance of content both by language and by country or region. Most governments will find themselves using a single country code—or omit the country code—for all language codes used for their content.

Language codes are set by [look this up] a governing body that defines language and region codes. It’s not perfect—and it is always changing—but it serves as a means to ensure that the work you did to get your source content ranking will pass through to the content for your target languages.

## 5: Index content by language to improve site search

In addition to making content available to search engines, full translation provides the opportunity to index text in a target language so that it can be found in site search. Sites that only use client-side machine translation lose the ability to submit forms to return search results in the target language. This is a huge loss of functionality! Would you find it acceptable if search could only return the occasional cognate or misspelling? 

Languages have unique grammar and syntax. Languages have their own writing system (alphabet) and unique characters and accents. If the search engine cannot provide at least a rudimentary search in the language, it is likely to cause confusion and frustration.

For those that would argue that client-side translation is “enough” or “the best we can do”, consider the basic usability of a site with thousands of pages of content where search is incomprehensible.

## 6: Avoid mixed translation

While mixed content (partially translated content presented on the same page as the source language) is indexed, partial translation can impact the usability for both the reader with limited language proficiency as well as native speakers from the source languages of the content.

Clear, concise content is difficult to achieve on a page with multiple paragraphs or sections of paragraphs in two or more languages—and the problem exacerbates as the number of languages presented increases.

## 7: Help users understand the languages available

Many websites that provide translated content will have a language switcher or toggle that allows users to quickly view the translated alternate for a page. Best practice is for this toggle to present the language label in the target language. So a site with translations in English, Spanish, Vietnamese, Russian, and Chinese would have language labels similar to this example from the Multnomah County Library.

![On multcolib.org, a translation bar appears on every page of the site with links to the page in alternate languages.](/public/images/multcolib-translation-navbar.png)

When a language switch is presented as part of the navigation toolbar on a website, it is generally expected that it will switch into a fully translated version of that site with a starting point of the page being viewed.

For sites that do not have enough content translated to warrant a sitewide translation navigation, an in-page approach may be more appropriate. Here is an example from Portland.gov.

![Portland.gov uses two language menus. At the top of each translated page, the available language labels are used. In the secondary region, the list of translated titles is used for better language usability. ](/public/images/portlandgov-translation-menus.png)

Finally, showing the related titles in the target language can be an excellent indicator to those with limited proficiency that are scanning the page for information. A title will actually tell them something about the content being linked—far more than a language label.

Combining all three techniques is overwhelming, but sites should strive to combine a language label menu in either the sitewide or in-page navigation near the top of the site design with related translated titles after the content.

## 8: Label downloadable files in other languages

When possible, information should be provided as content on a website (semantically-structured HTML) rather than downloadable files. Regardless of format, HTML is likely the easiest to structure for accessibility, HTML content can be structured and styled for a range of device sizes and for screen reading technology. Files can be semantically structured for screen readers, but often fail to deliver a usable experience on mobile devices. (What device types would you assume to be most available to the population needing translation?)

If files are preferred because of the way the information should be conveyed, such as flyers that might be posted in locations where speakers of that language are likely to see them, it is important to provide context for the language used in the file. This is often referred to as dual labeling. 

![WashgingtonCountyOR.gov supports the showing of translated documents with a clear label including the title, file type, and file size.](/public/images/washco-residential-collection-service-rates.png)


In the best examples of this approach, the source language of the document should be labeled next to the document name. Proper labeling is key to both the language speakers and those supporting those speakers that may not speak the target language.

Avoid links to files with text like “click here” or “download now” and explain what is to be downloaded with a meaningful title, the file type, and file size to be downloaded. 

File size is important. Large file sizes are inequitable for government information as only those with enough data can download them. There may be file types that are unavailable to the device type being used to access the information. Additionally, some file types are more difficult to make accessible in any language.

## 9: Reduce translation costs with plain language

The easiest way to reduce translation costs is to reduce the amount of text translated. Clear, concise content is easier for people to understand and costs less to maintain as well.

## 10: Strive to be better

Delivering better government services to the most vulnerable populations is not always easy. The initial investment in your content management systems is incremental compared to the impact. That said, fully supporting all of the languages spoken in a community, including features such as permitting or online payment, may be prohibitively expensive for even the most well-funded jurisdictions.

By striving to be better, government organizations can improve service to their communities and improve equity. 

## Get help

Do any of these best practices sound like the next step your organization should take? If yes, you probably need some expert help to guide your roadmap.

Connect with me on LinkedIn ([linkedin.com/in/joshuami](https://www.linkedin.com/in/joshuami/)) and let’s talk. I have worked with a wide range of vendors that specialize in translation and localization. I may be able to connect you to an organization that can boost your efforts to provide better content to your community in their language.
