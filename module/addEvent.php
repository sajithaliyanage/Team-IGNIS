<?php

include('../controller/siteController.php');
include('../config/connect.php');
include ('xssValidation.php');
$pdo = connect();

//post request data
$type = xss_clean($_POST['calendar']);
$title = xss_clean($_POST['title']);
$start_date = xss_clean($_POST['start_date']);
$end_date =xss_clean( $_POST['end_date']);
$description = xss_clean($_POST['description']);

try{
//    create event for company
    if($type =='department'){
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

            header("Location:../view/site/calendar.php?event=done");
        }
    }else if($type =='own'){
        //insert data to calendar table
        $sql = "INSERT INTO calendar (title,start_date,end_date,event_color,description,dept_id,comp_id) VALUES
            (:title,:start_date,:end_date,:event_color,:description,:dept_id,:comp_id )";
        $query = $pdo->prepare($sql);
        $query->execute(array('title'=>$title, 'start_date'=>$start_date, 'end_date'=>$end_date,'event_color'=>"gold",
            'description' =>$description,'dept_id'=>'#','comp_id'=>$empID ));

        header("Location:../view/site/calendar.php?event=done");
    }else{
        header("Location:../view/site/calendar.php?error=done");
    }


}catch(PDOException $e){
    header("Location:../view/layouts/error.php");
}


