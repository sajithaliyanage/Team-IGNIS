<?php
$var = "status";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();


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
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-chevron-circle-right"></i> Leave Status
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top table-responsive">
                            <center>
                                <h4>My Recent Leave Requests</h4>
                            </center>
                            <hr>

                            <table class="table ">
                                <thead style="color: #065ABC">
                                    <tr>

                                        <th style='text-align: center;'>Start Date - End Date</th>
                                        <th style='text-align: center;'>Leave Type</th>
                                        <th style='text-align: center;'>Number of Days</th>
                                        <th style='text-align: center;'>Applied Date</th>
                                        <th style='text-align: center;'>Leave Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql = "select * from apply_leave JOIN leave_type ON apply_leave.leave_id = leave_type.leave_id where apply_leave.comp_id =:myId";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('myId'=>$empID));
                                        $rowCount = $query->rowCount();
                                        $result = $query->fetchAll();

                                        if($rowCount==0){
                                            echo "<center>There is no any leave request</center>";
                                        }

                                        foreach($result as $rs){
                                            echo "<tr>
                                                    <td style='text-align: center;'>".$rs['start_date']." - ".$rs['end_date']."</td>
                                                    <td style='text-align: center;'>".$rs['leave_name']."</td>
                                                    <td style='text-align: center;'>".$rs['number_of_days']." day</td>
                                                    <td style='text-align: center;'>".$rs['apply_date']."</td>
                                                    <td style='text-align: center;'><span>"; if($rs['status']=='waiting'){echo 'Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span></a>';}else if($rs['status']=='approved'){ echo '<span style="color:#00a65a;">Approved<i class=\'fa fa-check\' aria-hidden=\'true\'></i></span> </span></a>';}else{echo '<span style="color:#d43f3a;">Rejected <i class=\'fa fa-close\' aria-hidden=\'true\'></i></span></span>';} echo "</td>
                                                </tr>";
                                        }
                                    ?>

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>

</body>
</html>