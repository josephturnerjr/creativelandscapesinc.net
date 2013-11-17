<?php
$name = $_POST['name'];

$email = $_POST['email'];

$header="from: $name <$email>";

$proj_name = $_POST['project_name'];

$location = $_POST['location'];

$scope = $_POST['scope_of_work'];

$available = $_POST['where_available'];

$bid = $_POST['bid_date'];

$contact = $_POST['contact'];

$phone = $_POST['phone'];

$fax = $_POST['fax'];

$fax_accepted = $_POST['fax_accepted'];

$phone2 = $_POST['phone2'];

$project_type = $_POST['project_type'];

$construction_type = $_POST['construction_type'];

$location2 = $_POST['location2'];

$restrictions = $_POST['restrictions'];

$site_plan = $_POST['site_plan'];

$budget = $_POST['budget'];

$features = $_POST['existing_features'];

$body= "Request for bid information: \n" .
			"Project Name: $proj_name\n" .
			"Location: $location\n" .
			"Scope of Work: $scope\n" .
			"Plan and Specifications Available from Where?: $available\n" .
			"Bid Date: $bid\n" .
			"Contact: $contact\n" .
			"Phone: $phone\n" .
			"Fax: $fax\n" .
			"Can bid be accepted by Fax?: $fax_accepted\n" .
			" \n" .
			" \n" .
			"Interest in design work: \n" .
			"Name: $name\n" .
			"Phone: $phone2\n" .
			"Email: $email\n" .
			"Residential or Commercial Project: $project_type\n" .
			"New Construction or Renovation: $construction_type\n" .
			"Location: $location2\n" .
			"Any restrictions or requirements within the city or development: $restrictions\n" .
			"Do you have a site plan or plat of the project drawn to scale?: $site_plan\n" .
			"Budget? Needs to include irrigation or other improvements to the grounds: $budget\n" .
			"Any existing trees or other pertinent features that are not visible on the plat or survey?: $features\n" ;

// Enter your email address
$to ='sturner1@sccoast.net';
$subject = "Request Quote From $name";

$send_contact=mail($to,$subject,$body,$header);

// Redirect
header("Location: ../thankyou.html");
?>