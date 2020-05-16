<?php
/**
 * Archivo principal de la clase
 *
 * @package Simple Analytics
 */

/**
 * Admin class.
 */
class SimpleAnalyticsAdmin {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'simple_analytics_register_setting' ) );
		add_action( 'admin_menu', array( $this, 'simple_analytics_menu' ) );
	}

	/**
	 * Setings and options.
	 */
	public function simple_analytics_register_setting() {

		/**** Section */
		add_settings_section(
			'simple-analytics-options-section',
			'Opciones de Simple Analytics',
			array( $this, 'simple_analytics_section_callback' ),
			'simple-analytics-settings'
		);

		/**** Codigo de seguimiento */
		// Setting.
		register_setting(
			// Nombre del grupo de configuración.
			'simple-analytics-settings',
			// Nombre del valor a guardar.
			'ptr_analytics_code'
		);

		// Render.
		add_settings_field(
			'ptr_analytics_code',
			'Código de seguimiento de Google Analytics',
			array( $this, 'textare_callback' ),
			'simple-analytics-settings',            // Menu donde se muestra.
			'simple-analytics-options-section',     // Seccion donde se agraga.
			array(
				'label_for'   => 'ptr_analytics_code',
				'description' => 'Pegue aqui el codigo de seguimiento de Google Analytics',
				'class'       => 'large-text',
			)
		);

		/**** Codigo de Tab Manager */
		// Setting.
		register_setting(
			// Nombre del grupo de configuración.
			'simple-analytics-settings',
			// Nombre del valor a guardar.
			'ptr_tagmanager_code'
		);

		// Render.
		add_settings_field(
			'ptr_tagmanager_code',
			'Código Google Tag Manager',
			array( $this, 'textare_callback' ),
			'simple-analytics-settings',            // Menu donde se muestra.
			'simple-analytics-options-section',     // Seccion donde se agraga.
			array(
				'label_for'   => 'ptr_tagmanager_code',
				'description' => 'Pegue aquí el codigo de Google Tag Manager',
				'class'       => 'large-text',
			)
		);

		/**** Codigo de Tab Manager */
		// Setting.
		register_setting(
			// Nombre del grupo de configuración.
			'simple-analytics-settings',
			// Nombre del valor a guardar.
			'ptr_noscript_code'
		);

		// Render.
		add_settings_field(
			'ptr_noscript_code',
			'Código noscript',
			array( $this, 'textare_callback' ),
			'simple-analytics-settings',            // Menu donde se muestra.
			'simple-analytics-options-section',     // Seccion donde se agraga.
			array(
				'label_for'   => 'ptr_noscript_code',
				'description' => 'Pegue aquí el codigo de Google Tag Manager (noscript)',
				'class'       => 'large-text',
			)
		);
	}


	/**
	 * Callback
	 */
	public function simple_analytics_section_callback() {
		// Output nonce, action, and option_page fields for a settings page.
		settings_fields( 'simple-analytics-settings' );
	}

	/**
	 * Funcion Callback del Textarea.
	 *
	 *  @param array $args Settings values.
	 */
	public function textare_callback( $args ) {
		$value       = get_option( $args['label_for'] );
		$value       = isset( $value ) ? esc_attr( $value ) : '';
		$name        = $args['label_for'];
		$description = $args['description'];
		$class       = $args['class'];
		$html        = "<textarea rows='9' name='$name' class='$class'>$value</textarea>";
		if ( null !== $description ) {
			$html .= "<p class='description'>$description</p>"; }

		// Just available a textarea.
		$allowed_html = array(
			'textarea' => array(
				'rows'  => array(),
				'name'  => array(),
				'class' => array(),
			),
		);
		echo wp_kses( $html, $allowed_html );
	}

	/** Registro el Muenu.*/
	public function simple_analytics_menu() {
		add_options_page(
			'Simple Analytics Config',
			'Simple Analytics',
			'manage_options',
			'simple-analytics-settings',
			array( $this, 'simple_analytics_page_display' )
		);
	}

	/** Pagina a mostrar en ese menu. */
	public static function simple_analytics_page_display() {
		// Verifico permisos.
		if ( current_user_can( 'manage_options' ) ) {
			echo '<form action="options.php" method="post">';
			// Prints out all settings sections added to a particular settings page.
			do_settings_sections( 'simple-analytics-settings' );
			submit_button( 'Grabar' );
			echo '</form>';
		}
	}



}
