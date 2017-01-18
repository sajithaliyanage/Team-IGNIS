<?php
  include('../controller/siteController.php');
  include('../config/connect.php');
  include ('xssValidation.php');
  include('../module/class/Employee.php');

  $emp=new Employee;

  $pdo = connect();
  //check the current password
  $emp->empId =$empID;
  $password=xss_clean($_GET['q']);
  $hashed_password = $emp->fetchEmployeePassword($pdo);
  $flag=password_verify($password, $hashed_password);

  if(!$flag){
      echo "<span style='color:red; margin-left:3px;'>".'Password is not matched!'.'</span>';
  }
