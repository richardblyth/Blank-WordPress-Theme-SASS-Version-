<?php
/* Author.php - display author details */

get_header(); ?>

    <?php if ( have_posts() ) : ?>

      <header>
        <div>
        <?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>
        <h1><?php echo get_the_author(); ?></h1>
        <p><?php echo get_the_author_meta('description'); ?></p>
        </div>
      </header>

      <section>
      <?php  
        global $query_string;
        query_posts( $query_string . '&posts_per_page=99' ); ?>

        <div>

        <?php $count = 0; //set up counter variable
        
        while (have_posts()) : the_post(); 

        $count++; //increment the variable by 1 each time the loop executes
        ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
              <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail();
                }
              ?>
              
              <?php the_title(); ?></a>
            </div>

        <?php
        //every 3 items close new row and start a new one
        if ($count % 3 == 0) { ?></div><div class="row"><?php } ?>  

        <?php endwhile;?>
        </div>

      </section>

    <?php endif; ?>

<?php get_footer(); ?>