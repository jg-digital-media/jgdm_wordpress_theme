<?php

/*
   Template Name: page.php 
*/

require "inc/header.php"; ?>


<section class="single_php">
    
    <article class="page">  
        
        <h2 class="post_headline"> <p>page.php</p> </h2>
        <a href="<?php bloginfo("home"); ?>">Home</a> 

        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>

            <!-- html -->

        <?php while ( have_posts() ) : the_post(); ?>
        
            <div>

                <p>page.php title</p>

                <?php the_content(); ?>

            </div>
        
        
        <?php endwhile; ?>

        <?php else : ?>

        <!-- No Post Found -->
        <?php endif; ?>            
        
        

    </article>
    
</section>

<?php require "inc/footer.php"; ?>