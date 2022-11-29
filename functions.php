<?php 

function blog_files() {

  wp_enqueue_style('blog_main_styles', get_stylesheet_directory_uri() . '/src/css/style.css', null, 'all');
  wp_enqueue_script('blog_dropdown_scripts', get_template_directory_uri() . '/src/js/dropdown.js', '1', true);
  wp_enqueue_style('google-font-style', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:300,400');

}

add_action('wp_enqueue_scripts', 'blog_files');

// Custom Post Type: News
add_action( 'init', function() {
  register_post_type( 'news', [
     'supports' => array('title', 'editor', 'excerpt'),
     'show_ui' => true, # whether you want the post_type to show in the WP Admin UI. Doesn't affect WPGraphQL Schema.
     'labels'  => [
       //@see https://developer.wordpress.org/themes/functionality/internationalization/
       'menu_name' => __( 'News', 'your-textdomain' ), # The label for the WP Admin. Doesn't affect the WPGraphQL Schema.
     ],
     'show_in_rest' => true,
     'hierarchical' => true, # set to false if you don't want parent/child relationships for the entries
     'show_in_graphql' => true, # Set to false if you want to exclude this type from the GraphQL Schema
     'graphql_single_name' => 'new', 
     'graphql_plural_name' => 'news', # If set to the same name as graphql_single_name, the field name will default to `all${graphql_single_name}`, i.e. `allDocument`.
     'public' => true, # set to false if entries of the post_type should not have public URIs per entry
     'publicly_queryable' => true, # Set to false if entries should only be queryable in WPGraphQL by authenticated requests
  ] );
} );

// Custom Post Type: Tutorials
add_action( 'init', function() {
  register_post_type( 'tutorials', [
     'show_ui' => true, # whether you want the post_type to show in the WP Admin UI. Doesn't affect WPGraphQL Schema.
     'labels'  => [
       //@see https://developer.wordpress.org/themes/functionality/internationalization/
       'menu_name' => __( 'Tutorials', 'your-textdomain' ), # The label for the WP Admin. Doesn't affect the WPGraphQL Schema.
     ],
     'show_in_rest' => true,
     'hierarchical' => true, # set to false if you don't want parent/child relationships for the entries
     'show_in_graphql' => true, # Set to false if you want to exclude this type from the GraphQL Schema
     'graphql_single_name' => 'tutorial', 
     'graphql_plural_name' => 'tutorials', # If set to the same name as graphql_single_name, the field name will default to `all${graphql_single_name}`, i.e. `allDocument`.
     'public' => true, # set to false if entries of the post_type should not have public URIs per entry
     'publicly_queryable' => true, # Set to false if entries should only be queryable in WPGraphQL by authenticated requests
  ] );
} );

// Custom Post Type: News
// function news_post_types()
// {
//   register_post_type('news', array(
//     'supports' => array('title', 'editor', 'excerpt'),
//     'has_archive' => true,
//     'public' => true,
//     'publicly_queryable' => true,
//     'show_in_rest' => true,
//     // 'show_in_graphql' => true,
//     // 'graphql_single_name' => 'news',
//     'labels' => array(
//       'name' => 'News',
//       'add_new_item' => 'Add News',
//       'edit_item' => 'Edit News',
//       'all_items' => 'All News',
//       'singular_name' => 'News'
//     ),
//     'taxonomies' => array('category', 'post_tag'),
//     'menu_icon' => 'dashicons-calendar'
//   ));
// }

// add_action('graphql_init', 'news_post_types');

// Custom Post Type: Tutorials
// function tutorial_post_types()
// {
//   register_post_type('tutorials', array(
//     'supports' => array('title', 'editor', 'excerpt'),
//     'has_archive' => true,
//     'public' => true,
//     'publicly_queryable' => true,
//     'show_in_rest' => true,
//     // 'show_in_graphql' => true,
//     // 'graphql_single_name' => 'tutorials',
//     'labels' => array(
//       'name' => 'Tutorials',
//       'add_new_item' => 'Add Tutorials',
//       'edit_item' => 'Edit Tutorials',
//       'all_items' => 'All Tutorials',
//       'singular_name' => 'Tutorials'
//     ),
//     'taxonomies' => array('category', 'post_tag'),
//     'menu_icon' => 'dashicons-calendar'
//   ));
// }

// add_action('init', 'tutorial_post_types');