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
     <h1 class="text-center my-3">View All Users</h1>
</div>
<div class="table-responsive main-table">
            <table class="table table-dark text-center table-bordered">
                <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Age</th>
                <th scope="col">Gander</th>
                <th scope="col">Picture</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        
        <?php 
    $users = getAll('users'); 

    foreach($users as $user):
    ?> 
        <tbody>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td> <?php echo $user['user_name'] ?> </td>
                    <td> <?php echo $user['user_email']   ?></td>
                    <td> <?php echo $user['user_phone']   ?></td>
                    <td> <?php echo $user['user_age']   ?></td>
                    <td> <?php echo $user['user_gander']   ?></td>
                    <td> <img class="table-img" src="<?php echo UIMG.$user['user_img']?>" alt="" srcset=""> </td>
                    <td>
                        <a href="<?php echo AURL . "users/delete.php?user_id=" . $user['user_id'] ?>" class="btn btn-danger delete-record" >Delete</a>
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
