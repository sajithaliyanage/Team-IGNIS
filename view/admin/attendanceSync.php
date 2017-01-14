<?php
$var = "attendance";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
    header('Location:../../index.php');
}

$dateLastPressed = date('Y-m-d',strtotime("-1 days"));
$today = date('Y-m-d');
$count =0;

if(isset($_GET['number'])){
    $count +=intval($_GET['number']);
}

try{

    $todayToSync = date('d/m/Y');
    $sql = "INSERT IGNORE INTO attendance_syncing_status(date,status)  VALUES (:log,:log2)";
    $query = $pdo->prepare($sql);
    $query->execute(array('log'=>$todayToSync,'log2'=>'0'));

}catch(Exception $e){
    echo $e;
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
    <link rel="stylesheet" href="../../public/css/datepicker.css">
    <link rel="stylesheet" href="../../public/css/attendance.css">


  </head>

<body style=" background-color: #eceff4 !important;">

    <?php include("navbar.php") ?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 col-sm-push-2 padding-box ">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-briefcase"></i> Today Attendance <?php echo $count;?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-12 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-eye icon-margin-right" aria-hidden="true"></i>
                                Today Attendance</h5>

                            <?php

                            $sql2 = "SELECT status FROM attendance_syncing_status WHERE date = '$todayToSync'";
                            $query = $pdo->prepare($sql2);
                            $query->execute();

                            $result = $query->fetch();

                            if($result[0][0] == 0){

                                echo "<form action='../../module/excelRead.php' method='GET'>
                                            <input type='hidden' name='number' value='1' />
                                            <button type=\"submit\" class=\"btn btn-primary\" style=\"float:right; margin-top:-35px;\"><i class=\"fa fa-refresh fa-spin fa-x\" style=\"margin-right:5px;\"></i>Sync</button>
                                           </form>";

                                $sql3 = "UPDATE attendance_syncing_status set status = 1 WHERE date = '$todayToSync'";
                                $query2 = $pdo->prepare($sql3);
                                $query2->execute();



                            }else{


                                echo '<button type="button" class="btn btn-primary" style="float:right; margin-top:-35px;" disabled="disabled"><i class="fa fa-refresh fa-x" style="margin-right:5px;"></i>Sync</button>';


                            }


//                                if ($dateLastPressed > $today || $count!=0){
//                                }
//                                else{
//
//
//                                }
                            ?>
<!--                            <hr>-->
                            <div class="row" style="margin-top:20px;">
                                <div class="col-xs-12">
                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Employee Id</th>

                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>Work Time</th>
                                            <th>Over Time</th>
                                        </tr>
                                        <?php include "../../module/getTodayAttendance.php"?>
                                        <?//php include "../../module/getAbsentListWithoutApproval.php"?>


                                    </table>

                                </div>
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
        <script src="../../public/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
                });

            });

        </script>

</body>
</html>