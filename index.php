<?php

	require_once 'MettlClass.php';
	
	$api_url = "http://api.mettl.com/v1/account";

	$method = 'GET';

	$mettl = new MettlAPI;

	//$api_result = $mettl->callAPI($api_url);

	$api_url = "http://api.mettl.com/v1/assessments";

	$api_result = $mettl->callAPI($api_url);

	//echo "<pre>";
	//print_r($api_result);


	$assessments = $api_result['result']->assessments;

	//Concatenated string = HTTP Verb + API URI + request-parameters (including ‘ak’ & ‘ts’) sorted in ascending order alphabetically according to the name of the parameters

	//: “GET” + “http://api.mettl.com/v1/assessments/2690” + “\n”+“a34e2ejf38ek39fkwmf” +”\n”+ “50” + “\n” + “1366020643”

	//$api_url = "http://api.mettl.com/v1/account?ak=".$api_public_key."&asgn={xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx}&ts=".$timestamp;
	//Generate Signature



?>
<!DOCTYPE html>
<html>
<head>
	<title>Mettl API Testing</title>
</head>
<body>

Mettl API

<?php
	foreach ($assessments as $key => $value) {
?>
		<div>
		<h3><a href="details.php?id=<?php echo $value->id; ?>"><?php echo $value->name; ?></a></h3>
		</div>
<?php
	}
?>

</body>
</html>