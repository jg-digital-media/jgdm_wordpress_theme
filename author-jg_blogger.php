<?php

/*
   Template Name: Author Template author-jg_blogger.php 
*/

require "inc/header.php"; ?>

<section class="section_author">
    
    <article class="author">        
        
        <?php 
        
            $args = array( 'post_type' => 'blog_posts', 'post_author' => 'jg_blogger' );

            // wp query
            $main_blog = new WP_Query( $args )
                
        ?>
        
        <h2 class="post_headline"> <p>author-jg_blogger.php</p> </h2>

        <!--<p> <?php the_field( "article_content" ); the_content(); ?> </p>  -->   

        <!-- Get total number of posts -->
        <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
        ?> 

        <?php echo "<p class='posts_available'>Posts Available: " . "<span class='total_results'>" . $total_results . "</span></p>"; ?>

        <!-- Post pagination for Searches -->
        <?php
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

            // pagination method
            the_posts_pagination(); ?>


        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>

        <!-- html -->
        <?php while ( have_posts() ) : the_post(); ?>

            <div class="author-entry">

                <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>  <span> By <?php echo get_the_author(); ?> on <?php echo get_the_date( 'd M Y' ); ?> </span> </h5>

                <p> <?php the_excerpt(); the_field( "article_blurb" ); ?> </p> 

            </div>

        <?php endwhile; ?>

        <?php else : ?>

        <!-- No Post Found -->
        <?php endif; ?>
            
        <!-- post pagination -->        
        <?php  
        
            // Reset the posts data 
            wp_reset_postdata(); 
        
            the_posts_pagination(); 
        ?>
        
        <div class="blog_posts_archive">
        
            <h4>Blog Post Archives (by date)</h4>
            
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>

    </article>
    
</section>

<?php require "inc/footer.php"; ?>