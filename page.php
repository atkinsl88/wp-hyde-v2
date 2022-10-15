<?php get_header(); ?>

<div class="container">
  <div class="c-title--box">
    <h1 class="h-title--news"><?php the_title(); ?></h1>
    <h1 class="h-title--date"><?php echo get_the_date(); ?></h1>
  </div>
</div>

<div class="container">
  <div class="body--content container">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>