<?php 

require_once "../../app.php";

if(isset($_GET['services_id']) and is_numeric($_GET['services_id'])) {

  $services_id = $_GET['services_id'];
  $services = getOne("services", "services_id = '$services_id'");

  if(empty($services)) {
    abort();
    die();
  }

  delete("services", "services_id = '$services_id'");
}

aredirect("service/view.php");