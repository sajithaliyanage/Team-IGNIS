<?php
require_once('../../controller/siteController.php');

if(!$isLoggedin || $empRole!="admin"){
    header('Location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Take Your Leave | Online</title>
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../public/css/login-file.css">
        <link rel="stylesheet" href="../../public/css/navbar-style.css">
    </head>

    <body>

    <div class="btn-group dropdown" style="top:0; right:0;position:absolute;">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:transparent !important; color: #2c3b42;">
            <img src="../../public/images/emp.png" class="img-circle image-user"  /><?php echo $empName;?><span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul id="theList" class="dropdown-menu">
            <li><a href="../../module/logout.php">Logout</a></li>
        </ul>
    </div>

        <div class="top-content" style="margin-bottom:-50px !important;">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text" style="margin-top:-60px;">
                            <center>
                                <img src="../../public/images/new-logo.png" style="height:50px; width:50px;" class="img-responsive" />
                            </center>

                            <h1>Choose your login type</h1>

                            <div class="row">
                                <div class="col-xs-12 col-sm-5 ">
                                    <a href="../admin/index.php">
                                        <div class="box">
                                            <i class="fa fa-wrench icon" aria-hidden="true"></i>
                                            <h4 style="color: #FFFFFF; margin-top:30px;">As a Administrator</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <h2 style="margin-top:170px;">Or</h2>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <a href="apply.php">
                                        <div class="box">
                                            <i class="fa fa-user icon" aria-hidden="true"></i>
                                            <h4 style="color: #FFFFFF; margin-top:30px;">As a Employee</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <script src="../../public/js/jquery.js"></script>
        <script src="../../public/js/bootstrap.js"></script>
    </body>

</html>