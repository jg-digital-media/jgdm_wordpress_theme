<?php

/*
   Template Name: Page Template
*/

require "inc/header.php"; ?>


<section class="section_page">
    
    <article class="page">  
        
        <h2 class="post_headline"> <p>page.php</p> </h2>
        <a href="<?php bloginfo("home"); ?>">Home</a> 

        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>

            <!-- html -->            

        <?php while ( have_posts() ) : the_post(); ?>
        
            <div class="page_container">
                
                <h3 class="page_content_title"> <?php the_title(); ?> </h3>

                <?php the_content(); ?>

            </div>        
        
        <?php endwhile; ?>

        <?php else : ?>

        <!-- No Post Found -->
        
        <?php endif; ?>     
        
        <div class="blog_posts_archive">
        
            <h4>Blog Post Archives (by date)</h4>
            
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>         

    </article>
    
</section>

<?php require "inc/footer.php"; ?>