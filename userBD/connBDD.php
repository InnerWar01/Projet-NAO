<?php
	//Connecting to the database with the following credentials: 
	//(localhost, user, password, database name)
	$link = new mysqli ("localhost","","","panc");
	if ($link->connect_error) {
    	die("Connection failed: " . $link->connect_error);
	} 
?>