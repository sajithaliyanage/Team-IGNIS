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
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<?php include ("navbar.php")?>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-building"></i>  <a href="index.php">Apply Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user-plus"></i> My Attendance
                            </li>
                        </ol>
                    </div>
                </div>
                <div>

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

                            <h4><i class="fa fa-square " style="font-size: 40px;color: #00a65a" aria-hidden="true"></i>&nbsp;&nbsp;Approved Leave</h5>
                            <br>
                            <h4><i class="fa fa-square " style="font-size: 40px;color: #ac2925" aria-hidden="true"></i>&nbsp;&nbsp;Unplanned Absences</h5>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>

                    <div class="container" style="background-color: #ffffff;height: 460px" >

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
                </div>
            </div>
        </div>
    </div>


</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>