<?php

/*
   Template Name: Archive Template
*/

<?php require "inc/header.php"; ?>

<section class="single_php">
    
    <article class="archive">        
        
        <?php 
        
            //$args = array( 'post_type' => 'blog_posts' );

            // wp query
            //$main_blog = new WP_Query( $args )
                
        ?>
        
        <h2 class="post_headline"> <p>date.php</p>  <!-- get categories --> </h2>
        
        <!-- categories for this post --> 
        <div class="the_category_list">
        <h3> the_category() - Categories related to this post </h3>
           <?php the_category(' - '); ?> 
        </div>
        <hr />

        <!-- Full list of categories -->
        <h3><?php wp_list_categories( " - "); get_categories(); ?></h3> 

        <h4 class="align-center">WordPress Post Archives for <?php the_time('F'); ?> in the year <?php the_time('Y'); ?></h4>

        
        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>

            <!-- html -->

        <?php while ( have_posts() ) : the_post(); ?>

            <div class="archive-entry">

                <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h5>
                
                <p> <?php the_excerpt(); the_field( "article_blurb" ); ?> </p>
                
            </div>

        <?php endwhile; ?>

        <?php else : ?>

        <!-- No Post Found -->
        <?php endif; ?>
        
        <h4>Blog Post Archives (by date)</h4>
        
        <div class="blog_posts_archive">
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>

        
    </article>
    
</section>

<?php require "inc/footer.php"; ?>