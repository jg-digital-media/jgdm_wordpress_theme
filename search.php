<?php

/*
   Template Name: Search Template
*/

require "inc/header.php"; ?>

<section class="section_search">
    
    <article class="page">  
        
        <h2 class="post_headline"> <p>search.php</p> </h2>

        <a href="<?php bloginfo("home"); ?>">Home</a> 
        
        
        <!--<a href="search-page/" title="Search Page">Search Page</a>-->

        <?php

            global $query_string;

            wp_parse_str( $query_string, $search_query );
            $search = new WP_Query( $search_query );

            // echo $query_string;
        ?>      
 
        <!-- Get the number of search results -->
        
        
        <!-- Get total number of posts -->
        <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
        ?> 

        <h3 class="search_term">
            <?php printf( __( 'Search Results for: %s' ), '"<span>' .  get_search_query() . '</span>"'); ?>
        </h3>     
        
        
        <?php echo "<p class='number_of_results'>Number of results:  " . "<span class='total_results'>" . $total_results . "</span></p>"; ?>
        
        <?php // get_search_form(); ?>
  
        <!-- Post pagination for Searches -->
        <?php
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

            // pagination method
            the_posts_pagination(); ?>

        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>
        
        <aside class="search_form">
            <p>Look at the results list below or try another search</p>
                
            <?php get_search_form(); ?>
            
        </aside>
        
        <?php while ( have_posts() ) : the_post(); ?>
             
            <div class="search-entry">

                <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                
                <p><?php the_field( "article_blurb" ); ?></p>
                <p><?php the_excerpt(); ?></p>

            </div>        
        
        <?php endwhile; ?>

        <?php else : ?>

            <!-- No Post Found -->
            <div class="search-entry no-result">
            
                <p>Sorry! there was no result returned for that term.</p>
                
                <p>Try another search</p>
                
                <?php get_search_form(); ?>
                
            </div>
        
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
    
    <!--

        Include the search form 
        Include it with: get_search_form().
    -->
    
</section>

<?php require "inc/footer.php"; ?>