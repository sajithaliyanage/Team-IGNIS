<?php
$var = "editProfile";
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

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("../layouts/leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user-md"></i> My Profile
                            </li>
                            <li class="active">
                                <i class="fa fa-user-plus"></i> Edit Profile
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 col-sm-6 padding-box">

                    <div class="row">
                        <div class="row"><br><br><br><br></div>
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                My Profile</h5>
                            <hr>
                            <div class="col-xs-10">

                                <a href="#"><div id="imageBox"></div></a>

                            </div>
                        </div>
                    </div>
                    <br><br>



                </div>

                <div class="col-sm-6 col-xs-12 padding-box">

                    <div class="row">

                        <ul class="nav nav-tabs navbar-right" role="tablist">
                            <li role="presentation" class="active tab-box-1"><a href="attendance.php" class="tab-box-1" aria-controls="home" role="tab" data-toggle="tab""><b>Present</b></a></li>
                            <li role="presentation" class="active tab-box-2"><a href="attendance.php" aria-controls="profile" class="tab-box-2" role="tab" data-toggle="tab"><b>Absent</b></a></li>
                        </ul>

                        <div>

                            <br><br><br><br>
                            <div class="row">

                                <div class="col-xs-12">

                                    <div class="col-xs-12 nortification-box-top">
                                        <h5 class="nortification-box-heading"><i class="fa fa-edit icon-margin-right" aria-hidden="true"></i>
                                            Edit Profile</h5>
                                        <hr>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">User Name:</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder="G.A.G.S.Karunarathna"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Email:</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder="mymail@gmail.com"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Contact Number:</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder="0771234567"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Company Id:</label>
                                            <lable class="col-xs-7 col-xs-12">2014csxxxx</lable>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department:</label>
                                            <lable class="col-xs-7 col-xs-12">Computer Department</lable>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Job Category:</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder="Software Engineer"
                                                       class="form-control input-md" required>
                                            </div>

                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Job Level:</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder="Tranier"
                                                       class="form-control input-md" required>
                                            </div>

                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">NIC:</label>
                                            <lable class="col-xs-7 col-xs-12">947341030V</lable>
                                        </div>

                                        <br>
                                        <br><br>

                                        <a href="profile.php"><button class="btn btn-info btn-lg pull-right submit-button" type="submit" >Save</button></a>


                                    </div>
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