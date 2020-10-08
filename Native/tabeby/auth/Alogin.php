<?php require_once "../app.php"; ?>

<?php
if (isset($_SESSION['admin_id'])){
    aredirect('index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="<?php echo CSS; ?>bootstrap.min.css">

<title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                    
                    <?php 
                    
                        if(isset($_POST['submit'])) {
                            foreach ($_POST as $key => $value) {
                                $$key = prepareInput($_POST[$key]);
                            }

                            if (! isRequired($email)) {
                                $errors['email'] = "required";
                            } elseif (! isEmail($email)) {
                                $errors['email'] = "not valid";
                            } elseif (! lessThanEq($email, 100)) {
                                $errors['email'] = "must be less than 100";
                            }

                            // password: required, string, min:5, max:20
                            if (! isRequired($password)) {
                                $errors['password'] = "required";
                            } elseif (! isString($password)) {
                                $errors['password'] = "must be string";
                            } elseif (! moreThanEq($password, 5)) {
                                $errors['password'] = "must be less than 5";
                            } elseif (! lessThanEq($password, 20)) {
                                $errors['password'] = "must be more than 20";
                            }


                            // if all data is valid, check user in db
                            if(empty($errors)) {
                                $admin = getOne("admins", "admin_email = '$email' ");
                                if(empty($admin)) {
                                    $errors['email'] = "email is not correct";
                                } elseif(! password_verify($password, $admin['admin_password']) ) {
                                    $errors['password'] = "password is not correct";
                                } else {
                                    // complete login process 
                                    // save admin data in session 
                                    setSession('admin_id', $admin['admin_id']);
                                    setSession('admin_name', $admin['admin_name']);
                                    setSession('admin_email', $admin['admin_email']);
                                    setSession('admin_type', $admin['admin_type']);

                                    // redirect admin/index.php
                                    aredirect("index.php");
                                }
                                
                            }


                        }

                    
                    ?>

                    <div>
                        <form class="border p-5 my-3 " method="POST" action="">
                            <div class="form-group">
                                <label for="email"  class="text-dark ">Email <?php getError('email'); ?></label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password"  class="text-dark ">Password <?php getError('password'); ?></label>
                                <input type="password" name="password" class="form-control" id="password" autocomplete="off">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="<?php echo JS ?>jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo JS ?>popper.min.js"></script>
    <script src="<?php echo JS ?>bootstrap.min.js"></script>
</body>
</html>
