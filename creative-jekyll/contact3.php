<?php
session_start();
$host="localhost"; // Host name
$db_user="root"; // Mysql username
$db_password="pirate01"; // Mysql password
$db_name="form_validate"; // Database name
$tbl_name="year"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$db_user", "$db_password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $year
$year=$_POST['year'];

// To protect MySQL injection (more detail about MySQL injection)
$year = stripslashes($year);

$sql="SELECT * FROM $tbl_name WHERE year='$year'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $year, table row must be 1 row

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
			
if($count==1){
// Register $year and redirect to file "thankyou.html"
session_register("year");
$_SESSION['login'] = true;			

// Enter your email address
$to ='jasonc@thumbprintcms.com';
$subject = "$name - Information Request";

$send_contact=mail($to,$subject,$body,$header);

// Redirect
header("Location: ../thankyou.html");
}
else {
header("location:communicate_with2.html");
}

?>