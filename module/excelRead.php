<?php

    require_once "../module/PHPExcel/PHPExcel.php";


$objPHPExcel1 = PHPExcel_IOFactory::load("../view/site/new.xlsx");
$objPHPExcel2 = PHPExcel_IOFactory::load("../view/site/testing.xlsx");

$objPHPExcel2->getActiveSheet()->removeRow(1,1);
$objPHPExcel1->getActiveSheet()->fromArray(
    $objPHPExcel2->getActiveSheet()->toArray(),
    null,
    'A' . ($objPHPExcel1->getActiveSheet()->getHighestRow() + 1)
);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel1, 'Excel2007');
$objWriter->save('../view/site/new.xlsx');


echo "Success";


















?>