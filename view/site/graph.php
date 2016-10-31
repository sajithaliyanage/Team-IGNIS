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
                                <i class="fa fa-bar-chart"></i> Company Attendance Analyse
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row">
                <div class="hero-unit-table">
                    <div class="alert alert-info">Number of employees in a department</div>
                    <canvas id="emp_graph"  height="400">
                        Your web-browser does not support the HTML 5 canvas element.
                    </canvas>
                </div>

                    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
                </div>
        </div>


    </div>
</div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, options);
        }
    </script>

    <script src="../admin/js/jquery.js"></script>
    <script src="../admin/js/bootstrap.js"></script>
    <script src="../layouts/graph.js" type="text/javascript"></script>
    <script type="application/javascript" src="../layouts/awesomechart.js"> </script>

</body>
</html>