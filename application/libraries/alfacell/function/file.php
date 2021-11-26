<?php
//Check Send Status, using File
function sendStatus($viewResult=1)
{
	global $arraySendStatus;
	$contextOptions['http'] = array('method' => 'GET', 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/sendStatus.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];
	
	if($viewResult)
		$result = printStringResult(trim($result), $arraySendStatus);
	return $result;
}

//Change Password, using File
function changePassword($userAccount, $passAccount, $newPassAccount, $viewResult=1)
{
	global $arrayChangePassword;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount,'newPassword'=>$newPassAccount));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'newPassword'=>$newPassAccount));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/changePassword.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];
	
	if($viewResult)
		$result = printStringResult(trim($result), $arrayChangePassword);
	return $result;
}

//Retrieve Password, using File
function forgetPassword($userAccount, $sendType, $viewResult=1)
{
	global $arrayForgetPassword;
	$contextPostValues = http_build_query(array('mobile'=>$userAccount, 'type'=>$sendType));
	$contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/forgetPassword.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];
	
	if($viewResult)
		$result = printStringResult(trim($result), $arrayForgetPassword);
	return $result;
}

//Retrieve Password, using File with apiKey
function forgetPasswordApiKey($apiKey, $sendType, $viewResult=1)
{
	global $arrayForgetPassword;
	$contextPostValues = http_build_query(array('apiKey'=>$apiKey, 'type'=>$sendType));
	$contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/forgetPassword.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];
	
	if($viewResult)
		$result = printStringResult(trim($result), $arrayForgetPassword);
	return $result;
}

//Check Balance, using File
function balanceSMS($userAccount, $passAccount, $viewResult=1)
{
	global $arrayBalance;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/balance.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result), $arrayBalance, 'Balance');
	return $result;
}

//Send SMS, using File
function sendSMS($userAccount, $passAccount, $numbers, $sender, $msg, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
	global $arraySendMsg;
	$applicationType = "68";
	$sender = urlencode($sender);
	$domainName = $_SERVER['SERVER_NAME'];
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'numbers'=>$numbers, 'sender'=>$sender, 'msg'=>$msg, 'timeSend'=>$timeSend, 'dateSend'=>$dateSend, 'applicationType'=>$applicationType, 'domainName'=>$domainName, 'msgId'=>$MsgID, 'deleteKey'=>$deleteKey,'lang'=>'3'));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'numbers'=>$numbers, 'sender'=>$sender, 'msg'=>$msg, 'timeSend'=>$timeSend, 'dateSend'=>$dateSend, 'applicationType'=>$applicationType, 'domainName'=>$domainName, 'msgId'=>$MsgID, 'deleteKey'=>$deleteKey,'lang'=>'3'));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/msgSend.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result), $arraySendMsg);
	return $result;
}

//Send Formatted SMS, using File
function sendSMSWK($userAccount, $passAccount, $numbers, $sender, $msg, $msgKey, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
	global $arraySendMsgWK;
	$applicationType = "68";
	$sender = urlencode($sender);
	$domainName = $_SERVER['SERVER_NAME'];
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount,'numbers'=>$numbers, 'sender'=>$sender, 'msg'=>$msg, 'msgKey'=>$msgKey, 'timeSend'=>$timeSend, 'dateSend'=>$dateSend, 'applicationType'=>$applicationType, 'domainName'=>$domainName, 'msgId'=>$MsgID, 'deleteKey'=>$deleteKey,'lang'=>'3'));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'numbers'=>$numbers, 'sender'=>$sender, 'msg'=>$msg, 'msgKey'=>$msgKey, 'timeSend'=>$timeSend, 'dateSend'=>$dateSend, 'applicationType'=>$applicationType, 'domainName'=>$domainName, 'msgId'=>$MsgID, 'deleteKey'=>$deleteKey,'lang'=>'3'));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/msgSendWK.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result) , $arraySendMsgWK);
	return $result;
}

//Delete Schedule SMS, using File
function deleteSMS($userAccount, $passAccount, $deleteKey=0, $viewResult=1)
{
	global $arrayDeleteSMS;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount,'deleteKey'=>$deleteKey));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'deleteKey'=>$deleteKey));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/deleteMsg.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayDeleteSMS);
	return $result;
}

//Request Sender Name (Mobile Number), using file
function addSender($userAccount, $passAccount, $sender, $viewResult=1)
{	
	global $arrayAddSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'sender'=>$sender));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'sender'=>$sender));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/addSender.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result), $arrayAddSender, 'Normal');
	return $result;
}

//Activate Sender Name (Mobile Number), using File
function activeSender($userAccount, $passAccount, $senderId, $activeKey, $viewResult=1)
{
	global $arrayActiveSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'senderId'=>$senderId, 'activeKey'=>$activeKey));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'senderId'=>$senderId, 'activeKey'=>$activeKey));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/activeSender.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayActiveSender);
	return $result;
}

//Check Sender Name Status (Mobile Number), using File
function checkSender($userAccount, $passAccount, $senderId, $viewResult=1)
{	
	global $arrayCheckSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount,'senderId'=>$senderId));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'senderId'=>$senderId));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/checkSender.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayCheckSender);
	return $result;
}

//Request Sender Name (Characters), using File
function addAlphaSender($userAccount, $passAccount, $sender, $viewResult=1)
{
	global $arrayAddAlphaSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'sender'=>$sender));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'sender'=>$sender));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/addAlphaSender.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = $arrayResult[0];

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayAddAlphaSender);
	return $result;
}

//Check Sender Name Status (Characters), using File
function checkAlphasSender($userAccount, $passAccount, $viewResult=1)
{
	global $arrayCheckAlphasSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/checkAlphasSender.php";
	$arrayResult = file($url, FILE_IGNORE_NEW_LINES, $contextResouce);
	$result = implode('',$arrayResult);

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayCheckAlphasSender, 'Senders');
	return $result;
}
?>