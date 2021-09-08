<?php

/**
 * Provide a table view for the role and capabilities
 *
 * @link       https://github.com/Hylith1
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/partials
 */
?>

<div class="role_table table-wrapper">
    
    <?php  if ( current_user_can( 'edit_plugins' ) ): ?>
    <table>
        <tbody>
                <tr>
                    <td><a href="<?php echo esc_url( $plugin_admin_url ); ?>&section=roles&action=add-role" class="button-primary"><?php esc_html_e("Add a role","hylith-plugin") ?></a></td>
                    <td><a href="<?php echo esc_url( $plugin_admin_url ); ?>&section=roles&action=edit-roles" class="button"><?php esc_html_e("Edit roles","hylith-plugin") ?></a></td>
                </tr>
        </tbody>
    </table>
    <?php endif; ?>

    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th></th>
                <?php
                    foreach( $data['capabilities'] as $cap ) {
                ?>
                        <th>
                            <?php echo esc_html( $cap ); ?>
                        </th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach( $data['roles'] as $role ) {
            ?>
                <tr>
                <th>
                    <?php
                    echo esc_html($role['name'] )
                    ?>
                </th>
                    <?php
                    foreach( $data['capabilities'] as $cap ) {
                        if ( array_key_exists($cap, $role['capabilities'] ) ) {
                            ?>
                                <td>1</td>
                            <?php
                        } else {
                            ?>
                                <td>0</td>
                            <?php
                        }
                    }
                    ?>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>