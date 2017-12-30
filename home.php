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
    <title>Home</title>
    <?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/head.php";
	?>
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/styles.css">
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/home.css">
	
</head>

<body id="body">
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/navbar.php";
	?>
	
    <div id="slide">
        <div class="jumbotron">
            <h1>Discover NAO robot</h1>
            <p class="home_p">Learn, have fun easily</p>
            <p class="home_p"><a class="btn btn-default" role="button" href="
            
                <?php 
                    //If user is logged in he has access to the project page. If not he will be redirected to the sign in page
                    
				    if(isset($_SESSION['login'])) 
						echo "http://localhost/ProjetNAO/training/projets.php"; 
					else echo "http://localhost/ProjetNAO/userBD/connexion.php";?>"> <?php if(isset($_SESSION['login'])) 
																	                    echo "Go Train !"; 
																                    else 
                                                                                        echo "Sign in";?>
                </a>
            </p>
        </div>
    </div>
    <div class="container">
        <h2>Creating, inventing and programming </h2>
        <div class="row">
            <div class="col-md-6" id="col_left"></div>
            <div class="col-md-6" id="col_right">
                <h3>Who is NAO?</h3>
                <p class="home_p"><strong>58 cm</strong> in height, NAO is our&nbsp;<strong>first humanoid robot</strong>. He has continually been evolving since the beginning of his adventure in 2006. </p>
                <p class="home_p">Currently in his 5th version, about&nbsp;<strong>10 000 NAO</strong> have already been sold throughout the world.NAO is an&nbsp;<strong>interactive</strong> companion robot. </p>
                <footer></footer>
            </div>
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