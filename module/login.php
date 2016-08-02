<?php
include('../config/connect.php');
$pdo = connect();
$isValidUser = false;

$companyID = $_POST['companyID'];
$password = $_POST['password'];

try{
    //check is user role = employee
    $sql = "SELECT * FROM employee WHERE comp_id=:comp_id and password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['emp_name'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empName;
        $_SESSION['empRole'] = "employee";
        session_write_close();

        header("Location:../view/site/apply.php");
    }

    //check is user role = administrator
    $sql = "SELECT * FROM admin WHERE comp_id=:comp_id and password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['emp_name'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empName;
        $_SESSION['empRole'] = "admin";
        session_write_close();

        header("Location:../view/site/default_admin.php");
    }

    //check is user role = manager
    $sql = "SELECT * FROM manager WHERE comp_id=:comp_id and password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['emp_name'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empName;
        $_SESSION['empRole'] = "manager";
        session_write_close();

        header("Location:../view/site/apply.php");
    }

    //check is user role = executive
    $sql = "SELECT * FROM executive WHERE comp_id=:comp_id and password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['emp_name'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empName;
        $_SESSION['empRole'] = "executive";
        session_write_close();

        header("Location:../view/site/apply.php");
    }

    //check is user role = director
    $sql = "SELECT * FROM director WHERE comp_id=:comp_id and password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['emp_name'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empName;
        $_SESSION['empRole'] = "director";
        session_write_close();

        header("Location:../view/site/apply.php");
    }

    if( $isValidUser == false){
        header("Location:../index.php?login=fail");
    }


}catch(PDOException $e){
    //echo $e;
    header("Location:../view/layouts/error.php");
}
