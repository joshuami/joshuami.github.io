<?php

declare(strict_types=1);

namespace Drupal\drupal_cms_installer;

use Composer\InstalledVersions;
use Drupal\Core\Recipe\Recipe;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Allows recipes to be written to, and loaded from, serialized cache files.
 *
 * Because the Drupal CMS installer is only meant to be used once, this class
 * implements a write-once, read-once (flash bag) caching strategy. If a recipe
 * is loaded from cache, it is immediately invalidated.
 */
final class RecipeLoader {

  /**
   * Loads a recipe.
   *
   * This will ALWAYS try to read the recipe from the cache. If there is a cache
   * hit, the cached recipe is returned, and the cached data is cleared. If
   * there is a cache miss, the recipe will be loaded normally using
   * `\Drupal\Core\Recipe\Recipe::createFromDirectory()`. The loaded recipe is
   * only written to the cache if $write_cache is TRUE.
   *
   * @param string $path
   *   The path of the recipe to load.
   * @param bool $write_cache
   *   (optional) Whether to cache the loaded recipe. Defaults to FALSE.
   *
   * @return \Drupal\Core\Recipe\Recipe
   */
  public static function load(string $path, bool $write_cache = FALSE): Recipe {
    $cache_dir = __DIR__ . '/../cache';
    $cache_file = $cache_dir . '/' . basename($path);
    $file_system = new Filesystem();

    ['install_path' => $project_root] = InstalledVersions::getRootPackage();

    $recipe = NULL;
    if (file_exists($cache_file)) {
      // The recipe is cached as a single giant serialized object.
      $data = file_get_contents($cache_file);

      $matches = [];
      // Scan the data for serialized strings that start with `%PROJECT_ROOT%`,
      // which is an arbitrary placeholder that we use when we write a recipe to
      // the cache (see the $write_cache logic below).
      preg_match_all('/s:[0-9]+:"(%PROJECT_ROOT%[^\"]+)";/', $data, $matches);
      $matches = array_map('array_unique', $matches);
      assert(count($matches) === 2);
      assert(count($matches[0]) === count($matches[1]));

      // Replace the `%PROJECT_ROOT%` placeholder with the actual project root,
      // and re-serialize the modified string so that will have the correct
      // length (and therefore be readable by unserialize()).
      $matches[1] = str_replace('%PROJECT_ROOT%', realpath($project_root), $matches[1]);
      $matches[1] = array_map('serialize', $matches[1]);
      // Replace the serialized strings that have the `%PROJECT_ROOT%`
      // placeholder with serialized versions that have the placeholder
      // replaced.
      $data = str_replace($matches[0], $matches[1], $data);
      // If unserialization fails, $recipe will be FALSE (which is covered by
      // the empty() check below).
      $recipe = unserialize($data);

      // Immediately invalidate the cache file so that the cache acts like a
      // flash bag (write once, read once). We assume that we are running as
      // the owner of the cache directory and everything in it.
      $file_system->chmod([$cache_dir, $cache_file], 0755);
      $file_system->remove($cache_file);
    }

    // We couldn't load the recipe from cache, so load it normally.
    if (empty($recipe)) {
      $recipe = Recipe::createFromDirectory($path);
    }

    // Cache the recipe if requested.
    if ($write_cache) {
      $file_system->mkdir($cache_dir);

      // Serialize the loaded recipe and write it to the cache, replacing the
      // path to the project root (which can appear in various forms) with the
      // arbitrary `%PROJECT_ROOT%` placeholder (see the loading logic above).
      // This is necessary because Recipe objects contain many immutable strings
      // with absolute path references, which makes them non-portable. We would
      // not need to do this if the recipe system _only_ used relative paths.
      file_put_contents($cache_file, str_replace(
        [
          $project_root,
          realpath($project_root),
        ],
        '%PROJECT_ROOT%',
        serialize($recipe),
      ));
    }

    return $recipe;
  }

}
