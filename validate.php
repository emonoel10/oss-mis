<?php

$db = new mysqli ('localhost', 'root', '', 'tryit');
$db2 = new mysqli ('localhost', 'root', '', 'tryit');
$db3 = new mysqli ('localhost', 'root', '', 'tryit');

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
// For parent/guardian info
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
// For socio-economic status
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

$db->query("INSERT INTO personal (username,type,schoolYr,semester,lastname,firstname,midname,permanentNum,permanentBrgy,permanentCity,permanentProvince,presentNum,presentBrgy,presentCity,presentProvince,course,bdate,gender,age,mstatus,spouse,nationality,siblingsName,siblingsEduc,numSiblingDNSC,hs,yearGrad,hstype,stanine,email,contactNumber) VALUES ('$username', '$type', '$schoolYear', '$semester', '$lname', '$fname', '$mname', '$permanentNum', '$permanentBrgy', '$permanentCity', '$permanentProvince', '$presentNum', '$presentBrgy', '$presentCity', '$presentProvince', '$course', '$bdate', '$gender', '$age', '$status', '$spouse', '$nationality', '$siblingsName', '$siblingsEduc', '$numSibling', '$hs', '$yearGrad', '$hstype', '$stanine', '$email', '$contact')");

$db2->query("INSERT INTO social (username,ethnic,otherethnic,father,attainfather,fatherOccup,mother,attainmother,motherOccup,religion,otherreligion,dialect,otherdialect,skills,otherSkills,disability,otherDisability,handedness,problems,otherProblems) VALUES ('$username', '$ethnic', '$otherethnic', '$father', '$attainfather', '$fatherOccup', '$mother', '$attainmother', '$motherOccup', '$religion', '$otherreligion', '$dialect', '$otherdialect', '$skills', '$otherSkills', '$disability', '$otherDisability', '$handedness', '$problems', '$otherProblems')");

$db3->query("INSERT INTO economic (username,income,houseStatus,lotStatus,light,otherLight,water,toilet,transport,otherTransport,appliances,otherAppliances,furniture,otherFurniture) VALUES ('$username', '$income', '$houseStatus', '$lotStatus', '$light', '$otherLight', '$water', '$toilet', '$transport', '$otherTransport', '$appliances', '$otherAppliances', '$furniture', '$otherFurniture')");

if ($db->affected_rows > 0){
			echo "Success";
}
if ($db2->affected_rows > 0){
			echo "Success";
		}
if ($db3->affected_rows > 0){
			echo "Success";
		}

$db->close();
$db2->close();
$db3->close();
?>