<?php
$var = "status";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();


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
                                <i class="fa fa-chevron-circle-right"></i> Leave Status
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top table-responsive">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                My Recent Leave Requests</h5>
                            <hr>

                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>My Recent Leave Requests</th>
                                    <th>Leave type</th>
                                    <th>Duration</th>
                                    <th></th>
                                    <th>Leave State</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>

                                    <td>2016/08/12-2016/08/13</td>
                                    <td>sick leave</td>
                                    <td>1 day</td>
                                    <td>applied on 2016/08/11 at 4.20 p.m</td>
                                    <td>Waiting for Approval</td>
                                    <td >
                                        <button class="btn btn-success btn-sm" onclick=""><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm" onclick="DeleteRow(this)"><i class="fa fa-times"></i> Delete</button>

                                    </td>

                                </tr>
                                <tr>

                                    <td>2016/07/12-2016/07/13</td>
                                    <td>Annual leave</td>
                                    <td>1 day</td>
                                    <td>applied on 2016/07/11 at 4.20 p.m</td>
                                    <td>Approved</td>
                                    <td >
                                        <button class="btn btn-success btn-sm" onclick=""><i class="fa fa-pencil-square-o"></i> Edit </button>
                                        <button class="btn btn-danger btn-sm" onclick="DeleteRow(this)"><i class="fa fa-times"></i> Delete </button>

                                    </td>


                                </tr>
                                <tr>

                                    <td>2016/02/12-2016/02/12</td>
                                    <td>short leave</td>
                                    <td>0.5 day</td>
                                    <td>applied on 2016/02/11 at 4.20 p.m</td>
                                    <td>rejected</td>
                                    <td >
                                        <button class="btn btn-success btn-sm" onclick=""><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm" onclick="DeleteRow(this)"><i class="fa fa-times"></i> Delete</button>

                                    </td>


                                </tr>




                                </tbody>
                            </table>



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