<?php
$db = new mysqli ('localhost', 'root', '', 'tryit');
$username = $_POST['username'];
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
		if($fromDate == ""){
		$fromDate = "UNEMPLOYED";
		$toDate = "UNEMPLOYED";
		$workNature = "UNEMPLOYED";
		$company = "UNEMPLOYED";
		}


		$db->query ("UPDATE employdata SET username='{$username}', presentlyEmploy='{$presentlyEmploy}', reasonsIfNo='{$reasonsIfNo}', otherReasonsIfNo='{$otherReasonsIfNo}', prevJob='{$prevJob}', otherPrevJob='{$otherPrevJob}', changeJob='{$changeJob}', otherChangeJob='{$otherChangeJob}', acceptJob='{$acceptJob}', otherAcceptJob='{$otherAcceptJob}', presentStatus='{$presentStatus}', otherStatus='{$otherstatus}', salary='{$salary}', business='{$business}', otherBusiness='{$otherBusiness}', fromDate='{$fromDate}', toDate='{$toDate}', company='{$company}', cAdd='{$cAdd}', country='{$country}', workNature='{$workNature}', othernaturework='{$othernaturework}', firstJobTake='{$firstJobTake}', firstJob='{$firstJob}' WHERE username='{$username}'");	

		
		if ($db->affected_rows > 0){
			echo "Success";
		}

		else {
			echo "Insertion failed.";
		}

		$db->close();

?>