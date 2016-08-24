<?php
$var = "medical";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
    header('Location:../../index.php');
}

$applyMedicalID='';
if(isset($_GET['appId'])){
    $applyMedicalID = $_GET['appId'];
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
    <style type="text/css">
        .demo-droppable {
            /*color: #fff;*/
            /*padding: 100px 0;*/
            text-align: center;
        }
        .demo-droppable.dragover {
            background: #d4d4d4;
        }
    </style>
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
                                <i class="fa fa-briefcase"></i> Upload Medical Reports
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-7 col-xs-12 padding-box">
                    <div class="row" style="<?php if($empRole != 'manager' && $empRole != 'admin' ){ echo 'display:none;';}?> margin-bottom:20px;">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                Take Your Decision</h5>
                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Your action done successfully!</div>
                            <hr>

                            <?php
                            $eName='';
                            if($applyMedicalID!=null){
                                $sql = "SELECT * FROM medical_report JOIN apply_leave ON medical_report.apply_leave_id = apply_leave.apply_leave_id JOIN employee ON medical_report.comp_id = employee.comp_id WHERE
                                            medical_report.med_id=:appLeaveID and employee.dept_id=:depId ";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('appLeaveID'=>$applyMedicalID,'depId'=>$departmentId));
                                $result = $query->fetchAll();

                                foreach($result as $rs){
                                    echo "<div class=\"list-group\">
                                                <li class=\"list-group-item\" style=\"background-color:#d6e9c6\"><h5 >Medical applied by : <a href='profile.php?empId=".$rs['comp_id']."' style='color:#333;'><strong> ".$rs['name']."</strong></a></h5></li>
                                            </div>
                                                <form action='../../module/confirmMedical.php?empId=".$rs['comp_id']."&app_medical_id=".$applyMedicalID."' method='POST'>

                                                <div class=\"list-group\">
                                                    <li class=\"list-group-item\">Medical For :  <strong>".$rs['start_date']." to ".$rs['end_date']."</strong></li>
                                                    <li class=\"list-group-item\">Medical Report : <a href='../".$rs['medical_report']."' download><img src='../../public/images/medi_icon.png' style='height:30px;width:30px;' /> <strong>Download Medical Report</strong></a> </li>
                                                    <a class=\"btn btn-danger btn-sm\" style='float: right; margin-top:10px; margin-left:10px;margin-bottom:10px;' data-toggle=\"modal\" data-target='#reject-medical".$rs['med_id']."' >Reject</a>
                                                    <a class=\"btn btn-success btn-sm\" style='float: right; margin-top:10px;margin-bottom:10px;'  data-toggle=\"modal\" data-target='#accept-medical".$rs['med_id']."'>Approve</a>

                                                </div>


                                                    <div class=\"modal fade\" id='accept-medical".$rs['med_id']."' >
                                                        <div class=\"modal-dialog\">

                                                            <!-- Modal content-->
                                                            <div class=\"modal-content\">
                                                                <div class=\"modal-header\">
                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                    <h4 class=\"modal-title\">Approve Medical Report</h4>
                                                                </div>
                                                                <div class=\"modal-body\">
                                                                    <p>Are you sure you want to approve this medical report ?</p>
                                                                </div>
                                                                <div class=\"modal-footer\">
                                                                    <button class=\"btn btn-success\" type='submit' name=\"submit\" value='done'>Approve</button>
                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class=\"modal fade\" id='reject-medical".$rs['med_id']."' >
                                                        <div class=\"modal-dialog\">

                                                            <!-- Modal content-->
                                                            <div class=\"modal-content\">
                                                                <div class=\"modal-header\">
                                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                                    <h4 class=\"modal-title\">Reject Medical Report</h4>
                                                                </div>
                                                                <div class=\"modal-body\">
                                                                    <p>Are you sure you want to reject this medal report ?</p>
                                                                </div>
                                                                <div class=\"modal-footer\">
                                                                    <button class=\"btn btn-danger\" type='submit' name=\"submit\" value='reject'>Reject</button>
                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>



                                        </form>";
                                }
                            }else{
                                echo" <div class=\"list-group\">
                                                <li class=\"list-group-item\" style=\"background-color:#d6e9c6\"><h5 >Medical applied by : NOT SELECT ANY ONE </h5></li>
                                            </div>

                                            <div class=\"list-group\">
                                                <li class=\"list-group-item\">Medical For : </li>
                                                <li class=\"list-group-item\">Medical Report :</li>
                                                    <button class=\"btn btn-danger btn-sm\"  style='float: right; margin-top:10px;margin-left:10px; margin-bottom:10px;'>Reject</button>
                                                    <button class=\"btn btn-success btn-sm\" style='float: right; margin-top:10px;margin-bottom:10px;'>Approve</button>
                                            </div>";
                            }
                            ?>



                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-upload icon-margin-right" aria-hidden="true"></i>
                                Upload Medical Center</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <form action="../../module/medicalUpload.php" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Select Absent Date:</label>

                                            <div class="col-xs-8">
                                                <select name="apply_leave_id" class="form-control">
                                                    <?php
                                                        $sql = "SELECT * FROM apply_leave WHERE comp_id=:empId AND status=:log AND medical_status=:state";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('empId'=>$empID,'log'=>"approved",'state'=>"no"));
                                                        $result = $query->fetchAll();
                                                        $rowCount = $query->rowCount();

                                                        if($rowCount==0){
                                                            echo " <option value=''>Results empty</option>";
                                                        }

                                                        foreach($result as $rs){
                                                            echo " <option value='".$rs['apply_leave_id']."'>".$rs['number_of_days']." Day - ".$rs['start_date']." to ".$rs['end_date']."</option>";
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="upload-box demo-droppable">
                                            <center>
                                                <i class="fa fa-upload fa-5x uplaod-icon-box" aria-hidden="true"></i>
                                                <h3>Drop Your Medical Here</h3>
                                                <h5>or</h5>
                                                <label for="fileToUpload" class="btn btn-info btn-lg submit-button">
                                                    Browse From Computer
                                                </label>
                                                <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)"/>

                                                <p>(PDF or image files only allowed - Max Size 3MB)</p>

                                                <div class="output"></div>
                                            </center>

                                            <div id="myProgress" style="margin-top:20px;">
                                                <div id="myBar">
                                                    <div id="label">0%</div>
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Submit Medical</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 col-xs-12 padding-box">
                    <div class="row " style="<?php if($empRole != 'manager' && $empRole != 'admin' ){ echo 'display:none;';}?> margin-bottom:20px;">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-angle-double-right " aria-hidden="true"></i>
                                Waiting medicals for approval or rejection</h5>
                            <hr>

                            <div class="list-group">
                                <?php
                                    $sql = "select * from medical_report JOIN employee ON employee.comp_id = medical_report.comp_id where employee.dept_id=:log and medical_report.status =:state and medical_report.comp_id !=:myId";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>$departmentId,'state'=>"waiting",'myId'=>$empID));
                                    $rowCount = $query->rowCount();
                                    $result = $query->fetchAll();

                                    if($rowCount==0){
                                        echo "There is no any pending request";
                                    }

                                    foreach($result as $rs){
                                        echo "<a href='?appId=".$rs['med_id']."' class=\"list-group-item\">".$rs['name']."<span style=\"float:right;\">Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span></a>";
                                    }
                                ?>


                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                               My Previous Medical Uploads</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql = "select * from medical_report where comp_id =:myId";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('myId'=>$empID));
                                $rowCount = $query->rowCount();
                                $result = $query->fetchAll();

                                if($rowCount==0){
                                    echo "There is no any uploads yet";
                                }

                                foreach($result as $rs){
                                    echo "<a href='' class=\"list-group-item\">Medical - ".$rs['uploaded_date']."<span style='float:right;'>"; if($rs['status']=='waiting'){echo 'Waiting for Approve <i class=\"fa fa-question\" aria-hidden=\"true\"></i></span></a>';}else if($rs['status']=='approved'){ echo 'Approved <i class=\'fa fa-check\' aria-hidden=\'true\'></i></span></a>';}else{echo 'Rejected <i class=\'fa fa-close\' aria-hidden=\'true\'></i></span></a>';};
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                My Dates of Absent</h5>
                            <hr>
                            <div class="list-group">

                                <?php
                                $sql = "select * from apply_leave where comp_id =:myId AND status=:log";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('myId'=>$empID, 'log'=>"approved"));
                                $rowCount = $query->rowCount();
                                $result = $query->fetchAll();

                                if($rowCount==0){
                                    echo "There is no any absent yet";
                                }

                                foreach($result as $rs){
                                    echo "<a href=\"#\" class=\"list-group-item\">".$rs['start_date']."<strong> to </strong>".$rs['end_date']."<span style=\"float:right;\">".$rs['number_of_days']." day</span></a>";
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

<script type="text/javascript">
    (function(window) {
        function triggerCallback(e, callback) {
            if(!callback || typeof callback !== 'function') {
                return;
            }
            var files;
            if(e.dataTransfer) {
                files = e.dataTransfer.files;
            } else if(e.target) {
                files = e.target.files;
            }
            callback.call(null, files);
        }
        function makeDroppable(ele, callback) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('id', 'fileToUploads');
//            input.setAttribute('multiple', true);
            input.setAttribute('name', 'fileToUploads');
//            input.style.display = 'none';
            input.addEventListener('change', function(e) {
                triggerCallback(e, callback);
            });
            ele.appendChild(input);

            ele.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                ele.classList.add('dragover');
            });

            ele.addEventListener('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                ele.classList.remove('dragover');
            });

            ele.addEventListener('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                ele.classList.remove('dragover');
                triggerCallback(e, callback);
            });

            ele.addEventListener('click', function() {
                input.value = null;
//                input.click();
            });
        }
        window.makeDroppable = makeDroppable;
    })(this);
    (function(window) {
        makeDroppable(window.document.querySelector('.demo-droppable'), function(files) {
            console.log(files);
            var output = document.querySelector('.output');
            output.innerHTML = '';
            for(var i=0; i<files.length; i++) {
                output.innerHTML += '<p>'+files[i].name+'</p>';
            }
        });
    })(this);
</script>

<script>
    $('#fileToUpload').click(function() {
        $('#myProgress').css({
            'display': 'block'
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(600)
                    .height(500);
            };

            reader.readAsDataURL(input.files[0]);
            move()
        }
    }
    function move() {
        var elem = document.getElementById("myBar");
        var width = 10;
        var id = setInterval(frame, 10);

        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
                document.getElementById("label").innerHTML = width * 1 + '%';
            }
        }
    }

</script>
</body>
</html>