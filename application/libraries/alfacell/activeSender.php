<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$mobile = ""; 				      	//Mobile number (username) of your alfa-cell.com account
$password = "";						//Password of your alfa-cell.com account
$apiKey = "";                     	//You can use apiKey instead of Mobile number (username) and Password
$activetCode = "";                	//The activation code that have be sent to mobile number
$senderId = "";                   	//The result from addSender-API when you request a license for mobile number as sender name, without(#) e.g. if the result is #110, then use it here as 110.
$resultType = 1;			       	//This parameter specify the type of the API result
								  	//0: Returns API result as a number
								  	//1: Returns API result as text	

// Activate mobile number as sender name
echo activeSender($mobile, $password, $senderId, $activetCode, $resultType);

/*
// Activate mobile number as sender name using apiKey
echo activeSender($apiKey, "", $senderId, $activetCode, $resultType);
*/
?>