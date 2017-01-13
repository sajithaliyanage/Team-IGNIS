<?php
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

//get post request data from generate graph

$sDate =$_POST['start_date'];
$eDate = $_POST['end_date'];
$sDate=str_replace('/', '-', $sDate);
$startDate=date("Y-m-d", strtotime($sDate) );
$eDate=str_replace('/', '-', $eDate);
$endDate=date("Y-m-d", strtotime($eDate) );
$d1=strtotime($startDate);
$d2=strtotime($endDate);


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

        $drange=array();
        for($i=0,$j=0; $i<$num; $i++){
          $d=strtotime($dates[$i]);
          if(($d >= $d1) && ($d2 >= $d)){
            $drange[$j]=$dates[$i];
            $j=$j+1;
          }
        }
        $num=count($drange);
        $q=(array_count_values($drange));
        print_r ($q);
        //print_r($drange);
      ?>

        <?php
            //check the department of the manager
            $sql1="SELECT dept_id from employee where comp_id=:empID ";
            $query1 = $pdo->prepare($sql1);
            $query1->execute(array('empID'=> $empID));
            $query1 = $query1->fetch();
            print_r ($query1);


              //display absent present belongs to a particular department
                $sql="SELECT dept_name,dept_id,no_of_emp from department where currentStatus=:approve ";
                $query = $pdo->prepare($sql);
                $query->execute(array('approve'=>"approved"));
                $dept = $query->fetchAll(PDO::FETCH_NUM);
                for($i=0;$i<count($dept);$i++)
                {
                  $d_id=$dept[$i][1];
                  $dept[$i][1] = intval($q[$d_id]);
                  $absnt= $dept[$i][2]-$dept[$i][1];
                  $dept[$i][2] =intval($absnt);
                }

               array_unshift($dept, array('Department', 'Present','Absent'));
               //print_r($dept);
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

<script src="../view/admin/js/jquery.js"></script>
<script src="../view/admin/js/bootstrap.js"></script>
<script src="../public/js/bootstrap-datepicker.js"></script>
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
<script type="application/javascript" src="../view/layouts/awesomechart.js"> </script>

</body>
</html>
