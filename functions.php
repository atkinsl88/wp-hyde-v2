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
     'show_ui' => true,
     'labels'  => [
       'menu_name' => __( 'News', 'your-textdomain' ),
     ],
     'show_in_rest' => true,
     'hierarchical' => true,
     'show_in_graphql' => true,
     'graphql_single_name' => 'new', 
     'graphql_plural_name' => 'news',
     'public' => true,
     'publicly_queryable' => true,
     'has_archive' => true,
     'taxonomies'  => array( 'category' ),
  ] );
} );

// Custom Post Type: Tutorials
add_action( 'init', function() {
  register_post_type( 'tutorials', [
     'show_ui' => true,
     'labels'  => [
       'menu_name' => __( 'Tutorials', 'your-textdomain' ),
     ],
     'show_in_rest' => true,
     'hierarchical' => true,
     'show_in_graphql' => true,
     'graphql_single_name' => 'tutorial', 
     'graphql_plural_name' => 'tutorials',
     'public' => true,
     'publicly_queryable' => true,
     'has_archive' => true,
     'taxonomies'  => array( 'category' ),
  ] );
} );