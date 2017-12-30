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
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/home.css">
	<link rel="stylesheet" href="http://localhost/ProjetNAO/assets/css/enjoy.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/ProjetNAO/assets/css/exercer.css" />

	<!-- function that gets called once Blockly frame loads //-->
    <script src="http://localhost/ProjetNAO/training/jquery.js"></script>
	<script type="text/javascript">
		window.blockly_loaded = function(blockly) {
			return window.Blockly = blockly;
		}
		window.run_code = function() {
			code = window.Blockly.JavaScript.workspaceToCode();
            $.post('client.php', {variable: code});
			eval(code);
		}
	</script>
</head>

<body id="body">
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/navbar.php";
	?>
	
	<div id="intro">
	<div class="col-md-6" id="intro_left">
		<p id="p_enjoy">This page is for you, so, enjoy yourself! ;)</p>
		<ul id="ul_enjoy">
			<li><a class="li_enjoy" href="#datasheet">Discover NAO features</a></li>
			<li><a class="li_enjoy" href="http://doc.aldebaran.com/2-1/nao/basic_channel_conversation.html" target="_blank">Interact with NAO</a></li>
			<li><a class="li_enjoy" href="#blocks">Discover new possibilites with the code blocks</a></li>
		</ul>
	</div>
	<div class="col-md-6" id="col_enjoy_right">
		<img src="http://localhost/ProjetNAO/assets/img/enjoy/intro.jpg" id="img_intro"/>
	</div>
	
	
<script>
	//Function that writes the given text - txt - in the dialog bubble
	function writeText(txt) {
    	document.getElementById("desc").innerHTML = txt;
	}
</script>
	
    <div id="enjoy">
		<!-- Map with clickble areas on the image -->
		<h2 id="datasheet">Discover NAO datasheet</h2>
		<div id="div_desc"><p id="desc">Touch an area of NAO </br>and discover what it is!</p></div>
		<img src="http://localhost/ProjetNAO/assets/img/enjoy/nao_debout.gif" id="img_enjoy" usemap="#enjoymap" />
		<map name="enjoymap">
			<area shape ="rect" coords ="225,0,283,20" onmouseover="writeText('Tactile head sensors')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="250,55,260,70" onmouseover="writeText('Camera 1')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="250,110,260,125" onmouseover="writeText('Camera 2')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="200,70,230,100" onmouseover="writeText('Infrared emmiter/receiver and eyeleds')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="275,70,305,100" onmouseover="writeText('Infrared emmiter/receiver and eyeleds')" target="_self" alt="head" href="#comments" />
			
			<area shape ="rect" coords ="210,210,235,225" onmouseover="writeText('Sonar 1')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="305,200,330,220" onmouseover="writeText('Sonar 2')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="200,230,225,250" onmouseover="writeText('Sonar 3')" target="_self" alt="head" href="#comments" />
			<area shape ="rect" coords ="315,230,340,240" onmouseover="writeText('Sonar 4')" target="_self" alt="head" href="#comments" />
			
			<area shape ="rect" coords ="250,215,290,250" onmouseover="writeText('Chest button')" target="_self" alt="head" href="#comments" />
			
		</map>
	</div>

	<br><br><br>
	<div id="contener">
	<h2 id="blocks">Discover new possibilities with the code blocks</h2>
		<div id="blockly_editor">
			<!-- Blockly will be injected in the iframe below //-->
			<iframe id="blockly" src="http://localhost/ProjetNAO/training/blockly.html" width="100%"></iframe>
		</div>
		<div id="btn">
			<div id="btnRun">
				<button id="button_run" onclick="run_code()">
					Run
				</button>
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