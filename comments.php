<?php echo "<p>comments.php - successfully retrieved</p>"; 

/** 

* The template for displaying Comments. 
* 
* The area of the page that contains comments and the comment form. 
*
* @package WordPress 
* @subpackage JGDM Blog
* @since JGDM Blog 1.0 
*/

?>

<!-- Check that the given post has comments -->

	<?php if ( have_comments() ) : ?>

        <div id="comments" class="comments-area">
    
            <h2 class="comments-title"> View comments people have posted: </h2>

            <!-- Comments are closed message -->

                <?php if ( ! comments_open() && get_comments_number() ) : ?> 
            
                    <p class="no-comments"><?php _e( 'Comments are closed.', 'jgdm_blog' ); ?></p>
            
                <?php endif; ?>    

            <!-- Pagination -->
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>    
             

                <nav class="navigation comment-navigation" role="navigation">

                    <h3 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'jgdmblog' ); ?></h3>
                    <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'jgdmblog' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'jgdmblog' ) ); ?></div>

                </nav><!-- .comment-navigation -->

            <?php endif; // Check for comment navigation ?>

            <!-- Numbered pagination links -->
            <div class="pagination">
                <?php paginate_comments_links(); ?>
            </div>

            <ol class="comment-list">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'avatar_size' => 74,
                    ) );
               ?>
            </ol><!-- .comment-list -->
    
        </div>

    <?php endif; ?>    

    <?php comment_form(); ?>




