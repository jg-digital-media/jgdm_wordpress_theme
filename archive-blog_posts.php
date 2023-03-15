<?php require "inc/header.php"; ?>

<section class="single_php">
    
    <article class="archive">  
        
        <h2>Archive Page (Blog Posts CPT - By Date) </h2> 
        <p>( <?php echo "archive-blog_posts.php" ?>) </p>
        
        <div class="blog_posts_archive">
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>
        
    </article>
    
</section>

<?php require "inc/footer.php"; ?>