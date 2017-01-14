<?php
include('../../../config/connect.php');
include('../../../controller/siteController.php');
$pdo = connect();

try {
    if(isset($_GET['q1'])){
        $action1 = $_GET['q1'];

        if($action1 == "empty"){
            echo "<center><label style=\"margin-top:15px; font-weight:100;\">Select any Department</label></center>";
        }else{
            $sql = "SELECT * FROM group_detail WHERE dept_id=:depID";
            $query = $pdo->prepare($sql);
            $query->execute(array('depID'=>$action1));
            $result = $query->fetchAll();
            $rowCount = $query->rowCount();

            if($rowCount == 0){
                echo "<center>No any shift added yet!</center>";
            }else{
                echo "<table  class=\"table table-striped table-responsive\">
                    <thead>
                        <tr>
                           <th style='text-align: center;'>Group Name</th>
                           <th style='text-align: center;'>Count of Employees</th>
                        </tr>
                    </thead>";

                echo "<tbody>";
                foreach($result as $rs){
                    echo "<tr>";
                    echo "<td style='text-align: center;'>" . $rs['group_name'] . "</td>";
                    echo "<td style='text-align: center;'>" . $rs['no_of_employees'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";

                echo "</table>";
            }
        }


    }
    if(isset($_GET['q2'])){
        $depId=$_GET['q2'];
        if($depId !=0){
            $stm = "SELECT group_id,group_name FROM group_detail where dept_id=:log1";
            $query = $pdo->prepare($stm);
            $query->execute(array('log1'=>$depId));
            $result = $query->fetchAll();
            $rowNum = $query->rowCount();

            echo "<select name='group_id' class='form-control'>";
            if($rowNum !=0){
                foreach ($result as $rs) {
                    echo "<option value='" . $rs['group_id'] . "' >".$rs['group_name']  . '</option>';
                }
            }else{
                echo "<option value='empty'>- No groups -</option>";
            }

            echo "</select>";
        }else{
            echo "<select name='group_id' class='form-control'>";
            echo "<option value='empty'>- Department not selected -</option>";
            echo "</select>";
        }



    }
//    else if(isset($_GET['q2'])){
//        $action2 = $_GET['q2'];
//
//        if($action2 == "empty"){
//            echo "<center><label style=\"margin-top:15px; font-weight:100;\">Select any Department</label></center>";
//        }else{
//            $sql = "SELECT * FROM shift_type WHERE dept_id=:depID";
//            $query = $pdo->prepare($sql);
//            $query->execute(array('depID'=>$action2));
//            $result = $query->fetchAll();
//            $rowCount = $query->rowCount();
//
//            if($rowCount == 0){
//                echo "<center>No any shift added yet!</center>";
//            }else{
//                echo "<table  class=\"table table-striped table-responsive\">
//                    <thead>
//                        <tr>
//                           <th style='text-align: center;'>Shift Name</th>
//                           <th style='text-align: center;'>Start Time</th>
//                           <th style='text-align: center;'>End Time</th>
//                        </tr>
//                    </thead>";
//
//                echo "<tbody>";
//                foreach($result as $rs){
//                    echo "<tr>";
//                    echo "<td style='text-align: center;'>" . $rs['shift_name'] . "</td>";
//                    echo "<td style='text-align: center;'>" . $rs['start_time'] . "</td>";
//                    echo "<td style='text-align: center;'>" . $rs['end_time'] . "</td>";
//                    echo "</tr>";
//                }
//                echo "</tbody>";
//
//                echo "</table>";
//            }
//        }
//    }

}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}