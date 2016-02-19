---
layout: post
title: My introduction to FIWARE
comments: true
---

Among [my interests and volunteer activities](http://joshuami.com/about), I sit on the City of Portland Technology Oversight Committee. My role in that committee is to give feedback to City of Portland IT leadership on large-scale, high-visibility technology projects. This can range from projects to revamp water billing to systems managing loans and liens in the housing bureau to the attempted rewrite of all of the City's recording and permitting systems. When something goes wrong on one of these big projects, usually a local paper will write about it. Through monthly updates and quarterly public council reports, the TOC gives the City council a dashboard of how these projects are doing based on independent review of major project deliverables. I won't lie, sometimes these reports are boring as hell... but usually there is something about these projects that make them a wee bit exciting to a tech and government geek like me.

I serve on this committee with some great people that are truly committed to making technology in government work. It is nice to know there are others dedicated enough to give an evening a month—and a few hours of prep besides—to make sure the City is being good stewards of our tax dollars.

When one of my fellow members, Wilf Pinfold, invited me to an event to meet members of a FIWARE delegation at the Jaguar Land Rover Accelerator here in Portland, I jumped at the chance. (And yes, they have nice offices... but much less leather and wood paneling than you might expect.) [FIWARE](https://www.fiware.org/) "is an independent open community whose members are committed to materialise the FIWARE mission, that is: 'to build an open sustainable ecosystem around public, royalty-free and implementation-driven software platform standards that will ease the development of new Smart Applications in multiple sectors'." The members of the delegation were connected to Wilf, and his company urban.systems Inc., through relationship with [NIST](http://www.nist.gov/) (the National Institute of Standards and Technology) and their Smart Cities initiative.

I've been a huge proponent for open source and open data in government for years. My role as CTO for the Drupal Association has meant that I've had ample opportunity to meet project leads and influencers from a lot of amazing projects, but I had not come across FIWARE yet. After the introduction, I understand why.

FIWARE has been predominantly a European movement. Of the 75 cities that have signed on to support FIWARE, most of those cities are in Europe. (The notable exception is in Mexico.) The movement has only gained significant traffic in the last year. There are more cities in the Western hemisphere poised to sign on, but there is still some question as to whether this will pick up in the U.S.

So what did I think? Well, that's complicated. I like the idea in principle. Heck, this is what I love about open source. You get a lot of people together in shared economy and drive innovation that benefits everyone. Government should get better. New companies should pop up all around the governments involved to take advantage of new data unleashed on the marketplace.

As for the pitch from the delegation, they need to focus a bit more on the real use cases and less on the marketing materials around their community. To truly grow an open source project quickly, you need only show that it works and delight the developers with new skills that are challenging, rewarding, and ideally give them a career path. Javascript has exploded in the open source world in the past year not because of the promise of one platform to run on both the server and the browser, but because the stuff being made with Angular, Ember, React and more are frankly fun to build. They are new and interesting challenges.

Arguably, the FIWARE stack is not that sexy. It is built out on the principle of solid stack management (Openstack) combined with reusable "enablers" (mostly Python and Java projects combined with predefined containers—usually Docker) that make it _easier_ to snap together an application. (Emphasis is to suggest that is a relative term.) Some of these look like good solid solutions, but they are certainly not best of breed in all cases. That said, I like how they are getting companies to contribute this code back with clear licensing—mostly MIT, Apache2, and GPLv3. I even learned about a license I had not heard of before—the EUPL (European Union Public License). (I have no idea what license compatibility looks like for the EUPL, but I am planning to research it a bit.)

Some of these technologies were clearly added to the catalog in 2009-2012 as the initial FIWARE collaborators where pulling together resources. As a result, much of the catalog is a bit dated-but-maintained. (I can live with that. Drupal seems a bit dated-but-maintained in a few areas.) I couldn't help but spend large portions of the meeting comparing features with what I have seen built with Drupal and other open source projects. Drupal fares extremely well in the government space. There are great shops doing work to get out public data and to publish amazing public service directories. (My time at Multnomah County showed that you can build a lot of government value quickly using a combination of open source and SaaS solutions.)

While the technology in the catalog is not exciting, the demonstrations of the products in action were a bit more impressive.

In Spain, a company that started in a FIWARE incubator is working on an application to allow commuters to pick a destination and get a list of ride share, car share, bike share, and transit options and pick the option that most fits their desired budget, speed, or health concerns. (Biking there will always win the healthy option—but I digress.)

In Portugal, Porto (the Portland of Portugal according to the NYTimes) is collaborating with a local university to blanket the city in environmental sensors that measure air quality, noise levels, temperature and more to help improve livability and give government decision makers better data.

Those were both great uses of the FIWARE platform, but they relied on components (services and data) outside of the platforms.

So the foundational software leaves a little to be desired, but it is a good start. It serves the purpose of speeding time to market for products needed in smart cities, sustainable transport, and logistics.

The commitment to getting demonstrations of product into the hands of government influencers is commendable and an excellent start. I would like to see FIWARE reach out to  open source projects with experience in government to tie in these solutions. Drupal would be a great place to start with our significant number of installations at all levels of government throughout the world.

Another interest that I have in FIWARE is how they are funded. In contrast to the Drupal Association which, as a non-profit, is principally funded by the conferences (DrupalCons) we put on each year and our supporting partner program, is funded mostly by the people that benefit from Drupal. We get very little funding from those that are customers of Drupal the software. FIWARE is funded through a public-private partnership. They have accelerators and will fund entrepreneurs up to €150,000 to build a solution using FIWARE. The practicality of having a government resource that drives the development of open source and open data is a huge velocity builder for the community. I would love to figure out how to repeat this model with other open source projects. Especially projects used so heavily in government already such as Drupal.

FIWARE itself is in the midst of a transition from a public-private partnership with organizations committed to releasing code under a shared interest to a full-fledged open source community. It sounds like they are planning to launch a foundation to fund and support ongoing efforts.

After my introduction to FIWARE, I left with three basic thoughts.

* FIWARE has slick marketing materials for standing in front of decision makers.
* The software solutions often are not as advanced as the latest from popular open source projects.
* Funding matters. To build out ecosystems like FIWARE takes a ton of commitment by business, government, and passionate developers that want to see smarter technologies put in place that improve everyone's quality of life.

I'm excited see what happens next with FIWARE. They have huge barriers to overcome, but their basic principle of using open source to make government better is something I can get behind.
