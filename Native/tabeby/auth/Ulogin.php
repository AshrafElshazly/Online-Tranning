<?php 
require_once '../app.php';
require_once INC.'loginfunc.php';

if (isset($_SESSION['user_id'])){
    redirect('pages/doctors.php');
}

require_once INC.'header.php';
?> 

<!--Start Nav Bar********************************************************************************************************************** -->
<div class="nav-inner">
            <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">

                <a class="navbar-brand" href="#" style="border-right: 2px solid #216A1E ; padding-right:10px;">
                    <img src="<?php echo IMG?>LOGO.png" style="height:38px;width:45px;margin-right:px;">
                    <span style="font-weight: 1000; color: white;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

            <div class="navbar-collapse collapse" id="navbarCollapse">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URL?>" style="font-weight:700"> Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL?>doctors.php">Doctors</a>
                        </li>

                        <li class="nav-item dropdown dropd">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
                            <div style="background:  rgba(6, 5, 19, 0.7);" class="dropdown-menu" aria-labelledby="dropdown01">
<!-- Start Login Form -->
                            <form class="form-signin" method="POST">
                                    <div class="text-center mb-4">
                                        <img class="mb-4" src="<?php echo IMG?>LOGO.png" alt="" width="72" height="72">
                                        <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: white;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
                                    </div>
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="email"  class="text-dark "><span style="color: white;">Email</span> <?php getError('lemail')?></label>
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="lemail">
                                        </div>
                                    </div>
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="password"  class="text-dark "><span style="color: white;">Password</span> <?php getError('lpassword'); ?></label>
                                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="lpassword">
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log In</button>
                                    <p class="mt-5 mb-3 text-muted text-center"><span style="color: white;font-weight: 900;">© 2020-2021</span></p>
                                </form>
<!-- End Login Form -->

                            </div>
                        </li>
                        
                    </ul>


                    <form class="form-inline mt-2 mt-md-0" action="<?php echo URL ."auth/signup.php"; ?>">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="signup"><span>Sign UP</button>
                    </form>
                </div>
            </nav>
        </div>
<!--End Nav Bar********************************************************************************************************************** -->



<div class="container" style="max-width: 550px; padding-top:40px">
<form  method="POST">
                                    <div class="text-center mb-4">
                                        <img class="mb-4" src="<?php echo IMG;?>LOGO.png" alt="" width="120" height="120">
                                        <h1 class="h3 mb-3 font-weight-normal"> <span style="font-weight: 1000; color: black;">TA<span style="color:#23871F">B</span>E<span style="color:#23871F">B</span>Y</span></h1>
                                    </div>
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="email"  class="text-dark ">Email<?php getError('lemail'); ?></label>
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="lemail">
                                        </div>
                                    </div>
                                    <div style=" margin-bottom: 10px; ">
                                        <div class="form-label-group">
                                        <label for="password"  class="text-dark ">Password<?php getError('lpassword'); ?></label>
                                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="lpassword">
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log In</button>
                                    <p class="mt-5 mb-3 text-muted text-center"><span style="color: white;font-weight: 900;">© 2020-2021</span></p>
                                </form>
</div>


<script src="<?php echo JS ?>jquery.min.js"></script>
    <script src="<?php echo JS ?>popper.min.js"></script>
    <script src="<?php echo JS ?>bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo JS ?>backend.js"></script>
    <script>
  $(function () {
    $('#datetimepicker1').datetimepicker();
 });
</script>
</body>
</html>