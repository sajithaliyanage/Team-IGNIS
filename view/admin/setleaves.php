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
                            $sql = "select * from job_category where currentStatus=:log";
                            $query = $pdo->prepare($sql);
                            $query->execute(array('log'=>"approved"));
                            $result = $query->fetchAll();
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <select id="catName" class="form-control">
                                        <?php
                                        foreach($result as $rs){
                                            echo " <option value='".$rs['job_cat_id']."'>".$rs['job_cat_name']."</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <?php
                                $sql = "select * from job_level";
                                $query = $pdo->prepare($sql);
                                $query->execute();
                                $result = $query->fetchAll();
                                ?>
                                <div class="col-xs-12 col-sm-4">
                                    <select id="catLevel"  class="form-control">
                                        <?php
                                        foreach($result as $rs){
                                            echo " <option value='".$rs['level_id']."'>".$rs['level_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <button class="btn btn-info pull-right filter-button"  onclick ='leaveCount()'>Get Details
                                    </button>
                                </div>

                                <div id="demos" style="margin-top:10px;margin-bottom:20px;"><center><label style="margin-top:15px; font-weight:100;">- Click 'Get Details' button for results -</label></center></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 nortification-box-top margin-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-trash icon-margin-right" aria-hidden="true"></i>
                                Delete Leave Count</h5>
                            <div class="alert-user-D" style="<?php if(!isset($_GET['delete'])){echo 'display:none;';}?>">Leave type deleted successfully!</div>
                            <hr>
                            <form action="module/deleteSetLeave.php" method="POST">
                                <?php
                                $sql = "select * from job_category where currentStatus=:log";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('log'=>"approved"));
                                $result = $query->fetchAll();
                                ?>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5">
                                        <select id="catName" name="catid" class="form-control">
                                            <?php
                                            foreach($result as $rs){
                                                echo " <option value='".$rs['job_cat_id']."'>".$rs['job_cat_name']."</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <?php
                                    $sql = "select * from job_level";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();
                                    $result = $query->fetchAll();
                                    ?>
                                    <div class="col-xs-12 col-sm-4">
                                        <select id="catLevel" name="levelid"  class="form-control">
                                            <?php
                                            foreach($result as $rs){
                                                echo " <option value='".$rs['level_id']."'>".$rs['level_name']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <input type="button" style="background-color:#900000;" class="btn btn-info pull-right filter-button" value="Delete Selects" data-toggle="modal" data-target="#myModal" />
                                    </div>
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Delete Item</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this leave counts?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input class="btn btn-danger pull-right" value="Delete" type="submit" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
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

                                                        $sql = "select * from job_category WHERE job_cat_id NOT IN (SELECT job_cat_id FROM leave_set_job GROUP BY job_cat_id HAVING COUNT(*) =:log) AND currentStatus=:log2";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('log'=>$rowNUM,'log2'=>"approved"));
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
                                                        <label class='col-xs-5 control-label form-lable'>".ucwords($rs['leave_name'])."</label>
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
        <?php
        include('../layouts/onlineStatus.php');
        ?>
    </div>

    <script src="js/jquery.js"></script>
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

        function leaveCount(){
            var catName = document.getElementById('catName').value;
            var catLevel = document.getElementById('catLevel').value;
            var str =catName+','+catLevel;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState==4 && xhttp.status==200){
                    document.getElementById("demos").innerHTML = xhttp.responseText;
                }
            }
            xhttp.open("GET","module/getLeaveCount.php?q1="+str ,true);
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