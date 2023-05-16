<?php

/**
 * @package Tickets Plugin
 */

namespace Inc\Pages;



class AdminPanel
{


  public function register()
  {
    add_action('admin_menu', array($this, 'create_admin_panel'));
    add_action('admin_menu', array($this, 'view_tickets'));
    add_action('admin_menu', array($this, 'edit_admin_panel'));
  }

  public function create_admin_panel()
  {
    add_menu_page('Ticket Form', 'Assign Ticket', 'manage_options', 'ticket_menu', array($this, 'admin_index'), 'dashicons-buddicons-buddypress-logo', 100);
  }

  public function admin_index()
  {
    require_once PLUGIN_PATH . 'templates/assign-tickets.php';
  }

  public function view_tickets()
  {
    add_menu_page('Registered Tickets', 'Assigned Tickets', 'manage_options', 'tickets', array($this, 'view_index'), 'dashicons-text-page', 160);
  }

  public function view_index()
  {
    require_once PLUGIN_PATH . 'templates/view-tickets.php';
  }

  public function edit_admin_panel()
  {
    add_menu_page('Ticket Forms', 'Edit Ticket', 'manage_options', 'tickets_menu', array($this, 'admin_update'), 'dashicons-edit', 200);
  }

  public function admin_update()
  {
    require_once PLUGIN_PATH . 'templates/edit-tickets.php';
  }
}
