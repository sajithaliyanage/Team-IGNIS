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
              <div class="col-sm-5 col-xs-12 padding-box">
                  <div class="row">
                      <div class="col-xs-8 main-box-1-1">
                          <div class="row">
                            <div class="col-xs-4">
                                  <i class="fa fa-group fa-5x box-icon" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8">
                                  <center><h3 class="box-head">Today<br> Prensents</h3></center>
                            </div>
                          </div>
                      </div>
                  <div class="col-xs-4" style="background-color:#FFFFFF; height:110px;">
                          <div class="row">
                            <?php
                                $sql="SELECT * FROM employee";
                                $query = $pdo->prepare($sql);
                                $query->execute();
                                $numrow = $query->rowCount();
                                $numrows = intval($numrow)+100;
                            ?>
                            <center><h2 class="box-count"><?php if($numrows<10){echo "0".$numrows;}else{echo $numrows;}?><br>94%</h2></center>
                          </div>
                  </div>
              </div>
            </div>
              <div class="col-sm-2 col-xs-12 padding-box">
                  <div class="row">
                  </div>
              </div>

              <div class="col-sm-5 col-xs-12 padding-box">
                  <div class="row">
                      <div class="col-sm-8 col-xs-12 main-box-4-1">
                          <div class="row">
                            <div class="col-xs-4">
                                  <i class="fa fa-eye fa-5x box-icon" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8">
                                  <center><h3 class="box-head">Today<br> Absentees</h3></center>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-xs-12" style="background-color:#ffffff; height:110px;">
                          <div class="raw">
                            <?php
                            $sql="SELECT * FROM employee";
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $numrow = $query->rowCount();
                            $numrows = intval($numrow);
                            ?>
                            <center><h2 class="box-count"><?php if($numrows<10){echo "0".$numrows;}else{echo $numrows;}?><br>06%</h2></center>
                          </div>
              </div>
          </div>
        </div>
      </div>
      <br><br>
        <!---end top boxes--->
      <div class="row padding-row"  >
          <div class="col-sm-12 col-xs-12 padding-row">
              <div class="row">
                  <div class="col-xs-12 nortification-box-top">
                      <h5 class="nortification-box-heading"><i class="fa fa-bar-chart icon-margin-right" aria-hidden="true"></i>
                            Overall Attendance Analysis</h5>
                        <hr>

                    <?php
                    //display no of employees belongs to a particular department
                    $sql="SELECT * from department where currentStatus=:approve  ORDER BY dept_id";
                    $query = $pdo->prepare($sql);
                    $query->execute(array('approve'=>"approved"));
                    $dept = $query->fetchAll();
                    $result=array();
                    array_push($result, ['Department', 'Attendance','Absentees']);
                    foreach ($dept as $rs){
                        $data=array();
                        array_push($data,$rs['dept_name'],$rs['dept_id'],$rs['no_of_emp']);
                        array_push($result, $data);
                    }
                      //print_r($result);
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
                    <center><div id="columnchart_material" style="width: 900px; height: 500px;"></div></center>
            </div>
          </div>
        </div>
      </div>


    </div>
    </div>
</div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        var result=JSON.parse('<?php echo json_encode($result)?>');

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        var currentdate = new Date();
        var datetime = currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear();

        function drawChart() {

            var data = google.visualization.arrayToDataTable(result);
            // var data = google.visualization.arrayToDataTable([
            //   ['Year', 'Attendance', 'Absentees'],
            //   ['2014', 1000, 4],
            //   ['2015', 1170, 4],
            //   ['2016', 660, 1],
            //   ['2017', 1030, 0]
            // ]);

            // var options = {
            //   width: 900,
            //   height: 500,
            //   isStacked:'percent',
            //   legend: {position: 'top',maxLines:3},
            //   vAxis:{
            //     minValue:0,
            //     ticks:[0, .2, .4, .6, .8, 1]
            //   }
            var options = {
            chart: {
            // title: 'Overoll Company Attendance',
            subtitle: 'Attendance in each department:'+datetime,
            }
        };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, options);
        }
    </script>

    <script src="../admin/js/jquery.js"></script>
    <script src="../admin/js/bootstrap.js"></script>
    <!-- <script src="../layouts/graph.js" type="text/javascript"></script> -->
    <script type="application/javascript" src="../layouts/awesomechart.js"> </script>

</body>
</html>
