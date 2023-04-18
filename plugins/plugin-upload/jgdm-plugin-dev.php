<?php 

/**
* Plugin Name: JGDM Plugin Dev
* Plugin URI: https://wordpress.jonniegrieve.co.uk
* Description: JGDM Development Plugin - The goal of this plugin is run some menu customisations to the admin area.
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

    add_option( 'Activated_Plugin', 'jgdm-plugin-dev' );
  
    /* activation code here */
    var_dump("activation function");
}
  
register_activation_hook( 'activate_jgdm-plugin-dev.php', 'activate_jgdm_plugin' );


//deactivate plugin
function deactivate_jgdm_plugin() {

    add_option( 'Activated_Plugin', 'jgdm-plugin-dev' );

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


function print_hello_world_title() {
    
  echo "<h1>Hello World</h1>"; 
}

function hello_world_admin_menu() {
    
  add_menu_page(
    'Hello World', // page title  
    'Hello World Menu Title', // menu title  
    'manage_options', // capability  
    'hello-world', // menu slug  
    'print_hello_world_title' // callback function  
  );  
}  


//add_action( 'init', 'jgdm_dev_register_cpt' );  //hook blog posts custom post type function
//add_action( 'init', 'jgdm_dev_custom_fields' ); //custom fields in code. 
add_action( 'admin_menu', 'hello_world_admin_menu' ); // 
// add_action( 'admin_menu', 'print_hello_world_title' ); // https://www.codeable.io/blog/wordpress-plugin-development/


/********
* Run the Code
*******/
 function run_jgdm_dev_plugin() {

	$plugin = new Plugin_Name();
	$plugin->run();

 }

run_jgdm_dev_plugin();
 
