<?php
$var = "roster";
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

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
				<div class="row padding-row">
					<div class="row">
						<div class="col-lg-12">
							<ol class="breadcrumb breadcrumb-style">
								<li>
									<i class="fa fa-dashboard"></i>  <a href="index.php">Take Your Leave</a>
								</li>
								<li class="active">
									<i class="fa fa-briefcase"></i> Upload Medical Reports
								</li>
							</ol>
						</div>
					</div>
				</div>
				
			<div class="col-sm-6 col-xs-12">
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
                    </div>   </div>

         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>