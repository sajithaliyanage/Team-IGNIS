<?php
$isLoggedin = false;
ini_set('session.cookie_httponly',true);

session_start();
$empName = null;
$empID = null;
$empRole = null;
$empImage = null;

if(isset($_SESSION['empID']) && !empty($_SESSION['empID'])) {
    $isLoggedin = true;
    $empName = $_SESSION['empName'];
    $empID = $_SESSION['empID'];
    $empRole = $_SESSION['empRole'];
    $empImage = $_SESSION['image'];

}

//Session Destroy in 60 seconds
//if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
//    session_unset();
//    session_destroy();
//}
//$_SESSION['LAST_ACTIVITY'] = time();

//stop typing URL
//if (!empty($_SERVER['HTTP_REFERER']))
//    header("Location: ".$_SERVER['HTTP_REFERER']);
//else
//    header("Location:../view/layouts/error.php");
//if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != ""){
//    $url = $_SERVER['HTTP_REFERER'];
//}else{
//    header("Location:".$_SERVER['DOCUMENT_ROOT']."/view/layouts/error.php");
//}
//
//function error_found(){
//    header("Location:".$_SERVER['DOCUMENT_ROOT']."/view/layouts/error.php");
//}
//
//function error_found(){
//    header("Location:".$_SERVER['DOCUMENT_ROOT']."/index.php");
//}
//set_error_handler('error_found');

?>