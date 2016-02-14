<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 9/6/2015
 * Time: 9:23 PM
 */


include 'connect.php';
include 'functions.php';

switch ($_POST['choice']) {
    case 0:
        get_user_data($dba);
        break;
    case 1:
        get_user_interests($dba);
        break;
    case 2:
        update_interest($dba);
        break;
    case 3:
        save_photo($dba);
        break;
    case 4:
        send_msg($dba);
        break;
    case 5:
        get_msg($dba);
        break;
    case 6:
        mark_as_read($dba);
        break;
    case 7:
        check_fb($dba);
        break;
    case 8:
        mark_as_read_not($dba);
        break;
    case 9:
        get_user_data_all($dba);
        break;
    case 10:
        search();
}
function get_user_data($dba)
{
  //  $user = get_user('email','aelg34@gmail.com',$dba);

//    $user_id = $user['user_id'];
    $user_id = $_POST['user_id'];

    $user_data = "SELECT * FROM user
              WHERE user_id = '$user_id'";
    $r1 = $dba->query($user_data);

    $data1 = $r1->fetch(PDO::FETCH_ASSOC);
    echo json_encode($data1);
}

function get_user_interests($dba){
    //$user = get_user('email','aelg34@gmail.com',$dba);
    $user_id = $_POST['user_id'];

    //$user_id = $user['user_id'];

    $user_interests = "SELECT title,interest_id,category_name
                      FROM interests
                      WHERE user_id='$user_id'";
    $r2 = $dba->query($user_interests);

    echo json_encode($r2->fetchAll(PDO::FETCH_ASSOC));


}

function update_interest($dba)
{
   // $user = get_user('email','aelg34@gmail.com',$dba);
    $user_id = $_POST['user_id'];
    $interest_id = $_POST['interest_id'];
    $interests_cat = $_POST['interest_cat'];
    $interests_title = $_POST['interest_title'];
    for ($i = 0; $i<count($interest_id); $i++){


        $in[0]= $interests_title[$i];//title
        $in[1]=$interests_cat[$i];//cat id
        $in[2] = $interest_id[$i];//in id


        $q = "UPDATE interests SET title='$in[0]', category_name='$in[1]' WHERE user_id=$user_id AND interest_id='$in[2]'";
        echo $q;
        $dba->exec($q);


        //$dba->exec("INSERT INTO uncategorized (user_id, interest_text) VALUES ('$user_id','$interest')");
    }

    echo 'ok';


}
function save_photo($dba){

    $photo ="../viewer/images/". $_POST['photo'];
    $user_id  = $_POST['user_id'];
    $query = "UPDATE user SET photo ='$photo' WHERE user_id = '$user_id' ";
    $r=$dba->exec($query);
    echo '1';
}

function send_msg($dba){
    $msg = $_POST['msg'];
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $date = date('Y-m-d H:i:s');
    $q = $dba->exec("INSERT INTO   chat (`from`, `to`, message, date_sent) VALUES ('$sender', '$receiver', '$msg', '$date')");
    echo 'ok';
}

function get_msg($dba){
   $receiver = $_POST['user_id'];
    $q = "SELECT user.*, chat.*
          FROM  user,chat
          WHERE chat.to= '$receiver'
          AND user.user_id = chat.from
          AND chat.`read`=0
          ORDER BY chat.id DESC ";
    $r2 = $dba->query($q);
    echo json_encode($r2->fetchAll(PDO::FETCH_ASSOC));
}



function mark_as_read($dba){
    $msg_id = $_POST['msg_id'];
    echo $dba->exec("UPDATE chat SET `read` = 1 WHERE id='$msg_id'");

}function mark_as_read_not($dba){
    $msg_id = $_POST['msg_id'];
    echo $dba->exec("UPDATE chat SET `read` = 1 WHERE id='$msg_id'");

}


function check_fb($dba)
{
    session_start();
    $f_email = $_POST['email'];
    $f_name = explode(' ',$_POST['name']);
    $f_photo ="https://graph.facebook.com/".$_POST['photo']."/picture?type=large";
    $n = $f_name[0];
    $s = $f_name[1];



    $exists = "SELECT user_id FROM user WHERE email='$f_email' ";
    $r = $dba->query($exists);
    if ($r->rowCount() == 1) {
        foreach($r as $row){
            $id =  $row['user_id'];
            $_SESSION['user_id'] =$id;
            $update = "UPDATE user SET name='$n', surname='$s', photo='$f_photo' WHERE user_id='$id'";
            $dba->exec($update);
           echo 'ok';
        }
    }
    else echo 'register';
}
function get_user_data_all($dba)
{
    //  $user = get_user('email','aelg34@gmail.com',$dba);

//    $user_id = $user['user_id'];
   

    $user_data = "SELECT * FROM user
             ";
    $r1 = $dba->query($user_data);

   echo json_encode($r1->fetchall(PDO::FETCH_ASSOC));
  
}
function search(){

    $mysqli = new mysqli("localhost", "root", "", "e_pals");

    // check connection
    if ($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = 'SELECT user.*, interests.* FROM user,interests';

    if(isset($_POST['query'])){
        // Add validation and sanitization on $_POST['query'] here

        // Now set the WHERE clause with LIKE query
        $query .= ' WHERE user.name OR user.surname OR interests.title LIKE "%'.$_POST['query'].'%" LIMIT 5';
    }

    $return = array();

    if($result = $mysqli->query($query)){
        // fetch object array
        $obj = $result->fetch_object();
        $return[] = $obj->name;
        $return[] = $obj->surname;
        $return[] = $obj->title;
        $return[] = $obj->photo;

        // free result set
        $result->close();
    }

    // close connection
    $mysqli->close();

    $json = json_encode($return);
    print_r($json);}