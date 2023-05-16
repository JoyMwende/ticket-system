<?php

/**
 * @package Tickets Plugin
 */

//namespace Inc\Pages;

//class TicketEdit
// {
//     public function register()
//     {
//         $this->edit_ticket_to_db();
//     }

//     function edit_ticket_to_db()
//     {
//         if (isset($_POST['update_user_btn'])) {
//             $info = [
//                 'full_name' => $_POST['fullname'],
//                 'employee_number' => $_POST['employee_num'],
//                 'ticket_number' => $_POST['ticket_num'],
//                 'task_to_assign' => $_POST['task_assign']
//             ];

//             global $wpdb;

//             $id = $_POST['edit_id'];

//             var_dump($id);

//             $table = $wpdb->prefix . 'tickets';

//             $answ = $wpdb->update($table, $info, array('id' => $id));
//         }
//     }
// }
