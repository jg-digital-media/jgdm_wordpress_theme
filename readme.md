# JGDM Blog for 2023 - 03/03/2023 - 15:18

**URL:** [Local](http://localhost/wordpress/jgdmblog_2023)

`cd: wordpress/jgdmblog_2023`

## Goals:   

+ `[DONE]` - Export the Database from blog.jonniegrieve.co.uk and import into a fresh wordpress installation.
+ `[DONE]` - Enqueue Styling
+ `[DONE]` - Start with a plain design
+ `[DONE]` - Working with Post pagination
+ `[TODO: ]` - Archive Templates 
+ `[TODO: ]` - Search Templates 
+ `[TODO: ]` - Single post comment templates
+ A newer fresher redesign for my blog
+ To explore and recognise errors with displaying code snippets when posting code with [N] Plugin
+ Build out the templates to build a blog with added custom post type

## Files required
  + index.php
  + functions.php
  + style.css
  + screenshot.png
  + sass.scss (optional)
  + favicon.png (optional)

## Directories required
  + assets
  + template-parts
    + inc/
  + img
  + scripts/
  + sass/  

## Build out the templates to build a blog with added custom post type
  + **Posts**
  + Categories
  + Taxonomies
  + Archives
  + 

  + Custom Templates
    + privacy.php
    + 404.php
    + home.php
    + single.php
    + post_type-single.php
    + page.php
    + search.php
    + category.php
    + date.php
    + article.php
    + archive.php
    + category.php
    + author.php


    + Enable widgets
    
## Plugins

+ Advanced Custom Fields - `Version 6.0.7 | By Delicious Brains | Activated`

+ Advanced Editor Tools (previously TinyMCE Advanced) - `Version 5.6.0 | By Automattic | Deactivated`

+ Akismet Anti-Spam - `Version 5.0.2 | By Automattic | Deactivated`

+ APH Prism Syntax Highlighter - `Version 1.4.1 | By Agus Prawoto Hadi | Deactivated`

+ Better Search Replace - `Version 1.4.2 | By WP Engine | Activated`

+ Code Snippets - `Version 3.2.2 | By Code Snippets Pro | Deactivated`

+ Code Syntax Block - `Version 3.1.1 | By Marcus Kazmierczak | Activated`

+ Coming Soon Page, Maintenance Mode, Landing Pages & WordPress Website Builder by SeedProd - `Version 6.15.7 | By SeedProd | Deactivated`

+ CookieYes | GDPR Cookie Consent - `Version 3.0.8 | By CookieYes | Deactivated`

+ CSS & JavaScript Toolbox - `Version 11.5 | By Wipeout Media | Deactivated`

+ Custom Post Type Date archives - `Version 2.7.1 | By keesiemijer | Activated`

+ Custom Post Type UI -  `Version 1.13.4 | By WebDevStudios | Activated`

+ Easy Video Player - `Version 1.2.2.3 | By naa986 | Deactivated`

+ Select Hello Dolly - `Version 1.7.2 | By Matt Mullenweg | Deactivated`

+ Highlighting Code Block - `Version 1.6.1 | By LOOS, Inc. | Activated`

+ JGDM Development Plugin - `Version 1.0.0 | By Jonathan Grieve @jg_digitalMedia | Deactivated`

+ Select LightStart - `Version 2.6.2 | By Themeisle | Activated`

+ My Syntax Highlighter - `Version 2.58 | By Space X-Chimp | Deactivated`

+ SyntaxHighlighter Evolved - `Version 3.6.2 | Alex Mills (Viper007Bond) | Activated`

+ WP-Paginate - `Version 2.2.0 | By Max Foundry | Dectivated`

+ Yoast SEO - `Version 20.0 | By Team Yoast | Deactivated`
  
## The Loop

```php

<?php if( have_posts() ) : while ( have_posts() ) the_post(); ?>

    // the loop block 
 
<?php endwhile; else :  ?>

    // no content block

<?php endif;?>
```

### The Loop with WP Query
```php
<?php 
        
        $args = array( 'post_type' => 'blog_posts' );
        
        // wp query
        $main_blog = new WP_Query( $args )
                
        ?>
        
        <h2>Latest Blogs</h2> 
        
        <nav class="pagination">        
        
            <a href="#" class="current-page">1</a> |
            <a href="#">2</a> |
            <a href="#">3</a> |
            <a href="#">4</a>
            
        </nav>        
        
        
        <?php if ( $main_blog->have_posts() ) : while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>
        
            <div class = "entry">
    
        ... 


```

### Category Methods

```php

    <!-- WP list categproes  -->
    <p>wp_list_categories();</p>

    <?php $args = array ("separator => ' - ' ") ?>
    <h3><?php wp_list_categories( $args ); //get_categories(); ?></h3>
```

```php

    <!-- WP list categproes  -->
    <h3> 
    <?php foreach( (get_the_category() ) as $category) {
    
        echo "<a href = '" . get_category_link( $category ) . "'> " . $category->cat_name . "</a>";
        echo $category->cat_name . " - ";
    
    } ?> </h3>
```

```php

    <!-- Full list of categories -->
    <h3><?php 
        the_category( " - "); 
        //get_categories(); ?>
    </h3> 

```

### Archive Methods

```php

<div class="blog_posts_archive">
    <ul>
        <li><?php wp_get_archives('post_type=blog_posts'); ?></li>
    </ul>
            
</div> 
```

```php

<h4>Authors list</h4>
        
<div class="post_authors">
        
    <ul>
        <li><?php wp_list_authors(); ?></li>
    </ul>
</div>

```

```php
<?php echo get_the_author(); ?>  - outputs the text of the author of a post. It can be placed in a link but doesn't link to the page for an author.

<?php echo the_author_posts_link(); ?> - outputs a link to the author page

<?php echo get_the_author_meta( 'nicename', $author_id ); ?>   -
```

`

```php

    <?php the_post(); ?> 
    <?php echo the_author_posts_link(); ?>
    <?php //echo get_the_author(); ?>
    <?php //the_post(); ?>
    <?php //echo get_usermeta($post->post_author,'author_url', 'a'); ?>  
```

## Links 

### Fixing Pagination links for Custom Post Types - [Link] (https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops)

### The Loop (Codex) - [Link](https://codex.wordpress.org/The_Loop)

### Higlighting Code Block is the plugin used for code snippers 
+ using `prism.js`

### current author variable method. -  [Codex: Author Templates](https://codex.wordpress.org/Author_Templates)

## Todo

+ Pagination links - current page link - visited page link
  + Pagination for category templates