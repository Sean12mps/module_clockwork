<?php 
// 	Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 	Clockwork Metabox Class
 */
class Clockwork_Meta_Box {


	/**
	 * 	Constructor
	 */
	public function __construct() {

		// 	Includes
		add_action( 'admin_init', array( $this, 'includes' ) );

		// 	Actions
		add_action( 'add_meta_boxes', array( $this, 'remove_meta_boxes' ), 10 );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 30 );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 1, 2 );
	}


	/**
	 * 	Metabox Includes
	 */
	public function includes() {

		include_once( 'clockwork-meta-box-functions.php' );
	}


	/**
	 * 	Add Meta boxes
	 */
	public function add_meta_boxes() {

		// 	Builder
		$screens = array( 'post', 'page' );

		foreach ( $screens as $screen ) {

			add_meta_box( 'clockwork_interface', __( 'Clockwork Interface', 'clockwork' ), 'Clockwork_Meta_Box::output_metabox_clockwork_interface', $screen );
		}
	}


	/**
	 * 	Remove Meta-boxes
	 */
	public function remove_meta_boxes() {
	}


	/**
	 * 	Meta-box clockwork_interface
	 */
	public function output_metabox_clockwork_interface( $post ){

		$post_id = $post->ID;

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'clockwork_interface', 'clockwork_meta_box_nonce' );


	}


	/**
	 * 	Saving Meta-boxes
	 *
	 * 	@param  int $post_id
	 * 	@param  object $post
	 */
	public function save_meta_boxes( $post_id, $post ) {

		// 	$post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) ) {
			return;
		}

		// 	Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// 	PROCESS ACTIONS HERE
	}
}


new Clockwork_Meta_Box();
