
<?php
include'connect.php';



    $email = $_POST['email'];
    $user_id = $_POST['user_id'];
    $password =sha1($_POST['password']);
    $keep_me = $_POST['keep_me'];
    session_start();





    $login = "SELECT * FROM user WHERE email='$email' AND pass='$password' ";
    $login_result = $dba->query($login);


    if ($login_result -> rowCount() == 1) {//Right Creditentials

        $status = 1;
        $admin = 0;
        $verified = 0;
        $_SESSION['user_id'] = $user_id;



        foreach ($login_result as $row) {
            $name = $row['name'];
            $surname = $row['surname'];
            $phone = $row['phone'];
            $verified = $row['verified'];
            $admin = $row['isAdmin'];
            $id = $row['user_id'];

        }


        $_SESSION['user_id'] = $id;

        if ($admin == 1) {
            $_SESSION['admin'] = 1;
        }
        $data = [
            "user_id" => $id,
            "name" => $name,
            "admin" => $admin,
            "verified" => $verified,
            "status" => status($verified, $status)
        ];


        if ($keep_me == 1) {
            $cookie_name = 'keep_me';
            $time = time() + 31536000;
            setcookie($cookie_name, $email, $time, "/");
        }
    }
else{
    $data = [
        "status" => 0
    ];
}
        echo json_encode($data);


function status($verified, $status)
{
    if ($verified == 1) {
        return 1;
    } elseif ($verified == 0 && $status == 1) {
        return 2;
    }
}