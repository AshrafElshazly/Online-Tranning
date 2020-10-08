<?php require_once "../app.php";?>

<?php
if (!isset($_SESSION['admin_id'])){
    redirect('auth/Alogin.php');
}
require_once ADMIN . "inc/header.php"; 

?>

<div class="container">
    <div class="row">

        <div class="col-md-6 my-5">
            <div class="card text-center">
                <div class="card-header">
                All Bookings
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Bookings </h5>
                    <p class="card-text display-3"> <?php echo getCount("bookings"); ?> </p>

                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto my-5">
            <div class="card text-center">
                <div class="card-header">
                All Reservations
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Bookings Today</h5>
                    <p class="card-text display-3"> <?php echo getCountWhere("bookings", "DATE(book_date) = CURDATE()"); ?> </p>

                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto my-5">
            <div class="card text-center">
                <div class="card-header">
                All Users
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show Users</h5>
                    <p class="card-text display-3"> <?php echo getCount("users"); ?> </p>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Users
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Users Today</h5>
                    <p class="card-text display-3"> <?php echo getCountWhere("users", "DATE(user_date) = CURDATE()");  ?> </p>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        </div>
    </div>
<?php require_once ADMIN . "inc/footer.php";?>
