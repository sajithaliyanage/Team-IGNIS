<?php
require_once "PHPExcel/PHPExcel.php";

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
    foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1) {

            //echo $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue(), "<br>";
            $id[$i]= $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue()."<br>";
            $i+=1;
        }

    }
    $num=count($id);
    print_r($id);
    print_r($num);




}catch(Exception $e){

    echo $e;

}

?>
