<?php
include('../config/connect.php');
include('../controller/siteController.php');
include ('xssValidation.php');
$pdo = connect();

$action =xss_clean( $_GET['q']);

try {
    if($action == "empty"){
        echo "<center>Select a leave type to filtring</center>";

    }else if($action == "company_emp"){

        $sql = "SELECT * FROM employee JOIN job_category ON employee.job_cat_id = job_category.job_cat_id JOIN department ON department.dept_id=employee.dept_id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();

        if($rowCount == 0){
            echo "<center>No any employee added yet!</center>";
        }else{
            echo "<table  class=\"table table-striped table-responsive\">
                    <thead>
                        <tr>
                           <th style='text-align: center;'>Employee ID</th>
                           <th style='text-align: center;'>Employee Name</th>
                           <th style='text-align: center;'>Employee Email</th>
                           <th style='text-align: center;'>Department Name</th>
                           <th style='text-align: center;'>Employee Job Category</th>
                        </tr>
                    </thead>";

            echo "<tbody>";
            foreach($result as $rs){
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $rs['comp_id'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['name'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['email'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['dept_name'] ."</td>";
                echo "<td style='text-align: center;'>" . $rs['job_cat_name'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";

            echo "</table>";
        }

    }else if($action == "dept_details"){

        $sql = "SELECT * FROM department WHERE currentStatus = :log";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"approved"));
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();

        if($rowCount == 0){
            echo "<center>No any department added yet!</center>";
        }else{
            echo "<table  class=\"table table-striped table-responsive\">
                    <thead>
                        <tr>
                           <th style='text-align: center;'>Depaertment Name</th>
                           <th style='text-align: center;'>Number of Employees</th>
                           <th style='text-align: center;'>Roster Status</th>
                        </tr>
                    </thead>";

            echo "<tbody>";
            foreach($result as $rs){
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $rs['dept_name'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['no_of_emp'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['roster_status'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";

            echo "</table>";
        }

    }else if($action == "own_all"){
        $sql = "SELECT * FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id=:empID";
        $query = $pdo->prepare($sql);
        $query->execute(array('empID'=>$empID));
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();

        if($rowCount == 0){
            echo "<center>No any leave status yet!</center>";
        }else{
            echo "<table  class=\"table table-striped table-responsive\">
                    <thead>
                        <tr>
                           <th style='text-align: center;'>Leave Type</th>
                           <th style='text-align: center;'>Leave Priority</th>
                           <th style='text-align: center;'>Applied Date</th>
                           <th style='text-align: center;'>Duration</th>
                           <th style='text-align: center;'>Leave Status</th>
                        </tr>
                    </thead>";

              echo "<tbody>";
                foreach($result as $rs){
                    echo "<tr>";
                        echo "<td style='text-align: center;'>" . $rs['leave_name'] . "</td>";
                        echo "<td style='text-align: center;text-transform: capitalize;'>" . $rs['leave_priority'] . "</td>";
                        echo "<td style='text-align: center;'>" . $rs['apply_date'] . "</td>";
                        echo "<td style='text-align: center;'>" . $rs['start_date'] ." to ". $rs['end_date']  ."</td>";
                        echo "<td style='text-align: center;text-transform: capitalize;'>" . $rs['status'] . "</td>";
                    echo "</tr>";
                }
              echo "</tbody>";

            echo "</table>";
        }

    }else if($action == "own_approved"){
        $sql = "SELECT * FROM apply_leave JOIN leave_type ON apply_leave.leave_id=leave_type.leave_id WHERE comp_id=:empID AND status=:log";
        $query = $pdo->prepare($sql);
        $query->execute(array('empID'=>$empID,'log'=>"approved"));
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();

        if($rowCount == 0){
            echo "<center>No any leave status yet!</center>";
        }else{
            echo "<table  class=\"table table-striped table-responsive\">
                    <thead>
                        <tr>
                           <th style='text-align: center;'>Leave Type</th>
                           <th style='text-align: center;'>Leave Priority</th>
                           <th style='text-align: center;'>Applied Date</th>
                           <th style='text-align: center;'>Duration</th>
                           <th style='text-align: center;'>Leave Status</th>
                        </tr>
                    </thead>";

            echo "<tbody>";
            foreach($result as $rs){
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $rs['leave_name'] . "</td>";
                echo "<td style='text-align: center;text-transform: capitalize;'>" . $rs['leave_priority'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['apply_date'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['start_date'] ." to ". $rs['end_date']  ."</td>";
                echo "<td style='text-align: center;text-transform: capitalize;'>" . $rs['status'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";

            echo "</table>";
        }


    }else if($action == "dept_emp"){
        $sql = "SELECT dept_id FROM employee WHERE comp_id=:empID";
        $query = $pdo->prepare($sql);
        $query->execute(array('empID'=>$empID));
        $ID = $query->fetch();

        $departmentID = $ID['dept_id'];

        $sql = "SELECT * FROM employee JOIN job_category ON employee.job_cat_id = job_category.job_cat_id WHERE employee.dept_id=:depID";
        $query = $pdo->prepare($sql);
        $query->execute(array('depID'=>$departmentID));
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();

        if($rowCount == 0){
            echo "<center>No any leave status yet!</center>";
        }else{
            echo "<table  class=\"table table-striped table-responsive\">
                    <thead>
                        <tr>
                           <th style='text-align: center;'>Employee ID</th>
                           <th style='text-align: center;'>Employee Name</th>
                           <th style='text-align: center;'>Employee Email</th>
                           <th style='text-align: center;'>Employee Telephone</th>
                           <th style='text-align: center;'>Employee Job Category</th>
                        </tr>
                    </thead>";

            echo "<tbody>";
            foreach($result as $rs){
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $rs['comp_id'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['name'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['email'] . "</td>";
                echo "<td style='text-align: center;'>" . $rs['tel_no'] ."</td>";
                echo "<td style='text-align: center;'>" . $rs['job_cat_name'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";

            echo "</table>";
        }
    }


}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}