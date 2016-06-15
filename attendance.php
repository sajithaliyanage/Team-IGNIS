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

        <div class="col-sm-10 col-xs-12 col-sm-push-2">

            <div class="col-sm-6 col-xs-12 padding-box">
                <div class="row">
                    <div class="col-xs-12 nortification-box-top">
                        <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                            Set Leaves for Job Categories</h5>
                        <hr>
                        <form role="form" data-toggle="validator" action="" method="post">
                            <div class="department-add">
                                <div class="col-xs-12">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Job Category :</label>
                                        <div class="col-xs-7">
                                            <input id="service_name" name="job_category" type="text" placeholder=""
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Job Level :</label>
                                        <div class="col-xs-7">
                                            <select  name="emp_role" class="form-control">
                                                <option>-Select-</option>
                                                <option value="YES">Permanent</option>
                                                <option value="NO">Probation</option>
                                                <option value="NO">Trainee</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Annual Leaves :</label>
                                        <div class="col-xs-7">
                                            <input id="service_name" name="job_category" type="text" placeholder=""
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Casual Leaves :</label>
                                        <div class="col-xs-7">
                                            <input id="service_name" name="job_category" type="text" placeholder=""
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Medical Leaves :</label>
                                        <div class="col-xs-7">
                                            <input id="service_name" name="job_category" type="text" placeholder=""
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Half Days</label>
                                        <div class="col-xs-7">
                                            <input id="service_name" name="job_category" type="text" placeholder=""
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Monthly Short Leaves :</label>
                                        <div class="col-xs-7">
                                            <input id="service_name" name="job_category" type="text" placeholder=""
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
            </div>
        </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>