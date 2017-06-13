<?php

/* 
 * Este archivo contiene el codigo necesario para mostrar el menu y la pagina
 * de configuracion (dentro del panel de control de Wordpress)
 */

// Agrego el Menu "Ajustes -> Analytics"
function ptr_analytics_custom_admin_menu() {
    add_options_page(
        'Simple Analytics (by Promotore)',  // page title
        'Simple Analytics',                 // menu title
        'manage_options',                // capability required to see the page
        'ptr_analytics_options',            // admin page slug, e.g. options-general.php?page=ptr_banner_options
        'ptr_analytics_options_page'        // callback function to display the options page options.php
    );
}
add_action( 'admin_menu', 'ptr_analytics_custom_admin_menu' );

