<?php

include_once('connection.php');
$token=$_POST['token'];
$email=$_POST['email'];
$pass= $_POST['new_password'];
$query = 'SELECT * FROM `emailtoken` WHERE email="' . $email . '"and token="' .$token .'"';
if ($result=mysqli_query($mysqli,$query))
{
    $res=array();
    if ($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
        $pass=md5($pass);
        $query1="update users set password='{$pass}'  where email='{$email}'";
        if(mysqli_query($mysqli,$query1)) {
              $res[] = array("status" => 1);

        }
        else{
            echo "failed to update password";
            $res[] = array("status" => 0);
        }
    }
    else{
        echo "Invalid User";
        $res[] = array("status" => 0);
    }
    echo json_encode($res);
}

?>