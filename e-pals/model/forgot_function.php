<?php
include 'connect.php';
include'send_email.php';
try {
    $email = $_POST['email'];
    $rand = chr(mt_rand(97, 122)) . substr(md5(time()), 1);

    $forgot = "UPDATE user  SET forgot_hash = '$rand' WHERE email='$email'  ";

    $forgot_r = $dba->query($forgot);
    send_mail($rand);
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>