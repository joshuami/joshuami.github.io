<?php
// phpcs:ignoreFile
/**
 * @file
 * A database agnostic dump for testing purposes.
 *
 * This file was generated by the Drupal 9.2.6 db-tools.php script.
 */

use Drupal\Core\Database\Database;

$connection = Database::getConnection();

$connection->schema()->createTable('system', array(
  'fields' => array(
    'filename' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'name' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'type' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '12',
      'default' => '',
    ),
    'owner' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'status' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'bootstrap' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'schema_version' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'small',
      'default' => '-1',
    ),
    'weight' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'info' => array(
      'type' => 'blob',
      'not null' => FALSE,
      'size' => 'normal',
    ),
  ),
  'primary key' => array(
    'filename',
  ),
  'indexes' => array(
    'system_list' => array(
      'status',
      'bootstrap',
      'type',
      'weight',
      'name',
    ),
    'type_name' => array(
      'type',
      'name',
    ),
  ),
  'mysql_character_set' => 'utf8mb3',
));

$connection->insert('system')
->fields(array(
  'filename',
  'name',
  'type',
  'owner',
  'status',
  'bootstrap',
  'schema_version',
  'weight',
  'info',
))
->values(array(
  'filename' => 'modules/comment/comment.module',
  'name' => 'comment',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7009',
  'weight' => '0',
  'info' => 'a:14:{s:4:"name";s:7:"Comment";s:11:"description";s:57:"Allows users to comment on and discuss published content.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:12:"dependencies";a:1:{i:0;s:4:"text";}s:5:"files";a:2:{i:0;s:14:"comment.module";i:1;s:12:"comment.test";}s:9:"configure";s:21:"admin/content/comment";s:11:"stylesheets";a:1:{s:3:"all";a:1:{s:11:"comment.css";s:27:"modules/comment/comment.css";}}s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'modules/field/field.module',
  'name' => 'field',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7004',
  'weight' => '0',
  'info' => 'a:14:{s:4:"name";s:5:"Field";s:11:"description";s:57:"Field API to add fields to entities like nodes and users.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:5:"files";a:4:{i:0;s:12:"field.module";i:1;s:16:"field.attach.inc";i:2;s:20:"field.info.class.inc";i:3;s:16:"tests/field.test";}s:12:"dependencies";a:1:{i:0;s:17:"field_sql_storage";}s:8:"required";b:1;s:11:"stylesheets";a:1:{s:3:"all";a:1:{s:15:"theme/field.css";s:29:"modules/field/theme/field.css";}}s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'modules/field/modules/field_sql_storage/field_sql_storage.module',
  'name' => 'field_sql_storage',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7002',
  'weight' => '0',
  'info' => 'a:13:{s:4:"name";s:17:"Field SQL storage";s:11:"description";s:37:"Stores field data in an SQL database.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:12:"dependencies";a:1:{i:0;s:5:"field";}s:5:"files";a:1:{i:0;s:22:"field_sql_storage.test";}s:8:"required";b:1;s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'modules/file/file.module',
  'name' => 'file',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '0',
  'weight' => '0',
  'info' => 'a:14:{s:4:"name";s:4:"File";s:11:"description";s:26:"Defines a file field type.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:12:"dependencies";a:1:{i:0;s:5:"field";}s:5:"files";a:1:{i:0;s:15:"tests/file.test";}s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;s:8:"required";b:1;s:11:"explanation";s:73:"Field type(s) in use - see <a href="/admin/reports/fields">Field list</a>";}',
))
->values(array(
  'filename' => 'modules/image/image.module',
  'name' => 'image',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7005',
  'weight' => '0',
  'info' => 'a:15:{s:4:"name";s:5:"Image";s:11:"description";s:34:"Provides image manipulation tools.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:12:"dependencies";a:1:{i:0;s:4:"file";}s:5:"files";a:1:{i:0;s:10:"image.test";}s:9:"configure";s:31:"admin/config/media/image-styles";s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;s:8:"required";b:1;s:11:"explanation";s:73:"Field type(s) in use - see <a href="/admin/reports/fields">Field list</a>";}',
))
->values(array(
  'filename' => 'modules/node/node.module',
  'name' => 'node',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7016',
  'weight' => '0',
  'info' => 'a:15:{s:4:"name";s:4:"Node";s:11:"description";s:66:"Allows content to be submitted to the site and displayed on pages.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:5:"files";a:2:{i:0;s:11:"node.module";i:1;s:9:"node.test";}s:8:"required";b:1;s:9:"configure";s:21:"admin/structure/types";s:11:"stylesheets";a:1:{s:3:"all";a:1:{s:8:"node.css";s:21:"modules/node/node.css";}}s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:12:"dependencies";a:0:{}s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'modules/system/system.module',
  'name' => 'system',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7084',
  'weight' => '0',
  'info' => 'a:14:{s:4:"name";s:6:"System";s:11:"description";s:54:"Handles general site configuration for administrators.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:5:"files";a:6:{i:0;s:19:"system.archiver.inc";i:1;s:15:"system.mail.inc";i:2;s:16:"system.queue.inc";i:3;s:14:"system.tar.inc";i:4;s:18:"system.updater.inc";i:5;s:11:"system.test";}s:8:"required";b:1;s:9:"configure";s:19:"admin/config/system";s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:12:"dependencies";a:0:{}s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'modules/taxonomy/taxonomy.module',
  'name' => 'taxonomy',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7011',
  'weight' => '0',
  'info' => 'a:15:{s:4:"name";s:8:"Taxonomy";s:11:"description";s:38:"Enables the categorization of content.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:12:"dependencies";a:1:{i:0;s:7:"options";}s:5:"files";a:2:{i:0;s:15:"taxonomy.module";i:1;s:13:"taxonomy.test";}s:9:"configure";s:24:"admin/structure/taxonomy";s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;s:8:"required";b:1;s:11:"explanation";s:73:"Field type(s) in use - see <a href="/admin/reports/fields">Field list</a>";}',
))
->values(array(
  'filename' => 'modules/user/user.module',
  'name' => 'user',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7020',
  'weight' => '0',
  'info' => 'a:15:{s:4:"name";s:4:"User";s:11:"description";s:47:"Manages the user registration and login system.";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.87";s:4:"core";s:3:"7.x";s:5:"files";a:2:{i:0;s:11:"user.module";i:1;s:9:"user.test";}s:8:"required";b:1;s:9:"configure";s:19:"admin/config/people";s:11:"stylesheets";a:1:{s:3:"all";a:1:{s:8:"user.css";s:21:"modules/user/user.css";}}s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1642633901";s:5:"mtime";i:1642633901;s:12:"dependencies";a:0:{}s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'sites/all/modules/contrib/file_entity/file_entity.module',
  'name' => 'file_entity',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7227',
  'weight' => '0',
  'info' => 'a:14:{s:4:"name";s:11:"File Entity";s:11:"description";s:58:"Extends Drupal file entities to be fieldable and viewable.";s:7:"package";s:5:"Media";s:4:"core";s:3:"7.x";s:12:"dependencies";a:4:{i:0;s:5:"field";i:1;s:4:"file";i:2;s:6:"ctools";i:3;s:15:"system (>=7.33)";}s:17:"test_dependencies";a:2:{i:0;s:5:"token";i:1;s:5:"views";}s:5:"files";a:15:{i:0;s:42:"views/views_handler_argument_file_type.inc";i:1;s:43:"views/views_handler_field_file_rendered.inc";i:2;s:39:"views/views_handler_field_file_type.inc";i:3;s:40:"views/views_handler_filter_file_type.inc";i:4;s:42:"views/views_handler_filter_schema_type.inc";i:5;s:43:"views/views_handler_field_file_filename.inc";i:6;s:39:"views/views_handler_field_file_link.inc";i:7;s:44:"views/views_handler_field_file_link_edit.inc";i:8;s:46:"views/views_handler_field_file_link_delete.inc";i:9;s:48:"views/views_handler_field_file_link_download.inc";i:10;s:45:"views/views_handler_field_file_link_usage.inc";i:11;s:35:"views/views_plugin_row_file_rss.inc";i:12;s:36:"views/views_plugin_row_file_view.inc";i:13;s:16:"file_entity.test";i:14;s:22:"file_entity_views.test";}s:9:"configure";s:32:"admin/config/media/file-settings";s:7:"version";s:8:"7.x-2.35";s:7:"project";s:11:"file_entity";s:9:"datestamp";s:10:"1639611298";s:5:"mtime";i:1639611298;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'sites/all/modules/contrib/focal_point/focal_point.module',
  'name' => 'focal_point',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7005',
  'weight' => '0',
  'info' => 'a:13:{s:4:"name";s:11:"Focal Point";s:11:"description";s:70:"Users can specify the focal point of an image for use during cropping.";s:4:"core";s:3:"7.x";s:12:"dependencies";a:2:{i:0;s:6:"entity";i:1;s:5:"image";}s:9:"configure";s:30:"admin/config/media/focal_point";s:7:"version";s:7:"7.x-1.2";s:7:"project";s:11:"focal_point";s:9:"datestamp";s:10:"1550008693";s:5:"mtime";i:1550008693;s:7:"package";s:5:"Other";s:3:"php";s:5:"5.2.4";s:5:"files";a:0:{}s:9:"bootstrap";i:0;}',
))
->values(array(
  'filename' => 'sites/all/modules/contrib/media/media.module',
  'name' => 'media',
  'type' => 'module',
  'owner' => '',
  'status' => '1',
  'bootstrap' => '0',
  'schema_version' => '7227',
  'weight' => '0',
  'info' => 'a:14:{s:4:"name";s:5:"Media";s:11:"description";s:27:"Provides the core Media API";s:7:"package";s:5:"Media";s:4:"core";s:3:"7.x";s:12:"dependencies";a:3:{i:0;s:11:"file_entity";i:1;s:5:"image";i:2;s:5:"views";}s:17:"test_dependencies";a:1:{i:0;s:5:"token";}s:5:"files";a:9:{i:0;s:39:"includes/MediaReadOnlyStreamWrapper.inc";i:1;s:40:"includes/MediaBrowserPluginInterface.inc";i:2;s:31:"includes/MediaBrowserPlugin.inc";i:3;s:31:"includes/MediaBrowserUpload.inc";i:4;s:29:"includes/MediaBrowserView.inc";i:5;s:42:"includes/MediaEntityTranslationHandler.inc";i:6;s:53:"includes/media_views_plugin_display_media_browser.inc";i:7;s:51:"includes/media_views_plugin_style_media_browser.inc";i:8;s:16:"tests/media.test";}s:9:"configure";s:26:"admin/config/media/browser";s:7:"version";s:7:"7.x-4.2";s:7:"project";s:5:"media";s:9:"datestamp";s:10:"1617993789";s:5:"mtime";i:1617993789;s:3:"php";s:5:"5.2.4";s:9:"bootstrap";i:0;}',
))
->execute();