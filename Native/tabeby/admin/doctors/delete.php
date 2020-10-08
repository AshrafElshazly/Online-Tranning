 
<?php 

require_once "../../app.php";

if(isset($_GET['doctor_id']) and is_numeric($_GET['doctor_id'])) {

  $doctor_id = $_GET['doctor_id'];
  $doctor = getOne("doctors", "doctor_id = '$admin_id'");

  if(empty($doctor)) {
    abort();
    die();
  }

  delete("doctors", "doctor_id = '$doctor_id'");
}

aredirect("doctors/view.php");
