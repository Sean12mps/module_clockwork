<?php 

// 	Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*	Class Clockwork
 */
class Clockwork {
	

	/**
	 * 	@var string
	 */
	public $version = '1.0.0';


	/**
	 * 	Single Instance
	 */
	protected static $_instance = null;


	/**
	 * 	Constructor
	 */
	public function __construct() {

		// 	Define Constants
		$this->define_constants();

		// 	Includes
		add_action( 'init', array( $this, 'includes' ) );

		// 	Actions

	}


	/**
	 * 	Instance
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {

			self::$_instance = new self();
		}

		return self::$_instance;
	}


	/**
	 * 	Define Constants
	 */
	private function define_constants() {

		// 	Define root directory constant
		! defined( 'CALIBREFX_CLOCKWORK' ) && define( 'CALIBREFX_CLOCKWORK', CALIBREFX_MODULE_URL . '/calibrefx-module-clockwork' );

		// 	Define assets directory constant
		! defined( 'CFX_CLOCKWORK_ASSETS' ) && define( 'CFX_CLOCKWORK_ASSETS', CALIBREFX_MODULE_URL . '/calibrefx-module-clockwork/assets' );
		! defined( 'CFX_CLOCKWORK_JS' ) && define( 'CFX_CLOCKWORK_JS', CALIBREFX_MODULE_URL . '/calibrefx-module-clockwork/assets/js' );
		! defined( 'CFX_CLOCKWORK_CSS' ) && define( 'CFX_CLOCKWORK_CSS', CALIBREFX_MODULE_URL . '/calibrefx-module-clockwork/assets/css' );
		! defined( 'CFX_CLOCKWORK_IMG' ) && define( 'CFX_CLOCKWORK_IMG', CALIBREFX_MODULE_URL . '/calibrefx-module-clockwork/assets/img' );

		// 	Define child directory constant
		! defined( 'CFX_CLOCKWORK_CHILD' ) && define( 'CFX_CLOCKWORK_CHILD', CHILD_URI . '/clockwork' );
	}

	/**
	 * Include classes.
	 */
	public function includes() {

		// 	Functions
		include_once( 'includes/clockwork-functions.php' );

		// 	Classes
		include_once( 'includes/clockwork-core.php' );

		// 	Classes for admin
		if ( is_admin() ) {
			include_once( 'includes/admin/class-clockwork-admin.php' );
		}
		
		// 	Classes we need during ajax requests
		if ( defined( 'DOING_AJAX' ) ) {
			include_once( 'includes/class-clockwork-ajax.php' );
		}
	}
}


function CRK() {
	return Clockwork::instance();
}

$GLOBALS['clockwork_module'] = new Clockwork();