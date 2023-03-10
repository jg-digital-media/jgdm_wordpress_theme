<?php require "inc/header.php"; ?>

<section class="single_php">
    
    <article class="single">        
        
        <?php 
        
            $args = array(
                
                'post_type' => 'blog_posts',
                //'post_type' => 'blog_posts', 
                'category_name' => 'news'
            );

            // wp query
            $main_blog = new WP_Query( $args )
                
        ?>

        <h2 class="post_headline"> <p>category.php (news)</p>  <!-- get categories --> </h2>
        
        <?php require "template-parts/category-list.php"; ?>

        <!-- <p> wp_list_categories(); </p>
        <h3><?php wp_list_categories('post_type=blog_posts'); get_categories(); ?></h3>--> 
        
        <!-- The WordPress Loop Begins -->
        <?php if ( $main_blog->have_posts() ) : ?>

            <!-- html -->

        <?php while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>

            <div class="archive-entry">

                <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>

                <p> <?php the_excerpt(); the_field( "article_blurb" ); ?> </p>
            </div>

        <?php endwhile; ?>

        <?php else : ?>

        <!--  No Post Found -->
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