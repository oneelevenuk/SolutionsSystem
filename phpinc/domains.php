<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ('ext_dbcon.php');

$result = $con->query("SELECT * FROM domainDetails LEFT OUTER JOIN customerCodes ON domainDetails.clientCode = customerCodes.clientCode");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Domain":"'  . $rs["domainName"] . '",';
	  $outp .= '"CustomerID":"'   . $rs["clientCode"]        . '",';
    $outp .= '"Customer":"'   . $rs["customer"]        . '",';
  	$outp .= '"uniqueID":"'   . $rs["domainid"]        . '",';
    $outp .= '"Renewal":"'. $rs["renewalDate"]     . '"}'; 
}
$outp .="]";

include ('ext_dbdis.php');

echo($outp);

?> 
