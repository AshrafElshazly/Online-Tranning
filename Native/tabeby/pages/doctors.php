<?php 
require_once '../app.php';

if(!($_SESSION['user_id'])){
redirect('auth/Ulogin.php');
}

require_once INC.'header.php';
require_once INC.'Unavbar.php';
?> 
<div class="container-fluid" style="padding-left: 0px;">
<div class="row ">
<?php
$doctors = doctorsData(); 
foreach($doctors as $doctor):
?>
    <div class="card-style">
        <div class="card bg-dark" style="width: 18rem;">
        <img src="<?php echo DIMG.$doctor['doctor_img']?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Dr.<?php echo $doctor['doctor_name']?></h5>
        <p class="card-text">Department: <?php echo $doctor['department_name']?></br>
                                   From: <?php echo $doctor['doctor_address']?>
        </p>
        <a href="<?php echo URL.'profile/book.php?department_id='.$doctor['department_id'].'&doctor_id='.$doctor['doctor_id']?>" class="btn btn-primary">Booking Now &raquo</a>
        </div>
        </div>
    </div>
<?php endforeach;?>

</div>

</div>


<?php require_once INC.'footer.php'; ?>