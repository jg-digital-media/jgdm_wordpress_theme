<?php

/*
   Template Name: Category Template 
*/

require "inc/header.php"; ?>

<section class="single_php">
    
    <article class="single">        
        
        <?php 
        
            $args = array(
                'post_type' => 'blog_posts' 
            );

            // wp query
            $main_blog = new WP_Query( $args )
                
        ?>
        
        <h2 class="post_headline"> <p>category.php</p> </h2>
            
        <h3> <?php wp_list_categories('post_type=blog_posts'); ?> </h3>
        
        
        <!-- The WordPress Loop Begins -->
        <?php if ( $main_blog->have_posts() ) : ?>

            <!-- html -->

        <?php while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>

            <div class="archive-entry">

                <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>

                <p> <?php the_excerpt(); the_field( "article_blurb" ); ?> </p>
            </div>

        <?php endwhile; ?>

        <?php else : ?>

        <!--  No Post Found -->
        <?php endif; ?>
            
        <!-- post pagination -->
        
        
        
        <?php  
        
            // Reset the posts data 
            wp_reset_postdata(); 
        
            the_posts_pagination(); 
        ?>
        
        <h4>Blog Post Archives (by date)</h4>
        
        <div class="blog_posts_archive">
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>

        
    </article>
    
</section>

<?php require "inc/footer.php"; ?>