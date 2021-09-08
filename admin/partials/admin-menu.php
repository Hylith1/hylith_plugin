<?php

/**
 * Provide a admin menu for the plugin
 *
 * @link       https://github.com/Hylith1
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/partials
 */
?>

<ul class="hylith_plugin_menu">
    <?php 
        foreach ( $menu_items as $item ) {
            ?>
            <li>
                <a class="button <?php if ( $item['name'] === $section ) { echo 'active'; } ?>" 
                    href="<?php echo esc_url( $item['url'] ) ?>">
                        <?php echo esc_html( $item['name'] ) ?>
                </a>
            </li>
            <?php
        }
    ?>
</ul>