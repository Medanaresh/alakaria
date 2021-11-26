<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$mobile = ""; 					  	//Mobile number (username) of your alfa-cell.com account
$password = "";						//Password of your alfa-cell.com account
$apiKey = "";                     	//You can use apiKey instead of Mobile number (username) and Password
$sender = "";                 	  	//Sender name to be activated, its length must not exceed 11 characters and mustn't contains any special characters										//
$resultType = 1;				   	//This parameter specify the type of the API result
								  	//0: Returns API result as a number
								  	//1: Returns API result as text	

// Activate alphabets name as sender name
echo addAlphaSender($mobile, $password, $sender, $resultType);

/*
// Activate alphabets name as sender name using apiKey
echo addAlphaSender($apiKey, "", $sender, $resultType);
*/
?>