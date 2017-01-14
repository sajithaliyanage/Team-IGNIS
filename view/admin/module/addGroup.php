<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$deptID = xss_clean($_POST['groups']);
$groupName = xss_clean($_POST['group_name']);

$smt = "SELECT group_name FROM group_detail where group_name =:log";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>$groupName));
$result = $query->fetchAll();
$rownum = $query->rowCount();

$flag=1;

if(empty($deptID)){
    $flag=0;
}else if(empty($groupName)) {
    $flag = 0;
}else if($rownum!=0){
    $flag = 0;
}


try {
    if($flag==1) {
//    create new group for roster department
        $sql = "INSERT INTO group_detail(dept_id,group_name) VALUES (:depID,:groupName)";
        $query = $pdo->prepare($sql);
        $query->execute(array('depID' => $deptID, 'groupName' => $groupName));

        header("Location:../roster.php?group=done");
    }else{
        header("Location:../roster.php?error");

    }

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}