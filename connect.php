<?php 

$host = 'localhost';
$dbname = 'ipromo';
$user = 'root';
$password = '';

$connect = new mysqli($host, $user, $password, $dbname);

if($connect){
	echo ' ';
}else{
	$connect->mysql_errno();
}


?>