<?php
include("includeSettings.php");		  	//Contain all main settings for the sending operations
$mobile = "Oshadelivery";							//Mobile number (username) of your alfa-cell.com account
$password = "a1478520";						  	//Password of your alfa-cell.com account
$apiKey = "";                           //You can use apiKey instead of Mobile number (username) and Password
$sender = "Osha";					//The sender name that will be shown when the message is delivered
$numbers = "918555873308";						   	//the mobile number or set of mobiles numbers that the SMS message will be sent to them, each number must be in international format, without zeros or symbol (+), and separated from others by the symbol (,).
$msg = "اWelcome to alfa-cell.com";	   		/*
										Messages text.
										Messages in English Letters : if the length of message is 160 characters or less, only one point will be deducted, if the length is more than 160 characters, then one point will be deducted for every 153 characters of the message.
										Messages in Arabic Letters (or English & Arabic): if the length of message is 70 characters or less, only one point will be deducted, if the length is more than 160 characters, then one point will be deducted for every 67 characters of the message.											
										*/
$MsgID = rand(1,99999);				  	//Random number that will be attached with the posting, just in case you want to send same message in less than one hour from the first one
										//alfa-cell prevents recurrence send the same message within one hour of being sent, except in the case of sending a different value with each send operation
$timeSend = 0;						   	//Determine the send time, 0 means send now
										//Standard time format is hh:mm:ss
$dateSend = 0;						   	//Determine the send date. 0:now
										//Standard date format is mm/dd/yyyy.
$deleteKey = 152485;					//use this value to delete message using delete potal.
										//you can specify one number for group of messages to delete
$resultType = 1;					    //This parameter specify the type of the API result
										//0: Returns API result as a number.
										//1: Returns API result as text.
// Send SMS
echo sendSMS($mobile, $password, $numbers, $sender, $msg, $MsgID, $timeSend, $dateSend, $deleteKey, $resultType);

/*
// Send SMS using apiKey
echo sendSMS($apiKey, "", $numbers, $sender, $msg, $MsgID, $timeSend, $dateSend, $deleteKey, $resultType);
*/
?>