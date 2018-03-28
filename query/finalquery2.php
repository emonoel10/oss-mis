<?php
        // $uname = $_POST["regsuname"];
        
        $yrFr = $_POST["from"];
        $yrTo = $_POST["to"];
        $course = $_POST['course'];
        $work = $_POST["work"];
        $job = $_POST["job"];
        $country = $_POST["country"];
        $salary = $_POST["salary"];
        $empStatus = $_POST['empStatus'];

        $sql1 = $sql2 = $sql3 = $sql4 = $sql5 = $sql6 = $sql7 = '';


        if($yrFr=='From:' || $yrFr=='' || $yrTo=='To:' || $yrTo=='') {
            $sql1 = "";
        } else {
            $sql1 = "(education.syGrad LIKE '" . $yrFr . "%' or education.syGrad LIKE '%" . $yrTo . "')";
        }

        if($course=="Select below:" || $course==""){
            $sql2 = "";
        } elseif($course=="all") {
            $sql2 = " and education.course IS NOT NULL";
        } else {
            $sql2 = " and education.course='".$course."'";
        }

        if($work=="Select below:" || $work==""){
            $sql3 = "";
        } elseif($work=="all") {
            $sql3 = " and employdata.workNature<>''";
        } else {
            $sql3 = " and employdata.workNature LIKE '%".$work."%'";
        }

        if($job=="Select below:" || $job==""){
            $sql4 = "";
        } elseif($job=="all") {
            $sql4 = " and employdata.firstJobTake<>''";
        } else {
            $sql4 = " and employdata.firstJobTake='".$job."'";
        }

        if($country=="Select below:" || $country==""){
            $sql5 = "";
        } elseif($country=="all") {
            $sql5 = " and employdata.country<>''";
        } else {
            $sql5 = " and employdata.country='".$country."'";
        }

        if($salary=="Select below:" || $salary==""){
            $sql6 = "";
        } elseif($salary=="all") {
            $sql6 = " and employdata.salary<>''";
        } else {
            $sql6 = " and employdata.salary='".$salary."'";
        }

        if($empStatus=="Select below:" || $empStatus==""){
            $sql7 = "";
        } elseif($empStatus=="all") {
            $sql7 = " and employdata.presentlyEmploy<>''";
        } else {
            $sql7 = " and employdata.presentlyEmploy='".$empStatus."'";
        }

        while($yrFr < $yrTo){
        $sy = $yrFr . "-" . ($yrFr+1);
        $sqlfull = "SELECT * FROM geninfo INNER JOIN education ON geninfo.username = education.username INNER JOIN training ON training.username = geninfo.username INNER JOIN employdata ON employdata.username = geninfo.username WHERE geninfo.username<>'' and syGrad LIKE '%$sy%'".$sql2.$sql3.$sql4.$sql5.$sql6.$sql7." ORDER BY geninfo.lname ASC";

        $servername = "localhost";
        $loginname = "root";
        $password = "";
        $dbname = "tryit";

        $conn = new mysqli($servername, $loginname, $password, $dbname);

        date_default_timezone_set("Asia/Manila");
        $date = date("Y/m/d");
        $time = date("h:i:sa");

        echo "<br><br>School Year ". $sy ."<br>";
        $output = "<table class='rwd-table'><tr><th>No.</th><th>Name</th><th>Year Employed (FROM)</th><th>Year Employed (TO)</th><th>Employer</th><th>Position</th><th>Contact Number</th></tr>";
        $yrFr++;
        $i = 0;

        if($result = $conn->query($sqlfull))
        {
            while ($row = $result->fetch_assoc()) 
            {
                $i++;
                $output .= "<tr><td data-th='Number' style='color:black;'>$i</td><td data-th='Name' style='color:black;'>{$row['lname']}, {$row['fname']} {$row['mname']}</td><td data-th='Year Employed (FROM)' style='color:black;'>" .nl2br($row['fromDate'])."</td><td data-th='Year Employed (TO)' style='color:black;'>".nl2br($row['toDate'])."</td><td data-th='Company' style='color:black;'>".nl2br($row['company'])."</td><td data-th='Position' style='color:black;'>".nl2br($row['workNature'])."</td><td data-th='Contact Number' style='color:black;'>{$row['mobile']}</td></tr>";
            }

            /* free result set */
            $result->free();
            $output.="</table><h4 style='font-family: Century Gothic; float: left;'><b>Showing  <input type = 'text' value = '$i' style = 'width:50px;' readonly> results.</b></h4>";
            echo $output;
        }
        else
        {
            echo "1";
        }
        

        $conn->close();
        }

?>