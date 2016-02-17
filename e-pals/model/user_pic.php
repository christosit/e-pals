<?php
include 'connect.php';
$username = $dba->quote($_POST['email']);

$user_pic = "SELECT * FROM user WHERE email = $username";

$r = $dba->query($user_pic);
$path = "viewer/images/user.png";
foreach ($r as $row)
{
    $path = $row['photo'];
}
echo $path;