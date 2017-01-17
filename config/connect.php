<?php
function connect() {

	if ($_SERVER['HTTP_HOST'] == 'localhost:8888'){
		return new PDO(
        'mysql:host=localhost;dbname=takeyourleave','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
	}else{
		return new PDO(
        'mysql:host=ap-cdbr-azure-southeast-b.cloudapp.net;dbname=takeyourleave','b9b628f925527f','a95e14b1',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

	}
}
?>
