---
layout: post
title: Drupal.org Migrates Content and File Delivery to Fastly
---

<em><a href="https://www.drupal.org/news/drupalorg-migrates-content-and-file-delivery-to-fastly">Reposted from Drupal.org</a></em>

<img src="https://www.drupal.org/files/fastly-logo_0.png" alt="Fastly logo" class="right" width="250"/>We are so stoked to announce our partnership with <a href="http://fastly.us/1H1mcCF">Fastly</a>. Fastly is now serving up all of our traffic from the *.drupal.org domain Drupal sites and related services.

<h2>Drupal.org is big</h2>
Drupal.org and its services handle over <em>1.5 billion</em> requests per month; this is a massive amount of traffic for an open source project. 

Every time cron runs the update service on your Drupal site, it talks to updates.drupal.org. Every time you download a copy of Drupal or any projects on Drupal.org, you talk to ftp.drupal.org. (We see over 400,000 downloads of Drupal core in a typical month—way more around DrupalCons and major community sprints.)

Each month we have over 15 million unique pageviews on Drupal.org—by over 2 million unique visitors.

All of those stats are about to rise significantly with the launch of Drupal 8. Drupal 7 caused a 30% bump in traffic when it was released and we expect even more with the launch of Drupal 8.

<h2>Fastly is… well… fast</h2>
In 2014, we implemented a CDN (content delivery network) for Drupal.org. The impact was immediate. Everything was faster. We met our initial goal of getting Drupal.org sites and services fronted by a CDN. 

That CDN solution was a good start, and while it lacked features we didn’t know we needed, it improved our ability to deliver Drupal-generated content as well as packaged projects.

Late in 2014, we were introduced to Fastly. They offered us an opportunity to try out the service for ftp.drupal.org and we haven't looked back.

<h3>Varnish for the win!</h3>
You may already use the open source Varnish for your Drupal sites. Varnish is an HTTP accelerator. Drupal.org began using Varnish in 2009 to reduce load on its web servers. It is a powerful cache that likely sits in front of your web origins. Fastly gives us a globally distributed Varnish cache with all of the features we are familiar with.

Fastly hires maintainers of the Varnish project and are helping move it forward. Drupal 8 cache keys are also a straight correllation to Fastly Surrogate Key purging and Fastly's active involvement is another great <a href="https://www.drupal.org/node/2491561">example</a> of Fastly working with an open source community (ours!) to build a better experience.

Yay, open source!

<h3>Open Source Alliance</h3>
Speaking of open source, <a href="http://fastly.us/1LewNVK">Fastly has an open source alliance</a> that provides free content delivery to projects like Debian, the MIT Media Lab, the W3C, Memcached, Linux Foundation, and more. They have even open sourced some of their technology stack to make it easier for others to build systems with their tools. We love partnering with these sorts of organizations.

<h3>Supporting Technology Partner</h3>
Speaking of partnering, Fastly took their partnership a step further and are helping fund a lot of great work on Drupal.org through commitments to sponsor DrupalCons and even the release of Drupal 8. Look for them at upcoming DrupalCons. Thanks Fastly!

<h2>How Fastly Works</h2>
Fastly’s <a href="http://fastly.us/1kv5OAw">Global Network</a> consists of Points of Presence (POPs) running Fastly’s custom Varnish software stack. These POPs are spread around the world in strategic locations close to the highest density Internet Exchange Points, ensuring cached content is just a few milliseconds away.

<img src="https://www.drupal.org/files/fastly_global_delivery_network_pop_map_v25_11.05.15.png" alt="Global network" />

Fastly has a powerful feature that allows us to specify a specific POP as a shield to our origin server. In our case we chose the Seattle POP because of its proximity to our servers at the <a href=”http://osuosl.org”>OSL</a> in Corvallis, Oregon in the United States.

<img src="https://www.drupal.org/files/caching-basics-1st-request-withshielding.png" alt="Caching basics" />

The origin shield configuration means all requests to Drupal.org flow through Fastly’s origin server in Seattle before reaching our Drupal.org origin. If <a href="http://fastly.us/1NvHzsE">Fastly’s origin server</a> in Seattle has already cached the file, no request to our Drupal.org origin is necessary. 

<img src="https://www.drupal.org/files/caching-basics-subsequent-request-withshielding.png" alt="Caching basics, subsequent requests" />

In practice, this allows us to deliver a huge amount of content with an extremely high hit ratio. (See that spike in the GIF below, that's one of those regular times that cron jobs request a ton of content from our updates server. Fastly is just churning along.)

<img src="https://www.drupal.org/files/fastly-updates-performance.gif" alt="Really cool animated GIF showing updates traffic" />

(Fastly made us confident we could put this enormous GIF in our write up.)

<h3>Faster changes, faster response time</h3>
Another advantage to Fastly has been the efficiencies it has given us by allowing us to quickly make changes to how they cache our content. With our previous CDN, changes could take up to 4 hours to propagate through the system. We can now change a Varnish config and reflect those changes in under 5 seconds. That has been a huge help when we need to make a hot fix to production and keep Drupal.org delivering Drupal to the world.

<h3>Logging and improving our usage stats</h3>
Fastly also allows us to <a href="http://fastly.us/1lnEQed">stream our logs</a>. This means we can parse those logs and turn them into data. We are already seeing much more reliable project usage statistics with from our new log processing for updates.drupal.org thanks to Fastly’s log streaming.

More accurate logs mean we can provide users with better data to help them to make better decisions about modules, themes and distributions that have the most installations.

<h2>Next Steps with Fastly</h2>
We have been impressed with Fastly, both for their responsiveness and the performance improvements we have seen while using their services. They have given a ton to our community and we can't wait to see where they take Varnish and their open-source-powered service. If you are interested in using Fastly with your own Drupal sites, you can <a href="https://www.drupal.org/marketplace/fastly">learn more about Fastly</a> on their Drupal.org organization page or sign up for a <a href="http://fastly.us/1iZPKoy">developer account at Fastly.com</a>—there is even a <a href="https://www.drupal.org/project/fastly">Fastly module</a> for Drupal7, and one for Drupal8 is on the way!
