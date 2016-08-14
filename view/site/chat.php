<?php
$var = "chat";
include('../../controller/siteController.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take Your Leave | Online</title>

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">

    <script src="../../public/js/bootstrap.js"></script>
    <script src="../../public/js/bootstrap-datepicker.js"></script>
    <script src="../../public/js/myProfile.js"></script>

</head>

<body style=" background-color: #eceff4 !important;">

<?php include ("../layouts/navbar.php")?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("../layouts/leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">

            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-envelope"></i> Chat Box
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 col-sm-8 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top" style="height:80vh;">
                            <h5 class="nortification-box-heading"><i class="fa fa-connectdevelop icon-margin-right" aria-hidden="true"></i>
                                Conversation with - Sajitha Liyanage</h5>
                            <hr>

                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 padding-box">
                    <div class="btn-group dropup">


                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>