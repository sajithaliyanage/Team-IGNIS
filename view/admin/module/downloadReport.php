<?php
include('../../../config/mySQLConnection.php');
include('../../../controller/siteController.php');
include('../../../module/fpdf/fpdf.php');

try{
    class PDF extends FPDF{
        function Header()
        {
            if ($this->page == 1){
                // Logo
                $this->Image('../../../public/images/lms-logo.png',100,5,10);
                // Arial bold 15
                $this->SetFont('Arial','B',15);
                // Move to the right
                $this->Cell(80);
                // Title
                $this->Cell(40,20,'Employee Leave Details of '.date('F-2017').'',0,-10,'C');
                // Line break
                $this->Ln(0);
            }

        }
        function BasicTable($header,$data){
            $this->SetFillColor(30,144,255);
            $this->SetDrawColor(0,0,0);
            $w=array(25,55,50,40,25);

            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
            $this->Ln();

            foreach ($data as $eachResult){
                if(intval($eachResult['leave_count'])<0){
                    $val= abs(intval($eachResult['leave_count']));
                } else{
                    $val= 0;
                }
                $this->Cell(25,10,$eachResult["comp_id"],1);
                $this->Cell(55,10,$eachResult["name"],1);
                $this->Cell(50,10,$eachResult["leave_name"],1);
                $this->Cell(40,10,$eachResult["leave_count"],1);
                $this->Cell(25,10,$val,1);
                $this->Ln();
            }
        }
    }

    $pdf=new PDF();
    //$pdf->SetTitle('All Employees of the Company'[, isUTF8]);
    $header=array('Employee ID','Full Name','Leave Type','Remain Leave Count','No Pay Leaves');

    $sqls = "select employee.comp_id,employee.name, leave_type.leave_name,employee_leave_count.leave_count FROM employee_leave_count JOIN
        employee ON employee.comp_id = employee_leave_count.comp_id JOIN leave_type ON leave_type.leave_id = employee_leave_count.leave_id 
        ORDER BY employee_leave_count.comp_id ASC ";
    $results = $conn->query($sqls);
    $resultData = array();

    if($results->num_rows>=1){
        for ($i=0;$i<$results->num_rows;$i++) {
            $result = mysqli_fetch_assoc($results);
            array_push($resultData,$result);
        }

        $pdf->SetFont('Arial','',10);
        $pdf->AddPage();
        $pdf->Ln(35);
        $pdf->BasicTable($header,$resultData);
        $pdf->Output("../../../module/reports/Employee_Leave_Details.pdf","F");
        header("Location:../../../module/reports/Employee_Leave_Details.pdf");
    }else{
        header("Location:../settings.php?empty");
    }

}catch (PDOException $e){
    header("Location:../../../view/layouts/error.php");
}