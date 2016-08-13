<?php
$var = "index";
include('../../controller/siteController.php');

if(!$isLoggedin && $empRole!="admin"){
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

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../admin/css/adminpanel-interface.css" rel="stylesheet">
    <link href="../admin/css/navbar-style.css" rel="stylesheet">
    <link href="../admin/css/font-awesome.min.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include("../layouts/navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="director.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <a href="director.php">Overall Company</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-building"></i><a href="index_departments.php"> Departments</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Employees
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row  padding-box-inner">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <h4 class="padding-row" style="text-align: center;">Managers (02) </h4>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h4 class="padding-row" style="text-align: center;">Executive Officers (03)</h4>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h4 class="padding-row" style="text-align: center;">Employees (20) </h4>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row " style="background-color: #FFFFFF; margin-right:20px; margin-left:20px; padding-bottom:10px;">

                <div class="col-sm-4 col-xs-12 padding-box" style="border-left:1px solid #262626;">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4 col-xs-12 padding-box" style="border-left:1px solid #262626;">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12 padding-box"  style="border-left:1px solid #262626;">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-4">
                            <center>
                                <img src="images/default.png" class="img-responsive" style="height:60px; width:60px;" />
                            </center>
                        </div>
                        <div class="col-xs-8">
                            <h5 style="margin-top:24px;float">Mr.Sajitha Liyanage</h5>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<script src="../admin/js/jquery.js"></script>
<script src="../admin/js/bootstrap.js"></script>
</body>
</html>