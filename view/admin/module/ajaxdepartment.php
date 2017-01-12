<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

if (isset($_GET['r'])){
    $request =($_GET['r']." Department");

    $smt = "SELECT dept_name FROM department where dept_name =:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$request));
    $result = $query->fetchAll();
    $rownum = $query->rowCount();
    

    if($rownum !== 0){
        echo "Department already exist!!!";
    }
    

}
 if (isset($_GET['c'])){
    $request =$_GET['c'];


    $smt = "SELECT dept_color FROM department where dept_color =:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$request));
    $result = $query->fetchAll();
    $rownum = $query->rowCount();
    

    if($rownum !== 0){
        echo "Department already exist!!!";
    }
    

}

?>



