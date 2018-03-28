<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');

$hs = $_POST['hs']; 
$yearGrad = $_POST['yearGrad'];
$hstype = $_POST['hstype']; 
$ethnic = $_POST['ethnic']; 
$otherethnic = $_POST['otherethnic'];
$siblings = $_POST['siblings'];
$father = $_POST['father'];
$attainfather = $_POST['attainfather'];
$mother = $_POST['mother'];
$attainmother = $_POST['attainmother'];
$religion = $_POST['religion']; 
$otherreligion = $_POST['otherreligion']; 
$dialect = $_POST['dialect'];
$otherdialect = $_POST['otherdialect'];

if($otherdialect == "")
{
	$otherdialect = "None";
}

if($otherreligion == "")
{
	$otherreligion = "None";
}

if($otherethnic == "")
{
	$otherethnic = "None";
}

		$db->query ("INSERT INTO social (hs,yeargrad,hstype,ethnic,otherethnic,siblings,father,attainfather,mother,attainmother,religion,otherreligion,dialect,otherdialect) VALUES ('$hs', '$yearGrad', '$hstype', '$ethnic', '$otherethnic', '$siblings', '$father', '$attainfather', '$mother', '$attainmother', '$religion', '$otherreligion', '$dialect', '$otherdialect')");

		if ($db->affected_rows > 0){
			echo "DATA SENT! Successfully saved in database.";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>