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
 * @subpackage Hylith_Plugin/admin/controllers
 * @author     Hylith1
 */
abstract class Core_Controller {

    abstract public function handle_action( String $action );

}