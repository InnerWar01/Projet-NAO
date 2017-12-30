<?php
//headers to make the browser refresh

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("Cache-Control: private");

//create or continue a session

session_start();

// Clear destroy the session

if(@$_SESSION["login"]){

    $_SESSION["login"] = false;
    $_SESSION['p_id'] = false;
    $_SESSION['ex_id'] = false;
    session_destroy();
}

//finally redirect the user to the start page

header("location: http://localhost/ProjetNAO/home.php");
?>