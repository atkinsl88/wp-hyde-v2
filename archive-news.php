<?php get_header(); ?>

<div class="container">
  <div class="c-title--box">
    <h1 class="h-title--news">More News</h1>
  </div>
</div>

<section class="news--more container">
<?php 
    $row1 = new WP_Query(array(
      'posts_per_page' => 30,
      'post_type' => 'news'
    ));
    while ($row1->have_posts()) {
    $row1->the_post(); 
  ?>
  <div class="c-card--quaternary">
    <div class="c-card--quaternary--text">
      <a href="<?php the_permalink(); ?>"><h3 class="h-title--intro"><?php the_title(); ?></h3></a>
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
  <?php }
  ?>
</section>

<?php get_footer(); ?>