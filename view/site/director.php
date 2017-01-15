<?php
$var = "permission";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="director"){
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
    <link href="../admin/css/calender.css" rel="stylesheet">

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
                                <i class="fa fa-edit"></i> Overall Company
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-1-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <?php
                                        $sql="SELECT * FROM department WHERE currentStatus=:log and roster_status=:state";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('log'=>"approved",'state'=>"NO"));
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>


                                    <h3 class="box-head">Departments</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-building fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-1-2">
                            <div class="more-info">
                               <a href="index_departments.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-2-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <?php
                                        $sql="SELECT * FROM manager";
                                        $query = $pdo->prepare($sql);
                                        $query->execute();
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

                                    <h3 class="box-head">Managers</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-user-secret fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-2-2">
                            <div class="more-info">
                                <a href="managers.php" style="color:#FFFFFF;">More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-3-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <?php
                                        $sql="SELECT * FROM admin";
                                        $query = $pdo->prepare($sql);
                                        $query->execute();
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

                                    <h3 class="box-head">Administrators</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-universal-access fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-3-2">
                            <div class="more-info">
                                <a href="administrators.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-4-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <?php
                                        $sql="SELECT * FROM department WHERE currentStatus=:log and roster_status=:state";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('log'=>"approved",'state'=>"YES"));
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

                                    <h3 class="box-head">Rosters</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-shirtsinbulk fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-4-2">
                            <div class="more-info">
                                <a href="index_departments_roster.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-box">
                <div class="col-sm-4 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top ">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests For Departments</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql = "select * from department WHERE currentStatus=:log";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('log'=>"waiting"));
                                $result = $query->fetchAll();
                                $rowCount = $query->rowCount();

                                if($rowCount==0){
                                    echo "No any requests yet!";
                                }

                                foreach($result as $rs){
                                    echo " <div  class=\"list-group-item\" style=\"padding-bottom:25px;\">".$rs['dept_name']."<span style=\"float:right;\"> Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span>
                                            <div style=\"float: right;\">
                                                <a class=\"label label-success\" data-toggle=\"modal\" data-target='#accept-dep".$rs['dept_id']."'>Accept</a>
                                                <a class=\"label label-danger\" data-toggle=\"modal\" data-target='#reject-dep".$rs['dept_id']."'>Reject</a>
                                            </div>
                                           </div>

                                           <div class=\"modal fade\" id='accept-dep".$rs['dept_id']."' >
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">Give Permission to Administrator</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>Are you sure you want to add ".$rs['dept_name']." to your company?</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href='../../module/approveDirector.php?depAccept=".$rs['dept_id']."'><div class=\"btn btn-success\">Approve</div></a>
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class=\"modal fade\" id='reject-dep".$rs['dept_id']."'>
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">Give Permission to Administrator</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>Are you sure you want to reject ".$rs['dept_name']." from your company?</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href='../../module/approveDirector.php?depReject=".$rs['dept_id']."'><button type=\"button\" class=\"btn btn-danger\">Reject</button></a>
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
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

                <div class="col-sm-4 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests For Job Categories</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql = "select * from job_category WHERE currentStatus=:log";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('log'=>"waiting"));
                                $result = $query->fetchAll();
                                $rowCount = $query->rowCount();

                                if($rowCount==0){
                                    echo "No any requests yet!";
                                }

                                foreach($result as $rs){
                                    echo " <div  class=\"list-group-item\" style=\"padding-bottom:25px;\">".$rs['job_cat_name']."<span style=\"float:right;\"> Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span>
                                            <div style=\"float: right;\">
                                                <a class=\"label label-success\" data-toggle=\"modal\" data-target='#accept-job".$rs['job_cat_id']."'>Accept</a>
                                                <a class=\"label label-danger\" data-toggle=\"modal\" data-target='#reject-job".$rs['job_cat_id']."'>Reject</a>
                                            </div>
                                           </div>

                                           <div class=\"modal fade\" id='accept-job".$rs['job_cat_id']."' >
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">Give Permission to Administrator</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>Are you sure you want to add ".$rs['job_cat_name']." to your company?</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href='../../module/approveDirector.php?jobAccept=".$rs['job_cat_id']."'><div class=\"btn btn-success\">Approve</div></a>
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class=\"modal fade\" id='reject-job".$rs['job_cat_id']."'>
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">Give Permission to Administrator</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>Are you sure you want to reject ".$rs['job_cat_name']." from your company?</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href='../../module/approveDirector.php?jobReject=".$rs['job_cat_id']."'><button type=\"button\" class=\"btn btn-danger\">Reject</button></a>
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
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

                <div class="col-sm-4 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests For Leave Types</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql = "select * from leave_type WHERE currentStatus=:log";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('log'=>"waiting"));
                                $result = $query->fetchAll();
                                $rowCount = $query->rowCount();

                                if($rowCount==0){
                                    echo "No any requests yet!";
                                }

                                foreach($result as $rs){
                                    echo " <div  class=\"list-group-item\" style=\"padding-bottom:25px;\">".$rs['leave_name']."<span style=\"float:right;\"> Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span>
                                            <div style=\"float: right;\">
                                                <a class=\"label label-success\" data-toggle=\"modal\" data-target='#accept-leave".$rs['leave_id']."'>Accept</a>
                                                <a class=\"label label-danger\" data-toggle=\"modal\" data-target='#reject-leave".$rs['leave_id']."'>Reject</a>
                                            </div>
                                           </div>

                            <div class=\"modal fade\" id='accept-leave".$rs['leave_id']."' >
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">Give Permission to Administrator</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>Are you sure you want to add ".$rs['leave_name']." to your company?</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href='../../module/approveDirector.php?leaveAccept=".$rs['leave_id']."'><div class=\"btn btn-success\">Approve</div></a>
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class=\"modal fade\" id='reject-leave".$rs['leave_id']."'>
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">Give Permission to Administrator</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>Are you sure you want to reject ".$rs['leave_name']." from your company?</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <a href='../../module/approveDirector.php?leaveReject=".$rs['leave_id']."'><button type=\"button\" class=\"btn btn-danger\">Reject</button></a>
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
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
        </div>
            <?php
            include('../layouts/onlineStatus.php');
            ?>
    </div>


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