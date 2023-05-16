<?php

/**
 * @package TicketPlugin
 */

namespace Inc;

class Init{
    public static function fetch_services(){
        echo "<script> alert('" . plugin_dir_path(__FILE__) . 'templates/assign-tickets.php' . "');</script>";
        return [
            Pages\AdminPanel::class,
            Pages\TicketAssign::class
        ];
    }

    //loop
    public static function register_services()
    {
        foreach (self::fetch_services() as $class) {
            $service = self::instantiate($class);

            if (method_exists($service, 'assign_ticket')) {
                $service->assign_ticket();
            }
        }
    }

    private static function instantiate($class)
    {
        $service = new $class;
        return $service;
    }
}