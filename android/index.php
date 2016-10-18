<?php
include('connect.php');
$pdo = connect();

echo "Hello\n";
echo $_POST['username'];
echo $_POST['email'];
?>