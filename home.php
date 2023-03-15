<?php require "inc/header.php"; ?>

<section>
    
    <article class="primary">       
        
        <h2>Latest Blogs <span><?php echo "home.php" ?></span> </h2> 
        
        <!-- Pagination --> 
        <?php the_posts_pagination(); ?>
        
        <?php if ( have_posts() ):  ?> 
         
        <?php while ( have_posts() ) : the_post(); ?>        
        
        <div class = "entry">
                
            <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span> <br /> by <?php the_author(); ?> on <?php echo get_the_date( "d M Y" ); ?> </span> </h3>
            
            <p> <?php echo the_excerpt(); ?> </p>
            
            <p> <?php echo the_content(); ?> </p>
            
            <p> <?php echo the_field( "article_blurb" ) . "..."; ?> </p>
            
        </div>        
        
        <?php endwhile; ?>  
        
        <?php else: ?>        
        
           <p>No content</p>
        
        <?php endif; ?>           
        
        <?php
            
            // Reset the posts data 
            // wp_reset_postdata(); 
        
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