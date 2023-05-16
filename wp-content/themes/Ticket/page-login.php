<?php get_header(); ?>

<?php

/*
    Template Name: Login
*/
?>

<?php
if (is_user_logged_in()) {
    wp_redirect(home_url());
}


$error = '';

if (isset($_POST['submit'])) {

    $email = $_POST['employee_number'];
    $password = $_POST['password'];

    $user = wp_signon([
        'user_login' => $employee_number,
        'user_password' => $password
    ]);

    if (!is_wp_error($user)) {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login, $user);

        wp_redirect(home_url());
        exit;
    }
    $error = "Invalid employee number or password";
}
?>

<div class="bg-light pt-4 ps-4 d-flex align-items-center justify-content-center">
    <div class="bg-light rounded pt-4 pb-3 pe-3 ps-3 d-flex flex-column justify-content-center align-items-center shadow-sm rounded-1 border mb-4 me-4">
        <div class="mx-auto text-center mb-3">
            <h3 class="fw-bold">Login</h3>
        </div>



        <form action="" method="POST">
            <div class="form-group row g-5">
                <label for="employee_number" class="col-sm-2 col-form-label">Employee Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="employee_number" placeholder="Employee Number">
                </div>
            </div>
            <div class="form-group row g-5">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
        </form>
        <div class="mb-3 mt-4">
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </div>
        </form>
    </div>
</div>