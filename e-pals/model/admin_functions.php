<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 11/20/2015
 * Time: 11:19 AM
 */


include 'connect.php';
$choice = $_POST['choice'];
switch ($choice) {
    case 0:
        edit_interests($dba);
        break;
    case 1:
        get_interests($dba);
        break;
    case 2:
        get_category_name($dba);
        break;
    case 3:
        make_chart($dba);
        break;
    case 4:
        make_chart2($dba);
        break;
    case 5:
        save_changes($dba);
        break;
    case 6:
        get_daemon_data($dba);
        break;
    case 7:
        get_name_category($dba);
        break;
    case 8:
        update_attended($dba);
        break;

}



function get_interests($dba)
{
    $query = "SELECT  DISTINCT category_name,title,interest_id FROM interests";
    $res = $dba->query($query);
    echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));

}

function get_name_category($dba){
    $query = "SELECT  DISTINCT category_name FROM interests";
    $res = $dba->query($query);
    echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
}


function edit_interests($dba){

    $interest_id = $_POST['interest_id'];
    $title = $_POST['title'];
    $category_name = $_POST['category_name'];
    $date_edit = date("Y-m-d");
    $q = "UODATE interests
            SET title ='$title', category_name='$category_name',date_edit='$date_edit'
      WHERE interest_id = '$interest_id'";
    $r = $dba->query($q);
    echo '1';
}


function make_chart($dba)
{
    $q = "SELECT COUNT(*) AS count_cat,category_name
          FROM interests GROUP BY category_name
          ORDER BY count_cat DESC
           LIMIT 5";
    $r = $dba->query($q);


    $i=0;
   // echo json_encode($r->fetchAll(PDO::FETCH_ASSOC));
    $data = array();
    foreach ($r as $interests) {

        $color = "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).")";
        $temp = array(
            'value' => $interests['count_cat'],
            'color'=> $color,
            'highlight '=>"yellow",
            'label' => ucfirst($interests['category_name'])
        );

        $i++;
        if($i==2) $i=0;
        array_push($data,$temp);

    }
    //echo json_encode($data);
    echo json_encode($data);

}
function make_chart2($dba)
{
    //$limit = $_POST['limit'];
    $limit = 2;
    //$q = "SELECT * FROM interests LIMIT '$limit'";
    $q = "SELECT COUNT(*) AS count_cat,name
          FROM user GROUP BY name
          ORDER BY count_cat DESC";
    $r = $dba->query($q);
    $data  = [];

    $months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    $labels = ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"];
    foreach ($months as $month) {
        $user_per_month = "SELECT COUNT(*) AS user_count FROM user WHERE register_add='$month'";
        $r = $dba->query($user_per_month);
        foreach ($r as $c) {
            array_push($data, $c['user_count']);
        }
    }
  /*  datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },*/
        $color = "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).")";
        $temp = [
                    'labels'=> $labels,
            'datasets'=>
                        [

                        'fillColor'=> $color,
                        'strokeColor'=> "rgba(0,0,0,1)",
                        'pointColor'=> "rgba(100,110,120,1)",
                        'pointStrokeColor'=> "#fff",
                        'pointHighlightFill'=> "#ddd",
                        'pointHighlightStroke'=> "rgba(220,220,220,1)",
                        'data'=>$data
                    ]
                ];
    echo json_encode($temp);
   // echo json_encode($data);

}

function  save_changes($dba){
    $id = $_POST['id'];
    $title = $_POST['value'];

        $dba->exec("UPDATE interests SET category_name ='$title' WHERE interest_id='$id'");

   echo '1';
}


function get_daemon_data($dba)
{
    include 'functions.php';

    $session_user_id = $_POST['user_id'];
    $rtn_arr = [];

    $q = "SELECT DISTINCT matched_user_id
          FROM matching
          WHERE user_id = '$session_user_id'
          AND attented= 0";
    $r = $dba->query($q);

    foreach($r as $u) {
        $user = $u['matched_user_id'];
        $q = "SELECT user.name,user.surname,user.email,interests.title,matching.id
              FROM user,interests, matching
              WHERE user.user_id = '$user'
              AND interests.user_id='$user'";
        $data = $dba->query($q);
        $d = $data->fetch(PDO::FETCH_ASSOC);

        $new = [
            "name"=>$d['name'],
            "surname"=>$d['surname'],
            "email"=>$d['email'],
            "title"=>$d['title'],
            "user_id"=>$user,
            'id'=>$d['id']

            ];
        array_push($rtn_arr,$new);
    }

    echo json_encode($rtn_arr);
}

function update_attended($dba)
{
    $not_id = $_POST['not_id'];
    return $dba->exec("UPDATE matching SET attented=1 WHERE id='$not_id'");
}





