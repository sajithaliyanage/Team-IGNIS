<?php
include('../../../config/connect.php');
include('../../../controller/siteController.php');
$pdo = connect();


function is_valid_nic($nic)
{
    $result = true;
    if ($nic != "") {
        if (strlen($nic) <> 10) {
            $result = FALSE;
        }

        $nic_9 = substr($nic, 0, 9);

        if (!is_numeric($nic_9)) {
            $result = false;
        }

        $nic_v = substr($nic, 9, 1);
        if (is_numeric($nic_v)) {
            $result = false;
        }
    }
    return $result;

}

if (isset($_GET['r'])) {
    $nic = $_GET['r'];
    $flag = is_valid_nic($nic);
    if (!$flag) {
        echo "Enter a valid NIC No!";
    }


}
if (isset($_GET['q'])) {
    $email = $_GET['q'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo $emailErr;
    }
    else{
        $smt = "SELECT email FROM employee where email =:log";
        $query = $pdo->prepare($smt);
        $query->execute(array('log'=>$email));
        $result = $query->fetchAll();
        $rownum = $query->rowCount();
        //print_r($rownum)

        if($rownum !== 0){
            echo "Email already exists!";
        }

    }




}
if (isset($_GET['p'])) {
    $phoneNo = $_GET['p'];
   $length=intval(strlen($phoneNo));
    if ($length!==10) {
        echo "Enter a valid phone number!";
    }


}

?>