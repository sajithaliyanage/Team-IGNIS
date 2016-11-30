<?php
$var = "employee";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="admin"){
    header('Location:../../index.php');
}

$sql0="SELECT * FROM employee";
$query0 = $pdo->prepare($sql0);
$query0->execute();
$result0 = $query0->fetchAll();
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
    <link href="css/datatable.css" rel="stylesheet">

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
                                <i class="fa fa-user-plus"></i><a href="employee.php"> Edit Employee</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Employees
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-users icon-margin-right" aria-hidden="true"></i>
                                All Employees</h5>
                            <div class="alert-user-D" style="<?php if(!isset($_GET['delete'])){echo 'display:none;';}?>">Employee deleted successfully!</div>
                            <hr>
                            <table id="myTable" class="display">
                                <thead>
                                <tr style="margin-top:30px;">
                                    <th style="text-align: center;">Emp ID</th>
                                    <th style="text-align: center;">Profile Picture</th>
                                    <th style="text-align: center;">Full Name</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Telephone</th>
                                    <th style="text-align: center;">Gender</th>
                                    <th style="text-align: center;">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($query0->rowCount() > 0){
                                    foreach($result0 as $rs){

                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $rs['comp_id'];?></td>
                                            <td style="text-align: center;">
                                                <center>
                                                    <img src='../<?php if($rs['image'] != 'null'){echo $rs['image'];}else{ echo '../public/images/default.png';}?>' class="img-responsive" style="height:60px; width:60px;" />
                                                </center>
                                            </td>
                                            <td style="text-align: center;"><?php echo $rs['name'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['email'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['tel_no'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['gender'];?></td>
                                            <td style="text-align: center;"><button type="button"  data-toggle="modal" data-target="#myModal<?php echo $rs['comp_id'];?>" class="btn btn-danger">Delete</button></td>

                                            <div id="myModal<?php echo $rs['comp_id'];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete User <?php echo $rs['comp_id'];?> - <?php echo $rs['name'];?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this Employee?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="module/deleteEmployee.php?id=<?php echo $rs['comp_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<h3 style='text-align: center;'>No any users registered yet!</h3>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/datatable.js"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>

</body>
</html>