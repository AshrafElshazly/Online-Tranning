<?php 

require_once "../../app.php";

if(isset($_GET['admin_id']) and is_numeric($_GET['admin_id'])) {

  $admin_id = $_GET['admin_id'];
  $admin = getOne("admins", "admin_id = '$admin_id'");

  if(empty($admin)) {
    abort();
    die();
  }

  delete("admins", "admin_id = '$admin_id'");
}

aredirect("manager/view.php");