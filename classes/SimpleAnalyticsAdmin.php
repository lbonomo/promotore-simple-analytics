<?php 

class SimpleAnalyticsAdmin {

    public function __construct() {
        add_action('admin_init', array($this, 'simple_analytics_register_setting'));
        add_action('admin_menu', array($this, 'simple_analytics_menu'));
    }

    # SECTION
    function simple_analytics_register_setting() {     

        // Section
        add_settings_section(
            'simple-analytics-options-section',
            'Opciones de Simple Analytics',
            array($this, 'simple_analytics_section_callback'),
            'simple-analytics-settings');

        # Registro el "permiso" 
        register_setting(
            # Nombre del grupo de configuración
            'simple-analytics-settings',
            # Nombre del valor a guardar
            'ptr_analytics_code');

        /* CAMPOS */
        /**** Codigo de seguimiento ****/            
        add_settings_field(
            'ptr_analytics_code',
            'Código de seguimiento',
            array($this,'textare_callback'),
            'simple-analytics-settings',            # Menu donde se muestra
            'simple-analytics-options-section',     # Seccion donde se agraga
            [
                'label_for' => 'ptr_analytics_code',
                'description' => 'Pegue aqui el codigo de seguimiento de Google',
                'class' => 'large-text',
            ]
        );
    }

    function simple_analytics_section_callback() {
        # Output nonce, action, and option_page fields for a settings page
        settings_fields('simple-analytics-settings');
    }

    # Funcion Callback del Textarea
    function textare_callback($args) {
        $value = get_option($args['label_for']);
        $value = isset($value) ? esc_attr($value) : '';
        $name = $args['label_for'];
        $description = $args['description'];
        $class = $args['class'];
        $html = "<textarea rows='8' name='$name' class='$class'>$value</textarea>";
        if ($description !== null ) { $html .= "<p class='description'>$description</p>"; }
        echo $html;
    }

    # Registro el Muenu
    function simple_analytics_menu() {
        add_options_page(
            'Simple Analytics Config',
            'Simple Analytics', 
            'manage_options',
            'simple-nalytics-settings',
            array( $this, 'simple_analytics_page_display')
        );
    }

    # Pagina a mostrar en ese menu
    static function simple_analytics_page_display() {  
        # Verifico permisos
        if (current_user_can('manage_options')) {
            echo '<form action="options.php" method="post">';
            # Prints out all settings sections added to a particular settings page. 
            do_settings_sections('simple-analytics-settings');
            submit_button("Grabar");
            echo '</form>';          
        }
    }



}
?>
