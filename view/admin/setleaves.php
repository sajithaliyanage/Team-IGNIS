<?php
$var = "set";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
    header('Location:../../index.php');
}

$jobCatID = null;

if(isset($_GET['id'])){
    $jobCatID =$_GET['id'];
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
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus"></i> Set Leaves
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-eye icon-margin-right" aria-hidden="true"></i>
                                Show Leave Count</h5>
                            <hr>
                            <?php
                            $sql = "select * from job_category
                                    JOIN leave_set_job ON leave_set_job.job_cat_id = job_category.job_cat_id
                                    JOIN job_level ON job_level.level_id = leave_set_job.level_id
                                    JOIN leave_count_details ON leave_count_details.set_id=leave_set_job.set_id
                                    JOIN leave_type ON leave_type.leave_id = leave_count_details.leave_id
                                    WHERE job_category.currentStatus=:log ORDER BY job_category.job_cat_name DESC ";
                            $query = $pdo->prepare($sql);
                            $query->execute(array('log'=>"approved"));
                            $result = $query->fetchAll();
                            $rowCount = $query->rowCount();

                            echo"<h5 style=\"text-align: right;\">Total Job Set Leaves : <span class=\"badge\">";if($rowCount<10){echo "0".$rowCount;}else{echo $rowCount;} echo"</span></h5>

                            <div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
                                <input id=\"iconified\" class=\"form-control empty\" type=\"text\" placeholder=\"&#xF002; Search\" onkeyup=\"filter(this,'theList')\" style=\"width:260px; background-color:#f4f4f4; height:30px; margin-top:-34px; margin-bottom:20px;\" />";


                                foreach($result as $rs){

                                    echo "   <div class='panel panel-default asd'>
                                    <div class='panel-heading' role='tab' id='headingTwo'>
                                        <h4 class='panel-title'>
                                            <a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne".$rs['set_id'].$rs['leave_id']."' aria-expanded='false' aria-controls='collapseTwo'>
                                                <h5>".$rs['job_cat_name']." - ".$rs['level_name']."<span style='margin-left:10px;'><i class='fa fa-chevron-down' aria-hidden='true'></i></span></h5></a>
                                            <span class='label label-danger' style='float: right; margin-top:-24px; margin-right:50px !important;'>Delete <i class='fa fa-close' aria-hidden='true'></i></span>
                                            <span class='label label-success' style='float: right; margin-top:-24px;'>Edit <i class='fa fa-close' aria-hidden='true'></i></span>
                                        </h4>
                                    </div>
                                    <div id='collapseOne".$rs['set_id'].$rs['leave_id']."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>
                                        <div class='panel-body'>
                                            <table class='table-responsive'>
                                                <table class='table table-bordered table-striped '>
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Leave Count</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>".$rs['leave_name']."</td>
                                                        <td>".$rs['leave_count']."</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>";
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Set Leaves for Job Categories</h5>
                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Leave count set successfully!</div>
                            <hr>
                            <form role="form" data-toggle="validator" action="module/setLeaveCount.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Job Category :</label>
                                            <div class="col-xs-7">
                                                <select  name="job_cat" class="form-control"  onchange = 'showUser3(this.value)'>
                                                    <?php
                                                    if(isset($_GET['id'])){
                                                        $sqls = "SELECT * FROM job_category WHERE job_cat_id=:jobID";
                                                        $querys = $pdo->prepare($sqls);
                                                        $querys->execute(array('jobID'=>$jobCatID));
                                                        $results = $querys->fetch();

                                                        echo "<option value="; if(isset($_GET['id'])){echo $jobCatID;}else{ echo 'empty';} echo" >"; if(isset($_GET['id'])){echo $results['job_cat_name'];}else{ echo '- Select -';} echo"</option>";
                                                    }else{
                                                        echo "<option value='empty'>- Select -</option>";
                                                        $sql = "select * from job_level";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute();
                                                        $rowNUM = $query->rowCount();

                                                        $sql = "select * from job_category WHERE job_cat_id NOT IN (SELECT job_cat_id FROM leave_set_job GROUP BY job_cat_id HAVING COUNT(*) =:log)";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log'=>$rowNUM));
                                                        $result = $query->fetchAll();

                                                        foreach($result as $rs){
                                                            echo " <option value='".$rs['job_cat_id']."'>".$rs['job_cat_name']."</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Job Level :</label>
                                            <div class="col-xs-7">
                                                <select  name="job_level" class="form-control">
                                                    <?php
                                                    if(isset($_GET['id'])){
                                                        $sql = "select * from job_level WHERE level_id NOT IN (SELECT level_id FROM leave_set_job WHERE job_cat_id=:log)";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log'=>$jobCatID));
                                                        $result = $query->fetchAll();

                                                        foreach($result as $rs){
                                                            echo " <option value='".$rs['level_id']."'>".$rs['level_name']."</option>";
                                                        }
                                                    }else{
                                                        echo "<option value='empty'>- Select Job Category First -</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <?php
                                        $sql = "select * from leave_type WHERE currentStatus=:log";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('log'=>"approved"));
                                        $result = $query->fetchAll();

                                        foreach($result as $rs){
                                                echo "<div class='form-group'>
                                                        <label class='col-xs-5 control-label form-lable'>".$rs['leave_name']."</label>
                                                        <div class='col-xs-7'>
                                                            <input id='service_name' name='leave_type[]' type='text' placeholder=''
                                                       class='form-control input-md' required>
                                                        </div>
                                                        </div>
                                                    <br/>
                                                    <br/>";
                                            }
                                            ?>

                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Submit</button>
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

    <script src="js/jquery.js"></script>
    <script src="js/jscolor.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script language="javascript" type="text/javascript">
        $('#iconified').on('keyup', function() {
            var input = $(this);
            if(input.val().length === 0) {
                input.addClass('empty');
            } else {
                input.removeClass('empty');
            }
        });

        function filter(element) {
            var value = $(element).val().toLowerCase();;

            $("#accordion > .asd").each(function() {
                var listVal = $(this).text().toLowerCase();
                if (listVal.indexOf(value)>= 0) {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            });
        }

        function showUser3(str) {
            if(str != 'empty'){
                var javascriptVariable = str;
                window.location.href = "setleaves.php?id=" + javascriptVariable;
            }
        }
    </script>
</body>
</html>