<?php
include 'send_mail2.php';


try
{
    include 'connect.php';

    $name = $dba->quote($_POST['name']);
    $surname = $dba->quote($_POST['surname']);
    $email = $dba->quote($_POST['email']);
    $pass = $dba->quote(sha1($_POST['password']));
    //$encrypted_pass = sha1($pass);
    $address = $dba->quote($_POST['address']);
    $gender = $dba->quote($_POST['genre']);
    $birthday = $dba->quote($_POST['birthday']);
    //$hash = substr(md5(uniqid(mt_rand(), true)), 0, 5);
    $rand = chr( mt_rand( 97 ,122 ) ) .substr( md5( time( ) ) ,1 );
    $register_date = date('F');



    //Generate Random Number
    $register = "INSERT INTO   user ( name, surname, email, pass, gender,  address,birthday,login_hash,register_add)
                              VALUES ($name,$surname,$email,$pass,$gender,$address,$birthday,'$rand','$register_date')";
    $dba->exec($register);
    send_mail($rand);
        }
catch(Exception $e)
{
    echo $e->getMessage();
}

