<?php
$var="approve";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin || $empRole=='director' || $empRole=='employee'){
    header('Location:../../index.php');
}

$employerID='';
if(isset($_GET['appId'])){
    $employerID = $_GET['appId'];
}

$sql = "select dept_id from employee where comp_id=:log ";
$query = $pdo->prepare($sql);
$query->execute(array('log'=>$empID));
$result = $query->fetch();
$departmentId = $result['dept_id'];
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
                                <i class="fa fa-building" ></i> Leave Status
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-7 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                Take Your Decision</h5>
                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Your action done successfully!</div>
                            <hr>

                            <?php
                                $eName='';
                                if($employerID!=null){
                                    $sql = "SELECT * FROM apply_leave JOIN employee ON employee.comp_id = apply_leave.comp_id WHERE
                                            apply_leave.comp_id=:empID and employee.dept_id=:depId ";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('empID'=>$employerID,'depId'=>$departmentId));
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        echo "<div class=\"list-group\">
                                                <li class=\"list-group-item\" style=\"background-color:#d6e9c6\"><h5 >Leave applied by : <strong> ".$rs['name']."</strong></h5></li>
                                            </div>
                                                <form action='../../module/confirmLeave.php?empId=".$rs['comp_id']."' method='POST'>

                                                <div class=\"list-group\">
                                                    <li class=\"list-group-item\">Leave Priority :  <strong>".$rs['leave_priority']."</strong></li>
                                                    <li class=\"list-group-item\">Duration :  <strong> ".$rs['start_date']." to ".$rs['end_date']."</strong></li>
                                                    <li class=\"list-group-item\">Number of Days:  <strong>".$rs['number_of_days']."</strong></li>
                                                    <li class=\"list-group-item\">Reason :  <strong>".$rs['reason']."</strong></li>
                                                    <li class=\"list-group-item\">special note :<input type=\"text\" name='note' placeholder=' If reject..'>
                                                        <a class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target='#accept-leave".$rs['apply_leave_id']."'>"; if($empRole=='manager'){echo "Approve";}else{ echo "Recommend";} echo"</a>
                                                        <a class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target='#reject-leave".$rs['apply_leave_id']."' >Reject</a>
                                                        <a class=\"btn btn-link btn-xs\" data-toggle=\"modal\" data-target='#cancel-leave".$rs['apply_leave_id']."'>Cancel Leave</a></li>
                                                </div>


                                                    <div class=\"modal fade\" id='accept-leave".$rs['apply_leave_id']."' >
                                                        <div class=\"modal-dialog\">

                                                            <!-- Modal content-->
                                                            <div class=\"modal-content\">
                                                                <div class=\"modal-header\">
                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                    <h4 class=\"modal-title\">"; if($empRole=='manager'){echo "Approve";}else{ echo "Recommend";} echo" Leave</h4>
                                                                </div>
                                                                <div class=\"modal-body\">
                                                                    <p>Are you sure you want to "; if($empRole=='manager'){echo "approve";}else{ echo "recommend";} echo" this leave ?</p>
                                                                </div>
                                                                <div class=\"modal-footer\">
                                                                    <button class=\"btn btn-success\" type='submit' name=\"submit\" value='done'>"; if($empRole=='manager'){echo "Approve";}else{ echo "Recommend";} echo"</button>
                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class=\"modal fade\" id='reject-leave".$rs['apply_leave_id']."' >
                                                        <div class=\"modal-dialog\">

                                                            <!-- Modal content-->
                                                            <div class=\"modal-content\">
                                                                <div class=\"modal-header\">
                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                    <h4 class=\"modal-title\">Reject Leave</h4>
                                                                </div>
                                                                <div class=\"modal-body\">
                                                                    <p>Are you sure you want to reject this leave ?</p>
                                                                </div>
                                                                <div class=\"modal-footer\">
                                                                    <button class=\"btn btn-danger\" type='submit' name=\"submit\" value='reject'>Reject</button>
                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class=\"modal fade\" id='cancel-leave".$rs['apply_leave_id']."' >
                                                        <div class=\"modal-dialog\">

                                                            <!-- Modal content-->
                                                            <div class=\"modal-content\">
                                                                <div class=\"modal-header\">
                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                    <h4 class=\"modal-title\">Cancel Leave</h4>
                                                                </div>
                                                                <div class=\"modal-body\">
                                                                    <p>Are you sure you want to cancel this leave ?</p>
                                                                </div>
                                                                <div class=\"modal-footer\">
                                                                    <button class=\"btn btn-warning\" type='submit' name=\"submit\" value='cancel'>Cancel</button>
                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                        </form>";
                                    }
                                }else{
                                    echo" <div class=\"list-group\">
                                                <li class=\"list-group-item\" style=\"background-color:#d6e9c6\"><h5 >Leave applied by : NOT SELECT ANY ONE </h5></li>
                                            </div>

                                            <div class=\"list-group\">
                                                <li class=\"list-group-item\">Leave Priority : </li>
                                                <li class=\"list-group-item\">Duration :</li>
                                                <li class=\"list-group-item\">Number of Days: </li>
                                                <li class=\"list-group-item\">Reason :</li>
                                                <li class=\"list-group-item\">special note :<input type=\"text\" name=\"\"  placeholder=' If reject..' >
                                                    <button class=\"btn btn-success btn-sm\">";if($empRole=='manager'){echo "Approve";}else{ echo "Recommend";} echo"</button> <button class=\"btn btn-danger btn-sm\">Reject</button><button type=\"button\" class=\"btn btn-link btn-xs\">cancel Leave</button></li>
                                            </div>";
                                }
                            ?>


                            
                        </div>
                    </div>
                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-list icon-margin-right"
                                                                     aria-hidden="true"></i>
                                Past Leave Notifications</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">20/05/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">18/05/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">16/03/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">02/01/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">07/11/2015<span style="float:right;"> Rejected <i
                                            class="fa fa-close" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">27/05/2015<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-5 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-angle-double-right " aria-hidden="true"></i>
                                 Waiting for approval or rejection</h5>
                            <hr>

                            <div class="list-group">
                                <?php
                                if($empRole == 'manager'){
                                    $sql = "select * from apply_leave JOIN employee ON employee.comp_id = apply_leave.comp_id where employee.dept_id=:log and apply_leave.status =:state and apply_leave.comp_id !=:myId";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>$departmentId,'state'=>"recommended",'myId'=>$empID));
                                    $rowCount = $query->rowCount();
                                    $result = $query->fetchAll();

                                    if($rowCount==0){
                                        echo "There is no any pending request";
                                    }

                                    foreach($result as $rs){
                                        echo "<a href='?appId=".$rs['comp_id']."' class=\"list-group-item\">".$rs['name']."<span style=\"float:right;\">Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span></a>";
                                    }

                                }else if($empRole == 'executive'){
                                    $sql = "select * from apply_leave JOIN employee ON employee.comp_id = apply_leave.comp_id where employee.dept_id=:log and apply_leave.status =:state and apply_leave.comp_id !=:myId";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>$departmentId,'state'=>"waiting",'myId'=>$empID));
                                    $rowCount = $query->rowCount();
                                    $result = $query->fetchAll();

                                    if($rowCount==0){
                                        echo "There is no any pending request";
                                    }

                                    foreach($result as $rs){
                                        echo "<a href='?appId=".$rs['comp_id']."' class=\"list-group-item\">".$rs['name']."<span style=\"float:right;\">Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span></a>";
                                    }
                                }

                                ?>


                            </div>
                            
                        </div>
                    </div>

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