<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width", initial-sclae="1">
  <?php wp_head(); ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-426TVCBWP0"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-426TVCBWP0');
  </script>
</head>

<body <?php body_class(); ?>>

  <section class="g-sidebar">

    <div class="g-sidebar--search">
      <form method="get" action="<?php print site_url(); ?>">
        <input type="text" name="s" placeholder="Search" value="<?php if(isset($_GET['s'])){print $_GET['s'];} ?>">
        <input type="image" src="<?php echo get_theme_file_uri('src/images/magnifying-glass.svg') ?>">
      </form>
    </div>

    <div class="g-sidebar--categories">
      <h4>Categories</h4>
      <div class="g-sidebar--categories--items">
        <a href="/news"><img class="g-sidebar--categories--items--icon" src="<?php echo get_theme_file_uri('src/images/letter-case-capitalize.svg') ?>">News</a>
        <a href="/tutorials"><img class="g-sidebar--categories--items--icon" src="<?php echo get_theme_file_uri('src/images/color-wheel.svg') ?>">Tutorials</a>
      </div>
    </div>

    <div>
      <h4>Tags</h4>
      <div class="g-sidebar--categories--items">
      <?php
        $categories = get_categories();
        foreach($categories as $category) {
          echo '<a class="' . get_cat_name($category->term_id) . '" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
        }
      ?>
      </div>
    </div>

  </section>

  <nav class="container-fluid g-navigation">
    <div class="container g-navigation--container">
      <div class="g-navigation--left">
        <!-- Home button -->
        <?php
          if (is_front_page()) { ?>
            <img class="g-navigation--inactive" src="<?php echo get_theme_file_uri('src/images/home.svg') ?>" title="Home" alt="Home">
          <?php } else { ?>
            <a href="/"><img src="<?php echo get_theme_file_uri('src/images/home.svg') ?>" title="Home" alt="Home"></a>
        <?php } ?> 
        <!-- Back button -->
        <?php
          if (is_front_page()) { ?>
            <img class="g-navigation--inactive" src="<?php echo get_theme_file_uri('src/images/chevron-left.svg') ?>" title="Back" alt="Back">
          <?php } else { ?>
            <a href="#" onclick="history.back(1);"><img src="<?php echo get_theme_file_uri('src/images/chevron-left.svg') ?>" title="Back" alt="Back"></a>
        <?php } ?>
      </div>
      <div class="g-navigation--right">
        <!-- Share dropdown -->
        <?php
          if (get_post_type() === 'news') { ?>
            <div class="dropdown">
              <input type="image" src="<?php echo get_theme_file_uri('src/images/share-2.svg') ?>" onclick="myFunction()" class="dropbtn"></button>
              <div id="myDropdown" class="dropdown-content">
                <div class="share">
                  <a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Facebook">Facebook</a>
                  <a rel="nofollow" href="http://twitter.com/home?status=<?php echo urlencode("Currently reading: "); ?><?php the_permalink(); ?>" title="Share this article with your Twitter followers">Twitter</a>
                  <a rel="nofollow" href="http://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Reddit">Reddit</a>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <img class="g-navigation--inactive" src="<?php echo get_theme_file_uri('src/images/share-2.svg') ?>" title="Share" alt="Share">
        <?php } ?>
        <!-- Help dropdown -->
        <div class="dropdown">
          <input type="image" src="<?php echo get_theme_file_uri('src/images/question-mark-circled.svg') ?>" onclick="myFunction2()" class="dropbtn"></button>
          <div id="myDropdown2" class="dropdown-content">
            <div class="help">
              <a href="/faqs">FAQ's</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </nav>