<?php
$var = "settings";
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/interface-leftmenu.css" rel="stylesheet">
    <link href="css/adminpanel-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include("navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Settings
                            </li>
                        </ol>
                    </div>
                </div>
            </div>


            <div class="row padding-row ">

                <div class="col-sm-12 col-xs-12 nortification-box-top padding-box" style="padding-bottom:30px;">
                    <h5 class="nortification-box-heading"><i class="fa fa-share icon-margin-right"aria-hidden="true"></i>
                        Transfer Leaves </h5>
                    <hr>
                    <h4 style="margin-top:20px;">Transfer leave counts to Salary Department <br> <small><i>(via Email)</i></small></h4>

                    <button class="btn btn-warning btn-md pull-right"  style="margin-top:-40px; margin-right:242px;" onclick="salaryReport()">Preview</button>
                    <a href="module/downloadReport.php"><button class="btn btn-danger btn-md pull-right"  style="margin-top:-40px; margin-right:145px;" >Download</button></a>
                    <button class="btn btn-success btn-md pull-right" type="submit" style="margin-top:-40px; margin-right:30px;"  data-toggle="modal" data-target="#sendEmail">Send Report</button>

                    <div id="salary_report"></div>
                </div>

                <div class="col-sm-12 col-xs-12 nortification-box-top padding-box" style="padding-bottom:30px;  margin-top:20px;">
                    <h5 class="nortification-box-heading"><i class="fa fa-flag icon-margin-right"aria-hidden="true"></i>
                        Reset Leave Counts</h5>
                    <hr>
                    <h4 style="margin-top:20px;">In this section can reset all the employee leave counts <br> <small><i>(For the New Year)</i></small></h4>

                    <button class="btn btn-primary btn-md pull-right" type="submit" style="margin-top:-40px; margin-right:30px;"  data-toggle="modal" data-target="#resetData">Reset</button>

                </div>

                <?php
                    $sqls = "SELECT email from employee where comp_id=:id";
                    $querys = $pdo->prepare($sqls);
                    $querys->execute(array('id'=>$empID));
                    $results = $querys->fetch();
                ?>

                <div id="sendEmail" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Send Leave Count Report</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to do this action ? </p>
                                <form action="module/sendReportEmail.php" method="POST">
                                    <div class="row"  style="margin-top:30px;">
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Sender Email:</label>

                                            <div class="col-xs-8">
                                                <input name="senderEmail" type="text" value="<?php echo $results['email']?>"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable"  style="margin-bottom:10px !important;">Receiver Email:</label>

                                            <div class="col-xs-8">
                                                <input  style="margin-bottom:10px !important;" type="text" name="receiverEmail"   class="form-control input-md " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable"  style="margin-bottom:10px !important;">Leave Report:</label>

                                            <div class="col-xs-8">
                                                <input type="file" name="report"">
                                            </div>
                                        </div>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Send Email</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

<script>
    function salaryReport(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState==4 && xhttp.status==200){
                document.getElementById("salary_report").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("POST","module/salaryReport.php" ,true);
        xhttp.send();
    }
</script>


</body>
</html>