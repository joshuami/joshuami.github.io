---
layout: post
title: Drupal Association CTO - Year 1
---

<em><a href="https://assoc.drupal.org/blog/joshuami/drupal-association-cto-year-1">Reposted from Drupal Association Website</a></em>

<p>My first day as Chief Technology Officer for the Drupal Association was the 31st of March 2014. I like to joke that I started a day before April Fool&#39;s Day on purpose.</p>
<p>As the first CTO for the Drupal Association, I&#39;d like to highlight a few of the lessons I&#39;ve learned and the accomplishments of the Drupal.org Product and Engineering Team over the past year.</p>
<h2>
	Learning</h2>
<p>In my first week... I learned... and learned... and learned. Listening is an important skill for any leader, but it is never more important than when you are picking up the 13-year history of the website you are inheriting as your responsibility.</p>
<p>I have been actively building and managing teams that build with Drupal since the early days of Drupal 6. Even before beginning to use Drupal, I&#39;ve been focused on growing product and engineering teams that build big complex sites. It excited me to get involved with Drupal, doing what I feel I do pretty well, at a whole new level. I felt I knew a lot about the software, but had a relatively shallow experience with the site that powers the community.</p>
<p>In that first week, I learned that I had an amazing team of four&mdash;two of which were new to the team themselves&mdash;to help me learn the ropes. I also learned that they were overworked, more than overbooked, and still recovering from the Drupal.org upgrade to Drupal 7 that occurred in the fall of 2013.</p>
<p><img alt="Drupal.org ecosystem of sites and services" src="https://docs.google.com/drawings/d/1Y7KkP0IgISsN8LuaAnJPKlxUxBe3883_oFS36It82vg/pub?w=954&amp;h=563" style="height: 366px; width: 620px;" /></p>
<p>I learned that Drupal.org is not built solely on Drupal. It is an intricate combination of technologies of which Drupal is only a fraction of that whole. Drupal.org is over 16 websites, CDN services, Git repositories, some Python in interesting places, some Puppet and some Jenkins and so much more. The volunteers that built our infrastructure were&mdash;and continue to be&mdash;amazing. They also have very, very understanding employers.</p>
<p>I learned that the Drupal Association is a phenomenal group of professionals (16 when I started) that are truly committed to our open source community.</p>
<h2>
	Expect the worst, but assume the best</h2>
<p>In my second week, we bled&mdash;not literally, mind you. Heartbleed was my trial by fire. It was an excellent opportunity to meet key infrastructure and security team volunteers. They are an amazing group of professionals.</p>
<p>In that process of securing Drupal.org from a threat that was rocking the Internet, I found the mantra that would come to define how to look at a site the size and scale of Drupal.org. Expect the worst, but assume the best.</p>
<p>Whether it be security, spam, or regressions on deployment, the best way to make sure your site can respond is to expect the worst possible behavior by untrusted users. At the same time, we are an open source community that aspires to be inviting and to grow. We have to assume every new user of Drupal.org is a potential future Drupal contributor that wants to make us better. That is quite the dichotomy to operate within as a team of technologists.</p>
<h2>
	Grow, grow, grow</h2>
<p><img alt="Drupal.org team growth in 2014" src="https://docs.google.com/drawings/d/1_XXRDZhRjOk8R1QKHkcwRrBm6l37m0RKxzORj2ACCYQ/pub?w=960&amp;h=540" style="width: 620px; height: 349px;" /></p>
<p>I mentioned that when I started, I had a team of 4 in an organization of 16. The Drupal.org product and engineering team is now 11.5 members strong&mdash;and the association just hired its 34th employee. That is incredibly rapid growth for a small organization to go through in one year.</p>
<p>Over the past year, we have spent a lot of time setting or norms and forming our culture. As a developing team, we had to pick our tools for communication and project management. We implemented new processes for defining the priority of our work. We established patterns of communication to make sure we regularly involved in the community&mdash;working groups in particular&mdash;in our iterations of getting things done. We have also been an incredibly productive team for one forming so quickly.</p>
<h2>
	Governance, communication and the community</h2>
<p><a href="https://www.drupal.org/governance/drupalorg-working-groups/">Governance for Drupal.org</a> was established in early 2013. When I started, a good portion of my first few months was figuring out how to integrate myself and the team I was building into the working groups.</p>
<p>These working groups had gone through a couple of years worth of ideation processes and had a strong communication focus with their work. What the working groups did not have was enough sustained volunteer contribution and support to build the tools they were identifying as a need. Additionally, they were in a tough place where they had the authority to make decisions, but they didn&#39;t necessarily have a way to make sure those decisions were implemented.</p>
<p>My goal since beginning this work was figuring out a way to get all the cool community ideas implemented faster. A the same time, it is also my role to figure out how to make Drupal.org and the tools and infrastructure our community funds through the Drupal Association sustainable. These tools have to help us grow our community and help increase the skills of the learners in our community that will one day become the experts in our community.</p>
<p>My team&#39;s biggest challenge is continuing to make our ecosystem better as fast as we can while letting the community know where we are focusing our energies and getting the community to get involved when they have the time and interest.</p>
<p>With the guidance of the working groups and the Drupal Association Board, we were able to establish a <a href="https://www.drupal.org/roadmap">strategic roadmap</a> that helps communicate what is coming next for Drupal.org.</p>
<h2>
	Getting things done</h2>
<p>So what have we done in the past year? While growing a team and building new norms and processes, we were able to accomplish quite a lot...</p>
<h3>
	Support for semantic versioning</h3>
<p>We updated Drupal.org processes to support semantic versioning. 8.0.0 here we come! This also means we will be able to have more frequent Drupal releases reducing the time between new versions&mdash;8.1.0, 8.2.0 on deck.</p>
<h3>
	Better infrastructure and deployments</h3>
<p>We improved page load times&mdash;doing this included changes such as CDN-fronting our infrastructure and upgrading hardware that was long overdue for a refresh. The infrastructure is amazing, but there are few volunteers that understand it enough to keep maintained at the level the community needs. We now have dedicated DevOps engineers that are making sure our technology stack is performant and stable.</p>
<p>There are over 400 behavior driven design (BDD) tests that now allow us to more confidently make deployments to Drupal.org.</p>
<p>And we make a lot of deployments to Drupal.org... about 68 a month to just Drupal.org customizations. (About 3 commits per month are volunteers with the balance made by staff.)</p>
<p>When we deploy big stuff (there is a lot of small stuff), we let people know about it. The <a href="https://www.drupal.org/change-notifications">change notification process has a subscription option</a> and we post those notices to our twitter handle at @drupal_infra.</p>
<h3>
	Credit for organizations that contribute</h3>
<p><img alt="Animation of the organization attribution UI." src="https://www.drupal.org/files/issues/comments_0.gif" style="width: 620px; height: 382px;" /></p>
<p>Recently, users were given the ability to <a href="https://www.drupal.org/node/2340363">attribute their comments in the issue queue to the organization</a> that gave them the time to make the contribution (their employer) or paid for the contribution (a customer). That is a huge leap for our community. It is going to give us a path to tracking how Drupal core, contributed modules and themes are made possible by the awesome organizations that are using Drupal.</p>
<p>There is an excellent UI for maintainers to give credit to the users can commit, and we are expanding this to allow that credit to extend to the organizations involved.</p>
<h3>
	Improved account creation and new user experience</h3>
<p>We have done a huge amount of work making creating a new account easier for users&mdash;and harder for spammers. We made it much easier for a user to create their Drupal.org profile from a subsite. These were important steps toward better user profiles.</p>
<p>A label now appears beneath the user picture of new users for the first 90 days they are on Drupal.org to help us welcome them and get them involved.</p>
<p>Coming soon, users that have contributed significantly to Druapl.org will get the &quot;community&quot; role on Drupal.org will be able to confirm new users to make it easier for them to post. This will make it easier for sprint organizers to help us engage with new users</p>
<h3>
	User profiles are getting better</h3>
<p>User profile pictures have been implemented&mdash;which seems small, but it has a big impact in a comment thread. You now have a decent URL to hand out for your Drupal.org profile (e.g. <a href="https://www.drupal.org/u/joshuami">drupal.org/u/joshuami</a>). Mentor fields also show the pictures of mentors. We made it easier for us to synchronize data between Drupal.org subsites.</p>
<p>By moving our crediting system to issue comments&mdash;rather than just commits&mdash;we are expanding what the definition of &quot;contribution&quot; is for our community.</p>
<p>With better data about our contributors, we&#39;ll be able to better highlight how people are involved.</p>
<h3>
	Launch of Drupal Jobs</h3>
<p>In August of 2014, we launched <a href="https://jobs.drupal.org">Drupal Jobs</a> to help connect Drupal employers with job seekers. It continues to grow and we are now up to over 1,000 job seekers. We average over 200 open positions per month on Drupal Jobs.</p>
<h3>
	Responsive updates to Bluecheese (Drupal.org&#39;s theme)</h3>
<p>As a special New Year&#39;s present to the awesome volunteers that helped add responsive elements to our theme, our team merged those changes to the Bluecheese theme making Drupal.org much easier to use on mobile devices.</p>
<h3>
	Launching and maintaining 3 Drupal Cons sites and the new Drupal Events</h3>
<p><a href="https://austin2014.drupal.org">DrupalCons Austin</a>, <a href="https://amsterdam2015.drupal.org">Amsterdam</a> and <a href="https://latinamerica2015.drupal.org">Latin America</a> all had sites built on Drupal to launch, maintain and archive. <a href="https://losangeles2016.drupal.org">DrupalCon Los Angeles</a> is the first site on our new <a href="https://events.drupal.org">Drupal Events</a> platform that is totally changing the way we approach our ticket and registration process. Also, this site will allow us to maintain a single living archive of all Con session presentations and profile data.</p>
<h3>
	User research</h3>
<p><img alt="Dreyfus Model of Acquisition modified to Drupal.org user personas" src="https://docs.google.com/drawings/d/1UaeHwz3mfbLRQrQNCRnFG_s-kTX_gYGyBehYu7VT5c4/pub?w=960&amp;h=540" style="width: 620px; height: 349px;" /></p>
<p>Starting at DrupalCon Austin, working with user research coach Whitney Hess, the team interviewed more than 30 community members of all types. That research was turned into the research that made up our skills acquisition model for our new personas.</p>
<h3>
	Content strategy</h3>
<p>Forum One was selected to help us build out a new content model, site map and governance plan for Drupal.org.</p>
<h2>
	Next steps</h2>
<p>The summary above does not come close to covering all of the great work. The Drupal.org product and engineering team has an awesome roadmap planned for the coming months.</p>
<ul>
	<li>
		More profile improvements for users and organizations</li>
	<li>
		New content model and governance from the content strategy work</li>
	<li>
		Drupal.org style guide and design system</li>
	<li>
		DrupalCI - next version of continuous integration testing for Drupal.org</li>
	<li>
		Issue workflow improvements to make contributing and maintaining easier</li>
	<li>
		Better search and discovery</li>
	<li>
		Improved data to help find and select modules, themes and distrobutions</li>
	<li>
		Updates to Drupal Groups (groups.drupal.org) and Drupal Translations (localize.drupal.org)</li>
</ul>
<h2>
	Thank you</h2>
<p>To the supporting partners that made all of this work possible, thank you. To the community volunteers that gave of their time to contribute code and ideas and feedback, thank you.</p>
<p>One last thank you, I feel absolutely blessed to work with such an awesome team of designers and developers, a project manager, a product manager and some incredible working group members.</p>
<p>I cannot wait to see what the next year brings.</p>
