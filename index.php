<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

      <section class="sample_content">
        <div class="inner">
        <?php if (have_posts()) :

          while (have_posts()) : the_post(); ?>

          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>

          <?php endwhile; ?>

          <?php else : ?>
          <h1>Oops!</h1>
          <p>Sorry, but you are looking for something that isn't here.</p>

        <?php endif; ?>
        </div>
      </section>

<?php get_footer(); ?>