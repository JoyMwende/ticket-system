<?php

/**
 * @package TicketPlugin
 */

namespace Inc\Api;

class SettingsApi
{

    public $admin_panel = array();
    public function assign_ticket()
    {

        if (!empty($this->admin_panel)) {
            add_action('admin_menu', [$this, 'addAdminMenu']);
        }
    }

    public function AddPages(array $pages)
    {
        $this->admin_panel = $pages;

        return $this;
    }
    public function addAdminMenu()
    {
        foreach ($this->admin_panel as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'],
                $page['position']
            );
        }
    }
}
