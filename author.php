<?php

/*
   Template Name: Author Template
*/

require "inc/header.php"; ?>

<section class="section_author">
    
    <article class="author">
        
        <h2 class="post_headline"> <p>author.php</p> </h2>
        
        <div class="post_authors">       
        
            <h4>Authors List</h4>
        
            <ul>
                <li><?php wp_list_authors(); ?></li>
            </ul>
            
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