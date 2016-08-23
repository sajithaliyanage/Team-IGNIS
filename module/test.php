<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

$applyLeaveID = $_POST['apply_leave_id'];

echo empty($_FILES['fileToUploads']['name']);
