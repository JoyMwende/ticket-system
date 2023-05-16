<?php

/**
 * @package TicketPlugin
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;

class AdminPanel extends BaseController
{

    public $settings;
    public $panel;

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->panel = [
            'page_title' => 'Ticket Form',
            'menu_title' => 'Assign Ticket',
            'capability' => 'manage_options',
            'menu_slug' => 'ticket_menu',
            'callback' => array($this, 'display_ticket_form'),
            'icon_url' => 'dashicons-buddicons-buddypress-logo',
            'position' => 100
        ];

       
    }

    function assign_ticket(){
        $this->settings->addPages($this->panel);
    }

    public function display_ticket_form()
    {
        echo '<h2>This is the ticket form</h2>';
    }
}
