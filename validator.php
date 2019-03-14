<?php

require_once('generator.php');

	function validate($email)
	{
		if (!preg_match("/^[\da-zA-Z0-9]{2,50}[@]{1}[a-z]{3,10}\.[a-z_]{2,10}/", $email){
	        return true;
		}else{
			$message = "Пожалуста введите верно Ваш email адрес. <br>";
			return $message;
		}
	}

?>