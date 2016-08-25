<?php
$var = "visitProfile";
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
                                <i class="fa fa-user-md"></i> User Profile
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 col-sm-6 padding-box">

                    <div class="row">

                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                Profile</h5>
                            <hr>
                            <div class="col-xs-12">

                                <div class="nortification-box-status">
                                    <center>
                                        <div class="tab-box-1"><b>Present</b></div>
                                    </center>

                                    <center>
                                            <img src='../../public/images/default.png' style="margin-bottom:40px; padding-top: 20px" width='60%'  />
                                    </center>

                                    <div class="more-info">
                                        <a href="chat.php" style="color: #00c0ef;font-size: 20 "> Leave a message <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>

                </div>

                <div class="col-sm-6 col-xs-12 padding-box">


                    <div class="row">

                        <div class="col-xs-12">

                            <div class="col-xs-12 nortification-box-top">
                                <h5 class="nortification-box-heading"><i class="fa fa-edit icon-margin-right" aria-hidden="true"></i>
                                    Profile Details</h5>
                                <hr>

                                <?php

                                $sql = "select * from employee INNER JOIN department ON employee.dept_id=department.dept_id INNER JOIN job_category ON employee.job_cat_id=job_category.job_cat_id WHERE comp_id=:empID";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('empID'=>$empID));
                                $result = $query->fetchAll();

                                foreach($result as $rs) {

                                    echo "<div class=\"form-group\">
                                            <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "User Name:";
                                    echo " </label>
                                             <lable>" . $rs['name'] . "</lable>
                                    </div>";

                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "Email:";
                                    echo " </label>
                                        <lable>" . $rs['email'] . "</lable>
                                    </div>";
                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "Contact Number:";
                                    echo " </label>
                                        <lable>" . $rs['tel_no'] . "</lable>
                                    </div>";
                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "Company ID:";
                                    echo " </label>
                                        <lable>" . $rs['comp_id'] . "</lable>
                                    </div>";
                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "Job Level:";
                                    echo" </label>
                                        <lable>" . $rs['emp_level'] . "</lable>
                                    </div>";
                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "NIC:";
                                    echo" </label>
                                        <lable>" . $rs['nic'] . "</lable>
                                    </div>";

                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "Department:";
                                    echo " </label>
                                        <lable>" . $rs['dept_name'] . "</lable>
                                    </div>";

                                    echo "<div class=\"form-group\">
                                        <label class=\"col-xs-5 control-label form-lable\">";
                                    echo "Job Category:";
                                    echo " </label>
                                        <lable>" . $rs['job_cat_name'] . "</lable>
                                    </div>";
                                }

                                ?>
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
