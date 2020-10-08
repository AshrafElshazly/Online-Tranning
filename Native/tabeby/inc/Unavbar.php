

<div class="nav-inner">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
                <a class="navbar-brand" href="#" style="border-right: 2px solid #216A1E ; padding-right:10px;">
                    <img src="<?php echo IMG;?>LOGO.png" style="height:38px;width:45px;margin-right:px;">
                    <span style="font-weight: 1000; color: white;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL?>pages/doctors.php">Doctors</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departments</a>
                            <div style="background: rgba(51, 50, 50, 0.9);" class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php
$departments=getWhere('departments','department_status= "Available"');
foreach($departments as $department):
?>
                                <a class="dropdown-item" href="<?php echo URL.'pages/departments.php?department_id='.$department['department_id'];?>"> <span style="color: white;"><?php echo $department['department_name'] ?></span> </a>
<?php endforeach; ?>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                            <div style="background: rgba(51, 50, 50, 0.9);" class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="<?php echo URL?>profile/bookings.php"><span style="color: white;">My Bookings</span></a>
                                <a class="dropdown-item" href="<?php echo URL?>profile/edituser.php"><span style="color: white;">Account Setting</span></a>
                            </div>
                        </li>

                    </ul>
                    <form class="form-inline mt-2 mt-md-0" method="POST" action="<?php echo URL ."auth/Ulogout.php"; ?>">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="signup"><span>Log Out</button>
                    </form>
                </div>
            </nav>
</div>