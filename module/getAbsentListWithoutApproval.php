<?php



require_once "PHPExcel/PHPExcel.php";
include('../config/connect.php');
$pdo = connect();
$pdo2 = connect();
$pdo3 = connect();

try {
    $tempFile = "../view/site/testing.xlsx";
    $objPHPExcel = PHPExcel_IOFactory::load($tempFile);

    $i=0;
    $id=array();
    $name=array();
    foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1) {
            $id[$i]= $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue();
            $i+=1;
        }

    }
   // $num=count($id);

  //  $result0 = array();


   /* for ($j =0;$j<$num;$j++){


        $sql0 = "SELECT name  FROM employee WHERE comp_id ='$id[$j]'";
        $query0 = $pdo->prepare($sql0);
        $query0->execute();
        $result0[$j] = $query0->fetch();
        //print_r($result0[$j]["name"]);



    }*/
    $result3    = array();
    //$absent = array();
    $sql2 = "SELECT comp_id FROM employee";
    $query2 = $pdo->prepare($sql2);
    $query2->execute();



    $result3 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $arraysize = count($result3);
    $allIdArray = array();
    for($m=0 ;$m<$arraysize;$m++){

       $allIdArray[$m] = $result3[$m]["comp_id"];

    }



     $exclude = array_diff($allIdArray,$id);

    print_r($allIdArray);

    echo "<br>";
    echo "<br>";
    echo "<br>";

    print_r($exclude);


//selecting persons absent today without any leave approval

    $result4    = array();

    $sql3 = "SELECT comp_id  FROM apply_leave WHERE CURDATE() BETWEEN STR_TO_DATE( start_date,  '%d/%m/%Y' ) AND STR_TO_DATE(end_date,'%d/%m/%Y') AND status = 'approved'";
    $query3 = $pdo->prepare($sql3);
    $query3->execute();



    $result4 = $query3->fetchAll(PDO::FETCH_ASSOC);

    echo "<br>";
    echo "<br>";
    echo "<br>";

    $arraysize2 = count($result4);

    echo "<br>";
    echo "<br>";


    $approvedLeaveCompId = array();
    for($m=0 ;$m<$arraysize2;$m++){

        $approvedLeaveCompId[$m] = $result4[$m]["comp_id"];

    }


    $personsWithoutApprovedLeave = array_diff($exclude,$approvedLeaveCompId);


    echo "<br>";
    echo "<br>";
    echo "<br>";
    print_r($approvedLeaveCompId);

    echo "<br>";
    echo "<br>";
    echo "<br>";



    print_r($personsWithoutApprovedLeave);

    $size = count($personsWithoutApprovedLeave);
    $date = date('d/m/Y');




    $personsWithoutApprovedLeave = array_values($personsWithoutApprovedLeave); // re indexing the array

    for($k=0;$k<$size;$k++){


        $sql4 = "INSERT IGNORE INTO unauthorized_leave(comp_id,absent_date) VALUES('$personsWithoutApprovedLeave[$k]','$date')";

        $pdo->exec($sql4);
    }







}catch(Exception $e){

    echo $e;

}

?>








