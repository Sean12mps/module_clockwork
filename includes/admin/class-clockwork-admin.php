<?php 
// 	Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 	Clockwork Admin Class
 */
class Clockwork_Admin {


	/**
	 * 	__construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		add_action( 'admin_init', array( $this, 'includes' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}


	/**
	 * 	Include any classes we need within admin.
	 */
	public function includes() {

		include_once( 'class-clockwork-meta-box.php' );
	}


	/**
	 * 	Admin only css
	 */
	public function admin_enqueue_scripts() {

		wp_enqueue_style( 'clockwork-admin', CFX_CLOCKWORK_CSS . '/admin-style.css' );
	}
}

new Clockwork_Admin();