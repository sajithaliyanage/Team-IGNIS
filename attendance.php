<?php
$var = "attendance";
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

  <body>

    <?php include ("navbar.php")?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 col-sm-push-2 padding-box">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-building"></i>  <a href="attendance.php">Apply Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user-plus"></i> My Attendance
                            </li>
                        </ol>
                    </div>
                </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <form class="container ">
                        <div class="col-md-6 col-xs-12">
                            <ul>
                                <li><h4>&nbsp;&nbsp;&nbsp;Select Date Range</h4></li>

                                <li>

                                    <label class="col-md-5 col-col-xs-12 " for="start_date fm fm">Start Date   :</label>
                                    <input class="col-md-7 col-xs-12" type="date" name="start_date" id="start_date"/>
                                    <br>
                                    <br>
                                </li>
                                <li>
                                    <label  class="col-md-5 col-xs-12" for="end_date">End Date   :</label>
                                    <input  class="col-md-7 col-xs-12" type="date" name="end_date" id="end_date"/>
                                    <br>
                                    <br>
                                </li>

                                <li><button class="col-md-7 col-xs-12 btn btn-info btn-lg pull-right submit-button" type="submit">Filter</button></li>
                            </ul>

                        </div>
                        <div class=" col-md-6 col-xs-12" id="leave_type">
                            <div class="container-fluid pull-right">
                                <br>

                                <h4><i class="fa fa-square " style="font-size: 40px;color: #00a65a" aria-hidden="true"></i>&nbsp;&nbsp;Approved Leave</h4>
                                <br>
                                <h4><i class="fa fa-square " style="font-size: 40px;color: #ac2925" aria-hidden="true"></i>&nbsp;&nbsp;Unplanned Absences</h4>
                            </div>
                        </div>
                    </form>
            </div>

        </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>