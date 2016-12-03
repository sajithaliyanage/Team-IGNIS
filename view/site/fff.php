<?php
$var = "roster";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if (!$isLoggedin) {
    header('Location:../../index.php');
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
if (isset($_GET['id'])) {
    $emp_group_id = $_GET['id'];

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
                                                            $result = $query->fetch();

                                                            $dep = $result["dept_id"];

                                                            $smt = "SELECT * FROM group_detail WHERE dept_id=:log1";
                                                            $query = $pdo->prepare($smt);
                                                            $query->execute(array('log1' => $dep));
                                                            $result = $query->fetchAll();

                                                            foreach ($result as $rs) {
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

                                                            foreach ($result as $rs) {
                                                                echo '<tr>';
                                                                echo '<td>';
                                                                if (intval($rs["group_id"]) != $minGroupId) {
                                                                    echo $groupNames[intval($rs["group_id"]) - 2];
                                                                } else {
                                                                    echo $groupNames[intval($rs["group_id"]) + $groupCount - 2];
                                                                }
                                                                '</td>';
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


<<<<<<< HEAD
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

                                                            foreach ($result as $rs) {
                                                                echo '<tr>';
                                                                echo '<td>';
                                                                if (intval($rs["group_id"]) != $maxGroupId) {
                                                                    echo $groupNames[intval($rs["group_id"])];
                                                                } else {
                                                                    echo $groupNames[intval($rs["group_id"]) - ($groupCount - 1) - 1];
                                                                }
                                                                '</td>';
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

=======
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
>>>>>>> origin/master

                                                            foreach ($result6 as $rs6) {

<<<<<<< HEAD
                                                                echo "<tr>";
                                                                echo "<td>" . $rs6['start_time'] . " to " . $rs6['end_time'] . "</td>";
=======
                                        }
>>>>>>> origin/master

                                                                echo "</tr>";
                                                            }

                                                            ?>

                                                            <tr>
                                                                <td align="center">Full Day</td>

<<<<<<< HEAD
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
=======
                                     } 
                                                
                                }
                                catch(Exception $e){}
                            ?>
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($timesum/$workinghours)*100;?>%;">
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
                                            <p style=" color:#d43f3a;"><strong><?php echo ($workinghours-$timesum); ?> hours</strong></p>
>>>>>>> origin/master
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
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 60%;">
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
                                        <p><strong>60 hours</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6" style="text-align: right;">
                                        <p>Done Hours per week:</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p style=" color:#00a65a;"><strong>
                                                <?php
                                                require_once "../../module/PHPExcel/PHPExcel.php";

                                                try {
                                                    $empID = $_SESSION["empID"];
                                                    $tempFile = "new.xlsx";
                                                    $objPHPExcel = PHPExcel_IOFactory::load($tempFile);

                                                    echo $monday = date('Y-m-d', strtotime('monday this week')) . '</br>';
                                                    echo $sunday = date('Y-m-d', strtotime('sunday this week')) . '</br>';
                                                    echo $today = date("Y-m-d") . '</br>';

                                                    $objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());

                                                    $autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
                                                    $columnFilter = $autoFilter->getColumn('A');

                                                    $columnFilter->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER);
                                                    $columnFilter->createRule()->setRule(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL, $empID);

                                                    $autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
                                                    $autoFilter->showHideRows();
                                                    $timesum = 0;

                                                    foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {

                                                        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() != 1) {

                                                            $Date = $objPHPExcel->getActiveSheet()->getCell(
                                                                'B' . $row->getRowIndex()
                                                            )->getValue();

                                                            if ($monday <= $Date and $Date >= $sunday) {
                                                                $timesum += $objPHPExcel->getActiveSheet()->getCell('E' . $row->getRowIndex())->getValue();
                                                                echo $timesum;
                                                            }


                                                        }


                                                    }
                                                    echo $timesum;
                                                } catch (Exception $e) {
                                                }
                                                ?> hours</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6" style="text-align: right;">
                                        <p>Remaining Hours per week:</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p style=" color:#d43f3a;"><strong><?php echo(56 - $timesum) ?>hours</strong>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right"
                                                                     aria-hidden="true"></i>
                                Pending Requests For Changing Shifts</h5>
                            <hr>
                        </div>


                        <div class="margin-top col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right"
                                                                     aria-hidden="true"></i>
                                Shift Changing Application</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="../../module/rosterapply.php"
                                  method="post">
                                <div class="">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Date :</label>
                                            <div class="col-xs-8">
                                                <input id="startdate" name="shift_tdate" type="text"
                                                       placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" onfocusout="myFunction()">

                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Time :</label>
                                            <div class="col-xs-8">


                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Group:</label>
                                            <div class="col-xs-8">

                                                <select name="shift_group" class="form-control"
                                                        onchange='takevalue(this.value)'>

                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                        $sql = "SELECT * from group_detail where group_id =:log1";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log1' => $emp_group_id));
                                                        $result0 = $query->fetch();

                                                        echo "<option>" . $result0['group_name'] . "</option>";


                                                    } else {
                                                        echo "<option value=\"empty\">--Select--</option>";
                                                        foreach ($result as $rs) {
                                                            if ($groupID != $rs['group_id']) {
                                                                echo "<option value='" . $rs['group_id'] . "'>" . $rs['group_name'] . '</option>';
                                                            }

                                                        }


                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Member ID
                                                :</label>
                                            <div class="col-xs-8">
                                                <select name="job_level" class="form-control">
                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                        $sql = "select * from employee WHERE group_id=:log1";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log1' => $emp_group_id));
                                                        $result = $query->fetchAll();
                                                        $rcount = $query->rowCount();

                                                        if ($rcount == 0) {
                                                            echo "<option >- No any Employees in this Group -</option>";


                                                        } else {

                                                            foreach ($result as $rs) {
                                                                echo " <option>" . $rs['comp_id'] . ' - ' . $rs['name'] . "</option>";
                                                            }
                                                        }

                                                    } else {
                                                        echo "<option >- Select Job Category First -</option>";
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Rework Date :</label>
                                            <div class="col-xs-8">
                                                <input id="enddate" name="rework_date " type="text"
                                                       placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Rework Time :</label>
                                            <div class="col-xs-8">


                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Reason :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
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
            dateFormat: "dd/mm/yy",
            minDate: +1
        });
        $('#enddate').datepicker({
            minDate: +1,
            dateFormat: "dd/mm/yy"
        });


    });
    function takevalue(str) {
        if (str != 'empty') {
            var javascriptVariable = str;
            window.location.href = "roster.php?id=" + javascriptVariable;
        }
    }
    function myFunction() {
        var x = document.getElementById("startdate").value;
        <?php
        $today = date('Y-m-d');





        ?>

    }
</script>


</body>
</html>