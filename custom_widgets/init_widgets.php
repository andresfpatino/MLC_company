<?php

class My_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}
		return static::$instance;
	}

	protected function __construct() {
		require_once('widget_hero-services.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Hero_services() );
	}
}

function my_elementor_init() {
	My_Elementor_Widgets::get_instance();
}
add_action( 'init', 'my_elementor_init' );