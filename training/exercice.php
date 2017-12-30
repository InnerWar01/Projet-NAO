<?php
	session_start([
    'cookie_lifetime' => 7200,
    'read_and_close'  => true,]);
	$_SESSION['ex_id'] = -1;
	$_SESSION['p_complete'] = false;
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training</title>
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/head.php";
	?>
	<link rel="stylesheet" type="text/css" href="http://localhost/ProjetNAO/assets/css/exercer.css" />
	<!-- function that gets called once Blockly frame loads //-->
    <script src="http://localhost/ProjetNAO/training/jquery.js"></script>
	<script type="text/javascript">
		window.blockly_loaded = function(blockly) {
			return window.Blockly = blockly;
		}
		window.run_code = function() {
			var arg = "<?php echo $_GET['value'] ?>"; 
			code = arg + window.Blockly.JavaScript.workspaceToCode();
            $.post('client.php', {variable: code});
			eval(code);
		}
	</script>
</head>
<body>
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/navbar.php";
		include "$root/ProjetNAO/userBD/connBDD.php";
	?>
	<div id="ex_instruction">
		<?php
			$arr = str_split($_GET["value"]);
			$_SESSION['ex_id'] = intval($arr[2]);
			
			//To get the task and the id of the corresponding exercise
			$sql = "SELECT e.Instruction, e.Exercise_id
					FROM exercise e
					WHERE e.Project_id = '{$arr[0]}'
					AND e.Exercise_id = '{$arr[2]}'";

			$result = $link->query($sql);

			if ($result->num_rows > 0) {
				echo "<p id='ex_instr'>";

				$row = $result->fetch_assoc();
				echo "<span id='exo_id'>Exercise " . $row["Exercise_id"] . ": </span><br>";
				echo $row["Instruction"];

				echo "</p>";
				
			} else {
				echo "Nice try !";
			}
		?>
	</div>
	<div id="contener">
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
			<div id="btnCancel">
				<button id="button_cancel" onclick="alertBox()">
					Stop Coding
				</button>
			</div>
			<div id='btnNext'>
				<button id='button_next'><a class="btn" href=
					<?php
					//Check if there are more exercises to this project
						$sql = "SELECT e.Exercise_id, e.Project_id
							FROM exercise e
							WHERE e.Project_id = '{$arr[0]}'
							AND e.Exercise_id > '{$arr[2]}'
							LIMIT 1";
						$_SESSION['ex_id'] = $arr[2];
						$_SESSION['p_id'] = $arr[0];

						$result = $link->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							echo "'http://localhost/ProjetNAO/training/exercice.php?value=" . $row["Project_id"] . ";" . $row["Exercise_id"] . ";'>
											Next";
						} else {
							echo "'http://localhost/ProjetNAO/training/transition_project.php'>
											Return
									";
						}
					?>
					</a>
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
	
	<script>

		//If the user wants to leave the page then a popup alert box is displayed
		window.onbeforeunload = function() {
			return "Data will be lost if you leave the page, are you sure?";
		};

		function alertBox() {
			window.location.replace("http://localhost/ProjetNAO/home.php");
		}
	</script>
</body>
</html>