<?php require_once "../app.php"; 

if(!($_SESSION['user_id'])){
    redirect('auth/Ulogin.php');
    }

if(isset($_GET['department_id']) and is_numeric($_GET['department_id'])) {
    if(isset($_GET['doctor_id']) and is_numeric($_GET['doctor_id'])){
    $department_id = $_GET['department_id'];
    $doctor_id = $_GET['doctor_id'];
    $department_ = getOne("departments", "department_id = '$department_id'");
    $doctor_ = getOne("doctors", "doctor_id = '$doctor_id'");
}else{
    redirect('pages/doctors.php');
}
}else{
    redirect('pages/doctors.php');
}
require_once INC.'header.php';
require_once INC.'Unavbar.php';
?>

<?php
if(isset($_POST['book'])){
    $datetime = $_POST['datetime'];
    if (! isRequired($datetime)) {
        $errors['datetime'] = "required";
    }if(empty($errors)){ 

    $fdatetime = date("Y-m-d H:i:s",strtotime($datetime));

    $data = [
        'booking_user_id' => $_SESSION['user_id'],
        'booking_doctor_id' => $doctor_['doctor_id'],
        'booking_date' => $fdatetime,
    ];
    insert('bookings',$data);
    }
}
?>
<div class="container" style="max-width: 650px; padding-top:40px">
        <form  method="POST">
            <div class="text-center mb-4">
                <img class="mb-4" src="<?php echo IMG;?>LOGO.png" alt="" width="120" height="120">
                <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: black;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
            </div>
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
            <label><?php getError('datetime'); ?></label>
          <input name='datetime' type="text" class="form-control datetimepicker-input" data-date-format="mm/dd/yy" data-target="#datetimepicker1" />
          <div class="input-group-append" data-date-format="mm/dd/yy" data-target="#datetimepicker1" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
            <button class="btn btn-lg btn-success btn-block" name="book" type="submit">Book</button>
            <p class="mt-5 mb-3 text-muted text-center"><span style="color: white;font-weight: 900;">© 2020-2021</span></p>
        </form>
</div>

<?php require_once INC.'footer.php';?>