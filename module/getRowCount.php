<?php


require_once "PHPExcel/PHPExcel.php";


$objPHPExcel1 = PHPExcel_IOFactory::load("../../view/site/testing.xlsx");




echo "Employee count of the day : ".$objPHPExcel1->getActiveSheet()->getHighestRow()-1;//column name row need to remove so... -1