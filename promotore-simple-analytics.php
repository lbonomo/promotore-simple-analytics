<?php
/**
 * @package Promotore Simple Analytics
 */

/*
 * Plugin Name: Promotore Simple Analytics
 * Plugin URI: https://promotore.com.ar/wordpress-plugins/
 * Description: A simple Google Analytics plugin for WordPress
 * Version: 1.0.0
 * Author: Lucas Bonomo
 * Author URI: https://lucasbonomo.com/wordpress
 * License: GPLv2 or later
 * Text Domain: promotore-simple-analytics
 * Domain Path: /languages
 */

require_once "classes/SimpleAnalytics.php";


if ( ! defined( 'ABSPATH' ) ) { exit; }

/**** Activator ****/
register_activation_hook( __FILE__,  array( 'SimplaAnalytics', 'activate' ) );

/**** Deactivator ****/
register_deactivation_hook( __FILE__,  array( 'SimplaAnalytics', 'deactivation' ) );

/**** Uninstall ****/
register_uninstall_hook( __FILE__,  array( 'SimplaAnalytics', 'uninstall' ) );


function simple_analytics_run() {
    $plugin = new SimpleAnalytics();
}

simple_analytics_run();
