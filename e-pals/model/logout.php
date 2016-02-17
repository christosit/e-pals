<?php
	session_start();
	session_unset();
	unset($_SESSION["user_id"]);
	setcookie("keep_me", '', strtotime( '-5 days' ), '/');
	header("Location:../viewer/login.php");
?>
