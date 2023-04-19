<?php 

/**

* JGDM Plugin Dev

* @package JGDMPluginDev
* @author Jonathan Grieve @jg_digitalMedia
* @copyright 2023 @jg_digitalMedia
* @license license zero
*
* @wordpress-plugin
* Plugin Name: JGDM Plugin Dev
* Plugin URI: https://wordpress.jonniegrieve.co.uk
* Description: JGDM Development Plugin - The goal of this plugin is to run some menu customisations to the admin area.
* Version: 1.1.0
* Author: Jonathan Grieve @jg_digitalMedia
* Author URI: https://www.jonniegrieve.co.uk
* License: GPL2
* Text Domain: jgdm_blog

*/

define( 'jgdm-plugin-dev', '1.0.0' );


// STEP 1 PLUGIN ASSETS - load plugin assets 
$plugin_styling = plugins_url( 'app.css', __FILE__ );
$plugin_script = plugins_url( 'app.js', __FILE__ );
//returns full URL to myscript.js, such as example.com/wp-content/plugins/myplugin/myscript.js.

wp_enqueue_script( 'jgdm_plugin_script', $plugin_script, false, false, false );
wp_enqueue_style( 'jgdm_plugin_stylesheet', $plugin_styling, false, false, false );
 

// STEP 2 - PLUGIN LIFECYCLE HOOKS

// activate plugin
function jgdm_plugin_dev_activate() {

    add_option( 'Activated_Plugin', 'jgdm-plugin-dev.php' );
    
    var_dump("activation function");
}
  
register_activation_hook( 'jgdm-plugin-dev.php', 'jgdm_plugin_dev_activate' );


// deactivate plugin
function jgdm_plugin_dev_deactivate() {

    add_option( 'Deactivated_Plugin', 'jgdm-plugin-dev.php' );
    
    var_dump("deactivation function");
}
  
register_deactivation_hook( 'jgdm-plugin-dev.php', 'jgdm_plugin_dev_deactivate' );


// hook to uninstall plugin
function jgdm_plugin_dev_uninstall(){

    
    var_dump("uninstall function");
}

register_uninstall_hook('jgdm-plugin-dev.php', 'jgdm_plugin_dev_uninstall');


// STEP 3 - WRITE PLUGIN FUNCTIONALITY
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



// STEP 4 - RUN THE CODE
function run_jgdm_dev_plugin() {

    //$plugin = new JGDMPluginDev();
	//$plugin->run();

 }

// run_jgdm_dev_plugin();