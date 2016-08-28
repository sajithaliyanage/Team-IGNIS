<?php
$var = "roster";
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
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:400px;">

                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <h5 class="nortification-box-heading" style="text-align: center;"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                            Today Shift</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="form-group">
                                                    <label class="col-xs-4 control-label form-lable">Starting Date:</label>

                                                    <div class="col-xs-8">
                                                        <input id="example2" name="start_date" type="text"
                                                               placeholder="dd/mm/yyyy"
                                                               class="form-control input-md" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="item">
                                        <h5 class="nortification-box-heading" style="text-align: center;"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                            Tomorrow Shift</h5>
                                        <hr>
                                    </div>
                                    <div class="item">
                                        <h5 class="nortification-box-heading" style="text-align: center;"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                            Yesterday Shift</h5>
                                        <hr>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" style="background-image:none;" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left fa-1x" style="margin-top:190px; color:#3498db;" aria-hidden="true"></i>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic"  style="background-image:none;" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right fa-1x" style="margin-top:190px; color:#3498db;"  aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>




                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Shift Application</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Date :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder="dd/mm/yyyy"
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
                                                <input id="service_name" name="job_category" type="text" placeholder="dd/mm/yyyy"
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
    <script>
        $('.carousel').carousel({
            interval:0
        })
    </script>
</body>
</html>