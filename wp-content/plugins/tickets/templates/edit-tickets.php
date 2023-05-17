<?php

global $wpdb;
$table = $wpdb->prefix . 'tickets';

$employee_email = $_GET['employee_email'];
var_dump($employee_email);

    // Retrieve the form data from the database
    $ticket = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE email = '$employee_email'"));

?>


<div class="bg-light">
    <div class="w-50 m-auto p-4">
        <div class="mx-auto text-center mb-3">
            <h3 class="fw-bold"> Edit Ticket Form</h3>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $ticket->full_name ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="emailnew" name="emailnew" value="<?php echo $ticket->email ?>">
            </div>
            <div class="form-group">
                <label for="employee_number">Employee Number</label>
                <input type="text" class="form-control" id="employee_num" name="employee_num" value="<?php echo $ticket->employee_number ?>">
            </div>
            <div class="form-group">
                <label for="task_to_assign">Task to Assign</label>
                <input type="text" class="form-control" id="task_assigned" name="task_assigned" value="<?php echo $ticket->task_to_assign ?>">
            </div>
            <div class="mb-3 mt-4">
                <button type="submit" name="update_form" class="btn btn-primary w-100">Update Ticket</button>
            </div>
        </form>
    </div>
</div>