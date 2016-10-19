<?php
$var = "graphs";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="director"){
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

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../admin/css/adminpanel-interface.css" rel="stylesheet">
    <link href="../admin/css/navbar-style.css" rel="stylesheet">
    <link href="../admin/css/font-awesome.min.css" rel="stylesheet">

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
                                <i class="fa fa-dashboard"></i> <a href="director.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Company Attendance Analyse
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row">

                <div class="hero-unit-table">
                    <div class="charts_container">
                        <div class="chart_container">
                            <div class="alert alert-info">Number of employees in a department</div>
                            <canvas id="emp_graph" width="1100" height="400">
                                Your web-browser does not support the HTML 5 canvas element.
                            </canvas>
                        </div>
                    </div>
                </div>



            </div>


        </div>


    </div>



<script type="application/javascript">
      var emp_chart = new AwesomeChart('emp_graph');
      emp_chart.data = [
   <?php
            //display no of employees belongs to a particular department
          $query = mysql_query("select * from department") ;
          while ($row = mysql_fetch_array($query)) {
          ?>
          <?php echo $row['no_of_emp'] . ','; ?>
          <?php }; ?>
        ];

        emp_chart.labels = [
            <?php
            //display the department name
            $query = mysql_query("select * from department") ;
            while ($row = mysql_fetch_array($query)) {
            ?>
            <?php echo "'" . $row['dept_name'] . "'" . ','; ?>
            <?php };  ?>
        ];

        <!--    to change the color of the graph-->
        emp_chart.colors = ['gold', 'skyblue', '#FF6600', 'pink', 'darkblue', 'lightpink', 'green'];
        emp_chart.randomColors = true;
        emp_chart.animate = true;
        emp_chart.animationFrames = 20;
        emp_chart.draw();
    </script>

<!--    <script type="application/javascript">-->
<!--        var emp_chart = new AwesomeChart('emp_graph');-->
<!--        emp_chart.data = [-->
<!--            --><?php
//            //display no of employees belongs to a particular department
//            $sql1 = "SELECT * from department";
//            $query1 = $pdo->prepare($sql1);
//            $result1 = $query1->fetch();
//            while (false) {
//
//                echo $result1['no_of_emp'] . ',';
//            }; ?>
//        ];
//
//        emp_chart.labels = [
//            <?php
//            //display the department name
//            $sql2 = "SELECT * from department";
//            $query2 = $pdo->prepare($sql2);
//            $result2 = $query2->fetch();
//            while (false) {
//
//                echo "'" . $result2['dept_name'] . "'" . ',';
//            }; ?>
//        ];
//
//        <!--    to change the color of the graph-->
//        emp_chart.colors = ['gold', 'skyblue', '#FF6600', 'pink', 'darkblue', 'lightpink', 'green'];
//        emp_chart.randomColors = true;
//        emp_chart.animate = true;
//        emp_chart.animationFrames = 20;
//        emp_chart.draw();
//    </script>

    <script src="../admin/js/jquery.js"></script>
    <script src="../admin/js/bootstrap.js"></script>
    <script type="application/javascript" src="../../public/js/awesomechart.js"> </script>

</body>
</html>