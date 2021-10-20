<?php

// Collect all variables coming from the contact module OR the comments form

$name = strip_tags(htmlspecialchars($_POST['name']));             // comments AND contact
$email_address = strip_tags(htmlspecialchars($_POST['email']));   // comments AND contact
$subject = strip_tags(htmlspecialchars($_POST['subject']));       // contact
$website = strip_tags(htmlspecialchars($_POST['website']));       // comments
$title = strip_tags(htmlspecialchars($_POST['arttitle']));        // comments
$message = strip_tags(htmlspecialchars($_POST['message']));       // comments AND contact

// Create the email and send the message

if(empty($title)) {
   $to = 'your@email.address';
   $email_subject = "New Contact!";
   $email_body = "You have a new message!\n\n"."Here below the details:\n\nName: $name\n\nEmail: $email_address\n\nSubject: $subject\n\nMessage:\n$message";
   mail($to,$email_subject,$email_body);
return true;
}

elseif(empty($subject)) {

   $to = 'your@email.address';
   $email_subject = "New Comment";
   $email_body = "You have a new comment!.\n\n"."Here below the details:\n\nName: $name\n\nEmail: $email_address\n\nArticle title: $title\n\nWebsite: $website\n\nMessage:\n$message";
   mail($to,$email_subject,$email_body);
return true;
}

else {
   return false;
}

?>
