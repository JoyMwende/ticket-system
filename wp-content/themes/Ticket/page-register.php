<?php if (is_user_logged_in()) {
    wp_redirect(home_url());
}
 ?>

<?php get_header(); ?>

<?php
/*
Template Name: Register template
*/
?>

<?php

$error = '';

if (isset($_POST['signbtn'])) {
    $fullname = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user
    $user_count = count_users();
    $users_total = $user_count['total_users'];

    $employee_data = array(
        'user_login' => "Staff" . ($users_total + 1),
        'user_full_name' => $fullname,
        'user_email' => $email,
        'user_pass' => $password,
        'role' => 'employee'
    );

    $user_id = wp_insert_user($employee_data);

    if (!is_wp_error($user_id)) {
        update_user_meta($user_id, 'full_name', $fullname);
        update_user_meta($user_id, 'email', $email);

        $user = wp_signon([
            'user_login' => $email,
            'user_password' => $password
        ]);

        if (!is_wp_error($user)) {
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);

            wp_redirect(home_url());
            exit;
        }
    } else {
        $error = "Invalid employee number or password";
    }
}
?>

<div class="bg-white" style="margin-top: -2%;">
    <div class="w-50 m-auto p-4 shadow-small bg-light round-1 rounded border mt-5">
        <div class="mx-auto text-center mb-3">
            <h3 class="fw-bold">Signup</h3>
        </div>

        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="full_name" class="mb-1">Full Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="full_name" placeholder="Enter your full name">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="mb-1">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput2" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password" class="mb-1">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput2" name="password" placeholder="Enter your password">
            </div>
            <div class="mb-3 mt-4">
                <button type="submit" name="signbtn" class="btn btn-primary w-100">Sign UP</button>
            </div>
        </form>
    </div>
</div>