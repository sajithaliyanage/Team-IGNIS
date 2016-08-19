<?php
$var = "apply";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
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

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../public/css/calender.css" rel="stylesheet">

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
                                <i class="fa fa-briefcase"></i> Apply Leave
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                Remaining Leaves</h5>
                            <hr>
                            <ul class="list-group">

                                <?php

                                    $sql="SELECT employee_leave_count.leave_count ,leave_type.leave_name FROM employee_leave_count
                                          JOIN leave_type ON employee_leave_count.leave_id = leave_type.leave_id
                                          WHERE employee_leave_count.comp_id=:empID and leave_type.currentStatus=:log";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('empID'=> $empID,'log'=>"approved"));
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        $val = intval($rs['leave_count']);
                                        if($val<10){
                                            $val = "0".$rs['leave_count'];
                                        }
                                        echo "<li class='list-group-item'>
                                                ".$rs['leave_name']."<span class='badge' style='background-color:#2c3b42; font-size:15px;'>".$val." <span style='font-size:9px;'>remaining</span></span>
                                                </li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
<!--                    <div class="row margin-top">-->
<!--                        <div class="col-xs-12 nortification-box-top">-->
<!--                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>-->
<!--                                Profile Calendar</h5>-->
<!--                            <div style="height:300px;background-color:#4cae4c; margin-bottom:20px;">-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                Profile Calendar</h5>

                            <div id="myId" class="jalendar mid img-responsive" style="width: 95% !important;">
                                <div class="added-event" data-date="19/5/2016" data-time="20:45"
                                     data-title="Tarkan İstanbul Concert on Harbiye Açık Hava Tiyatrosu"></div>
                                <div class="added-event" data-date="17/5/2016" data-time="21:00"
                                     data-title="CodeCanyon İstanbul Meeting on Starbucks, Kadıköy"></div>
                                <div class="added-event" data-date="1/5/2016" data-time="22:00"
                                     data-title="Front-End Design and Javascript Conferance on Haliç Kongre Merkezi"></div>
                                <div class="added-event" data-date="17/5/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>
                                <div class="added-event" data-date="21/5/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>
                                <div class="added-event" data-date="21/6/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>
                                <div class="added-event" data-date="3/6/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Leave Application</h5>

                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Leave application send successfully!</div>

                            <hr>
                            <form role="form" data-toggle="validator" action="../../module/applyLeave.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Leave Type:</label>

                                            <div class="col-xs-8">
                                                <select name="leave_type" class="form-control">
                                                    <?php
                                                        $sql = "select * from leave_type where currentStatus=:log ";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log'=>"approved"));
                                                        $result = $query->fetchAll();

                                                        foreach($result as $rs){
                                                            echo "<option value='".$rs['leave_id']."'>".$rs['leave_name']."</option>";
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Priority Type:</label>

                                            <div class="col-xs-8">
                                                <select name="leave_priority" class="form-control">
                                                    <option value="high">High</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="low">Low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>


                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Starting Date:</label>

                                            <div class="col-xs-8">
                                                <input id="service_name" name="start_date" type="text"
                                                       placeholder="DD / MM / YYYY"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">End Date:</label>

                                            <div class="col-xs-8">
                                                <input id="service_name" name="end_date" type="text"
                                                       placeholder="DD / MM / YYYY" class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Number of Days:</label>

                                            <div class="col-xs-8">
                                                <input id="service_name" name="numDays" type="text"
                                                       placeholder="" class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Reason:</label>

                                            <div class="col-xs-8">
                                                <textarea class="form-control" name="reason" rows="2" required></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>

                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Apply Leave
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-list icon-margin-right" aria-hidden="true"></i>
                                Past Leave Notifications</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql = "select * from apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id=:empID";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('empID'=>$empID));
                                $result = $query->fetchAll();
                                $rowCount = $query->rowCount();

                                if($rowCount==0){
                                    echo "There is no any past leave request";
                                }

                                foreach($result as $rs){
                                    echo "<a  class='list-group-item'>".$rs['leave_name']." - ".$rs['apply_date']."<span style='float:right;'>"; if($rs['status']=='waiting'){echo 'Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>';}else if($rs['status']=='approved'){ echo 'Approved <i class=\'fa fa-check\' aria-hidden=\'true\'></i></span></a>';}else{echo 'Rejected <i class=\'fa fa-close\' aria-hidden=\'true\'></i></span></a>';};
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

<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/jalendar.js"></script>
<script src="../../public/js/calendar.js"></script>

</body>
</html>