<?php

require_once ('selects.php');
require_once ('connect.php');
require_once ('mail.php');
require_once ('api.php');


/*
	Get data from form and update table of DB
*/

$date = date(Ymd);

$email = $_POST['email'];
$firstName = $_POST['name'];
$lastName = $_POST['last_name'];
$phone = $_POST['phone'];

$name = $_POST['name'];
$subject = "Ваш акционный код";

foreach ($shares as $value) {
	if($_POST['shares'] == $value['id']){
		$id = $value['id'];
		$newCode = $value['code'] + 1;
		
		$updateCode = $connect->query("UPDATE shares SET code = '$newCode' WHERE id = '$id'");
	}
}

if($newCode > 0 && $newCode < 10){
	$code = $_POST['shares'] . $date . '00' . $newCode;	
}
elseif($newCode >= 10 && $newCode <= 99 ) {
	$code = $_POST['shares'] . $date .  '0' . $newCode;
}
elseif ($newCode >= 100) {
	$code = $_POST['shares'] . $date . $newCode;
}

$message = "Ваш акционный код - " . $code;

getQR(); // create QR code
sendMail($email, $name, $subject, $message, $code); // Send email
addContact($email, $firstName, $lastName, $phone); // Add contact in General List Active Compaine
addCode($email, $code); // Add contact in Code List Active Compaine
automation($email); // add to automation email


?>