<?php
	include 'connect.php';
	$email = $_POST['email'];
	$exists = "SELECT * FROM user  WHERE email='$email'";
	$result = $dba->query($exists);
	$count=$result->rowCount();
	if($count>0)//Exists
	{
		echo '1';
	}//shiashuri
	else
	{
		echo '0';
	}









?> 