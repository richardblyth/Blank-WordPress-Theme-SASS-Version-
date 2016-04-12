<?php
/**
 * Template Name: Example
 * Description: An example template
 */
get_header(); ?>

      <section>
        <div>
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