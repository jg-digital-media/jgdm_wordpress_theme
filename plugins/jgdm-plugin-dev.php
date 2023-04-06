<?php 

/**
* Plugin Name: JGDM Development Plugin
* Plugin URI: https://wordpress.jonniegrieve.co.uk
* Description: JGDM Development Plugin - The goal of this plugin is to answer the problem of using a custom post type to handle post pagination correctly.
* Version: 1.1.0
* Author: Jonathan Grieve @jg_digitalMedia
* Author URI: https://www.jonniegrieve.co.uk
* License: GPL2
* Text Domain: jgdm_blog

*/


//define( 'jgdm-plugin-dev', '1.0.0' );

/***

Plugin Assets

****/
$plugin_styling = plugins_url( 'app.css', 'jgdm-plugin-dev.php' );
$plugin_script = plugins_url( 'app.js', 'jgdm-plugin-dev.php' );
//returns full URL to myscript.js, such as example.com/wp-content/plugins/myplugin/myscript.js.

wp_enqueue_script( 'jgdm_plugin_script', $plugin_script, false, false, false );
wp_enqueue_style( 'jgdm_plugin_stylesheet', $plugin_styling, false, false, false );


//activate plugin
function activate_jgdm_plugin() {

    //add_option( 'Activated_Plugin', 'Plugin-Slug' );
  
    /* activation code here */
    var_dump("activation function");
}
  
register_activation_hook( 'activate_jgdm-plugin-dev.php', 'activate_jgdm_plugin' );


//deactivate plugin
function deactivate_jgdm_plugin() {

    //add_option( 'Activated_Plugin', 'Plugin-Slug' );

    /* activation code here */
    var_dump("deactivation function");
}
  
register_activation_hook( 'deactivate_jgdm-plugin-dev.php', 'deactivate_jgdm_plugin' );


//hook to uninstall plugin
function jgdm_uninstall_plugin(){
    //register_uninstall_hook( 'jgdm-plugin-dev', 'jgdm_uninstall_plugin' );
    var_dump("uninstall function");
}

register_uninstall_hook('jgdm-plugin-dev', 'jgdm_uninstall_plugin');


/*********
Main Plugin functionality
*********/

function jgdm_dev_register_cpt() {

    echo "jgdm_dev_register_cpt() activated";


    $labels = array( 

        'name' => __( 'My Blogs (Code)', 'jgdm_blog' ),

        'singular_name' => __( 'My Blog (Code)', 'jgdm_blog' ),

        'add_new' => __( 'Add New Blog (Code)', 'jgdm_blog' ), 

        'add_new_item' => __( 'JGDM: Create New Entry (Code)', 'jgdm_blog' ),

        'edit_item' => __( 'JGDM: Edit Blog Entry (Code)', 'jgdm_blog' ),

        'view_item' => __( 'View Blog (Code)', 'jgdm_blog' ),

        'all_items' => __( 'Blog List (Code)', 'jgdm_blog' ),

    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array (
            'title',
            
            'editor',
            
            'excerpt',
            
            'custom-fields',
            
            'thumbnail',
            
            'page-attributes',
            
        ),

        'rewrite' => array( 'slug' => '_blog_posts'), 
        'show_in_rest' => true
    
    );
    
    register_post_type('blog_posts', $args);
        
}

function jgdm_dev_custom_fields() {

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_5fd23fadacfcc',
            'title' => 'Article Title',
            'fields' => array(
                array(
                    'key' => 'field_5fd23fc604ba5',
                    'label' => 'Article Title',
                    'name' => 'article_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the article you want to appear on your page.',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'Article title should go here',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5fd2401a04ba6',
                    'label' => 'Article Featured Image',
                    'name' => 'article_featured_image',
                    'type' => 'image',
                    'instructions' => 'Add the image that you would like to use as the featured image for this post.',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'large',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5fd2406604ba7',
                    'label' => 'Article Blurb',
                    'name' => 'article_blurb',
                    'type' => 'textarea',
                    'instructions' => 'This is the content that you would like to use as the preview text for your post. (max 200 chars)',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => 250,
                    'rows' => '',
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_5fd240e604ba8',
                    'label' => 'Article Content',
                    'name' => 'article_content',
                    'type' => 'wysiwyg',
                    'instructions' => 'The main content of your post will go here!',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'blog_posts',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
        
    endif;


}

function print_hello_world_title()  {
    
  echo "<h1>Hello World</h1>"; 
}

function hello_world_admin_menu()  {
    
  add_menu_page(
    'Hello World', // page title  
    'Hello World Menu Title', // menu title  
    'manage_options', // capability  
    'hello-world', // menu slug  
    'print_hello_world_title' // callback function  
  );  
}  



add_action( 'init', 'jgdm_dev_register_cpt' );  //hook blog posts custom post type function
add_action( 'init', 'jgdm_dev_custom_fields' ); //custom fields in code. 
add_action( 'admin_menu', 'hello_world_admin_menu' ); // https://www.codeable.io/blog/wordpress-plugin-development/


/********
* Run the Code
*******/
 function run_jgdm_dev_plugin() {

	$plugin = new Plugin_Name();
	$plugin->run();

 }

run_jgdm_dev_plugin();
 
