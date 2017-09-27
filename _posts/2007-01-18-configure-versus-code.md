---
layout: post
title: Configure versus code
---

I've been running into this conundrum a lot lately. What makes something a configuration task versus a coding (or programming if you like) task?

I've come up with a series of equations that I think explain the issue:

XML == config file
Apache  !=  config file

GUI == configuration task
text file != configuration task

settings == configuration
syntax == programming

praise == configuration
profanity == programming or a really bad UI

So it comes down to this. If you want to produce software for people to use, make it configurable. I'm tired of running into software that has no discernible administrative features--just a giant text file that is titled "config" or something similar.

I recently used Wordpress to help a friend launch a portfolio site. It ended up being the site's CMS (Content Management System). Wordpress is not the best CMS available, but it is a simple solution that has a well-developed configuration model. That is not to say that I didn't end up programming a bit in PHP--I certainly got my hands dirty. About half of what I did in the end was configuration and the other half was coding.
