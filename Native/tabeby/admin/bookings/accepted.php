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
     <h1 class="text-center my-3">View All Accepted Bookings</h1>
</div>
<div class="table-responsive main-table">
            <table class="table table-dark text-center table-bordered">
                <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Doctor</th>
                <th scope="col">Date</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Patient Age</th>
                <th scope="col">Patient Gander</th>
                <th scope="col">Patient Eamil</th>
                <th scope="col">Patient Phone</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        
        <?php 
    $bookings = bookingsdata("booking_status = 'accept'"); 

    foreach($bookings as $booking):
    ?> 
        <tbody>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td> <?php echo $booking['doctor_name'] ?> </td>
                    <td> <?php echo $booking['booking_date']   ?></td>
                    <td> <?php echo $booking['user_name']   ?></td>
                    <td> <?php echo $booking['user_age']   ?></td>
                    <td> <?php echo $booking['user_gander'] ?>  </td>
                    <td> <?php echo $booking['user_email'] ?> </td>
                    <td> <?php echo $booking['user_phone']   ?></td>
                    <td>
                        <a href="<?php echo AURL . "bookings/delete.php?booking_id=" . $booking['booking_id'] ?>" class="btn btn-danger delete-record" >Delete</a>
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

