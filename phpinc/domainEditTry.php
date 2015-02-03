<?php

$urlID = $_GET['urlid'];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ('ext_dbcon.php');

$result = $con->query("SELECT * FROM domainDetails WHERE domainid = 1");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Domain":"'  . $rs["domainName"] . '",';
  	$outp .= '"hostedAt":"' . $rs["hostedAt"] . '",';
    $outp .= '"nserver1":"' . $rs["nameServers1"] . '",';
    $outp .= '"nserver2":"' . $rs["nameServers2"] . '",';
    $outp .= '"nserver3":"' . $rs["nameServers3"] . '",';
  	$outp .= '"uniqueID":"'	. $rs["domainid"] . '",';
    $outp .= '"Renewal":"'	. $rs["renewalDate"] . '"}'; 
}
$outp .="]";

include ('ext_dbdis.php');

echo($outp);

?>

