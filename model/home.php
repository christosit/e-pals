<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 1/8/2016
 * Time: 3:47 PM
 */

include 'connect.php';
$choice = $_POST['choice'];
switch ($choice) {
    case 0:
        insert_post($dba);
        break;
    case 1:
        get_post($dba);
        break;
    case 2:
        get_category_name($dba);
        break;
    case 3:
        get_categories($dba);
        break;
    case 4:
        get_all_posts($dba);
        break;
}

function insert_post($dba){
    try
    {
        $user_id =$_POST['user_id'];
        $msg = $_POST['msg'];
        $date = date("Y-m-d");

        $q = "INSERT INTO posts (from_user,mesage, date_posted)
              VALUES           ( '$user_id','$msg','$date')";
        $r = $dba->query($q);
        if($r){
            echo json_encode(["post_id"=>$dba->lastInsertId()]);
        }
        else{
            echo 'error';
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

function get_post($dba){
    $post_id = $_POST['post_id'];
    $q = "SELECT user.*, posts.*
          FROM posts,user
          WHERE posts.id='$post_id'
          AND posts.from_user=user.user_id   ";
    $res = $dba->query($q);
    foreach($res as $row) {
        echo json_encode($row);
    }
}

function get_all_posts($dba){

    $q = "SELECT * FROM posts,user WHERE posts.from_user = user.user_id ORDER BY posts.id DESC ";
    $r = $dba->query($q);
    echo json_encode($r->fetchAll(PDO::FETCH_ASSOC));
}