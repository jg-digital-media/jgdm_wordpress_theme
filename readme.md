# JGDM Blog Theme  (2023) - 14/03/2023 - 16:25

**URL:** [Local](http://localhost/wordpress/jgdmblog_2023) - [Repo](https://github.com/jg-digital-media/jgdm_wordpress_theme)

`git clone https://github.com/jg-digital-media/jgdm_wordpress_theme`



## **Sections**

  + [Goals](#goals)

  + [Setup](#setup)

  + [Code Snippets](#code-snippets)

  + [Plugin List](#plugin-list)
  
  + [Links](#links)
  
  + [Todo](#todo)


## Goals:  
[Back to Top](#sections) 

+ `[DONE]` - Export the Database from blog.jonniegrieve.co.uk and import into a fresh wordpress installation.
+ `[DONE]` - Enqueue Styling
+ `[DONE]` - Start with a plain design
+ `[DONE]` - Working with Post Pagination
+ `[DONE]` - Archive Templates 
+ `[DONE]` - Search Templates 
+ `[DONE]` - Single post Templates
+ `[TODO: ]` - Code Snippets
+ `[TODO: ]` - Comment templates
+ `[TODO: ]` - Simpifly Markup and CSS Styling
+ `[TODO: ]` - Categories - Listings and Pagination for individual categories
+ `[TODO: ]` - Customise the admin area
+ `[TODO: ]` - A newer fresher redesign for my blog
+ `[TODO: ]` - Plugin Development
+ `[TODO: ]` - To explore and recognise errors with displaying code snippets when posting code with `Highlighting Code Block` plugin
+ `[TODO: ]` - Build out the templates to build a blog with added custom post type

## Setup: 
[Back to Top](#sections)

Make sure your WordPress theme has the following minimum files


### Files required
  + index.php
  + functions.php
  + style.css
  + screenshot.png
  + sass.scss (optional)
  + favicon.png (optional)

1. Setup theme supports.

Make sure to include support for dynamic menus for navigation and widgets in your theme.

   ```php

    <?php
        add_theme_support( "widget" );
        add_theme_support( "menus" );
   ```
2. Enqueue Styles and Scripts


    ```php

    <?php
        // in functions.php

        // Add and Enqueue Theme Assets 
        function add_theme_assets() {

               // register styles
            wp_enqueue_style( 'style', get_stylesheet_uri() );     


            // register scripts
            wp_enqueue_script( 'app', get_template_directory_uri() . '/_assets/scripts/app.js' );

        }
    ```
3. Menu

   + link to index.php `http://localhost/jgdm_blog/blog_posts/2/page/1/` 
   + link to home.php `(http://localhost/blog_posts)`
   + links to pages `(page.php)`

4. Setup Widgets

  + Use functions.php to register an individual widget area

    ```php

        <?php
          register_sidebar( array (

                'name' => __( 'HTML Block 1'),
                'id' => 'jgblog_html_one',
                'description' => __( 'HTML Block 1 - Enter the custom html for this widget area') 
               )
            ); 

        ?>
    ``` 

+ Call the dynamic sidebar function and put it in your chosen place for your design.

```php
   <?php dynamic_sidebar( "jgblog_html_one" ); ?>  
```

5. post pagination



Paged query...

```php


    <?php
        $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

        // pagination method
        the_posts_pagination(); ?>

```

```php
        <!-- The Loop -->
```

Reset the post data 

```php
        <!-- post pagination -->        
        <?php  

            // Reset the posts data 
            wp_reset_postdata(); 

            the_posts_pagination(); 
        ?>           
```  

```upcoming  - WP QUERY Pagination``` 




6. Custom post types

```not currently created in code  - uses 

Plugins 
-> Advanced Custom Fields by WP Engine
-> Custom Post Type UI: by WebDev Studios

``` 

Blog Posts - Custom Post Type. 

```php

    $custom_query_args = array(

        'post_type' => 'blog_posts',
        'post_status' => 'publish' 
    );

    // wp query
    $main_blog = new WP_Query( $custom_query_args ); 


    <?php if ( $main_blog->have_posts() ):  ?> 

    <?php while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>

    <!-- Content -->
    
    <?php endwhile; ?>  
        
    <?php else: ?>        

    <p>No content</p>

    <?php endif; ?>     

```


7. Single Post Page Comments

  + Allow post discussion in admin area


### Directories required
  + assets  
  + inc/
  + template-parts
  + img
  + scripts/
  + sass/  

### Build out the templates to build a blog with added custom post type

  + Custom Templates
    + index.php
    + privacy.php
    + 404.php
    + home.php
    + single.php
      + single-blog_posts.php
    + post_type-single.php
    + page.php
    + search.php
    + category.php
      + category-category_name.php
    + date.php
    + archive.php
      + archive-post_type_name.php
    + author.php
      + author-author_name.php
    + category.php
    + author.php


    + Enable widgets
    

## Code Snippets
[Back to Top](#sections)

### The WordPress Loop

```php 
        
	<?php if ( have_posts() ):  ?> 
	 
	<?php while ( have_posts() ) : the_post(); ?>        
	
	<div class = "entry"> . . . </div>
	
	<?php endwhile; ?>  
	
	<?php else: ?>        
	
	   <p>No content</p>
	
	<?php endif; ?>         

```

### WordPress Loop (Using a WP Query)

```php

    <?php

        // custom query arguments
        $custom_query_args = array(

            'post_type' => 'blog_posts',
            'post_status' => 'publish',
            //'format' => '/page/%#%',
            //'posts_per_page' => 8,
            // 'paged' => $paged

        );
	
        // define a new WP Query
        $main_blog = new WP_Query( $custom_query_args ); 
    ?>
	
    <!-- The Loop -->
    <?php if ( $main_blog->have_posts() ):  ?> 

    <?php while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>

      <!-- Looped Content -->

    <?php endwhile; ?>  

    <?php else: ?>        

       <p>No content</p>

    <?php endif; ?>      
```

### The Loop (altermative Syntax)

```php

    <?php if( have_posts() ) : while ( have_posts() ) the_post(); ?>

        <!-- the loop block -->

    <?php endwhile; else : ?>

        <!-- no content block -->

    <?php endif; ?>



    <!-- The Loop with WP Query -->

    <?php 
        
        $args = array( 'post_type' => 'blog_posts' );

        // define a new WP Query
        $main_blog = new WP_Query( $args )    

        <?php if ( $main_blog->have_posts() ) : while ( $main_blog->have_posts() ) : $main_blog->the_post(); ?>

        <div class = "entry"> . . . </div> 

        <?php endwhile; ?>  

        <?php else: ?>        

            <p>No content</p>

        <?php endif; ?>      

    ?>

```


### Category Methods

```php

    <!-- WP list categories - wp_list_categories()  -->
    <p>wp_list_categories();</p>

    <?php $args = array ("separator => ' - ' ") ?>

    <h3><?php wp_list_categories( $args );  ?></h3>
```

```php

    <!-- WP list categories (get_the_category() alternative syntax)  -->
    <h3> 
    <?php foreach( (get_the_category() ) as $category) {
    
        echo "<a href = '" . get_category_link( $category ) . "'> " . $category->cat_name . "</a>";
        echo $category->cat_name . " - ";
    
    } ?> </h3>
```

```php

    <!-- Categories assigned to a particular posy -->
    <h3>
    <?php 
        the_category( " - "); 
    ?>
    </h3> 

```

```php

    <?php 

        get_categories();

        function get_category( $args ) {

            $defaults  = array( 'taxonomy' => 'category' );
            $args     = wp_parse_args( $args, $defaults );
        }

    ?>       


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

+ <?php echo `get_the_author();` ?> - outputs the text of the author of a post. It can be placed in a link but doesn't link to the page for an author.

+ <?php echo `the_author_posts_link();` ?> - outputs a link to the author page

+ <?php echo `get_the_author_meta( 'nicename', $author_id );` ?> -

+ <?php `the_post();` ?> - helps WordPress identify the correct post to use and then gives access to all the author methods

+ <?php //echo get_usermeta($post->post_author,'author_url', 'a'); ?>  

	
### WordPress Pagination


<!-- WordPress Core Posts Pagination -->
```php 

    <?php 

        $custom_query_args = array(

            'post_type' => 'post',
            'post_status' => 'publish',
            //'posts_per_page' => 8,
            // 'paged' => $paged,
            'paged' => $paged,
            'total' => $main_blog->max_num_pages,
            'order' => 'DESC'
        );

		// paged query
        $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			
			
        // define a new WP Query
        $main_blog = new WP_Query( $custom_query_args ); 

        $temp_query = $wp_query;
        $wp_query = NULL;
        $wp_query = $main_blog; 
    ?>

	<!-- Pagination --> 
	<?php the_posts_pagination(); ?>
	
	<?php if ( have_posts() ):  ?> 
	 
	<?php while ( have_posts() ) : the_post(); ?>       
	
        <!-- Looped Query -->
        
    <?php endwhile; ?>  
        
    <?php else: ?>        
        
    <p>No content</p>
        
    <?php endif; ?>           
        
    <?php
            
		// Reset the posts data 
		wp_reset_postdata(); 
	
        // Pagination Links
		the_posts_pagination(); 
	
		$wp_query = NULL;
		$wp_query = $temp_query;
	
	?>       


```

### WordPress Menu Areas

```php

    <?php

        // Register Navigation menu(s)
        function main_jgdm_menu(){

            register_nav_menus( array(
                'main_menu' => __( 'main_site_menu', 'jgdm_blog' )
            ) );
        }

        add_action( 'init', 'main_jgdm_menu' );  


```

```php 
                    
	<!-- Main Nav Menu settings -->
	<?php wp_nav_menu( array( 
		'theme_location'  => 'Main Menu',
		'menu' => 'Main Menu',
		'orderby' => 'menu_order'
		) );
	?>                             

	<!-- Place the WP Menu -->
    <!-- <?php echo dynamic_sidebar( "main_site_menu" ); ?> -->
                    
```

### Enqueuing website assets into your theme

```php 

    <?php 

        // Add and Enqueue Theme Assets 
        function add_theme_assets() {

            // register styles
            wp_enqueue_style( 'style', get_stylesheet_uri() );     


            // register scripts
            wp_enqueue_script( 'app', get_template_directory_uri() . '/path/to/app.js' );

        }

```

### Widget Areas

```php 

    <?php 

        // Register a sidebar area
        register_sidebar( array (

            'name' => __( 'HTML Block 1'),
            'id' => 'widget_area_identifier',
            'description' => __( 'HTML Block 1 - Enter the custom html for this widget area') 
           )
        );  

        // place widget someoneqhere in your template 	
        <?php dynamic_sidebar( "widget_area_identifier" ); ?>   
```

### Search

```php 

	<!-- Get total number of posts -->
    <?php
        global $wp_query;
        $total_results = $wp_query->found_posts;
    ?> 

    <h2>
        <?php printf( __( 'Search Results for: %s' ), '"<span>' .  get_search_query() . '</span>"'); ?>
    </h2>        
        
    <?php echo "<p class='number_of_results'>Number of results:  " . "<span class='total_results'>" . $total_results . "</span></p>"; ?>
        
    <?php // get_search_form(); ?>    

```

```php

	<!-- Use the WordPress Loop to get list of returned search results -->    
    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
	
		<!-- The Loop Content -->
        
    <?php endwhile; ?>

    <?php else : ?>
	
        <!-- No Post Found -->
        <div class="search-entry no-result">
            
            <p>Sorry! there was no result returned for that term.</p>
                
        </div>
        
    <?php endif; ?>   
	
```
### Author and Archival Templates

```php

    <!-- categories for this post --> 
    <div class="the_category_list">
    <h3> the_category() - Categories related to this post </h3>
       <?php the_category(' - '); ?> 
    </div>
    <hr />
		
    <?php echo get_the_author(); ?>  - outputs the text of the author of a post. It can be placed in a link but doesn't link to the page for an author.

    <?php echo the_author_posts_link(); ?> - outputs a link to the author page

    <?php echo get_the_author_meta( 'nicename', $author_id ); ?>   -

```

### Customise the admin area

```php 

<?php 
	// To Come:	

```

### Plugin Development (in code)

```php 

<?php
	// To Come:

```

  

## Plugin List
[Back to Top](#sections)

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

## Links 
[Back to Top](#sections)

### Fixing Pagination links for Custom Post Types - [Link] (https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops)

### The Loop (Codex) - [Link](https://codex.wordpress.org/The_Loop)

### Higlighting Code Block is the plugin used for code snippers 
+ using `prism.js`

### current author variable method. -  [Codex: Author Templates](https://codex.wordpress.org/Author_Templates)

### [Category Pagination](https://www.trickyenough.com/pagination-in-wordpress/)

## Todo
[Back to Top](#sections)

+ Pagination links - current page link - visited page link
  + Pagination for category templates