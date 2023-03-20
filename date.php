<?php

/*
   Template Name: Author Date Template
*/

require "inc/header.php"; ?>

<section class="section_archive">
    
    <article class="archive">        
        
        <?php 
        
            $args = array(
                'post_type' => 'blog_posts', 
                'post_type' => 'posts' 
            );

            // wp query
            $main_blog = new WP_Query( $args );
                
            $wp_category_args = array(
                "separator" => "-", 
                "title_li" => "Full Categories List"
            );
                
        ?>
        
        <h2 class="post_headline"> <p>date.php</p> </h2>
        <hr />

        <!-- Full list of categories -->
        <h3>
            <?php 
                wp_list_categories( $wp_category_args );
            ?>
        </h3> 

        <!-- Align Center - start single blog entry -->
        <h4 class="align-center">WordPress Post Archives for <?php the_time('F'); ?> in the year <?php the_time('Y'); ?></h4>   

        <!-- Get total number of posts -->
        <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
        ?> 

        <?php echo "<p class='posts_available'>Posts Available: " . "<span class='total_results'>" . $total_results . "</span></p>"; ?>
        
        <!-- Post pagination -->
        <?php
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

            // pagination method
            the_posts_pagination(); ?>
        
        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>

            <!-- html -->

        <?php while ( have_posts() ) : the_post(); ?>

            <div class="archive-entry">

                <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  
                    <span> By <?php echo get_the_author(); ?> on <?php echo get_the_date( 'd M Y' ); ?> </span> 
                </h5>
                
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
        
        <div class="post_authors">         
        
            <h4>List of Authors</h4>
        
            <ul>
                <li><?php wp_list_authors(); ?></li>
            </ul>
        </div>
        
        <div class="blog_posts_archive">
        
            <h4>Blog Post Archives (by date)</h4>
            
            <ul>
                <li><?php wp_get_archives(); ?></li>
            </ul>
            
        </div>    

        
    </article>
    
</section>

<?php require "inc/footer.php"; ?>