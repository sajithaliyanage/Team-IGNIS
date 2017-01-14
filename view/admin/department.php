<?php
$var = "department";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

//require_once('module/Department.php');

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
                                <i class="fa fa-building"></i> Edit Departments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
<!--                show current departments-->
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-building icon-margin-right" aria-hidden="true"></i>
                                Current Departments</h5>
                            <div class="alert-user-D" style="<?php if(!isset($_GET['delete'])){echo 'display:none;';}?>">Department deleted successfully!</div>
                            <div class="alert-user" style="<?php if(!isset($_GET['edit'])){echo 'display:none;';}?>">Department edited successfully!</div>
                            <hr>
                            <div class="list-group">
                                <?php
                                    $sql = "select * from department WHERE currentStatus=:log";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>"approved"));
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        echo " <li  class='list-group-item'>
                                                <div style='height:25px; width:25px; background-color:".$rs['dept_color']."; float: left; margin-right:10px; margin-top:5px;'></div>
                                                <h5>".$rs['dept_name']."</h5>
                                                <h5 style='float: right; margin-top:-24px;'><a href='index_department_employee.php?id=".$rs['dept_id']."' style='color:#555;'>More Info <i class='fa fa-chevron-circle-right' style=' margin-right:5px;' aria-hidden='true'></i></a>
                                                <button type='button' style='background-color:transparent;border:none; float:right;' data-toggle='modal' data-target='#myModal".$rs['dept_id']."'><i class='fa fa-trash'  style='color:#900000;' aria-hidden='true'></i></button>
                                                <button type='button' style='background-color:transparent;border:none; float:right;' data-toggle='modal' data-target='#myEdit".$rs['dept_id']."'><i class='fa fa-pencil'  style='color:#604000;' aria-hidden='true'></i></button>
                                                </h5>

                                               </li>";
                                ?>
                                        <div id="myModal<?php echo $rs['dept_id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete Item <?php echo $rs['dept_id'];?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this deprtment?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="module/deleteDepartment.php?id=<?php echo $rs['dept_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="myEdit<?php echo $rs['dept_id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Edit Item</h4>
                                                    </div>
                                                    <div class="modal-body" style="height:250px;">
                                                        <p>Are you sure you want to edit this department?</p>

                                                            <form action="module/editDepartment.php?id=<?php echo $rs['dept_id'];?>" method="POST">
                                                                <div class="row"  style="margin-top:30px;">
                                                                    <div class="form-group">
                                                                    <label class="col-xs-4 control-label form-lable">Department Name:</label>

                                                                    <div class="col-xs-8">
                                                                        <input id="example2" name="deptName" type="text" value="<?php echo $rs['dept_name']?>"
                                                                               class="form-control input-md" required>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="row" style="margin-top:20px;">
                                                                    <div class="form-group">
                                                                        <label class="col-xs-4 control-label form-lable"  style="margin-bottom:10px !important;">Department Color:</label>

                                                                        <div class="col-xs-8">
                                                                            <input  style="margin-bottom:10px !important;" type="color" id="service_name" name="dept_color" value="<?php echo $rs['dept_color']?>"  class="form-control input-md jscolor" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="margin-top:20px;">
                                                                    <div class="form-group">
                                                                        <label class="col-xs-4 control-label form-lable"  style="margin-bottom:10px !important;">Roster Status:</label>

                                                                        <div class="col-xs-8">
                                                                            <select  name="dept_status" class="form-control">
                                                                                <option value="NO" <?php if($rs['roster_status'] === 'NO') echo 'selected="selected"';?> >No</option>
                                                                                <option value="YES" <?php if($rs['roster_status'] === 'YES') echo 'selected="selected"';?>>Yes</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Edit</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
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

<!--                add new department to company-->
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add New Department</h5>

<!--                            //alert to user-->
                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Department added successfully!</div>

                            <div class="alert-user " style="<?php if(!isset($_GET['error'])){echo 'display:none;';}?>color:#d43f3a">Invalid Form Actions!</div>

                            <div class="alert-user " style="<?php if(!isset($_GET['color_error'])){echo 'display:none;';}?>color:#d43f3a">Department Color Already Exists!</div>


                            <hr>
                            <form role="form" data-toggle="validator" action="module/addDepartments.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department Name :</label>
                                            <div class="col-xs-7">
                                                <input id="service_name" name="dept_name" type="text" placeholder="Example: HR"
                                                       class="form-control input-md" required onblur="getDept(this.value)">
                                                <p id="showHint" style="color:red;font-size: 10px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Department Color :</label>
                                            <div class="col-xs-7">
                                                <input type="color" id="service_name" name="dept_color" placeholder="" class="form-control input-md jscolor" required onchange = 'getColor(this.value)''>
                                                <p id="showHintColor" style="color:red;font-size: 10px; margin-top:5px;margin-left: 5px"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-xs-5 control-label form-lable">Roster Status :</label>
                                            <div class="col-xs-7">
                                                <select  name="roster_status" class="form-control">
                                                    <option value="NO">No</option>
                                                    <option value="YES">Yes</option>
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

<!--                    shoe status of actions-->
                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Pending Requests</h5>
                            <hr>
                            <div class="list-group">
                                <?php
                                    $sql = "select * from department";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();
                                    $result = $query->fetchAll();

                                foreach($result as $rs){
                                    ?>
                                    <a href='#' class='list-group-item'><?php echo ucwords($rs['dept_name']); ?>
                                        <span style='float:right;'>
                                            <?php if ($rs['currentStatus'] == 'waiting') {
                                                echo "Waiting for Approve <button type='button' style='background-color:transparent;border:none;' data-toggle='modal' data-target='#myModal".$rs['dept_id']."'><i class='fa fa-question' style='color:orange;' aria-hidden='true'></i></button>";
                                            } else if ($rs['currentStatus'] == 'approved') {
                                                echo "Approved <i class='fa fa-check' aria-hidden='true'></i>";
                                            }else {
                                                echo "Rejected <button type='button' style='background-color:transparent;border:none;' data-toggle='modal' data-target='#myModal" . $rs['dept_id'] . "'><i class='fa fa-close'  style='color:red;' aria-hidden='true'></i></button>";
                                            }?>
                                        </span>
                                    </a>

                                    <div id="myModal<?php echo $rs['dept_id'];?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Delete Item</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this department?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="module/deleteDepartment.php?id=<?php echo $rs['dept_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
<!--    <script src="js/jscolor.min.js"></script>-->
    <script src="js/bootstrap.js"></script>
    <script>
    function getDept(str) {
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("showHint").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "module/ajaxdepartment.php?r=" + str, true);
        xhttp.send();
    }

    function getColor(str) {
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("showHintColor").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "module/ajaxdepartment.php?c=" + str, true);
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