<?php
require_once "PHPExcel/PHPExcel.php";
try{
$empID = $_SESSION["empID"];
$tempFile = "new.xlsx";
$objPHPExcel = PHPExcel_IOFactory::load($tempFile);

$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());

$autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
$columnFilter = $autoFilter->getColumn('A');

$columnFilter->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER);
$columnFilter->createRule()->setRule(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL,$empID);

$autoFilter = $objPHPExcel->getActiveSheet()->getAutoFilter();
$autoFilter->showHideRows();

foreach($objPHPExcel->getActiveSheet()->getRowIterator() as $row){

    if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex()!=1) {

        echo"<tr><td>";

        echo $objPHPExcel->getActiveSheet()->getCell(
            'B'.$row->getRowIndex()
        )->getValue(), ' ';
        echo "</td><td>";
        echo $objPHPExcel->getActiveSheet()->getCell(
            'C'.$row->getRowIndex()
        )->getValue(), ' ';
        echo "</td><td>";

        echo $objPHPExcel->getActiveSheet()->getCell(
            'D'.($row->getRowIndex())
        )->getFormattedValue(), ' ';
        echo "</td><td>";
        echo $objPHPExcel->getActiveSheet()->getCell(
            'E'.($row->getRowIndex())
        )->getFormattedValue(), ' ';
        echo "</td><td>";

        echo $objPHPExcel->getActiveSheet()->getCell(
            'F'.($row->getRowIndex())
        )->getFormattedValue(), ' ';
        echo "</td></tr>";


    }




}}catch(Exception $e){}
?>