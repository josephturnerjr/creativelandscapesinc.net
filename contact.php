<?php

$name = $_POST['name'];

// Mail of sender
$email = $_POST['email'];

// From
$header="from: $name <$email>";

// Phone of sender
$phone = $_POST['phone'];

// Fax of sender
$fax = $_POST['fax'];

// Comments or Message
$comments = $_POST['comments'];

$body= "Name: $name\n" .
            "Email: $email\n" .
			"Phone: $phone\n" .
			"Fax: $fax\n" .
			"$name said: $comments\n" .			

// Enter your email address
$to ='sturner1@sccoast.net';
$subject = "$name - Information Request";

$send_contact=mail($to,$subject,$body,$header);

// Redirect
header("Location: ../thankyou.html");
?>