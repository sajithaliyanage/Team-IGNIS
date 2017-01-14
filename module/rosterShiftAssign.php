<?php
include_once "../config/connect.php";
include_once "../controller/siteController.php";
$pdo = connect();

function  shift_assigning(){
    global $pdo;
    global $empID;
    $smt = "SELECT dept_id FROM employee WHERE comp_id=:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log' => $empID));
    $result = $query->fetch();
    $deptId = $result['dept_id'];

    $smt = "select shift_id,group_id from group_detail where dept_id=:id";
    $query = $pdo->prepare($smt);
    $query->execute(array('id' => $deptId));
    $results = $query->fetchAll();
    $rowCount = intval($query->rowCount());
    //print_r($results);
    $flag = 1;

    foreach ($results as $rs){
        if($rs['shift_id'] == -1){
            $flag = 0;
            break;
        }
    }



    if($flag == 0){
        $expo = array();
        $expos = array();

        $smt = "select shift_id from shift_type";
        $query = $pdo->prepare($smt);
        $query->execute();
        $result = $query->fetchAll();

        $dates = date('d-m-Y');
        $smt = "update group_detail set today='$dates'";
        $query = $pdo->prepare($smt);
        $query->execute();


        foreach($results as $rs){
            array_push($expo,$rs['group_id']);
        }
        foreach($result as $rs){
            array_push($expos,$rs['shift_id']);
        }
        array_push($expos,0);
        //print_r($expos);

        $sql2 = "";
        $count = 0;
        while($rowCount>0){
            $val = $expos[$count];
            $gId = $expo[$count];
            $sql2 .= "UPDATE group_detail set shift_id = $val where group_id= $gId;";
            $count ++;
            $rowCount --;
        }
        $stat = trim($sql2, ";");
        //echo $stat;
        $query2 = $pdo->prepare($stat);
        $query2->execute();

    }

    $smt = "select today from group_detail";
    $query = $pdo->prepare($smt);
    $query->execute();
    $result = $query->fetchAll();

    $currentDate = strtotime($result[0]['today']);
    $today = date('d-m-Y');
    $todayI = strtotime(date('d-m-Y'));
    //$todayI = strtotime('15-01-2017');

    if($currentDate<$todayI){

        $smt = "select shift_id from group_detail where dept_id =:id";
        $query = $pdo->prepare($smt);
        $query->execute(array('id'=>$deptId));
        $shiftIDs = $query->fetchAll();

        $shifts = array();
        foreach ($shiftIDs as $rs){
            array_push($shifts,$rs['shift_id']);
        }
        $max = max($shifts);

        $smt = "select shift_id,group_id from group_detail where dept_id=:id";
        $query = $pdo->prepare($smt);
        $query->execute(array('id' => $deptId));
        $results = $query->fetchAll();


        $expo = array();

        foreach($results as $rs){
            array_push($expo,$rs['group_id']);
        }

        $sql2 = "";
        $count = 0;

        while($rowCount>0){

            $val = $shifts[$count];
            $gId = $expo[$count];
            if($val != $max){
                $val ++;
                $sql2 .= "UPDATE group_detail set shift_id = $val where group_id= $gId;";
                $count ++;
                $rowCount --;
            }else{
                $val = 0;
                $sql2 .= "UPDATE group_detail set shift_id = $val where group_id= $gId;";
                $count ++;
                $rowCount --;
            }
        }
        $stat = trim($sql2, ";");
        //echo $stat;
        $query2 = $pdo->prepare($stat);
        $query2->execute();

        $smt = "UPDATE group_detail set today ='$today' ";
        $query = $pdo->prepare($smt);
        $query->execute();
    }



}

shift_assigning();