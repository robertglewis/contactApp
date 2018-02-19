<?php
//$sSERVERNAME="localhost";
//$sUSER="rlewis";
//$sPASSWORD="L@wr3nce99";
//$sDATABASE="contactapp";

//$con=mysqli_connect($sSERVERNAME,$sUSER,$sPASSWORD,$sDATABASE)or die("Error " . mysqli_error($connection));

$db =  new SQLite3('robbase');

//$sql = "select studentID, fname, lname, email, phone from students";

$result = $db->query('SELECT memID,lname,fname,phone from rgltable');
//$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));
  
 $outp = ""; 
 //while($rs = mysqli_fetch_assoc($result))
 while ($rs = $result->fetchArray())
 {
	if ($outp != "") {$outp .= ",";}
    $outp .= '{"FirstName":"'  . $rs["fname"] . '",';
    $outp .= '"StudentID":"'. $rs["memID"]     . '",';
    $outp .= '"LastName":"'. $rs["lname"]     . '",';
    $outp .= '"Phone":"'. $rs["phone"]     . '"}';
 }
 $outp ='{"records":['.$outp.']}';
  
    //mysqli_close($con);
	
	echo ($outp);
?>