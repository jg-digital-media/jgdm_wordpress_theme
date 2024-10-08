<?php

/*
   Template Name: Single Post Template
*/

require "inc/header.php"; ?>

<section class="section_single">
    
    <article class="single">        
        
        <?php 
        
            $args = array( 'post_type' => 'blog_posts' );

            // wp query
            $main_blog = new WP_Query( $args )
                
        ?>
        
        <h2 class="post_headline"> <p>single.php</p> </h2>
        
        <a href="<?php bloginfo("home"); ?>" class="link_home" title="Goes back to homepage">Home</a> 
        
        <!-- categories for this post --> 
        <div class="the_category_list">
            
            <h3> 
                <!-- the_category(); -->
                Categories related to this post 
            </h3>
            
            <?php the_category(' - '); ?> 
            
        </div>
        
        <!-- blog content -->        
        <div class="blog_post_container">            
            
            <div class="posts-toggling-pagination">
                
                <?php previous_post_link( $format = "<< %link", "Previous Post" ); ?>
                | 
                <?php next_post_link( $format = "%link >>", "Next Post" ); ?>
                
            </div> 
            
            <?php the_post(); ?>
            
            <aside class="author_details"> 
                Author Name - <a class="author-link" href="#">
                    <?php //echo get_the_author_meta( 'nicename', $author_id ); ?>
                    <?php echo the_author_posts_link(); ?>
                    <?php //echo get_the_author(); ?>
                    <?php //the_post(); ?>
                    <?php //echo get_usermeta($post->post_author,'author_url', 'a'); ?> </a> | 
                
                <a class="author-link" href="<?php echo get_day_link( get_post_time('Y'), get_post_time('m'), get_post_time('j') ) ?>">( <!-- 00 September 00 : 11:33pm --> <?php the_time('d M Y'); ?>)</a> 
            </aside>
                
            <div class="post_contents">
            
                <h3 class="post_content_title"> 
                    
                    <?php the_title(); ?> 
                    <span>by <?php echo get_the_author(); ?> </span>
            
                    <span>Posted on: <?php the_date('d M Y'); ?> </span>
                </h3>

                <p> <?php the_field( "article_content" ); 
                    the_content(); ?> 
                </p>                
                
            </div>
            
            <aside class="author_details"> 
                Author Name - <a class="author-link" href="#">
                    <?php //echo get_the_author_meta( 'nicename', $author_id ); ?> 
                
                    <?php echo the_author_posts_link(); ?>
                    <?php //echo get_the_author(); ?>
                    <?php //the_post(); ?>
                    <?php //echo get_usermeta($post->post_author,'author_url', 'a'); ?> </a> | 
                
                <a class="author-link" href="<?php echo get_day_link( get_post_time('Y'), get_post_time('m'), get_post_time('j') ) ?>">( <!-- 00 September 0000 : 11:33pm --> <?php echo get_the_date('d M Y'); ?>)</a> 
            </aside>                
            
            <div class="posts-toggling-pagination">
                
                <?php previous_post_link( $format = "<< %link", "Previous Post" ); ?>
                | 
                <?php next_post_link( $format = "%link >>", "Next Post" ); ?>
                
            </div>    

        </div>
        
        <?php
        
            // Pull in the comments template - If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
        
                comments_template();
            endif;
        
        ?>
        
        <div class="blog_posts_archive">
        
            <h4>Blog Post Archives (by date)</h4>
            
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div> 
        
        <div class="post_authors">       
        
            <h4>Authors List</h4>
        
            <ul>
                <li><?php wp_list_authors(); ?></li>
            </ul>
            
        </div>

    </article>
    
</section>

<?php require "inc/footer.php"; ?>