<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

try {

    header("Location:../roster.php?shift=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}