---
layout: post
title: DrupalCI: Continuous Integration Testing for Drupal.org
---

[Republished from Druapl.org](https://www.drupal.org/drupalorg/blog/drupalci-continuous-integration-testing-for-drupalorg)

## Why test?

The goal of automated testing is confidence: confidence in application stability, and confidence that new features work as intended. Continuous integration as a philosophy is about speeding the rate of change while keeping stability. As the number of contributing programmers increase, the need to have automated testing as a means to prove stability increases.

This post is focused on how the automated testing infrastructure on Drupal.org works, not actually writing tests. Much more detail about how to write tests during Drupal development can be found in community documentation:

- [Testing (D7 and D8) / SimpleTest (D6)](https://www.drupal.org/simpletest)
- [Drupal's implementation of PHPUnit](https://www.drupal.org/phpunit)

## Categories of testing

DrupalCI essentially runs two categories of tests:

**Functional tests** (also called blackbox testing) are the most common type of test run on DrupalCI hardware. These tests run assertions that test functionality by installing Drupal with a fresh database and then exercising that installation by inserting data and confirming the assertions complete. Front-end tests and behavior driven tests (BDD) tend to be functional. *Upgrade tests* are a type of functional tests that run a full installation of Drupal, then run upgrade commands.

**Unit tests** run assertions that test a unit of code and do not require a database installation. This means they execute very quickly. Because of its architecture, Drupal 8 has much more unit test coverage than Drupal 7.

These test categories can be broken down further into more specific test types.
## What testing means at the scale of Drupal

Drupal 8, with its 3,000+ core contributors and 7,288 contrib developers (so far), needs testing as a means to comfortably move forward code that everyone can trust to be stable.

Between January and May 2016, 90,364 test runs were triggered in DrupalCI. That is about 18,000 test runs requested per month. Maintainers set whether they want tests to run on demand, with every patch submitted, or nightly. They also determine what environments those tests will run on; there are 6 combinations of PHP and database engines available for maintainers to choose from.

The majority of these test runs are Drupal 8 tests at this point. (19,599 core tests and 47,713 contrib project tests were run during those 5 months.) Each test costs about 12 cents to run on Amazon Web Services. At the time of writing this post, we averaged around $2,000 per month in testing costs for our community. (Thank you [supporters](https://www.drupal.org/supporters)!)

## An overly simple history of automated testing for Drupal

Automated testing first became a thing for Drupal contributed projects Drupal 4.5 with the introduction of the [SimpleTest module](https://www.drupal.org/project/simpletest). It was not until Drupal 6 that we started manually building out testbots and running these tests on Drupal.org hardware.

In Drupal 7, SimpleTest was brought into Drupal Core. (More information about what that took can be reviewed in the [SimpleTest Roadmap for Drupal 7](https://groups.drupal.org/node/10099).)

In Drupal 8, PHPUnit testing was added to Drupal Core. PHPUnit tests are much faster than a full functional test in SimpleTest—though runtest.sh still triggers a combination of these test types in Drupal 8.

The actual implementation of automated testing was much more complicated that this history suggests. The original testbot infrastructure that ran for 7 years on Drupal.org hardware was manually managed by some fiercely dedicated volunteers. The manual nature of that maintenance led to the architecture of DrupalCI, which was meant to make it easier to test locally at first and later focused on autoscaling on powerful hardware that could plow through tests more quickly.
## DrupalCI's basic structure

In [The Drupal.org Complexity](/2016/05/18/the-drupalorg-complexity/), we could see the intricate ways that Drupal's code base interacts with other parts of the system.

![Representation of the relationships between services and sites in the Drupal.org ecosystem.](/public/images/the-drupalorg-complexity.png)


We could further break out how systems like DrupalCI are interrelated.
![Highlighted relationships between testing and other services.](/public/images/the-drupalorg-complexity-highlight-testing-integrations.png)

DrupalCI is a combination of data stored on Drupal.org, cron jobs, drush commands, and most importantly a couple of Jenkins installations to manage all the automation.

Jenkins is the open source automation server project that makes most of the system possible. We use it for automating our build process and deploying code to our dev, staging and production environments. It automates just about anything and is used by companies small and large to run continuous integration or continuous deployment for their applications. It's considered a "best practice" solution alongside options like Travis, CircleCI, and Bamboo. They all have slightly different features, but automation is at the core of most of these DevOps tools.

To provide continuously integrated tests, you need to trigger those tests at a moment when the tests will have the greatest value.

The three triggers for running a test job are when a patch is added to an issue comment, when code is committed to a repository or daily on a cron. Maintainers can specify which triggers are associated with which branches of their projects and which environments should run those tests.

For core these settings look something like this:

![Screenshot of the automated testing settings for Drupal Core.](/public/images/drupal-core-automated-testing-settings.png)



This detail allows for specific tests to run at specific times per the *[Drupal.org Testing Policy for DrupalCI](https://www.drupal.org/node/2696421)*.

To make this automation happen, we have an installation of Jenkins (Infrastructure Jenkins below) that is polled by Drupal.org once per minute with testing jobs to be queued.

These jobs live in a database record alongside Drupal.org.

![The infrastructure jenkins instance polls Drupal.org once per minute looks for new jobs to queue.](/public/images/DrupalCI-step-0-poll-for-jobs.png)

Infrastructure Jenkins speaks to the CI Dispatcher (also Jenkins) where the testing queue  regularly passes those jobs to available testbots. CI Dispatcher using an Amazon Web Services EC2 plugin to spin up new testbots when no existing testbot is available. Each testbot is a able to spin up Docker containers with the specific test images defined by the maintainer. Theses containers pull from DockerHub repositories with official combinations of PHP and database engines that Drupal supports.

![The CI Dispatcher maintains the queue of jobs to run. When a job is ready, it uses an EC2 plugin to use an existing testbot or spin up a new bot as needed.](/public/images/DrupalCI-step-1-ci-dispatcher.png)

After a testbot is running, the CI Dispatcher is in constant communication with the bots. You can even click through to the console on CI Dispatcher and watch the tests run. (It's not very exciting—perhaps we should add sound effects to the failures—but it is very handy.)

![Once the testbot has been spun up, the CI Dispatcher listens to it for results.](/public/images/DrupalCI-step-2-listen-for-results.png)

Once per minute, Drupal.org is polling the CI Dispatcher for test status. It responds with pending, running, failed or passed. Failed and passed tests are then pulled back into Drupal.org for display using the Jenkins JSON API.

![Drupal.org checks for test status once per minute: pending, running, failed, passed. All the results are pulled back into Drupal.org using the Jenkins' JSON API.](/public/images/DrupalCI-step-3-write-status-to-drupalorg.png)

Tests can also be run on demand at the patch, commit or branch level using the handy "add test" and "retest" links.

## Why did we build this ourselves? Why not use [insert testing platform here]

Lot's of people have asked "why don't we use TravisCI, CircleCI or some other hosted testing solution." The short answer is that most publicly available testing systems require Github authentication and integration.

Additionally, our testing infrastructure is powerful because of its integration with our issue queues. Read the aforementioned *[The Drupal.org Complexity](/2016/05/18/the-drupalorg-complexity/)* for more information.

Another reason to run our own testing is scale. To get through all of the core tests for Drupal 8 in an acceptable amount of time (about 44 mins on average), we run very large testbots. These bots have 2 processors with 8 hardware cores. With hyperthreading, that means we have 32 hardware execution threads—about 88 EC2 compute units. They are not exactly super computers, but they are very performant.

We average nearly 18,000 test runs per month. During our peak usage we spin up as many as 25 testbot machines—though usually we cap at 15 bots to keep costs under control. This helps us plow through our testing needs during sprints at DrupalCons and large camps.

We have explored using an enterprise licensed version of either Github or CircleCI with our own hardware to tackle testing. That same consideration has been given to SauceLabs for front-end testing. Right now, there is not a cost savings to tackle this migration, but that does not rule it out in the future. Testing services continues to evolve.

## Accelerating Drupal 8

In my first months as CTO, I was told repeatedly that the most important thing for us to work on was testing for Drupal 8. In those early days as I built out the team, we were mostly focused on catching up from the Drupal 7 upgrade and tackling technical debt issues that cropped up. In DrupalCon Austin, I had members of my team learn how to maintain the testbot infrastructure so that we could take over the process of spinning up bots and dealing with spikes in demand.

By early 2015, we had optimized the old testbots as much as they were going to be optimized. We moved them to AWS so we could spin up faster machines and more bots, but there were features that were waiting on the new DrupalCI infrastructure that were blocking key development on Drupal 8.

In March of 2015, we invited all the community developers that had helped with DrupalCI to the Drupal Association offices in Portland and sprinted with them to figure out the remaining implementation needs. The next couple of months involved tweaking DrupalCI's architecture and cutting out any nice to have features to get something launched as soon as possible.
It is no coincidence that from the time of DrupalCI's launch until the release of Drupal 8, progress was rapidly accelerated.

I am immensely proud of the work of all the community members and staff that worked directly with core maintainers to unblock Drupal 8 development and make it faster. This work was critical.

Thank you to [jthorson](https://www.drupal.org/u/jthorson), [ricardoamaro](https://www.drupal.org/u/ricardoamaro), [nick_schuch](https://www.drupal.org/u/nick_schuch), [dasrecht](https://www.drupal.org/u/dasrecht), [isntall](https://www.drupal.org/u/isntall), [drumm](https://www.drupal.org/u/drumm), [mikey_p](https://www.drupal.org/u/mikey_p), [mixologic](https://www.drupal.org/u/mixologic), [hestenet](https://www.drupal.org/u/hestenet), [chx](https://www.drupal.org/u/chx), [mile23](https://www.drupal.org/u/mile23), [alexpott](https://www.drupal.org/u/alexpott), [dawehner](https://www.drupal.org/u/dawehner), [Shyamala](https://www.drupal.org/u/Shyamala), and [webchick](https://www.drupal.org/u/webchick). You all made DrupalCI. (And huge apologies to all those I'm undoubtedly leaving out.) Also thank you to anyone who chimed in on IRC or in the issue queues to help us track down bugs and improve the service.

## What's next for testing Drupal

Most of the future state of testing is outlined in the [Drupal.org Testing Policy for DrupalCI](https://www.drupal.org/node/2696421).

Key issues that we still need to solve are related to concurrent testing improvements and new test types to support. While we have PhantomJS integrated with the test runner, there are optimizations that need to happen.

Testing is not an endpoint. Like much of our work, it is an ongoing effort to continuously improve Drupal by providing a tool that improves how we test, what we test, and when we test.
