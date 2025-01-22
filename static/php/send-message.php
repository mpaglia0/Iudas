<?php

// Try to stop SPAM with the honeypot method
$phone_number = $_POST['phone_number'];

if(!empty($phone_number)) {
	exit();
}

//Initialize user PHP path
ini_set("include_path", '<PHPMailer path here>' . ini_get("include_path") );
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(false); //If TRUE catch exceptions for debugging

// If your language is NOT English
// change it accordingly
include_once './lang/en.php';

// Set variables
if(!isset($_POST['subject'])) {												 // contact only
	$subject = '';
} else {
	$subject = strip_tags(htmlspecialchars($_POST['subject']));
}
if(!isset($_POST['website'])) {												 // contact only
	$website = '';
} else {
	$website = strip_tags(htmlspecialchars($_POST['website']));
}
if(!isset($_POST['arttitle'])) {												 // contact only
	$title = '';
} else {
	$title = strip_tags(htmlspecialchars($_POST['arttitle']));
}
$name = strip_tags(htmlspecialchars($_POST['name']));             // comments AND contact
$email_address = strip_tags(htmlspecialchars($_POST['email']));   // comments AND contact
$message = strip_tags(htmlspecialchars($_POST['message']));       // comments AND contact

try {
	//SMTP server configuration
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;              //Debug mode
	$mail->isSMTP();                                      //Send through SMTP
	$mail->Host       = '<your host here>';         //SMTP server
	$mail->SMTPAuth   = true;                             //Use SMTP auth
	$mail->Username   = '<your username here>';         //SMTP username
	$mail->Password   = '<your password here>';                	   //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   //Use implicit TLS
	$mail->Port       = 587;                              //SMTP Port

	//Recipients
	$mail->setFrom('noreply@email.com', 'NOREPLY');  //From address
	$mail->addAddress('<recipient email here>', 'Info');  	//To address
	$mail->addReplyTo('<reply to email here>', 'Info');  	//Address for replies
	//$mail->addCC('cc@gmail.com');                       	//CC address (Carbon Copy)
	//$mail->addBCC('bcc@gmail.com');                     	//BCC address (Blind Carbon Copy)

	//Attachments
	//$mail->addAttachment('allegati/allegato1.pdf');

	//Content
	$mail->isHTML(false);
	$headers .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
	$headers .= "Mime-Version: 1.0 \r\n";

	if(empty($subject)) {
		$mail->Subject = "$CommentSubjectTXT";
		$mail->Body = "$CommentBodyTXT \n\n $CommonDetailsTXT\n\n$CommonNameTXT $name\n$CommonEmailTXT $email_address\n$CommentArticleTitleTXT $title\n$CommentWebsiteTXT $website\n\n$CommonMessageTXT\n$message";
	}
	else {
		$mail->Subject = "$ContactSubjectTXT";
		$mail->Body = "$ContactBodyTXT\n\n$CommonDetailsTXT\n\n$CommonNameTXT $name\n$CommonEmailTXT $email_address\n$ContactSubjectBodyTXT $subject\n\n$CommonMessageTXT\n$message";
	}

	//If TRUE then use HTML text
	//$mail->Subject = 'Email subject';                       								//Subject
	//$mail->Body    = 'This is the HTML message body in bold!'; 							//Email body in HTML
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 	//Email body for pure text email clients

	$mail->send();
	header('Location: <thank you page here>');
} catch (Exception $e) {
	echo "Error while sending the message. Error is: {$mail->ErrorInfo}";
}

?>
