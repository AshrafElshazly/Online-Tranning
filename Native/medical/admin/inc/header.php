<!doctype html>
<html lang="en">
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo CSS?>bootstrap.min.css">
    <title>Medical Services</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="http://localhost/WEB/medical/admin/index.php">Medical-Services</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cities
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "city/add.php"; ?>">Add New</a>
                        <a class="dropdown-item" href="<?php echo AURL . "city/view.php"; ?>">View All</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "service/add.php"; ?>">Add New</a>
                        <a class="dropdown-item" href="<?php echo AURL . "service/view.php"; ?>">View All</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Managers
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo AURL . "manager/add.php"; ?>">Add New</a>
                        <a class="dropdown-item" href="<?php echo AURL . "manager/view.php"; ?>">View All</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo AURL . "order/view.php"; ?>">Orders</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" target="_blank">Visit Site <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo URL ."auth/logout.php"; ?>">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
            </form>

        </div>
    </nav>





