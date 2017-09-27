---
layout: post
title: A guide to issue credits and the Drupal.org marketplace
---

<em><a href="https://www.drupal.org/news/guide-to-issue-credits-and-marketplace">Republished from Drupal.org</a></em>

<p>There’s been a lot of positive feedback and a few questions about the recent changes to the marketplace. I want to take a minute and talk about how the marketplace made it to where it is now and mention some plans for the future of the marketplace on Drupal.org.</p>
<h2>TL;DR</h2>
<p>This is a long post. You may not way to read the whole thing, so here is a condensed version.</p>
<p>We want to highlight individuals and organizations that are actively contributing to Drupal. You can now attribute your work in the Drupal.org issue queues to your employer or a customer. Maintainers can award issues credits to people who help resolve issues with code, comments, design, and more. These credits can roll up to service providers listed in the Drupal Marketplace. (And eventually we want to show customers with credits as well.)</p>
<p>Want to know all the details? Read on.</p>
<h2>A little history</h2>
<p>Back at DrupalCon Austin (2014), Dries presented a sketch of an idea for highlighting organizational contributions to Drupal to myself and several business owners in the Drupal community. Later that week, those initial ideas turned into <a href="http://buytaert.net/a-method-for-giving-credit-to-organizations-that-contribute-code-to-open-source" rel="nofollow">A method for giving credit to organizations that contribute code to Open Source</a>. </p>
<p>The idea was to use commit messages to highlight organizational contribution. The first draft looked something like this:</p>
<p><code>$ git commit -am "Issue #n by INDIVIDUAL@AGENCY*CUSTOMER: message."</code></p>
<p>It was simple and intended to be parsable from our Git logs. However, contribution is about more than just code—and while code contributions are a good place to start, we also needed to ensure that tools for providing attribution and credit would be extensible to non-code contributions as well.</p>
<p>That initial conversation turned into <a href="https://www.drupal.org/node/2288727" rel="nofollow">an issue</a> that spawned lots of child issues and ideas for how best to collect data that allowed a user on Drupal.org to attribute their work to an organization.</p>
<p>The resulting conversations didn’t have a simple solution, but the participation in these issues was lively and full of great ideas. <a href="https://www.drupal.org/node/2323715" rel="nofollow">Determining the format for commit credit</a> is still an active issue.</p>
<p>A commit credit format alone was not going to get the information onto Drupal.org. Eventually, we settled on a couple of different solutions for tracking organization involvement and pulled all of this together into the current state of the Drupal.org Marketplace.</p>
<h2>Organizations that support modules, themes, and distributions</h2>
<p>First, we added a feature to projects on Drupal.org (modules, themes, distributions) that allowed <a href="https://www.drupal.org/node/2267789" rel="nofollow">maintainers to reference organizations that were supporting a module</a>—either by providing time to their developers to give back or by directly funding development.</p>
<p><img src="https://www.drupal.org/files/supporting-organizations-field.jpg" alt="Supporting organizations field" /></p>
<h2>Commit credit user interface</h2>
<p>The next part of the work was <a rel="nofollow">giving maintainers a better way to create their commit message</a> related to a particular issue. A lot of the complexity of deciding who should get credit for work on Drupal.org was simplified into a UI that showed how many people had participated in an issue, how much each person had participated, and whether that person had uploaded files related to the issue. The UI also generated the Git command that would properly tie the resulting code changes to the issue and people involved. The result for a relatively large issue thread looks like the image below:</p>
<p><img src="https://www.drupal.org/files/issues/Screen%20Shot%202014-10-30%20at%201.48.36%20PM.png" alt="Commit credit UI" /></p>
<h2>Attribution</h2>
<p>While that effort made it a lot easier to create commit credits, it didn’t solve the problem of attributing issues that didn’t result in code change, nor did it allow people to give credit to the organizations that made it possible for them to work on that issue—by giving them time or by paying for the work directly as a customer.</p>
<p>To do that we had to figure out a way to add organization attribution to the work being done on an issue. </p>
<p>Issues and comments are the primary tools for tracking what needs to be built out in Drupal code. This is where we determine the features, report the bugs, plan out the work, and more. Tracking intent at the point of this interaction was the best way for us to cover the widest range of contribution to Drupal core, modules, themes and distributions.</p>
<p>The resulting UI for attributing a comment to an organization is simple and straightforward. </p>
<p><img src="https://www.drupal.org/files/initial-comment-attribution.gif" alt="Attribution UI" /></p>
<p>While the instructions for attributing a contribution are documented, there’s still some confusion about when to attribute a comment to an organization versus a customer.</p>
<h3>Attributions for organizations</h3>
<p>These attributions are to allow a person to attribute their participation in a specific issue to a company that allotted time for them to work on the issue. This is typically an employer that pays that person's salary or wage. This organization must be directly tied to the contributor's user profile on Drupal.org as a current or past employer and the organization must have an organization profile on Drupal.org. (<a href="https://www.drupal.org/node/add/organization" rel="nofollow">Create an organization profile</a>).</p>
<p>When you use this feature, you are highlighting an organization that is contributing code—or other improvements through the issue queues—to the community. </p>
<h3>Attributions for customers</h3>
<p>When you attribute a customer, you are essentially saying that the work was requested by that customer but you are not employed by them. Typically this means one of three possibilities:</p>
<ul><li>The customer organization paid the contributor's employer</li>
<li>The customer organization paid the contributor directly</li>
<li>The contributor was volunteering for the customer organization</li>
</ul><p>You can select any organization as a customer that has an organization profile on Drupal.org. </p>
<p>When you use the customer attribution, you’re highlighting a different way of contributing to the Drupal ecosystem and often showing relationships between organizations to solve a problem.</p>
<h3>Marking a comment with "I'm a volunteer"</h3>
<p>Making it possible to attribute organizations who have supported contribution also helps us to gather data on purely altruistic contributions. We went round and round on this attribution feature, but in the end, we decided to add “I’m a volunteer” as an explicit attribution option in the attribution UI. It’s deliberately not the default. This is because we want to collect the explicit intent of the users making attributions. While we are now collecting this data, we haven’t yet figured out a great way to show this intent on a contributor's profile.</p>
<p>Possible intent on a comment could include:</p>
<ul><li>I contributed on my own time as a volunteer and community member.</li>
<li>On this issue, some of my time was paid for by an employer, but some of my time was my own.</li>
<li>I contributed this work as a volunteer for one or more customer organizations.</li>
</ul><p>The intent of volunteerism is complex, which is why it is hard to add up into neat little data to show on a profile. </p>
<p>Regardless whether they mark "I'm a volunteer" or not, contributors can still be awarded issue credit by a maintainer for their work on an issue.</p>
<h2>Attribution versus issue credit versus commit credit, what's the difference?</h2>
<p>Attribution is the first step of the process to award an issue credit. The contributor attributes their work to one or more organizations and/or as a volunteer. The next step doesn't come until the maintainer of the project (Drupal core, module, theme, distribution) gets involved in the process.</p>
<h3>Issue credits</h3>
<p> <a href="https://www.drupal.org/getting-involved/maintainer/grant-issue-credits" rel="nofollow">Project maintainers may grant issue credits</a> for issues opened against their projects. At any time during the life of the issue, a maintainer can update the credit UI to credit any of the users who have participated in the issue. Any organizations or customers attributed by those users will be credited as well. When the issue is closed fixed, those assigned credits will appear on the appropriate user and organization profiles. </p>
<p>Issue credits are more comprehensive than just code. They can include reviews, designs, prototypes, or just really helpful comments. The maintainer choses what they want to credit even if the issue does not have code associated with it in the form of a patch. This is a great way to help highlight contributions to policy and work to keep Drupal.org running well.</p>
<h3>Commit credits</h3>
<p>Maintainers can <a href="https://www.drupal.org/node/52287" rel="nofollow">grant commit credits</a>. A commit credit gets added to the Git commit message that accompanies a commit by a maintainer of a project on Drupal.org (Drupal Core, modules, themes, distributions, etc.). Sites like <a href="http://drupalcores.com/" rel="nofollow">drupalcores.com</a> track this information in the public changelog and use it to highlight contribution numbers based on the number of times a user is mentioned in a commit message.</p>
<p>Commit credits currently can’t be easily tied to organizations, the parsing would be cumbersome and require a lot of precision when maintainers entered the information into Git, which is a big reason why we needed a UI on Drupal.org to help make all the connections and store that information into a database for easy retrieval.</p>
<h2>Showing contributions on Drupal.org</h2>
<p>Right now, there are three ways that contributions show up on Drupal.org: the user profile, the organization profile, and the marketplace. (We have some ideas to expand this that I will detail below.)</p>
<h3>User profiles</h3>
<p>Do you log in to Drupal.org? Great! You have a profile.</p>
<p>On every user profile, we show the total number of issues that a contributor has helped fix in the past 90 days.</p>
<p><img src="https://www.drupal.org/files/issue-credits-on-user-profile.png" /></p>
<p>You can drill into this information and see the specifics. This is a good way to see a facet of how a person is contributing to Drupal. There are other examples on a user's profile that show other ways they are involved.</p>
<h3>Organization profiles</h3>
<p>Any <a href="https://www.drupal.org/node/1887616" rel="nofollow">confirmed user</a> can <a href="https://www.drupal.org/node/add/organization" rel="nofollow">create an organization page</a> on Drupal.org. Organization profiles are currently related to a single user, but we have plans to roll out additional permissions to relate multiple users to an organization.</p>
<p>On the organization profile, we show the number of issues that an organization has contributed to fixing in the last 90 days.</p>
<p><img src="https://www.drupal.org/files/organization-profile-issue-credits.png" /></p>
<p>Organization profiles also show a list of modules that have been supported by that organization, whether that organization is a <a href="https://assoc.drupal.org/membership" rel="nofollow">Drupal Association member</a> or <a href="https://www.drupal.org/supporters" rel="nofollow">Supporting Partner</a>, and additional self-reported information about their involvement in the Drupal community. </p>
<p>We are currently working to automate more methods for collecting data about how organizations are contributing to the community through <a href="https://www.drupal.org/drupalcon" rel="nofollow">DrupalCon</a> and Drupal Camp sponsorships as well as hosting <a href="https://groups.drupal.org/" rel="nofollow">user groups</a> to help support meetups, and giving to <a href="https://www.drupal.org/global-training-days" rel="nofollow">Global Training Day</a> events. The number of case studies associated with an organization is another indicator of how much they use Drupal and how they are helping get others to use Drupal by sharing their success stories.</p>
<h3>Marketplace</h3>
<p>We recently rolled out some <a href="https://www.drupal.org/news/marketplace-updates-to-highlight-contributing-organizations" rel="nofollow">changes to how the Drupal.org Marketplace is ordered</a> in order to better highlight contributing organizations.</p>
<p>Currently, the marketplace is sorted by number of issue credits awarded to an organization in the last 90 days, then whether the organization is a supporter, then by alphabetical order.</p>
<p>Every organization on the marketplace shows counts of its users on Drupal.org, projects (modules, themes, distributions, etc.) supported, issue credits in the last 90 days, and case studies. We also highlight organizations that are funding the ongoing support and development of Drupal.org by being in our <a href="https://www.drupal.org/supporters" rel="nofollow">supporting partner programs</a>.</p>
<h2>Questions we have heard</h2>
<p>While most people have been excited about the changes to the Marketplace, there have been several questions.</p>
<h3>Why is it only Drupal Service providers?</h3>
<p>The marketplace was originally created to highlight Drupal service providers that are active in the Drupal community. </p>
<p>A "Contributing Organizations" list is the next step to expand the types of organizations we highlight. There are community members that are already working to highlight <a href="https://www.drupal.org/node/2580729" rel="nofollow">customers using Drupal that contribute back</a>, <a href="https://www.drupal.org/node/2581235" rel="nofollow">community volunteers</a>, and volunteers that are working for organizations that rely on volunteerism (many camps fall into this category). </p>
<p>These are great ideas. Contributing to those issues is a great way to help us figure out the best way forward. </p>
<h3>What about "x" contribution type?</h3>
<p>Yes, there are many ways that organizations contribute. We are definitely hoping to add in contributions that we can objectively verify. There are so many great things that organizations can do to support Drupal, both the local and worldwide community, and Drupal.org, including:</p>
<ul><li>Sponsor a DrupalCon</li>
<li>Help plan a DrupalCon</li>
<li>Sponsor, organize, or host a Drupal Camp</li>
<li>Host a Global Training Days event</li>
<li>Host a local user group/meetup</li>
<li>Post a case study of a successful Drupal project</li>
<li>Contribute helpful content to Drupal Planet</li>
</ul><p><a href="https://www.drupal.org/node/2649100" rel="nofollow">There are many other phenomenal ways organizations give back</a>. If you know of one that has objective data that can be added to the algorithm we use to highlight organizations, let us know by <a href="https://www.drupal.org/node/add/project-issue/drupalorg?tags=d.o+profile+improvements" rel="nofollow">creating an issue in theDrupal.org Customizations queue</a>.</p>
<h3>Why is it so hard to create an organization profile?</h3>
<p>We definitely want to improve this process. There are over 650 organization profiles on Drupal.org, so we know that people have figured it out, but it could be much more intuitive. </p>
<p>We have also had a several requests to add permissions to organization profiles so that multiple people can be editors of those profiles and help administer who is allowed to be associated with the organization. Our current method of tying users to organization by using an exact text match is a bit clunky. (If you want your organization to list you as an employee, you must exactly enter the title of the organization as it appears on the organization profile and list that organization as "current".)</p>
<h3>What about more tools for individual contributions?</h3>
<p>We have so many <a href="https://www.drupal.org/node/2649100" rel="nofollow">thoughts on how to improve the way we highlight individuals on their profile</a>. We already show issue credits, documentation edits, commits, and lots of self-reported information. There is a lot of objective data to pull from including DrupalCon attendance, whether they have been a speaker at a DrupalCon, translation strings submitted to localize.drupal.org, Drupal Association membership, modules maintained, and many more. </p>
<p>Engagement with the community involves a lot of factors and we want to highlight as many as possible while still making the user profile useful and relatively succinct.</p>
<h2>Help us make Drupal.org better</h2>
<p>In addition to the questions that have come up above, we want your feedback to keep improving the user experience on Drupal.org and make it easier to hightlight the companies that are doing so much to make Drupal the leading platform for the web and the individuals that provide their expertise and commitment to the community. Drop your ideas into the <a href="https://www.drupal.org/project/issues/drupalorg" rel="nofollow">Drupal.org Customizations queue</a>. </p>
