<?php get_header();

/**
 * Template Name: Tickets Page
 */

?>

<?php

//check if user is logged in
if (!is_user_logged_in()) {
    wp_redirect(site_url('/login'));
}

//get data
global $wpdb;

$table = $wpdb->prefix . 'tickets';

$tickets = $wpdb->get_results("SELECT * FROM wp_tickets WHERE is_deleted=0");

//code for status
if (isset($_POST['btn'])) {
    echo '<div class="alert alert-success" role="alert">
        Task done successfully!
        </div>';
}

?>
<?php
if (!empty($tickets)) {
?>
    <div class="bg-light m-0 p-0 w-100">
        <div class="w-75 shadow-sm p-4 m-auto mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task Assigned</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php foreach ($tickets as $rowData) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $rowData->employee_number ?></td>
                            <td><?php echo $rowData->task_to_assign ?></td>
                            <td>
                                <?php
                                $buttonClass = 'btn btn-primary';
                                $buttonText = 'Mark as done';
                                if (isset($_POST['btn']) && $_POST['btn'] == $rowData->task_to_assign) {
                                    $buttonClass = 'btn btn-success';
                                    $buttonText = 'Done';
                                }
                                ?>
                                <form action="" method="post">
                                    <input type="hidden" name="employee_email" value="<?php echo $rowData->email ?>">
                                    <button type="submit" name="<?php echo $rowData->status == 0 ? 'update_status_done' : ''; ?>" value="<?php echo $rowData->task_to_assign; ?>" class="<?php echo $rowData->status == 0 ? 'btn btn-primary' : 'btn btn-success'; ?>"><?php echo $buttonText; ?></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } else {
    echo '<p>No data found.</p>';
} ?>
<?php get_footer(); ?>