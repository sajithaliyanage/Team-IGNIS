<?php
$var = "set";
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

  <body style=" background-color: #eceff4 !important;">

    <?php include("navbar.php") ?>

    <div class="container-fluid ">
      <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus"></i> Set Leaves
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-eye icon-margin-right" aria-hidden="true"></i>
                                Show Leave Count</h5>
                            <hr>
                            <h5 style="text-align: right;">Total Job Categories : <span class="badge">05</span></h5>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                                                <h5>Software Engineer<span style="margin-left:10px;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></h5></a>
                                            <span class="label label-danger" style="float: right; margin-top:-24px; margin-right:50px !important;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                            <span class="label label-success" style="float: right; margin-top:-24px;">Edit <i class="fa fa-close" aria-hidden="true"></i></span>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table-responsive">
                                                <table class="table table-bordered table-striped ">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Permanent</th>
                                                        <th>Probation</th>
                                                        <th>Trainee</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Annual Leves</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Casual Leves</td>
                                                        <td>42</td>
                                                        <td>20</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Leves</td>
                                                        <td>5</td>
                                                        <td>2</td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <h5>Web Developer<span style="margin-left:10px;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></h5></a>
                                            <span class="label label-danger" style="float: right; margin-top:-24px; margin-right:50px !important;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                            <span class="label label-success" style="float: right; margin-top:-24px;">Edit <i class="fa fa-close" aria-hidden="true"></i></span>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table-responsive">
                                                <table class="table table-bordered table-striped ">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Permanent</th>
                                                        <th>Probation</th>
                                                        <th>Trainee</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Annual Leves</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Casual Leves</td>
                                                        <td>42</td>
                                                        <td>20</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Leves</td>
                                                        <td>5</td>
                                                        <td>2</td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                                <h5>Graphic Designer<span style="margin-left:10px;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></h5></a>
                                            <span class="label label-danger" style="float: right; margin-top:-24px; margin-right:50px !important;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                            <span class="label label-success" style="float: right; margin-top:-24px;">Edit <i class="fa fa-close" aria-hidden="true"></i></span>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table-responsive">
                                                <table class="table table-bordered table-striped ">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Permanent</th>
                                                        <th>Probation</th>
                                                        <th>Trainee</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Annual Leves</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Casual Leves</td>
                                                        <td>42</td>
                                                        <td>20</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Leves</td>
                                                        <td>5</td>
                                                        <td>2</td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                <h5>HR Manager<span style="margin-left:10px;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></h5></a>
                                            <span class="label label-danger" style="float: right; margin-top:-24px; margin-right:50px !important;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                            <span class="label label-success" style="float: right; margin-top:-24px;">Edit <i class="fa fa-close" aria-hidden="true"></i></span>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table-responsive">
                                                <table class="table table-bordered table-striped ">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Permanent</th>
                                                        <th>Probation</th>
                                                        <th>Trainee</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Annual Leves</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Casual Leves</td>
                                                        <td>42</td>
                                                        <td>20</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Leves</td>
                                                        <td>5</td>
                                                        <td>2</td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                                                <h5>Content Writer<span style="margin-left:10px;"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></h5></a>
                                            <span class="label label-danger" style="float: right; margin-top:-24px; margin-right:50px !important;">Delete <i class="fa fa-close" aria-hidden="true"></i></span>
                                            <span class="label label-success" style="float: right; margin-top:-24px;">Edit <i class="fa fa-close" aria-hidden="true"></i></span>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table-responsive">
                                                <table class="table table-bordered table-striped ">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Permanent</th>
                                                        <th>Probation</th>
                                                        <th>Trainee</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Annual Leves</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Casual Leves</td>
                                                        <td>42</td>
                                                        <td>20</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Leves</td>
                                                        <td>5</td>
                                                        <td>2</td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="js/jscolor.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>