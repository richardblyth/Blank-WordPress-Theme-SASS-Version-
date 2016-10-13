<?php
/* Comments.php */

/* If the current post is protected by a password and the visitor has not yet entered the password we will return early without loading the comments. */

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );


if ( post_password_required() )
  return;
?>
        
        <section class="post-comments">
          <div class="inner">
            <?php 
              if (comments_open()) {
                echo "<h3>Your Comments</h3>";
              }
            ?>

            <div class="post-comments__count"><?php comments_number( '0', '1', '%' );; ?> Comments</div>

            <?php if ( have_comments() ) : ?>

              <?php //the_comments_navigation(); ?>

              <ol class="comment-list">
                <?php
                  wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 42,
                  ) );
                ?>
              </ol>

              <?php the_comments_navigation(); ?>

            <?php endif; // Check for have_comments(). ?>

          </div>
        </section>

        <?php //If comments are open for this post
        if (comments_open()){ ?>
        <section class="post-comments__form">
          <div class="inner">
          <?php 
          $comment_args = array(
            'title_reply'=>'', 
            'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Your name *', 'blank-wordpress-theme' ) . '</label> ' . '<input class="comment-form__name" placeholder="Your Name *" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" ' . $aria_req . ' required /></p>', 

                'email'  => '<p class="comment-form-email">' . '<label for="email">' . __( 'Your Email *', 'blank-wordpress-theme' ) . '</label> ' . '<input class="comment-form__email" placeholder="Your Email *" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' size="30" required />'.'</p>',

                'url'    => ''
                ) 
              ),

              'comment_field' => '<p>' . '<label for="comment">' . __( 'Your message *', 'blank-wordpress-theme' ) . '</label>' . '<textarea class="comment-form__comment" placeholder="Your message *" id="comment" name="comment" cols="45" rows="4" aria-required="true" required></textarea>' . '</p>',

              'comment_notes_after' => '',

              'comment_notes_before' => '',
            );

          comment_form($comment_args); ?>
          </div>
        </section>
        <?php } //if comments are open ?>