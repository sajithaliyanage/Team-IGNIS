<?php
$var = "employee";
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
                                <i class="fa fa-user-plus"></i> Edit Employees
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                Count of Employees</h5>
                            <hr>
                            <ul class="list-group">
                                <?php
                                    $sql="SELECT * FROM department WHERE currentStatus=:log";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>"approved"));
                                    $result = $query->fetchAll();

                                    foreach($result as $rs){
                                        echo "<li class=\"list-group-item\">
                                                <span class=\"badge\">";if($rs['no_of_emp']<10){echo "0".$rs['no_of_emp'];}else{echo $rs['no_of_emp'];} echo"</span>
                                                    ".$rs['dept_name']."
                                                </li>";
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-user icon-margin-right" aria-hidden="true"></i>
                                Filter Employees</h5>
                            <hr>
                            <div class="panel panel-primary filterable outer-filter">
                                <div class="panel-heading filter-box">
                                    <h3 class="panel-title">Employees</h3>

                                    <div class="pull-right">
                                        <button class="btn btn-default btn-xs btn-filter"><span
                                                class="fa fa-filter"></span> Filter
                                        </button>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr class="filters">
                                        <th><input type="text" class="form-control" placeholder="Department" disabled>
                                        </th>
                                        <th><input type="text" class="form-control" placeholder="Employee Role"
                                                   disabled></th>
                                        <th><input type="text" class="form-control" placeholder="Employee Name"
                                                   disabled></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>IT Department</td>
                                        <td>Manager</td>
                                        <td>Sajitha Liyanage</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing Department</td>
                                        <td>Executive Officer</td>
                                        <td>Nilasha Deemantha</td>
                                    </tr>
                                    <tr>
                                        <td>Sales Department</td>
                                        <td>Executive Officer</td>
                                        <td>Madusha Ushan</td>
                                    </tr>
                                    <tr>
                                        <td>Sales Department</td>
                                        <td>Manager</td>
                                        <td>Dileep Jayasundara</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing Department</td>
                                        <td>Manager</td>
                                        <td>Gothami Karunarathne</td>
                                    </tr>
                                    <tr>
                                        <td>IT Department</td>
                                        <td>Executive Officer</td>
                                        <td>Priyanwada Kulasooriya</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                Add New Employee</h5>

                            <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">New employee added successfully!</div>
                            <hr>
                            <form role="form" data-toggle="validator" action="module/addEmployee.php" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                            <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Department :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_department" class="form-control">
                                                    <?php
                                                    $sql = "select * from department WHERE currentStatus=:log";
                                                    $query = $pdo->prepare($sql);
                                                    $query->execute(array('log'=>"approved"));
                                                    $result = $query->fetchAll();

                                                    foreach($result as $rs){
                                                        echo " <option value='".$rs['dept_id']."'>".$rs['dept_name']."</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Role :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_role" class="form-control">
                                                    <option value="director">Director</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="executive">Executive Officer</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Job Category :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_category" class="form-control">
                                                    <?php
                                                    $sql = "select * from job_category WHERE currentStatus=:log";
                                                    $query = $pdo->prepare($sql);
                                                    $query->execute(array('log'=>"approved"));
                                                    $result = $query->fetchAll();

                                                    foreach($result as $rs){
                                                        echo " <option value='".$rs['job_cat_id']."'>".$rs['job_cat_name']."</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Job Level :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_level" class="form-control">
                                                    <option value="permanent">Permanent</option>
                                                    <option value="probation">Probation</option>
                                                    <option value="trainee">Trainee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Company ID :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_id" type="text" placeholder="Tryonics-01"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Name :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_name" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>


                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee NIC :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_nic" type="text" placeholder="xxxxxxxxxV" class="form-control input-md" required>                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Gender :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <select  name="emp_gender" class="form-control">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Email :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_email" placeholder="" type="email" class="form-control input-md " required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Set Password :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_password" placeholder="" value="123" type="text" class="form-control input-md " required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-sm-5 col-xs-12 control-label form-lable">Employee Telephone :</label>
                                            <div class="col-sm-7 col-xs-12">
                                                <input id="service_name" name="emp_tele" placeholder="" type="text" class="form-control input-md " required>
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

<!--                    <div class="row margin-top">-->
<!--                        <div class="col-xs-12 nortification-box-top">-->
<!--                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>-->
<!--                                Pending Requests</h5>-->
<!--                            <hr>-->
<!--                            <div class="list-group">-->
<!--                                <a href="#" class="list-group-item">IT Department<span style="float:right;"> Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>-->
<!--                                <a href="#" class="list-group-item">Sales Department<span style="float:right;"> Waiting for Approve <i class="fa fa-question" aria-hidden="true"></i></span></a>-->
<!--                                <a href="#" class="list-group-item">HR Department<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>