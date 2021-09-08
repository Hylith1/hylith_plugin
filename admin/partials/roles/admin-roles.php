<?php

/**
 * Main roles page
 *
 * @link       https://github.com/Hylith1
 * @since      1.0.0
 *
 * @package    Hylith_Plugin
 * @subpackage Hylith_Plugin/admin/partials
 */
?>

<h2> Roles </h2>

<div class="roles">
    <?php
        switch ($action) {

            case 'add-role':
                    include('admin-add-role-form.php');
                break;

            case 'edit-roles':
                include('admin-edit-role-form.php');
            break;
            
            default:
                include('admin-role-table.php');
                break;
        }
    ?>
</div>