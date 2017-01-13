<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

try {
    $sql = "SELECT comp_id FROM employee";
    $query = $pdo->prepare($sql);
    $query->execute();
    $compIds = $query->fetchAll();
    //print_r(count($compIds));

    foreach ($compIds as $cid) {
        //select job_cat_id and level_id
        $comp_id = $cid['comp_id'];
        $sql = "SELECT job_cat_id,level_id FROM employee where comp_id='$comp_id'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $job_id = $result['job_cat_id'];
        $level_id = $result['level_id'];

        //select set_id
        $sql = "SELECT set_id FROM leave_set_job where job_cat_id=:log and level_id=:log2";
        $query = $pdo->prepare($sql);
        $query->execute(array('log' => $job_id, 'log2' => $level_id));
        $result = $query->fetch();
        $set_id = $result['set_id'];

        //select leave_id and it count
        $sql = "SELECT leave_id,leave_count FROM leave_count_details where set_id=:log";
        $query = $pdo->prepare($sql);
        $query->execute(array('log' => $set_id));
        $result = $query->fetchAll();
        $numRows = $query->rowCount();
        //print_r($result);
        $count = 0;
        $sql2 = "";
        while ($numRows > 0) {
            global $count;
            $leaveID = $result[$count]['leave_id'];
            $lcount = $result[$count]['leave_count'];
            //echo $leaveID."--";
            //echo $lcount."&&";
            $sql2 .= "UPDATE employee_leave_count SET leave_count='$lcount' WHERE leave_id='$leaveID' AND comp_id='$comp_id'; ";
            $numRows--;
            $count++;
        }

        //echo $sql2;
        //echo "Count id - ".$count;
        $query = $pdo->prepare($sql2);
        $query->execute();

    }
    header("Location:../settings.php?reset=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}