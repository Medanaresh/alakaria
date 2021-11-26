<?php
//Check Send Status, using fOpen
function sendStatus($viewResult=1)
{
	global $arraySendStatus;
	$contextOptions['http'] = array('method' => 'GET', 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/sendStatus.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	
	if($viewResult)
		$result = printStringResult(trim($result), $arraySendStatus);
	return $result;
}

//Change Password, using fOpen
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
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result), $arrayChangePassword);
	return $result;
}

//Retrieve Password, using fOpen
function forgetPassword($userAccount, $sendType, $viewResult=1)
{
	global $arrayForgetPassword;
	$contextPostValues = http_build_query(array('mobile'=>$userAccount, 'type'=>$sendType));
	$contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/forgetPassword.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	
	if($viewResult)
		$result = printStringResult(trim($result), $arrayForgetPassword);
	return $result;
}

//Retrieve Password, using fOpen with apiKey
function forgetPasswordApiKey($apiKey, $sendType, $viewResult=1)
{
	global $arrayForgetPassword;
	$contextPostValues = http_build_query(array('apiKey'=>$apiKey, 'type'=>$sendType));
	$contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/forgetPassword.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);

	if($viewResult)
		$result = printStringResult(trim($result), $arrayForgetPassword);
	return $result;
}

//Check Balance, using fOpen
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
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result), $arrayBalance, 'Balance');
	return $result;
}

//Send SMS, using fOpen
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
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result), $arraySendMsg);
	return $result;
}

//Send Formatted SMS, using fOpen
function sendSMSWK($userAccount, $passAccount, $numbers, $sender, $msg, $msgKey, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
	global $arraySendMsgWK;
	$applicationType = "68";
	$sender = urlencode($sender);
	$domainName = $_SERVER['SERVER_NAME'];
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'numbers'=>$numbers, 'sender'=>$sender, 'msg'=>$msg, 'msgKey'=>$msgKey, 'timeSend'=>$timeSend, 'dateSend'=>$dateSend, 'applicationType'=>$applicationType, 'domainName'=>$domainName, 'msgId'=>$MsgID, 'deleteKey'=>$deleteKey,'lang'=>'3'));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'numbers'=>$numbers, 'sender'=>$sender, 'msg'=>$msg, 'msgKey'=>$msgKey, 'timeSend'=>$timeSend, 'dateSend'=>$dateSend, 'applicationType'=>$applicationType, 'domainName'=>$domainName, 'msgId'=>$MsgID, 'deleteKey'=>$deleteKey,'lang'=>'3'));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/msgSendWK.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result) , $arraySendMsgWK);
	return $result;
}

//Delete Schedule SMS, using fOpen
function deleteSMS($userAccount, $passAccount, $deleteKey=0, $viewResult=1)
{
	global $arrayDeleteSMS;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'deleteKey'=>$deleteKey));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'deleteKey'=>$deleteKey));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/deleteMsg.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result) , $arrayDeleteSMS);
	return $result;
}

//Request Sender Name (Mobile Number), using fOpen
function addSender($userAccount, $passAccount, $sender, $viewResult=1)
{	
	global $arrayAddSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount,'sender'=>$sender));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'sender'=>$sender));
    }
    $contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/addSender.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result), $arrayAddSender, 'Normal');
	return $result;
}

//Activate Sender Name (Mobile Number), using fOpen
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
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result) , $arrayActiveSender);
	return $result;
}

//Check Sender Name Status (Mobile Number), using fOpen
function checkSender($userAccount, $passAccount, $senderId, $viewResult=1)
{	
	global $arrayCheckSender;
    if(!empty($userAccount) && empty($passAccount)) {
        $contextPostValues = http_build_query(array('apiKey'=>$userAccount, 'senderId'=>$senderId));
    } else {
        $contextPostValues = http_build_query(array('mobile'=>$userAccount, 'password'=>$passAccount, 'senderId'=>$senderId));
    }
	$contextOptions['http'] = array('method' => 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> $contextPostValues, 'max_redirects'=>0, 'protocol_version'=> 1.0, 'timeout'=>10, 'ignore_errors'=>TRUE);
	$contextResouce  = stream_context_create($contextOptions);
	$url = "http://www.alfa-cell.com/api/checkSender.php";
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result) , $arrayCheckSender);
	return $result;
}

//Request Sender Name (Characters), using fOpen
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
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);
	if($viewResult)
		$result = printStringResult(trim($result) , $arrayAddAlphaSender);
	return $result;
}

//Check Sender Name Status (Characters), using fOpen
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
	$handle = fopen($url, 'r', false, $contextResouce);
    $result = stream_get_contents($handle);

	if($viewResult)
		$result = printStringResult(trim($result) , $arrayCheckAlphasSender, 'Senders');
	return $result;
}
?>