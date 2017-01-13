<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

if(isset($_GET['sdate'])){
    $startDate = DateTime::createFromFormat('d/m/Y',$_GET['sdate']);
    $endDate = DateTime::createFromFormat('d/m/Y',$_GET['edate']);

    if($startDate > $endDate){
        echo "Invalid Selection";
    }else{
        echo $diff = $endDate->diff($startDate)->format("%a");
    }
}

if(isset($_GET['q'])){
    if($_GET['q'] != ''){
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
