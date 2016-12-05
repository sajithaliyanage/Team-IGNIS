<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

//shift post request
$shift_date= $_POST['shift_date'];
$shift_time = $_POST['shift_my_time'];
$shift_group = $_POST['shift_group'];
$shifter = $_POST['employeeDetails'];
$rework_date = $_POST['rework_date'];
$shifter_time = $_POST['shift_his_time'];
$reason = $_POST['reason'];

$flag=1;
if(empty($shift_date)){
    $flag=0;
}else if(empty($shift_time)){
    $flag=0;
}else if(empty($shift_group)){
    $flag=0;
}else if(empty($shifter)){
    $flag=0;
}else if(empty($rework_date)){
    $flag=0;
}else if(empty($shifter_time)){
    $flag=0;
}else if(empty($reason)){
    $flag=0;
}else if($shift_time=="Holiday"){
    $flag=0;
}else if($shifter_time=="Holiday"){
    $flag=0;
}

if($flag==1){
    //put database
    $sql="INSERT INTO shifting(shiftingForDate,shitingForSession,replace_emp_id,recovery_date,recovery_time,reason,emp_id,status,changingGroup) VALUES
    (:shiftDate,:shiftTime,:shifter,:reworkDate,:reworkTime,:reason,:comp_id,:status,:shift_group)";
    $query = $pdo->prepare($sql);
    $query->execute(array('shiftDate'=>$shift_date,'shiftTime'=>$shift_time,'shifter'=>$shifter,'reworkDate'=>$rework_date,'reworkTime'=>$shifter_time,'reason'=>$reason,'comp_id'=>$empID,'status'=>"waiting",'shift_group'=>"$shift_group"));


    header("Location:../view/site/roster.php?requested");
}else{
    header("Location:../view/site/roster.php?error");
}


?>