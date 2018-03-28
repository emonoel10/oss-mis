<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
$username = $_POST['username'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$permanent_province = $_POST['permanent_province'];
$permanent_city = $_POST['permanent_city'];
$permanent_brgy = $_POST['permanent_brgy'];
$permanentNum = $_POST['permanentNum'];
$present_province = $_POST['present_province'];
$present_city = $_POST['present_city'];
$present_brgy = $_POST['present_brgy'];
$presentNum = $_POST['presentNum'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$mobile = $_POST['mobile'];
		
		$db->query ("UPDATE geninfo SET username='{$username}', fname='{$fname}', mname='{$mname}', lname='{$lname}', permanent_province='{$permanent_province}', permanent_city='{$permanent_city}', permanent_brgy='{$permanent_brgy}', permanentNum='{$permanentNum}', present_province='{$present_province}', present_city='{$present_city}', present_brgy='{$present_brgy}', presentNum='{$presentNum}', gender='{$gender}', email='{$email}', status='{$status}', mobile='{$mobile}' WHERE username = '{$username}'");
		
		if ($db->affected_rows > 0){
			echo "Success";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>