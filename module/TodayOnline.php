<?php
require_once "PHPExcel/PHPExcel.php";
include('../config/connect.php');
$pdo = connect();

try {
    $tempFile = "../view/site/testing.xlsx";
    $objPHPExcel = PHPExcel_IOFactory::load($tempFile);
    /*$autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
    $columnFilter = $autoFilter->getColumn('A');

    $columnFilter->setFilterType(
        PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER
    );*/
    $i=0;
    $id=array();
    $name=array();
    foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1) {

            //echo $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue(), "<br>";
            $id[$i]= $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue();
            $i+=1;
        }

    }
    $num=count($id);
   // print_r($id);
   // print_r($num);
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
