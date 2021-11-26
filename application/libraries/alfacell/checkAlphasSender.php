<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$mobile = ""; 					  	//Mobile number (username) of your alfa-cell.com account
$password = "";						//Password of your alfa-cell.com account
$apiKey = "";                     	//You can use apiKey instead of Mobile number (username) and Password
$resultType = 1;				   	//This parameter specify the type of the API result
								  	//0: Returns API result as a number
								  	//1: Returns API result as text	

// Check all senders name activation stauts 
echo checkAlphasSender($mobile, $password, $resultType);

/*
// Check all senders name activation stauts using apiKey
echo checkAlphasSender($apiKey, "", $resultType);
*/
?>