<?php



	require_once "Mail.php";
	$from = "<from.gmail.com>";
	//$to = 'aelg34@gmail.com';
	$to = $_POST['email'];
	$subject = "Hi! from e-Pals";
	$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject);

//$link ='localhost/cotrax/model/verification.php".?verification_code=.urlencode($hash)' ;
	//$rand='ddd';
	$body = " Hi,\n\nHow are you?\n\n
    Please click the link below to reset your Password
    http://localhost/Box%20Sync/e-pals/viewer/forgot_password.php?code=$rand";


	$host = "ssl://smtp.gmail.com";
	$port = "465";
	$username = "ch.ioannides93@gmail.com";
	$password = "X99310725I";
	$smtp = Mail::factory('smtp', array(
		'host' => $host,
		'port' => $port,
		'auth' => true,
		'username' => $username,
		'password' => $password));
	$mail = $smtp->send($to, $headers, $body);
	if (PEAR::isError($mail)) {
		echo("<p>" . $mail->getMessage() . "</p>");
	}


 ?>