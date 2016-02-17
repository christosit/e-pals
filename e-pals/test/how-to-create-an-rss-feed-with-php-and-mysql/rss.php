<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : How to Create an RSS Feed with PHP and MySQL
*/

// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=e_pals', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();

// posts *******************************
$sql = 'SELECT * FROM post ORDER BY id DESC';
$query = $pdo->prepare($sql);
$query->execute();
$rs_post = $query->fetchAll();

// The XML structure
$data = '<?xml version="1.0" encoding="UTF-8" ?>';
$data .= '<rss version="2.0">';
$data .= '<channel>';
$data .= '<title>Bewebdeveloper : Free web tutorials</title>';
$data .= '<link>http://www.bewebdeveloper.com</link>';
$data .= '<description>Free Web tutorials with source code, PHP Tutorials, JavaScript Tutorials, HTML Tutorials and CSS Tutorials</description>';
foreach ($rs_post as $row) {
    $data .= '<item>';
    $data .= '<title>'.$row['title'].'</title>';
    $data .= '<link>'.$row['link'].'</link>';
    $data .= '<description>'.$row['description'].'</description>';
    $data .= '</item>';
}
$data .= '</channel>';
$data .= '</rss> ';

header('Content-Type: application/xml');
echo $data;
?>