<nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand navbar-link" href="http://localhost/ProjetNAO/home.php"><img src="http://localhost/ProjetNAO/assets/img/navbar/nao-logo.gif" id="logo"><img src="http://localhost/ProjetNAO/assets/img/navbar/logo.png" id="logo_img"> </a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="http://localhost/ProjetNAO/home.php">Home</a></li>
                <li role="presentation"><a href="http://localhost/ProjetNAO/enjoy/enjoy.php">Enjoy</a></li>
                <li role="presentation"><a href="<?php 
                                                    //If user is logged in then he can access the training page. If not he has to sign in
                                                    if(isset($_SESSION['login'])) 
                                                                echo "http://localhost/ProjetNAO/training/projets.php"; 
                                                            else echo "http://localhost/ProjetNAO/userBD/connexion.php";?>">Training</a></li>
                <li role="presentation"><a href="http://localhost/ProjetNAO/about.php">About</a></li>
                <li role="presentation"><a href=<?php 
                                                    //If user is logged in a log out icon appears. If not a log in icon
                                                    if(isset($_SESSION['login'])) 
                                                                echo "'#' onClick='alertBox()'><i class='glyphicon glyphicon-log-out'></i>"; 
                                                            else echo "'http://localhost/ProjetNAO/userBD/connexion.php'><i class='glyphicon glyphicon-log-in'></i>";?></a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function alertBox() {
        //Function that displays a popup box and redirects to the right page depending on the answer
        if (confirm("Are you sure you want to logout ?") == true) {
            window.location.replace("http://localhost/ProjetNAO/userBD/logout.php");
        } else {
            window.location.replace("http://localhost/ProjetNAO/training/projets.php");
        }
    }
</script>