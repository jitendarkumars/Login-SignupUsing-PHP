<?php

$mysqli = new mysqli("localhost","root","","userdetails");
if($mysqli->connect_errno){
printf('connection failed %s ',$mysqli->connect_errno());
exit();
}
define("SITE_KEY", 'yourSecretKey');

function apiToken($session_uid)
{
    $key=md5(SITE_KEY.$session_uid);
    return hash('sha256', $key);
}
?>