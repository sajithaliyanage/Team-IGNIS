<?php
$var = "profile";
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
    <link href="css/leave-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include ("navbar.php")?>

<div class="container-fluid " style="background-color: #eceff4;">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row">
                <div class="col-xs-12 col-sm-6 padding-box">

                    <div class="row">
                        <div class="row"><br><br><br><br></div>
                        <div class="col-xs-12 nortification-box-top3">
                            <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                My Profile</h5>
                            <div class="col-xs-10">
                                <img src="images/user.png" width="300" height="300" align="right"/>
                            </div>
                        </div>
                    </div>
                    <br><br>

                    <div class="row">

                        <div class="col-xs-12">
                            <div class="col-xs-12 nortification-box-top1">
                                <hr>
                                <div class="form-group">
                                    <label class="col-xs-5 control-label form-lable">Company Id:</label>
                                    <lable>2014csxxxx</lable>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-5 control-label form-lable">Department:</label>
                                    <lable>Computer Department</lable>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-5 control-label form-lable">Job Category:</label>
                                    <lable>Software Engineer</lable>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-5 control-label form-lable">Job Level:</label>
                                    <lable>Tranier</lable>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-5 control-label form-lable">NIC:</label>
                                    <lable>947341030V</lable>
                                </div>

                            </div>
                        </div>

                </div>

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

                                <div class="col-xs-12 nortification-box-top2">
                                    <h5 class="nortification-box-heading"><i class="fa fa-edit icon-margin-right" aria-hidden="true"></i>
                                        Edit Profile</h5>
                                    <hr>

                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">User Name:</label>
                                        <lable>G.A.G.S.Karunarathna</lable>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Email:</label>
                                        <lable>mymail@gmail.com</lable>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Contact Number:</label>
                                        <lable>0771234567</lable>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label form-lable">Password:</label>
                                        <a href="#">Reset Password</a>
                                    </div>

                                    <br><br><br>

                                    <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Edit</button>



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