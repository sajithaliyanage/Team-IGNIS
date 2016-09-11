<?php
$var = "profile";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
    header('Location:../../index.php');
}
?>
<!--*********************************************************************************************************-->
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

        <!--navigation bar on the top-->
        <?php include ("../layouts/navbar.php")?>

        <div class="container-fluid ">
            <div class="row ">

                <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
                    <!--menu bar on the left-->
                    <?php include ("../layouts/leftbar.php")?>
                </div>

                <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">

                    <!--show the navigated pages start-->

                    <div class="row padding-row">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol class="breadcrumb breadcrumb-style">
                                    <li>
                                        <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-user-md"></i> My Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!--show the navigated pages end-->

                    <div class="row padding-row">
                        <!--content of My Profile start-->
                        <div class="col-xs-12 col-sm-6 padding-box">

                            <div class="row">

                                <div class="col-xs-12 nortification-box-top">
                                    <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                        My Profile</h5>

                                    <hr>
                                    <div class="row">
                                            <div class="col-xs-12">
                                                <?php
                                                    $sql = "SELECT image from employee WHERE comp_id=:empID";
                                                    $query = $pdo->prepare($sql);
                                                    $query->execute(array('empID'=>$empID));
                                                    $result = $query->fetch();
                                                ?>

                                                <div class="nortification-box-status">
                                                    <center>
                                                        <div>
                                                            <img src='<?php if($result['image']!='null'){echo '../'.$result['image'];}else{echo "../../public/images/default.png";}?>' style="margin-bottom:40px; padding-top: 20px" width='73%' height='400'  />
                                                        </div>
                                                    </center>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--content of My Profile ends-->

                        <!--content of Edit Profile start-->

                        <div class="col-sm-6 col-xs-12 padding-box">

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="col-xs-12 nortification-box-top">
                                            <h5 class="nortification-box-heading"><i class="fa fa-edit icon-margin-right" aria-hidden="true"></i>
                                                Edit Profile</h5>
                                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Your profile edited successfully!</div>
                                            <div class="alert-user" style="<?php if(!isset($_GET['changed'])){echo 'display:none;';}?>">Password reset successfully!</div>
                                            <hr>

                                                <div class="col-xs-12">
                                                <?php

                                                $sql = "select * from employee INNER JOIN department ON employee.dept_id=department.dept_id INNER JOIN job_category ON employee.job_cat_id=job_category.job_cat_id JOIN job_level ON job_level.level_id=employee.level_id WHERE comp_id=:empID";
                                                $query = $pdo->prepare($sql);
                                                $query->execute(array('empID'=>$empID));
                                                $result = $query->fetchAll();

                                                foreach($result as $rs) {

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "Employee Name:";
                                                        echo " </label>
                                                         <div class=\"col-xs-7\">" . $rs['name'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "Company ID:";
                                                        echo " </label>
                                                        <div class=\"col-xs-7\">" . $rs['comp_id'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "Email:";
                                                        echo " </label>
                                                        <div class=\"col-xs-7\">" . $rs['email'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5\">";
                                                            echo "Contact Number:";
                                                        echo " </label>
                                                        <div class=\"col-xs-7\">" . $rs['tel_no'] . "</div>
                                                     </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "Department:";
                                                        echo " </label>
                                                        <div class=\"col-xs-7\">" . $rs['dept_name'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "Job Category:";
                                                        echo " </label>
                                                        <div class=\"col-xs-7\">" . $rs['job_cat_name'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "Job Level:";
                                                        echo" </label>
                                                        <div class=\"col-xs-7\">" . $rs['level_name'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";

                                                    echo "<div class=\"col-xs-12\">
                                                        <label class=\"col-xs-5 \">";
                                                            echo "NIC:";
                                                        echo" </label>
                                                        <div class=\"col-xs-7\">" . $rs['nic'] . "</div>
                                                    </div>";
                                                    echo "<br><br>";
                                             }

                                                ?>

                                                    <div class="col-xs-12">
                                                        <label class="col-xs-5 ">Password:</label>
                                                        <div class="col-xs-7"><a href="../../module/resetpswd.php">Reset Password</a></div>
                                                    </div>

                                                    <br><br>

                                                    <a href="editProfile.php"><button class="btn btn-info btn-lg pull-right submit-button" type="submit" >Edit Profile Details</button></a>
                                                </div>


                                        </div>

                                    </div>
                                </div>
                        </div>
                        <!--content of Edit Profile ends-->

                    </div>
                </div>
            </div>

        </div>

    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.js"></script>

    </body>
</html>