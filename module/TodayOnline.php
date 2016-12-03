<?php
require_once "PHPExcel/PHPExcel.php";
include('../config/connect.php');
$pdo = connect();

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
    $num=count($id);

    $result0 = array();


    for ($j =0;$j<$num;$j++){


        $sql0 = "SELECT name  FROM employee WHERE comp_id ='$id[$j]'";
        $query0 = $pdo->prepare($sql0);
        $query0->execute();
        $result0[$j] = $query0->fetch();
        print_r($result0[$j]["name"]);



    }

}catch(Exception $e){

    echo $e;

}

?>
