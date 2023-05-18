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

<h3>Active Tickets</h3>
<div>

    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Employee Number</th>
            <th>Task Assigned</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php
        foreach ($tickets as $ticket) {
        ?>

            <tr>
                <td><?php echo $ticket->full_name ?></td>
                <td><?php echo $ticket->email ?></td>
                <td><?php echo $ticket->employee_number ?></td>
                <td><?php echo $ticket->task_to_assign ?></td>
                <td>
                    <form action="" method="post">
                        <a class="btn btn-success" role="button" href="<?php echo esc_url(admin_url('admin.php?page=tickets_menu&employee_email=' . $ticket->email)); ?>">Edit</a>
                    </form>

                    <!-- <form action="/Ticket%20System/wp-admin/admin.php?page=tickets_menu" method="POST">
                        <input type="hidden" name="edit_id" value="<?php //echo $ticket->id; 
                                                                    ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                    </form> -->
                </td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $ticket->id; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>

<?php
global $wpdb;

$table = $wpdb->prefix . 'tickets';

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];


    $result = $wpdb->query("UPDATE $table SET is_deleted=0 WHERE id=$id");

    if (!$result) {
        $error = "Error restoring ticket";
    }
}
$done_tickets = $wpdb->get_results("SELECT * FROM wp_tickets WHERE status=1");

?>

<h3>Done Tickets</h3>
<div>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Employee Number</th>
            <th>Task Assigned</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php
        foreach ($done_tickets as $done_ticket) {
        ?>

            <tr>
                <td><?php echo $done_ticket->full_name ?></td>
                <td><?php echo $done_ticket->email ?></td>
                <td><?php echo $done_ticket->employee_number ?></td>
                <td><?php echo $done_ticket->task_to_assign ?></td>
                <td>
                    <form action="" method="post">
                        <a class="btn btn-success" role="button" href="<?php esc_url(add_query_arg('email', $done_ticket->email, '')) ?>">Edit</a>
                    </form>
                    <!-- <form action="/Ticket%20System/wp-admin/admin.php?page=tickets_menu" method="POST">
                        <input type="hidden" name="edit_id" value="<?php //echo $ticket->id; 
                                                                    ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                    </form> -->
                </td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $ticket->id; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>