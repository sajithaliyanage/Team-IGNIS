<?php
$var = "medical";
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
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-briefcase"></i> Upload Medical Reports
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-8 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-upload icon-margin-right" aria-hidden="true"></i>
                                Upload Medical Center</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="upload-box">
                                        <center>
                                            <i class="fa fa-upload fa-5x uplaod-icon-box" aria-hidden="true"></i>
                                            <h3>Drop Your Medical Here</h3>
                                            <h5>or</h5>
                                            <button class="btn btn-info btn-lg submit-button" type="submit">Select Medical</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Previous Uploads</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Medical - 10/05/2016 <span style="float:right;"> Pending <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Medical - 10/03/2016<span style="float:right;"> Pending  <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Medical - 11/07/2016<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Medical - 10/02/2016<span style="float:right;"> Rejected <i class="fa fa-close" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                Dates of Absent</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">10/05/2016 <span style="float:right;">Monday </span></a>
                                <a href="#" class="list-group-item">15/05/2016<span style="float:right;"> Friday</span></a>
                                <a href="#" class="list-group-item">19/05/2016<span style="float:right;"> Tuesday</span></a>
                                <a href="#" class="list-group-item">30/05/2016<span style="float:right;"> Monday</span></a>
                            </div>
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