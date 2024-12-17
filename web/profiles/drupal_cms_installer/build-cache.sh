#!/usr/bin/env sh

# Boosts the installer's performance by caching the recipes available to it.
# This script is intended for developers, only works on Linux and macOS, and
# requires PHP to support SQLite. Expects to be run in the web root and Drush
# to be present in $PATH.

# Abort this script if any one step fails.
set -e

if [ ! -f index.php ]; then
  echo "This script must be run from the web root."
  exit 1
fi

# Create a backup of `sites.php`. If it doesn't exist, no worries.
cp -f sites/sites.php sites-backup.php | true

# Install Drupal CMS, and all of the recipes available to the installer, writing them
# to the cache.
DRUPAL_CMS_INSTALLER_WRITE_CACHE=1 drush site:install --yes --sites-subdir=installer-cache --db-url=sqlite://localhost/installer-cache.sqlite drupal_cms_installer 'drupal_cms_installer_recipes_form.add_ons=*'

cd sites
# Delete the temporary site directory.
chmod -R +w installer-cache
rm -r -f installer-cache

# `sites.php` might have been altered, so remove it and restore the backup copy.
# If the backup copy doesn't exist, assume it was never created because there was
# no `sites.php` to begin with.
rm -f sites.php
cd ..
mv -f sites-backup.php sites | true

# Delete the SQLite database. We need to do this with `find` to work around a Drupal
# core bug that can cause the database file to live in unexpected locations.
find . -type f -name installer-cache.sqlite -delete
