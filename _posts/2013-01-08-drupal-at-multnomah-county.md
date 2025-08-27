---
layout: post
title: Drupal at Multnomah County
---

<h2>Executive Buy-in</h2>
In October of 2009, Multnomah County hired their first position dedicated to the development of open source technology and solutions. (That would be me.) This mid-level management position was tasked with identifying and vetting open source software, hiring open source developers and managing IT applications for the general government line of business.

General government is a broad term that includes departments like County Management (which includes County HR, finance, payroll, benefits, assessment, recording and taxation, etc.) , Community Services (wich includes animal services, bridge maintenance, road maintenance, elections, and land use planning), elected officials, the county attorney's office and, to top it off and round things out, the public and intranet website platform for all departments. Similar development groups exist for the health, human services and public safety related departments.

Three areas were identified as a starting point for the use of open source technology: digital document management, rapid application development and blogging for the Multnomah County Library. General content management for the public website was considered off the table as a redesign project that included an upgrade to the latest version of Vignette Content Portal was already underway.

Drupal was initially identified as the platform for rapid application development and content management for internal solutions such as Intranets and collaborative workspaces. At that time, we could use Drupal as a CMS, just not asÂ <em>the</em> CMS as we had invested so much into Vignette.
<h2 dir="ltr">A Change in Direction</h2>
A year into the website redesign, it became increasingly clear that while we had optimized our processes for migrating from Vignette 7.3 to Vignette 7.5 (if you are a Drupal user, think Drupal 5 to Drupal 6â€”same concepts, but big changes), we were not able to hit the pace necessary to complete a site-wide redesign by our target date of February 2011. We had given ourselves two years for the project and revised it to three years because of the sheer scope of moving every individual site that was either Vignette or static HTML into this system. At the time I considered this an insane amount of time. I was used to rolling projects in months (if not occasionally weeks)... not years.

Of a greater concern was the difficulty we had in training our end users to edit their Vignette content. While Vignette scales well to heavy traffic and has a solid enterprise reputation, it is not an intuitive system for non-technical end users. Vignette lacks a strong rich text editor and image handling out of the box and its system of â€œprojectsâ€ and â€œchannelsâ€ is simply not a lexicon that is easily picked up by end users.

In mid-April 2010, myself, the County web manager and the project manager for this project put together a convincing argument to shift our migration efforts from Vignette to Drupal. I took two developers to DrupalCon in San Fransiscoâ€”nicely timedâ€”for a crash course in Drupal development. I wanted to get my two leads up to speed on the latest trends in configuring a large-scale Drupal website as quickly as possible. At the time, I was the only one in the group with experience with Drupal.

A target for an initial pilot was set for July 1st to launch two sites: public affairs and our jobs site that HR maintained. Fortunately, I was able to hire an open source developer with tons of Drupal experience in June, but the pilot that launched received only a cursory review from him before we were schedule to go live.

We hit our target launch date with a fully-functional, highly-scalable website that served up for 65,000 pageviews in the first month.

Upon completion of a successful and on-schedule pilot, the redesign effort was completely shifted to Drupal. As of January 3rd, 2011, roughly six months from the completion of the pilot, 45 sites were launched on the new Drupal platform. 16 sites remain; eight of which are are in progress. The effort from each site launch has moved from web development and engineering to content migration. Content migration is completed primarily by departmental editors assisted by a team of two part-time interns, a part-time training specialist and the county web manager (responsible for helping departments restructure their content and planning site publication schedules).

A new "site" within the County's Drupal installation takes approximately two minutes to create and publish. A typical site migration takes less than a weekâ€”including site reorganization.
<h2 dir="ltr">The Platform Behind the Progress</h2>
Multnomah County's Drupal platform is built on Amazon's Elastic Computing environment. The EC2 image in use is preconfigured with Pressflow (an optimized version of Drupal that takes advantage of advances in MySQL and PHP) with special configuration to take advantage of packages such as Varnish for HTTP caching, Memcached for MySQL caching, and APC for PHP caching.

The development environment follows best practices using Subversion <em>[note: we moved to git in 2012]</em> for code revisioning in a four stage deployment process to allow for localhost development, a quality assurance server, a user acceptance testing server and the public production server. The database backed up automatically every two hours. Twice a day, production backups are copied between all environments. The production and UAT environments are hosted out of Amazon's Western zone with elastic IPs that allow for manual fail over between environments in five seconds or less without waiting for DNS propogation. The testing environment is hosted out of Amazon's Eastern zone for disaster recovery fail over that is geographically isolated.
