<?php
    session_start([
    'cookie_lifetime' => 7200,
    'read_and_close'  => true,]);
    
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include "$root/ProjetNAO/userBD/connBDD.php";

    $host = "127.0.0.1";
    $port = 2000;
    $socket1 = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create socket\n");
    socket_connect ($socket1 ,$host,$port ) ;


    $output = $_POST['variable'];
   
    socket_write($socket1, $output, strlen ($output)) or die("Could not write output\n");
	sleep(1);
	$buf='mon buffer';
    //The answer that we receive from the Python server
    $reply = socket_recv($socket1, $buf, 1, MSG_WAITALL);

    //If it's a positive response then the exercise was completed 
    //and we update the state of the exercise
    if ($buf == '0') {

        $sql = "UPDATE state_exercise
                SET state = 'complete'
                WHERE Exercise_id = '{$_SESSION['ex_id']}'";

        $result = $link->query($sql);
    }

    socket_close($socket1) ;

?>