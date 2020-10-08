<?php 

require_once "../app.php"; 
require_once INC.'loginfunc.php';
if(isset($_POST['submit'])){

    foreach($_POST as $key => $value){
        $$key = prepareInput($_POST[$key]);
    }
    if (! isRequired($name)) {
        $errors['name'] = "required";
    } elseif (! isString($name)) {
        $errors['name'] = "must be string";
    } elseif (! lessThanEq($name, 100)) {
        $errors['name'] = "must be <= 100";
    }
    if (! isRequired($email)) {
        $errors['email'] = "required";
    } elseif (! isEmail($email)) {
        $errors['email'] = "not valid";
    } elseif (! lessThanEq($email, 100)) {
        $errors['email'] = "must be less than 100";
    }
    if (! isRequired($phone)) {
        $errors['phone'] = "required";
    } elseif (! isString($phone)) {
        $errors['phone'] = "must be string";
    } elseif (! lessThanEq($phone, 15)) {
        $errors['phone'] = "must be less than 15";
    }
    if (! isRequired($age)) {
        $errors['age'] = "required";
    } elseif (! lessThanEq($age, 3)) {
        $errors['age'] = "must be less than 3";
    }
    
    if (! isRequired($password)) {
        $errors['password'] = "required";
    } elseif (! moreThanEq($password, 5)) {
        $errors['password'] = "must be less than 5";
    } elseif (! lessThanEq($password, 20)) {
        $errors['password'] = "must be more than 20";
    }
    if(empty($errors)){
        $hashpass = password_hash($password , PASSWORD_DEFAULT) ;
        $data = [
            'user_name' => $name,
            'user_email' => $email,
            'user_phone' => $phone,
            'user_password' => $hashpass,
            'user_age' => $age,
            'user_gander' => $gander,
            'user_img' => $img
        ];
         insert("users", $data);
         redirect('signup.php');
    }
}

require_once INC.'header.php';
?>



<div class="nav-inner">
            <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">

                <a class="navbar-brand" href="#" style="border-right: 2px solid #216A1E ; padding-right:10px;">
                    <img src="<?php echo IMG?>LOGO.png" style="height:38px;width:45px;margin-right:px;">
                    <span style="font-weight: 1000; color: white;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

            <div class="navbar-collapse collapse" id="navbarCollapse">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URL?>" style="font-weight:700"> Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL?>pages/doctors.php">Doctors</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departments</a>
                            <div style="background: rgba(51, 50, 50, 0.9);" class="dropdown-menu" aria-labelledby="dropdown01">
<?php
$departments=getWhere('departments','department_status= "Available"');
foreach($departments as $department):
?>
                                <a class="dropdown-item" href="<?php echo URL.'pages/departments.php?department_id='.$department['department_id'];?>"> <span style="color: white;"><?php echo $department['department_name'] ?></span> </a>
<?php endforeach; ?>


                            </div>
                        </li>


                        <li class="nav-item dropdown dropd">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
                            <div style="background:  rgba(6, 5, 19, 0.7);" class="dropdown-menu" aria-labelledby="dropdown01">
<!-- Start Login Form -->
                            <form class="form-signin" method="POST">
                                    <div class="text-center mb-4">
                                        <img class="mb-4" src="<?php echo IMG?>LOGO.png" alt="" width="72" height="72">
                                        <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: white;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
                                    </div>
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="email"  class="text-dark "><span style="color: white;">Email</span> <?php getError('lemail')?></label>
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="lemail">
                                        </div>
                                    </div>
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="password"  class="text-dark "><span style="color: white;">Password</span> <?php getError('lpassword'); ?></label>
                                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="lpassword" autocomplete="off">
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log In</button>
                                    <p class="mt-5 mb-3 text-muted text-center"><span style="color: white;font-weight: 900;">© 2020-2021</span></p>
                                </form>
<!-- End Login Form -->

                            </div>
                        </li>
                        
                    </ul>


                    <form class="form-inline mt-2 mt-md-0" action="<?php echo URL ."auth/signup.php"; ?>">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="signup"><span>Sign UP</button>
                    </form>
                </div>
            </nav>
        </div>





<h1 class="text-center py-3 my-3 ">Sing Up</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="<?php echo IMG?>PngItem_969204.png" alt="" style="max-width:100%;  border-radius: 5%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                    </div>
                    <form class="border p-5 my-3 " style="background-color:#4A5055;" method="POST" action="">
                        <div class="form-group">
                            <label for="name" class="text-white">Your Name<?php getError('name') ?> </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-white">Your Email<?php getError('email') ?> </label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="name" class="text-white">Your Phone<?php getError('phone') ?></label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name" class="text-white">Your Password<?php getError('password') ?></label>
                            <input type="password" name="password" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="name" class="text-white">Your Age<?php getError('age') ?></label>
                            <input type="text" name="age" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="name" class="text-white">Your Gander</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="gander">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="img">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>

                </div>

            </div>
        </div>







    <script src="<?php echo JS ?>jquery.min.js"></script>
    <script src="<?php echo JS ?>popper.min.js"></script>
    <script src="<?php echo JS ?>bootstrap.min.js"></script>
    <script src="<?php echo JS ?>backend.js"></script>
    <script>
    // Select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
</body>
</html>
