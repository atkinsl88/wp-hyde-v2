<?php 

function blog_files() {

  wp_enqueue_style('blog_main_styles', get_stylesheet_directory_uri() . '/src/css/style.css', null, 'all');
  wp_enqueue_script('blog_dropdown_scripts', get_template_directory_uri() . '/src/js/dropdown.js', '1', true);
  wp_enqueue_style('google-font-style', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:300,400');

}

add_action('wp_enqueue_scripts', 'blog_files');

// Custom Post Type: News
function news_post_types()
{
  register_post_type('news', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'News',
      'add_new_item' => 'Add News',
      'edit_item' => 'Edit News',
      'all_items' => 'All News',
      'singular_name' => 'News'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_icon' => 'dashicons-calendar'
  ));
}

add_action('init', 'news_post_types');

// Custom Post Type: Tutorials
function tutorial_post_types()
{
  register_post_type('tutorials', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Tutorials',
      'add_new_item' => 'Add Tutorials',
      'edit_item' => 'Edit Tutorials',
      'all_items' => 'All Tutorials',
      'singular_name' => 'Tutorials'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_icon' => 'dashicons-calendar'
  ));
}

add_action('init', 'tutorial_post_types');
