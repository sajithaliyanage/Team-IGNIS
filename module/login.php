<?php
include('../config/connect.php');
$pdo = connect();
$isValidUser = false;

$companyID = $_POST['companyID'];
$password = $_POST['password'];

try{
    //check is user role = employee
    $sql = "SELECT * FROM general_employee JOIN employee ON general_employee.comp_id = employee.comp_id
            WHERE general_employee.comp_id=:comp_id and employee.password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['name'];
            $empImage = $rs['image'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] = $empID;
        $_SESSION['image'] = $empImage;
        $_SESSION['empRole'] = "employee";
        session_write_close();

        header("Location:../view/site/apply.php?role=employee");
    }

    //check is user role = administrator
    $sql = "SELECT * FROM admin JOIN employee ON admin.comp_id = employee.comp_id
            WHERE admin.comp_id=:comp_id and employee.password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['name'];
            $empImage = $rs['image'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empID;
        $_SESSION['image'] = $empImage;
        $_SESSION['empRole'] = "admin";
        session_write_close();

        header("Location:../view/site/default_admin.php?role=admin");
    }

    //check is user role = manager
    if( $isValidUser == false) {
        $sql = "SELECT * FROM manager JOIN employee ON manager.comp_id = employee.comp_id
                WHERE manager.comp_id=:comp_id and employee.password=:password";
        $query = $pdo->prepare($sql);
        $query->execute(array('comp_id' => $companyID, 'password' => $password));
        $rowCount = $query->rowCount();
        $results = $query->fetchAll();

        if ($rowCount == 1) {
            $isValidUser = true;

            foreach ($results as $rs) {
                $empID = $rs['comp_id'];
                $empName = $rs['name'];
                $empImage = $rs['image'];
            }

            ini_set('session.cookie_httponly', true);

            session_start();
            $_SESSION['empName'] = $empName;
            $_SESSION['empID'] = $empID;
            $_SESSION['image'] = $empImage;
            $_SESSION['empRole'] = "manager";
            session_write_close();

            header("Location:../view/site/apply.php?role=manager");
        }
    }

    //check is user role = executive
    $sql = "SELECT * FROM executive JOIN employee ON executive.comp_id = employee.comp_id
            WHERE executive.comp_id=:comp_id and employee.password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $rowCount = $query->rowCount();
    $results  = $query->fetchAll();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['name'];
            $empImage = $rs['image'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empID;
        $_SESSION['image'] = $empImage;
        $_SESSION['empRole'] = "executive";
        session_write_close();

        header("Location:../view/site/apply.php?role=executive");
    }

    //check is user role = director
    $sql = "SELECT * FROM director JOIN employee ON director.comp_id = employee.comp_id
            WHERE director.comp_id=:comp_id and employee.password=:password";
    $query = $pdo->prepare($sql);
    $query->execute(array('comp_id'=>$companyID, 'password'=>$password ));
    $results  = $query->fetchAll();
    $rowCount = $query->rowCount();

    if($rowCount==1){
        $isValidUser = true;

        foreach($results as $rs){
            $empID = $rs['comp_id'];
            $empName = $rs['name'];
            $empImage = $rs['image'];
        }

        ini_set('session.cookie_httponly',true);

        session_start();
        $_SESSION['empName'] =$empName;
        $_SESSION['empID'] =$empID;
        $_SESSION['image'] = $empImage;
        $_SESSION['empRole'] = "director";
        session_write_close();

        header("Location:../view/site/director.php?role=director");
    }

    if( $isValidUser == false){
        header("Location:../index.php?login=fail");
    }


}catch(PDOException $e){
    //echo $e;
    header("Location:../view/layouts/error.php");
}
