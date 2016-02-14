<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 9/12/2015
 * Time: 6:35 PM
 */

include 'connect.php';
$username = $_POST['username'];

    $query = "UPDATE user SET name WHERE username ='$username'";


    $result = $dba->query($query);


