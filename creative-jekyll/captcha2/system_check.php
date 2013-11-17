<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>System Check</title>
<style type="text/css">
	body { background-color:#000000; color:#CCCCCC; font-family:Georgia, "Times New Roman", Times, serif; font-size:8pt; }
</style>
</head>

<body>
<?php
	if( phpversion() < '4.0.6' ) {
		echo 'Sorry, your PHP version (' .phpversion() .') is too old for this script to work, you might consider upgrading anyway!';	
	} else if( !extension_loaded('gd') ) {
		echo 'Sorry, this script needs GD version 2 or later, ask your hosting provider to help you or try 
		searching Yahoo! (Thats right Yahoo!) for "PHP GD 2 library", or take a look at this: http://www.boutell.com/gd/';	
	} else if( !function_exists('imagecreatetruecolor') || !function_exists('imagettftext') ) {
		echo 'Sorry, your PHP version doesn\'t support this script, you need to enable True Type support in your PHP, you may need to make PHP with
				True Type support, ask your hosting provider to help you or try searching Yahoo! (Thats right Yahoo!) for "PHP True Type support"';
	} else {
		echo 'You are ready to go!';		
	}
?>
</body>
</html>
