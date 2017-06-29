<?php
	require_once 'MettlClass.php';

	$method = 'GET';

	$mettl = new MettlAPI;

	$assessment_id = $_GET['id'];

	//$api_result = $mettl->callAPI($api_url);

	$api_url = "http://api.mettl.com/v1/assessments";
	$api_url = "http://api.mettl.com/v1/assessments/".$assessment_id."/schedules";

	$api_result = $mettl->callAPI($api_url);

	//echo "<pre>";
	//print_r($api_result);


	$schedules = $api_result['result']->schedules;

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
	foreach ($schedules as $key => $value) {
?>
		<div>
		<h3><a href="<?php echo $value->accessUrl; ?>"><?php echo $value->name; ?></a></h3>
		</div>
<?php
	}
?>

</body>
</html>