<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$mobile = ""; 					  	//Mobile number (username) of your alfa-cell.com account
$apiKey = "";                     	//You can use apiKey instead of Mobile number (username) and Password\
$oldPassword = "";				 	//Old password of your alfa-cell.com account
$newPassword = "";				 	//New password of your alfa-cell.com account
$resultType = 1;				   	//This parameter specify the type of the API result
							      	//0: Returns API result as a number
								  	//1: Returns API result as text										

//Change Password
echo changePassword($mobile, $oldPassword, $newPassword, $resultType);

/*
//Change Password using apiKey
echo changePassword($apiKey,"", $newPassword, $resultType);
*/
?>