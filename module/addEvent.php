<?php

include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

//post request data
$type = $_POST['calendar'];
$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$description = $_POST['description'];

try{
//    create event for company

    if($empRole == 'manager'){
        //select deptment id and color
        $smt = "SELECT * FROM manager JOIN department ON department.dept_id = manager.dept_id WHERE comp_id=:log";
        $queryDept = $pdo->prepare($smt);
        $queryDept ->execute(array('log'=>$empID));
        $result = $queryDept->fetch();
        $deptColor = $result['dept_color'];
        $deptID = $result['dept_id'];

        //insert data to calendar table
        $sql = "INSERT INTO calendar (title,start_date,end_date,event_color,description,dept_id,comp_id) VALUES
            (:title,:start_date,:end_date,:event_color,:description,:dept_id,:comp_id )";
        $query = $pdo->prepare($sql);
        $query->execute(array('title'=>$title, 'start_date'=>$start_date, 'end_date'=>$end_date,'event_color'=>$deptColor,
            'description' =>$description,'dept_id'=>$deptID,'comp_id'=>$empID ));

        header("Location:../calendars.php?event=done");
    }

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


