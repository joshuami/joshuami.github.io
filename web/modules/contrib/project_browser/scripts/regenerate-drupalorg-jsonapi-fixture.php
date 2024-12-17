<?php

/**
 * @file
 * Script to regenerate test fixtures.
 */

require_once __DIR__ . '/../tests/modules/project_browser_test/src/DrupalOrgClientMiddleware.php';

use Drupal\project_browser_test\DrupalOrgClientMiddleware;

/**
 * Generate the fixtures requested.
 *
 * @param array $map
 *   Map of path and destination file.
 * @param string $endpoint_base_url
 *   Base URL of the endpoint.
 * @param string $destination_folder
 *   Destination folder.
 */
function generate_fixtures($map, $endpoint_base_url, $destination_folder) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Curl.ProjectBrowser');

  foreach ($map as $jsonapi_path => $fixture_file_name) {
    // Wait between requests as otherwise they could be blocked.
    sleep(1);
    curl_setopt($ch, CURLOPT_URL, $endpoint_base_url . $jsonapi_path);
    $contents = curl_exec($ch);
    if ($contents) {
      file_put_contents($destination_folder . $fixture_file_name, $contents);
    }
  }
  curl_close($ch);
}

// Begin script.
$destination_folder = __DIR__ . '/../tests/fixtures/drupalorg_jsonapi/';

// Make sure the folder exists.
if (!is_dir($destination_folder)) {
  mkdir(rtrim($destination_folder, '/'));
}

// Generate the fixtures for both the json:api and non json:api paths.
generate_fixtures(DrupalOrgClientMiddleware::DRUPALORG_JSONAPI_ENDPOINT_TO_FIXTURE_MAP, 'https://www.drupal.org/jsonapi', $destination_folder);
generate_fixtures(DrupalOrgClientMiddleware::DRUPALORG_ENDPOINT_TO_FIXTURE_MAP, 'https://www.drupal.org', $destination_folder);
