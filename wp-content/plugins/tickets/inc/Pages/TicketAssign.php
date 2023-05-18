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
        $this->editTicket();
        $this->markAsDone();
    }

    function create_table_to_db()
    {

        global $wpdb;

        $table = $wpdb->prefix . 'tickets';

        $ticket_data = "CREATE TABLE IF NOT EXISTS " . $table . "(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            full_name text NOT NULL,
            email text NOT NULL,
            employee_number text NOT NULL,
            task_to_assign text NOT NULL,
            status int DEFAULT 0,
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
                'email' => $_POST['email'],
                'employee_number' => $_POST['employee_number'],
                'task_to_assign' => $_POST['task_to_assign']
            ];

            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;

            $table = $wpdb->prefix . 'tickets';

            //check if user has been assigned
            $assignedTask = $wpdb->get_row("SELECT * FROM $table WHERE email = '{$_POST['email']}' AND status = 1");
            if ($assignedTask) {
                echo "<script>alert('Employee has been assigned another task')</script>";
            } else {
                $answ = $wpdb->insert($table, $info, $format = NULL);

                if ($answ == true) {
                    $successmessage = true;

                    $info['full_name'] = '';
                    $info['email'] = '';
                    $info['emloyee_number'] = '';
                    $info['task_to_assign'] = '';
                } else {
                    $errormessage = true;
                }
            }
        }
        // wp_redirect('/Ticket%20System/wp-admin/admin.php?page=tickets');
    }

    function editTicket()
    {
        if (isset($_POST['update_form'])) {
            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;


            $new_ticket_data = [
                'full_name' => $_POST['fullname'],
                'email' => $_POST['emailnew'],
                'employee_number' => $_POST['employee_num'],
                'task_to_assign' => $_POST['task_assigned'],
            ];

            $table = $wpdb->prefix . 'tickets';

            $employee_email = $_GET['employee_email'];
            $condition = ['email' => $employee_email];

            $result = $wpdb->update($table, $new_ticket_data, $condition);

            if ($result) {
                $successmessage = true;
            } else {
                $errormessage == true;
            }
        }
    }


    function markAsDone()
    {
        if (isset($_POST['update_status_done'])) {
            global $wpdb;

            $new_status = [
                'status' => 1,

            ];

            $table = $wpdb->prefix . 'tickets';

            $employee_email = $_POST['employee_email'];
            $condition = ['email' => $employee_email];

            $result = $wpdb->update($table, $new_status, $condition);

            if ($result) {
                echo "<script>alert('Ticket updated successfully!')</script>";
            } else {
                echo "<script>alert('Ticket not updated!')</script>";
            }
        }
    }
}
