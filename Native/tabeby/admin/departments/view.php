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
     <h1 class="text-center my-3">View All Departments</h1>
</div>
<div class="table-responsive main-table">
            <table class="table table-dark text-center table-bordered">
                <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        
        <?php 
    $departments = getAll('departments'); 

    foreach($departments as $department):
    ?> 
        <tbody>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td> <?php echo $department['department_name'] ?> </td>
                    <td> <?php echo $department['department_description']   ?></td>
                    <td> <?php echo $department['department_status']   ?></td>
                    <td>
                        <a href="<?php echo AURL . "departments/delete.php?department_id=" . $department['department_id'] ?>" class="btn btn-danger delete-record" >Delete</a>
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