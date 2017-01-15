<?php
require_once "../../module/PHPExcel/PHPExcel.php";

try {
    $tempFile = "testing.xlsx";
    $objPHPExcel = PHPExcel_IOFactory::load($tempFile);
    /*$autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
    $columnFilter = $autoFilter->getColumn('A');

    $columnFilter->setFilterType(
        PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER
    );*/
    foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1) {

            echo $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue(), "<br>";



        }
    }
}catch(Exception $e){
    echo $e;
}

?>
