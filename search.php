<?php get_header(); ?>

<div class="container">
  <div class="c-title--box">
    <h1 class="h-title--news">Search Results</h1>
  </div>
</div>

<section class="search container">
  <?php 
    $term = $_GET['s'];
    $expTerm = explode(" ", $term);
    $search = "(";
    foreach($expTerm as $ek=>$ev) {
      if($ek == 0) {
        $search .= " post_title LIKE '%".$ev."%' ";
      } else {
        $search .= " OR post_title LIKE '%".$ev."%' ";
      }
    }
    $search .= ")";
    $query = $wpdb->get_results(" SELECT * FROM ".$wpdb->prefix. "posts WHERE post_status='publish'");
    foreach($query as $qk=>$qv) {
      $link = get_permalink($qv->ID);
      ?>
        <div class="c-card--quaternary">
          <div class="c-card--quaternary--text">
            <a href="<?php print $link ?>"><h3 class="h-title--intro"><?php print $qv->post_title; ?></h3></a>
            <p class="p-text--date"><?php echo get_the_date(); ?></p>
          </div>
          <div class="c-card--quaternary--img">
            <?php
              if (get_post_type() == 'news') { ?>
                <img src="<?php the_field('news_image')?>" alt="Placeholder">
              <?php } else { ?>
                <img src="<?php the_field('tutorial_image')?>" alt="Placeholder">
            <?php } ?> 
          </div>
        </div>
      <?php
    }
  ?>
</section>

<?php get_footer(); ?>