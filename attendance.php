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
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/attendance.css">


  </head>

<body style=" background-color: #eceff4 !important;">

    <?php include ("navbar.php")?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 col-sm-push-2 padding-box ">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-building icon-bar"></i>  <a href="attendance.php">Apply Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-check-circle icon-bar"></i> My Attendance
                            </li>
                        </ol>
                    </div>
                </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <form class="container ">
                        <div class="col-sm-6 col-xs-12">
                            <ul >
                                <li><h4>&nbsp;&nbsp;&nbsp;Select Date Range</h4></li>

                                <li>

                                    <label class="col-sm-5 col-col-xs-12 " for="start_date fm fm">Start Date   :</label>
                                    <input class="col-sm-7" type="text" placeholder="click to add start date"  id="example1">
                                    <br>
                                    <br>
                                </li>
                                <li>
                                    <label  class="col-sm-5 col-xs-12" for="end_date">End Date   :</label>
                                    <input class="col-sm-7" type="text" placeholder="click to add end date"  id="example2">
                                    <br>
                                    <br>
                                </li>

                                <li><button class="col-sm-7 col-xs-12 btn btn-info btn-lg pull-right submit-button" type="submit">Filter</button></li>
                            </ul>

                        </div>
                        <div class=" col-sm-6 col-xs-12" id="leave_type">
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
        <div class="col-sm-10 col-xs-12 col-sm-push-2 padding-box" style="background-color: #ffffff;height: 460px" >

            <br>

            <h4>My Attendance</h4>
            <br>

            <table class="table table-bordered table-responsive">
                <thead>
                <tr bgcolor="#add8e6">
                    <th>Date</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Early Mins</th>
                    <th>Late Mins</th>
                    <th>Work Time(hours)</th>
                    <th>Over Time(hours)</th>
                </tr>
                </thead>
                <tbody>
                <tr  bgcolor="#e6e6fa">
                    <td>05/05/2016</td>
                    <td>07.58</td>
                    <td>5.28</td>
                    <td>2.00</td>
                    <td>0.00</td>
                    <td>9.30</td>
                    <td>1.30</td>
                </tr>
                <tr bgcolor="#e6e6fa">
                    <td>04/05/2016</td>
                    <td>08.00</td>
                    <td>5.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>9.00</td>
                    <td>1.00</td>
                </tr>
                <tr bgcolor="#00a65a">
                    <td>03/05/2016</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr  bgcolor="#e6e6fa">
                    <td>05/05/2016</td>
                    <td>07.58</td>
                    <td>5.28</td>
                    <td>2.00</td>
                    <td>0.00</td>
                    <td>9.30</td>
                    <td>1.30</td>
                </tr>
                <tr bgcolor="#e6e6fa">
                    <td>04/05/2016</td>
                    <td>08.00</td>
                    <td>5.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>9.00</td>
                    <td>1.00</td>
                </tr>
                <tr bgcolor="#8b0000">
                    <td>03/05/2016</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr  bgcolor="#e6e6fa">
                    <td>05/05/2016</td>
                    <td>07.58</td>
                    <td>5.28</td>
                    <td>2.00</td>
                    <td>0.00</td>
                    <td>9.30</td>
                    <td>1.30</td>
                </tr>
                </tbody>
            </table>

            <button class="col-md-5 col-xs-12 btn btn-info btn-lg pull-right submit-button" type="submit">Generate Report</button>
        </div>

        </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
                });

            });
        </script>

</body>
</html>