<?php
	session_start([
    'cookie_lifetime' => 7200,
    'read_and_close'  => true,]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/head.php";
	?>
	<link rel="stylesheet" type="text/css" href="http://localhost/ProjetNAO/assets/css/sign.css" />
</head>
<body id="body">
	<?php	
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/navbar.php";
		require "$root/ProjetNAO/userBD/gestconn.php";
	?>

	<div id="form_container">
		<div id="form-content">	
			<!--If user is connected then a logout button is displayed. If not a form connexio -->
			<?php if(isset($_SESSION['login']))
					echo "<div id='button'>
							<button type='button' onclick='alertBox()'>Logout</button>
						</div>";
				  else {
					$root = realpath($_SERVER["DOCUMENT_ROOT"]);
					include "$root/ProjetNAO/userBD/formConnexion.html";
				  }
			?>
		</div>
	</div>

	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/footer.php"; 
	?>
	
    <script src="http://localhost/ProjetNAO/assets/js/jquery.min.js"></script>
    <script src="http://localhost/ProjetNAO/assets/bootstrap/js/bootstrap.min.js"></script>
	<script>
	//Funciton that displays a popup box that alerts the user
		function alertBox() {
			if (confirm("Are you sure you want to logout ?") == true) {
				window.location.replace("logout.php");
			} else {
				window.location.replace("http://localhost/ProjetNAO/training/projets.php");
			}
		}
	</script>
</body>

</html>