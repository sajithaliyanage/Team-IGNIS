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
                                <i class="fa fa-user-plus"></i> Edit Roster System
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs navbar-right" role="tablist">
                            <li role="presentation" class="active tab-box-1"><a href="#home" class="tab-box-1" aria-controls="home" role="tab" data-toggle="tab"">Manage Roster</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" class="tab-box-2" role="tab" data-toggle="tab">Adding Roster</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home" >
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 padding-box" style="margin-top:50px;">
                                        <div class="row">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                                    Count of Employees</h5>
                                                <hr>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <span class="badge">14</span>
                                                        Server Department
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="badge">35</span>
                                                        Security Department
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row margin-top">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-users icon-margin-right" aria-hidden="true"></i>
                                                    Show Groups</h5>
                                                <hr>

                                                <div class="form-group">
                                                    <label class="col-sm-5 col-xs-12 control-label form-lable">Select Department :</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <select  name="emp_role" class="form-control">
                                                            <option>-Select-</option>
                                                            <option value="YES">IT</option>
                                                            <option value="NO">Sales</option>
                                                            <option value="NO">Marketing</option>
                                                            <option value="NO">HR</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <table class="table table-striped " style="text-align: center;margin-top:73px;">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Group Name</th>
                                                        <th style="text-align: center;">Count of Emloyees</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Shift 1</td>
                                                        <td>4</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shift 2</td>
                                                        <td>8</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shift 3</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shift 4</td>
                                                        <td>6</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row margin-top">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-hourglass-half icon-margin-right" aria-hidden="true"></i>
                                                    Show Sifts</h5>
                                                <hr>

                                                <div class="form-group">
                                                    <label class="col-sm-5 col-xs-12 control-label form-lable">Select Department :</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <select  name="emp_role" class="form-control">
                                                            <option>-Select-</option>
                                                            <option value="YES">IT</option>
                                                            <option value="NO">Sales</option>
                                                            <option value="NO">Marketing</option>
                                                            <option value="NO">HR</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <table class="table table-striped " style="text-align: center;margin-top:73px;">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Shift Name</th>
                                                        <th style="text-align: center;">Start Time</th>
                                                        <th style="text-align: center;">End Time</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Morning Session</td>
                                                        <td>7.00am</td>
                                                        <td>12.00pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Evening Session</td>
                                                        <td>11.00am</td>
                                                        <td>7.00pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Night Session</td>
                                                        <td>7.00pm</td>
                                                        <td>7.00am</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-xs-12 padding-box">
                                        <div class="row">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                                    Add New Employee</h5>
                                                <hr>
                                                <form role="form" data-toggle="validator" action="" method="post">
                                                    <div class="department-add">
                                                        <div class="col-xs-12">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Department :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_role" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">IT</option>
                                                                        <option value="NO">Sales</option>
                                                                        <option value="NO">Marketing</option>
                                                                        <option value="NO">HR</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>


                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Role :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_role" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">Director</option>
                                                                        <option value="NO">Manager</option>
                                                                        <option value="NO">Executive Officer</option>
                                                                        <option value="NO">Employee</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Name :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_name" type="text" placeholder=""
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Company ID :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_id" type="text" placeholder="Tryonics-01"
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee NIC :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_nic" type="text" placeholder="xxxxxxxxxV" class="form-control input-md" required>                                            </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee DOB :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_dob" placeholder="" class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Gender :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_gender" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">Male</option>
                                                                        <option value="NO">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Email :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_email" placeholder="" type="email" class="form-control input-md " required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Password :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_password" placeholder="" type="text" class="form-control input-md " required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Telephone :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_tele" placeholder="" type="text" class="form-control input-md " required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Group ID :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_tele" placeholder="" type="text" class="form-control input-md " required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Job Category :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_gender" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">Software Engineer</option>
                                                                        <option value="NO">Secretary</option>
                                                                        <option value="NO">Clerk</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Job Level :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_gender" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">Permanent</option>
                                                                        <option value="NO">Probation</option>
                                                                        <option value="NO">Trainee</option>
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

                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 padding-row" style="margin-top: 50px;">
                                        <div class="row">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                                    Add New Group</h5>
                                                <hr>
                                                <form role="form" data-toggle="validator" action="" method="post">
                                                    <div class="department-add">
                                                        <div class="col-xs-12">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Department :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_role" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">IT</option>
                                                                        <option value="NO">Sales</option>
                                                                        <option value="NO">Marketing</option>
                                                                        <option value="NO">HR</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-xs-5 control-label form-lable">Group Name :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="group_name" type="text" placeholder=""
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

                                    <div class="col-sm-6 col-xs-12 padding-row" style="margin-top:10px;">
                                        <div class="row">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                                    Add New Shift</h5>
                                                <hr>
                                                <form role="form" data-toggle="validator" action="" method="post">
                                                    <div class="department-add">
                                                        <div class="col-xs-12">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Department :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_role" class="form-control">
                                                                        <option>-Select-</option>
                                                                        <option value="YES">IT</option>
                                                                        <option value="NO">Sales</option>
                                                                        <option value="NO">Marketing</option>
                                                                        <option value="NO">HR</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-xs-5 control-label form-lable">Shift Name :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="group_name" type="text" placeholder=""
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-xs-5 control-label form-lable">Start Time :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="group_name" type="text" placeholder=""
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-xs-5 control-label form-lable">End Time :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="group_name" type="text" placeholder=""
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
            </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>