---
layout: post
title: Drupal.org Response to Heartbleed Security Incident
---

[Reposted from Drupal.org](https://www.drupal.org/news/2014-04-08-security-update)

You may have heard that a vulnerability in the OpenSSL cryptographic library called Heartbleed or formally called CVE-2014-0160 has been disclosed and that it represents a potential security threat to a large number of websites. Using this vulnerability, malicious individuals could access sensitive information submitted by people actively visiting a website including usernames, passwords and credit card numbers. Users across the Internet should be especially aware of suspicious activity on their accounts.

We want to communicate a couple pieces of information about this news with regard to Drupal.org. 

Members of the Drupal Association staff, Drupal Security Team and Drupal Infrastructure Team have reviewed Drupal.org's potential exposure to the vulnerability. 

As of now, we have no indication that Drupal.org was attacked using this vulnerabililty. That said, the nature of the vulnerability makes an attack difficult to detect and we prefer to be cautious. 

We have taken steps to protect users of Drupal.org, including a forced password reset for users with administrative access or access to code repositories for projects. While we have only forced the password reset for some users, we recommend that all of our users change their passwords.

We have taken the following steps to protect Drupal.org account holders:
<ul>
  <li>Installed new SSL certificates based on a new private key</li>
  <li>Revoked the old SSL certificates</li>
  <li>Replaced the private strings (drupal_private_key and drupal_hash_salt) which are used for a variety of security related purposes in all Drupal sites</li>
  <li>Replaced the private key used by the “bakery” single-sign-on system on Drupal.org</li>
  <li>Removed all active sessions</li>
  <li>Verified the email addresses in use today match those in use a week ago</li>
  <li><strong>Required that all Drupal.org users with administrative or project repository access to reset their passwords</strong></li>
</ul>

Also, we simply want to help create awareness about the vulnerability and encourage people to review their sites for exposure. For more information, please see https://web.nvd.nist.gov/view/vuln/detail?vulnId=CVE-2014-0160

Feel free to comment on the post with any questions. Thank you! 
