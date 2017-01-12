<?php
include('../config/mySQLConnection.php');
include('../controller/siteController.php');
include('../module/fpdf/fpdf.php');
include ('xssValidation.php');

//get post request data from generate form
$reportType = xss_clean($_POST['report_type']);
$startDate = xss_clean($_POST['start_date']);
$endDate = xss_clean($_POST['end_date']);
$fileType = xss_clean($_POST['file_type']);

try{
    if($reportType!="empty" && $fileType !="empty"){
        //download csv files
        if($fileType=="csv"){
            //type1
            if($reportType == "company_emp"){
                $filename = "reports/company_employees.csv";

                $sql = "SELECT employee.comp_id,employee.name,employee.email,department.dept_name,job_category.job_cat_name FROM employee JOIN job_category ON employee.job_cat_id = job_category.job_cat_id JOIN department ON department.dept_id=employee.dept_id";
                $result = $conn->query($sql);

                $num_rows =$result->num_rows;
                if($num_rows >= 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fp = fopen($filename, "w");
                    $seperator = "";
                    $comma = "";

                    foreach ($row as $name => $value) {
                        $seperator .= $comma . '' . str_replace('', '""',$name);
                        $comma = ",";
                    }

                    $seperator .= "\n";
                    fputs($fp, $seperator);

                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $seperator = "";
                        $comma = "";

                        foreach ($row as $name => $value) {
                            $seperator .= $comma . '' . str_replace('', '""', $value);
                            $comma = ",";
                        }

                        $seperator .= "\n";
                        fputs($fp, $seperator);
                    }

                    fclose($fp);

                    header("Location:".$filename."");
                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
            //type2
            }else if($reportType =="dept_details"){
                $filename = "reports/company_departments.csv";

                $sql = "SELECT dept_name,no_of_emp,roster_status FROM department WHERE currentStatus ='approved'";
                $result = $conn->query($sql);

                $num_rows =$result->num_rows;
                if($num_rows >= 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fp = fopen($filename, "w");
                    $seperator = "";
                    $comma = "";

                    foreach ($row as $name => $value) {
                        $seperator .= $comma . '' . str_replace('', '""',$name);
                        $comma = ",";
                    }

                    $seperator .= "\n";
                    fputs($fp, $seperator);

                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $seperator = "";
                        $comma = "";

                        foreach ($row as $name => $value) {
                            $seperator .= $comma . '' . str_replace('', '""', $value);
                            $comma = ",";
                        }

                        $seperator .= "\n";
                        fputs($fp, $seperator);
                    }

                    fclose($fp);

                    header("Location:".$filename."");

                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
                //type3
            }else if($reportType =="own_all"){
                $filename = "reports/myAllLeaveStatus.csv";

                if(!empty($endDate) && !empty($startDate)){
                    $sql = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID' and (STR_TO_DATE(apply_leave.start_date, '%d/%m/%Y') BETWEEN STR_TO_DATE('$startDate','%d/%m/%Y') AND STR_TO_DATE('$endDate', '%d/%m/%Y'))";
                    $result = $conn->query($sql);
                }else{
                    $sql = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID'";
                    $result = $conn->query($sql);
                }

                $num_rows =$result->num_rows;
                if($num_rows >= 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fp = fopen($filename, "w");
                    $seperator = "";
                    $comma = "";

                    foreach ($row as $name => $value) {
                        $seperator .= $comma . '' . str_replace('', '""',$name);
                        $comma = ",";
                    }

                    $seperator .= "\n";
                    fputs($fp, $seperator);

                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $seperator = "";
                        $comma = "";

                        foreach ($row as $name => $value) {
                            $seperator .= $comma . '' . str_replace('', '""', $value);
                            $comma = ",";
                        }

                        $seperator .= "\n";
                        fputs($fp, $seperator);
                    }

                    fclose($fp);

                    header("Location:".$filename."");

                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
                //type 4
            }else if($reportType =="own_approved"){

                $filename = "reports/myApprovedLeaves.csv";

                if(!empty($endDate) && !empty($startDate)){
                    $sql = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID' AND status='approved' and (STR_TO_DATE(apply_leave.start_date, '%d/%m/%Y') BETWEEN STR_TO_DATE('$startDate','%d/%m/%Y') AND STR_TO_DATE('$endDate', '%d/%m/%Y'))";
                    $result = $conn->query($sql);
                }else{
                    $sql = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID' AND status='approved'";
                    $result = $conn->query($sql);
                }

                $num_rows =$result->num_rows;
                if($num_rows >= 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fp = fopen($filename, "w");
                    $seperator = "";
                    $comma = "";

                    foreach ($row as $name => $value) {
                        $seperator .= $comma . '' . str_replace('', '""',$name);
                        $comma = ",";
                    }

                    $seperator .= "\n";
                    fputs($fp, $seperator);

                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $seperator = "";
                        $comma = "";

                        foreach ($row as $name => $value) {
                            $seperator .= $comma . '' . str_replace('', '""', $value);
                            $comma = ",";
                        }

                        $seperator .= "\n";
                        fputs($fp, $seperator);
                    }

                    fclose($fp);

                    header("Location:".$filename."");

                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
                //type 5
            }else if($reportType =="dept_emp"){
                $filename = "reports/departmentEmployee.csv";

                $sqls = "SELECT dept_id FROM employee WHERE comp_id='$empID'";
                $results = $conn->query($sqls);
                while($rows = $results->fetch_assoc()){
                    $departmentID = $rows['dept_id'];
                }

                $sql = "SELECT employee.comp_id,employee.name,employee.email,employee.tel_no,job_category.job_cat_name FROM employee JOIN job_category ON employee.job_cat_id = job_category.job_cat_id WHERE employee.dept_id='$departmentID'";
                $result = $conn->query($sql);

                $num_rows =$result->num_rows;
                if($num_rows >= 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fp = fopen($filename, "w");
                    $seperator = "";
                    $comma = "";

                    foreach ($row as $name => $value) {
                        $seperator .= $comma . '' . str_replace('', '""',$name);
                        $comma = ",";
                    }

                    $seperator .= "\n";
                    fputs($fp, $seperator);

                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $seperator = "";
                        $comma = "";

                        foreach ($row as $name => $value) {
                            $seperator .= $comma . '' . str_replace('', '""', $value);
                            $comma = ",";
                        }

                        $seperator .= "\n";
                        fputs($fp, $seperator);
                    }

                    fclose($fp);

                    header("Location:".$filename."");

                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
            }
            //download pdf files
        }else if($fileType=="pdf") {
            //type1
            if($reportType == "company_emp"){
                class PDF extends FPDF{
                    function Header()
                    {
                        // Logo
                        $this->Image('../public/images/lms-logo.png',100,5,10);
                        // Arial bold 15
                        $this->SetFont('Arial','B',15);
                        // Move to the right
                        $this->Cell(80);
                        // Title
                        $this->Cell(40,20,'All Employees of the Company',0,-10,'C');
                        // Line break
                        $this->Ln(0);
                    }
                    function BasicTable($header,$data){
                        $this->SetFillColor(30,144,255);
                        $this->SetDrawColor(0,0,0);
                        $w=array(10,55,50,40,35);

                        for($i=0;$i<count($header);$i++)
                            $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
                        $this->Ln();

                        foreach ($data as $eachResult){
                            $this->Cell(10,10,$eachResult["comp_id"],1);
                            $this->Cell(55,10,$eachResult["name"],1);
                            $this->Cell(50,10,$eachResult["email"],1);
                            $this->Cell(40,10,$eachResult["dept_name"],1);
                            $this->Cell(35,10,$eachResult["job_cat_name"],1);
                            $this->Ln();
                        }
                    }
                }

                $pdf=new PDF();
                //$pdf->SetTitle('All Employees of the Company'[, isUTF8]);
                $header=array('ID','Employee Name','Employee Email','Department','Job Category');

                $sqls = "SELECT employee.comp_id,employee.name,employee.email,department.dept_name,job_category.job_cat_name FROM employee JOIN job_category ON employee.job_cat_id = job_category.job_cat_id JOIN department ON department.dept_id=employee.dept_id";
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
                    $pdf->Output("reports/company_employees.pdf","F");
                    header("Location:reports/company_employees.pdf");
                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
            //type2
            }else if($reportType == "dept_details"){
                class PDF extends FPDF{
                    function Header()
                    {
                        // Logo
                        $this->Image('../public/images/lms-logo.png',100,5,10);
                        // Arial bold 15
                        $this->SetFont('Arial','B',15);
                        // Move to the right
                        $this->Cell(80);
                        // Title
                        $this->Cell(40,20,'Department Details of the Company',0,-10,'C');
                        // Line break
                        $this->Ln(0);
                    }
                    function BasicTable($header,$data){
                        $this->SetFillColor(30,144,255);
                        $this->SetDrawColor(0,0,0);
                        $w=array(50,50,50);

                        for($i=0;$i<count($header);$i++)
                            $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
                        $this->Ln();

                        foreach ($data as $eachResult){
                            $this->Cell(50,10,$eachResult["dept_name"],1);
                            $this->Cell(50,10,$eachResult["no_of_emp"],1);
                            $this->Cell(50,10,$eachResult["roster_status"],1);
                            $this->Ln();
                        }
                    }
                }

                $pdf=new PDF();
                $header=array('Department Name','Number of Employees','Roster Status');

                $sqls = "SELECT dept_name,no_of_emp,roster_status FROM department WHERE currentStatus ='approved'";
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
                    $pdf->Output("reports/company_departments.pdf","F");
                    header("Location:reports/company_departments.pdf");
                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
                //type3
            } else if($reportType == "own_all"){
                class PDF extends FPDF{
                    function Header()
                    {
                        // Logo
                        $this->Image('../public/images/lms-logo.png',100,5,10);
                        // Arial bold 15
                        $this->SetFont('Arial','B',15);
                        // Move to the right
                        $this->Cell(80);
                        // Title
                        $this->Cell(40,20,'My Leave Report',0,-10,'C');
                        // Line break
                        $this->Ln(0);
                    }
                    function BasicTable($header,$data){
                        $this->SetFillColor(30,144,255);
                        $this->SetDrawColor(0,0,0);
                        $w=array(30,30,35,35,35,30);

                        for($i=0;$i<count($header);$i++)
                            $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
                        $this->Ln();

                        foreach ($data as $eachResult){
                            $this->Cell(30,10,$eachResult["leave_name"],1);
                            $this->Cell(30,10,$eachResult["leave_priority"],1);
                            $this->Cell(35,10,$eachResult["apply_date"],1);
                            $this->Cell(35,10,$eachResult["start_date"],1);
                            $this->Cell(35,10,$eachResult["end_date"],1);
                            $this->Cell(30,10,$eachResult["status"],1);
                            $this->Ln();
                        }
                    }
                }

                $pdf=new PDF();
                $header=array('Leave Type','Leave Priority','Applied Date','Start Date','End Date','Leave Status');

                if(!empty($endDate) && !empty($startDate)){
                    $sqls = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID' and (STR_TO_DATE(apply_leave.start_date, '%d/%m/%Y') BETWEEN STR_TO_DATE('$startDate','%d/%m/%Y') AND STR_TO_DATE('$endDate', '%d/%m/%Y'))";
                    $results = $conn->query($sqls);
                }else{
                    $sqls = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID'";
                    $results = $conn->query($sqls);
                }

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
                    $pdf->Output("reports/myAllLeaveStatus.pdf","F");
                    header("Location:reports/myAllLeaveStatus.pdf");

                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
                //type4
            }else if($reportType == "own_approved"){
                class PDF extends FPDF{
                    function Header()
                    {
                        // Logo
                        $this->Image('../public/images/lms-logo.png',100,5,10);
                        // Arial bold 15
                        $this->SetFont('Arial','B',15);
                        // Move to the right
                        $this->Cell(80);
                        // Title
                        $this->Cell(40,20,'My approved Leaves',0,-10,'C');
                        // Line break
                        $this->Ln(0);
                    }
                    function BasicTable($header,$data){
                        $this->SetFillColor(30,144,255);
                        $this->SetDrawColor(0,0,0);
                        $w=array(30,30,35,35,35,30);

                        for($i=0;$i<count($header);$i++)
                            $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
                        $this->Ln();

                        foreach ($data as $eachResult){
                            $this->Cell(30,10,$eachResult["leave_name"],1);
                            $this->Cell(30,10,$eachResult["leave_priority"],1);
                            $this->Cell(35,10,$eachResult["apply_date"],1);
                            $this->Cell(35,10,$eachResult["start_date"],1);
                            $this->Cell(35,10,$eachResult["end_date"],1);
                            $this->Cell(30,10,$eachResult["status"],1);
                            $this->Ln();
                        }
                    }
                }

                $pdf=new PDF();
                $header=array('Leave Type','Leave Priority','Applied Date','Start Date','End Date','Leave Status');

                if(!empty($endDate) && !empty($startDate)){
                    $sqls = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID' AND status='approved' and (STR_TO_DATE(apply_leave.start_date, '%d/%m/%Y') BETWEEN STR_TO_DATE('$startDate','%d/%m/%Y') AND STR_TO_DATE('$endDate', '%d/%m/%Y'))";
                    $results = $conn->query($sqls);
                }else{
                    $sqls = "SELECT leave_type.leave_name,apply_leave.leave_priority,apply_leave.apply_date,apply_leave.start_date,apply_leave.end_date,apply_leave.status FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id='$empID' AND status='approved'";
                    $results = $conn->query($sqls);
                }

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
                    $pdf->Output("reports/myApprovedLeaves.pdf","F");
                    header("Location:reports/myApprovedLeaves.pdf");

                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
                //type5
            }else if($reportType == "dept_emp"){
                class PDF extends FPDF{
                    function Header()
                    {
                        // Logo
                        $this->Image('../public/images/lms-logo.png',100,5,10);
                        // Arial bold 15
                        $this->SetFont('Arial','B',15);
                        // Move to the right
                        $this->Cell(80);
                        // Title
                        $this->Cell(40,20,'All Employees of the Department',0,-10,'C');
                        // Line break
                        $this->Ln(0);
                    }
                    function BasicTable($header,$data){
                        $this->SetFillColor(30,144,255);
                        $this->SetDrawColor(0,0,0);
                        $w=array(10,50,50,35,30);

                        for($i=0;$i<count($header);$i++)
                            $this->Cell($w[$i],12,$header[$i],1,0,'C',true);
                        $this->Ln();

                        foreach ($data as $eachResult){
                            $this->Cell(10,10,$eachResult["comp_id"],1);
                            $this->Cell(50,10,$eachResult["name"],1);
                            $this->Cell(50,10,$eachResult["email"],1);
                            $this->Cell(35,10,$eachResult["tel_no"],1);
                            $this->Cell(30,10,$eachResult["job_cat_name"],1);
                            $this->Ln();
                        }
                    }
                }

                $pdf=new PDF();
                $header=array('ID','Employee Name','Employee Email','Employee Telephone','Job Category');

                $sqls = "SELECT dept_id FROM employee WHERE comp_id='$empID'";
                $results = $conn->query($sqls);
                while($rows = $results->fetch_assoc()){
                    $departmentID = $rows['dept_id'];
                }

                $sqls = "SELECT employee.comp_id,employee.name,employee.email,employee.tel_no,job_category.job_cat_name FROM employee JOIN job_category ON employee.job_cat_id = job_category.job_cat_id WHERE employee.dept_id='$departmentID'";
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
                    $pdf->Output("reports/departmentEmployee.pdf","F");
                    header("Location:reports/departmentEmployee.pdf");
                }else{
                    header("Location:../view/site/generateReport.php?empty");
                }
            }
        }
    }else{
        if($reportType=="empty" && $fileType !="empty"){
            header("Location:../view/site/generateReport.php?type");
        }else if($fileType =="empty" && $reportType!="empty"){
            header("Location:../view/site/generateReport.php?file");
        }else{
            header("Location:../view/site/generateReport.php?both");
        }

    }

}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}