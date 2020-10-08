<?php require_once '../app.php'; 

if(!($_SESSION['user_id'])){
    redirect('auth/Ulogin.php');
    }

    $user_id = $_SESSION['user_id'];
    $user = getOne("users", "user_id='$user_id'");

require_once INC.'header.php';
require_once INC.'Unavbar.php';
?>


<div class="container">
<div class="text-center mb-4" style="padding-top: 30px;">
                <img class="mb-4" src="<?php echo IMG;?>LOGO.png" alt="" width="120" height="120">
                <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: black;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
            </div>
    <div class="row">
<div class="col-12">
     <h1 class="text-center my-3">View All Your Bookings</h1>
</div>
<div class="table-responsive main-table">
            <table class="table table-dark text-center table-bordered">
                <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Doctor</th>
                <th scope="col">Date</th> 
                <th scope="col">Edit</th>
                <th scope="col">Cancel</th>
            </tr>
        </thead>
        
        <?php 
    $bookings = bookingsdata("booking_user_id = '$user_id'"); 

    foreach($bookings as $booking):
    ?> 
    
        <tbody>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td> <?php echo $booking['doctor_name'] ?> </td>
                    <td> <?php echo $booking['booking_date']   ?></td>
                    <td>
                        <a href="<?php echo URL . "profile/editbook.php?booking_id=" . $booking['booking_id'] ?>" class="btn btn-success" >Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo AURL . "bookings/delete.php?booking_id=" . $booking['booking_id'] ?>" class="btn btn-danger delete-record" >Cancel</a>
                    </td>
                </tr>
        </tbody>

    <?php endforeach;?>
    </table>
</div>
</div>
    </div>





<?php require_once INC.'footer.php';?>