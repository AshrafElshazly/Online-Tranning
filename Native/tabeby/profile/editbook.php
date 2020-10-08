<?php 
require_once '../app.php';

if(isset($_GET['booking_id']) and is_numeric($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    $book = getOne("bookings", "booking_id='$booking_id'");
}else{
   redirect('pages/doctors.php');
}
require_once INC.'header.php';
require_once INC.'Unavbar.php';
?>
<?php
if(isset($_POST['change'])){
    $datetime = $_POST['datetime'];

    if(!empty($datetime)){
        $fdatetime = date("Y-m-d H:i:s",strtotime($datetime));
    }else{
        $fdatetime = $book['booking_date'];
    }
    $data=[
        'booking_date'=>$fdatetime
    ];
    $is_updated = update("bookings", $data, "booking_id = '$booking_id'");

        if($is_updated) { 
            $success = "updated successfully";
        } else {
            $query_error = "error while updating";
        }

}
?> 
<?php require ADMIN . "inc/messages.php"; ?>
<div class="container" style="max-width: 650px; padding-top:40px">
        <form  method="POST">
            <div class="text-center mb-4">
                <img class="mb-4" src="<?php echo IMG;?>LOGO.png" alt="" width="120" height="120">
                <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: black;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
            </div>
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
          <input name='datetime' type="text" class="form-control datetimepicker-input" data-date-format="mm/dd/yy" data-target="#datetimepicker1"/>
          <div class="input-group-append" data-date-format="mm/dd/yy" data-target="#datetimepicker1" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
            <button class="btn btn-lg btn-success btn-block" name="change" type="submit">Change</button>
            <p class="mt-5 mb-3 text-muted text-center"><span style="color: white;font-weight: 900;">© 2020-2021</span></p>
        </form>
</div>

<?php require_once INC.'footer.php';?>