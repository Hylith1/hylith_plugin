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
    <?php endif; ?>

    <form method="POST" action="<?php echo esc_url( $plugin_admin_url ); ?>&section=roles&action=save-edit-roles">
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <th></th>
                    <?php
                        foreach( $data['capabilities'] as $cap ) {
                            ?>
                                <th>
                                    <?php echo esc_html( $cap ) ?>
                                </th>
                            <?php
                        }
                    ?>
                    <th><?php esc_html_e("Actions","hylith-plugin"); ?></th>
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
                            if ( array_key_exists($cap, $role['capabilities'] ) ){
                                ?>
                                    <td><input type="checkbox" name="<?php echo esc_attr( $role['name'] ) ?>[<?php echo esc_attr( $cap ) ?>]" checked></td>
                                <?php
                            } else {
                                ?>
                                    <td><input type="checkbox" name="<?php echo esc_attr( $role['name'] ) ?>[<?php echo esc_attr( $cap ) ?>]"></td>
                                <?php
                            }
                        }
                        ?>  
                            <td><a href='' class='button'> Delete </a></td></tr>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="<?php echo esc_url( $plugin_admin_url ); ?>&section=roles" class="button" ><?php esc_html_e("Cancel","hylith-plugin") ?></a></td>
                    <td><input class="button-primary" type="submit" name="save" value="<?php esc_html_e("Save","hylith-plugin") ?>"></td>
                </tr>
            </tfoot>
        </table>
        <?php wp_nonce_field( 'edit-roles', '_hylith_nonce' ); ?>
    </form>
</div>