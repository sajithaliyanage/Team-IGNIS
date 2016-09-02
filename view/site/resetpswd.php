<?php
$var = "resetpswd";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
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
                    <div class="row padding-row">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol class="breadcrumb breadcrumb-style">
                                    <li>
                                        <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-user-md"></i> <a href="profile.php">My Profile</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-user-plus"></i> Reset Password
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="row padding-row">
                        <div class="col-xs-12 padding-box">

                            <div class="col-xs-12 nortification-box-top">
                                <h5 class="nortification-box-heading"><i class="fa fa-lock icon-margin-right" aria-hidden="true"></i>
                                    Reset Password
                                </h5>
                                <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Password changed successfully!</div>
                                <hr>
                                    <div class="form-bottom">
                                    <form role="form"  data-toggle="validator" action="../../module/resetPswd.php" method="post">

                                            <div class="form-group">
                                                <label class="sr-only" for="form-username">Current password</label>
                                                <input type="password" name="cur_pswd" placeholder="Current password" class="form-username form-control" id="form-username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="form-password">New password</label>
                                                <input type="password" name="new_pswd" placeholder="New password" class="form-password form-control" id="form-password" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="form-password">Confirm password</label>
                                                <input type="password" name="con_pswd" placeholder="Confirm password" class="form-password form-control" id="form-password" required>
                                            </div>
                                            <button class="btn btn-info btn-lg pull-right submit-button" type="submit" >Reset password</button>

                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>

    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
</body>

</html>