<?php
/*
Plugin Name: WPTT Form Serialize
Plugin URI: http://wpthemetutorial.com
Description: Demos how to serialize a whole from in one shot
Version: 1.0
Author: WP Theme Tutorial, Curtis McHale
Author URI: http://wpthemetutorial.com
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

require_once( 'shortcodes.php' );

class WPTT_Form_Serialize{

	function __construct(){


		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

		// ajax actions to toggle the availability of a call
		add_action( 'wp_ajax_wptt_form_action', array( $this, 'wptt_form_action' ) );
		add_action( 'wp_ajax_nopriv_wptt_form_action', array( $this, 'wptt_form_action' ) );

		// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );

	} // construct

	public function wptt_form_action(){

		check_ajax_referer( 'wptt_cereal', '_nonce' );

		wp_send_json_success( $_POST );

	} // wptt_form_action

	/**
	 * Registers and enqueues scripts and styles
	 *
	 * @uses    wp_enqueue_style
	 * @uses    wp_enqueue_script
	 *
	 * @since   1.0
	 * @author  SFNdesign, Curtis McHale
	 */
	public function enqueue(){

		// scripts plugin
		wp_enqueue_script( 'wptt_cereal_script', plugins_url( '/wptt-form-serialize/scripts.js' ), array( 'jquery', 'jquery-form' ), '1.0', true);
		wp_localize_script( 'wptt_cereal_script', 'WPTTCereal', array(
			'ajaxurl'     => admin_url( 'admin-ajax.php' ),
			'wptt_cereal' => wp_create_nonce( 'wptt_cereal' ),
		) );

	} // enqueue

	/**
	 * Fired when plugin is activated
	 *
	 * @param   bool    $network_wide   TRUE if WPMU 'super admin' uses Network Activate option
	 */
	public function activate( $network_wide ){

	} // activate

	/**
	 * Fired when plugin is deactivated
	 *
	 * @param   bool    $network_wide   TRUE if WPMU 'super admin' uses Network Activate option
	 */
	public function deactivate( $network_wide ){

	} // deactivate

	/**
	 * Fired when plugin is uninstalled
	 *
	 * @param   bool    $network_wide   TRUE if WPMU 'super admin' uses Network Activate option
	 */
	public function uninstall( $network_wide ){

	} // uninstall

} // WPTT_Form_Serialize

new WPTT_Form_Serialize();
