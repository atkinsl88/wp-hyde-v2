<?php get_header(); ?>

<div class="container">
  <div class="body--content container">

    <div class="c-title--box">
      <h1 class="h-title--news"><?php the_title(); ?></h1>
      <h1 class="h-title--date"><?php echo get_the_date(); ?></h1> 
    </div>

    <div class="c-hero--container">
      <img src="<?php the_field('news_image')?>" alt="Placeholder">
    </div>
    
    <?php the_content(); ?> 

    <div class="body--content--categories">
      <?php 
        $id = get_the_ID();
        $cats = get_the_category($id);
        $c = 0; $n = 0;
        foreach ( $cats as $cat ):
          $n++; ?>
          <p class="tag" href="<?php echo get_category_link($cat->cat_ID); ?>">
              <?php echo $cat->name; echo ( $n > 0 && $n < $c ? : ''); ?>
          </p>
      <?php endforeach; ?>
    </div> 
    <hr>
    <div class="body--content--author">
      <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
      <div class="body--content--author--meta">
        <p>Author: <?php the_author_meta('nickname', 1); ?></p>
        <p>Posted on: <?php echo get_the_date(); ?></p>
      </div>
    </div>
    <hr>
  </div>
</div>


<section class="news--more container">
  <?php 
    $row5 = new WP_Query(array(
      'posts_per_page' => 6,
      'post_type' => 'news'
    ));
    while ($row5->have_posts()) {
    $row5->the_post(); 
  ?>
  <div class="c-card--quaternary">
    <div class="c-card--quaternary--text">
      <a href="<?php the_permalink(); ?>"><h3 class="h-title--intro"><?php the_title(); ?></h3></a>
      <p class="p-text--date"><?php echo get_the_date(); ?></p>
    </div>
    <div class="c-card--quaternary--img">
      <img src="<?php the_field('news_image')?>" alt="Placeholder">
    </div>
  </div>
  <?php }
  ?>
</section>

<?php get_footer(); ?>