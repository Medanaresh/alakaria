<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$mobile = ""; 					  	//Mobile number (username) of your alfa-cell.com account
$password = "";						//Password of your alfa-cell.com account
$apiKey = "";                     	//You can use apiKey instead of Mobile number (username) and Password
$deleteKey = "";                  	//The value that have been set in 'delete key' parameter with Send-SMS API, when you send a scheduled SMS
$resultType = 1;				   	//This parameter specify the type of the API result
								  	//0: Returns API result as a number
								  	//1: Returns API result as text	

// Delete scheduled SMS before its time
echo deleteSMS($mobile, $password, $deleteKey, $resultType);

/*
// Delete scheduled SMS before its time using apiKey
echo deleteSMS($apiKey, "", $deleteKey, $resultType);
*/
?>