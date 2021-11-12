<?php

// Collect all variables coming from the contact module OR the comments form

$name = strip_tags(htmlspecialchars($_POST['name']));             // comments AND contact form
$email_address = strip_tags(htmlspecialchars($_POST['email']));   // comments AND contact form
$subject = strip_tags(htmlspecialchars($_POST['subject']));       // contact form
$website = strip_tags(htmlspecialchars($_POST['website']));       // comments form
$title = strip_tags(htmlspecialchars($_POST['arttitle']));        // comments form
$message = strip_tags(htmlspecialchars($_POST['message']));       // comments AND contact form

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







<?php
// (A) UTF-8 MAIL FUNCTION
function umail ($mailTo, $mailCc, $mailBcc, $mailSubject, $mailBody) {
  // (A1) MAIL TO
  if (is_array($mailTo)) { $mailTo = implode(", ", $mailTo); }

  // (A2) MAIL HEADERS
  $mailHead = [
    "MIME-Version: 1.0",
    "Content-type: text/html; charset=utf-8"
  ];

  // (A3) ADD CC & BCC
  if ($mailCc !== null) {
    if (is_array($mailCc)) { $mailCc = implode(", ", $mailCc); }
    $mailHead[] = "Cc: $mailCc";
  }
  if ($mailBcc !== null) {
    if (is_array($mailBcc)) { $mailBcc = implode(", ", $mailBcc); }
    $mailHead[] = "Bcc: $mailBcc";
  }

  // (A4) SEND MAIL
  return mail($mailTo, $mailSubject, $mailBody, implode("\r\n", $mailHead));
}

// (B) SEND TEST MAIL
echo umail (
  "job@doe.com", // TO
  ["joe@doe.com", "jon@doe.com"], // CC
  ["jon@doe.com", "joy@doe.com"], // BCC
  "Test Email", // SUBJECT
  "<html><body>This is <strong>強い</strong>.</body></html>", // BODY
) ? "OK" : "ERROR";

