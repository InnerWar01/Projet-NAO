<?php
    session_start([
    'cookie_lifetime' => 7200,
    'read_and_close'  => true,]);
    
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include "$root/ProjetNAO/userBD/connBDD.php";

    $host = "127.0.0.1";
    $port = 333;
    $socket1 = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create socket\n");
    socket_connect ($socket1 ,$host,$port ) ;


    $output = $_POST['variable'];
   
    socket_write($socket1, $output, strlen ($output)) or die("Could not write output\n");
    socket_close($socket1) ;

?>