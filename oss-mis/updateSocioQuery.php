<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
// For personal info
$username = $_POST['username'];
$income = $_POST['income'];
$houseStatus = $_POST['houseStatus'];
$lotStatus = $_POST['lotStatus'];
$light = $_POST['light'];
$otherLight = $_POST['otherLight'];
$water = $_POST['water'];
$toilet = $_POST['toilet'];
$transport = $_POST['transport'];
$otherTransport = $_POST['otherTransport'];
$appliances = $_POST['appliances'];
$otherAppliances = $_POST['otherAppliances'];
$furniture = $_POST['furniture'];
$otherFurniture = $_POST['otherFurniture'];
	

		$db->query ("UPDATE economic SET username='{$username}', income='{$income}', houseStatus='{$houseStatus}', lotStatus='{$lotStatus}', light='{$light}', otherLight='{$otherLight}', water='{$water}', toilet='{$toilet}', transport='{$transport}', otherTransport='{$otherTransport}', appliances='{$appliances}', otherAppliances='{$otherAppliances}', furniture='{$furniture}', otherFurniture='{$otherFurniture}' WHERE username = '{$username}'");
		
		if ($db->affected_rows > 0){
			echo "Updated successfully!";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>