<?php

/*
   Template Name: blog_posts-single.php 
*/

require "inc/header.php"; ?>


<section class="single_php">
    
    <article class="single">        
        
        <?php 
        
            $args = array( 
                'post_type' => 'blog_posts', 
                'supports' => array( 'comments' )
            );

            // wp query
            $main_blog = new WP_Query( $args )
                
        ?>
        
        <h2 class="post_headline"> <p>single-blog_posts.php</p> </h2>
        
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
            
            <div class="posts-toggling">
                
                <?php previous_post_link( $format = "<< %link", "Previous Post" ); ?>
                | 
                <?php next_post_link( $format = "%link >>", "Next Post" ); ?>
                
            </div> 
                
            <?php the_post(); ?> 
            
            <aside> 
                Author Name - <a class="author-link" href="#">
                    <?php //echo get_the_author_meta( 'nicename', $author_id ); ?>
                    <?php echo the_author_posts_link(); ?>
                    <?php //echo get_the_author(); ?>
                    <?php //the_post(); ?>
                    <?php //echo get_usermeta($post->post_author,'author_url', 'a'); ?> </a> | 
                
                <a class="author-link" href="#">( <!-- 00 September 00 : 11:33pm --> <?php the_time('d M Y'); ?>)</a> </aside>
            
            <h3> <?php the_title(); ?> <span>by <?php echo get_the_author(); ?> </span> </h3>
            
            <span>Posted on: <?php the_date('d M Y'); ?> </span>

            <p> <?php the_field( "article_content" ); the_content(); ?> </p>  
            
            <aside> 
                Author Name - <a class="author-link" href="#">
                    <?php //echo get_the_author_meta( 'nicename', $author_id ); ?> 
                
                    <?php echo the_author_posts_link(); ?>
                    <?php //echo get_the_author(); ?>
                    <?php //the_post(); ?>
                    <?php //echo get_usermeta($post->post_author,'author_url', 'a'); ?> </a> | 
                
                <a class="author-link" href="#">( <!-- 00 September 00 : 11:33pm --> <?php echo get_the_date('d M Y'); ?>)</a> 
            </aside>                  
            
            <div class="posts-toggling">
                
                <?php previous_post_link( $format = "<< %link", "Previous Post" ); ?>
                | 
                <?php next_post_link( $format = "%link >>", "Next Post" ); ?>
                
            </div>        

        </div>
        
        <?php
        
            // Pull in the comments template
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
        
                comments_template();
            endif;
        
        ?>
        
        <h4>Blog Post Archives (by date)</h4>
        
        <div class="blog_posts_archive">
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>        
        
        <h4>Authors List</h4>
        
        <div class="post_authors">
        
            <ul>
                <li><?php wp_list_authors(); ?></li>
            </ul>
        </div>

    </article>
    
</section>

<?php require "inc/footer.php"; ?>