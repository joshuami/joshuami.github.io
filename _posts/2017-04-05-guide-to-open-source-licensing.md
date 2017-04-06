---
layout: post
title: A Layperson's Guide to Open Source Licensing
comments: false
---

This post was republished from a series originally contributed to the [Phase 2 blog](https://www.phase2technology.com/blog-list/):
- [Open Source Licensing Part 1: An Introduction](https://www.phase2technology.com/blog/open-source-licensing-part-1-an-introduction/)
- [Open Source Licensing Part 2: Software Licensing is a Continuum](https://www.phase2technology.com/blog/open-source-licensing-part-2-software-licensing-is-a-continuum/)
- [Open Source Licensing Part 3: Which License Should I Choose?](https://www.phase2technology.com/blog/open-source-licensing-part-3-which-license-should-i-choose/)

I was recently asked to provide some feedback on a couple of projects that Phase2 is planning to release under an open source license. As a company, we definitely have a bias towards using open systems because they give our clients flexibility, cost savings, and transparency. Picking an open source license is complex, but there are reasons for choosing one license over another.

## Disclaimer

The following topic is complicated. I’m offering up my research, but also need to offer up the following disclaimer. I am not a lawyer. I am a technologist. While I have a pretty extensive history in using and participating in open source projects, this work should not be taken as legal advice. That said, I do not think just any lawyer will do to help you decipher your open source licensing needs.

If you are truly interested in the legal ramifications of a software licensing decision you need to make, consult with a lawyer that specializes in copyright, intellectual property, and software law. Further, software licensing and the related laws differ from country to country based on the legal systems present. Make sure your legal advice comes from someone that knows law that covers your type of software. Software licensing for devices, particularly networked devices, differs significantly from web and service software, which will be the focus of this post.

## What is open source?

Open source is a huge concept. At its simplest level, open sourced software has not been compiled. A person can analyze the source code that allows the application to run. Open source does not mean free, though many open source projects are also FOSS (free open source software). It is worth noting that one of the founders of the free software movement, Richard Stallman, would argue that open source "[misses the point](https://www.gnu.org/philosophy/open-source-misses-the-point.html)" of software truly being "free" to use.

The original intent of much of the FOSS movement was to make software free for use and for developers to extend the uses of software. As a movement, it has morphed into legal protections to allow either the developer or the owner of the intellectual property created or the user of the finished software to maintain or release rights to that work. The tool used to accomplish this declaration of rights is a license.

## What is a license and why does it get applied to software?

A software license is an intersection of copyright, patent law, and legal precedents. Since software is essentially written word, in most countries, it falls under copyright law. Most modern copyright law in the United States was established in the Copyright Act of 1976. The STELA Reauthorization Act of 2014 extended the bulk of this law. The recognized power to establish copyright law—and patent law—stems from the constitution itself. (Article 1, section 8)

Perhaps it is because people in the United States are litigious, but the US is where most open source licensing law has been established and tested—albeit tested in limited fashion, which I will get into a little later.

The [scope of copyright](https://www.copyright.gov/title17/92chap1.html) is pretty well established.

> "Copyright protection subsists, in accordance with this title, in original works of authorship fixed in any tangible medium of expression, now known or later developed, from which they can be perceived, reproduced, or otherwise communicated, either directly or with the aid of a machine or device."

Technically, anything original that is written gets the protection of copyright given to the author or authors of that work. This protection extends for the life of the author or authors, plus a default of 70 years. Yes, in a work by more than one author, copyright extends to all the participants equally. This joint "ownership" becomes extremely important in open source licensing.

The license itself is a legal statement by the owner of the copyright to share their intention for that work.

Lest you have any doubt about it, unlicensed software with no mention of copyright leaves that software in the public domain. Everyone can use it and distribute it as they wish—which sounds great—except that a license could still technically be applied to this work at a later time by the author or authors of the work.

Lack of a license leads to a lot of confusion as to what the intent was for a large body of work in distributed code hosting services such as Github. That confusion of intent was an impetus for starting choosealicense.com—a Github project that helps new project creators choose a license and apply it to their project.

If you are releasing software for others to use, please add a license—especially if you intend for others to share in the creation of that software on Github or Gitlab or even a self-hosted versioning repository that others can access.

## Open source licensing is a continuum

![Representation of the open source licensing continuum](public/images/open-source-licensing.png)

On one end of the continuum is public domain. Just to the right of the public domain are permissive licenses like MIT and BSD. The solid middleground of software licensing is protective, the most common of which are the GPL and Apache licenses. Even within the released versions of those licenses, there are important distinctions that put them on a continuum with each other. The GPL is decidedly Copyleft—meaning it has provisions to ensure that people contributing to it license the derivative work as GPL as well.

Just to the right of protective FOSS licenses are freeware or shareware licenses that were wildly popular ways to pass on desktop applications for a time but have faded as other licenses become more common. Proprietary licenses fall solidly on the most conservative edge of the license spectrum. There is no further to go after proprietary than keeping the software a trade secret.

## Where do patents come in?

It gets a little more interesting when you consider what copyright does not protect.

In no case does copyright protection for an original work of authorship extend to any idea, procedure, process, system, method of operation, concept, principle, or discovery, regardless of the form in which it is described, explained, illustrated, or embodied in such work.

That provision is where we get into patent law and the protection of intellectual property. Patents can’t really be applied to just an idea. Patents can only be applied to the description of a tangible object in order to protect that object from creation or distribution by others.
Patents come into play with software when the software is integrated into the object/device/machine being patented. Some licenses have patent clauses that explain contributors rights to use the patent for the purpose of development without giving up the right to protect the final product.

## License compatibility

While challenges to open source license precedent are rare, one area where there has been a ton of review and interpretation is compatibility. The language of a license can naturally lead to a conflict with another license if works are combined into a derivative. Nearly all compatibility concerns have to do with the distribution of the final software derivative.

In general, permissive licenses (MIT, BSD) can be combined into more protective licenses (LGPL, GPL) with the derivative getting licensed as a whole under the more protective free open source software license. There are even licenses especially designed to allow for a derivative that is a combination of proprietary and protective open licensing. The LGPL is a good example of this compromise to help protect business interests while still open sourcing significant libraries used within a larger framework.

A couple of important exceptions to compatibility pattern can be seen in combinations such as Apache2 (a permissive license with wording to protect patent use) and the GPL version 2 (a strongly protective license). These two licenses have conflicting clauses that make them incompatible with each other.

Some of the biggest open source projects (Drupal, Wordpress, Linux) have gotten around this incompatibility by using the GPLv2, but expressly stating that it is okay for the project to be combined with any later version of the GPL for distributions. This is sometimes referred to as GPLv2+ or GPLv2 and later. Do not let the common names for this confuse, those projects are released as GPLv2.

## Why choose a license from 1991?

The second version of the GPL was released in 1991. That is forever ago in technology years. It was one of the first and most important "copyleft" licenses. Copyleft is the protective part of the GPL. It has intentional provisions to force the resulting distribution to be free and open source. That makes it very opinionated.

The GPLv3 was released in 2007—still an eternity—but it was intentionally written to be compatible with software that is GPLv2 or Apache2 that is being combined into a GPLv3 licensed derivative. This sounds great, but as a result of the GPLv3 being fiercely protective and Copyleft, many lawyers and companies are hesitant to introduce this license into derivative works in their software portfolio.

Wordpress and Drupal both predated the Apache2 license (released in 2004), and chose to keep the GPLv2—which was chosen based on the Linux kernel's license of choice. The result is that if you want to host a Drupal module on Drupal.org or a Wordpress plugin on Wordpress.org, you are releasing that module under GPLv2. That means the combined code for the module could include libraries that were licensed under more permissive licenses, such as MIT, but those libraries cannot be either Apache2 or GPLv3 as provisions in those licenses are incompatible. Technically, you could create a derivative of Drupal or Wordpress and some related modules or plugins that were GPLv3, but you would not be able to host them in the repositories those projects host. Complicated, eh?

## What have composer and NPM done for compatibility?

Both NPM (node.js) and Composer (PHP) provide some compatibility checking by allowing projects to clearly identify their license.
Further I would argue, and here is where you should stop trusting me and talk to a lawyer, that a composer.json or package.json requirement does not represent distribution since the code is not packaged into a combined tar or zip. Rather, those files are combined on the server via scripts that request the packages separately assembling the final package. Therefore the final product running on the server would not constitute a derivative since it will not be distributed.

I could be wrong in my interpretation, and I encourage legal feedback, but if project requirements represent "a derivative" that can be "distributed" then much of the open source world is out of compliance with a great many implementations of open source that are defaulting to the most protective license—likely GPLv3.

I work with a lot of free open source software; the value does not come from the code but from the services provided on top of that code.  However, incompatible combinations do leave corporations exposed to possible lawsuits. Consult a lawyer to review your licensing and options if you are concerned.

## Which license should I choose?

There is no easy answer to that question, but I can give some general guidelines that are a little more opinionated that what Github provides with choosealicense.com.

### Want people to use your code? Choose MIT first.

I think MIT is the simplest and easiest license in terms of readability. MIT is a copyright statement and 3 paragraphs of simple legal text to allow people to use your code as they see fit so long as they provide some attribute back and do not hold you liable. It is the most used license on Github and is preferred by most Node projects. Technically, "MIT license" is a little ambiguous. For clarity, I’m referring to what some call the "Expat License" because it doesn’t include a trademark statement making it slightly more permissive and allowing it to be as compatible with other licenses as possible.

### Are you concerned about patents? Consider Apache2.

Apache2 is big in the mobile world because of its patent provisions. If your code is going to run on a device where you think you might need to be concerned about patent infringement or misuse by your developers, then Apache2 is a good solution. Android uses it. Swift uses it. Google and Apple probably knew what they were doing to protect their hardware patents while still encouraging a diverse and active developer ecosystem. The only major catch with the Apache2 license is that the resulting code will not be compatible with GPLv2 code from a derivative distribution standpoint.

### Are you developing a module for Drupal or a plugin for Wordpress? Use GPLv2.

I know what you are thinking. Why would I use the license from 1991 for my shiney new project? The short answer is you have to if you want people to find your code and use it. You could host your project on Github, Gitlab, Bitbucket, etc and choose something different, but your code will be more likely to be used if it is in the project repositories of the parent projects.

You can include libraries in your module or plugin that contain compatible permissive licenses (MIT, BSD), but you cannot include incompatible libraries (Apache2, GPLv3, etc.). If you do, those modules will be removed as not compliant with the terms of service. (As soon as someone realizes it is there… that is a whole other story.)

### What about GPLv3 or LGPLv3 or [insert license name here]? My project wants freedom!

I get it. There are reasons, particularly for using LGPL to allow for compatible licensing with proprietary components, to use these licenses. The glibc (de facto C library for Linux distributions) used to LGPL in order to ensure adoption. The AGPL has some provisions that make it better for networked solutions if you want to ensure that modified versions of your code are shared under the same license. MongoDB for instance is licensed under a combination of the AGPLv3 its server and tools and Apache2 for its drivers—and just to make it even more interesting there is a commercial license option as well for companies that feel the AGPL is too protective for their lawyer’s comfort.

Gnu.org has one of the most [comprehensive lists of licenses and their compatibility with the GPL](https://www.gnu.org/licenses/license-list.html) that I’ve found . It’s a great starting point for research if you are picking a license outside of the options covered in this document.

I am not that opinionated about license options. I prefer to focus on developing the solution and then making sure I can explain the implications in distributing what was created.

Because of its Copyleft provisions, many feel that eventually a lot of software is going to have to be released as GPLv3 to remain compatible. That doesn’t mean it has to start that way if it is not the best choice for your business.

## Software licensing is not content licensing

Guess what! Your content is not covered by the licenses I have covered here. I mean, you could argue that documentation within the code is covered by the software license, but if you built a content management system (CMS… you know Wordpress, Drupal, etc) that content is not covered by the software license. The copyright for that content belongs to the owner. The owner is often defined by the terms of service or end user license agreement for the site or service.

If you want to make your content open, there are great tools. A good starting point is [Creative Commons](https://creativecommons.org/).  Share your work… define how others can use it.

## Make your own license! (Please don’t)

You are probably thinking you could write an even better license than all those lawyers that created the compatibility morass that is stopping your work from being free!

You probably cannot. I am pretty sure you should not try, but hey, I cannot stop you.

Happy sharing.

## Addendum: Resources

- https://www.smashingmagazine.com/2010/03/a-short-guide-to-open-source-and-similar-licenses/
- https://www.copyright.gov/title17/92chap1.html
- https://opensource.org/licenses/MIT
- https://ttmm.io/tech/why-the-mit-license/
- https://www.gnu.org/philosophy/open-source-misses-the-point.html
- http://www.fsf.org/
- https://www.gnu.org/licenses/license-list.html
- https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
- https://www.apache.org/licenses/LICENSE-2.0
- https://www.gnu.org/licenses/licenses.html
- https://en.wikipedia.org/wiki/Software_license
- https://opensource.org/licenses
- https://www.uspto.gov/
- https://www.copyright.gov/
- https://choosealicense.com/
- https://www.gnu.org/licenses/rms-why-gplv3.en.html
- https://www.kernel.org/doc/pending/gplv2-howto.html
- https://www.linux.com/news/gpl-requirement-could-have-chilling-effect-derivative-distros
- https://creativecommons.org/
- http://ben.balter.com/2015/06/03/copyright-notices-for-websites-and-open-source-projects/
