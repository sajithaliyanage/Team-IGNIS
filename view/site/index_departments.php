<?php
$var = "index";
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

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../admin/css/adminpanel-interface.css" rel="stylesheet">
    <link href="../admin/css/navbar-style.css" rel="stylesheet">
    <link href="../admin/css/font-awesome.min.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include("../layouts/navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="director.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <a href="director.php">Overall Company</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-building"></i> Departments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">

                <?php
                    $sql = "SELECT * FROM department WHERE currentStatus=:log and roster_status=:state";
                    $query = $pdo->prepare($sql);
                    $query->execute(array('log'=>"approved",'state'=>"NO"));
                    $result = $query->fetchAll();

                    foreach($result as $rs){
                        echo "<div class=\"col-sm-3 col-xs-12 padding-box-inner\">
                                <div class=\"row\">
                                    <div class=\"col-xs-12 main-box-1-1-inner\">
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                <h2 class=\"box-count\">".explode(" ",$rs['dept_name'])[0]."</h2>

                                                <h3 class=\"box-head\">Department</h3>
                                            </div>
                                            <div class=\"col-xs-4\">
                                                <i class=\"fa fa-building fa-5x box-icon\" style=\"color:".$rs['dept_color'].";\" aria-hidden=\"true\"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-xs-12  main-box-1-2-inner\" style=\"background-color:".$rs['dept_color'].";\">
                                        <div class=\"more-info\">
                                            <a href='index_department_employee.php?id=".$rs['dept_id']."' style=\"color:#2c3b42;\">View Employees <i class=\"fa fa-chevron-circle-right\" style=\"color:#2c3b42;\" aria-hidden=\"true\"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                ?>


            </div>


        </div>
    </div>
</div>

<script src="../admin/js/jquery.js"></script>
<script src="../admin/js/bootstrap.js"></script>
</body>
</html>