<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
// For parent / guardian information
$username = $_POST['username'];
$ethnic = $_POST['ethnic'];
$otherethnic = $_POST['otherethnic'];
$father = $_POST['father'];
$attainfather = $_POST['attainfather'];
$fatherOccup = $_POST['fatherOccup'];
$mother = $_POST['mother'];
$attainmother = $_POST['attainmother'];
$motherOccup = $_POST['motherOccup'];
$religion = $_POST['religion'];
$otherreligion = $_POST['otherreligion'];
$dialect = $_POST['dialect'];
$otherdialect = $_POST['otherdialect'];
$skills = $_POST['skills'];
$otherSkills = $_POST['otherSkills'];
$disability = $_POST['disability'];
$otherDisability = $_POST['otherDisability'];
$handedness = $_POST['handedness'];
$problems = $_POST['problems'];
$otherProblems = $_POST['otherProblems'];
$db->query ("UPDATE social SET username='{$username}', ethnic='{$ethnic}', otherethnic='{$otherethnic}', father='{$father}', attainfather='{$attainfather}', fatherOccup='{$fatherOccup}', mother='{$mother}', attainmother='{$attainmother}', motherOccup='{$motherOccup}', religion='{$religion}', otherreligion='{$otherreligion}', dialect='{$dialect}', otherdialect='{$otherdialect}', skills='{$skills}', otherSkills='{$otherSkills}', disability='{$disability}', otherDisability='{$otherDisability}', handedness='{$handedness}', problems='{$problems}', otherProblems='{$otherProblems}' WHERE username='{$username}'");
		
		if ($db->affected_rows > 0){
			echo "Updated successfully!";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>