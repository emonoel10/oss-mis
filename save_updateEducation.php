<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
$username = $_POST['username'];
$degree = $_POST['degree'];
$college = $_POST['college'];
$year = $_POST['year'];
$awards = $_POST['awards'];
$course = $_POST['course'];
$syGrad = $_POST['syGrad'];
$exam = $_POST['exam'];
$date = $_POST['date'];
$rating = $_POST['rating'];


		
		$db->query ("UPDATE education SET username='{$username}', degree='{$degree}', college='{$college}', year='{$year}', awards='{$awards}', course='{$course}', syGrad='{$syGrad}', exam='{$exam}', dateExam='{$date}', rating='{$rating}' WHERE username = '{$username}'");
		
		if ($db->affected_rows > 0){
			echo "Success";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>