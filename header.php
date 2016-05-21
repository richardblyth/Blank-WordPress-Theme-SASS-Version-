<?php
// Main header
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title><?php wp_title(); ?></title>

    <!-- Google Analytics to go here -->

    <?php 
    //Facebook Sharing Meta
    if (is_singular('post')) { ?>
    <meta property="og:title" content="<?php the_title(); ?>">
    <meta property="og:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
    <meta property="og:url" content="<?php the_permalink(); ?>">

      <?php if ( has_post_thumbnail() ) { ?>
        <meta property="og:image" content="<?php the_post_thumbnail_url('facebook-share-image'); ?>">
      <?php } else { ?>
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/facebook-share__default.jpg">
      <?php } 
    } ?>

    <?php 
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

    wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header>    
      <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Homepage">Homepage</a>

      <nav class="main-menu">
      <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
      </nav>

      <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <fieldset>
          <label for="search">Search</label>
          <input type="text" name="s" id="search" value="<?php the_search_query(); ?>">
          <input type="submit" name="submit" value="Search">
        </fieldset>
      </form>

    </header>