<?php 

require_once "../../app.php";

if(isset($_GET['user_id']) and is_numeric($_GET['user_id'])) {

  $user_id = $_GET['user_id'];
  $user = getOne("users", "user_id = '$user_id'");

  if(empty($user)) {
    abort();
    die();
  }

  delete("users", "user_id = '$user_id'");
}

aredirect("users/view.php");
