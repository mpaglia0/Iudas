<?php

// Try to stop SPAM with the honeypot method
if($_POST['phone_number']) {
   exit();
}

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
   $to = 'info@mauriziopaglia.it';
   $email_subject = "Nuovo Contatto";
   $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
   $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
   $headers .= 'From: ' . $email_address;
   $email_body = "Hai ricevuto un nuovo messaggio!\n\n"."Ecco i dettagli:\n\nNome: $name\n\nOggetto: $subject\n\nMessaggio:\n$message";
   $body_encoded = base64_encode($email_body);
   mail($to, $email_subject, $body_encoded, $headers);
   header('Location: /grazie.html');
return true;
}

elseif(empty($subject)) {
   header('Content-type: text/html; charset=utf-8');
   $to = 'info@mauriziopaglia.it';
   $email_subject = "Nuovo Commento";
   $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
   $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
   $headers .= 'From: ' . $email_address;
   $email_body = "Hai ricevuto un nuovo commento!.\n\n"."Ecco i dettagli:\n\nNome: $name\n\nTitolo articolo: $title\n\nSito web: $website\n\nMessaggio:\n$message";
   $body_encoded = base64_encode($email_body);
   mail($to, $email_subject, $body_encoded, $headers);
   header('Location: /grazie.html');
return true;
}

else {
   return false;
}

?>
