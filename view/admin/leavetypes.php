<?php
$var = "leave";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
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

        <div class="col-sm-10 col-xs-12 admin-background  col-sm-push-2">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-envelope"></i> Edit Leave Types
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-check icon-margin-right" aria-hidden="true"></i>
                                Added Leave Types</h5>
                            <div class="alert-user-D" style="<?php if(!isset($_GET['delete'])){echo 'display:none;';}?>">Leave type deleted successfully!</div>
                            <hr>
                            <?php
                                $sql = "select * from leave_type where currentStatus=:log ";
                                $query = $pdo->prepare($sql);
                                $query->execute(array('log'=>"approved"));
                                $result = $query->fetchAll();
                                $rowCount = $query->rowCount();
                            ?>
                            <h5 style="text-align: right;">Total Leave Types : <span class="badge"><?php if($rowCount<10){echo "0".$rowCount;}else{echo $rowCount;} ?></span></h5>
                            <div class="list-group">

                                <?php
                                    foreach($result as $rs){
                                ?>
                                    <li class='list-group-item'>
                                       <h5><?php echo ucwords($rs['leave_name']);?></h5>
                                       <a href="#" type="button" class="label label-danger" data-toggle="modal" data-target="#myModal<?php echo $rs['leave_id'];?>" style="float: right; margin-top:-24px;">Delete <i class="fa fa-close" aria-hidden="true"></i></a>

                                    </li>

                                        <div id="myModal<?php echo $rs['leave_id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete Item</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this leave type?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="module/deleteLeaveTypes.php?id=<?php echo $rs['leave_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add New Leave Type</h5>
                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Leave type added successfully!</div>
                            <div class="alert-user" style="<?php if(!isset($_GET['error'])){echo 'display:none;';}?> color:#d43f3a ">Invalid Form Action!</div>
                            <hr>
                            <form role="form" data-toggle="validator" action="module/addLeaveTypes.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Leave Type :</label>
                                            <div class="col-xs-7">
                                                <input id="service_name" name="leave_type" type="text" placeholder="Annual Leave"
                                                       class="form-control input-md" required onblur="getType(this.value)">
                                                <p id="showType" style="color:red;font-size: 12px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Renew Period :</label>
                                            <div class="col-xs-7">
                                                <select  name="leave_period" class="form-control">
                                                    <option value="annual">Annual</option>
                                                    <option value="monthly">Monthly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                            <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                $sql = "select * from leave_type";
                                $query = $pdo->prepare($sql);
                                $query->execute();
                                $result = $query->fetchAll();

                                foreach($result as $rs){
                                ?>
                                <a href='#' class='list-group-item'><?php echo ucwords($rs['leave_name']); ?>
                                    <span style='float:right;'>
                                            <?php if ($rs['currentStatus'] == 'waiting') {
                                                echo "Waiting for Approve <button type='button' style='background-color:transparent;border:none;' data-toggle='modal' data-target='#myModal".$rs['leave_id']."'><i class='fa fa-question' style='color:orange;' aria-hidden='true'></i></button>";
                                            } else if ($rs['currentStatus'] == 'approved') {
                                                echo "Approved <i class='fa fa-check' aria-hidden='true'></i>";
                                            }else {
                                                echo "Rejected <button type='button' style='background-color:transparent;border:none;' data-toggle='modal' data-target='#myModal" . $rs['leave_id'] . "'><i class='fa fa-close'  style='color:red;' aria-hidden='true'></i></button>";
                                            }?>
                                        </span>
                                    </a>

                                    <div id="myModal<?php echo $rs['leave_id'];?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Delete Item</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this leave type?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="module/deleteLeaveTypes.php?id=<?php echo $rs['leave_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

  <script>
      function getType(str) {

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                  document.getElementById("showType").innerHTML = xhttp.responseText;
              }
          }
          xhttp.open("GET", "module/ajaxleavetypes.php?q=" + str, true);
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