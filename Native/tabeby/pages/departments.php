<?php 
require_once '../app.php';


if(isset($_GET['department_id']) and is_numeric($_GET['department_id'])) {
    $department_id = $_GET['department_id'];

    $department_ = getOne("departments", "department_id = '$department_id'");
}else{
    redirect('pages/doctors.php');
}

require_once INC.'header.php';
require_once INC.'Unavbar.php';
?>

<div class="jambo">
<div class="jumbotron bg-dark">
  <h1 class="display-4">Welcome to <?php echo $department_['department_name'] ?> Department </h1>
  <p class="lead"><?php echo $department_['department_description'] ?></p>
</div>
</div>

<h1>Doctors <span class="badge badge-secondary"><i class="fas fa-angle-double-down"></i></span></h1>

<div class="container-fluid" style="padding-left: 0px;">
    <div class="row ">
<?php 
$departname = $department_['department_name'];
$doctors = doctorsDataWhere("department_name = '$departname' "); 
foreach($doctors as $doctor):
?>
        <div class="card-style">
            <div class="card bg-dark" style="width: 18rem;">
            <img src="<?php echo DIMG.$doctor['doctor_img']?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Dr.<?php echo $doctor['doctor_name']?></h5>
            <p class="card-text">Department: <?php echo $department['department_name']?></br>
                                    From: <?php echo $doctor['doctor_address']?>
            </p>
            <a name="booking" href="<?php echo URL.'profile/book.php?department_id='.$department_id.'&doctor_id='.$doctor['doctor_id']?>" class="btn btn-primary">Booking Now &raquo;</a>
            </div>
            </div>
        </div>
    <?php endforeach;?>

    </div>

</div>

<?php require_once INC.'footer.php';?>