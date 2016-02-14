<?php
include 'connect.php';
$choice = $_POST['choice'];
switch ($choice) {
    case 0:
       insert_interests($dba);
        break;
   case 1:
       get_interests($dba);
        break;
    case 2:
       get_category_name($dba);
        break;
    case 3:
        get_categories($dba);
        break;
}


function insert_interests($dba)
{

    $interests = $_POST['interest'];
    $cat = $_POST['category'];

    $user_id = $_POST['user_id'];
    $date_added = date('Y-m-d');

    for( $i=0; $i<count($interests); $i++)
    {

        $query = "INSERT INTO interests (user_id, date_added,title,category_name) VALUES('$user_id','$date_added','$interests[$i]','$cat[$i]')";
    $dba->query($query);}
    echo '1';
}

function get_interests($dba)
{
    $key =$_POST['keyword'];
    $query = "SELECT  * FROM interests WHERE title LIKE '$key%' GROUP BY title";
    $res = $dba->query($query);
    $data = array();
   foreach ($res as $row)
   {
       $title = $row['title'];
       array_push($data,$title);
   }
    echo json_encode($data);
}



function get_category_name($dba)
{
    $key = $_POST['keyword'];

    $query = "SELECT DISTINCT category_name FROM interests WHERE category_name LIKE '$key%' GROUP BY category_name";
    $res = $dba->query($query);
    $data = array();
    foreach ($res as $row) {
        $title = $row['category_name'];
        array_push($data, $title);
    }
    echo json_encode($data);

}
    function get_categories($dba){
        $q = "SELECT DISTINCT category_name FROM interests";
        $res = $dba->query($q);
        echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
    }

