<?php


header("Content-type: text/html; charset=utf-8");

require_once('class.phpmailer.php');
include_once("config.php");


$mail = new PHPMailer();

// sender information
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];
$body = "This message is sent from my web CV :) <br/>
		 from :".$name."<br>
		 email :".$email."<br>
		 subject :".$subject."<br>
		 details:<br>".
		 $message;
		 



$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth   = true;                  		// enable SMTP authentication
$mail->SMTPSecure = "ssl";                 		// sets the prefix to the servier
$mail->CharSet = "UTF-8";
$mail->Host       = $smtp_config["host"];      		// sets GMAIL as the SMTP server
$mail->Port       = $smtp_config["port"];                  	 	// set the SMTP port for the GMAIL server
$mail->Username   = $smtp_config["username"];  	// GMAIL username
$mail->Password   = $smtp_config["password"];		// GMAIL password

//$mail->SetFrom($email, $name);
$mail->From =  $email;
$mail->FromName =  $name;

$mail->Subject    = $subject;

//$mail->AltBody    = "To view the message, please use an HTML compatidble email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$to_address = "ms.kaleia@gmail.com";
$to_name = 'Mohanad Kaleia';

$mail->AddAddress($to_address, $to_name);

if(!$mail->Send()) 
{
	//echo "<p style='color:red;font-size:18px'>Sorry your message did not send correctly!!</p>";
} 
else 
{
	//echo "<p style='color:green;font-size:18px'>Thanks for emailing me :)</p>";
	header('Location: ../message_send.html');
	
}
?>