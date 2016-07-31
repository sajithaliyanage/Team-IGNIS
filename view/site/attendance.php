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

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/datepicker.css">
    <link rel="stylesheet" href="../../public/css/attendance.css">


  </head>

<body style=" background-color: #eceff4 !important;">

    <?php include("../layouts/navbar.php") ?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 col-sm-push-2 padding-box ">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-briefcase"></i> My Attendance
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-5 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-paperclip icon-margin-right" aria-hidden="true"></i>
                                Attendance Option</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Start Date:</label>

                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text"
                                                       placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">End date:</label>

                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text"
                                                       placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">File Type:</label>

                                            <div class="col-xs-8">
                                                <select name="emp_role" class="form-control">
                                                    <option value="YES">PDF</option>
                                                    <option value="NO">Excel Sheet</option>
                                                    <option value="NO">Word Sheet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>


                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Fitler & Download
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-sm-7 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-eye icon-margin-right" aria-hidden="true"></i>
                                My Attendance</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>Work Time(hours)</th>
                                            <th>Over Time(hours)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>05/05/2016</td>
                                            <td>07.58</td>
                                            <td>5.28</td>
                                            <td>9.30</td>
                                            <td>1.30</td>
                                        </tr>
                                        <tr class="success">
                                            <td>04/05/2016</td>
                                            <td>08.00</td>
                                            <td>5.00</td>
                                            <td>9.00</td>
                                            <td>1.00</td>
                                        </tr>
                                        <tr>
                                            <td>03/05/2016</td>
                                            <td>00.00</td>
                                            <td>00.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>05/05/2016</td>
                                            <td>07.58</td>
                                            <td>5.28</td>
                                            <td>9.30</td>
                                            <td>1.30</td>
                                        </tr>
                                        <tr>
                                            <td>04/05/2016</td>
                                            <td>08.00</td>
                                            <td>5.00</td>
                                            <td>9.00</td>
                                            <td>1.00</td>
                                        </tr>
                                        <tr>
                                            <td>03/05/2016</td>
                                            <td>00.00</td>
                                            <td>00.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="success">
                                            <td>05/05/2016</td>
                                            <td>07.58</td>
                                            <td>5.28</td>
                                            <td>9.30</td>
                                            <td>1.30</td>
                                        </tr>
                                        <tr>
                                            <td>05/05/2016</td>
                                            <td>07.58</td>
                                            <td>5.28</td>
                                            <td>9.30</td>
                                            <td>1.30</td>
                                        </tr>
                                        <tr class="success">
                                            <td>04/05/2016</td>
                                            <td>08.00</td>
                                            <td>5.00</td>
                                            <td>9.00</td>
                                            <td>1.00</td>
                                        </tr>
                                        <tr>
                                            <td>03/05/2016</td>
                                            <td>00.00</td>
                                            <td>00.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>05/05/2016</td>
                                            <td>07.58</td>
                                            <td>5.28</td>
                                            <td>9.30</td>
                                            <td>1.30</td>
                                        </tr>
                                        <tr>
                                            <td>04/05/2016</td>
                                            <td>08.00</td>
                                            <td>5.00</td>
                                            <td>9.00</td>
                                            <td>1.00</td>
                                        </tr>
                                        <tr>
                                            <td>03/05/2016</td>
                                            <td>00.00</td>
                                            <td>00.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
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
      </div>

    </div>


    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
        <script src="../../public/js/bootstrap-datepicker.js"></script>
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