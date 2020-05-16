<?php
/**
 * File of deactivate plugin.
 *
 * @package Simple Analytics
 */

/**
 * Put code in head.
 */
class SimpleAnalyticsHead {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'head_code' ) );
		add_action( 'wp_body_open', array( $this, 'body_code' ), 1 );
	}


	/**
	 * Implementacion del codigo de seguimiento.
	 */
	public function head_code() {

		if ( get_option( 'ptr_analytics_code' ) ) {
			echo "\n";
			echo get_option( 'ptr_analytics_code' ) . "\n"; // phpcs:ignore
			echo "\n";
		};

		if ( get_option( 'ptr_tagmanager_code' ) ) {
			echo "\n";
			echo get_option( 'ptr_tagmanager_code' ) . "\n"; // phpcs:ignore
			echo "\n";
		};

	}

	/**
	 * Implementacion del codigo de seguimiento.
	 */
	public function body_code() {

		if ( get_option( 'ptr_noscript_code' ) ) {
			echo "\n";
			echo get_option( 'ptr_noscript_code' ) . "\n"; // phpcs:ignore 
			echo "\n";
		};

	}

}
