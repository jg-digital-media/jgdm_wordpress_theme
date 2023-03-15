<?php

/*
   Template Name: Author Template
*/

require "inc/header.php"; ?>

<section class="single_php">
    
    <article class="author">        
        
        <?php 
        
            $args = array( 'post_type' => 'blog_posts' );

            // wp query
            $main_blog = new WP_Query( $args )
                
        ?>     
            
        <h3>  author.php: <?php the_title(); ?> </h3>

        <!--<p> <?php the_field( "article_content" ); the_content(); ?> </p>-->        


        <!-- The WordPress Loop Begins -->
        <?php if ( have_posts() ) : ?>

        <!-- html -->
        <?php while ( have_posts() ) : the_post(); ?>

            <div class="archive-entry">

                <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>  <span> By <?php echo get_the_author(); ?> on <?php echo get_the_date( 'd M Y' ); ?> </span> </h5>

                <p> <?php the_excerpt(); the_field( "article_blurb" ); ?> </p> 

            </div>

        <?php endwhile; ?>

        <?php else : ?>

        <!-- No Post Found -->
        <?php endif; ?>        
        
        <h4>Authors List</h4>
        
        <div class="post_authors">
        
            <ul>
                <li><?php wp_list_authors(); ?></li>
            </ul>
        </div>
        
        <h4>Blog Post Archives (by date)</h4>
        
        <div class="blog_posts_archive">
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>

    </article>
    
</section>

<?php require "inc/footer.php"; ?>