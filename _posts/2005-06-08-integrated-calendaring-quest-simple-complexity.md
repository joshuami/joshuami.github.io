---
layout: post
title: Integrated calendaring and the quest for simple complexity
---

I would imagine the human factor associated with adopting a centralized calendar—or for that matter a content management system—becomes more complex the larger the institution gets. On the other hand, the larger institution should have more resources and personnel to throw at the issue--though this is not always the case.<!--more-->

As Web Manager for <a href="http://www.pacificu.edu/">Pacific University</a> (approximately 2,500 students), my solution for calendaring is an internally-built application that I call CANS (<a href="http://www.pacificu.edu/cansinfo/">Calendar And News System</a>). As the name implies, it also handles news/articles. It is basically the second time that I've written this app. The first time was for <a href="http://www.cu-portland.edu/">Concordia University - Portland, Oregon</a>.

The first CANS was written with Coldfusion and MS SQL on a couple of Microsoft servers; the second with Coldfusion and MySQL in a Linux environment.

The backend is unimportant—I could have written it in [insert coding language here] and [insert flavor of database here] with similar functionality--the core requirement for implementing CANS is a relational database. (Sorry folks, you can't get away with using an old version of FileMaker.)

What makes the conceptual model worthy of considering is the way that it treats "departments" (functional units of the institution) in relation to "categories" (roughly divided into unique audience groups that would be associated with a specific online resource such as a webpage or email newsletter).

Institutional units are usually quick to latch on to CANS because they see it as a benefit to their unit's website. Some departments have several child categories associated with a parent category allowing them to get specific with the information they want to present.

This doesn't make much sense without an example. Take a look at the <a href="http://www.pacificu.edu/career/">career center at Pacific</a>. The "Career Development Center" is a top level (parent) category with subcategories (children) of "Job Fairs" and "Spotlight on Success". The output code calls up the events (a row in the CALENDAR table) or articles (a row in the NEWS table) for a specific category (a row in the CATEGORY table). Linking tables hold things together (i.e. NEWS2CATEGORY). This makes it possible to link multiple categories to a single event so that it will show up on several pages of the website as appropriate.

For the staff/faculty/students that log into the system (integrated LDAP) and add events, they are presented with the master calendar where they must look at the day associated with their event before they can click the "add" button. (This helps reduce redundancy and scheduling conflicts.) They will then see a simple form with some required fields including a multiple select box that asks "Where do you want this to appear?".

For website visitor, there is no real need to know that any of this is happening. They simply see news and events on that pertain to topic covered by the webpage on which they landed.

The model is inherently expandable. The Concordia version has image upload capabilities and a special interface for athletics to manage their schedule and results with additional fields such as opponent, outcome and final score.

As an application, CANS is far from perfect. (Any software written by a single person—with no less than a degree in English—who is grossly overburdened with other design and development projects can't help but have a few bugs.) However, it has enabled me to get people across campus, both here and at Concordia, to focus on communicating to their audience(s) with timely and useful information.

Incidentally, CANS does not currently integrate with the Pacific's scheduling software—though I do plan to explore this someday. I would love to have the functionality of a tool such as <a href="http://corp.collegenet.com/depts/higher_ed/series/R25/">R25</a>, but it would add another layer of complexity that would be too much for me to take on at this time.

I would also, if I had the time and personnel, like to integrate the application with a full content management system. Anyone who wants to work with me on the model is free to drop me a line.
