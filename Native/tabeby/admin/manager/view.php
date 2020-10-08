<?php require_once "../../app.php"; ?>

<?php
if (!isset($_SESSION['admin_id'])){
    redirect('auth/Alogin.php');
}
require_once ADMIN . "inc/header.php";

if (!($_SESSION['admin_type']== 'superadmin'))
{
  echo '<div class=" alert alert-danger">Sorry This Page For SuperAdmins Only</div>';
  include ADMIN . "inc/footer.php";
}else{
?>


<div class="container">
    <div class="row">
<div class="col-12">
     <h1 class="text-center my-3">View All Managers</h1>
</div>
<div class="table-responsive main-table">
            <table class="table table-dark text-center table-bordered">
                <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Eamil</th>
                <th scope="col">Type</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        
        <?php 
    $admins = getAll('admins'); 

    foreach($admins as $admin):
    ?> 
        <tbody>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td> <?php echo $admin['admin_name'] ?> </td>
                    <td> <?php echo $admin['admin_email']   ?></td>
                    <td> <?php echo $admin['admin_type']   ?></td>
                    <td>
                            <a href="<?php echo AURL . "manager/edit.php?admin_id=" . $admin['admin_id'] ?>" class="btn btn-info" >Edit</a>
                        </td>
                    <td>
                        <a href="<?php echo AURL . "manager/delete.php?admin_id=" . $admin['admin_id'] ?>" class="btn btn-danger delete-record" >Delete</a>
                    </td>
                </tr>
        </tbody>

    <?php endforeach;?>
    </table>
</div>



</div>
    </div>

    <?php  include ADMIN . "inc/footer.php"; }?>