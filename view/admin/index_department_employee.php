<?php
$var = "index";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
    header('Location:../../index.php');
}

$deptID = $_GET['id'];

$sql0="SELECT * FROM department where dept_id=:log";
$query0 = $pdo->prepare($sql0);
$query0->execute(array('log'=>$deptID));
$result0 = $query0->fetchAll();

$sql="SELECT * FROM manager JOIN employee ON manager.comp_id=employee.comp_id WHERE manager.dept_id=:log";
$query = $pdo->prepare($sql);
$query->execute(array('log'=>$deptID));
$result = $query->fetchAll();
$managerCount = $query->rowCount();

$sql2="SELECT * FROM executive JOIN employee ON executive.comp_id=employee.comp_id WHERE executive.dept_id=:log";
$query2 = $pdo->prepare($sql2);
$query2->execute(array('log'=>$deptID));
$result2 = $query2->fetchAll();
$executiveCount = $query2->rowCount();

$sql3="SELECT * FROM general_employee JOIN employee ON general_employee.comp_id=employee.comp_id WHERE general_employee.dept_id=:log";
$query3 = $pdo->prepare($sql3);
$query3->execute(array('log'=>$deptID));
$result3 = $query3->fetchAll();
$empCount = $query3->rowCount();

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
            <?php include("leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <a href="index.php">Overall Company</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-building"></i><a href="index_departments.php"> Departments</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Employees
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row  padding-box-inner">
                <div class="row padding-row" style="margin-top:-30px;">
                    <div class="col-xs-12 padding-box" style="background-color:#<?php echo $result0[0][3]?>;">
                        <h4 style="text-align: center; color: #FFFFFF; text-transform: uppercase;"><?php echo $result0[0][1]; ?></h4>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12 col-sm-4">
                        <h4 class="padding-row" style="text-align: center;">Managers (<?php if($managerCount<10){echo "0".$managerCount;}else{echo $managerCount;}?>) </h4>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h4 class="padding-row" style="text-align: center;">Executive Officers (<?php if($executiveCount<10){echo "0".$executiveCount;}else{echo $executiveCount;}?>)</h4>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h4 class="padding-row" style="text-align: center;">Employees (<?php if($empCount<10){echo "0".$empCount;}else{echo $empCount;}?>)</h4>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row " style="background-color: #FFFFFF; margin-right:20px; margin-left:20px; padding-bottom:10px;">

                <div class="col-sm-4 col-xs-12 padding-box" style="border-left:1px solid #262626;">
                    <?php
//                        if($managerCount==0){
//                            echo "No one add yet";
//                        }
                        foreach($result as $rs){
                            echo "<a href='../site/profile.php?empId=".$rs['comp_id']."'>
                                   <div class=\"row\" style=\"margin-top:10px;\">
                                    <div class=\"col-xs-4\">
                                        <center>
                                            <img src=\"images/default.png\" class=\"img-responsive\" style=\"height:60px; width:60px;\" />
                                        </center>
                                    </div>
                                    <div class=\"col-xs-8\">
                                        <h5 style=\"margin-top:24px;float\">";if($rs['gender']=='male'){echo "Mr. ";}else{echo "Mrs. ";} echo $rs['name']."</h5>
                                    </div>
                                  </div>
                                  </a>";
                        }
                    ?>

                </div>

                <div class="col-sm-4 col-xs-12 padding-box" style="border-left:1px solid #262626;">
                    <?php
//                    if($executiveCount==0){
//                        echo "No one add yet";
//                    }
                    foreach($result2 as $rs){
                        echo "<a href='../site/profile.php?empId=".$rs['comp_id']."'>
                              <div class=\"row\" style=\"margin-top:10px;\">
                                    <div class=\"col-xs-4\">
                                        <center>
                                            <img src=\"images/default.png\" class=\"img-responsive\" style=\"height:60px; width:60px;\" />
                                        </center>
                                    </div>
                                    <div class=\"col-xs-8\">
                                        <h5 style=\"margin-top:24px;float\">";if($rs['gender']=='male'){echo "Mr. ";}else{echo "Mrs. ";} echo $rs['name']."</h5>
                                    </div>
                                  </div>
                              </a>";
                    }
                    ?>
                </div>

                <div class="col-sm-4 col-xs-12 padding-box"  style="border-left:1px solid #262626;">
                    <?php
//                    if($empCount==0){
//                        echo "No one add yet";
//                    }
                    foreach($result3 as $rs){
                        echo "<a href='../site/profile.php?empId=".$rs['comp_id']."'>
                                <div class=\"row\" style=\"margin-top:10px;\">
                                    <div class=\"col-xs-4\">
                                        <center>
                                            <img src=\"images/default.png\" class=\"img-responsive\" style=\"height:60px; width:60px;\" />
                                        </center>
                                    </div>
                                    <div class=\"col-xs-8\">
                                        <h5 style=\"margin-top:24px;float\">";if($rs['gender']=='male'){echo "Mr. ";}else{echo "Mrs. ";} echo $rs['name']."</h5>
                                    </div>
                                  </div>
                              </a>";
                    }
                    ?>
                </div>

            </div>


        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>