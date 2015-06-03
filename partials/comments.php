<?php
/* Comments.php */

/* If the current post is protected by a password and the visitor has not yet entered the password we will return early without loading the comments. */
if ( post_password_required() )
  return;
?>
        
        <section class="post-comments">
          <div class="inner">
            <?php 
              //Query approved comments for the current post
              $postid = get_the_ID(); 

              $comments_query = new WP_Comment_Query;
              $comments = $comments_query->query( array('status' => 'approve') );

              if( $comments ) {
            ?>

            <h3>Comments (<?php comments_number( '0', '1', '%' );; ?>)</h3>

            <?php
              foreach($comments as $comm) { ?>
                <div>
                <p><?php echo $comm->comment_author ;?>, <?php echo get_comment_date( '', $comm ); ?></p>
                <?php echo $comm->comment_content; ?>
                </div>
            <?php } ?>

              <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : //comments nav ?>
              <nav>
                <div class="nav-previous"><?php previous_comments_link(); ?></div>
                <div class="nav-next"><?php next_comments_link(); ?></div>
              </nav>
              <?php endif; //if comments nav ?>

              <?php } else { //if we have comments ?>
              <p>There are no comments for this post.</p>
              <?php } ?>

          </div>
        </section>

        <?php //If comments are open for this post
        if (comments_open()){ ?>
        <section class="comments_form">
          <div class="inner">
          <?php comment_form(); ?>
          </div>
        </section>
        <?php } //if comments are open ?>