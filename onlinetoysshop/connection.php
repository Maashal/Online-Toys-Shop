<?php
//connecting db 
$server='localhost';
$user='root';
$pass='';
$db='kidzone';
$link= mysqli_connect($server, $user, $pass, $db);
if(!$link){
    echo mysqli_connect_error();
    exit();
}

?>