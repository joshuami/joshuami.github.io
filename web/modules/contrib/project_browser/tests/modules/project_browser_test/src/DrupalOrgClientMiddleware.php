<?php

namespace Drupal\project_browser_test;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\project_browser\Plugin\ProjectBrowserSource\DrupalDotOrgJsonApi;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

// cspell:ignore Bcore Bdevelopment Bfulltext Blimit Bmachine Bmaintenance
// cspell:ignore Bmodule Boffset Boperator Bpath Bproject Bsecurity Bstatus
// cspell:ignore Btaxonomy Btype Bvalue Cfield

/**
 * Middleware to intercept Drupal.org API requests during tests.
 */
class DrupalOrgClientMiddleware {

  /**
   * Json:API Endpoints to fixture mapping.
   *
   * These are the files used and what they contain:
   * - categories.json: List of available categories. Used in all tests.
   * - default_modules.json: List of modules while visiting
   * 'admin/modules/browse' first time. Used in all tests.
   * - 1.json: 'Clear filters' clicked.
   * - 2.json: 'E-commerce' checked in testCategoryFiltering.
   * - 3.json: 'Media' checked in testCategoryFiltering.
   * - 4.json: 'Developer Tools' checked in testCategoryFiltering.
   * - 5.json: First 'Next page' clicked in testPaging.
   * - 6.json: Second 'Next page' clicked in testPaging.
   * - 7.json: 'Accessibility' checked in testPaging.
   * - 8.json: 'E-commerce' checked in testPaging.
   * - 9.json: 'Media' checked in testPaging.
   * - 10.json: Security filter removed in testAdvancedFiltering.
   * - 11.json: Development status active in testAdvancedFiltering.
   * - 12.json: Sort by created in testSortingCriteria.
   * - 13.json: 'th' is searched in testMultiplePlugins.
   * - 14.json: 'E-commerce' is checked in testMultiplePlugins.
   * - 15.json: 'Developer Tools' is checked in testMultiplePlugins.
   *
   * @const array
   */
  const DRUPALORG_JSONAPI_ENDPOINT_TO_FIXTURE_MAP = [
    '/taxonomy_term/module_categories?sort=name&filter%5Bstatus%5D=1&fields%5Btaxonomy_term--module_categories%5D=name' => 'categories.json',
    '/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B0%5D=49125cb6-2f35-451b-922d-3042cb1b4391&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B1%5D=de457d5a-2ce3-45b4-b88b-1c54e5e6d0e2&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B2%5D=fd8b539f-a5e4-4577-9367-f119a252327b&filter%5Bmaintenance_status_uuid%5D%5Boperator%5D=IN&filter%5Bmaintenance_status_uuid%5D%5Bpath%5D=maintenance_status_uuid&filter%5Bsecurity_coverage%5D%5Bvalue%5D%5B0%5D=covered&filter%5Bsecurity_coverage%5D%5Boperator%5D=IN&filter%5Bsecurity_coverage%5D%5Bpath%5D=security_coverage&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage' => 'default_modules.json',
    '/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage' => '1.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=c69d3284-cf3c-4096-8124-33df86771e6f&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B0%5D=49125cb6-2f35-451b-922d-3042cb1b4391&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B1%5D=de457d5a-2ce3-45b4-b88b-1c54e5e6d0e2&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B2%5D=fd8b539f-a5e4-4577-9367-f119a252327b&filter%5Bmaintenance_status_uuid%5D%5Boperator%5D=IN&filter%5Bmaintenance_status_uuid%5D%5Bpath%5D=maintenance_status_uuid&filter%5Bsecurity_coverage%5D%5Bvalue%5D%5B0%5D=covered&filter%5Bsecurity_coverage%5D%5Boperator%5D=IN&filter%5Bsecurity_coverage%5D%5Bpath%5D=security_coverage&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '2.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=aaed2fd3-3ea0-4cbd-969a-66cdfa4255e3&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B1%5D=c69d3284-cf3c-4096-8124-33df86771e6f&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '15.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B0%5D=49125cb6-2f35-451b-922d-3042cb1b4391&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B1%5D=de457d5a-2ce3-45b4-b88b-1c54e5e6d0e2&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B2%5D=fd8b539f-a5e4-4577-9367-f119a252327b&filter%5Bmaintenance_status_uuid%5D%5Boperator%5D=IN&filter%5Bmaintenance_status_uuid%5D%5Bpath%5D=maintenance_status_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '10.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B0%5D=49125cb6-2f35-451b-922d-3042cb1b4391&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B1%5D=de457d5a-2ce3-45b4-b88b-1c54e5e6d0e2&filter%5Bmaintenance_status_uuid%5D%5Bvalue%5D%5B2%5D=fd8b539f-a5e4-4577-9367-f119a252327b&filter%5Bmaintenance_status_uuid%5D%5Boperator%5D=IN&filter%5Bmaintenance_status_uuid%5D%5Bpath%5D=maintenance_status_uuid&filter%5Bdevelopment_status_uuid%5D%5Bvalue%5D%5B0%5D=8042997b-8638-4ed7-992b-ca3581d9df2b&filter%5Bdevelopment_status_uuid%5D%5Bvalue%5D%5B1%5D=55f3e13b-29a9-472b-940a-c8fbd46ebfb5&filter%5Bdevelopment_status_uuid%5D%5Boperator%5D=IN&filter%5Bdevelopment_status_uuid%5D%5Bpath%5D=development_status_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '11.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&sort=-created&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '12.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=12&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '5.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=f70e387f-73be-4523-8af2-a7f7cab8caf6&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '3.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=bafb1104-72cd-4a74-bdcd-3610be685fc5&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '7.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=aaed2fd3-3ea0-4cbd-969a-66cdfa4255e3&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B1%5D=f70e387f-73be-4523-8af2-a7f7cab8caf6&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '4.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=c69d3284-cf3c-4096-8124-33df86771e6f&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '14.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=bafb1104-72cd-4a74-bdcd-3610be685fc5&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B1%5D=c69d3284-cf3c-4096-8124-33df86771e6f&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '8.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=24&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '6.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bfulltext%5D=th&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=aaed2fd3-3ea0-4cbd-969a-66cdfa4255e3&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B1%5D=c69d3284-cf3c-4096-8124-33df86771e6f&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '13.json',
    "/index/project_modules?filter%5Bstatus%5D=1&filter%5Btype%5D=project_module&filter%5Bproject_type%5D=full&page%5Blimit%5D=12&page%5Boffset%5D=0&include=field_supporting_organizations%2Cfield_supporting_organizations.field_supporting_organization%2Cfield_module_categories%2Cfield_maintenance_status%2Cfield_development_status%2Cuid%2Cfield_project_images&filter%5Bcore_semver_minimum%5D%5Boperator%5D=%3C%3D&filter%5Bcore_semver_minimum%5D%5Bpath%5D=core_semver_minimum&filter%5Bcore_semver_maximum%5D%5Boperator%5D=%3E%3D&filter%5Bcore_semver_maximum%5D%5Bpath%5D=core_semver_maximum&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B0%5D=bafb1104-72cd-4a74-bdcd-3610be685fc5&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B1%5D=c69d3284-cf3c-4096-8124-33df86771e6f&filter%5Bmodule_categories_uuid%5D%5Bvalue%5D%5B2%5D=f70e387f-73be-4523-8af2-a7f7cab8caf6&filter%5Bmodule_categories_uuid%5D%5Boperator%5D=IN&filter%5Bmodule_categories_uuid%5D%5Bpath%5D=module_categories_uuid&filter%5Bn_security_coverage%5D%5Bvalue%5D%5B0%5D=revoked&filter%5Bn_security_coverage%5D%5Boperator%5D=NOT%20IN&filter%5Bn_security_coverage%5D%5Bpath%5D=security_coverage" => '9.json',
  ];

  /**
   * Endpoints for non-jsonapi information.
   *
   * @const array
   */
  const DRUPALORG_ENDPOINT_TO_FIXTURE_MAP = [
    '/drupalorg-api/project-browser-filters' => 'project-browser-filters.json',
  ];

  /**
   * Constructor for settings form.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $moduleHandler
   *   The module handler.
   */
  public function __construct(
    private readonly ModuleHandlerInterface $moduleHandler,
  ) {
  }

  /**
   * Invoked method that returns a promise.
   *
   * The `$actual_api_endpoint` represents the endpoint to fetch the JSON data.
   * This is used to generate all the fixtures manually.
   * For each endpoint, the relevant path is generated by removing certain query
   * parameters (e.g., semver filters).
   *
   * The `$relevant_path` is then used as a key to retrieve specific fixture
   * paths from the `$path_to_fixture` array. This path-to-fixture mapping
   * contains pre-generated JSON responses from $actual_api_endpoint, that are
   * used in various test scenarios. These fixture files simulate responses as
   * if they were real-time API results, providing controlled and predictable
   * data to validate functionality.
   */
  public function __invoke() {
    return function ($handler) {
      return function (RequestInterface $request, array $options) use ($handler) {
        $json_response = '';
        // This endpoint, when accessed in a browser, returns the JSON data
        // which is used to generate the fixtures used in
        // ProjectBrowserUiTestJsonApi test.
        $actual_api_endpoint = $request->getUri();
        if (strpos($actual_api_endpoint, DrupalDotOrgJsonApi::JSONAPI_ENDPOINT) !== FALSE) {
          $relevant_path = str_replace(DrupalDotOrgJsonApi::JSONAPI_ENDPOINT, '', $actual_api_endpoint);
          // Remove semver query as it is core version dependent.
          // Processed query will act as relevant path to fixtures.
          $relevant_path = preg_replace('/&filter%5Bcore_semver_minimum%5D%5Bvalue%5D=[0-9]*/', '', $relevant_path);
          $relevant_path = preg_replace('/&filter%5Bcore_semver_maximum%5D%5Bvalue%5D=[0-9]*/', '', $relevant_path);
          $path_to_fixture = self::DRUPALORG_JSONAPI_ENDPOINT_TO_FIXTURE_MAP;
          if (isset($path_to_fixture[$relevant_path])) {
            $module_path = $this->moduleHandler->getModule('project_browser')->getPath();
            $data = file_get_contents($module_path . '/tests/fixtures/drupalorg_jsonapi/' . $path_to_fixture[$relevant_path]);
            $json_response = new Response(200, [], $data);
            return new FulfilledPromise($json_response);
          }

          throw new \Exception('Attempted call to the Drupal.org jsonapi endpoint that is not mocked in middleware: ' . $relevant_path);
        }
        // Other queries to the non-jsonapi endpoints.
        elseif (strpos($request->getUri(), DrupalDotOrgJsonApi::DRUPAL_ORG_ENDPOINT) !== FALSE) {
          $relevant_path = str_replace(DrupalDotOrgJsonApi::DRUPAL_ORG_ENDPOINT, '', $request->getUri());
          $path_to_fixture = self::DRUPALORG_ENDPOINT_TO_FIXTURE_MAP;

          if (isset($path_to_fixture[$relevant_path])) {
            $module_path = $this->moduleHandler->getModule('project_browser')->getPath();
            $data = file_get_contents($module_path . '/tests/fixtures/drupalorg_jsonapi/' . $path_to_fixture[$relevant_path]);
            $json_response = new Response(200, [], $data);
            return new FulfilledPromise($json_response);
          }

          throw new \Exception('Attempted call to the Drupal.org endpoint that is not mocked in middleware: ' . $relevant_path);
        }

        return $handler($request, $options);
      };
    };
  }

}
