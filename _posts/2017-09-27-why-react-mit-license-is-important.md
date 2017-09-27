---
layout: post
title: "React's Switch to the MIT License is Important"
comments: true
---

Kudos to Facebook for listening to their community!

Just this past week, Facebook decided to [relicense React, Jest, and Immutable.js](https://code.facebook.com/posts/300798627056246/relicensing-react-jest-flow-and-immutable-js/) to use the MIT license instead of the BSD derivative with troubling patent clauses that was their licensing choice only a few weeks prior.

There were likely a couple of different actions in the open source world that triggered this decision.

First, in August, the Apache Software Foundation categorized the Facebook BSD+Patents license as a Category-X license. Essentially, they were declaring it incompatible with Apache licensing because of the patent clauses.

Second, and probably much more impactful, was the [decision by the Wordpress project to move away from React due to its licensing](https://ma.tt/2017/09/on-react-and-wordpress/). I'm curious to see if that leads to the Wordpress community sticking with React in the Calypso and Guttenberg projects. It would certainly save a lot of rework, but in watching the [Drupal community struggle with the decision to include a javascript framework](https://www.drupal.org/node/2645250), I can imagine that there will still be a strong push for projects like Vue, Preact, or Polymer to get included.

A while back, I published a series of posts on open source licensing. In [part 3 of that series](https://www.phase2technology.com/blog/open-source-licensing-part-3-which-license-should-i-choose/), I tried to direct people to possible licenses for their project. I am particularly keen on MIT.

> I think MIT is the simplest and easiest license in terms of readability. MIT is a copyright statement and 3 paragraphs of simple legal text to allow people to use your code as they see fit so long as they provide some attribute back and do not hold you liable. It is the most used license on Github and is preferred by most Node projects. Technically, "MIT license" is a little ambiguous. For clarity, I’m referring to what some call the "Expat License" because it doesn’t include a trademark statement making it slightly more permissive and allowing it to be as compatible with other licenses as possible.

I still think that the MIT expat license is the most human readable—as opposed to lawyer readable—of the open source licenses. It pretty much just states that people are free to use your code without a lot of fuss about what you plan to do with it or how you distribute it afterwards.

Facebook made a good choice for the communities of developers that use their code—even if that decision may have left their lawyers with concerns about petty litigation. It is heartening to see open source market forces work out for the greater good.
