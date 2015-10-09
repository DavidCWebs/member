<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Member
 * @subpackage Member/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Member
 * @subpackage Member/admin
 * @author     Your Name <email@example.com>
 */
class Member_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $member    The ID of this plugin.
	 */
	private $member;

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
	 * @param      string    $member       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $member, $version ) {

		$this->member = $member;
		$this->version = $version;

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
		 * defined in Member_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Member_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->member, plugin_dir_url( __FILE__ ) . 'css/member-admin.css', array(), $this->version, 'all' );

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
		 * defined in Member_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Member_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->member, plugin_dir_url( __FILE__ ) . 'js/member-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Set custom templates for this plugin's content
	 *
	 * @param  [type] $page_template [description]
	 * @return [type]                [description]
	 */
	public function staff_registration_page_template( $page_template ) {

		if ( is_page( 'staff-registration' ) ) {

			$page_template = plugin_dir_path( dirname( __FILE__ ) ) . '/templates/staff-registration.php';

		}

		return $page_template;

	}

}
