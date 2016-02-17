<?PHP
/*Include database connection*/
include 'connect.php';


$code = $dba->quote($_GET['code']);
/*Get the code from the url.*/
//$hash = $dba->quote($_GET['login_hash']);
/*Check if the user_id and the code exist in the database.*/
$check = "SELECT user_id FROM user WHERE login_hash=$code";//" AND hash=$hash";
//Piase to id e to pedio verified
$r_check =$dba->query($check);


if($r_check->rowCount()==1) {
	foreach ($r_check as $row) {
		$user_id = $row['user_id'];
	}
	$dba->exec("UPDATE user SET verified = 1 WHERE user_id ='$user_id'");
	header("Location:../login.php");
}
else {//if = 1 already verified
	echo "<b>Invalid code!</b>";
} 
?>