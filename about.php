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
    <title>About</title>
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/head.php";
	?>
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/about.css">
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/home.css">
</head>

<body class="body">
	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/navbar.php";
	 ?>

	<div class="about">
	</div>
	
    <div>
		<h2>Discover each teacher by clicking on the pictures below!</h2>
        <div class="row">
		    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="col_left">
				<img class="img-responsive" src="assets/img/about/nao_about.png">
			</div>
		
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="col_left">
				<div class="hovereffect">
					<img class="img-responsive" src="assets/img/about/adeline.gif">
					<div class="overlay">
						<h2>A D E L I N E</h2>
						<p>Conscientious, dreamer and innovator, Adeline will train you in a ludic way,
						respecting romanticism and sensibility for the world surrounding us.</p>
					</div>
				</div>
			</div>

		    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="hovereffect">
					<img class="img-responsive" src="assets/img/about/naomi.gif">
					<div class="overlay">
						<h2>N A O M I</h2>
						<p>Creative, full of life and enterprising, Naomi will guide you with her
						French-Spanish culture and her spirit for a healthy and vegan lifestyle.	
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="hovereffect">
					<img class="img-responsive" src="assets/img/about/patricia.gif">
					<div class="overlay">
						<h2>P A T R I C I A</h2>
						<p>Meticulous, open-minded and nature lover, Patricia will pratice with you
						with her Moldovan accent and her keen sense of greatness.
						</p>
					</div>
				</div>
			</div>
		</div>
		
    </div>


	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/footer.php";
	 ?>
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>