<?php
if(isset($_POST) && isset($_POST["btnSubmit"]))
{
	$secretKey 	= '6LcxPm4gAAAAALsFuJ6z102D5w7MyfQtl9zypQXn';
	$token 		= $_POST["g-token"];
	$ip			= $_SERVER['REMOTE_ADDR'];
	
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$data = array('secret' => $secretKey, 'response' => $token, 'remoteip'=> $ip);
 
	// use key 'http' even if you send the request to https://...
	$options = array('http' => array(
		'method'  => 'POST',
		'content' => http_build_query($data)
	));
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$response = json_decode($result);
	$to = "info@ivoand.com";
    $subject = "New email from webpage";
    $txt = $_POST['message'];
    $sender = $_POST['name'];
    $headers = "From: ".$sender." <".$_POST['email']."> \r\n";

	if($response->success) {
       if (array_key_exists('email', $_POST) && array_key_exists('message', $_POST) && array_key_exists('source', $_POST)) {
        
        
        mail($to,$subject,$txt,$headers);
        echo "test";
        
        header('location: /' . $_POST['source']);
        // echo "sucess";
        
    }
    else {
        echo "failed";
        
    } 
    }
    
	
	else
	{
		echo '<center><h1>Captcha Validation Failed..!</h1></center>';
	}
}
	
?>