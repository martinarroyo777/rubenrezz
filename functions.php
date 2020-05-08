<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'blossom-coach-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

/**
 * Simple helper function for make menu item objects
 *
 * @param $title      - menu item title
 * @param $url        - menu item url
 * @param $order      - where the item should appear in the menu
 * @param int $parent - the item's parent item
 * @return \stdClass
 */
function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
  $item = new stdClass();
  $item->ID = 1000000 + $order + parent;
  $item->db_id = $item->ID;
  $item->title = $title;
  $item->url = $url;
  $item->menu_order = $order;
  $item->menu_item_parent = $parent;
  $item->type = '';
  $item->object = '';
  $item->object_id = '';
  $item->classes = array();
  $item->target = '';
  $item->attr_title = '';
  $item->description = '';
  $item->xfn = '';
  $item->status = '';
  return $item;
}
