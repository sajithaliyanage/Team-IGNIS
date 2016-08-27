<?php
$var = "roster";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
    header('Location:../../index.php');
}
$deptID = null;

if(isset($_GET['id'])){
    $deptID =$_GET['id'];
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
    <link rel="stylesheet" href="../../public/css/datepicker.css">

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
                                <i class="fa fa-user-plus"></i> Edit Roster System
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12">
                        <!-- Nav tabs -->
                    <div class="alert-user2" style="<?php if(!isset($_GET['group'])){echo 'display:none;';}?>">Group added successfully!</div>
                    <div class="alert-user2" style="<?php if(!isset($_GET['shift'])){echo 'display:none;';}?>">Shift added successfully!</div>
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
                                                    <?php
                                                        $sql = "select * from department WHERE currentStatus=:log AND roster_status=:state";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log'=>"approved",'state'=>"YES"));
                                                        $result = $query->fetchAll();

                                                        foreach($result as $rs){
                                                            echo "<li class=\"list-group-item\">
                                                                    <span class=\"badge\">".$rs['no_of_emp']."</span>
                                                                    ".$rs['dept_name']."
                                                                  </li>";
                                                        }
                                                    ?>
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
                                                        <select  name="emp_role" class="form-control"  onchange = 'showUser1(this.value)'>
                                                            <option value="empty">- Select -</option>
                                                            <?php
                                                                $sql = "select * from department WHERE currentStatus=:log and roster_status=:state";
                                                                $query = $pdo->prepare($sql);
                                                                $query->execute(array('log'=>"approved",'state'=>"YES"));
                                                                $result = $query->fetchAll();

                                                                foreach($result as $rs){
                                                                    echo " <option value='".$rs['dept_id']."'>".$rs['dept_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="demos"><center><label style="margin-top:15px; font-weight:100;">Select any Department</label></center></div>
                                            </div>
                                        </div>

                                        <div class="row margin-top">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-hourglass-half icon-margin-right" aria-hidden="true"></i>
                                                    Show Sifts</h5>
                                                <hr>

                                                <div class="form-group" style="margin-bottom:20px !important;">
                                                    <label class="col-sm-5 col-xs-12 control-label form-lable">Select Department :</label>
                                                    <div class="col-sm-7 col-xs-12">
                                                        <select  name="emp_role" class="form-control"  onchange = 'showUser2(this.value)'>
                                                            <option value="empty">- Select -</option>
                                                            <?php
                                                                $sql = "select * from department WHERE currentStatus=:log and roster_status=:state";
                                                                $query = $pdo->prepare($sql);
                                                                $query->execute(array('log'=>"approved",'state'=>"YES"));
                                                                $result = $query->fetchAll();

                                                                foreach($result as $rs){
                                                                    echo " <option value='".$rs['dept_id']."'>".$rs['dept_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="demo"><center><label style="margin-top:15px; font-weight:100;">Select any Department</label></center></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-xs-12 padding-box">
                                        <div class="row">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                                    Add New Employee</h5>
                                                <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">New employee added successfully!</div>
                                                <hr>

                                                <form role="form" data-toggle="validator" action="module/addRosterEmployee.php" method="post">
                                                    <div class="department-add">
                                                        <div class="col-xs-12">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Department :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="emp_department" class="form-control"  onchange = 'showUser3(this.value)'>
                                                                        <?php
                                                                            if(isset($_GET['id'])){
                                                                                $sqls = "select dept_name from department WHERE currentStatus=:log and roster_status=:state and dept_id=:dID";
                                                                                $querys = $pdo->prepare($sqls);
                                                                                $querys->execute(array('log'=>"approved",'state'=>"YES",'dID'=>$deptID));
                                                                                $results = $querys->fetch();

                                                                                echo "<option value="; if(isset($_GET['id'])){echo $deptID;}else{ echo 'empty';} echo" >"; if(isset($_GET['id'])){echo $results['dept_name'];}else{ echo '- Select -';} echo"</option>";
                                                                            }else{
                                                                                echo "<option value='empty'>- Select -</option>";

                                                                                $sql = "select * from department WHERE currentStatus=:log and roster_status=:state";
                                                                                $query = $pdo->prepare($sql);
                                                                                $query->execute(array('log'=>"approved",'state'=>"YES"));
                                                                                $result = $query->fetchAll();

                                                                                foreach($result as $rs){
                                                                                    echo " <option value='".$rs['dept_id']."'>".$rs['dept_name']."</option>";
                                                                                }
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
                                                                    <select  name="emp_level" class="form-control"  style="text-transform: capitalize;">
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
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Group Name :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="group_id" class="form-control">
                                                                        <?php
                                                                        $sql = "select * from group_detail WHERE dept_id=:deptID";
                                                                        $query = $pdo->prepare($sql);
                                                                        $query->execute(array('deptID'=>$deptID));
                                                                        $result = $query->fetchAll();

                                                                        foreach($result as $rs){
                                                                            echo " <option value='".$rs['group_id']."'>".$rs['group_name']."</option>";
                                                                        }
                                                                        ?>

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
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Employee NIC :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <input id="service_name" name="emp_nic" type="text" placeholder="xxxxxxxxxV" class="form-control input-md" required>                                            </div>
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
                                                                    <input id="service_name" name="emp_email" placeholder="" type="email" class="form-control input-md " required>
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
                                                                    <input id="service_name" name="emp_tele" placeholder="" type="text" class="form-control input-md " required>
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

                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 padding-row" style="margin-top: 50px;">
                                        <div class="row">
                                            <div class="col-xs-12 nortification-box-top">
                                                <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                                    Add New Group</h5>
                                                <hr>
                                                <form role="form" data-toggle="validator" action="module/addGroup.php" method="post">
                                                    <div class="department-add">
                                                        <div class="col-xs-12">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Department :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="groups" class="form-control">
                                                                        <?php
                                                                            $sql = "select * from department WHERE currentStatus=:log and roster_status=:state";
                                                                            $query = $pdo->prepare($sql);
                                                                            $query->execute(array('log'=>"approved",'state'=>"YES"));
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
                                                <form role="form" data-toggle="validator" action="module/addShift.php" method="post">
                                                    <div class="department-add">
                                                        <div class="col-xs-12">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="col-sm-5 col-xs-12 control-label form-lable">Department :</label>
                                                                <div class="col-sm-7 col-xs-12">
                                                                    <select  name="dept_id" class="form-control">
                                                                        <?php
                                                                            $sql = "select * from department WHERE currentStatus=:log and roster_status=:state";
                                                                            $query = $pdo->prepare($sql);
                                                                            $query->execute(array('log'=>"approved",'state'=>"YES"));
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
                                                                <label class="col-xs-5 control-label form-lable">Shift Name :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="shift_name" type="text" placeholder=""
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-xs-5 control-label form-lable">Start Time :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="start_time" type="text" placeholder="07.00 in 24h"
                                                                           class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>

                                                            <div class="form-group">
                                                                <label class="col-xs-5 control-label form-lable">End Time :</label>
                                                                <div class="col-xs-7">
                                                                    <input id="service_name" name="end_time" type="text" placeholder="20.00 in 24h"
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
<!--    <script src="js/filter.js"></script>-->
    <script src="js/bootstrap.js"></script>
    <script>
        function showUser1(str){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState==4 && xhttp.status==200){
                    document.getElementById("demos").innerHTML = xhttp.responseText;
                }
            }
            xhttp.open("GET","module/ajaxRoster.php?q1="+str ,true);
            xhttp.send();
        }

        function showUser2(str){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState==4 && xhttp.status==200){
                    document.getElementById("demo").innerHTML = xhttp.responseText;
                }
            }
            xhttp.open("GET","module/ajaxRoster.php?q2="+str ,true);
            xhttp.send();
        }


        function showUser3(str) {
            if(str != 'empty'){
                var javascriptVariable = str;
                window.location.href = "roster.php?id=" + javascriptVariable;
            }
        }
    </script>
</body>
</html>