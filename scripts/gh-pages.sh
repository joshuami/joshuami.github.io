#!/usr/bin/env bash

set -e

drush cron -l https://joshuami.com
drush tome:static -y -l https://joshuami.com
rm -rf gh-pages
git clone git@github.com:joshuami/joshuami.github.io.git gh-pages
cd gh-pages
git checkout main || git checkout -b main
cd ..
rm -rf gh-pages/*
cp -r html/* gh-pages/
cp CNAME gh-pages/CNAME
cd gh-pages
git add .
git commit -m 'Updating gh-pages site'
git push -u origin main
