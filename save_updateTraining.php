<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
$username = $_POST['username'];
$training = $_POST['training'];
$credits = $_POST['credits'];
$sponsor = $_POST['sponsor'];
		
		$db->query ("UPDATE training SET username='{$username}', titleTraining='{$training}', credits='{$credits}', sponsor='{$sponsor}' WHERE username = '{$username}'");
		
		if ($db->affected_rows > 0){
			echo "Success";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>