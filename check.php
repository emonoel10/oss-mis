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
$degree = $_POST['degree'];
$college = $_POST['college'];
$year = $_POST['year'];
$awards = $_POST['awards'];
$course = $_POST['course'];
$syGrad = $_POST['syGrad'];
$exam = $_POST['exam'];
$date = $_POST['date'];
$rating = $_POST['rating'];
$training = $_POST['training'];
$credits = $_POST['credits'];
$sponsor = $_POST['sponsor'];
$presentlyEmploy = $_POST['presentlyEmploy'];
$reasonsIfNo = $_POST['reasonsIfNo'];
$otherReasonsIfNo = $_POST['otherReasonsIfNo'];
$prevJob = $_POST['prevJob'];
$otherPrevJob = $_POST['otherPrevJob'];
$changeJob = $_POST['changeJob'];
$otherChangeJob = $_POST['otherChangeJob'];
$acceptJob = $_POST['acceptJob'];
$otherAcceptJob = $_POST['otherAcceptJob'];
$presentStatus = $_POST['presentStatus'];
$otherstatus = $_POST['otherstatus'];
$salary = $_POST['salary'];
$business = $_POST['business'];
$otherBusiness = $_POST['otherBusiness'];
$toDate = $_POST['toDate'];
$fromDate = $_POST['fromDate'];
$company = $_POST['company'];
$cAdd = $_POST['cAdd'];
$country = $_POST['country'];
$workNature = $_POST['workNature'];
$othernaturework = $_POST['othernaturework'];
$firstJobTake = $_POST['firstJobTake'];
$firstJob = $_POST['firstJob'];
		
		if($othernaturework != null){
		$myString = $othernaturework;
		$myArray = explode(',', $myString);
		foreach($myArray as $my_Array){
    	echo $my_Array.'<br>';
    	$db->query ("INSERT INTO position (position_description) VALUES ('$my_Array')");
		}
}
		if($fromDate == null || $toDate == null){
		$fromDate = "UNEMPLOYED";
		$toDate = "UNEMPLOYED";
		$workNature = "UNEMPLOYED";
		$company = "UNEMPLOYED";
		}

		$db->query ("INSERT INTO education (username,degree,college,year,awards,course,syGrad,exam,dateExam,rating) VALUES ('$username', '$degree', '$college', '$year', '$awards', '$course', '$syGrad', '$exam', '$date', '$rating')");
		$db->query ("INSERT INTO geninfo (username,fname,mname,lname,permanent_province,permanent_city,permanent_brgy,permanentNum,present_province,present_city,present_brgy,presentNum,gender,email,status,mobile) VALUES ('$username', '$fname', '$mname', '$lname', '$permanent_province', '$permanent_city', '$permanent_brgy', '$permanentNum', '$present_province', '$present_city', '$present_brgy', '$presentNum', '$gender', '$email', '$status', '$mobile')");
		$db->query ("INSERT INTO training (username,titleTraining,credits,sponsor) VALUES ('$username', '$training', '$credits', '$sponsor')");
		$db->query ("INSERT INTO employdata (username,presentlyEmploy,reasonsIfNo,otherReasonsIfNo,prevJob,otherPrevJob,changeJob,otherChangeJob,acceptJob,otherAcceptJob,presentStatus,otherStatus,salary,business,otherBusiness,fromDate,toDate,company,cAdd,country,workNature,othernaturework,firstJobTake,firstJob) VALUES ('$username', '$presentlyEmploy', 
			'$reasonsIfNo', '$otherReasonsIfNo', '$prevJob', '$otherPrevJob', '$changeJob', '$otherChangeJob', '$acceptJob', '$otherAcceptJob', '$presentStatus', '$otherstatus', '$salary', '$business', '$otherBusiness', '$fromDate', '$toDate', '$company', '$cAdd', '$country', '$workNature', '$othernaturework', '$firstJobTake', '$firstJob')");		

	     if($country != ""){
			$db->query ("INSERT INTO country (countryname) VALUES ('$country')");		

		}

		if ($db->affected_rows > 0){
			echo "Success";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>