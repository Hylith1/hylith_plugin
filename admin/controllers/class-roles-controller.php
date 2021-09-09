<?php

/**
 * The roles-controller abstract class of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/controllers
 */

/**
 * The roles-controller abstract class of the plugin.
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/controllers
 * @author     Hylith1
 */
class Roles_Controller extends Core_Controller {

    public function handle_action( String $action ) {

		$data = array();

		switch ( $action ) {
			case 'add-role':
				break;

			case 'save-add-role':
				$this->save_add_role();
				$data = $this->get_roles_and_capabilities();
				break;

			case 'edit-roles':
				$data = $this->get_roles_and_capabilities();
				break;

			case 'delete-role':
				$this->delete_role();
				$data = $this->get_roles_and_capabilities();
				break;

			case 'save-edit-roles':
				$this->save_edit_roles();
				$data = $this->get_roles_and_capabilities();
				break;
			
			default:
				$data = $this->get_roles_and_capabilities();
				break;
		}

		
		return $data; 
	}

	/**
	 * Get roles and capabilities.
	 *
	 * @since    1.0.0
	 */
	public function get_roles_and_capabilities () {

		$roles = get_editable_roles();

		$capabilities = array();

		// Only some capabilites for an example.
		$limit = 8;
		$count = 0;

		foreach( $roles as $role ) {
			foreach( $role['capabilities'] as $key => $value ) {
				$count++;
				if ( $count > $limit ) {
					break;
				} else {
					$capabilities[] = $key;
				}
			}
		}

		$data = array( "roles" => $roles, "capabilities" => $capabilities );
		
		return $data;
	}

	/**
	 * Add a role, verify nonce.
	 *
	 * @since    1.0.0
	 */
	public function save_add_role () {

		$nonce = Tools::get_parameter("_hylith_nonce");
		
		if ( wp_verify_nonce( $nonce, "_add_role" ) ) {
			$role_name = Tools::get_parameter("role_name");
			$display_name = Tools::get_parameter("display_name");

			add_role( $role_name, $display_name );
		}
	}

	/**
	 * Delete a role, verify nonce.
	 *
	 * @since    1.0.0
	 */
	public function delete_role () {

		$nonce = Tools::get_parameter("_wpnonce");
		
		if ( wp_verify_nonce( $nonce, "_delete_role" ) ) {
			$role_name = Tools::get_parameter("role_name");
			remove_role( $role_name );
		}

	}

	/**
	 * Save capabilities of roles, verify nonce.
	 *
	 * @since    1.0.0
	 */
	public function save_edit_roles () {

		echo "WIP, comming soon";

	}

}