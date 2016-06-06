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

    <?php include ("navbar.php")?>

    <div class="container-fluid ">
      <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background  col-sm-push-2">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-building"></i> Edit Departments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-building icon-margin-right" aria-hidden="true"></i>
                                Current Departments</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div style="height:25px; width:25px; background-color:#8a6d3b; float: left; margin-right:10px; margin-top:5px;"></div>
                                     <h5>HR Department</h5>
                                     <h5 style="float: right; margin-top:-24px;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h5>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div style="height:25px; width:25px; background-color:#00a65a; float: left; margin-right:10px; margin-top:5px;"></div>
                                    <h5>IT Department</h5>
                                    <h5 style="float: right; margin-top:-24px;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h5>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div style="height:25px; width:25px; background-color:#337ab7; float: left; margin-right:10px; margin-top:5px;"></div>
                                    <h5>Server Department</h5>
                                    <h5 style="float: right; margin-top:-24px;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h5>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div style="height:25px; width:25px; background-color:#843534; float: left; margin-right:10px; margin-top:5px;"></div>
                                    <h5>Salary Department</h5>
                                    <h5 style="float: right; margin-top:-24px;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h5>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div style="height:25px; width:25px; background-color:#d58512; float: left; margin-right:10px; margin-top:5px;"></div>
                                    <h5>Marketing Department</h5>
                                    <h5 style="float: right; margin-top:-24px;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h5>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div style="height:25px; width:25px; background-color:#999999; float: left; margin-right:10px; margin-top:5px;"></div>
                                    <h5>Sales Department</h5>
                                    <h5 style="float: right; margin-top:-24px;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add New Department</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department Name :</label>
                                            <div class="col-xs-7">
                                                <input id="service_name" name="dept_name" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department Color :</label>
                                            <div class="col-xs-7">
                                                <input id="service_name" name="dept_color" placeholder="" class="form-control input-md jscolor" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Roster Status :</label>
                                            <div class="col-xs-7">
                                                <select  name="roster_status" class="form-control">
                                                    <option>-Select-</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
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

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">IT Department<span style="float:right;"> Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Sales Department<span style="float:right;"> Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">HR Department<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>
                            </div>
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