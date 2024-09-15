<?php

// Try to stop SPAM with the honeypot method
$phone_number = $_POST['phone_number'];

if(!empty($phone_number)) {
	exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(false); //If TRUE catch exceptions for debugging


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
	$mail->Host       = 'your_SMTP_host';    			      //SMTP server
	$mail->SMTPAuth   = true;                             //Use SMTP auth
	$mail->Username   = 'your_SMTP_user';        			//SMTP username
	$mail->Password   = 'your_SMTP_password';             //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   //Use implicit TLS
	$mail->Port       = 587;                              //SMTP Port

	//Recipients
	$mail->setFrom('from_email_address', 'NOREPLY');  			//From address
	$mail->addAddress('to_email_address', 'Info');  			//To address
	$mail->addReplyTo('repòy-to_email_address', 'Info');  	//Address for replies
	//$mail->addCC('cc@gmail.com');                       	//CC address (Carbon Copy)
	//$mail->addBCC('bcc@gmail.com');                     	//BCC address (Blind Carbon Copy)

	//Attachments
	//$mail->addAttachment('allegati/allegato1.pdf');

	//Content
	$mail->isHTML(false);
	$headers .= "Content-Type: text/plain; charset=\"UTF-8\"; format=flowed \r\n";
	$headers .= "Mime-Version: 1.0 \r\n";
	$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";

	if(empty($subject)) {
		$mail->Subject = 'New Comment';
		$mail->Body = "You received a new comment!\n\nHere the details:\n\nName: $name\nEmail: $email_address\nArticle title: $title\nWrbsite: $website\n\nMessage:\n$message";
	}
	else {
		$mail->Subject = 'New Contact';
		$mail->Body = "You received a new message!\n\nHere the details:\n\nName: $name\nEmail: $email_address\nSubject: $subject\n\nMessage:\n$message";
	}

	//If TRUE then use HTML text
	//$mail->Subject = 'Email subject';                       								//Subject
	//$mail->Body    = 'This is the HTML message body in bold!'; 							//Email body in HTML
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 	//Email body for pure text email clients

	$mail->send();
	header('Location: /thank_you_page.html');
} catch (Exception $e) {
	echo "Error while sending the message. Error is: {$mail->ErrorInfo}";
}



