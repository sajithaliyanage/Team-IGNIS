<?php

    require_once "../../controller/PHPExcel/PHPExcel.php";


$objPHPExcel1 = PHPExcel_IOFactory::load("new.xlsx");
$objPHPExcel2 = PHPExcel_IOFactory::load("testing.xlsx");

$objPHPExcel2->getActiveSheet()->removeRow(1,1);
$objPHPExcel1->getActiveSheet()->fromArray(
    $objPHPExcel2->getActiveSheet()->toArray(),
    null,
    'A' . ($objPHPExcel1->getActiveSheet()->getHighestRow() + 1)
);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel1, 'Excel2007');
$objWriter->save('new.xlsx');


    $tempFile = "new.xlsx";



    $excelReader = PHPExcel_IOFactory::createReaderForFile($tempFile);
    $excelObject = $excelReader->load($tempFile);
    $worksheet   = $excelObject->getActiveSheet();
    $lastRow     = $worksheet->getHighestRow();







    for($row=$lastRow;$row>=$lastRow-10;$row--){

        echo"<tr><td>";
        echo $worksheet->getCell('A'.$row)->getValue();
        echo "</td><td>";

        echo $worksheet->getCell('B'.$row)->getValue();

        echo "</td><td>";
        echo $worksheet->getCell('C'.$row)->getValue();
        echo "</td><td>";
        echo $worksheet->getCell('D'.$row)->getValue();
        echo "</td><td>";
        echo $worksheet->getCell('E'.$row)->getValue();
        echo "</td></tr>";




    }





?>