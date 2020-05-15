<?php
/**
 * @package Simple Analytics
 */

/*
 * Plugin Name: Simple Analytics
 * Plugin URI: https://lucasbonomo.com/wordpress/
 * Description: A simple Google Analytics (and Tab Manager) plugin for WordPress
 * Version: 1.2.1
 * Author: Lucas Bonomo
 * Author URI: https://lucasbonomo.com/wordpress
 * License: GPLv2 or later
 * Text Domain: promotore-simple-analytics
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once "classes/SimpleAnalytics.php";


function activate_simple_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/SimpleAnalyticsActivator.php';
	SimpleAnalyticsActivator::activate();
}

function deactivate_simple_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/SimpleAnalyticsDeactivator.php';
	SimpleAnalyticsDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_simple_analytics' );

function simple_analytics_run() {
    $plugin = new SimpleAnalytics;
}

simple_analytics_run();
