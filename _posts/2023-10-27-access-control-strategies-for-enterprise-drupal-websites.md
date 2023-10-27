---
layout: post
title: "Access Control Strategies for Enterprise Drupal Websites"
canonical: https://joshuami.com/2023/10/27/access-control-strategies-for-enterprise-drupal-websites.md
description: "When working with large organizations—whether in private enterprise, government, higher education, or non-profits—editorial responsibility is often spread across multiple sub-organizations. Set your editors up for success by choosing an access control strategy that works best for the organizational objectives."
image: "/public/images/cover-access-control-strategies-for-drupal-websites.png"
comments: false
---
When working with large organizations—whether in private enterprise, governmental organizations, or nonprofits—editorial responsibility is often spread across multiple sub-organizations. Depending on the type of organization, those subdivisions can look very different:

* Department > division > section or program
* Bureau > program > project or team
* Brand > product line > product

In all of the above structures, there is some hierarchy and some cross-organizational oversight to the editorial process combined with the overall administration of the website.

Organizational structure for a site can also significantly differ for publicly-accessed content versus employee intranets versus membership-based websites.

Drupal.org has somewhat-outdated documentation for a Comparison and Overview of Access Control modules. The documentation in question was created for Drupal 7, updated somewhat for Drupal 8—it hasn't been maintained for Drupal 9 and 10. 

While this overview outlines a long list of access control modules, it doesn't speak much to the “_why”_ or “_how does this module work”_. With this post, I hope to outline some approaches to access control in Drupal and talk about why you might want to take one approach over another.

We’ll cover:

* What's in Drupal core to handle access control?
* The simplest approach: trust more and verify
* The Group module
* Workbench suite of modules
* Taxonomy Access Control Lite
* What about Organic Groups (OG)?


## What's in Drupal core to handle access control?

One of Drupal's most powerful features is its roles and permissions architecture. Out of the box, you have anonymous, authenticated, and administrator roles. You can then create any named role you site needs. While adjusting permissions for a role can become a bit burdensome at scale—due to the enormous number of checkboxes on the administer permissions page—the power of setting these permissions from a single administrative interface is hard to deny.

For each content type created in Drupal, there are permissions associated with creating, editing, and deleting that content type. If revisions are enabled, you can further add permissions for  the ability to view, revert, and delete these revisions. If workflows are enabled, you can grant the ability to move content from one moderation state to the next.

For sites with a limited number of roles and a clear permissions model, Drupal core can be more than sufficient to keep the editorial process in order.

## The simplest approach: trust but verify

This leads us to the simplest approach to an enterprise-ready content access model that I call "trust and verify".

Often organizations will assume they need robust access control to prevent employees from doing what they shouldn't:

* deleting someone else's content
* changing someone else's content
* adding content they shouldn't
* putting content in the wrong organizational structure

While all of these could be valid issues in organizations with hundreds of editors, the question should be asked, "why did you give these people access if you can't trust them to do their job?"

It seems simple, doesn't it?

Still, there are many managers and executives that want a bit more assurance. Even out of the box, without additional modules, you can configure Drupal so that it requires a bit of verification for the most destructive actions.

### Status versus state

All content in Drupal has the option for a published status. This status is either published or not (unpublished) with default permissions that do not allow anonymous public users to see the content that is not published.

With core’s Content Moderation module, this can be expanded to add additional states that can be published or unpublished and default or not. The default state is referring to the publish status presented to users when they visit the canonical URL for the content.

While most developers I’ve met usually pick up on the concept of _default state_ pretty quickly, I’ve found many editors are a bit confused that “published” and “unpublished” are both a status (on/off or true/false) as well as a moderation state (step in the workflow). 

### The recipe for verifying editor actions

#### Moderation states

Moderation states are steps in a workflow that an editor can use to convey the intent of the state of the revision being saved. 

The following are a good starting point for a _trust but verify_ permission model:

* **Draft** - unpublished revision that is not a default current state
* **In review** - unpublished revision (not default) with the intent that content in this state should be reviewed by someone with the authority to approve the revision and publish it
* **Published** - published default revision that can be viewed by anonymous users
* **Unpublished** - unpublished default revision that removes visibility to the content
* **Marked for deletion** (optional) - unpublished default revision for identifying content that is intended for deletion that can be reviewed by a more advanced role for removal from the system.

It is important that your editors understand the meaning of “revision” and that revisions can be unpublished. Draft, in review, unpublished, and marked for deletion are all unpublished revisions that the public cannot access. If a user without the permission to see these revisions visits the URL for the content, they will get an access denied error by default.

#### Roles

Roles in Drupal are assigned permission. Role assignments are additive. To put that another way, your permissions are the sum of all the roles to which you are assigned. While this can mean fine-grain control over permissions by content type, that level of role and permission definition is a bit excessive for simpler site structures.

To avoid complexity, I usually start with a trio of roles that are best assigned exclusively:

* **Editor (or author)** - can create and edit content, but they cannot move that content to a published state
* **Publisher** - can do everything an editor can do and can also move content to a published/unpublished state
* **Administrator** - can do everything an editor or publisher can do, and can administer the site

That's pretty much all many sites need. With this model, you are trusting your trained editors (you are training them, right?) with the ability to create and edit as they need, but verifying the content is ready for publication with an additional review by a publisher.

With the optional _marked for deletion_ state, you are also trusting your publishers to unpublish content that should be deleted with the intent that administrators will double check their choices.


### Making trust more and verify work with groups

A key aspect of large, enterprise websites is the notion of grouping content by a sub-organization. Groups provide hierarchy and information architecture to the site that often is used for the path alias (URL) of the content, the breadcrumb navigation, and menu navigation. I often call this sub-organization a "group" for the purpose of content modeling, but you could name it “organization” or “site” if preferred. 

Groups could be a content type or it could be a subtype of content denoted through a field on a more basic content type. (For example, _page_ of the subtype of _group_, _department_, etc.)

For the purpose of demonstration, let's say you have a content type called "group" that represents the departments, divisions, and sections for a county (local governmental organization in the United States). 

Editors and publishers for the site are assigned to groups for the purpose of determining which groups appear on their personalized dashboard. Content created within the site is assigned to groups via a "belongs to" or "displayed in" field.


### To achieve group content ownership and user group membership, you need the following:



* Content type called group
* Content that belongs to groups (for example pages or news) have a field for Display in group
* Users have a field called Groups to which you can assign groups within the organization to the user
* Use views to create lists of my groups and my content with a contextual argument of the logged in user and with relationships that join the groups and its content to show a list of the content the user should be responsible for editing

While the permissions for these users will still be sitewide, the list views serve the purpose of showing the content the user should edit—rather than all content they could edit.

A bonus side effect of this fairly open approach is that editors and publishers can rely on other users of the system to provide coverage for events like personal leave without an administrator having to explicitly get involved.

Paired with a _reviewers_ entity reference field on content that should be reviewed—and perhaps some custom or contributed code to trigger a reviewer email message as needed—a trust more and verify approach can be quite robust and effective.


## The "Group" module

The somewhat ambiguously named [Group](https://www.drupal.org/project/group) module represents the more complex end of the access control spectrum.

Group is undergoing an extensive rewrite between version 8.x-1.x (version 1 for Drupal 8/9) and versions 2 and 3. Versions 2 and 3 are essentially the same, but version 2 is the upgrade path for sites that are on version 8.x-1x. If you are just getting started with Group version 3 in Drupal 9 or 10, start with version 3.

For the purpose of this post, Group is far too complex to describe everything it can do or how to fully configure Group for your content model, but hopefully the described scenario below may help you understand one possible use case for large sites divided into sub-organizations (groups) for access control.

First, you need to consider how many unique group types you need. For a public-facing website, you likely can get by with a single group type, but you may find yourself needing multiple access control models for intranets and extranets that have both open and restricted group types.

Once you have your group types defined, you can set roles per group type in addition to the sitewide roles provided by Drupal. Group also has the ability to set permissions to groups according to sitewide roles. This can be helpful for setting the ability for a sitewide administrator role to see all created groups.

After enabling the Group Node submodule, you can enable content plugins for the group and set permissions for each of your roles for what content that group role can create, edit, and delete.

Group defines all of the association between content and a group or a user and a group through what is called a Group relation entity. This entity serves as the glue between the different entity types—and is even fieldable for complex relationships. There is a small trade off with this complexity in that every group-based view needs group relationships (joins in the database query) for the results to be rendered. This can be very confusing to someone new to the group ecosystem.

While the group relationship entity and the permissions defined by the content plugin covers the basics of content access, creation, updates, and deletion, many organizations will need a bit more robust editorial workflow provided by the Content Moderation module from Drupal core. Unfortunately, or maybe fortunately given the complexity it would represent, Group is not aware of moderation states in workflows. To handle this, I typically have a sitewide role for granting publisher permissions and roles for group admin and editor within the group roles.

Having two layers of permissioning is complex, but it is the best option I've found to date for providing a high level of control to site administrators that need to assign strict permissions to users on their site.

A benefit of group-specific permissions to delete content, is that unlike the trust more and verify approach, you can assign the ability to delete content to a more trusted group administrative role rather than centralizing that capability at a sitewide administrator role.

Group can be extended by the Group Media and Subgroup modules. Group Media provides group relationships for media entities—allowing media to be “owned” by a group with permissions for creating and editing the media within a group. The Subgroups module allows permissions to be inherited up and down a hierarchy of groups.


## Workbench

[Workbench](https://www.drupal.org/project/workbench) is a suite of modules that make it easier for an editor to edit content they created. Much of the Workbench experience is essentially pre-made views that can be overridden with additional customizations.

[Workbench Moderation](https://www.drupal.org/project/workbench_moderation) is a module that in many ways led to much of the functionality in the Content Moderation modules in core—and as such Workbench Moderation is deprecated as of Drupal 9 and not recommended for new sites on Drupal 9 or 10.

[Workbench Access](https://www.drupal.org/project/workbench_access) provides another layer of permissions that can be applied to sitewide roles through an access schema based on either menu or taxonomy hierarchies. And it’s fairly easy to retrofit a site with the “trust but verify” approach mentioned above. 

Choosing between a menu and taxonomy access schema has some important considerations. Both menu and taxonomy have hierarchy (parent to child relationships). Hierarchy allows the site to be divided into sections and for users to be assigned to a section where their sitewide roles and permissions are applied. Per the module maintainers, “Note that the module only controls access to content editing. It does not provide any content filtering of access restrictions for users trying to view that content.”

Taxonomy hierarchy is limited to within a specific vocabulary. Taxonomy terms can be a rendered entity at a particular page path or a view that takes the contextual argument of a term ID. With a little configuration, term view pages or term pages with block views receiving a contextual argument could make a decent “landing page” for a group. However, taxonomy terms are missing some of the base fields that content types have such as author and revisions that are displayed in a revisions administrative view. (Under the hood, terms have had revisions since Drupal 10.1, [but at the time of this writing, the UI for taxonomy terms has not made it into core](https://www.drupal.org/project/drupal/issues/2936995).)

Menu hierarchy is the relationship between menu items. Menu item entities can point to any other Drupal entity with a rendered page path (for example, nodes, taxonomy terms, user profiles, custom entities) you can also create a menu item entity for views with a page display. Menu hierarchy is a little more flexible than taxonomy hierarchy, but the Menu UI (either the administrative page or per node) is a bit cumbersome with very large menus. I’ve worked around this in the past with a combination of the [Big Menu](https://www.drupal.org/project/bigmenu) and [Client Side Hierarchical Select](https://www.drupal.org/project/cshs) modules.


## Taxonomy Access Control Lite

[Taxonomy Access Control Lite](https://www.drupal.org/project/tac_lite) is the successor to Taxonomy Access Control (which was only maintained until Drupal 7). “This node_access module governs access to nodes based on the taxonomy terms applied to the nodes. A simple scheme based on taxonomy, roles and users controls which content is visible.” It adds no new tables, but has similar limitations to Workbench Access’s taxonomy access schema without the hierarchical inheritance within the concept of a “section”. For simpler site structures, this may be sufficient to grant needed access levels.


## What about Organic Groups (OG)?

In Drupal 6 and 7, Organic Groups was my go to solution for group-based access control. It had a much simpler permission structure than the Group module—but it was still quite robust. Organic Groups allowed content types to be marked as either a group or a type that could be owned by groups. 

The advantage of a group being a typical content type is evident when you are creating views that need to show groups alongside other content. It also means that your group content types have all the workflow and revision capabilities of all other content types. (Early in the development of the Group module, the group entity type could not be revisioned or assigned to a workflow. This is no longer the case, but it was a huge drawback for the first four years I found myself using Group.) OG also had a simpler relationship model, an entity reference field for both content and users.

Organic Groups was the backbone for Drupal Groups ([https://groups.drupal.org](https://groups.drupal.org)) as well as Acquia’s Commons distribution that was popular throughout the Drupal 6 and 7 lifecycle. It could be used for creating just about any permission structure that needed membership and roles to define content access and editing.

With so much going for it, Organic Groups did not make a clean jump to Drupal 8. The development of Organic Groups was moved off of Drupal.org prior to the release of a Drupal 8 version. The rewrite that was undertaken for the Drupal 8 version of Organic Groups involved a huge amount of code deletion and slow progress in restoring the functionality that made it popular for D7 and D8 sites. Despite work on the D8 version as far back as 2014, there is still no stable release on Drupal.org. That’s not to say it is completely unused. Development has trickled along during that time, and those that are ready to take on a fair amount of custom code, can essentially write their own administrative interface for OG, but it takes very deep knowledge of OG to maintain it for a customer.

I no longer recommend Organic Groups for new projects because I don’t feel I could hand off the work after launch to make the product fully operationalized.


## What solution is best for your use case?

Choosing how complex to make your access controls on a Drupal website is largely about the needs for governance and distribution of permissions to users that can create and edit content.

**If your site is small**, say a blog or a marketing site managed by a small group of editors, you can probably just **configure core roles and permissions**.

**If you have many editors for different segments of your organization**, perhaps in a small government or educational website, use either a **trust but verify content moderation workflow** or a **simple access control scheme with Workbench Access or Taxonomy Access Control Lite**.

**If you have a very large number of editors or need strict access control policies to both create/edit and to access content**, such as in the intranet of a large company or a social media solution for developer portal, then the best solution is likely **the Group module with group types and group-specific roles and permissions**.

Before you settle on the solution for your site, take the time to think through the value of added functionality versus the added complexity and maintenance. Larger more complex sites with more Drupal modules and configuration cost more to maintain, but that cost can be worth the improved features and functionality in many larger organizations.
