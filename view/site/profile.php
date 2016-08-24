<?php
$var = "profile";
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

    <script src="../../public/js/bootstrap.js"></script>
    <script src="../../public/js/bootstrap-datepicker.js"></script>
    <script src="../../public/js/myProfile.js"></script>

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
                                <i class="fa fa-user-md"></i> My Profile
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
                                My Profile</h5>
                            <hr>
                            <div class="col-xs-12">

                                <div class="nortification-box-status">
                                    <ul class="nav nav-tabs navbar-right" role="tablist">
                                        <li><h5 style="margin-right: 120px;font-size: 20px">Available status</h5></li>
                                        <li role="presentation" class="active tab-box-1"><a href="attendance.php" class="tab-box-1" aria-controls="home" role="tab" data-toggle="tab""><b>Present</b></a></li>
<!--                                    <li role="presentation" class="active tab-box-2"><a href="attendance.php" aria-controls="profile" class="tab-box-2" role="tab" data-toggle="tab"><b>Absent</b></a></li>-->
                                    </ul>

                                </div>
                                <br><br>

                                <center>
                                    <a href="#" for="fileToUpload" data-toggle="tooltip" data-placement="top" title="Click here to change your profile picture!">
                                        <!--<img class="grayscale" src="../../public/images/default.png" width="350" height="400"/>-->
                                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)"/>
                                        <img src='../../public/images/default.png' style="margin-bottom:40px " width='60%' onmouseover="this.src='../../public/images/default_hover.png';" onmouseout="this.src='../../public/images/default.png';" />
                                    </a>
                                    <div class="output"></div>


                                    <div id="myProgress" style="margin-top:20px;">
                                        <div id="myBar">
                                            <div id="label">0%</div>
                                        </div>
                                    </div>

                                </center>


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
                                        Edit Profile</h5>
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
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Password:</label>
                                            <a href="resetpswd.php">Reset Password</a>
                                        </div>

                                        <br><br>

                                        <a href="editProfile.php"><button class="btn btn-info btn-lg pull-right submit-button" type="submit" >Edit</button></a>


                                </div>

                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>

</div>

<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>

<script>
    $('#fileToUpload').click(function() {
        $('#myProgress').css({
            'display': 'block'
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(600)
                    .height(500);
            };

            reader.readAsDataURL(input.files[0]);
            move()
        }
    }
    function move() {
        var elem = document.getElementById("myBar");
        var width = 10;
        var id = setInterval(frame, 10);

        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
                document.getElementById("label").innerHTML = width * 1 + '%';
            }
        }
    }
</script>
</body>
</html>