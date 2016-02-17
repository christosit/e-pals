
<?php
/**
 * Created by PhpStorm.
 * User: christos
 * Date: 2/14/2016
 * Time: 3:17 PM
 */
include 'connect.php';
$key =$_GET['query'];
$query = 'SELECT  interests.*,user.*
          FROM user,interests
          WHERE user.user_id = interests.user_id
          AND (user.name LIKE "%'.$key.'%"
          OR user.surname LIKE "%'.$key.'%"
          OR interests.title LIKE "%'.$key.'%" )
          GROUP BY user.user_id, interests.user_id LIMIT 5';

echo $query;
$r1 = $dba->query($query);
echo json_encode($r1->fetchall(PDO::FETCH_ASSOC));
