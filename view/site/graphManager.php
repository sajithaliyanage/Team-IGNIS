<?php
$var = "graphManager";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin && $empRole!="manager"){
    header('Location:../../index.php');
}

?>
<!---****************************start************************--->
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

          <!-- get the attendance from excel sheet -->
          <?php
              require_once "../../module/PHPExcel/PHPExcel.php";
              try {
                  $tempFile = "testing.xlsx";
                  $objPHPExcel = PHPExcel_IOFactory::load($tempFile);
                  $j=0;

                  $dep=array();
                  $sql="SELECT dept_id from department where currentStatus=:approve";
                  $query = $pdo->prepare($sql);
                  $query->execute(array('approve'=>"approved"));
                  foreach ($query as $r){
                    $dep[$j]=0;
                    $j+=1;
                  }
                  //get employee ids from excel sheet
                  $i=0;
                  $id=array();
                  foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
                      if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1 && $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue()!= null) {
                          $id[$i]= $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue();
                          $i+=1;
                      }
                  }
                  $num=count($id);

                  //get the dates from excel sheet
                  $i=0;
                  $dates=array();
                  foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
                      if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1 && $objPHPExcel->getActiveSheet()->getCell('B'.$row->getRowIndex())->getValue()!= null) {
                          $dates[$i]= $objPHPExcel->getActiveSheet()->getCell('B'.$row->getRowIndex())->getFormattedValue();
                          $i+=1;
                      }
                  }

              }catch(Exception $e){
                  echo $e;
              }
          ?>

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
                                  <center><h3 class="box-head">Today<br> Presents</h3></center>
                            </div>
                          </div>
                      </div>
                  <div class="col-sm-4 col-xs-12" style="background-color:#FFFFFF; height:110px;">
                          <div class="row">
                            <?php
                                $sql="SELECT * FROM employee";
                                $query = $pdo->prepare($sql);
                                $query->execute();
                                $numrow = $query->rowCount();
                                $numrows = intval($numrow);
                                $precetage=($num/($numrows))*100;
                            ?>
                            <center><h2 class="box-count"><?php if($num<10){echo "0".$num;}else{echo $num;}?><br><?php echo round($precetage);?>%</h2></center>
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
                                  <center><h3 class="box-head">Today<br> Absents</h3></center>
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
                            $absent=intval($numrows-$num);
                            $precetage=($absent/($numrows))*100;
                            ?>
                            <center><h2 class="box-count"><?php if($absent<10){echo "0".$absent;}else{echo $absent;}?><br><?php echo round($precetage);?>%</h2></center>
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
                        <!-- filtering option start -->
                        <form role="form" data-toggle="validator" action="../../module/graphGenerator.php" method="post">
                            <div class="department-add">

                                <div class="col-xs-12">
                                  <div class="form-group">
                                      <div class="col-xs-2">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                        <div class="col-xs-3">
                                            <input id="example1" name="start_date" type="text"
                                                   placeholder="Start Date"
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-3">
                                            <input id="example2" name="end_date" type="text"
                                                   placeholder="End Date"
                                                   class="form-control input-md" required>
                                        </div>
                                    </div>

                                    <div class="col-xs-2">
                                      <button class="btn btn-primary btn-lg pull-right submit-button" style="width: 150px " type="submit">Fitler</button>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-xs-2">
                                      </div>
                                  </div>

                                </div>
                            </div>
                        </form>
                      <!-- filtering option end -->
                      <br><br><br><br><br><br>
                      <!---chart start-->
                    <?php
                    //check the department of each employee and count it
                  //   $q=array();
                  //   for ($n=0; $n <$num ; $n++) {
                  //     $sql1="SELECT dept_id from employee where comp_id=:c_id Limit 1 ";
                  //     $query1 = $pdo->prepare($sql1);
                  //     $query1->execute(array('c_id'=>$id[$n]));
                  //     $query1 = $query1->fetch();
                  //     $q[$n]=$query1[0];
                  //   }
                  //   $q=(array_count_values($q));
                  //
                  //
                  // //display absent present belongs to a particular department
                  //   $sql="SELECT dept_name,dept_id,no_of_emp from department where currentStatus=:approve ";
                  //   $query = $pdo->prepare($sql);
                  //   $query->execute(array('approve'=>"approved"));
                  //   $dept = $query->fetchAll(PDO::FETCH_NUM);
                  //   for($i=0;$i<count($dept);$i++)
                  //   {
                  //     $d_id=$dept[$i][1];
                  //     $dept[$i][1] = intval($q[$d_id]);
                  //     $absnt= $dept[$i][2]-$dept[$i][1];
                  //     $dept[$i][2] =intval($absnt);
                  //   }
                  //
                  //  array_unshift($dept, array('Department', 'Present','Absent'));
                  //  //print_r($dept);

                  ?>
                  <?php include("../../module/graphGenerator.php") ?>
            </div>
          </div>
        </div>
      </div>


    </div>
    </div>
</div>


    <script src="../admin/js/jquery.js"></script>
    <script src="../admin/js/bootstrap.js"></script>
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

</body>
</html>
