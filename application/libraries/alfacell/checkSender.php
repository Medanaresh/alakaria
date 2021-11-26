<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$mobile = ""; 					  	//Mobile number (username) of your alfa-cell.com account
$password = "";						//Password of your alfa-cell.com account
$apiKey = "";                     	//You can use apiKey instead of Mobile number (username) and Password
$senderId = "";						//The result from addSender-API when you request a license for mobile number as sender name, without(#) e.g. if the result is #110, then use it here as 110.
$resultType = 1;				   	//This parameter specify the type of the API result
								  	//0: Returns API result as a number
								  	//1: Returns API result as text	

// check the activation status of a mobile number as sender name
echo checkSender($mobile, $password, $senderId, $resultType);

/*
// check the activation status of a mobile number as sender name using apiKey
echo checkSender($apiKey, "", $senderId, $resultType);
*/
?>