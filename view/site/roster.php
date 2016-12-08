<?php
$var = "roster";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if (!$isLoggedin) {
    header('Location:../../index.php');
}

$appliedShiftId='';
if (isset($_GET['shiftid'])){
    $appliedShiftId=$_GET['shiftid'];

}

$groupIds = array();
$groupNames = array();


$sql = "SELECT group_id from employee where comp_id=:empID";
$query = $pdo->prepare($sql);
$query->execute(array('empID' => $empID));
$result = $query->fetch();
$groupID = $result['group_id'];

if ($groupID == 0) {
    header('Location:../../index.php');
}

$applyRosterID='';
if(isset($_GET['shiftid'])){
    $applyRosterID = $_GET['shiftid'];
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
    <link href="../../public/css/jquery-ui.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/datepicker.css">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include("../layouts/navbar.php") ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-briefcase"></i> Roster System
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12">
                    <div class="col-xs-12 nortification-box-top" style="<?php if(!isset($_GET['shiftid'])){echo 'display:none;';}?> margin-bottom:30px;">
                        <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right"aria-hidden="true"></i>
                            Take Your Decision</h5>

                        <div class="alert-user" style="<?php if (!isset($_GET['job'])){echo 'display:none;';} ?>">Your action done successfully!
                        </div>
                       <a href="roster.php"><i class="fa fa-close icon-margin-right pull-right" aria-hidden="true" style="margin-top:-30px;"></i></a>
                        <hr>

                        <?php
                        $sql15 = "select * from employee JOIN shifting ON employee.comp_id=shifting.emp_id where shifting.status=:log and shifting.replace_emp_id =:comp_id";
                        $query15 = $pdo->prepare($sql15);
                        $query15->execute(array('log'=>"waiting",'comp_id'=>$empID));
                        $result15= $query15->fetchAll();
                        foreach ($result15 as $rs){
                            echo "
                                           <form action='../../module/rosterconfirm.php?shiftid=".$appliedShiftId."' method='POST'>
                                           <div class=\"list-group\">
                                                <li class=\"list-group-item\">Name : <strong>".$rs['name']."</strong> </li>
                                                <li class=\"list-group-item\">Request Date : <strong>".$rs['shiftingForDate']."</strong> </li>
                                                <li class=\"list-group-item\">Request Session : <strong>".$rs['shitingForSession']."</strong></li>
                                                <li class=\"list-group-item\">Rework Date :<strong>".$rs['recovery_date']."</strong></li>
                                                <li class=\"list-group-item\">Rework Session:<strong>".$rs['recovery_time']."</strong> </li>
                                                <li class=\"list-group-item\" style='margin-bottom:10px;'>Reason :<strong>".$rs['reason']."</strong></li>                                                  
                                                    <a class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target='#approve-shift".$rs['shifting_id']."' style='float:right;'>Approve</a>  
                                                    <a class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target='#reject-shift".$rs['shifting_id']."' style='float:right; margin-right:10px;margin-bottom:10px;'  >Reject</a>  
                                                                                                      
                                                
                                            </div>";
                                           
                        ?>
                            <!-- Modal -->
                            <div id="approve-shift<?php echo $rs['shifting_id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Approve Shift</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Approve this Shift?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="sumbit" class="btn btn-success" name='submit' value='approve'>Approve</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

<!--                           reject-->
<!-- Modal -->
                            <div id="reject-shift<?php echo $rs['shifting_id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Reject Shift</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Reject this Shift ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="sumbit" class="btn btn-danger" name='submit' value='reject'>Reject</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php
                                echo "</form>";
                        }

                        ?>


                    </div>

                    <div class="col-xs-12 nortification-box-top">

                        <div>

                            <?php
                            $smt7 = "SELECT group_name FROM group_detail JOIN employee ON group_detail.group_id=employee.group_id  WHERE employee.comp_id=:log3";
                            $query8 = $pdo->prepare($smt7);
                            $query8->execute(array('log3' => $empID));
                            $result8 = $query8->fetch();
                            $group = $result8['group_name'];
                            echo '<h5 class="nortification-box-heading" style="text-align:left;">' . '<i class="fa fa-users icon-margin-right" aria-hidden="true" >' . ' ' . 'Your are in ' . $group . '</i>' . '</h5>';

                            ?>

                        </div>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"
                             style="height:300px;">

                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <h5 class="nortification-box-heading" style="text-align: center;"><i
                                            class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                        Today Shift</h5>
                                    <hr>

                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important; padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                        " >
                                                        <thead>
                                                        <tr>
                                                            <th>Shift name</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $stm = "SELECT shift_name FROM shift_type";
                                                        $query1 = $pdo->prepare($stm);
                                                        $query1->execute();
                                                        $result1 = $query1->fetchAll();


                                                        foreach ($result1 as $rs1) {

                                                            echo "<tr>";
                                                            echo "<td>" . $rs1['shift_name'] . "</td>";

                                                            echo "</tr>";
                                                        }

                                                        ?>
                                                        <tr>
                                                            <td>Holiday group</td>
                                                        </tr>

                                                        </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important;padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                            style="float: left !important;">

                                                            <thead>
                                                            <tr>
                                                                <th>Group name</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php


                                                            $smt = "SELECT dept_id FROM employee WHERE comp_id=:log";
                                                            $query = $pdo->prepare($smt);
                                                            $query->execute(array('log' => $empID));
                                                            $result13 = $query->fetch();

                                                            $dep = $result13["dept_id"];

                                                            $smt = "SELECT * FROM group_detail WHERE dept_id=:log1";
                                                            $query = $pdo->prepare($smt);
                                                            $query->execute(array('log1' => $dep));
                                                            $result12 = $query->fetchAll();

                                                            foreach ($result12 as $rs) {
                                                                array_push($groupIds, intval($rs["group_id"]));
                                                                $groupNames[intval($rs['group_id'] - 1)] = $rs['group_name'];
                                                                echo '<tr>';
                                                                echo '<td>' . $rs["group_name"] . '</td>';
                                                                echo '</tr>';
                                                            }


                                                            $minGroupId = min($groupIds);
                                                            $maxGroupId = max($groupIds);
                                                            $groupCount = count($groupIds);
                                                            ?>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important;padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                            style="float: left !important;">

                                                            <thead>
                                                            <tr>
                                                                <th>Time slot</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $stm1 = "SELECT start_time,end_time FROM shift_type";
                                                            $query2 = $pdo->prepare($stm1);
                                                            $query2->execute();
                                                            $result2 = $query2->fetchAll();


                                                            foreach ($result2 as $rs2) {

                                                                echo "<tr>";
                                                                echo "<td>" . $rs2['start_time'] . " to " . $rs2['end_time'] . "</td>";

                                                                echo "</tr>";
                                                            }

                                                            ?>

                                                            <tr>
                                                                <td align="center">Full Day</td>

                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="item">
                                    <h5 class="nortification-box-heading" style="text-align: center;"><i
                                            class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                        Tomorrow Shift</h5>
                                    <hr>

                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important; padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                        " >
                                                        <thead>
                                                        <tr>
                                                            <th>Shift name</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $stm2 = "SELECT shift_name FROM shift_type";
                                                        $query3 = $pdo->prepare($stm2);
                                                        $query3->execute();
                                                        $result3 = $query3->fetchAll();


                                                        foreach ($result3 as $rs3) {

                                                            echo "<tr>";
                                                            echo "<td>" . $rs3['shift_name'] . "</td>";

                                                            echo "</tr>";
                                                        }

                                                        ?>
                                                        <tr>
                                                            <td>Holiday group</td>
                                                        </tr>

                                                        </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important;padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                            style="float: left !important;">

                                                            <thead>
                                                            <tr>
                                                                <th>Group name</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            foreach ($result12 as $rs) {
                                                                echo '<tr>';
                                                                echo '<td>';
                                                                if (intval($rs["group_id"]) != $minGroupId) {
                                                                    echo $groupNames[intval($rs["group_id"]) - 2];
                                                                } else {
                                                                    echo $groupNames[intval($rs["group_id"]) + $groupCount - 2];
                                                                }
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important;padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                            style="float: left !important;">

                                                            <thead>
                                                            <tr>
                                                                <th>Time slot</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $stm2 = "SELECT start_time,end_time FROM shift_type";
                                                            $query4 = $pdo->prepare($stm2);
                                                            $query4->execute();
                                                            $result4 = $query4->fetchAll();


                                                            foreach ($result4 as $rs4) {

                                                                echo "<tr>";
                                                                echo "<td>" . $rs4['start_time'] . " to " . $rs4['end_time'] . "</td>";

                                                                echo "</tr>";
                                                            }

                                                            ?>

                                                            <tr>
                                                                <td align="center">Full Day</td>

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <h5 class="nortification-box-heading" style="text-align: center;"><i
                                            class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                        Yesterday Shift</h5>
                                    <hr>

                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important; padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                        " >
                                                        <thead>
                                                        <tr>
                                                            <th>Shift name</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $stm3 = "SELECT shift_name FROM shift_type";
                                                        $query5 = $pdo->prepare($stm3);
                                                        $query5->execute();
                                                        $result5 = $query5->fetchAll();


                                                        foreach ($result5 as $rs5) {

                                                            echo "<tr>";
                                                            echo "<td>" . $rs5['shift_name'] . "</td>";

                                                            echo "</tr>";
                                                        }

                                                        ?>
                                                        <tr>
                                                            <td>Holiday group</td>
                                                        </tr>

                                                        </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important;padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                            style="float: left !important;">

                                                            <thead>
                                                            <tr>
                                                                <th>Group name</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            foreach ($result12 as $rs) {
                                                                echo '<tr>';
                                                                echo '<td>';
                                                                if (intval($rs["group_id"]) != $maxGroupId) {
                                                                    echo $groupNames[intval($rs["group_id"])];
                                                                } else {
                                                                    echo $groupNames[intval($rs["group_id"]) - ($groupCount - 1) - 1];
                                                                }
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <div class="col-xs-4"
                                                         style="padding-left:0 !important;padding-right:0 !important;">
                                                        <table
                                                            class='table table-responsive table-bordered table-striped '
                                                            style="float: left !important;">

                                                            <thead>
                                                            <tr>
                                                                <th>Time slot</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $stm4 = "SELECT start_time,end_time FROM shift_type";
                                                            $query6 = $pdo->prepare($stm4);
                                                            $query6->execute();
                                                            $result6 = $query6->fetchAll();


                                                            foreach ($result6 as $rs6) {

                                                                echo "<tr>";
                                                                echo "<td>" . $rs6['start_time'] . " to " . $rs6['end_time'] . "</td>";

                                                                echo "</tr>";
                                                            }

                                                            ?>

                                                            <tr>
                                                                <td align="center">Full Day</td>

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic"
                               style="margin-left:-30px;background-image:none;" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left fa-1x" style="margin-top:150px; color:#3498db;"
                                   aria-hidden="true"></i>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic"
                               style="margin-right:-30px;background-image:none;" role="button" data-slide="next">
                                <i class="fa fa-chevron-right fa-1x" style="margin-top:150px; color:#3498db;"
                                   aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="margin-top col-xs-12 nortification-box-top">
                        <h5 class="nortification-box-heading"><i class="fa fa-clock-o icon-margin-right"
                                                                 aria-hidden="true"></i>
                            My Workout In This Week</h5>
                        <hr>

                        <div class="progress">
                        <?php
                                require_once "../../module/PHPExcel/PHPExcel.php";

                                try{
                                    $empID = $_SESSION["empID"];
                                    $tempFile = "new.xlsx";
                                    $objPHPExcel = PHPExcel_IOFactory::load($tempFile);
                                    $workinghours = 60;
                                    $timesum=0;

                                    $monday = date( 'Y-m-d', strtotime( 'monday this week' ) ).'</br>';
                                    $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) ).'</br>';
                                    $today = date("Y-m-d").'</br>';

                                    $objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());

                                    $autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
                                    $columnFilter = $autoFilter->getColumn('A');

                                    $columnFilter->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER);
                                    $columnFilter->createRule()->setRule(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL,$empID);

                                    $autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
                                    $autoFilter->showHideRows();
                                    

                                    foreach($objPHPExcel->getActiveSheet()->getRowIterator() as $row){

                                        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex()!=1) {

                                            $Date = $objPHPExcel->getActiveSheet()->getCell(
                                                    'B'.$row->getRowIndex())->getValue() ;

                                            if ($monday <= $Date and $Date <= $sunday) {
                                                $timesum += $objPHPExcel->getActiveSheet()->getCell('E'.$row->getRowIndex())->getValue() ;

                                                
                                            }

                                                         
                                                        

                                        }




                                     } 
                                                
                                }
                                catch(Exception $e){}
                            ?>
                            <div class="progress-bar" role="progressbar" aria-valuenow=":<?php echo ($timesum/$workinghours)*100;?>%;" aria-valuemin="0"
                                 aria-valuemax="100" style="width:<?php echo ($timesum/$workinghours)*100;?>%;">:<?php echo ($timesum/$workinghours)*100;?>%;
                            </div>
                        </div>
                        <p style="text-align:left; margin-top:-20px;">0h</p>
                        <p style="text-align:right; margin-top:-30px;">60h</p>

                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                                <div class="row">
                                    <div class="col-xs-6" style="text-align: right;">
                                        <p>Total Hours per week:</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p><strong><?php echo $workinghours;?> hours</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6" style="text-align: right;">
                                        <p>Done Hours per week:</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p style=" color:#00a65a;"><strong><?php echo $timesum;?> hours</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6" style="text-align: right;">
                                        <p>Remaining Hours per week:</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p style=" color:#d43f3a;"><strong><?php echo ($workinghours-$timesum); ?> hours</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-6" style="text-align: right;">
                                            <p>Days left in this week:</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p style=" color:#00a65a;"><strong>
                                            <?php 
                                            $date1=date_create(date('Y/m/d',strtotime( 'sunday this week' )));
                                            $date2=date_create(date('Y/m/d'));
                                            $diff=date_diff($date2,$date1);
                                            echo $diff->format("%a");
                                            ?>Days</strong></p> 
                                        </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <?php
                        $sql8 = "select * from employee JOIN shifting ON employee.comp_id=shifting.emp_id where shifting.status=:log and shifting.replace_emp_id =:comp_id";
                        $query8 = $pdo->prepare($sql8);
                        $query8->execute(array('log'=>"waiting",'comp_id'=>$empID));
                        $result8= $query8->fetchAll();
                        $rowCount8 = $query8->rowCount();
                        ?>
                        <div class="col-xs-12 nortification-box-top " style="<?php if($rowCount8 == 0){echo 'display:none;';}?>">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests For Shifts</h5>
                            <hr>
                            <div class="list-group">
                               <?php


                                foreach ($result8 as $rs) {
                                    echo "<a href='?shiftid=".$rs['shifting_id']."' class=\"list-group-item\" style='";echo"'>".$rs['name']."<span style=\"float:right;\">Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span></a>";
                                }





                                ?>
                            </div>

                        </div>

                        <div class="col-xs-12 nortification-box-top <?php if($rowCount8 !=0){ echo 'margin-top';}?>">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right"
                                                                     aria-hidden="true"></i>
                                Shift Changing Application</h5>
                            <div class="alert-user" style="<?php if (!isset($_GET['error'])) {
                                echo 'display:none;';
                            } ?> color:#d43f3a">Invalid Form Actions!
                            </div>
                            <div class="alert-user" style="<?php if (!isset($_GET['requested'])) {
                                echo 'display:none;';
                            } ?> color:green;">Request sent successfully!
                            </div>
                            <hr>
                            <form role="form" data-toggle="validator" action="../../module/rosterapply.php"
                                  method="post">
                                <div class="">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Date :</label>
                                            <div class="col-xs-8">
                                                <input id="startdate" name="shift_date" type="text"
                                                       placeholder="yyyy/mm/dd"
                                                       class="form-control input-md" onchange="showUser(this.value)">

                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Time :</label>
                                            <div class="col-xs-8">
                                                <input id="demo" name="shift_my_time" type="text"
                                                       class="form-control input-md" readonly="readonly">
                                                <h6 id="demo4"></h6>


                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Group:</label>
                                            <div class="col-xs-8">

                                                <select name="shift_group" class="form-control"
                                                        onchange="showUser1(this.value)">

                                                    <?php

                                                    echo "<option value='0'>--Select--</option>";
                                                    foreach ($result12 as $rs) {
                                                        if ($groupID != $rs['group_id']) {
                                                            echo "<option value='" . $rs['group_id'] . "'>" . $rs['group_name'] . '</option>';
                                                        }

                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifter ID
                                                :</label>
                                            <div class="col-xs-8">
                                                <div id="demo1">
                                                    <input type="text" placeholder="- Select a Group Id -  "
                                                           class="form-control input-md" readonly="readonly">
                                                </div>


                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Rework Date :</label>
                                            <div class="col-xs-8">
                                                <input id="enddate" name="rework_date" type="text"
                                                       placeholder="yyyy/mm/dd"
                                                       class="form-control input-md" onchange="showUser2(this.value)">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>

                                        <div class="form-group" style="margin-top:-20px;">
                                            <label class="col-xs-4 control-label form-lable">Rework Time :</label>
                                            <div class="col-xs-8">
                                                <input id="demo2" name="shift_his_time" type="text"
                                                       class="form-control input-md" readonly="readonly">
                                                <h6 id="demo3"></h6>

                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Reason :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="reason" type="text" placeholder=""
                                                       class="form-control input-md">
                                            </div>
                                        </div>


                                        <br>
                                        <br>
                                        <br>
                                        <br>


                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Apply
                                            Shift
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="margin-top col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-list icon-margin-right"
                                                                     aria-hidden="true"></i>
                                Past Shift Notifications</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql9 = "select * from shifting WHERE emp_id=:empID";
                                $query9 = $pdo->prepare($sql9);
                                $query9->execute(array('empID' => $empID));
                                $result9 = $query9->fetchAll();
                                $rowCount9 = $query9->rowCount();

                                if ($rowCount9 == 0) {
                                    echo "There are no any past shift requests";
                                }

                                foreach ($result9 as $rs) {
                                    echo "<a  class='list-group-item'>" . ($rs['shitingForSession']) . " - " . $rs['shiftingForDate'] . "<span style='float:right;'>";
                                    if ($rs['status'] == 'waiting') {
                                        echo 'Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>';
                                    } else if ($rs['status'] == 'approved') {
                                        echo 'Approved <i class=\'fa fa-check\' aria-hidden=\'true\'></i></span></a>';
                                    } else {
                                        echo 'Rejected <i class=\'fa fa-close\' aria-hidden=\'true\'></i></span></a>';
                                    };
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
</div>

<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/bootstrap-datepicker.js"></script>
<script src="../../public/js/jquery-ui.js"></script>
<script>
    $('.carousel').carousel({
        interval: 0
    })
</script>

<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {


        $('#startdate').datepicker({
            dateFormat: "yy/mm/dd",
            minDate: +1
        });
        $('#enddate').datepicker({
            minDate: +1,
            dateFormat: "yy/mm/dd"
        });


    });


</script>
<script>
    var groupId = null;
    function showUser(str) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText == 'Holiday') {
                    var val = xhttp.responseText;
                    document.getElementById("demo").value = val;
                    document.getElementById("demo4").innerHTML = "<span style='color:red; margin-left:5px;'>(Please select another date)</span>";
                } else {
                    document.getElementById("demo").value = xhttp.responseText;
                    document.getElementById("demo4").innerHTML = "";

                }

            }
        }
        xhttp.open("GET", "../../module/ajxroster.php?q=" + str, true);
        xhttp.send();
    }
    function showUser1(str) {
        groupId = str;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("demo1").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "../../module/ajxroster.php?r=" + str, true);
        xhttp.send();
    }
    function showUser2(str) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText == 'Holiday') {
                    var val = xhttp.responseText;
                    document.getElementById("demo2").value = val;
                    document.getElementById("demo3").innerHTML = "<span style='color:red; margin-left:5px;'>(Please select another date)</span>";
                } else {
                    document.getElementById("demo2").value = xhttp.responseText;
                    document.getElementById("demo3").innerHTML = "";

                }

            }
        }
        xhttp.open("GET", "../../module/ajxroster.php?p=" + str + "&gid=" + groupId, true);
        xhttp.send();
    }
</script>


</body>
</html>