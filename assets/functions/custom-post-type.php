<?php

function peacock_locations() {
  // creating (registering) the custom type
  register_post_type( 'locations', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Locations', 'neurovisiontheme'), /* This is the Title of the Group */
      'singular_name' => __('Location', 'neurovisiontheme'), /* This is the individual type */
      'all_items' => __('All Locations', 'neurovisiontheme'), /* the all items menu item */
      'add_new' => __('Add New Location', 'neurovisiontheme'), /* The add new menu item */
      'add_new_item' => __('Add New Location', 'neurovisiontheme'), /* Add New Display Title */
      'edit' => __( 'Edit', 'neurovisiontheme' ), /* Edit Dialog */
      'edit_item' => __('Edit Location', 'neurovisiontheme'), /* Edit Display Title */
      'new_item' => __('New Location', 'neurovisiontheme'), /* New Display Title */
      'view_item' => __('View Location', 'neurovisiontheme'), /* View Display Title */
      'search_items' => __('Search Locations', 'neurovisiontheme'), /* Search Custom Type Title */
      'not_found' =>  __('Nothing found in the Database.', 'neurovisiontheme'), /* This displays if there are no entries yet */
      'not_found_in_trash' => __('Nothing found in Trash', 'neurovisiontheme'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'public' => false,
      'publicly_queryable' => false,
      'exclude_from_search' => true,
      'show_ui' => true,
      'query_var' => true,
      'show_in_admin_bar' => false,
      'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
      'menu_icon' => 'dashicons-sticky', /* the icon for the custom post type menu */
      'has_archive' => false, /* you can rename the slug here */
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title')
    ) /* end of options */
  ); /* end of register post type */

}


add_action( 'init', 'peacock_locations');

?>
