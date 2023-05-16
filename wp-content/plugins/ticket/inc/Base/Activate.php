<?php

/**
 * @package  TicketPlugin
 */

 namespace Inc\Base;

 class Activate{
    static function activate(){
        // echo 'activated';
        flush_rewrite_rules();
    }
 }