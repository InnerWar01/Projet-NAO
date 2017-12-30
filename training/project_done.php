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
    <title>Enjoy</title>
    <?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/head.php";
	?>
    <link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/projectDone.css">
</head>

<body>
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/navbar.php";
	?>

    <div id="congrats">
        <img id="prize" src="http://localhost/ProjetNAO/assets/img/congrats.png" alt="Congrats">
    </div>

    <?php
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);

        include "$root/ProjetNAO/footer.php";
	?>

    <script src="http://localhost/ProjetNAO/assets/js/jquery.min.js"></script>
    <script src="http://localhost/ProjetNAO/assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>