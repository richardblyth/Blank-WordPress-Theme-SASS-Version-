<?php
/* Search resuts */

//Preserve the search query (for pagination)
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
  $query_split = explode("=", $string);
  $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

get_header(); ?>

    <header>
      <div>
      <?php if ($wp_query->found_posts == 1) { ?>
        <h1>1 result for <?php echo get_search_query(); ?></h1>
      <?php } else { ?>
        <h1><?php echo $wp_query->found_posts; ?> results for <?php echo get_search_query(); ?></h1>
      <?php } ?>
      </div>
    </header>


    <?php if ( have_posts() ) : ?>

    <section>

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

          <?php echo get_the_date('jS F Y'); ?><br />
          <?php the_author_posts_link(); ?> 
        </div>

      <?php
        //every 3 items close new row and start a new one
        if ($count % 3 == 0) { ?></div><div class="row"><?php } ?>  

      <?php endwhile; ?>
    </section>
    
    <nav>
      <div class="nav-previous"><?php next_posts_link( 'Previous' ); ?></div>
      <div class="nav-next"><?php previous_posts_link( 'Next' ); ?></div>
    </nav>

    <?php else : ?>

      <section>
        <div>
          <p>Sorry, but nothing matched your search criteria.</p>
        </div>
      </section>

    <?php endif; ?>

<?php get_footer(); ?>
