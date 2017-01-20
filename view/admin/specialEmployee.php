<?php
$var = "employee";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/interface-leftmenu.css" rel="stylesheet">
    <link href="css/adminpanel-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body style=" background-color: #eceff4 !important;">

    <?php include("navbar.php") ?>

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
                                <i class="fa fa-user-plus"></i> Edit Employees
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                Count of Employees</h5>
                            <hr>
                            <ul class="list-group" >
                                <a href='allEmployee.php' style="margin-bottom:20px !important;">
                                    <li class="list-group-item"  style='border-radius:0 !important; color:#333;margin-bottom:20px !important;border:2px solid #05aad7;'>
                                        <b>See All Employees</b><h5 style='float: right; margin-top:4px;'>More Info <i class='fa fa-chevron-circle-right' style=' margin-right:5px;' aria-hidden='true'></i>
                                    </li>
                                </a>
                                <?php
                                    $sql="SELECT * FROM department WHERE currentStatus=:log";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>"approved"));
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        echo "  <a href='index_department_employee.php?id=".$rs['dept_id']."'>
                                                    <li class=\"list-group-item\"  style='border-radius:0 !important; color:#333; '>
                                                    <span class=\"badge\">";if($rs['no_of_emp']<10){echo "0".$rs['no_of_emp'];}else{echo $rs['no_of_emp'];} echo"</span>
                                                        ".$rs['dept_name']."
                                                    </li>
                                                </a>";
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>

<!--                add employee to department-->
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add Employees with customize leave counts</h5>

                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">New employee added successfully!</div>
                            <div class="alert-user" style="<?php if (!isset($_GET['error'])) {
                                echo 'display:none;';
                            } ?> color:#d43f3a">Invalid Form Actions!
                            </div>
                            <hr>
                            <form role="form" data-toggle="validator" action="module/addSpecialEmployee.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Department :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_department" class="form-control">
                                                    <?php
                                                    $sql = "select * from department WHERE currentStatus=:log and roster_status=:state";
                                                    $query = $pdo->prepare($sql);
                                                    $query->execute(array('log'=>"approved",'state'=>"NO"));
                                                    $result = $query->fetchAll();

                                                    foreach($result as $rs){
                                                        echo " <option value='".$rs['dept_id']."'>".$rs['dept_name']."</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Role :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_role" class="form-control">
                                                    <option value="director">Director</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="executive">Executive Officer</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Job Category :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_category" class="form-control">
                                                    <?php
                                                    $sql = "select * from job_category WHERE currentStatus=:log";
                                                    $query = $pdo->prepare($sql);
                                                    $query->execute(array('log'=>"approved"));
                                                    $result = $query->fetchAll();

                                                    foreach($result as $rs){
                                                        echo " <option value='".$rs['job_cat_id']."'>".$rs['job_cat_name']."</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Job Level :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_level" class="form-control" style="text-transform: capitalize;">
                                                    <?php
                                                        $sql = "select * from job_level";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute();
                                                        $result = $query->fetchAll();

                                                        foreach($result as $rs){
                                                            echo " <option value='".$rs['level_id']."' style='text-transform:capitalize;'>".$rs['level_name']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Company ID :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_id" type="text" placeholder="Tryonics-01"
                                                       class="form-control input-md" required  onblur="showHint(this.value)" />
                                                       <p id="textHint" style="color:red;font-size: 12px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Name :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder=""
                                                       class="form-control input-md" required >
                                                
                                            </div>
                                        </div>
                                        <br>
                                        <br>


                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee NIC :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_nic" type="text" placeholder="xxxxxxxxxV" class="form-control input-md" required onblur="Nicvalidation(this.value)" >
                                                <p id="demo" style="color:red;font-size: 12px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Gender :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_gender" class="form-control">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Email :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_email" placeholder="" type="email" class="form-control input-md " required onblur="Emailvalidation(this.value)" >
                                                <p id="demo1" style="color:red;font-size: 12px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Set Password :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_password" placeholder="" value="123" type="text" class="form-control input-md " required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Telephone :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_tele" placeholder="" type="text" class="form-control input-md " required  onblur="PhoneNovalidation(this.value)">
                                                <p id="demo2" style="color:red;font-size: 12px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <?php
                                        $sql = "select * from leave_type WHERE currentStatus=:log";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('log'=>"approved"));
                                        $result = $query->fetchAll();

                                        foreach($result as $rs){
                                            echo "<div class='form-group'>
                                                        <label class='col-xs-5 control-label form-lable'>".ucwords($rs['leave_name'])." :</label>
                                                        <div class='col-xs-7'>
                                                            <input id='service_name' name='leave_type[]' type='text' placeholder=''
                                                       class='form-control input-md' required>
                                                        </div>
                                                        </div>
                                                    <br/>
                                                    <br/>";
                                        }
                                        ?>


                                            <button class="btn btn-info btn-lg pull-right submit-button" type="submit" >Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
         </div>
      </div>
        <?php
            include('../layouts/onlineStatus.php');
        ?>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    

    function showHint(str) {
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("textHint").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "module/ajaxemployee.php?q=" + str, true);
        xhttp.send();
    }
    function Nicvalidation(str) {
        groupId = str;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("demo").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "module/ajaxAddNewEmployee.php?r=" + str, true);
        xhttp.send();
    }function Emailvalidation(str) {
        groupId = str;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("demo1").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "module/ajaxAddNewEmployee.php?q=" + str, true);
        xhttp.send();
    }function PhoneNovalidation(str) {
        groupId = str;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("demo2").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "module/ajaxAddNewEmployee.php?p=" + str, true);
        xhttp.send();
    }

</script>
    <script>
        $(document).ready(function()
        {
            $(document).bind("contextmenu",function(e){
                return false;
            });
        })
    </script>
</body>
</html>