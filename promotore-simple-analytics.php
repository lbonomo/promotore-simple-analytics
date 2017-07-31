<?php
/**
 * @package Promotore Simple Analytics 
 */

/*
 * Plugin Name: Promotore Simple Analytics
 * Plugin URI: https://promotore.com.ar/wordpress-plugins/
 * Description: A simple Google Analytics plugin for WordPress
 * Version: 0.0.2
 * Author: Lucas Bonomo
 * Author URI: https://lucasbonomo.com
 * License: GPLv2 or later
 * Text Domain: promotore-simple-analytics
 * Domain Path: /languages
 */


// Menu "Ajustes -> Simple Analytics" y pagina de configuracion.
include_once(plugin_dir_path( __FILE__ ).'options.php');

// Pagina de configuracion
include_once(plugin_dir_path( __FILE__ ).'options_page.php');

// Implementacion del codigo de seguimiento
function ptr_analytics_put_code () {
        echo "<!-- Google Analytics by Promotore -->\n";
        echo get_option( 'ptr_analytics_code' )."\n";
        echo "<!-- Google Analytics by Promotore -->\n";
}
add_action( 'wp_head', 'ptr_analytics_put_code' );