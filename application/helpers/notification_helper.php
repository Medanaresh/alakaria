<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function send_notification_android($device_token, $data)
	{
		//new code
		$url = "https://fcm.googleapis.com/fcm/send";
		/*$title = @$data['notification_title_en'];
		$body = @$data['description_en'];
		$notification = array('title' =>$title ,'body' => $body, 'text' => $body, 'other' => $data, 'sound' => 'default', 'badge' => '1');
		$arrayToSend = array('to' => $device_token, 'notification' => $data, 'data' => $data,'priority'=>'high');
		$json = json_encode($arrayToSend);*/
		$data['title'] = @$data['notification_title_en'];
		$data['message'] = @$data['notification_title_en'];
		$data['body'] = @$data['notification_title_en'];
		$fields = array (
		        'to' 		   => $device_token,
		        'notification' => $data,
		        'data' 		   => $data,
		        'priority'     => 'high',
		);
		$fields = json_encode ($fields);
		$headers = array (
		        'Authorization: key=' . "AAAAbp21wDs:APA91bGF8GGNyoyJUUbIWQaqDtlWlYY-YxwmzUH9KisLCUEGnC8IoGyo9C0ZW7oaCpKs-MUWSlW_cZQCOy08CQcQ3r0zgwhSAG4p7ghn1wCPFEkxRJKJV5_KWF34YDX60iOXMLkOfN5x",
		        'Content-Type: application/json'
		);
		//end
		
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
		$result = curl_exec ($ch);
		curl_close ( $ch );
		return $result;
	}

	function send_notification_android_driver($device_token, $data)
	{
		
		//new code
		$url = "https://fcm.googleapis.com/fcm/send";
		/*$title = @$data['notification_title_en'];
		$body = @$data['description_en'];
		$notification = array('title' =>$title ,'body' => $body, 'text' => $body, 'other' => $data, 'sound' => 'default', 'badge' => '1');
		$arrayToSend = array('to' => $device_token, 'notification' => $data, 'data' => $data,'priority'=>'high');
		$json = json_encode($arrayToSend);*/
		$data['title'] = @$data['notification_title_en'];
		$data['message'] = @$data['description_en'];
		$data['body'] = @$data['description_en'];
		$fields = array (
		        'to' 		   => $device_token,
		        'notification' => $data,
		        'data' 		   => $data,
		        'priority'     => 'high',
		);
		$fields = json_encode ($fields);
		$headers = array (
		        'Authorization: key=' . "AIzaSyBTERNI-NPoawoSpLFb_ZVqDpxRq3pibg0",
		        'Content-Type: application/json'
		);
		//end
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
		$result = curl_exec ($ch);
		curl_close ( $ch );
		return $result;
	}



	function send_notification_ios($device_token, $data)
	{
		$deviceToken = $device_token; // "ad8c467c949b9c99b0c32151069189206e1f7072a492889f2643e1eadcc25014";  //$_GET['token'];

		// Put your private key's passphrase here:
		$passphrase = 'belle@volive';  // $_GET['pass'];
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert',"BelleCertificates.pem");
		//stream_context_set_option($ctx, 'ssl', 'local_cert',"FixingProd.pem");
		stream_context_set_option($ctx, 'ssl', 'passphrase',$passphrase);
		// Open a connection to the APNS server
		$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

		// $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

		if (empty($fp))
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		// Create the payload body
		/*$body['aps'] = array(
			'alert' => array(
			        'title' => 'New message ',
             		 'body' => $data
			 ),
			'sound' => 'default'
		);*/

		$body['aps'] = array(
    		'badge' => +1,
    		'alert' => $data['notification_title_en'],
    		'info' => $data,
    		'sound' => 'default'
    	);
		// Encode the payload as JSON
		$payload = json_encode($body);
		//print_r($payload); exit;
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));

		// Close the connection to the server
		fclose($fp);
		if (!$result)
			return 'Message not delivered';
		else
			return 'Message Successfully delivered';
	}


