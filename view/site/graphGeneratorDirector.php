<?php
  error_reporting(0);
  include('../../controller/siteController.php');
  include('../../config/connect.php');
  $pdo = connect();

  if(!$isLoggedin && $empRole!="director"){
      header('Location:../../index.php');
  }

//get post request data from generate graph
  $departmnt =$_POST['dept_name'];
  $sDate =$_POST['start_date'];
  $eDate = $_POST['end_date'];
  $sDate=str_replace('/', '-', $sDate);
  $startDate=date("Y-m-d", strtotime($sDate) );
  $eDate=str_replace('/', '-', $eDate);
  $endDate=date("Y-m-d", strtotime($eDate) );
  $d1=strtotime($startDate);
  $d2=strtotime($endDate);
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
    <link rel="stylesheet" href="../../public/css/datepicker.css">
    <link rel="stylesheet" href="../../public/css/attendance.css">


</head>

<body style=" background-color: #eceff4 !important;">
<!---top nav bar--->
<?php include("../layouts/navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">
        <!--left nav bar--->
        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
          <div class="row padding-row">
            <!--show the navigated pages start-->
              <div class="row">
                  <div class="col-lg-12">
                      <ol class="breadcrumb breadcrumb-style">
                          <li>
                              <i class="fa fa-dashboard"></i> <a href="director.php">Take Your Leave</a>
                          </li>
                          <li class="active">
                              <i class="fa fa-bar-chart"></i> Overoll Attendance Analyse
                          </li>
                      </ol>
                  </div>
              </div>
              <!--show the navigated pages end-->
          </div>

<?php
    //<!-- get the attendance from excel sheet -->

      try{
        require_once "../../module/PHPExcel/PHPExcel.php";
        $tempFile = "testing.xlsx";
        $objPHPExcel = PHPExcel_IOFactory::load($tempFile);

        //get employee ids from excel sheet
        $i=0;
        $id=array();
        foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
            if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1 && $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue()!= null) {
                $id[$i]= $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue();
                $i+=1;
            }
        }
        $n=count($id);
        $num1=count($id);

        //get the dates from excel sheet
        $i=0;
        $dates=array();
        foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
            if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1 && $objPHPExcel->getActiveSheet()->getCell('B'.$row->getRowIndex())->getValue()!= null) {
                $dates[$i]= $objPHPExcel->getActiveSheet()->getCell('B'.$row->getRowIndex())->getFormattedValue();
                $i+=1;
            }
        }
        //print_r($dates);
        }catch(Exception $e){
          echo $e;
        }
?>
        <!---start top boxes--->
        <div class="row padding-row">
          <div class="col-sm-1 col-xs-12 padding-box">
              <div class="row">
              </div>
          </div>

            <div class="col-sm-4 col-xs-12 padding-box">
                <div class="row">
                      <div class="col-xs-12 main-box-1-1">
                          <div class="row">
                              <div class="col-xs-8">
                                <?php
                                    $sql="SELECT * FROM employee";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();
                                    $numrow = $query->rowCount();
                                    $numrows = intval($numrow);
                                    $precetage=($n/($numrows))*100;
                                ?>
                                <right><h1 class="box-count"  style="font-size:45px;"><?php if($n<10){echo "0".$n;}else{echo $n;}?></h1></right>
                                <h3 class="box-head" style="margin-top:-2px;">Today Presents</h3>
                              </div>
                              <div class="col-xs-4">
                                  <i class="fa fa-group fa-5x box-icon" aria-hidden="true"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-12  main-box-1-2" style="color:#FFFFFF;margin-top:-3px;">
                           <center><h5>Precentage -<?php echo round($precetage);?>%</h5></center>
                      </div>
                  </div>
            </div>

          <div class="col-sm-2 col-xs-12 padding-box">
              <div class="row">
              </div>
          </div>
          <div class="col-sm-4 col-xs-12 padding-box">
              <div class="row">
                    <div class="col-xs-12 main-box-4-1">
                        <div class="row">
                            <div class="col-xs-8">
                              <?php
                                $sql="SELECT * FROM employee";
                                $query = $pdo->prepare($sql);
                                $query->execute();
                                $numrow = $query->rowCount();
                                $numrows = intval($numrow);
                                $absent=intval($numrows-$n);
                                $precetage=($absent/($numrows))*100;
                              ?>
                              <right><h1 class="box-count" style="font-size:45px;"><?php if($absent<10){echo "0".$absent;}else{echo $absent;} ?></h1></right>
                              <h3 class="box-head" style="margin-top:-2px;">Today Absents</h3>
                            </div>
                            <div class="col-xs-4">
                                <i class="fa fa-group fa-5x box-icon" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12  main-box-4-2" style="color:#FFFFFF;margin-top:-3px;">
                         <center><h5>Precentage -<?php echo round($precetage);?>%</h5></center>
                    </div>
                </div>
          </div>
          <div class="col-sm-1 col-xs-12 padding-box">
              <div class="row">
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
                          Department Wise Attendance Analysis</h5>
                      <hr>


  <?php
        //take the dates within the range
        $drange=array();
        $empid=array();
        for($i=0,$j=0; $i<$num1; $i++){
          $d=strtotime($dates[$i]);
          if(($d >= $d1) && ($d2 >= $d)){
            $drange[$j]=$dates[$i];
            $empid[$j]=$id[$i];
            $j=$j+1;
          }
        }
        $num=count($drange);
        //take the employee count belongs to the department
            $emp=array();
            $dte=array();
            for($i=0,$j=0; $i<$num; $i++){
              $sql2="SELECT dept_id from employee where comp_id=:empID ";
              $query2 = $pdo->prepare($sql2);
              $query2->execute(array('empID'=> $empid[$i]));
              $query2 = $query2->fetch();
              if($departmnt==$query2[0]){
                $emp[$j]=$empid[$i];
                $dte[$j]=$drange[$i];
                $j=$j+1;
              }
            }

            $dCount=(array_count_values($dte));

            //take employee count in that department
            $sql="SELECT no_of_emp from department where dept_id=:dID ";
            $query = $pdo->prepare($sql);
            $query->execute(array('dID'=>$departmnt));
            $query = $query->fetchAll();

            //display absent present belongs to a the department
            $dept=array();
            for($i=0,$j=0;$i<$num1;$i++)
            {
              $dept[$j][0]=$dates[$i];
              if($dates[$i]==$dte[$j]){
                $d_dte=$dates[$i];
                $dept[$j][1] = intval($dCount[$d_dte]);
                $absnt= intval($query[0][0])-$dept[$j][1];
                $dept[$j][2] =intval($absnt);
                $j=$j+1;
              }
              else{
                $dept[$j][1] = 0;
                $absnt= intval($query[0][0])-$dept[$j][1];
                $dept[$j][2] =intval($absnt);
              }


            }

            array_unshift($dept, array('Date', 'Present','Absent'));
            //print_r($dept);
          ?>
              <center><div id="columnchart_material" style="width: 900px; height: 500px;"></div></center>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    var result=JSON.parse('<?php echo json_encode($dept)?>');

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    var currentdate = new Date();
    var datetime = currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear();

    function drawChart() {

        var data = google.visualization.arrayToDataTable(result);
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

<script src="../../view/admin/js/jquery.js"></script>
<script src="../../view/admin/js/bootstrap.js"></script>
<script src="../../public/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {

        $('#example1').datepicker({
            format: "dd/mm/yyyy"
        });
        $('#example2').datepicker({
            format: "dd/mm/yyyy"
        });

    });
</script>
<script type="application/javascript" src="../layouts/awesomechart.js"> </script>
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
