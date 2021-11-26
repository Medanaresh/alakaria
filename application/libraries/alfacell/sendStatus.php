<?php
include("includeSettings.php");		//This file contains all the main settings of SMS API
$resultType = 1;				   	//This parameter specify the type of the API result
								 	//0: Returns API result as a number
							      	//1: Returns API result as text	
										
// Check Sending Status
echo sendStatus($resultType);
?>  