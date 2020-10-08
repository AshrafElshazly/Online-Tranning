<?php require_once "../../app.php"; ?>

<?php
if (!isset($_SESSION['admin_id'])){
    redirect('auth/Alogin.php');
}
require_once ADMIN . "inc/header.php"; 

?>
<div class="container">
    <div class="row">
<div class="col-12">
     <h1 class="text-center my-3">View All Doctors</h1>
</div>
<div class="table-responsive main-table">
            <table class="table table-dark text-center table-bordered">
                <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Department</th>
                <th scope="col">Picture</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        
        <?php 
    $doctors = doctorsData(); 

    foreach($doctors as $doctor):
    ?> 
        <tbody>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td> <?php echo $doctor['doctor_name'] ?> </td>
                    <td> <?php echo $doctor['doctor_address']   ?></td>
                    <td> <?php echo $doctor['doctor_phone']   ?></td>
                    <td> <?php echo $doctor['department_name']   ?></td>
                    <td> <img class="table-img" src="<?php echo DIMG.$doctor['doctor_img']?>" alt="" srcset=""> </td>
                    <td>
                            <a href="<?php echo AURL . "doctors/edit.php?doctor_id=" . $doctor['doctor_id'] ?>" class="btn btn-info" >Edit</a>
                        </td>
                    <td>
                        <a href="<?php echo AURL . "doctors/delete.php?doctor_id=" . $doctor['doctor_id'] ?>" class="btn btn-danger delete-record" >Delete</a>
                    </td>
                </tr>
        </tbody>

    <?php endforeach;?>
    </table>
</div>



</div>
    </div>

<?php
 include ADMIN . "inc/footer.php"; 
?>