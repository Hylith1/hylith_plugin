<?php









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
