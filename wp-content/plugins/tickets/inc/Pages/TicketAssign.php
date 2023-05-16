<?php

/**
 * @package Tickets Plugin
 */

namespace Inc\Pages;


class TicketAssign
{
    public function register()
    {
        $this->create_table_to_db();
        $this->add_ticket_to_db();
    }

    function create_table_to_db()
    {

        global $wpdb;

        $table = $wpdb->prefix . 'tickets';

        $ticket_data = "CREATE TABLE IF NOT EXISTS " . $table . "(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            full_name text NOT NULL,
            employee_number text NOT NULL,
            ticket_number text NOT NULL,
            task_to_assign text NOT NULL,
            is_deleted int DEFAULT 0
        );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($ticket_data);
    }

    function add_ticket_to_db()
    {
        if (isset($_POST['submit'])) {
            $info = [
                'full_name' => $_POST['full_name'],
                'employee_number' => $_POST['employee_number'],
                'ticket_number' => $_POST['ticket_number'],
                'task_to_assign' => $_POST['task_to_assign']
            ];

            global $wpdb;

            $table = $wpdb->prefix . 'tickets';

            $answ = $wpdb->insert($table, $info, $format = NULL);

            if ($answ == true) {
                echo "<script> alert('Ticket Added successfully');</script>";

                $info['full_name'] = '';
                $info['emloyee_number'] = '';
                $info['ticket_number'] = '';
                $info['task_to_assign'] = '';
            } else {
                echo "<script>alert('Ticket not assigned!');</script>";
            }
        }
    }
}
