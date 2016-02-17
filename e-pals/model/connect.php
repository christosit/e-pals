<?php
try
{
    $dba = new PDO('mysql:host=localhost;dbname=e_pals','root','');
    $dba->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //var_dump($dbh);
}

catch(PDOException $e)
{
    echo $e -> getMessage();
    die();
}



?>
