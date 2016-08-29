<?php
include('../../../config/connect.php');
$pdo = connect();

//post request data
$deptId = $_POST['emp_department'];
$empRole = $_POST['emp_role'];
$empCategory = $_POST['emp_category'];
$empLevel = $_POST['emp_level'];
$empId = $_POST['emp_id'];
$empName = $_POST['emp_name'];
$empNIC = $_POST['emp_nic'];
$empGender = $_POST['emp_gender'];
$empEmail = $_POST['emp_email'];
$empPassword = $_POST['emp_password'];
$empTelephone = $_POST['emp_tele'];
$groupID = $_POST['group_id'];

try{
    //    incrment number of employee by 1
    $sql = "UPDATE department SET no_of_emp =no_of_emp+1 WHERE dept_id=:depID";
    $query = $pdo->prepare($sql);
    $query->execute(array('depID'=>$deptId));

    $sql = "UPDATE group_detail SET no_of_employees =no_of_employees+1 WHERE dept_id=:depID AND group_id=:gID";
    $query = $pdo->prepare($sql);
    $query->execute(array('depID'=>$deptId,'gID'=>$groupID));

    //    add employee to employee table
    $sql = "INSERT INTO employee (comp_id,name,nic,gender,email,password,tel_no,image,job_cat_id,level_id,group_id,dept_id) VALUES
            (:compId,:empName,:empNIC,:empGender,:empEmail,:empPassword,:empTel,:empImage,:empJob,:empLevel,:groupID,:empDept)";
    $query = $pdo->prepare($sql);
    $query->execute(array('compId'=>$empId,'empName'=>$empName,'empNIC'=>$empNIC,'empGender'=>$empGender,'empEmail'=>$empEmail,
        'empPassword'=>$empPassword,'empTel'=>$empTelephone,'empImage'=>"null",'empLevel'=>$empLevel,'empJob'=>$empCategory,'groupID'=>$groupID,'empDept'=>$deptId));

    //    add employee to specific table
    if($empRole=='manager'){
        $sql = "INSERT INTO manager (comp_id,dept_id) VALUES (:comp_id,:dept_id)";
        $query = $pdo->prepare($sql);
        $query->execute(array('comp_id'=>$empId, 'dept_id'=>$deptId));

    }else if($empRole=='executive'){
        $sql = "INSERT INTO executive (comp_id,dept_id) VALUES (:comp_id,:dept_id)";
        $query = $pdo->prepare($sql);
        $query->execute(array('comp_id'=>$empId, 'dept_id'=>$deptId));

    }else if($empRole=='employee'){
        $sql = "INSERT INTO general_employee (comp_id,dept_id) VALUES (:comp_id,:dept_id)";
        $query = $pdo->prepare($sql);
        $query->execute(array('comp_id'=>$empId, 'dept_id'=>$deptId));

    }

    //    get set id for create leave count
    $sql = "SELECT set_id FROM leave_set_job WHERE job_cat_id=:jobCat and level_id=:jobLevel";
    $query = $pdo->prepare($sql);
    $query->execute(array('jobCat'=>$empCategory,'jobLevel'=>$empLevel));
    $result = $query->fetchAll();
    $setID =0;
    foreach($result as $rs){
        $setID = $rs['set_id'];
    }

    $sql = "SELECT * FROM leave_count_details WHERE set_id=:setID";
    $query = $pdo->prepare($sql);
    $query->execute(array('setID'=>$setID));
    $result = $query->fetchAll();

    $empLeaveCount = array();
    foreach($result as $rs){
        array_push($empLeaveCount,$rs['leave_count']);
    }

    //    set leave types and count for new employee
    $sql0 = "SELECT leave_id FROM leave_type";
    $query0 = $pdo->prepare($sql0);
    $query0->execute();
    $result0 = $query0->fetchAll();

    $sql2="";
    $expo = array();
    $count = 0;
    foreach($empLeaveCount as $number){

        $sql2 .="INSERT INTO employee_leave_count(comp_id,leave_id,leave_count)VALUES(?,?,?);";
        array_push($expo,$empId);
        array_push($expo,$result0[$count][0]);
        array_push($expo,$number);
        $count++;
    }
    $query2 = $pdo->prepare($sql2);
    $query2->execute($expo);

    header("Location:../roster.php?job=done");

}catch(PDOException $e){
    //echo $e;
    header("Location:../../layouts/error.php");
}


