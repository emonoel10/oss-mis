<?php

define('TABLE_NAME', 'personal');
define('HOST_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'tryit');

$link = mysqli_connect
(
    HOST_NAME,
    USER_NAME,
    PASSWORD
) or die('Cannot connect to the database  because: ' . mysqli_error());

mysqli_select_db(DATABASE);
echo '<br />Connected OK:';

$username          = $_POST['username'];
$type              = $_POST['type'];
$schoolYear        = $_POST['schoolYear'];
$semester          = $_POST['semester'];
$lname             = $_POST['lname'];
$fname             = $_POST['fname'];
$mname             = $_POST['mname'];
$permanentNum      = $_POST['permanentNum'];
$permanentBrgy     = $_POST['permanentBrgy'];
$permanentCity     = $_POST['permanentCity'];
$permanentProvince = $_POST['permanentProvince'];
$presentNum        = $_POST['presentNum'];
$presentBrgy       = $_POST['presentBrgy'];
$presentCity       = $_POST['presentCity'];
$presentProvince   = $_POST['presentProvince'];
$course            = $_POST['course'];
$bdate             = $_POST['bdate'];
$gender            = $_POST['gender'];
$age               = $_POST['age'];
$status            = $_POST['status'];
$spouse            = $_POST['spouse'];
$nationality       = $_POST['nationality'];
$height            = $_POST['height'];
$weight            = $_POST['weight'];
$siblingsName      = "-";
$siblingsEduc      = "-";
$numSibling        = $_POST['numSibling'];
$hs                = $_POST['hs'];
$yearGrad          = $_POST['yearGrad'];
$hstype            = $_POST['hstype'];
$stanine           = $_POST['stanine'];
$email             = $_POST['email'];
$contact           = $_POST['contact'];
// For parent/guardian info
$ethnic          = $_POST['ethnic'];
$otherethnic     = $_POST['otherethnic'];
$father          = $_POST['father'];
$attainfather    = $_POST['attainfather'];
$fatherOccup     = $_POST['fatherOccup'];
$mother          = $_POST['mother'];
$attainmother    = $_POST['attainmother'];
$motherOccup     = $_POST['motherOccup'];
$religion        = $_POST['religion'];
$otherreligion   = $_POST['otherreligion'];
$dialect         = $_POST['dialect'];
$otherdialect    = $_POST['otherdialect'];
$skills          = $_POST['skills'];
$otherSkills     = $_POST['otherSkills'];
$disability      = $_POST['disability'];
$otherDisability = $_POST['otherDisability'];
$handedness      = $_POST['handedness'];
$problems        = $_POST['problems'];
$otherProblems   = $_POST['otherProblems'];
// For socio-economic status
$income          = $_POST['income'];
$houseStatus     = $_POST['houseStatus'];
$lotStatus       = $_POST['lotStatus'];
$light           = $_POST['light'];
$otherLight      = $_POST['otherLight'];
$water           = $_POST['water'];
$toilet          = $_POST['toilet'];
$transport       = $_POST['transport'];
$otherTransport  = $_POST['otherTransport'];
$appliances      = $_POST['appliances'];
$otherAppliances = $_POST['otherAppliances'];
$furniture       = $_POST['furniture'];
$otherFurniture  = $_POST['otherFurniture'];

$sql = 'INSERT INTO personal'
    . "	(username, type, schoolYr, semester, lastname, firstname, midname, permanentNum, permanentBrgy, permanentCity, permanentProvince, presentNum, presentBrgy, presentCity, presentProvince, course, bdate, gender, age, mstatus, spouse, nationality, height, weight, siblingsName, siblingsEduc, numSiblingDNSC, hs, yearGrad, hstype, stanine, email, contactNumber)
			 			VALUES
			 			("
    . "'" . $_POST['username'] . "', "
    . "'" . $_POST['type'] . "', "
    . "'" . $_POST['schoolYear'] . "', "
    . "'" . $_POST['semester'] . "', "
    . "'" . $_POST['lname'] . "', "
    . "'" . $_POST['fname'] . "', "
    . "'" . $_POST['mname'] . "', "
    . "'" . $_POST['permanentNum'] . "', "
    . "'" . $_POST['permanentBrgy'] . "', "
    . "'" . $_POST['permanentCity'] . "', "
    . "'" . $_POST['permanentProvince'] . "', "
    . "'" . $_POST['presentNum'] . "', "
    . "'" . $_POST['presentBrgy'] . "', "
    . "'" . $_POST['presentCity'] . "', "
    . "'" . $_POST['presentProvince'] . "', "
    . "'" . $_POST['course'] . "', "
    . "'" . $_POST['bdate'] . "', "
    . "'" . $_POST['gender'] . "', "
    . "'" . $_POST['age'] . "', "
    . "'" . $_POST['status'] . "', "
    . "'" . $_POST['spouse'] . "', "
    . "'" . $_POST['nationality'] . "', "
    . "'" . $_POST['height'] . "', "
    . "'" . $_POST['weight'] . "', "
    . "'" . $_POST['siblingsName'] . "', "
    . "'" . $_POST['siblingsEduc'] . "', "
    . "'" . $_POST['numSibling'] . "', "
    . "'" . $_POST['hs'] . "', "
    . "'" . $_POST['yearGrad'] . "', "
    . "'" . $_POST['hstype'] . "', "
    . "'" . $_POST['stanine'] . "', "
    . "'" . $_POST['email'] . "', "
    . "'" . $_POST['contact'] . "'  "
    . ");";

$sql2 = 'INSERT INTO social'
    . "	(username,ethnic,otherethnic,father,attainfather,fatherOccup,mother,attainmother,motherOccup,religion,otherreligion,dialect,otherdialect,skills,otherSkills,disability,otherDisability,handedness,problems,otherProblems)
			 			VALUES
			 			("
    . "'" . $_POST['username'] . "', "
    . "'" . $_POST['ethnic'] . "', "
    . "'" . $_POST['otherethnic'] . "', "
    . "'" . $_POST['father'] . "', "
    . "'" . $_POST['attainfather'] . "', "
    . "'" . $_POST['fatherOccup'] . "', "
    . "'" . $_POST['mother'] . "', "
    . "'" . $_POST['attainmother'] . "', "
    . "'" . $_POST['motherOccup'] . "', "
    . "'" . $_POST['religion'] . "', "
    . "'" . $_POST['otherreligion'] . "', "
    . "'" . $_POST['dialect'] . "', "
    . "'" . $_POST['otherdialect'] . "', "
    . "'" . $_POST['skills'] . "', "
    . "'" . $_POST['otherSkills'] . "', "
    . "'" . $_POST['disability'] . "', "
    . "'" . $_POST['otherDisability'] . "', "
    . "'" . $_POST['handedness'] . "', "
    . "'" . $_POST['problems'] . "', "
    . "'" . $_POST['otherProblems'] . "'  "
    . ");";

$sql3 = 'INSERT INTO economic'
    . "	(username,income,houseStatus,lotStatus,light,otherLight,water,toilet,transport,otherTransport,appliances,otherAppliances,furniture,otherFurniture)
			 			VALUES
			 			("
    . "'" . $_POST['username'] . "', "
    . "'" . $_POST['income'] . "', "
    . "'" . $_POST['houseStatus'] . "', "
    . "'" . $_POST['lotStatus'] . "', "
    . "'" . $_POST['light'] . "', "
    . "'" . $_POST['otherLight'] . "', "
    . "'" . $_POST['water'] . "', "
    . "'" . $_POST['toilet'] . "', "
    . "'" . $_POST['transport'] . "', "
    . "'" . $_POST['otherTransport'] . "', "
    . "'" . $_POST['appliances'] . "', "
    . "'" . $_POST['otherAppliances'] . "', "
    . "'" . $_POST['furniture'] . "', "
    . "'" . $_POST['otherFurniture'] . "'  "
    . ");";

echo '<br />' . $sql;
echo '<br />' . mysqli_error();

echo '<br />Result: ' . $result = mysqli_query($sql);
echo '<br />' . mysqli_error();

echo '<br />mysqli_affected_rows(): ' . $result = mysqli_affected_rows();
echo '<br />' . mysqli_error();

//-----

echo '<br />' . $sql2;
echo '<br />' . mysqli_error();

echo '<br />Result: ' . $result2 = mysqli_query($sql2);
echo '<br />' . mysqli_error();

echo '<br />mysqli_affected_rows(): ' . $result2 = mysqli_affected_rows();
echo '<br />' . mysqli_error();

//------

echo '<br />' . $sql3;
echo '<br />' . mysqli_error();

echo '<br />Result: ' . $result3 = mysqli_query($sql3);
echo '<br />' . mysqli_error();

echo '<br />mysqli_affected_rows(): ' . $result3 = mysqli_affected_rows();
echo '<br />' . mysqli_error();

echo '<br />mysqli_close(): ' . mysqli_close($link);
echo '<br />' . mysqli_error();
