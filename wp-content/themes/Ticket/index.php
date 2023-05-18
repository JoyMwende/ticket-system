<?php
if (isset($_POST['registerbtn'])) {
    wp_redirect('http://localhost/Ticket%20System/index.php/register/');
    exit;
}
?>
<?php get_header(); ?>

<div class="bg-dark text-white vh-100">
    <div class="d-flex flex-row justify-content-around align-items-center">
        <h3>TICKET SYSTEM</h3>
        <nav class="d-flex fex-row gap-5">
            <a href="http://localhost/Ticket%20System/index.php/register/" class="text-decoration-none text-white">Register</a>
            <a href="http://localhost/Ticket%20System/index.php/login/" class="text-decoration-none text-white">Login</a>
        </nav>
    </div>
    <div class="w-50 d-flex flex-column justify-content-center align-items-center m-auto gap-3" style="padding-top:10%;">
        <h2>Ticket System</h2>
        <p class="text-center">This is a system where you recieve tasks to do. Tasks will appear at
            your tasks tab and then mark as done whenever you have completed the assigned task.</p>

        <form method="post">
            <button name="registerbtn" class="btn btn-light">Register</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>