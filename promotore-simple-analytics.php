<?php
/**
 * Simple Analytics
 *
 * @package Simple_Analytics
 * @author      Lucas Bonomo
 * @copyright   2025 Lucas Bonomo
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:  Simple Analytics
 * Plugin URI:   https://lucasbonomo.com/wordpress/plugins/promotore-simple-analytics
 * Description:  A simple Google Analytics (and Tab Manager) plugin for WordPress
 * Version:      1.4.4
 * Stable tag:   1.4.4
 * Requires PHP: 7.0
 * Tested up to: 6.7.1
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

require_once 'classes/class-simpleanalytics.php';

/**
 * Activate plugin
 */
function activate_simple_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-simpleanalyticsactivator.php';
	SimpleAnalyticsActivator::activate();
}

/**
 * Deactivate plugin
 */
function deactivate_simple_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-simpleanalyticsdeactivator.php';
	SimpleAnalyticsDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_simple_analytics' );
/**
 * Activate plugin
 */
function simple_analytics_run() {
	$plugin = new SimpleAnalytics();
}

simple_analytics_run();
