<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$title = xss_clean($_POST['title']);
$start_date = xss_clean($_POST['start_date']);
$end_date = xss_clean($_POST['end_date']);
$description = xss_clean($_POST['description']);

try{
//    create event for company
    if($empRole == 'admin' || $empRole == 'director'){
        $sql = "INSERT INTO calendar (title,start_date,end_date,event_color,description,dept_id,comp_id) VALUES
            (:title,:start_date,:end_date,:event_color,:description,:dept_id,:comp_id )";
        $query = $pdo->prepare($sql);
        $query->execute(array('title'=>$title, 'start_date'=>$start_date, 'end_date'=>$end_date,'event_color'=>"#3498db",
                                 'description' =>$description,'dept_id'=>0,'comp_id'=>$empID ));

        header("Location:../index.php?event=done");
    }

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


