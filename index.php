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

      <section>
        <div>
        <?php if (have_posts()) :

          while (have_posts()) : the_post(); ?>

          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
          </div>

          <?php endwhile; ?>

          <?php else : ?>
          <h1>Oops!</h1>
          <p>Sorry, but you are looking for something that isn't here.</p>

        <?php endif; ?>
        </div>
      </section>

<?php get_footer(); ?>