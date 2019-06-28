---
layout: post
title: Chasing Core: Why the Drupal 8.7 Update Was So Difficult
canonical: https://joshuami.com/2019/06/28/questions-and-answers-oregon-digital-government
description: Drupal 8.7 was released nearly two months ago and it took me that long to upgrade a complex site.
comments: true
---
Drupal 8.7 was released nearly two months ago and it took me that long to upgrade a complex site. Well... I should say it took me about 40 hours of research and development time. I worked on other things during the numerous local rebuilds it took. I am not proud of how long it took, but I am pretty impressed that I figured it out. I think I tried about 10 different approaches before I landed on the magic combination.

So why is chasing Drupal Core to the 8.7 update so difficult? A normal update to core is as simple as `composer update` followed by `drush updb` and a cache clear (`drush cr`). The challenge of this upgrade comes down to three things.

## I let the configuration become too complex

It happens to all of us that work in Drupal long enough. We start a new team on a new project that is big and complex and we teach them to Drupal along the way. In the process, one developer adds a module for this and another adds a module for that. 

We started with Acquia Lightning, but our approach has bloated along the way to include modules like Groups (Organic Groups wasn't ready yet), Paragraphs (Layout Builder wasn't ready yet), Display Suite (Layout Builder doesn't really do this), Content Lock, migrations, Solr Search API (which we have to fool composer to load a more modern version than what Acquia uses), Webform, and more.

On their own, these are all amazing tools to have when building a complex site. But suddenly—as if it happened overnight, ha—our `composer.json` file is huge and there are patches galore.

### Speaking of patches

It might be a good rule of thumb to limit your total patches to no more than twice the years you have worked with Drupal 8. Patches are amazing as they allow you to add a fix that is coming in the future with very little effort. The problem is that a patch is a promise of how code will be added to files in the future. Changes accepted before the patch in that future release can make the patch no longer apply. 

As a developer in Composer world, if you apply too many patches, you will spend a lot of time rerolling patches in the Drupal issue queue—or grabbing it from others when they beat you to it.

When possible, you should only use a patch that you know is committed to the next version so that you can safely remove that patch upon upgrade. Let's face it. If you have a big project that needs the patch. You are going to patch away anyway.

### Configuration is everywhere

Every edit you make to an entity type (content node, taxonomy term, menu item, etc.) changes a configuration file. In the site we upgraded, I had 1,499 configuration files. (And that is not counting configuration splits for preproduction and production environments.)

Configuration is awesome when it helps you keep your database in sync, but it can be a nightmare when something is corrupted or a schema changes.

### Composer will try to update everything

Dependency management is pretty amazing. When I built up the team at the Drupal Association to support Drupal.org, it became apparent pretty quickly that if we wanted Drupal 8 to suceed, we needed Composer integration to succeed. 

Composer is amazing at what it does, but I would not say that it is easy to understand all the inner workings. You have to understand semantic versioning (semver) deeply to have success with Composer. 

When everyone in your dependency tree is doing their job, and your `composer.json` is well structured, running `composer update` will give you all the new stuff you need from Drupal and all its depenedencies as well as put your contributed dependencies into an easily understandable directory structure that sorts code from others and the code you have customized in your git repo.

I found that this particular Drupal update needed as few concurrent upgrades running as possible. That meant pinning Lightning to the 3.x release (`composer require acquia/lightning:^3.2), as well as updating a lot of underlying modules like Entity Views Attach, Field Defaults, Easy Breadcrumb, and getting core up to the latest release of 8.6.17.

If it hadn't been for this gem of a [blog post](https://www.previousnext.com.au/blog/patch-drupal-core-without-things-ending-up-corecore-or-coreb), I don't think everything would have updated cleanly to Drupal 8.6.17 because a couple of my patches were writing to `core/core` instead of just `core`.

I should also not that the final build required that I [pin our version of Lightning Layout per an known issue](https://www.drupal.org/project/lightning/issues/3056074) as well as stick Search API Page (`composer require drupal/search_api_page:1.0.0-alpha12`) and the Groups module (`composer require drupal/group:1.0.0-rc2`). It is not that either of those modules are a hard dependency, but their upgrades were failing for other reasons and I wan't to isolate the Drupal 8.7 upgrade as much as possible.

## Core decided to add revisioning to taxonomy terms and menu links

I'm actually okay with the decision. If I had it my way, every entity in Drupal would just be an entity with all the same field and workflow options. Let me publish and unpublish all the things!

The approach was solid, but the ability to apply that approach is heavily dependent on a fairly simple Drupal installation. Tests can only uncover so much. As a result, there are a significant number of sites that have strugged to upgrade with issues like:

* [Unable to update Drupal 8.6 to Drupal 8.7; Field storage definition for 'type' could not be found in file_update_8700()](https://www.drupal.org/project/drupal/issues/3052204)
* [update from 8.6.15 to 8.7 fails due to menu_link_content](https://www.drupal.org/project/drupal/issues/3052318)
* [Cannot rename tmp_2362aemenu_link_content_revision to menu_link_content_revision](https://www.drupal.org/project/drupal/issues/3039586)
* [Cannot update to 8.7.0 because of taxonomy_post_update_make_taxonomy_term_revisionable](https://www.drupal.org/project/drupal/issues/3052464)

I have been following these issues, and more, over the past month to figure out what exactly was causing database updates to fail on my attempts to upgrade.

The short answer is that I had three patches in place that conflicted with the entity update code that was a part of the changes that added revisioning to taxonomy terms and menu items.

The first, [Add a views sort handler for sorting content by moderation state](https://www.drupal.org/project/drupal/issues/2953331), I decided we didn't need. Sorting by moderation state is an administrative task of questionable value. You might group by moderation state or filter by moderation state, but do you really need to sort. So I removed that patch.

The next two issues, [Dynamically provide action plugins for every moderation state change](https://www.drupal.org/project/drupal/issues/2797583) and [View output is not used for entityreference options](https://www.drupal.org/project/drupal/issues/2174633), were code that we needed. However, Drupal 8.6 needed the code in a different place than in Drupal 8.7. (See the patches problem statement above.)

## Order of operations in automated builds is very important

One of the developers on the team at the City of Portland took a zsh alias that I had set up and turned it into a really slick little bit of tooling in our `lando.yml`. I really pretty heavily on these Lando commands to make sure that we don't forget a command when we are setting up a local environment for a successful build.

This upgrade was particularly challenging as it has a pretty critical list of updates that require a configuration export **after** the updates are complete. This made me reconsider my scripts... which I will now provide here for those that might want to incorporate this into their Drupal workflow.

I also use Oh My Zsh with some git shorthand to reduce my typing. I'll provide the full commands alongside.

### Starting a new branch from master

1. `gco master` (`git checkout master`)
2. `lando latest` (The following commands run from the project root.)
    1. `mkdir -p /app/artifacts`
    2. `rm -f /app/artifacts/database.tar.gz`
    3. `terminus backup:get portlandor.dev --element=database --to=/app/artifacts/database.tar.gz` (We use Pantheon for our hosting, but all the big Drupal hosts have similar commands you can run.)
    4. `database: cd /app && /helpers/sql-import.sh artifacts/database.tar.gz`
    5. `drush cr -y`
3. `lando refresh` (This command gives us a clean starting point with our database.)
    1. `composer install`
    2. `drush cr -y`
    3. `drush updb -y`
    4. `drush cim -y`
    5. `drush core:cron -y`
    6. `drush cr -y`
    7. `npm -C /app/web/themes/custom/$theme run build:dev` (This last command will vary depending on whether you compile your theme with something like Webpack or Gulp.)

You can see why we turned these into commands. I can't tell you how many times I have seen one of these steps skipped and the resulting build just fails. Usually from a configuration conflict or an entity update that didn't happen as it should.

### Once you have updated your composer.json

1. `lando cupex` (This is kinda a goofy little shorthand I came up.)
    1. `composer update` (Yes, I just update it all and I do so pretty regularly.)
    2. `drush updb -y` (Runs all your update and post-update hooks which changes the database.)
    3. `drush cex -y` (This is the shorthand for config-export and it takes all those database changes and writes them to config.)
2. `gaa` (`git add -A` is my preferred way to deal with automation like this as it just grabs every change and I can see those changes in my editor.)
3. `gcmsg "My commit message"` (This commmand is so much less verbose and easy to type than `git commit -m "My commmit message"`. We include our Jira issue IDs in the message to tie it all back to our sprint board.)
4. `git push -u origin $branch-id` (I think there is shorthand for this that I just haven't taken the time to learn. Yeah... me too.)

And here is where the magic happens and we let our Github and CircleCI integration take over and build our multidev environment for automated (Behat) and manual testing. QA still catches a lot, so we haven't stopped doing it. Our CirleCI scripts are pretty much using the same set of commands to build our artifacts that get pushed to our servers on Pantheon. 

## It took six smaller builds to finally get to 8.7

You read that correct. I had to incrementally update a lot of "small" things and get all those patches to apply cleanly before the final build would give me a site that had no errors and passing tests. That means I had to repeat the "*latest* > *refresh* > *change some things* > *cupex* > *push to origin*" over and over. Developing in PHP is so much like developing in Javascript now! Write some recipes and compile! Sigh.

## Was it worth it

In truth, yes. I learned a lot about Drupal 8 in this process. I am much more intimately aware of entity updates and update hooks than I was before.

What's more, Drupal 8.7 has several cool new features that make it worth trying. In fact, on a clean install, I found a lot to love by grabbing Lightning 4—released on May 16—and adding a minimal amount of configuration.

Did I get any of the above completely wrong? Have a question I didn't answer? Hit me up in the comments. I haven't seen a comment in months.