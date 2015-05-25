<?php
/**
 * Template Name: General Page
 * Description: The default page template
 */
get_header(); ?>

      <div class="row">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="small-12 medium-12 large-12 columns">
          <header>
          <?php the_title(); ?>
          </header>
          <?php the_content(); ?>
        </div>
        <?php endwhile; ?>

      <?php else : ?>
        <div class="small-12 medium-12 large-12 columns">
        <h1>Oops!</h1>
        <p>Sorry, but you are looking for something that isn't here.</p>
        </div>
      <?php endif; ?>
      
      </div><!--/row-->

<?php get_footer(); ?>       