<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 2/14/2016
 * Time: 3:17 PM
 */
include 'connect.php';
$key =$_POST['query'];

$query = 'SELECT DISTINCT user.*, interests.*
          FROM user,interests
          WHERE ((user.name OR user.surname)  LIKE "%'.$key.'%")

          OR interests.title LIKE "%'.$key.'%"
          LIMIT 5';
$r1 = $dba->query($query);
echo json_encode($r1->fetchall(PDO::FETCH_ASSOC));