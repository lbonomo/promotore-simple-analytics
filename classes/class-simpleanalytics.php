<?php
/**
 * Archivo principal de la clase
 *
 * @package Simple Analytics
 */

/* Simple Analytics Class file */
require_once 'class-simpleanalyticsadmin.php';
require_once 'class-simpleanalyticshead.php';

/**
 * Main class
 */
class SimpleAnalytics {

	/**
	 * La documentacion el constructor.
	 */
	public function __construct() {
		$admin_page = new SimpleAnalyticsAdmin();
		$head       = new SimpleAnalyticsHead();
	}
}
