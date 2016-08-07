<?php

class Department{

    public $emptyDepartment;
    public $numberOfEmployees;
    public $numberOfDepartments;
    public $departmentName;
    public $departmentColor;
    public $departmentStatus;
    public $isRoster;

    function isEmptyDepartments($pdo){
        $sql = "select * from department";
        $query = $pdo->prepare($sql);
        $query->execute();
        $rowCount = $query->rowCount();

        if($rowCount==0){
            return $emptyDepartment=true;
        }else{
            return $emptyDepartment=fale;
        }
    }

    function fetchNumberOfEmployees($pdo){
        $sql = "select no_of_emp from department";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        foreach($result as $rs){
            $numberOfEmployees = $rs['no_of_emp'];
        }
        return $numberOfEmployees;

    }

    function fetchDepartmentStatus($pdo){
        $sql = "select currentStatus from department";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        foreach($result as $rs){
            $departmentStatus = $rs['no_of_emp'];
        }
        return $departmentStatus;

    }
}