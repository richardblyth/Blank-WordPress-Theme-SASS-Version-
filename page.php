<?php get_header(); ?>

      <section>
        <div>
        <?php if (have_posts()) :

          while (have_posts()) : the_post(); ?>

          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); 

          wp_link_pages();?>
          </div>

          <?php endwhile; ?>

          <?php else : ?>
          <h1>Oops!</h1>
          <p>Sorry, but you are looking for something that isn't here.</p>

        <?php endif; ?>
        </div>
      </section>

<?php get_footer(); ?>