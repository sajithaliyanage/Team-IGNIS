<?php
$var = "leave";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take Your Leave | Online</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/interface-leftmenu.css" rel="stylesheet">
    <link href="css/adminpanel-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body style=" background-color: #eceff4 !important;">

    <?php include("navbar.php") ?>

    <div class="container-fluid ">
      <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background  col-sm-push-2">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-envelope"></i> Edit Leave Types
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-check icon-margin-right" aria-hidden="true"></i>
                                Added Leave Types</h5>
                            <hr>
                            <h5 style="text-align: right;">Total Job Categories : <span class="badge">07</span></h5>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                     <h5>Annual Leaves</h5>
                                     <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h5>Casual Leaves</h5>
                                    <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h5>Medical Leaves</h5>
                                    <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h5>Half Days</h5>
                                    <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h5>Monthly Short Leaves</h5>
                                    <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h5>Unauthorized Leaves</h5>
                                    <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h5>Authorized Leaves</h5>
                                    <span class="label label-danger" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add New Leave Type</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Leave Type :</label>
                                            <div class="col-xs-7">
                                                <input id="service_name" name="leave_type" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                            <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">IT Department<span style="float:right;"> Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Sales Department<span style="float:right;"> Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">HR Department<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/jscolor.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>