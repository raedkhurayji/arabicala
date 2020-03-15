<?php
/**
 * Implements hook_preprocess_page().
 */
function MODULE_preprocess_page(&$variables) {
  $page = menu_get_item();
  if ($page['page_callback'] == 'views_page' && $page['page_arguments'][0] == VIEW_NAME) {
    // Remove breadcrumbs from view arguments.
    // This assumes there's only one breadcrumb to take off the end
    // If there are more you could change the array_slice
    $breadcrumb = drupal_get_breadcrumb();
    $newbreadcrumb = array_slice($breadcrumb, 0, count($breadcrumb)-1);
    drupal_set_breadcrumb($newbreadcrumb);
  }
}
?>