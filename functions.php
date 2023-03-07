<?php 

    // add theme supports
    add_theme_support( "widgets" );

    //add_theme_support( "menus" );

    // Remove wp version number from scripts and styles
    function remove_css_js_version( $src ) {
        if( strpos( $src, '?ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }

    add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
    add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );


   // Add and Enqueue Theme Assets 
   function add_theme_assets() {

           // register styles
        wp_enqueue_style( 'style', get_stylesheet_uri() );     
    
        
        // register scripts
        wp_enqueue_script( 'app', get_template_directory_uri() . '/_assets/scripts/app.js' );
        
    }

    add_action( 'wp_enqueue_scripts', 'add_theme_assets' );  

    // Dynamic Sidebars and Widget Area
    register_sidebar( array (

        'name' => __( 'HTML Block 1'),
        'id' => 'jgblog_html_one',
        'description' => __( 'HTML Block 1 - Enter the custom html for this widget area') 
       )
    );  

    register_sidebar( array (

        'name' => __( 'HTML Block 2'),
        'id' => 'jgblog_html_two',
        'description' => __( 'HTML Block 2 - Enter the custom html for this widget area') 
        )
    );    

    register_sidebar( array (

        'name' => __( 'Recent Posts'),
        'id' => 'jgblog_recentposts',
        'description' => __( 'Recent Blog Posts Widget Area - Enter the custom html for this widget area') 
        )
    );   

    register_sidebar( array (

        'name' => __( 'Search Widget'),
        'id' => 'jgblog_search_one',
        'description' => __( 'Search Widget - Make a Search') 
        )
    );    

    register_sidebar( array (

        'name' => __( 'Archive Widget'),
        'id' => 'jgblog_archive_one',
        'description' => __( 'Archive Widget - View the date archives') 
        )
    );   


    // Registers the main nav menu


    // Register Nav Menus
    function main_jgdm_menu(){
        
        register_nav_menus( array(
            'main_menu' => __( 'main_site_menu', 'jgdm_blog' )
        ) );
    }

    add_action( 'init', 'main_jgdm_menu' );  



?>



<?php

/* HOOKS AND FUNCTIONS 

    // Add Theme Supports
    add_theme_support("menus");
    add_theme_support("widgets");
    

    // Hide Menu Items
    function posts_hide()      
    { 
        //creating functions post_remove for removing menu item
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
    }

    add_action('admin_menu', 'posts_hide');   //adding action for triggering function call


    // Add and Enqueue Theme Assets 
    function add_theme_assets() {

        // register styles
        wp_register_style( 'slick-css', get_template_directory_uri() . '/assets/slick/slick.css' );   
        wp_register_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css' ); 
        wp_register_style( 'lightbox-theme', get_template_directory_uri() . '/assets/lightbox/lightbox.css' ); 
        wp_enqueue_style( 'lightbox-theme', get_template_directory_uri() . '/assets/lightbox/lightbox.css' ); 
        wp_enqueue_style( 'style', get_stylesheet_uri() );     
    
        
        // register scripts
        wp_enqueue_script( 'jquery', get_template_directory_uri() .'/scripts/jquery.js' );
        wp_enqueue_script( 'jquery-min', get_template_directory_uri() .'/scripts/jquery-1.11.0.min.js' );
        wp_enqueue_script( 'slick-min-js', get_template_directory_uri() .'/assets/slick/slick.min.js' );
        wp_enqueue_script( 'lightbox', get_template_directory_uri() .'/scripts/lightbox.js' );
        wp_enqueue_script( 'app', get_template_directory_uri() . '/scripts/app.js' );
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }

    add_action( 'wp_enqueue_scripts', 'add_theme_assets' );  



    // Rename Pages Menu
    function wd_admin_menu_rename() {

        global $menu; // Global to get menu array
        $menu[20][0] = 'Creative IO <br />Website Pages'; 
    }

    add_action( 'admin_menu', 'wd_admin_menu_rename' );


    
    // Dynamic Sidebars
    register_sidebar( array (

        'name' => __( 'Request Estimate'),
        'id' => 'request-estimate-cf7',
        'description' => __( 'Contact Form 7 - Estimate Form') ,
        'before_widget' => ''
        )
    );
    
    register_sidebar( array (

        'name' => __( 'Get in Touch Form'),
        'id' => 'main-form-cf7',
        'description' => __( 'Contact Form 7 - Main Form') ,
        'before_widget' => ''
        )
    );       
    
    register_sidebar( array (

        'name' => __( 'HTML Widget'),
        'id' => 'html_widget',
        'description' => __( 'Testimonial Widget Area') 
        )
    );     
    
    register_sidebar( array (

        'name' => __( 'Social Widget'),
        'id' => 'social_widget',
        'description' => __( 'Social and Contact Information Area') 
        )
    );   
    
    register_sidebar( array (

        'name' => __( 'Contact Information Widget'),
        'id' => 'contactinfo_widget',
        'description' => __( 'Contact Information Widget') 
        )
    );   


    // Register all shortcodes here    
    add_action( 'init', 'register_shortcodes' );

    function register_shortcodes() {

        add_shortcode( 'simple_slick_slider', 'sc_simple_slick_slider' );
        add_shortcode( 'post_slick_carousel_slider', 'sc_post_slick_carousel_slider' );
    }



    // Register all shortcodes here     
    function sc_simple_slick_slider ( $atts ) {

        $output = '<div class="simple-slick-slider">';
        $output .= '<p>content</p>';
	    $output .= '</div>';

    }
    

    add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
    add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );

?>
*/
?>