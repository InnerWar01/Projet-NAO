<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/head.php";
	?>
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/sign.css">
</head>

<body id="body">
	<?php	
			$root = realpath($_SERVER["DOCUMENT_ROOT"]);
			include "$root/ProjetNAO/navbar.php";
			require "$root/ProjetNAO/userBD/gestinsc.php";
	?>

	<div id="form_container">
		<div id="form-content">	
		
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<fieldset>
					<legend>Register</legend>
						<input type="text" name="login" placeholder="Login" required>
						<input type="password" name="password" placeholder="Password" required/>
				</fieldset>
				
				<div class="err">
					<span class="error"><?php echo $registerErr;?></span>
				</div>
				
				<div class="sign">
						You already have an account ? Well, what are you waiting for, <a href="http://localhost/ProjetNAO/userBD/connexion.php">sign in </a>!
				</div>
				<input type="submit" value="SIGN UP" id="submit">
			</form>
		</div>
	</div>
	
	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/footer.php";
	?>
	
    <script src="http://localhost/ProjetNAO/assets/js/jquery.min.js"></script>
    <script src="http://localhost/ProjetNAO/assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
 