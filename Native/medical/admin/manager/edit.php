<?php require_once "../../app.php"; ?>

<?php require_once ADMIN . "inc/header.php"; ?>

<?php 

if(isset($_GET['admin_id']) and is_numeric($_GET['admin_id'])) {
    $admin_id = $_GET['admin_id'];

    $admin = getOne("admins", "admin_id = '$admin_id'");

    if(empty($admin)) {
        aredirect("manager/view.php");
    }
     
} else {
    aredirect("manager/view.php");
}
?>

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About Admin</h3>
            <div>

            <?php   
if(isset($_POST['submit'])){
    
    foreach($_POST as $key => $value){
        $$key = prepareInput($_POST[$key]);
    }

    if (! isRequired($name)) {
        $errors['name'] = "required";
    } elseif (! isString($name)) {
        $errors['name'] = "must be string";
    } elseif (! lessThanEq($name, 100)) {
        $errors['name'] = "must be less than 100";
    }

    if (! isRequired($email)) {
        $errors['email'] = "required";
    } elseif (! isEmail($email)) {
        $errors['email'] = "not valid";
    } elseif (! lessThanEq($email, 100)) {
        $errors['email'] = "must be less than 100";
    }
    
    $password = empty($_POST['newpassword']) ? $_POST['oldpassword'] : $_POST['newpassword'];

    if(empty($errors)){
        $hashpass = password_hash($password , PASSWORD_DEFAULT) ;
        $data = [
            'admin_name' => $name,
            'admin_email' => $email,
            'admin_password' => $hashpass,
            'admin_type' => $type
        ];
        $is_updated = update("admins", $data, "admin_id = '$admin_id'");

        if($is_updated) { 
            $admin = getOne("admins", "admin_id = '$admin_id'");

            $success = "updated successfully";
        } else {
            $query_error = "error while updating";
        }
    }
}
?>


                <?php require ADMIN . "inc/messages.php"; ?>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <input type="hidden" name="id" value="">
                        <label for="name"  class="text-dark "> Name <?php getError('name');?></label>
                        <input type="text" name="name"  class="form-control" id="name" value = "<?php echo $admin['admin_name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="email"  class="text-dark "> Email <?php getError('email');?></label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $admin['admin_email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="type"  class="text-dark "> Type</label>
                        <select name="type" class="form-control" id="type">
                            <option value="admin" >Admin </option>
                            <option value="superadmin" >Super Admin </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Password</label>
                        <input type="hidden" name="oldpassword"  class="form-control" id="name" value="<?php echo $admin['admin_password'] ?>">
                        <input type="password" name="newpassword"  class="form-control" id="name" placeholder="Leave blank if you don't want to change">
                    </div>

                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>



    </div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>