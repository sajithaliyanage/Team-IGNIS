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
    <link href="css/leave-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include ("navbar.php")?>

<div class="container-fluid " style="background-color: #FFFFFF;">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">

            <div class="row padding-row">

                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                Remaining Leaves</h5>
                            <hr>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="badge">00/25</span>
                                    Leave Type 1
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">00/05</span>
                                    Leave Type 2
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">00/10</span>
                                   Leave Type 3
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">00/04</span>
                                    Leave Type 4
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">00/04</span>
                                    Leave Type 5
                                </li>
                                
                            </ul>
                        </div>
                    </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row">

                <div class="col-xs-12 col-sm-6 padding-box">

                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                Profile Calendar</h5>
                            <div style="height:300px;background-color:#4cae4c; margin-bottom:20px;">

                            </div>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-list icon-margin-right" aria-hidden="true"></i>
                                Past Leave Notifications</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">20/05/2016<span style="float:right;"> Pending... </span></a>
                                <a href="#" class="list-group-item">18/05/2016<span style="float:right;"> Pending... </span></a>
                                <a href="#" class="list-group-item">16/03/2016<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">02/01/2016<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">07/11/2015<span style="float:right;"> Rejected <i class="fa fa-close" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">27/05/2015<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>

                            </div>
                        </div>
                    </div>

                </div>
				
				                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Leave Application</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Company ID :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Leave Type :</label>
                                            <div class="col-xs-8">
                                                <select  name="emp_role" class="form-control">
                                                    <option>-Select-</option>
                                                    <option value="YES">Anuual</option>
                                                    <option value="NO">Casual</option>
                                                    <option value="NO">Half day</option>
                                                    <option value="NO">Short leave</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Starting date :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">End date :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Reason :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>


                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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