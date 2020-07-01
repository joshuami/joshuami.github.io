---
layout: post
title: "Launching Portland.gov"
canonical: https://joshuami.com/2020/06/30/launching-portlandgov
description: "On June 16th at 7:30 a.m., we switched the homepage of PortlandOregon.gov over to Portland.gov and officially moved a platform two years in the making out of beta."
comments: true
---
On June 16th at 7:30 a.m., we switched the homepage of PortlandOregon.gov over to Portland.gov. The switch officially moved a platform two years in the making out of beta.

## Easy to find, access, and understand
When I started on this project in January of 2018, I knew this was a huge project. Two years later, the vision for what we wanted to achieve still holds up:

> Portland.gov is a community-focused website where services and information are easy to find, easy to access, and easy to understand.

We took time early in the project to test whether we were hitting these goals through actual user testing. Before the pandemic, this meant moderated tests in some of our public service locations like the development services center, the Revenue Division's payments desk, and at the Water Bureau's customer service center.

The chosen platform is Drupal, an open source content management framework used in ambitious web solutions by companies, governments, and educational institutions around the world.

Drupal's flexibility to create a tailored content model allowed us to focus on the vision.

### Easy to find
We have put a ton of work into search. After choosing Solr as our search engine, we spent quite a bit of time tweaking our index and search pages. We wanted to make sure services and programs that are most relevant will be at the top of our results.

The content model also supports breaking out key information by type so that you can search events, news, advisory groups, or strategic projects. By using facets, the process is similar to a commerce search. Instead of picking a television by brand, size, and features, people will be able to narrow down news from the last year focused on garbage and recycling, or perhaps events by whether it was a public meeting open for testimony.

### Easy to access
Accessibility has been at the front of our work since the start of the project. People should be able to access their government and services regardless of ability or the type of device the need to use.

Mobile-first design is an equity issue. Large file sizes cost community members their data plan to access content. As much as possible, we should keep the content simple and lightweight so that people are not prevented from access.

While not perfect, we have been able to steer content editors in the bureaus to use less PDFs and Word documents and instead focus on creating web pages. Our editor experience essentially forces content creators to make better decisions about their content structure. Content is semantic and easily consumed by screen reader or via keyboard navigation.

### Easy to understand
It has been a huge effort to retrain how people write a government service. There is a tendency in the government to write bureaucratically. We are shifting that to clear, concise, and simple language where possible. Pointing our editors to tools like [Grammarly](https://www.grammarly.com/) and [Hemingwayapp](http://www.hemingwayapp.com/) have let them see just how complex their language has become. These tools give content creators feedback to improve their writing.

We are also planning some pretty impressive translation capabilities later this year. Language alternate content will be available in the City's 10 safe-harbor languages as actual web pages rather than attached PDFs.

## Shifting from a project mindset to a product mindset
With such lofty (but achievable) goals, the migration to the new platform required more than just a migration project mindset. We were really rebuilding both the platform and the content strategy from scratch.

To facilitate that rebuild, we had to rethink the way we planned work and how we trained content editors.

### Planning and execution
The toolset to get work from an idea to reality needed to be the same sort of tools that a start up could use to bootstrap a team to build a product. We use a lot of the tools you would expect, but are rare to find in government:

* [**Jira**](https://www.atlassian.com/software/jira) for story writing, epic tracking, and agile sprint planning
* [**Lando**](https://lando.dev/) for local development run in Docker containers
* [**Github**](https://github.com/) for a code repository and pull-request-based workflow
* [**CircleCI**](https://circleci.com/) to automatically build feature branch sites for automated testing and QA
* [**Pantheon**](https://pantheon.io/) as a Drupal-specific host with its own git workflow and dashboard integrations

These all seem pretty straightforward for organizations that build products, but outside of some limited Github usage, none had been used by the City of Portland before.

Our sprint planning frequency and pace has changed a lot over the course of the project. Early on, we settled into a regular 3-week sprint pattern that worked pretty well. During the pandemic, we shifted to a more frequent, one-week sprint. All sprint lengths have advantages and disadvantages, but it was clear that remote work required more frequent planning and communication—and did not lend itself to the all-day planning session with markers and sticky notes that was a huge boon to our 3-week sprints.

### Training and education

During the course of the migration and platform building project, shifting the way we train from a quarterly new-editor training to ongoing, twice-weekly office hours served two purposes.

First, it gave editors many more opportunities to ask questions about their specific content and the user journeys they were creating. We have tried to have editors shift from just creating random content to creating content with intention that puts thought into where a community member might first start their quest for information:

* noticed a billboard or flyer
* followed a featured post in social media
* directed to the information by a trusted advisor
* received an email from a transactional business system
* subscribed to updates from the bureau or program
* searched for the information on Google the search engine of their choice (I'm excited to see the growth in DuckDuckGo!)
* searched on Portland.gov because they assumed it was a city provided service

Each of these paths have important considerations for how the content is created—especially for search—and for how the content is later shared out. Communication plans are important.

The second advantage of twice-weekly office hours was a chance to hear what features our editors needed to achieve their communication goals. These sessions have led to some of the best features of the new platform—both features for the editors and community members using the site.

## What I would do different

While the migration and new platform have been a success, there were definitely a few growing pains. If I could go back and start this project again, I would have made a few changes to the structure of the project and the team.

If you are undertaking a platform of this scope, I would recommend the following team:

### Product

**Product Manager** leads the prioritization of the features of the platform and acceptance of the user stories at the end of each work sprint. The product manager, through their role of acting as the customer surrogate, is really the decider of what the product should achieve. They should have a clear way to test that the product is meeting the goals. Product managers should also lead the design process.

Content management systems, and the sites built on them, that look good but are hard to use are usually the result of a push for form over function. If you don't meet the basic need of showing the content to the end user in a way they can understand, your platform is not a success. This is another reason to conduct real user testing—both for overall experience and accessibility.

**Content strategists** will help your communications stakeholders understand their audience better. They can often provide critical rewrites that make content simpler as well as insights that lead to better features for editors and end users.

**Product designers** are key. Ideally you want design support that has used Drupal before and understands the platforms strengths and limitations. (See my notes on themers below.) It is also important that the design expectations match the goals of the product and content strategy.

**Quality assurance** can be a dedicated role or an aspect of another role. The best QA teams have tools that make their work something that can be automated. Functional testing and visual regression testing make the work of deploying change to a platform easier—and contribute to the stability as well.

### Technology

A **technical lead** should make sure that every architectural decision meets the organizational goals for security, performance, and stability of the application. A strong technical lead brings balance to the product and ensures that the parts of user experience tied to page load speed and time to first print are considered.

**Developers** it goes without saying that you will always need to customize a content management system to meet the needs of the site. Great Drupal developers know when to write a small custom module versus when to bring in powerful contributed modules for the larger community that are well tested and configurable to the need. If you are replatforming and want to build up an existing team to learn a new technology, build learning time into your overall schedule and expectations.

You will have technical debt when you are two years into a new product development—regardless of team experience—but there will be more if the project is also the first learning experience. While this is an area I thought went well in the Portland.gov process, I also recognize a lot of our technical debt came from learning a new platform at a time when that platform was solidifying. Drupal 8 is a phenomenal open source platform, but I would argue that at the beginning of 2018, it was not yet ready for the ambitious product we were building.

**Themers** are a bit unique to the world of CMS platforms. The best "devsigners" are a little bit artist and a lot developer with a deep knowledge of their chosen platform. When using a tool like Drupal, a good theme can make the difference between whether your team members can use core and contributed modules without having to ask a designer to first tell them what it should look like. The more you override in a theme, the harder it is to ensure that theme will work with new features picked up through contributed development and simple configuration.

### Process

A dedicated **scrum master** can make the difference in whether a team feels harried or content with the workload. They are also critical for unblocking teammates by scheduling all the meetings/trainings/presentations that are needed to keep things moving. Great scrum masters do more than lead the rituals of an agile project; they are the utility player that helps keep everything efficient and moving forward.

### Other roles you may need

Depending on the size of the project and the toolchain supported, you may need a dedicated DevOps engineer. You may need a dedicated analytics specialist to find patterns in your data and help your content strategist make good decisions. There could be times you want to pull in a business analyst to help detail the requirements of an integration on the platform.

Perhaps the most important role to fill in projects of this size is that of content migrators that can manually do tasks that are too complex to automate or require significant rewriting. Under the direction of a good content strategist, a couple of fresh-from-college, or even currently in college, interns can go a long way towards getting a lot of content moved quickly. In fact, this project introduced me to one of the best content migrators I've ever seen. He's a junior... in high school. (How's that for overachieving?)

Another place to look for content migrators is within the organizations migrating. Look for folks with excellent written communication that want to try something new in their career.

Whether they are college interns or professionals with years of experience, they may find they like the work and pivot accordingly. Or they may let you know just how challenging large-scale websites can be and move on to other work with some great new skills and a deeper understanding of web technology. Either is a boon for both the migration and their careers.

## Thoughts after the homepage launch

If you had asked me two and a half years ago whether I thought it would take this long to switchover the homepage, I would have assumed a much shorter timeline. During the course of this particular work, I learned just how impactful centralized leadership is to government projects of this scope. We had bureaus that were nearly completely migrated one year after our initial alpha release of the services directory in November of 2018. We have other bureaus that we had to figure out creative ways to redirect their content back to the old platform for the homepage switch to occur. These bureaus will probably take all of the remainder of 2020 to complete their migrations.

So what was the difference? In one case, a dedicated communications specialist leads their stakeholders through the migration with determination and efficiency by hiring an intern and participating thoroughly with the project team. In some of the lagging migrations, the biggest difference is a lack of dedicated communications personnel that have a focus on digital communications. For others, moving to a new platform was not a priority until it was clear the platform was going to be adopted.

For myself, this work with the City of Portland has been quite an experience. I have met some incredible people that are really passionate about delivering services to the community they serve.

My last few roles have steadily pushed me more and more into strategic management and leadership rather than actual production. This project required that I actually show the work rather than asking folks that have never used a platform to go out and learn from scratch what I know is theoretically possible. I have pushed myself professionally—in many cases learning new skills so I could turn around and teach. That opportunity to learn new skills was invigorating.

So what's next? Most of the remaining migration work will be done by the bureaus, but later this summer we will be launching a new employee intranet as well as turning on translation management features on Portland.gov that will allow editors to create fully-tagged language alternate versions of their content. Also, there are over 1,550 webforms, and the related processes, that will be migrated into new customer service management tools. Finally, at some point, there will be an effort to theme, retire, or retool the 70 or so applications that were literally written into the Coldfusion platform that the custom CMS was built upon.

All this ongoing work furthers the adage that a website is a product, evergreen and part of a lifecycle, rather than a project.
