<?php

/*
   Template Name: 404 Template
*/

require "inc/header.php"; ?>

<section class="section_page">
    
    <article class="page">  
        
        <h2 class="post_headline"> <p>404.php</p> </h2>
        <a href="<?php bloginfo("home"); ?>">Home</a> 

            <div class="page_container">
                
                <h3 class="page_content_title"> 
                    Error (404) <?php the_title(); ?> 
                </h3>

                <?php the_content(); ?>
                
                <p class="content_404">Unfortunately that page could not be found.  Go back to the homepage or try a search. </p>
                    
                <p class="content_404"><?php get_search_form(); ?></p>

            </div> 
        
        <div class="blog_posts_archive">
        
            <h4>Blog Post Archives (by date)</h4>
            
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>         

    </article>
    
</section>

<?php require "inc/footer.php"; ?>