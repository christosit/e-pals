<?php
include '../model/connect.php';
$age = "SELECT 	address,YEAR(birthday)
			FROM user";

$r = $dba->query($age);
$res = $r->fetchAll(PDO::FETCH_ASSOC);
print_r($res);