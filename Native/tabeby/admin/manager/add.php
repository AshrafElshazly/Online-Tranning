<?php require_once "../../app.php"; ?>

<?php
if (!isset($_SESSION['admin_id'])){
    redirect('auth/Alogin.php');
}
require_once ADMIN . "inc/header.php";

if (!($_SESSION['admin_type']== 'superadmin'))
{
  echo '<div class=" alert alert-danger">Sorry This Page For SuperAdmins Only</div>';
  include ADMIN . "inc/footer.php";
}else{

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

    if (! isRequired($password)) {
        $errors['password'] = "required";
    } elseif (! isString($password)) {
        $errors['password'] = "must be string";
    } elseif (! moreThanEq($password, 5)) {
        $errors['password'] = "must be more than 5";
    } elseif (! lessThanEq($password, 20)) {
        $errors['password'] = "must be less than 20";
    }

    if(empty($errors)){
        $hashpass = password_hash($password , PASSWORD_DEFAULT) ;
        $data = [
            'admin_name' => $name,
            'admin_email' => $email,
            'admin_password' => $hashpass,
            'admin_type' => $type,
        ];
         insert("admins", $data);
         aredirect('manager/add.php');
    }
}
?>

<div class="container">
    <div class="row">
    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New Admin</h3>
            <div>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name <?php getError('name') ?></label>
                        <input type="text" name="name"  class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email"  class="text-dark "> Email <?php getError('email') ?></label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="type"  class="text-dark "> Type</label>
                        <select name="type" class="form-control" id="type">
                            <option value="admin">Admin </option>
                            <option value="superadmin">Super Admin </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Password <?php getError('password') ?></label>
                        <input type="password" name="password"  class="form-control" id="name">
                    </div>

                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>



    </div>
    </div>

<?php  require_once ADMIN . "inc/footer.php"; } ?>