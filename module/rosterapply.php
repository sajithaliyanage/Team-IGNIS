<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

//leave post request
$leaveType = $_POST['leave_type'];
$leavePriority = $_POST['leave_priority'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];
$numDays = $_POST['numDays'];
$reason = $_POST['reason'];
$todayDate = date("d/m/Y");

try{