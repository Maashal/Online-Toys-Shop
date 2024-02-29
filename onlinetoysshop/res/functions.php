<?php
function alert($text){
    echo "<script>alert(\"$text\")</script>";
}

function location($text){
    echo "<script>location=\"$text\";</script>";
}

function confirm_admin(){
    if(!isset($_SESSION['user_role']) || $_SESSION['user_role']!="Admin"){
        alert("You'r not authorized.");
        header("refresh: .1, url=index.php");
        exit(0);
    }
}

function confirm_user(){
    if(!isset($_SESSION['user_role']) || $_SESSION['user_role']!="User"){
        alert("You'r not authorized.");
        header("refresh: .1, url=index.php");
        exit(0);
    }
}
?>
