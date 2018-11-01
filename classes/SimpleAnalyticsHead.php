<?php

class SimpleAnalyticsHead {
    public function __construct() {
        add_action( 'wp_head', array($this, 'ptr_analytics_put_code'));
    }

    // Implementacion del codigo de seguimiento
    function ptr_analytics_put_code () {
        // error_log("Analytics (code):\n".get_option( 'ptr_analytics_code' ));
        echo "<!-- Simple Analytics Code -->\n";
        echo get_option('ptr_analytics_code')."\n";
        echo "<!-- Simple Analytics Code -->\n";
    }
}