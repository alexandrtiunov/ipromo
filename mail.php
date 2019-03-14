<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

require_once ('generator.php');
require ('vendor/phpmailer/phpmailer/src/Exception.php');
require ('vendor/phpmailer/phpmailer/src/PHPMailer.php');
require ('vendor/phpmailer/phpmailer/src/SMTP.php');
require ('vendor/autoload.php');
include ("phpqrcode-master/qrlib.php");

/*
* Connect to email client and send message
*/
function sendMail($email, $name, $subject, $message, $code){

		$mail = new PHPMailer(true);                              
	try {
	    
	    $mail->SMTPDebug = 2;                                 
	    $mail->isSMTP();                                      
	    $mail->Host = 'smtp.i.ua';  					
	    $mail->SMTPAuth = true;                               
	    $mail->Username = 'ipromotest@i.ua';                 
	    $mail->Password = '123456789A';                           
	    $mail->SMTPSecure = 'ssl';                            
	    $mail->Port = 465;                                    

	    //Recipients
	    $mail->setFrom($mail->Username);
	    $mail->addAddress($email, $name);     
	 

	    //Attachments
	    $mail->addAttachment('code.png', 'code.png');    

	    //Content
	    $mail->isHTML(true);                                  
	    $mail->Subject = $subject;
	    $mail->Body    = $message;

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}

/*
* create QR code
*/
function getQR(){
	QRcode::png($code, "code.png", "L", 4, 4);
}

?>