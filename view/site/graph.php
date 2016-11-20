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

          <!---start top boxes--->
          <div class="row padding-row">
              <div class="col-sm-3 col-xs-12 padding-box">
                  <div class="row">
                      <div class="col-xs-12 main-box-1-1">
                          <div class="row">
                              <div class="col-xs-8">
                                  <?php
                                      $sql="SELECT * FROM department WHERE currentStatus=:log and roster_status=:state";
                                      $query = $pdo->prepare($sql);
                                      $query->execute(array('log'=>"approved",'state'=>"NO"));
                                      $numrow = $query->rowCount();
                                      $numrows = intval($numrow);
                                  ?>
                                  <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

                                  <h3 class="box-head">Departments</h3>
                              </div>
                              <div class="col-xs-4">
                                  <i class="fa fa-building fa-5x box-icon" aria-hidden="true"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-12  main-box-1-2">
                          <div class="more-info">
                             <a href="index_departments.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-3 col-xs-12 padding-box">
                  <div class="row">
                      <div class="col-xs-12 main-box-2-1">
                          <div class="row">
                              <div class="col-xs-8">
                                  <?php
                                      $sql="SELECT * FROM manager";
                                      $query = $pdo->prepare($sql);
                                      $query->execute();
                                      $numrow = $query->rowCount();
                                      $numrows = intval($numrow);
                                  ?>
                                  <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

                                  <h3 class="box-head">Managers</h3>
                              </div>
                              <div class="col-xs-4">
                                  <i class="fa fa-user-secret fa-5x box-icon" aria-hidden="true"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-12  main-box-2-2">
                          <div class="more-info">
                              <a href="managers.php" style="color:#FFFFFF;">More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        <hr style="border-bottom:1px solid #e3e3e3;">
        <!---end top boxes--->

            <hr style="border-bottom:1px solid #e3e3e3;">
            <div class="row padding-row">
                    <div class="alert alert-info">Number of employees in a department</div>

                    <?php
                    //display no of employees belongs to a particular department
                    $sql="SELECT * from department where currentStatus=:approve ";
                    $query = $pdo->prepare($sql);
                    $query->execute(array('approve'=>"approved"));
                    $dept = $query->fetchAll();
                    $result=array();
                    array_push($result, ['Department', 'Attendance','Absentees']);
                    foreach ($dept as $rs){
                        $data=array();
                        array_push($data,$rs['dept_name'],$rs['no_of_emp'],$rs['no_of_emp']+100);
                        array_push($result, $data);
                    }
                    //                 print_r($result);
//                    $rows = $query->rowCount();
//                    $depName=[];
//                    $emps=[];
//                    $i=0;
//                    while ($rows>0) {
//                        $depName[$i]=$result[$rows-1]['dept_name'] . ',';
//                        $emps[$i]=$result[$rows-1]['no_of_emp'] . ',';
//                        $rows=$rows-1;
//                        $i=$i+1;
//                    };
                    ?>
                    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
            </div>


    </div>
    </div>
</div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        var result=JSON.parse('<?php echo json_encode($result)?>');

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

            var data = google.visualization.arrayToDataTable(result);


            var options = {
                chart: {
                    title: 'Company Attendance',
                    subtitle: 'Performance and the attendance in each department: 2016',
                    is3D: true,
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
