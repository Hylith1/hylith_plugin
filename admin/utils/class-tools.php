<?php

/**
 * The admin-controller abstract class of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/controllers
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/utils
 * @author     Hylith1
 */
class Tools {

    /**
	 * Get parameters safely.
	 *
	 * @since    1.0.0
	 */
	public static function get_parameter( $key, $type = "" ) {

		if ( ! isset( $_REQUEST[ $key ] ) || empty( $_REQUEST[ $key ] ) ) {
			return null;
		}

		$data = null;

		switch ($type) {
			case 'text':
				$data = strip_tags( (string) wp_unslash( sanitize_text_field( $_REQUEST[ $key ] ) ) );
				break;
			
			default:
				$data = strip_tags( (string) wp_unslash( $_REQUEST[ $key ] ) );
				break;
		}

		return $data; 

	}

}