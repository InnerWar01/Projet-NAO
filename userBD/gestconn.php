<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	include "$root/ProjetNAO/userBD/connBDD.php";
	
	$signErr = "";
	//We retrieve the information inserted in the form and we check their validity
		if(!empty($_POST['login']) && !empty($_POST['password'])){
		
			$query1="SELECT password FROM  user WHERE login='".$_POST['login']."' ";
			$result1=$link->query($query1);
			
			if ($result1->num_rows==1 && $result1->fetch_assoc()['password'] == $_POST['password']){			
				$_SESSION['login']=$_POST['login'];
				header('Location: http://localhost/ProjetNAO/training/projets.php');
			}
			else {
				$signErr="Sorry, wrong details. Try again.";
			}
		}
	$link->close();	
?>
 
