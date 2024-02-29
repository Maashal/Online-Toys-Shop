<?php
session_start();
include 'connection.php'; 
include 'res/functions.php';

if(isset($_GET['table'])){
    extract($_GET);
    $query="delete from $table where $table_id = $delete_id ";
    if(!mysqli_query($link, $query)){
        alert(mysqli_error($link));
    }
    $ref=$_SERVER['HTTP_REFERER'];
  header("location:$ref");
}

?>