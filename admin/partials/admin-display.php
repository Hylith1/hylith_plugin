<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/Hylith1
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="hylith_plugin" class="main_page"> 

    <h1> Hylith Plugin </h1>

    <nav>
      <?php include ('admin-menu.php'); ?>
    </nav>
    
    <?php

      switch ( $section ) {

        case 'login':
            include( 'login/admin-login.php' );
          break;

        case 'roles':
            include( 'roles/admin-roles.php' );
          break;

        case 'things':
            include( 'things/admin-things.php' );
          break;

        case 'historical':
            include( 'admin-historical.php' );
          break;
          
        default:
            include( 'admin-404.php' );
          break;
      }
      

    ?>

</div>