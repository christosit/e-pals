<?php

/**
 * Created by PhpStorm.
 * User: christos
 * Date: 12/14/2015
 * Time: 12:16 PM
 */
require_once('../model/connect.php');


$query_newsfeed = "SELECT * FROM feed ORDER BY feed_id DESC ";
$r= $dba-> query($query_newsfeed);
echo json_encode($r->fetchAll(PDO::FETCH_ASSOC));
$data="";
foreach ($r as $row) {
 $data .= '<item>';
 $data .= '<title>'.$row['title'].'</title>';
 $data .= '</item>';
}

echo $data;



?>