<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();


try{
    $sqlS="select employee.comp_id,employee.name, leave_type.leave_name,employee_leave_count.leave_count FROM employee_leave_count JOIN
        employee ON employee.comp_id = employee_leave_count.comp_id JOIN leave_type ON leave_type.leave_id = employee_leave_count.leave_id 
        ORDER BY employee_leave_count.comp_id ASC ";
    $queryS = $pdo->prepare($sqlS);
    $queryS->execute();
    $resultS = $queryS->fetchAll();


        echo "
            <h4 style='color:#761c19'>Upto <b>".date('F - Y')."</b></h4>
            <table id='myTable' class=\"table table-striped table-responsive\" style='margin-top:20px;'>
                <thead>
                <tr style=\"margin-top:30px;\">
                    <th style=\"text-align: center;\">Employee ID</th>
                    <th style=\"text-align: center;\">Full Name</th>
                    <th style=\"text-align: center;\">Leave Type</th>
                    <th style=\"text-align: center;\"> Remain Leave Count</th>                 
                    <th style=\"text-align: center;\">No Pay Leaves</th>
                </tr>
                </thead>
                <tbody>";

            foreach ($resultS as $rs){
                echo "
                       <tr>
                        <td style='text-align: center;'>".$rs['comp_id']."</td>
                        <td style='text-align: center;'>".$rs['name']."</td>
                        <td style='text-align: center;'>".$rs['leave_name']."</td>
                        <td style='text-align: center;'>".$rs['leave_count']."</td>
                        <td style='text-align: center;'>";if(intval($rs['leave_count'])<0){echo abs(intval($rs['leave_count']));}else{echo 0;}echo "</td>    
                       </tr>
                    ";
            }
        echo "</tbody>
            </table>";
    ?>



<?php

}catch(PDOException $e){
    header("Location:../view/layouts/error.php");
}


