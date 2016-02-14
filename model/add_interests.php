<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 9/24/2015
 * Time: 12:08 AM
 */
include "connect.php";

$interests_array = explode(',',$_POST['interests_array']);
$user_id = get_id($_POST['username'],$dba);
$date = date('Y-m-d');

try {
    foreach ($interests_array as $interest) {

        $query = "INSERT INTO interests (title,date_added,user_id) VALUES ('$interest','$date','$user_id')";
        $r = $dba->query($query);
    }
}
catch (Exception $e)
{
    echo $e -> getMessage();
}

function get_id($username,$dba)
{
    $r = $dba->query("SELECT * FROM user WHERE username='$username'");
    foreach($r as $row)
    {
        $user_id=$row['user_id'];
    }
    return $user_id;
}

