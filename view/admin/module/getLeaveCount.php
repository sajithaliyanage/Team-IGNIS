<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$string = xss_clean($_GET['q1']);
$pieces = explode(",", $string);
$catID = $pieces[0];
$levelID = $pieces[1];

try {
//    delete leave type
    $sql = "SELECT set_id FROM  leave_set_job WHERE job_cat_id=:lid AND level_id=:llid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid' => $catID, 'llid' => $levelID));
    $result = $query->fetch();
    $setID = $result['set_id'];

    $sql = "SELECT * FROM leave_count_details JOIN leave_type ON leave_type.leave_id=leave_count_details.leave_id WHERE set_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid' => $setID));
    $result = $query->fetchAll();
    $count = $query->rowCount();

    if($count>1){
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th style='text-align: center;'>Leave Name</th>";
        echo "<th style='text-align: center;'>Leave Count</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $rs) {
            echo "
            <tr>
                <td style='text-align: center;'>" . $rs['leave_name'] . "</td>
                <td style='text-align: center;'>" . $rs['leave_count'] . "</td>
            </tr>

        ";
        }
        echo "</tbody>";
        echo "</table>";
    }else{
        echo "<h5 style='text-align: center; margin-top:30px;'>- No leave counts set yet -</h5>";
    }



} catch (PDOException $e) {
    echo $e;
    //header("Location:../../layouts/error.php");
}


