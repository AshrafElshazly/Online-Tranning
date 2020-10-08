 
<?php 

require_once "../../app.php";

if(isset($_GET['department_id']) and is_numeric($_GET['department_id'])) {

  $department_id = $_GET['department_id'];
  $department = getOne("departments", "department_id = '$department_id'");

  if(empty($department)) {
    abort();
    die();
  }

  delete("departments", "department_id = '$department_id'");
}

aredirect("departments/view.php");
 
