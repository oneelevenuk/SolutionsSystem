<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ('ext_dbcon.php');

$result = $con->query("SELECT * FROM domainDetails LEFT OUTER JOIN customerCodes ON domainDetails.clientCode = customerCodes.clientCode");

$output = array();
while ($rs = $result->fetch_array(MYSQLI_ASSOC)){
	$record = array(
		'Domain' => $rs['domainName'],
		'CustomerID' => $rs['clientCode'],
		'Customer' => $rs['customer'],
		'uniqueID' => $rs['domainid'],
		'Renewal' => $rs['renewalDate'],
		'HostedWith' => $rs['hostedAt'],
		'nserver1' => $rs['nameServers1'],
		'nserver2' => $rs['nameServers2'],
		'nserver3' => $rs['nameServers3'],
		'Status' => $rs['domainStatus']
	);
	$output[] = $record;
}
echo json_encode($output);
