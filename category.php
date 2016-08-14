<?php
/* Category.php - displays all posts in a category */

get_header(); ?>

      <header>
        <div>
        <h1><?php echo single_cat_title(); ?></h1>
        </div>
      </header><!--/row-->

      <section>

      <?php if ( have_posts() ) : ?>

        <div> 

      <?php $count = 0; //set up counter variable
      ?>
        
        <?php while ( have_posts() ) : the_post(); 

        $count++; //increment the variable by 1 each time the loop executes
        ?>
        
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail('standard_thumbnail');
                }
              ?>
              <?php the_title(); ?></a> <br />

              <?php echo get_the_date('jS F Y'); ?> <br />
              <?php the_author_posts_link(); ?>
          </div>

        <?php
        //every 3 items close new row and start a new one
        if ($count % 3 == 0) { ?></div><div class="row"><?php } ?>  

        <?php endwhile; ?>

        </div><!--/row-->

        <nav>
          <div class="nav-previous"><?php next_posts_link( 'Older posts' ); ?></div>
          <div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
        </nav>

      <?php else : ?>
          <div class="inner">
          <p>Sorry, but you are looking for something that isn't here.</p>
          </div>
      <?php endif; ?>
      
      </section>

<?php get_footer(); ?>