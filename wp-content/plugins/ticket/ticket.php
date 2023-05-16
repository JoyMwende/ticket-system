<?php

/**
 * @package  TicketPlugin
 */

/*
    Plugin Name: Ticket Plugin
    Plugin URI: http://...........
    Description: This is a plugin to assign tickets to employees
    Version: 1.0.0
    Author: Joy
    AUthor URI: http://...........
    Licence: GPLv2 or Later
    Text Domain: ticket-plugin
 */

//security check
defined('ABSPATH') or die('Hey you hacker! Got Ya!');

//composer check
if (file_exists(dirname(__FILE__) . './vendor/autoload.php')) {
    require_once(dirname(__FILE__) . './vendor/autoload.php');
}
    

// use \Inc\Base;
function activate_ticket_plugin(){
    // Inc\Base\Activate::activate();
}

function deactivate_ticket_plugin(){
    // Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_ticket_plugin');

register_deactivation_hook(__FILE__, 'deactivate_ticket_plugin');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
?>