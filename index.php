<?php require "inc/header.php"; ?>

<section>
    
    <article class="primary">        
        
        <?php
        
            $custom_query_args = array(

                'post_type' => 'blog_posts',
                'post_status' => 'publish',
                //'format' => '/page/%#%',
                //'posts_per_page' => 8,
                'paged' => $paged,
                'total' => $main_blog->max_num_pages,
                'order' => 'DESC'
            );         
        
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;        

            // wp query
            $main_blog = new WP_Query( $custom_query_args ); 

            $temp_query = $wp_query;
            $wp_query = NULL;
            $wp_query = $main_blog;
                
        ?>
        
        <span class="post_headline"><?php echo "index.php" ?></span>
        
        <h2>Latest Blogs</h2> 
        
        <!-- Pagination -->
        <?php the_posts_pagination(); ?> 
        
        <?php if ( $main_blog->have_posts() ):  ?> 
         
        <?php while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>
                
        <div class = "entry">
                
            <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span> <br /> by <?php echo get_the_author(); ?> on <?php echo get_the_date( "d M Y" ); ?> </span> </h3>
            
            <p> <?php echo $main_blog->the_content(); ?> </p>
            
            <p> <?php echo the_field( "article_blurb" ) . "..."; ?> </p>
            
        </div>        
        
        <?php endwhile; ?>  
        
        <?php else: ?>        
        
           <p>No content</p>
        
        <?php endif; ?>           
        
        <?php
            
            // Reset the posts data 
            wp_reset_postdata();
        
            the_posts_pagination(); 
        
            $wp_query = NULL;
            $wp_query = $temp_query;
        
        ?>
        
    </article>

    <article class="secondary">    
       
        <h2>Widgets Title</h2>  
        
        <aside class = "widget_area widget_html">
            
            <?php dynamic_sidebar( "jgblog_html_one" ); ?>        
        
        </aside>
        
        <aside class = "widget_area widget_recent">
            
            <h3>Recent Blogs</h3>
            
            <?php dynamic_sidebar( "jgblog_recentposts" ); ?>       
        
        </aside>
        
        <aside class = "widget_area widget_search">
            
            <?php dynamic_sidebar( "jgblog_search_one" ); ?>
        
        </aside>
        
        <aside class = "widget_area widget_archive">
            
            <h3>Archive</h3>  
            
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p> 
            
            <?php dynamic_sidebar( "jgblog_archive_one" ); ?>
        
        </aside>
        
    </article>
    
</section>

<?php require "inc/footer.php"; ?>