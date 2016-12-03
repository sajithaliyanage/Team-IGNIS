<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

$group_idx=array();
$shiftName = array();//shift types
$groupIds=array(); //current groups of department

$smt2 = "SELECT group_id FROM  employee WHERE comp_id=:log3";
$query2 = $pdo->prepare($smt2);
$query2->execute(array('log3' => $empID));
$result2 = $query2->fetch();
$group_logged_id = intval($result2['group_id']);

$smt = "SELECT dept_id FROM employee WHERE comp_id=:log";
$query = $pdo->prepare($smt);
$query->execute(array('log' => $empID));
$result = $query->fetch();

$dep = $result['dept_id'];

$smt = "SELECT * FROM group_detail WHERE dept_id=:log1";
$query = $pdo->prepare($smt);
$query->execute(array('log1' => $dep));
$result = $query->fetchAll();

foreach ($result as $rs) {
    array_push($groupIds, intval($rs['group_id']));
}

$stm1 = "SELECT shift_name FROM shift_type";
$query1 = $pdo->prepare($stm1);
$query1->execute();
$result1 = $query1->fetchAll();

foreach ($result1 as $rs) {
    array_push($shiftName,$rs['shift_name']);

}
array_push($shiftName,'Holiday');

$shiftCount=count($shiftName);
$key=intval(array_search($group_logged_id,$groupIds));//index of current logged group id


if (isset($_GET['q'])) {

    $shift_date = $_GET['q'];
    $today=date("Y/m/d");
    $date2=date_create($shift_date);
    $date1=date_create($today);
    $diff=date_diff($date1,$date2);
    $date_gap=intval($diff->format("%a"));


    $gap_module=$date_gap%$shiftCount;
    //print_r($shiftName);
    $gap_module1=$gap_module+$key;
    if($gap_module1>=$shiftCount){
        $gap_module2=$gap_module1%$shiftCount;
        echo $shiftName[$gap_module2];


    }
    else{
        echo $shiftName[$gap_module1];

    }



}
//$group_id=0;//shifting group id
if (isset($_GET['r'])) {

    $group_id = intval($_GET['r']);
    array_push($group_idx,$group_id);
    if($group_id !=0){
        $stm = "SELECT comp_id,name FROM employee where group_id=:log1";
        $query = $pdo->prepare($stm);
        $query->execute(array('log1'=>$group_id));
        $result = $query->fetchAll();
        $rowNum = $query->rowCount();

        echo "<select name='employeeDetails' class='form-control'>";
        if($rowNum !=0){
            foreach ($result as $rs) {
                echo "<option value='" . $rs['comp_id'] . "'>".$rs['comp_id'] ." - ". $rs['name'] . '</option>';
            }
        }else{
            echo "<option value='empty'>- No Employees -</option>";
        }

        echo "</select>";
    }else{
        echo "<select name='employeeDetails' class='form-control'>";
            echo "<option value='empty'>- Group not selected -</option>";
        echo "</select>";
    }



}

if (isset($_GET['p'])) {

    $shift_date = $_GET['p'];
    $group_id = intval($_GET['gid']);
    $today=date("Y/m/d");
    $date2=date_create($shift_date);
    $date1=date_create($today);
    $diff=date_diff($date1,$date2);
    $date_gap=intval($diff->format("%a"));

    $key1=intval(array_search($group_id,$groupIds));//index of selected group
    //echo $group_id;
    $gap_module=$date_gap%$shiftCount;
    $gap_module1=$gap_module+$key1;
    //print_r($group_idx);


    if($gap_module1>=$shiftCount){
        $gap_module2=$gap_module1%$shiftCount;
        echo $shiftName[$gap_module2];


    }
    else{
        echo $shiftName[$gap_module1];

    }

}


?>
