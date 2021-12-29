<?php

// Collect all variables coming from the contact module OR the comments form

$name = strip_tags(htmlspecialchars($_POST['name']));             // comments AND contact
$email_address = strip_tags(htmlspecialchars($_POST['email']));   // comments AND contact
$subject = strip_tags(htmlspecialchars($_POST['subject']));       // contact
$website = strip_tags(htmlspecialchars($_POST['website']));       // comments
$title = strip_tags(htmlspecialchars($_POST['arttitle']));        // comments
$message = strip_tags(htmlspecialchars($_POST['message']));       // comments AND contact

// Create the email and send the message

if(empty($website)) {
   header('Content-type: text/html; charset=utf-8');
   $to = 'your@email.here';
   $email_subject = "New Contact";
   $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
   $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
   $headers .= 'From: ' . $email_address;
   $email_body = "You received a new message!\n\n"."Here below the details:\n\nName: $name\n\nSubject: $subject\n\nMessage:\n$message";
   $body_encoded = base64_encode($email_body);
   mail($to, $email_subject, $body_encoded, $headers);
   header('Location: /thank_you_page.html');
return true;
}

elseif(empty($subject)) {
   header('Content-type: text/html; charset=utf-8');
   $to = 'your@email.here';
   $email_subject = "New Comment";
   $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
   $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
   $headers .= 'From: ' . $email_address;
   $email_body = "You received a new comment!.\n\n"."Here below the details:\n\nName: $name\n\nArticle title: $title\n\nWebsite: $website\n\nMessage:\n$message";
   $body_encoded = base64_encode($email_body);
   mail($to, $email_subject, $body_encoded, $headers);
   header('Location: /thank_you_page.html');
return true;
}

else {
   return false;
}

?>
