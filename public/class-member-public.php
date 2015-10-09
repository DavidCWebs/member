<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Member
 * @subpackage Member/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Member
 * @subpackage Member/public
 * @author     Your Name <email@example.com>
 */
class Member_Public {

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
	 * @param      string    $member       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $member, $version ) {

		$this->member = $member;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->member, plugin_dir_url( __FILE__ ) . 'css/member-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//wp_enqueue_script( $this->member, plugin_dir_url( __FILE__ ) . 'js/member-public.js', array( 'jquery' ), $this->version, false );
		if (is_page('staff-registration') ) {

      wp_register_script('carawebs_user_reg_script', plugin_dir_url( __FILE__ ) . 'js/registration.js', array('jquery'), null, false);

      wp_enqueue_script('carawebs_user_reg_script');

      $current_user = wp_get_current_user();            // gets the current user object
      $user_id = $current_user->ID;

      wp_localize_script( 'carawebs_user_reg_script', 'carawebsRegVars', array(
        'carawebsAjaxURL' => admin_url( 'admin-ajax.php' ),
        'carawebsCoordinatorID' => $user_id, // This passes the user ID of the originating user (with the custom role 'coordinator')
        )
      );

    }

	}

}
