<?php

// ********Traditional Connection String ***********************************************************************//
//$sSERVERNAME="????????";
//$sUSER="?????";
//$sPASSWORD="????????";
//$sDATABASE="????????";
//$con=mysqli_connect($sSERVERNAME,$sUSER,$sPASSWORD,$sDATABASE)or die("Error " . mysqli_error($connection));
//$sql = "select studentID, fname, lname, email, phone from students";
//$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));
//while($rs = mysqli_fetch_assoc($result))
//************************************************************************************************************** */


//**********************************SQL LITE CONNECTION******************************************************** */
$db =  new SQLite3('robbase');

$result = $db->query('SELECT memID,lname,fname,phone from rgltable');

 $outp = ""; 
 
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
//************************************************************************************************************** */
?>