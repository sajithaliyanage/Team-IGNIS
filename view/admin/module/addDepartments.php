<?php
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$deptName = xss_clean($_POST['dept_name']);
$deptColor = xss_clean($_POST['dept_color']);
$rosterStatus = xss_clean($_POST['roster_status']);

$smt = "SELECT dept_name FROM department where dept_name =:log";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>$deptName.' Department'));
$result = $query->fetchAll();
$rownum = $query->rowCount();

$smt1 = "SELECT dept_color FROM department where currentStatus !='rejected' AND dept_color =:log ";
$query1 = $pdo->prepare($smt1);
$query1->execute(array('log'=>$deptColor));
$result1 = $query1->fetchAll();
$rownum1 = $query1->rowCount();

$flag =1;
$flagcolor =1;

if (empty($deptName)) {
	$flag = 0;
}else if(empty($deptColor)){
	$flag = 0;
}else if(empty($rosterStatus)){
	$flag = 0;
}else if($rownum !=0){
	$flag =0;
}else if($rownum1 !=0){
	$flagcolor =0;
}



	try{
		if($flag==1 & $flagcolor==1){
			$sql = "INSERT INTO department (dept_name,dept_color,roster_status,currentStatus) VALUES (:deptName,:deptColor,:rosterStatus,:status)";
    		$query = $pdo->prepare($sql);
    		$query->execute(array('deptName'=>$deptName." Department",'deptColor'=>$deptColor,'rosterStatus'=>$rosterStatus,'status'=>"waiting"));

    		header("Location:../department.php?job=done");

    	}else if($flagcolor==0){
    		header("Location:../department.php?color_error");

    	}else{
			header("Location:../department.php?error");

		}


    }
	catch(PDOException $e){
	    //echo $e;
	    header("Location:../../layouts/error.php");
	}
