<?php
$var = "resetpswd";
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

<body>

<div class="top-content" style="margin-bottom:-50px; !important;">

    <div class="inner-bg">
        <div class="container">

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
                                <i class="fa fa-user-plus"></i> Reset Password
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Reset your password</h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Current password</label>
                                <input type="password" name="form-username" placeholder="Current password" class="form-username form-control" id="form-username" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">New password</label>
                                <input type="password" name="form-password" placeholder="New password" class="form-password form-control" id="form-password" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Confirm password</label>
                                <input type="password" name="form-password" placeholder="Confirm password" class="form-password form-control" id="form-password" required>
                            </div>
                            <button type="submit" class="btn">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</body>

</html>