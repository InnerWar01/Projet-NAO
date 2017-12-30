<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include "$root/ProjetNAO/userBD/connBDD.php";
	
	session_start();
	
	// define variables and set to empty values
	$registerErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$valid = true;

	$login = test_input($_POST["login"]);
	$password = test_input($_POST["password"]);
	
	$query1="SELECT login FROM  user WHERE login='".$_POST['login']."' ";
	$result=$link->query($query1);
	
	//We check if there is already a user with this login
	if ($result->num_rows == 1) {
		$valid=false;
		$registerErr = "Sorry, there is already an user with this username. Please, choose another one.";
	}
	
	//If it is a unique login then we create a new user in the database
	//Also, we initialize all the exercises to an "incomplete" state
	//for the new user
	if($valid){
		$sql = "INSERT INTO `user` (`login`, `password`) 
				VALUES ('{$_POST['login']}', '{$_POST['password']}')";

		$sql1 = "SELECT e.Exercise_id
				 FROM exercise e";
		$result = $link->query($sql1);

		if ($link->query($sql) === TRUE && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo $row['Exercise_id'];
				$sql2 = "INSERT INTO `state_exercise` (`Exercise_id`, `Login`) 
					     VALUES ('{$row['Exercise_id']}', '{$_POST['login']}')";
				$result1 = $link->query($sql2);
			}
		} else {
			echo "Error: " . $sql . "<br>" . $link->error;
			echo "Error: " . $sql1 . "<br>" . $link->error;
			echo "Error: " . $sql2 . "<br>" . $link->error;
		}
		$_SESSION["login"] = $_POST["login"];
		header('Location: http://localhost/ProjetNAO/training/projets.php');
	}
}

//Changes the data so that it doesn't have unnecessary characters, blackslashes
//and converts special characters to HTML entities
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>