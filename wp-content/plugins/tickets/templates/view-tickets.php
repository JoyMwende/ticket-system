<?php
global $wpdb;

$table = $wpdb->prefix . 'tickets';

// $tickets = $wpdb->get_results("SELECT * FROM wp_tickets");
//to delete a ticket of a given id
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];


    $result = $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");

    if (!$result) {
        $error = "Error deleting ticket";
    }
}

$tickets = $wpdb->get_results("SELECT * FROM wp_tickets WHERE is_deleted=0");
?>

<h2>Tickets</h2>
<div class="container">

    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Employee Number</th>
            <th>Ticket Number</th>
            <th>Task Assigned</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php
        for ($i = 0; $i < count($tickets); $i++) {
        ?>

            <tr>
                <td><?php echo $tickets[$i]->full_name ?></td>
                <td><?php echo $tickets[$i]->employee_number ?></td>
                <td><?php echo $tickets[$i]->ticket_number ?></td>
                <td><?php echo $tickets[$i]->task_to_assign ?></td>
                <td>
                    <form action="/Ticket%20System/wp-admin/admin.php?page=tickets_menu" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $tickets[$i]->id; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $tickets[$i]->id; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</div>