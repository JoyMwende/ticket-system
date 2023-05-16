 <?php get_header(); ?>

 <?php
    if (is_user_logged_in()) {
        wp_redirect(home_url());
    }

    $error = '';

    if (isset($_POST['signbtn'])) {
        $fullname = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['employee_number'];
        $password = $_POST['password'];

        $user_id = wp_create_user($full_name, $employee_number, $password);

        if (!is_wp_error($user_id)) {
            update_user_meta($user_id, 'full_name', $full_name);
            update_user_meta($user_id, 'email', $email);
            update_user_meta($user_id, 'employee_number', $employee_number);

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
        } else {

            $error = "Invalid employee number or password";
        }
    }
    ?>

 <div class="bg-light">
     <div class="w-50 m-auto p-4">
         <div class="mx-auto text-center mb-3">
             <h3 class="fw-bold">Signup</h3>
         </div>

         <form action="" method="post">
             <div class="form-group">
                 <label for="full_name">Full Name</label>
                 <input type="text" class="form-control" id="formGroupExampleInput" name="full_name" placeholder="Enter your full name">
             </div>
             <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" class="form-control" id="formGroupExampleInput2" name="email" placeholder="Enter your email">
             </div>
             <div class="form-group">
                 <label for="employee_number">Employee Number</label>
                 <input type="text" class="form-control" id="formGroupExampleInput" name="employee_number" placeholder="Enter your employee number">
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="formGroupExampleInput2" name="password" placeholder="Enter your password">
             </div>
             <div class="mb-3 mt-4">
                 <button type="submit" name="signbtn" class="btn btn-primary w-100">Sign UP</button>
             </div>
         </form>
     </div>
 </div>