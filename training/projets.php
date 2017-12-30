<?php
	session_start([
    'cookie_lifetime' => 7200,
    'read_and_close'  => true,]);
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
	<link rel="stylesheet" type="text/css" href="http://localhost/ProjetNAO/assets/css/projets.css" />
	<script src="http://localhost/ProjetNAO/training/jquery.js"></script>
</head>

<body>
	<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);

		include "$root/ProjetNAO/navbar.php";
		include "$root/ProjetNAO/userBD/connBDD.php";
	?>

	<div id="container">
		<div id="left">
			<?php
				$sql = "SELECT *
						FROM project";
				$result = $link->query($sql);

				if ($result->num_rows > 0) {
					// output all the projects and their corresponding exercises
					while($row = $result->fetch_assoc()) {
						echo "<div id='button'>
									<button type='button' onclick='showHide()'>" . $row['Project_name'] . "</button>
								</div>";

						$sql1 = "SELECT e.Exercise_id, e.Project_id, Instruction, Login, State
								FROM exercise e, state_exercise s
								WHERE '{$row['Project_id']}' = e.Project_id
								AND e.Exercise_id = s.Exercise_id
								AND s.Login = '{$_SESSION['login']}'";
						$result1 = $link->query($sql1);

						if ($result1->num_rows > 0) {
							echo "<div id='exos'>
								<ul>";
							while($row1 = $result1->fetch_assoc()) {
								echo "<li class='exer'>
										<a class='ex'";
											if ($row1['State'] == 'complete') 
												echo "style='background-image: url(\"http://localhost/ProjetNAO/assets/img/check.png\");'";
											else
												echo "style='background-image: url(\"http://localhost/ProjetNAO/assets/img/test.png\");'";
										echo "href='http://localhost/ProjetNAO/training/exercice.php?value=" . $row1['Project_id'] . ";" . $row1['Exercise_id'] . ";'>Exercise " . $row1['Exercise_id'] ."</a>
									</li>";	
							}
							echo "	</ul>
							</div>";
						} else {
							echo "0 results";
						}
					} 
				} else {
						echo "0 results";
				}
			?>
		</div>
		<div id="img" >
			<img src="http://localhost/ProjetNAO/assets/img/projects.jpg" alt="RobotNAO">
		</div>
	</div>
	<script type="text/javascript" language="javascript">
		function showHide(){
			var ele = document.getElementById("exos");
			if (ele.style.display != "block") {
				ele.style.display = "block";
			} else {
				ele.style.display = "none";
			}
		}
	</script>

		
	<?php 
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include "$root/ProjetNAO/footer.php";
	?>
	
    <script src="http://localhost/ProjetNAO/assets/js/jquery.min.js"></script>
    <script src="http://localhost/ProjetNAO/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>