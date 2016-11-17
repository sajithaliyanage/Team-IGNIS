<?php
$var = "roster";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
    header('Location:../../index.php');
}

$sql = "SELECT group_id from employee where comp_id=:empID";
$query = $pdo->prepare($sql);
$query->execute(array('empID'=>$empID));
$result = $query->fetch();
$groupID = $result['group_id'];

if($groupID==0){
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

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/jquery-ui.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/datepicker.css">

  </head>

<body style=" background-color: #eceff4 !important;">

    <?php include ("../layouts/navbar.php")?>

    <div class="container-fluid">
      <div class="row">

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
									<i class="fa fa-briefcase"></i> Roster System
								</li>
							</ol>
						</div>
					</div>
				</div>

				<div class="row padding-row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="col-xs-12 nortification-box-top">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:300px;">

                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <h5 class="nortification-box-heading" style="text-align: center;"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                            Today Shift</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-4" style="padding-left:0 !important; padding-right:0 !important;">
                                                            <table class='table table-responsive table-bordered table-striped '" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Shift name</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Shift 1</td>

                                                                </tr>

                                                                <tr>
                                                                    <td>Shift 2</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Shift 3</td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Holiday</td>

                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-xs-4"  style="padding-left:0 !important;padding-right:0 !important;">
                                                            <table class='table table-responsive table-bordered table-striped ' style="float: left !important;" >

                                                                <thead>
                                                                <tr>
                                                                    <th>Group name</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php


                                                                $smt = "SELECT * FROM employee WHERE comp_id=:log";
                                                                $query = $pdo->prepare($smt);
                                                                $query ->execute(array('log'=>$empID));
                                                                $result = $query->fetchAll();

                                                                foreach ($result as $value) {
                                                                    $dep=$value["dept_id"];
                                                                }
                                                                $smt = "SELECT * FROM group_detail WHERE dept_id=:log1";
                                                                $query = $pdo->prepare($smt);
                                                                $query ->execute(array('log1'=>$dep));
                                                                $result = $query->fetchAll();

                                                                foreach ($result as $rs) {


                                                                    echo'<tr>';
                                                                    echo'<td>'.$rs["group_name"].'</td>';

                                                                    echo'</tr>';






                                                                }
                                                                ?>

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="col-xs-4"  style="padding-left:0 !important;padding-right:0 !important;">
                                                            <table class='table table-responsive table-bordered table-striped ' style="float: left !important;" >

                                                                <thead>
                                                                <tr>
                                                                    <th>Time slot</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>8.00a.m-2.00p.m</td>

                                                                </tr>

                                                                <tr>
                                                                    <td>2.00ppm-8.00p.m</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8.00p.m-2.00a.m</td>

                                                                </tr>
                                                                <tr>
                                                                    <td>..</td>

                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item">
                                        <h5 class="nortification-box-heading" style="text-align: center;"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                            Tomorrow Shift</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="form-group">
                                                    <table class='table-responsive' style="margin-top:30px;">
                                                        <table class='table table-bordered table-striped ' >
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Group Name</th>
                                                                <th>Time Slot</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Shift 1</td>
                                                                <td>Group 1</td>
                                                                <td>7.00 - 12.00</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Shift 1</td>
                                                                <td>Group 1</td>
                                                                <td>7.00 - 12.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shift 1</td>
                                                                <td>Group 1</td>
                                                                <td>7.00 - 12.00</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                        </table>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <h5 class="nortification-box-heading" style="text-align: center;"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                            Yesterday Shift</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="form-group">

                                                    <table class='table-responsive' style="margin-top:30px;">
                                                        <table class='table table-bordered table-striped '>
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Group Name</th>
                                                                <th>Time Slot</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Shift 1</td>
                                                                <td>Group 1</td>
                                                                <td>7.00 - 12.00</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Shift 1</td>
                                                                <td>Group 1</td>
                                                                <td>7.00 - 12.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shift 1</td>
                                                                <td>Group 1</td>
                                                                <td>7.00 - 12.00</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" style="margin-left:-30px;background-image:none;" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left fa-1x" style="margin-top:150px; color:#3498db;" aria-hidden="true"></i>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic"  style="margin-right:-30px;background-image:none;" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right fa-1x" style="margin-top:150px; color:#3498db;"  aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div class="margin-top col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-clock-o icon-margin-right" aria-hidden="true"></i>
                                My Workout In This Week</h5>
                            <hr>

                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                </div>
                            </div>
                            <p style="text-align:left; margin-top:-20px;">0h</p>
                            <p style="text-align:right; margin-top:-30px;">60h</p>

                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="row">
                                        <div class="col-xs-6" style="text-align: right;">
                                            <p>Total Hours per week:</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p><strong>60 hours</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6" style="text-align: right;">
                                            <p>Done Hours per week:</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p style=" color:#00a65a;"><strong>36 hours</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6" style="text-align: right;">
                                            <p>Remaining Hours per week:</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p style=" color:#d43f3a;"><strong>24 hours</strong></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

				    <div class="col-sm-6 col-xs-12">

                                <div class="col-xs-12 nortification-box-top">
                                    <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                        Pending Requests For Changing Shifts</h5>
                                    <hr>
                                        <div>



					<div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Shift Changing Application</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Date :</label>
                                            <div class="col-xs-8">
                                                <input id="startdate" name="startdate" type="text" placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Time :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Group :</label>
                                            <div class="col-xs-8">
                                                <select  name="emp_role" class="form-control">
                                                    <option>-Select-</option>
                                                    <option value="YES">Group A</option>
                                                    <option value="NO">Group B</option>
                                                    <option value="NO">Group C</option>
                                                    <option value="NO">Group D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Member ID :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Rework Date :</label>
                                            <div class="col-xs-8">
                                                <input id="enddate" name="enddate " type="text" placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                            <br>
                                            <br>
                                            <br>

                                            <div class="form-group">
                                                <label class="col-xs-4 control-label form-lable">Rework Time :</label>
                                                <div class="col-xs-8">
                                                    <input id="service_name" name="job_category" type="text" placeholder=""
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



                                            <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Apply Shift</button>

                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                </div>

         </div>
      </div>

    </div>

    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
    <script src="../../public/js/bootstrap-datepicker.js"></script>
    <script src="../../public/js/jquery-ui.js"></script>
    <script>
        $('.carousel').carousel({
            interval:0
        })
    </script>

    <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {


                $('#startdate').datepicker({
                   // format: "dd/mm/yyyy"
                    minDate:+1
                });
                $('#enddate').datepicker({
                    format: "dd/mm/yyyy"
                });

            });
    </script>


</body>
</html>