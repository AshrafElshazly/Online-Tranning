<?php

if(isset($_POST['login'])) {
    foreach ($_POST as $key => $value) {
        $$key = prepareInput($_POST[$key]);
    }
  
    if (! isRequired($lemail)) {
        $errors['lemail'] = "required";
    } elseif (! isEmail($lemail)) {
        $errors['lemail'] = "not valid";
    } elseif (! lessThanEq($lemail, 100)) {
        $errors['lemail'] = "must be less than 100";
    }
  
    // password: required, string, min:5, max:20
    if (! isRequired($lpassword)) {
        $errors['lpassword'] = "required";
    } elseif (! isString($lpassword)) {
        $errors['lpassword'] = "must be string";
    } elseif (! moreThanEq($lpassword, 5)) {
        $errors['lpassword'] = "must be less than 5";
    } elseif (! lessThanEq($lpassword, 20)) {
        $errors['lpassword'] = "must be more than 20";
    }
  
  
    // if all data is valid, check user in db
    if(empty($errors)) {
        $user = getOne("users", "user_email = '$lemail' ");
        if(empty($user)) {
            $errors['lemail'] = "email is not correct";
        } elseif(! password_verify($lpassword, $user['user_password']) ) {
            $errors['lpassword'] = "password is not correct";
        } else {
            // complete login process 
            // save admin data in session 
            setSession('user_id', $user['user_id']);
            setSession('user_name', $user['user_name']);
            setSession('user_email', $user['user_email']);
            redirect("/pages/doctors.php");
        }
        
    }
  
  
  }
?>