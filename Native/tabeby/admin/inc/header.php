<!doctype html>
<html lang="en">
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS?>backend.css">
    <title>Tabeby</title>
</head>
<body>
    
<div class="nav-inner">
            <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
                <a class="navbar-brand" href="<?php echo AURL?>" style="border-right: 2px solid #216A1E ; padding-right:10px;">
                    <img src="<?php echo IMG;?>LOGO.png" style="height:38px;width:45px;margin-right:px;">
                    <span style="font-weight: 1000; color: white;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">



            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Managers
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "manager/add.php"; ?>">Add New</a>
                        <a class="dropdown-item" href="<?php echo AURL . "manager/view.php"; ?>">View All</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Doctors
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "doctors/add.php"; ?>">Add New</a>
                        <a class="dropdown-item" href="<?php echo AURL . "doctors/view.php"; ?>">View All</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Department
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "departments/add.php"; ?>">Add New</a>
                        <a class="dropdown-item" href="<?php echo AURL . "departments/view.php"; ?>">View All</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bookings
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "bookings/waiting.php"; ?>">Waiting Bookings</a>
                        <a class="dropdown-item" href="<?php echo AURL . "bookings/accepted.php"; ?>">Accepted Bookings</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo AURL . "users/view.php"; ?>">Users</a>
                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo URL ."auth/Alogout.php"; ?>">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
            </form>

        </div>
    </nav>





