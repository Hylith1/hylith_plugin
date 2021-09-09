<?php


/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin
 * @author     Hylith1
 */
class Hylith_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_dependencies();

	}
	
	/**
	 * Load the required dependencies for this class.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/utils/class-tools.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/controllers/class-core-controller.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/controllers/class-login-controller.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/controllers/class-roles-controller.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/controllers/class-things-controller.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/controllers/class-historical-controller.php';

	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hylith_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hylith_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hylith-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hylith_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hylith_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hylith-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function handle_action( $section, $action ) {
		
		$controller = null;
		
		switch ( $section ) {

			case 'login':
				$controller = new Login_Controller();
				break;
			case 'roles':
				$controller = new Roles_Controller();
				break;
			case 'things':
				$controller = new Things_Controller();
				break;
			case 'historical':
				$controller = new Historical_Controller();
				break;

			default:
				break;
		}
		
		$data = $controller->handle_action( $action );
		return $data;
	}

	/**
	 * Display the page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function get_admin_view() {

		$section = Tools::get_parameter("section") != null ? Tools::get_parameter("section") : "login";
		$action = Tools::get_parameter("action") != null ? Tools::get_parameter("action") : "";

		$data = $this->handle_action( $section, $action );

		$plugin_admin_url = get_admin_url().'admin.php?page=hylith-plugin';

		$menu_items = $this->create_admin_menu( $plugin_admin_url );

		include( 'partials/admin-display.php' );

	}

	/**
	 * Create the sub menu for the admin page.
	 *
	 * @since    1.0.0
	 */
	public function create_admin_menu( $plugin_admin_url ) {

		return array( 
			array( 'name' => 'login', 'url' => $plugin_admin_url.'&section=login' ),
			array( 'name' => 'roles', 'url' => $plugin_admin_url.'&section=roles' ),
			array( 'name' => 'things', 'url' => $plugin_admin_url.'&section=things' ),
			array( 'name' => 'historical', 'url' => $plugin_admin_url.'&section=historical' ),
		);
	}

	/**
	 * Register the menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function display_admin_menu() {

		/** 
		 * page_title
		 * menu_title
		 * capability
		 * menu_slug
		 * function null
		*/
		add_menu_page(
			__( "Hylith Plugin", "hylith-plugin" ),
			__( "Hylith Plugin", "hylith-plugin" ),
			"manage_options",
			"hylith-plugin",
			array( $this, "get_admin_view")
		);

	}
}
