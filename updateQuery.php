<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
// For personal info
$username = $_POST['username'];
$type = $_POST['type'];
$schoolYear = $_POST['schoolYear'];
$semester = $_POST['semester'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$permanentNum = $_POST['permanentNum'];
$permanentBrgy = $_POST['permanentBrgy'];
$permanentCity = $_POST['permanentCity'];
$permanentProvince = $_POST['permanentProvince'];
$presentNum = $_POST['presentNum'];
$presentBrgy = $_POST['presentBrgy'];
$presentCity = $_POST['presentCity'];
$presentProvince = $_POST['presentProvince'];
$course = $_POST['course'];
$bdate = $_POST['bdate'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$status = $_POST['status'];
$spouse = $_POST['spouse'];
$nationality = $_POST['nationality'];
$siblingsName = $_POST['siblingsName'];
$siblingsEduc = $_POST['siblingsEduc'];
$numSibling = $_POST['numSibling'];
$hs = $_POST['hs']; 
$yearGrad = $_POST['yearGrad'];
$hstype = $_POST['hstype']; 
$stanine = $_POST['stanine'];
$email = $_POST['email'];
$contact = $_POST['contact'];

		$db->query ("UPDATE personal SET username='{$username}', type='{$type}', schoolYr='{$schoolYear}', semester='{$semester}', lastname='{$lname}', firstname='{$fname}', midname='{$mname}', permanentNum='{$permanentNum}', permanentBrgy='{$permanentBrgy}', permanentCity='{$permanentCity}', permanentProvince='{$permanentProvince}', presentNum='{$presentNum}', presentBrgy='{$presentBrgy}', presentCity='{$presentCity}', presentProvince='{$presentProvince}', course='{$course}', bdate='{$bdate}', gender='{$gender}', age='{$age}', mstatus='{$status}', spouse='{$spouse}', nationality='{$nationality}', siblingsName='{$siblingsName}', siblingsEduc='{$siblingsEduc}', numSiblingDNSC='{$numSibling}', hs='{$hs}', yearGrad='{$yearGrad}', hstype='{$hstype}', stanine='{$stanine}', email='{$email}', contactNumber='{$contact}' WHERE username='{$username}'");
		
		if ($db->affected_rows > 0){
			echo "Success";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>