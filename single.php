<?php
/* The default template for displaying a single post */
get_header(); ?>

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>     
        
        <header class="sample_header">
          <div class="inner">
            <h1><?php the_title(); ?></h1>
            <aside>
            Posted to: <?php echo get_the_category_list() ?>
            Tagged with: <?php echo the_tags(); ?>
            </aside>
          </div>
        </header>

        <article class="sample_content">
          <div class="inner">
          <?php the_content(); ?>
          </div>
        </article>

        <?php //Comment form 
        comments_template('/partials/comments.php'); ?>

        <?php endwhile; ?>

      <?php else : ?>
        <section class="sample_content">
          <div class="inner">
            <h1>Oops!</h1>
            <p>Sorry, but you are looking for something that isn't here.</p>
          </div>
        </section>
      <?php endif; ?>
      
      

<?php get_footer(); ?>