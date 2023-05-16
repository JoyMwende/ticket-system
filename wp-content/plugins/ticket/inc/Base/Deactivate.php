<?php

/**
 * @package  TicketPlugin
 */

namespace Inc\Base;

class Deactivate
{
    static function deactivate()
    {
        flush_rewrite_rules();
    }
}
