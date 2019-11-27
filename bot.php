<?php
include('config.php');

// CODE 50 = User not found.
// CODE 63 = User has been suspended.

$usernames = explode(",",rtrim(file_get_contents('usernames.txt'),","));

foreach($usernames as $screen_name){
	if($screen_name != ""){

		$parameters = array('screen_name' => trim($screen_name), 'include_entities' => 'false');
		$searches = json_encode($tw_connection->get('users/show', $parameters), TRUE);
		$searches = json_decode($searches, TRUE);

		if(isset($searches['errors'])){ 
			if((int)$searches['errors'][0]['code'] == 50){ 
					
			$body	= "Twitter handle ".$screen_name." is available!";
			$recipient_email = "";
			$subject = $body;

			$headers = "From: Your Name <".$recipient_email.">\r\n";
			mail($recipient_email, $subject, $body, $headers); 

			}
		}
		
		sleep(1);
	}
}

?>
