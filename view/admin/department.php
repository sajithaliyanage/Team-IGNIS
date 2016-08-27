<?php
$var = "department";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

//require_once('module/Department.php');

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
                                <i class="fa fa-building"></i> Edit Departments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-building icon-margin-right" aria-hidden="true"></i>
                                Current Departments</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                    $sql = "select * from department WHERE currentStatus=:log";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>"approved"));
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        echo " <a href='index_department_employee.php?id=".$rs['dept_id']."' class='list-group-item'>
                                                <div style='height:25px; width:25px; background-color:".$rs['dept_color']."; float: left; margin-right:10px; margin-top:5px;'></div>
                                                <h5>".$rs['dept_name']."</h5>
                                                <h5 style='float: right; margin-top:-24px;'>More Info <i class='fa fa-chevron-circle-right' aria-hidden='true'></i></h5>
                                               </a>";
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add New Department</h5>

<!--                            //alert to user-->
                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Department added successfully!</div>

                            <hr>
                            <form role="form" data-toggle="validator" action="module/addDepartments.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department Name :</label>
                                            <div class="col-xs-7">
                                                <input id="service_name" name="dept_name" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department Color :</label>
                                            <div class="col-xs-7">
                                                <input type="color" id="service_name" name="dept_color" placeholder="" class="form-control input-md jscolor" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Roster Status :</label>
                                            <div class="col-xs-7">
                                                <select  name="roster_status" class="form-control">
                                                    <option>-Select-</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
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

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                    $sql = "select * from department";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        echo "<a href='#' class='list-group-item'>".$rs['dept_name']."<span style='float:right;'>"; if($rs['currentStatus']=='waiting'){echo 'Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>';}else if($rs['currentStatus']=='approved'){ echo 'Approved <i class=\'fa fa-check\' aria-hidden=\'true\'></i></span></a>';}else{echo 'Rejected <i class=\'fa fa-close\' aria-hidden=\'true\'></i></span></a>';};
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
<!--    <script src="js/jscolor.min.js"></script>-->
    <script src="js/bootstrap.js"></script>
</body>
</html>