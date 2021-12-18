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
   $to = 'info@mauriziopaglia.it';
   $email_subject = "Nuovo Contatto";
   $email_body = "Hai ricevuto un nuovo messaggio!\n\n"."Ecco i dettagli:\n\nNome: $name\n\nEmail: $email_address\n\nOggetto: $subject\n\nMessaggio:\n$message";
   mail($to, $email_subject, $email_body);
   header('Location: /grazie.html');
return true;
}

elseif(empty($subject)) {
   $to = 'info@mauriziopaglia.it';
   $email_subject = "Nuovo Commento";
   $email_body = "Hai ricevuto un nuovo commento!.\n\n"."Ecco i dettagli:\n\nNome: $name\n\nEmail: $email_address\n\nTitolo articolo: $title\n\nSito web: $website\n\nMessaggio:\n$message";
   mail($to,$email_subject,$email_body);
   header('Location: /grazie.html');
return true;
}

else {
   return false;
}

?>
