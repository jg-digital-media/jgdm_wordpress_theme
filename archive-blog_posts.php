<?php require "inc/header.php"; ?>

<section class="section_archive">
    
    <article class="archive">  
        
        <h2 class="post_headline"> <p>archive-blog_posts.php</p> </h2>

        <a href="<?php bloginfo("home"); ?>">Home</a> 
        
        <div class="blog_posts_archive">
            
            <h4>Archive Page (Blog Posts CPT - By Date) </h4> 
            
            <ul>
                <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
            </ul>
            
        </div>
        
    </article>
    
</section>

<?php require "inc/footer.php"; ?>