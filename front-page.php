<?php get_header(); ?>

<section class="title--wrapper">
  <div class="container">
    <div class="c-title--box">
      <h1 class="h-title--news">News</h1>
      <h1 class="h-title--date"><?php echo date("j F Y"); ?></h1>
    </div>
  </div>
</section>

<section class="news">
  <section class="news--featured">
    <div class="container">
      <?php
        $blogPost001 = new WP_Query(array(
          'post_type' => 'news',
          'posts_per_page' => 1,
        ));
        while($blogPost001->have_posts()) {
        $blogPost001->the_post();
      ?>
      <div class="col c-card--primary">
        <div class="c-card--primary--img">
          <img src="<?php the_field('news_image')?>" alt="Placeholder">
        </div>
        <div class="c-card--primary--text">
          <div class="c-card--primary--text--display">
            <a href="<?php the_permalink(); ?>"><h2 class="h-title--intro"><?php the_title(); ?></h2></a>
            <p class="p-text--excerpt"><?php the_excerpt(); ?></p>
          </div>
          <div>
            <p class="p-text--date"><?php echo get_the_date(); ?></p>
          </div>
        </div>
      </div>
      <?php } echo paginate_links(); ?>
    </div>
  </section>
  <section class="news--secondary container">
    <?php 
      $row2 = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'news',
        'offset' => 1
      ));
      while ($row2->have_posts()) {
      $row2->the_post(); 
    ?>
    <div class="col c-card--secondary">
      <div class="c-card--secondary--img">
        <img src="<?php the_field('news_image')?>" alt="Placeholder">
      </div>
      <div class="c-card--secondary--text">
        <a href="<?php the_permalink(); ?>"><h2 class="h-title--intro"><?php the_title(); ?></h2></a>
        <p class="p-text--date"><?php echo get_the_date(); ?></p>
      </div>
    </div>
    <?php } ?>
  </section>
  <section class="news--tertiary container">
    <?php 
      $row3 = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'news',
        'offset' => 4
      ));
      while ($row3->have_posts()) {
      $row3->the_post(); 
    ?>
    <div class="col c-card--tertiary">
      <div class="c-card--tertiary--text">
        <a href="<?php the_permalink(); ?>"><h3 class="h-title--intro"><?php the_title(); ?></h3></a>
        <p class="p-text--date"><?php echo get_the_date(); ?></p>
      </div>
      <div class="c-card--tertiary--img">
        <img src="<?php the_field('news_image')?>" alt="Placeholder">
      </div>
    </div>
    <?php }
    ?>
  </section>
  <section class="news news--cta">
    <div class="container">
      <a href="/news">Read more News</a>
    </div>
  </section>
</section>


<section class="tutorials container-fluid">
  <div class="container">
    <h2>Tutorials</h2>
  </div>
  <div class="tutorials--secondary container">
    <?php 
      $row4 = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'tutorials',
      ));
      while ($row4->have_posts()) {
      $row4->the_post(); 
    ?>
    <div class="col c-card--secondary">
      <div class="c-card--secondary--img">
        <img src="<?php the_field('tutorial_image')?>" alt="Placeholder">
      </div>
      <div class="c-card--secondary--text">
        <a href="<?php the_permalink(); ?>"><h2 class="h-title--intro"><?php the_title(); ?></h2></a>
        <p class="p-text--date"><?php echo get_the_date(); ?></p>
      </div>
    </div>
    <?php }
    ?>
  </div>
  <div class="tutorials--tertiary container">
    <?php 
      $row3 = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'tutorials',
        'offset' => 3
      ));
      while ($row3->have_posts()) {
      $row3->the_post(); 
    ?>
    <div class="col c-card--tertiary">
      <div class="c-card--tertiary--text">
        <a href="<?php the_permalink(); ?>"><h3 class="h-title--intro"><?php the_title(); ?></h3></a>
        <p class="p-text--date"><?php echo get_the_date(); ?></p>
      </div>
      <div class="c-card--tertiary--img">
        <img src="<?php the_field('tutorial_image')?>" alt="Placeholder">
      </div>
    </div>
    <?php }
    ?>
  </div>
  <section class="news news--cta">
    <div class="container">
      <a href="/tutorials">Read more Tutorials</a>
    </div>
</section>
</section>

<section class="news container">
  <h2>More</h2>
</section>


<section class="more container">
  <?php 
    $row5 = new WP_Query(array(
      'post_type' => array('news', 'tutorials'),
      'offset' => 14
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