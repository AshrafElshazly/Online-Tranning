<?php require_once '../app.php'; 

if(!($_SESSION['user_id'])){
    redirect('auth/Ulogin.php');
    }

    $user_id = $_SESSION['user_id'];
    $user = getOne("users", "user_id='$user_id'");

require_once INC.'header.php';
require_once INC.'Unavbar.php';
?>

<?php
if(isset($_POST['edit'])){
    foreach($_POST as $key=>$value){
        $$key = prepareInput($_POST[$key]);
    }
    if (! isRequired($uname)) {
        $errors['uname'] = "required";
    } elseif (! isString($uname)) {
        $errors['uname'] = "must be string";
    } elseif (! lessThanEq($uname, 100)) {
        $errors['uname'] = "must be <= 100";
    }
    if (! isRequired($uemail)) {
        $errors['uemail'] = "required";
    } elseif (! isEmail($uemail)) {
        $errors['uemail'] = "not valid";
    } elseif (! lessThanEq($uemail, 100)) {
        $errors['uemail'] = "must be less than 100";
    }
    if (! isRequired($uphone)) {
        $errors['uphone'] = "required";
    } elseif (! isString($uphone)) {
        $errors['uphone'] = "must be string";
    } elseif (! lessThanEq($uphone, 15)) {
        $errors['uphone'] = "must be less than 15";
    }
    if (! isRequired($uage)) {
        $errors['uage'] = "required";
    } elseif (! lessThanEq($uage, 3)) {
        $errors['uage'] = "must be less than 3";
    }if(empty($upassword)){
        $upassword = $user['user_password'];
    }
    if(empty($uimg)){
        $uimg = $user['user_img'];
    }
    if(empty($errors)){
        $hashpass = password_hash($upassword , PASSWORD_DEFAULT) ;
        $data = [
            'user_name' => $uname,
            'user_email' => $uemail,
            'user_phone' => $uphone,
            'user_age' => $uage,
            'user_password'=>$hashpass,
            'user_img' => $uimg,
        ];
        $is_updated = update("users", $data, "user_id = '$user_id'");

        if($is_updated) { 
            $user = getOne("users", "user_id = '$user_id'");

            $success = "Updated Successfully";
        } else {
            $query_error = "error while updating";
        }
    }

}


?>
<div class="container" style="max-width: 550px; padding-top:40px">
<form  method="POST">
<?php require ADMIN . "inc/messages.php"; ?>
                                    <div class="text-center mb-4">
                                        <img class="mb-4" src="<?php echo IMG;?>LOGO.png" alt="" width="120" height="120">
                                        <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: black;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
                                        <h2>Edit Personal Information</h2>
                                    </div>

                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="uname"  class="text-dark ">Name<?php getError('uname'); ?></label>
                                            <input type="text" id="uname" class="form-control" value="<?php echo $user['user_name']?>" name="uname">
                                        </div>
                                    </div>

                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="uemail"  class="text-dark ">Email<?php getError('uemail'); ?></label>
                                            <input type="email" id="uemail" class="form-control" value="<?php echo $user['user_email']?>" name="uemail">
                                        </div>
                                    </div>

                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="uphone"  class="text-dark ">Phone<?php getError('uphone'); ?></label>
                                            <input type="text" id="uphone" class="form-control" value="<?php echo $user['user_phone']?>" name="uphone">
                                        </div>
                                    </div>
                                    
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="uage"  class="text-dark ">Age<?php getError('uage'); ?></label>
                                            <input type="text" id="uage" class="form-control" name="uage" value="<?php echo $user['user_age']?>">
                                        </div>
                                    </div>

                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="upassword"  class="text-dark ">Password<?php getError('upassword'); ?></label>
                                            <input type="password" id="upassword" class="form-control" name="upassword" autocomplete="off">
                                        </div>
                                    </div>

                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="uimg">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                       </div>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block" name="edit" type="submit">Edit</button>
                                    <p class="mt-5 mb-3 text-muted text-center"><span style="color: white;font-weight: 900;">© 2020-2021</span></p>
                                </form>
</div>




<?php require_once INC.'footer.php';?>