<?php
$var = "index";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
    header('Location:../../index.php');
}


$sql="SELECT * FROM manager JOIN employee ON manager.comp_id=employee.comp_id JOIN job_category ON employee.job_cat_id=job_category.job_cat_id
      JOIN department ON department.dept_id= manager.dept_id ";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();
$managerCount = $query->rowCount();

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
                                <i class="fa fa-user"></i> Managers
                            </li>
                        </ol>
                    </div>
                </div>
            </div>


            <div class="row padding-row ">

                <div class="col-sm-12 col-xs-12 nortification-box-top padding-box" style="padding-bottom:30px;">
                    <h5 class="nortification-box-heading"><i class="fa fa-user-secret icon-margin-right"aria-hidden="true"></i>
                        Managers</h5>
                    <hr>
                    <?php
                        if($managerCount==0){
                            echo "No one add yet";
                        }
                        foreach($result as $rs){
                            echo "<a href='../site/visitProfile.php?empId=".$rs['comp_id']."'>
                                   <div class=\"row\" style='margin-top:10px; border-left:20px solid ".$rs['dept_color']."'>
                                    <div class=\"col-xs-3\">
                                        <center>
                                            <img src='../"; if($rs['image'] != 'null'){echo $rs['image'];}else{ echo '../public/images/default.png';} echo"' class=\"img-responsive\" style=\"height:60px; width:60px;\" />
                                        </center>
                                    </div>
                                    <div class=\"col-xs-3\">
                                        <h5 style=\"margin-top:24px;float\">";if($rs['gender']=='male'){echo "Mr. ";}else{echo "Mrs. ";} echo $rs['name']."</h5>
                                    </div></a>
                                    <div class=\"col-xs-3\">
                                        <h5 style=\"margin-top:24px;float\">".$rs['dept_name']."</h5>
                                    </div>
                                    <div class=\"col-xs-3\">
                                        <h5 style=\"margin-top:24px;float\">".$rs['job_cat_name']."</h5>
                                    </div>

                                  </div>";
                        }
                    ?>

                </div>
            </div>


        </div>
    </div>
    <?php
    include('../layouts/onlineStatus.php');
    ?>
</div>

<script src="../admin/js/jquery.js"></script>
<script src="../admin/js/bootstrap.js"></script>
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