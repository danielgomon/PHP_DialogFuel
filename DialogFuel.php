<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json;charset=utf-8');

require_once dirname(__FILE__) . '/unirest-php/src/Unirest.php';
require_once dirname(__FILE__) . '/Config.php';


//==================== Connect To Dialog Flow ==================
$txttodialogflow = $_GET['txttodialogflow'];
$sessionId = $_GET['messenger_user_id'];
$headers = array("contentType"=>"application/json; charset=utf-8","Authorization"=>"Bearer ".$ClientToken);
$url = "https://api.dialogflow.com/v1/query?v=" . $qversion. '&query=' . $txttodialogflow . '&sessionId=' . $sessionId . '&lang=' . $lang . '';
$response = Unirest\Request::get($url, $headers);


//============== Formatting Data to Chatfuel Json =============
$response_body = json_decode($response->raw_body,true);
$gettext = $response_body['result']['fulfillment']['speech'];
$getblock = $response_body['result']['fulfillment']['messages']['0']['payload']['redirect_to_blocks']; $getcontext = $response_body['result']['contexts']['0']['parameters'];


if($gettext !=null && $gettext !='')
{
	$messages = array(
		'messages' => array(
			0 => array(
				'text' => $gettext,
			),
		),
	);
}
elseif($getblock !=null && $getblock !='')
{
	$messages = array(
		'set_attributes' => $getcontext,
		'redirect_to_blocks' => $getblock
	);
}
else
{
	$messages = array(
		'messages' => array(
			0 => array(
				'text' => 'The Dialogflow response is empty.',		// Remove 'The Dialogflow response is empty.' if you don't want to show a warning message.
			),
		),
	);
}


//================== Send to Chatfuel Block ==================
$return_messages = json_encode($messages);
print_r($return_messages);

?>