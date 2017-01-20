<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$title = xss_clean($_POST['title']);
$start_date = xss_clean($_POST['start_date']);


try{
//    create holidays for company
    if($empRole == 'admin'){
        $sql = "INSERT INTO calendar (title,start_date,end_date,event_color,dept_id,comp_id) VALUES
            (:title,:start_date,:end_date,:event_color,:dept_id,:comp_id )";
        $query = $pdo->prepare($sql);
        $query->execute(array('title'=>$title, 'start_date'=>$start_date,'end_date'=>$start_date,'event_color'=>'#FC2E2E','dept_id'=>'@','comp_id'=>$empID ));

        header("Location:../index.php?holiday=done");
    }

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


