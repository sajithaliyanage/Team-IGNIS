<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

if(isset($_GET['sdate'])){
    $dates = str_replace('/','-',$_GET['edate']);
    $newDate = date("Y-m-d", strtotime($dates));

    $dates = str_replace('/','-',$_GET['sdate']);
    $newDates = date("Y-m-d", strtotime($dates));

    $startDate = DateTime::createFromFormat('d/m/Y',$_GET['sdate']);
    $endDate = DateTime::createFromFormat('d/m/Y',$_GET['edate']);


    $sql = "SELECT * FROM calendar where dept_id =:log AND
    (STR_TO_DATE(start_date,'%Y-%m-%d') BETWEEN STR_TO_DATE('$newDates','%Y-%m-%d') AND STR_TO_DATE('$newDate', '%Y-%m-%d'))";
    $query = $pdo->prepare($sql);
    $query->execute(array('log'=>'@'));
    $numRows = $query->rowCount();

    if($startDate > $endDate){
        echo "Invalid Selection";
    }else if($numRows >0){
        echo "This is a Holiday";
    }else{
        echo $diff = $endDate->diff($startDate)->format("%a");
    }
}

if(isset($_GET['q'])){
    $dates = str_replace('/','-',$_GET['r']);
    $newDate = date("Y-m-d", strtotime($dates));

    $dates = str_replace('/','-',$_GET['q']);
    $newDates = date("Y-m-d", strtotime($dates));

    $sql = "SELECT * FROM calendar where dept_id =:log AND
    (STR_TO_DATE(start_date,'%Y-%m-%d') BETWEEN STR_TO_DATE('$newDate','%Y-%m-%d') AND STR_TO_DATE('$newDates', '%Y-%m-%d'))";
    $query = $pdo->prepare($sql);
    $query->execute(array('log'=>'@'));
    $numRows = $query->rowCount();

    if($numRows >0){
        echo "This is a Holiday";
    }else if($_GET['q'] != ''){
        $startDate = DateTime::createFromFormat('d/m/Y',$_GET['r']);
        $endDate = DateTime::createFromFormat('d/m/Y',$_GET['q']);

        if($startDate > $endDate){
            echo "Invalid Selection";
        }else{
            echo $diff = $endDate->diff($startDate)->format("%a");
        }
    }

}

if(isset($_GET['nopay'])){
    $leave_id = $_GET['nopay'];

    $sql = 'SELECT leave_count FROM employee_leave_count WHERE leave_id=:log AND comp_id=:log2';
    $query = $pdo->prepare($sql);
    $query->execute(array('log'=>$leave_id, 'log2'=>$empID));
    $result = $query->fetch();
    $lcount = intval($result['leave_count']);

    if($lcount == 0){
        echo 'You have no more suffient leaves!';
    }else if($lcount < 0){
        echo 'This is a NO PAY leave';
    }
}

?>
