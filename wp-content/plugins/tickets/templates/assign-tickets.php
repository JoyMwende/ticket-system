<div class="bg-light">
    <?php
    global $successmessage;
    $successmessage;

    global $errormessage;
    ?>
    <div class="w-50 m-auto p-4">
        <!-- success message -->
        <?php
        echo '<div class="alert alert-success" role="alert" id="successmsg">
                Ticket assigned Successfully
             </div>';

        echo '<script> document.getElementById("successmsg").style.display = "none"; </script>';

        if ($successmessage == true) {
            echo '<script> document.getElementById("successmsg").style.display = "flex"; </script>';

            echo    '<script> 
                        setTimeout(function(){
                            document.getElementById("successmsg").style.display ="none";
                        }, 3000);
                    </script>';
        }

        ?>

<!-- error message -->
        <?php
        echo '<div class="alert alert-danger" role="alert" id="errormsg">
               Unable to assign ticket, an error occured
             </div>';

        echo '<script> document.getElementById("errormsg").style.display = "none"; </script>';

        if($errormessage == true){
            echo '<script> document.getElementById("errormsg").style.display = "flex"; </script>';

            echo    '<script> 
                        setTimeout(function(){
                            document.getElementById("errormsg").style.display ="none";
                        }, 3000);
                    </script>';
        }
    ?>
        <div class="mx-auto text-center mb-3">
            <h3 class="fw-bold">Ticket Form</h3>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="full_name" placeholder="Enter your employee's full name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter your employee mail">
            </div>
            <div class="form-group">
                <label for="employee_number">Employee Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="employee_number" placeholder="Enter your employee number">
            </div>
            <div class="form-group">
                <label for="task_to_assign">Task to Assign</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="task_to_assign" placeholder="Enter your task to assign">
            </div>
            <div class="mb-3 mt-4">
                <button type="submit" name="submit" class="btn btn-primary w-100">Create Ticket</button>
            </div>
        </form>
    </div>
</div>