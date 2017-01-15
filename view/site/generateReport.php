<?php
$var = "reports";
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
    <link rel="stylesheet" href="../../public/css/datepicker.css">

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
                                <i class="fa fa-briefcase"></i> Generate Reports
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-paperclip icon-margin-right" aria-hidden="true"></i>
                              Filter Your Report  </h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="../../module/fileGenerator.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <?php
                                                if(isset($_GET['both'])){
                                                    echo "<p style='color:#c9302c;margin-left:20px;'>** Select <strong>report type</strong> and <strong>file type </strong> to download</p>";
                                                }else if(isset($_GET['type'])){
                                                    echo "<p style='color:#c9302c;margin-left:20px;'>** Select <strong>report type</strong> to download</p>";
                                                }else if(isset($_GET['file'])){
                                                    echo "<p style='color:#c9302c;margin-left:20px;'>** Select <strong>file type</strong> to download</p>";
                                                }else if(isset($_GET['empty'])){
                                                    echo "<p style='color:#c9302c;margin-left:20px;'>** No results to generate a file</p>";
                                                }
                                            ?>
                                            <div class="col-xs-12 col-sm-4">
                                                <select name="report_type" class="form-control" onchange = 'showUser(this.value)'>
                                                    <option value="empty">- Select Report Type -</option>
                                                    <option style="<?php if($empRole !='director'){echo 'display:none'; }?>" value="company_emp">Company Employees</option>
                                                    <option style="<?php if($empRole !='director'){echo 'display:none'; }?>"  value="dept_details">Company Department Detail</option>
                                                    <option style="<?php if($empRole =='director'){echo 'display:none'; }?>"  value="own_all">Own leave status - ALL</option>
                                                    <option style="<?php if($empRole =='director'){echo 'display:none'; }?>"  value="own_approved">Own leave status - Only approved</option>
                                                    <option style="<?php if($empRole !='manager' && $empRole !='admin'){echo 'display:none'; }?>"  value="dept_emp">Department Employees</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-2" style="<?php if($empRole =='director'){echo "display:none";}?>">
                                                <input id="example1" name="start_date" type="text"
                                                       placeholder="Start Date"
                                                       class="form-control input-md">
                                            </div>
                                            <div class="col-xs-12 col-sm-2"  style="<?php if($empRole =='director'){echo "display:none";}?>">
                                                <input id="example2" name="end_date" type="text"
                                                       placeholder="End Date"
                                                       class="form-control input-md">
                                            </div>
                                            <div class="col-xs-12 col-sm-2">
                                                <select name="file_type" class="form-control">
                                                    <option value="empty">- File Type -</option>
                                                    <option value="pdf">PDF</option>
                                                    <option value="csv">CSV / EXCEL</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-2">
                                                <button class="btn btn-info btn-lg pull-right submit-button" type="submit" style="padding:10px 25px; margin-top:-5px;">Download
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-eye icon-margin-right" aria-hidden="true"></i>
                                Preview of Report</h5>
                            <hr>
                            <div class="row" style="padding-bottom:20px;">
                                <div class="col-xs-12">
                                    <div id="demo"><center>- Select a leave type to filtring -</center></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
    include('../layouts/onlineStatus.php');
    ?>
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

<script>
    function showUser(str){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState==4 && xhttp.status==200){
                document.getElementById("demo").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET","../../module/ajaxResponceReport.php?q="+str ,true);
        xhttp.send();
    }
</script>
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