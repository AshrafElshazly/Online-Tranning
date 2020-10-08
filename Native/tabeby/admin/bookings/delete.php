 
<?php 

require_once "../../app.php";

if(isset($_GET['booking_id']) and is_numeric($_GET['booking_id'])) {

  $booking_id = $_GET['booking_id'];
  $bookings = getOne("bookings", "booking_id = '$booking_id'");

  if(empty($bookings)) {
    abort();
    die();
  }

  delete("bookings", "booking_id = '$booking_id'");
}

header('Location:'.$_SERVER['HTTP_REFERER']);
