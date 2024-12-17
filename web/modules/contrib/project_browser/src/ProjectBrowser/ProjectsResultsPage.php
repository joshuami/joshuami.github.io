<?php

namespace Drupal\project_browser\ProjectBrowser;

use Drupal\Component\Assertion\Inspector;

/**
 * One page of search results from a query.
 */
class ProjectsResultsPage {

  /**
   * Constructor for project browser results page.
   *
   * @param int $totalResults
   *   Total number of results.
   * @param \Drupal\project_browser\ProjectBrowser\Project[] $list
   *   A numerically indexed array of projects.
   * @param string $pluginLabel
   *   The source plugin's label.
   * @param string $pluginId
   *   The source plugin's ID.
   */
  public function __construct(
    public readonly int $totalResults,
    public readonly array $list,
    public readonly string $pluginLabel,
    public readonly string $pluginId,
  ) {
    assert(array_is_list($list));
    assert(Inspector::assertAllObjects($list, Project::class));
  }

}
