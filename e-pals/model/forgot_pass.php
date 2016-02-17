  <?php
include 'connect.php';
try {
    ///$user = $_POST['username'];
    $pass = $_POST['pass'];
    $code = $_POST['code'];
    $arr = array("code"=>$code,
    "pass"=>$pass);
    echo json_encode($arr);


    $forgot = "UPDATE user  SET pass ='$pass' WHERE forgot_hash='$code'";

    $forgot_r = $dba->query($forgot);

}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>