<?php require "inc/header.php"; ?>

<section class="section_category">
    
    <article class="page">        
        
        <?php 
        
            $args = array( 
                
                'post_type' => 'post',
                'post_type' => 'blog_posts', 
                // 'posts_per_page' => 4,
                'paged' => $paged,
                // 'category' => 'webdesign_news_comment',
                'category_name' => 'webdesign_news_comment',
                // 'category_in' => 'webdesign_news_comment'
            );

            // wp query
            $main_blog = new WP_Query( $args );        

            $temp_query = $wp_query;
            $wp_query = NULL;
            $wp_query = $main_blog;
                
        ?>

        <h2 class="post_headline"> <p>category-webdesign_news_comment.php</p> </h2>

        <a href="<?php bloginfo("home"); ?>">Home</a>     
        
        <?php require "template-parts/category-list.php"; ?>
        
        <?php         
        
            // WP Query pagination
        
            // paged pagination and query args
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        
            // pagination method
            the_posts_pagination();  
        ?>
        
        
        <!-- The WordPress Loop Begins -->
        <?php if ( $main_blog->have_posts() ) : ?>

            <!-- html -->

        <?php while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>

            <div class="category-entry">

                <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>

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
        
            $wp_query = NULL;
            $wp_query = $temp_query;
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