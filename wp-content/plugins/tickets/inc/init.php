<?php

/**
 * @package Tickets Plugin
 */

namespace Inc;

final class init{
    /**
     * store all the content inside an array
     *
     * @return array full of classes
     */
    public static function get_services(){
        return [
            Pages\AdminPanel::class,
            Base\Enqueue::class,
            Pages\TicketAssign::class,
            //Pages\TicketEdit::class

        ];
    }
    public static function register_services(){
        foreach (self::get_services() as $class){
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service -> register();
            }
        }
    }

    private static function instantiate($class){
        $service = new $class();

        return $service;
    }
}
