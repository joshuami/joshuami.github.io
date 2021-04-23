---
layout: post
title: "Agile Development Scrum Terms and Recommendations"
canonical: https://joshuami.com/2021/04/22/agile-development-scrum-terms-and-recommendations
description: "When starting work consulting with a new team, we often find the need to establish common language. On simple projects, I usually walk the team through the terms as part of walking through the toolset."
comments: true
---
When starting a new agile project or product with a new team, I often find the need to establish common language. On simple projects, I usually walk the team through the following terms.

The toolset associated with these terms is usually some combination of Jira with Github/Gitlab/Bitbucket and a CI/CD toolchain that connects to hosting. There are many possible toolsets, but the agile product management process that uses scrum methodology nearly always has the same dictionary of terms.

To facilitate some larger projects, and to try and get down definitions that meet my own needs for large Drupal CMS implementations, I am writing this handy guide to the most used terms that I use in consulting.

Rather than present an alphabetical list, I find it best to start with some of the largest concepts and work them down and then back up again in complexity.

So… where to start?

## Product Roadmap

You are not working solely on a “project” anymore—even if you may call it a project because it has a planned end date and some milestones to get to that state of readiness—note that I didn’t use completeness; most products are never “complete” so long as they are still delivering value.

Once you take on agile methodology to manage your applications, software, or process, you aren’t really working on a strict schedule defined by predecessors and successor tasks as is common in waterfall style project management. That doesn’t mean you can’t project a schedule, but no single task is going to get a start and end date and show up on a gantt chart.

Instead, you are going to break your work into logical pieces related to your product goals, we sometimes call this a roadmap. You are drawing this map as you go. It will change.

## Themes and Epics

Your first level of defining your product roadmap is quite broad. If the product is large enough, you may find that you need to group work that represents deliverable features (**epics**) into larger categories of work based on your goals (**themes**). Not every product roadmap requires themes, but every product roadmap will have epics to help with planning.

If you use themes, you’ll want to keep them broadly-related to the goals of your project. Good examples of themes in large Drupal CMS implementations would include accessibility, mobility, maintenance and devops, and localization (or internationalization if global). While you might use these one-word labels to describe your themes, you should spend some time detailing what success looks like for each.

Epics are the larger features that are related to a theme. Epics themselves are not a deliverable, but they help group the work to achieve a large change to the site. Epics might get target schedules applied to them so that you can show these schedules on a roadmap that looks a little like a gantt chart but is usually more flexible.

## Stories, Tasks, and Bugs

While epics help you group your work to plan, the deliverable work for your team will come in the form of stories, tasks, and bugs. (Some folks call bugs “defects”, but it seems so much more satisfying to squash a virtual bug—and much less karmically intense than squashing a live bug.)

### Stories

A **story** is a discrete set of work that delivers value to your product. Some teams will only use a story to define work that will be delivered as a code change. I am not that picky. To me, a story is anything of value. In addition to code, value could be delivered in the form of documentation, research, analysis, design, or content creation. You will need to set the norms with your team.

Each story should fit into the following criteria that are sometimes abbreviated with the mnemonic I.N.V.E.S.T:
Independent: self-contained in a way that allows the work to be released without depending on another story. (Though you can choose to build upon previous stories that were delivered before you release a larger feature.)

- **Negotiable**: leave room for conversation as the team is working on the story. Don’t write a contract so much as ensure that you have enough guidance to make the work achievable.
- **Valuable**: it’s easy to allow your backlog to grow with stories that don’t represent a lot of value to the end user. Make sure you clean up your backlog and only put work into your work plan (more on that soon) that truly improves the product.
- **Estimable**: you need to be able to put a solid guess for how much effort and time a story will take when you start work on it. There are a couple of exceptions to this I will describe below.
- **Small**: I would actually argue that this is more of an “as small as feasible” requirement. You might find that very small stories make your deployment pipeline slow to a crawl, but large stories can have a similar impact.
- **Testable**: some folks swear by test driven development (TDD). I find that is a bit of overkill for most Drupal CMS projects, but you should know what you intend to test via automated tests and what you need to verify through a quality assurance test from someone on your team. Write this up as acceptance criteria on every story in your sprint. You can modify this test through negotiation—see above—but you need to know that the final thing you deliver is adding the value you hoped to add.

(I’m not a huge fan of mnemonics, but sometimes they are helpful.)

I have a couple of exceptions to this recommendation to make it possible to include work in your roadmap that is hard to estimate.

### Pointing Stories

What is the value of your story? I’ve had teams in the past that joke “points mean prizes”. While I have never actually awarded prizes for “most points completed”,  I really appreciate team members that figure out the ability to estimate how many stories they can take in a given work plan. (I’ll describe sprints below; sprints are iterations of work.)

**Points** are not strictly a time estimate. Ideally, points represent the difficulty of a story and the general size. There are many different pointing approaches that each have their pros and cons.

#### T-Shirt Sizing

Small, medium, large, and extra large can form the basic of defining story complexity. These labels are handy to abbreviate following the standards used by the clothing industry.

#### 1 to 5 (or 1 to 4)

Is it a 1, 2, 3, 4, or 5? This is probably my least favorite. You have to have an extremely high functioning team to agree what each of these numbers really mean. (It would almost be better to not point at all.)

#### Fibonacci Sequence

The best-named pointing scheme by far! The Fibonacci sequence creates a list of numbers based on adding the previous number to the next number: 1, 2, 3, 5, 8, 13, 21. (1+2=3, 2+3=5, 3+5=8, etc.) This is mathematically beautiful pointing! (The nautilus shell grows based on the Fibonacci ratio—so this pointing scheme happens in nature.)

#### Doubling (Closest to Time-based Pointing)

My personal favorite for teams new to pointing stories is a doubling scheme: 1, 2, 4, 8, 16, 32.

Doubling is the closest to time-based pointing. Some would say this is a reason not to use this approach, but everybody can get the idea that a point is roughly an hour. By enforcing doubling, you basically tell your team that hour estimates are not that accurate. You are more accurate with smaller stories and less accurate the more complex they get. 16 doesn’t mean 16 hours, it means the story is probably a couple days of work—give or take. 8 is not a commitment to finishing a story in a day, but it does mean you think the story will take you “about a day”.

My teams limit the use of 32 point stories to *spikes*. What’s a spike? A spike is a story that is really hard to estimate because it involves investigation and analysis. (The lore behind the name spike suggests it was related to mountain climbing and the act of setting a spike to help define your path and anchor you to the parts of the route you already know. That lore might be true—I hope it is.)

You can point spikes that are smaller than 32 points—with the expectation that they are “time-boxed” to less time.

Some teams choose not to point spikes, but personally, I feel that makes it hard to balance your team members’ load of work in a sprint.

Pointed stories are the core of planning your product roadmap, but there are other types of work that will get added to your backlog and into your sprints.

### Tasks

Tasks are quick work that can be completed without a lot of complexity—and usually not much direct value to the product. Each team may choose to use tasks differently. Most teams choose to not point tasks.

### Bugs

Dangit! There’s a bug!

Seriously, bugs happen. When you find a defect in your product that needs to be fixed. Add it to your backlog and prioritize it. Most teams don’t point bugs—similar to spikes, they are extremely difficult to estimate.

## Sprints

So now, you have your themes > epics > stories/tasks/bugs (and your stories are pointed) and you are ready to plan a **sprint**.

I understand why they are called “sprints”—they are a short period of time; they represent a short term goal—though I wish the term was “iteration” or “period”. Constantly “sprinting” is kinda exhausting. Building a great software product is really more of a long-distance sort of run.

That said, sprints are the frequency of your planning and agile rituals. You don’t want to plan for sprints that are too long (a month-long sprint is really the maximum) or too short (less than a week would be kinda insane). I’m a fan of 2 or 3 week sprints, but it really does depend on the team.

Sprints have three types of regular meetings (rituals) that define their cadence: sprint planning, standups, grooming meetings, and sprint retrospectives.

### Sprint Planning

At the start of each sprint, you want to bring the team together to determine the following:

- What is the start and end date of the sprint?
- Who is available for the sprint—and how much? (Plan for time off!)
- What are the goals of the sprint?
What stories, tasks, and bugs should be included from the backlog?
- Who gets what stories as their assignments?
At the end of sprint planning, you should have what amounts to a team contract regarding what you’d like to complete in that period of time.

### Standups

The name **standup** comes from the idea that you shouldn’t sit down for this quick meeting that should ideally last less than 15 minutes. You want to hold a standup everyday that you aren't planning or holding a retrospective—we don’t want to meet so much that we don’t have time to get things done.

In a standup, you are just keeping each other up to date on your progress towards the sprint plan. There are three questions you may answer in your brief daily update:

- What I did yesterday...
- What do I plan to do today…
- What is blocking my work…

I have yet to work with a team that is truly great at the timing of standups. My best attempt at getting a team to stick to the timing involved a 2 minute timer on my phone that would quack if the team member went over time. At least we got to laugh at the time-keeping device.

The most important part of standups is learning the blockers and figuring out a way around those blockers.

### Grooming

Another weird scrum word, **grooming** is the act of making sure your backlog is ready for the next planning session. Every sprint should have some time to work through negotiating the details of your stories to make sure you can point them and put them into an upcoming sprint.

I recommend about an hour per week of sprint dedicated to grooming. If your team velocity allows, you could easily spend up to 3 hours grooming stories for future sprints.

### Sprint Retrospectives

At the end of each sprint, the team should conduct a **retrospective** (AKA "retros") and to talk through the following:

- What went well this sprint? (Celebrations)
- What could have gone better? (Blockers to the plan)
- What are we going to change going forward?

High-functioning teams using scrum for product development will use this time for honest and reflective feedback.

### Demonstrations with Stakeholders

Often tacked on to the end of the retrospective meetings, demos are the key to making sure you are doing the correct work and give your stakeholders a chance to add feedback. Stakeholder feedback should be captured as future epics, stories, tasks, and bugs.

Demonstrations can be a mix of show and tell and usability testing with stakeholders actually trying out the feature while the team watches and takes notes.

## Optional (But Helpful) Rituals

### Planning Retreat

You may find that you need to spend an extended time planning the roadmap with the team on a quarterly basis to build up a longer term roadmap and weed out stories that may never be addressed. Think of these sessions as extended and more intense grooming. You might even meet for 3-4 hours several times over the course of a week to talk through product vision and goals or two break down collected analytics and study of usability test artifacts.

Don’t plan a sprint over the top of these retreats. Use the time as a way to reset and get back to a shared vision. This is especially helpful for larger products that have multiple scrum teams that collaborate on separate components. Getting these teams together to hear presentations from all the teams involved is invaluable in creating a cohesive product.

### Pair Programming

During any given sprint, you may choose to assign a story to more than a single developer to ensure knowledge sharing/skills or to just tackle a particularly difficult problem. Giving team members the freedom to work together rather than in isolation is a great way to foster creativity and a better final product.

## When is the Scrum Project Complete?

Software applications and website platforms tend to go through a software lifecycle that starts with investing in the product then transitioning to more of a sustain and maintain and eventually to deprecate and/or replace.

Scrum is appropriate for organizations investing in their application.
