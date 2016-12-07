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

</head>

<body style=" background-color: #eceff4 !important;">

<?php include ("../layouts/navbar.php");?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("../layouts/leftbar.php");?>
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
                                <i class="fa fa-user-md"></i> <a href="profile.php"> My Profile</a>
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

                    <div class="col-xs-12 nortification-box-top">
                        <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                            My Profile
                        </h5>
                        <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Profile picture changed successfully!</div>
                        <hr>
                            <div class="col-xs-12">
                            <?php
                                    $sql = "SELECT image from employee WHERE comp_id=:empID";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('empID'=>$empID));
                                    $result = $query->fetch();
                                ?>

                                <div class="nortification-box-status">
                                    <center>
                                        <form action="../../module/changeProfilePic.php" method="POST"  enctype="multipart/form-data"  title="Click here to change your profile picture!">
                                            <label for="fileToUpload" style="width:100%;">
                                                <img src='<?php if($result['image']!='null'){echo '../'.$result['image'];}else{echo "../../public/images/default.png";}?>' style="margin-bottom:40px; padding-top: 20px" width='80%' height='400' />
                                            </label>

                                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)"/>

                                            <p style="margin-top:-30px; color: #FF0000;">(PNG,JPG,JPEG files only allowed - Max Size 3MB (320x400))</p>

                                            <div id="myProgress" style="margin-top:20px;">
                                                <div id="myBar">
                                                    <div id="label">0%</div>
                                                </div>
                                                <button class="btn btn-info btn-lg pull-right submit-button" type="submit" style="margin-top:40px;">Change</button>
                                            </div>

                                        </form>

                                    </center>
                                </div>
                            </div>

                    <br><br>

                </div>
                </div>
                <div class="col-sm-6 col-xs-12 padding-box">

                            <div class="row">

                                <div class="col-xs-12">

                                    <div class="col-xs-12 nortification-box-top">
                                        <h5 class="nortification-box-heading"><i class="fa fa-edit icon-margin-right" aria-hidden="true"></i>
                                            Edit Profile</h5>
                                        <hr>
                                        <form role="form" data-toggle="validator" action="../../module/editEmployeeProfile.php" method="post">
                                            <?php

                                            $sql = "select * from employee INNER JOIN department ON employee.dept_id=department.dept_id INNER JOIN job_category ON employee.job_cat_id=job_category.job_cat_id  JOIN job_level ON job_level.level_id=employee.level_id WHERE comp_id=:empID";
                                            $query = $pdo->prepare($sql);
                                            $query->execute(array('empID'=>$empID));
                                            $result = $query->fetchAll();

                                            foreach($result as $rs) {

                                                echo "<div class=\"form-group\">
                                                     <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "Employee Name:";
                                                        echo "</label>
                                                        <div class=\"col-sm-7 col-xs-12\">
                                                            <input id=\"service_name\" name=\"emp_name\" value='".$rs['name']."' type=\"text\" placeholder=''
                                                                   class=\"form-control input-md\" required>
                                                        </div>
                                                    </div>";

                                                echo "<br><br><br>
                                                    <div class=\"form-group\">
                                                        <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "Company Id:";
                                                        echo "</label>
                                                        <lable class=\"col-xs-7 col-xs-12\">".$rs['comp_id']."</lable>
                                                    </div>";

                                                echo "<br><br>
                                                    <div class=\"form-group\">
                                                     <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "Email:";
                                                        echo "</label>
                                                        <div class=\"col-sm-7 col-xs-12\">
                                                            <input id=\"service_name\" name=\"emp_email\" value='".$rs['email']."' type=\"text\" placeholder=''
                                                                   class=\"form-control input-md\" required>
                                                        </div>
                                                    </div>";

                                                 echo "<br><br>
                                                    <div class=\"form-group\">
                                                     <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "Contact number:";
                                                        echo "</label>
                                                        <div class=\"col-sm-7 col-xs-12\">
                                                            <input id=\"service_name\" name=\"emp_tele\" value='".$rs['tel_no']."' type=\"text\" placeholder=''
                                                                   class=\"form-control input-md\" required>
                                                        </div>
                                                    </div>";

                                                echo "<br><br>
                                                    <div class=\"form-group\">
                                                        <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "Department:";
                                                        echo "</label>
                                                        <lable class=\"col-xs-7 col-xs-12\">".$rs['dept_name']."</lable>
                                                    </div>";

                                                echo "<br><br>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-5 col-xs-12 control-label form-lable\">Job Category :</label>

                                                    <lable class=\"col-xs-7 col-xs-12\">".$rs['job_cat_name']."</lable>

                                                </div>";

                                                echo "<br><br>
                                                    <div class=\"form-group\">
                                                     <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "Job Level:";
                                                        echo "</label>
                                                       <lable class=\"col-xs-7 col-xs-12\" style='text-transform: capitalize;'>".$rs['level_name']."</lable>
                                                    </div>";

                                                echo "<br><br>
                                                    <div class=\"form-group\">
                                                        <label class=\"col-xs-5 control-label form-lable\">";
                                                        echo "NIC:";
                                                        echo "</label>
                                                        <lable class=\"col-xs-7 col-xs-12\">".$rs['nic']."</lable>
                                                    </div>";
                                                echo"<br><br><br>";
                                                    }
                                                    ?>

                                            <a href="profile.php"><button class="btn btn-info btn-lg pull-right submit-button" type="submit" >Save Changes</button></a>

                                        </form>
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
