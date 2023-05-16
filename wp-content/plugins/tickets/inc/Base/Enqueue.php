<?php

/**
 * @package Tickets Plugin
 */

namespace Inc\Base;

class Enqueue{


    public function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue(){

        //enqueue for my scripts
        
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . 'assets/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL .'/assets/myscript.js');

        // include bootstrap
        wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');
        wp_enqueue_style('bootstrapcss');
        wp_register_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', true);
        wp_enqueue_script('bootstrapjs');
    }
}