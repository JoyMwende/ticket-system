<?php
if (!isset($_POST['edit_id'])) {
    // echo "<script>window.location='http://localhost/shopit/wp-admin/admin.php?page=all_products';</script>";
}
// get ticket from db to edit

if (isset($_POST['edit_btn'])) {
    var_dump($_POST);
    $id = $_POST['edit_id'];

    global $wpdb;

    $info = $wpdb->get_results("SELECT * FROM wp_tickets WHERE id=$id");


    $ticket = $info[0]; // object retrieved frrom db at index 0
}
?>

<div class="bg-light">
    <div class="w-50 m-auto p-4">
        <div class="mx-auto text-center mb-3">
            <h3 class="fw-bold"> Edit Ticket Form</h3>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="full_name" value="<?php echo $ticket->full_name ?>">
            </div>
            <div class="form-group">
                <label for="employee_number">Employee Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="employee_number" value="<?php echo $ticket->employee_number ?>">
            </div>
            <div class="form-group">
                <label for="ticket_number">Ticket Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="ticket_number" value="<?php echo $ticket->ticket_number ?>">
            </div>
            <div class="form-group">
                <label for="task_to_assign">Task to Assign</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="task_to_assign" value="<?php echo $ticket->task_to_assign ?>">
            </div>
            <div class="mb-3 mt-4">
                <button type="submit" name="update_user_btn" class="btn btn-primary w-100 edit_btn">Update Ticket</button>
            </div>
        </form>
    </div>
</div>