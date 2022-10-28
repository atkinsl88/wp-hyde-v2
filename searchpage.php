<?php 
/**
 * Template Name: Search Page
 */
?>

<?php get_header(); ?>

<div class="container">
  <div class="c-title--box">
    <h1 class="h-title--news"><?php the_title(); ?></h1>
  </div>
</div>

<div class="container">
  <div class="body--content container">

  <div class="search">
    <div class="search--form">
      <?php get_search_form(); ?> 
    </div>
  </div>


    <?php
      global $query_string;

      $query_args = explode("&", $query_string);
      $search_query = array();

      foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = $query_split[1];
      } // foreach

      $search = new WP_Query($search_query);
    ?>

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>

  </div>
</div>

<?php get_footer(); ?>