<?php
$var = "graphs";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="director"){
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
                                <i class="fa fa-edit"></i> Company Attendance Analyse
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">


        </div>


    </div>

    <script src="../admin/js/jquery.js"></script>
    <script src="../admin/js/bootstrap.js"></script>

</body>
</html>