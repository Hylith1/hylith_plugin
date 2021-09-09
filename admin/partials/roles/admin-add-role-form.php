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

<div class="add_role">
    <h2> <?php esc_html_e("Add role","hylith_plugin") ?></h2>
    <p> <?php esc_html_e("Add a custom role to wordpress, you'll be able to asign capabilities to it","hylith_plugin") ?></p>
    <form method="POST" action="<?php echo esc_url($plugin_admin_url);?>&section=roles&action=save-add-role">
        <table class="wp-list-table fixed striped table-view-list">
            <tr>
                <th><?php esc_html_e("role name","hylith-plugin") ?></th>
                <td><input type="text" name="role_name"></td>
            <tr>
            <tr>
                <th><?php esc_html_e("display name","hylith-plugin") ?></th>
                <td><input type="text" name="display_name"></td>
            <tr>
            <tr>
                <td><a href="<?php echo $plugin_admin_url;?>&section=roles" class="button" ><?php esc_attr_e("Cancel","hylith-plugin") ?></a></td>
                <td><input class="button-primary" type="submit" name="save" value="<?php esc_attr_e("Save","hylith-plugin") ?>"></td>
            <tr>
        </table>
        <?php wp_nonce_field( '_add_role', '_hylith_nonce' ); ?>
    </form>
</div>