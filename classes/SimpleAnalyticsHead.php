<?php

class SimpleAnalyticsHead {
    public function __construct() {
        add_action( 'wp_head', array($this, 'ptr_analytics_put_code'));
        # No es optimo pero quiero que sea independiente del Theme
        add_action( 'wp_head', array($this, 'ptr_tagmanager_put_code'));
        # TODO - Es necesario mover debajo de la etiqueta <body>
        add_action( 'wp_footer', array($this, 'ptr_noscript_put_code'), 1);
    }

    // Implementacion del codigo de seguimiento
    function ptr_analytics_put_code () {
        // error_log("Analytics (code):\n".get_option( 'ptr_analytics_code' ));
        echo "\n";
        echo get_option('ptr_analytics_code')."\n";
        echo "\n";
    }

    // Implementacion del codigo de seguimiento
    function ptr_tagmanager_put_code () {
        // error_log("Analytics (code):\n".get_option( 'ptr_analytics_code' ));
        echo "\n";
        echo get_option('ptr_tagmanager_code')."\n";
        echo "\n";
    }

    // Implementacion del codigo de seguimiento
    function ptr_noscript_put_code () {
        // error_log("Analytics (code):\n".get_option( 'ptr_analytics_code' ));
        echo "\n";
        echo get_option('ptr_noscript_code')."\n";
        echo "\n";
    }

}
