<?php

	$keyData = "6aMoJujE34XnL9gvUqdKGMqs9GzYaNo6";	//가맹점 배포 PASSKEY 입력
	$EncodeType = "U";								//인코딩 TYPE 입력(U:utf-8, E:euc-kr)
	$fdkSendHost = "testps.firstpay.co.kr";			//FDK 요청 HOST
	$fdkSendPath = "/jsp/common/req.jsp";			//FDK 요청 PATH
	$hashValue = "";	//HASH DATA
	$rtnData = "";	//FDK 수신 DATA
	
	//Request
	$fdtid = trim($_POST["FDTid"]);
	$mxid = trim($_POST["MxID"]);
	$mxissueno = trim($_POST["MxIssueNO"]);
	$amount = trim($_POST["Amount"]);
	$pids = trim($_POST["PIDS"]);

	/*****
	* ■ Hash DATA 생성 처리
	* FDTid 값이 있는 경우  MxID + MxIssueNO + keyData로 HashData 생성 처리
	* FDTid 값이 없는 경우  
	*   1. PIDS(현금영수증 신분확인번호) 값이 있는 경우
	*     MxID + MxIssueNO + Amount + PIDS + keyData로 HashData 생성 처리
	*   2. PIDS(현금영수증 신분확인번호) 값이 없는 경우
	*     MxID + MxIssueNO + Amount + keyData로 HashData 생성 처리
	***********************************/
	if(!is_null($fdtid) && $fdtid != ""){
		$hashValue = strtoupper(hash("sha256",$mxid.$mxissueno.$keyData));
	}else{
		if(!is_null($pids) && $pids != ""){
			$hashValue = strtoupper(hash("sha256",$mxid.$mxissueno.$amount.$pids.$keyData));
		}else{
			$hashValue = strtoupper(hash("sha256",$mxid.$mxissueno.$amount.$keyData));
		}
	}

	//request DATA (Client - FDK SERVER) WEB(HTTPS) 통신 처리
	$rtnData = sendHttps($fdkSendHost, $fdkSendPath, $_POST, $hashValue, $EncodeType);

	//rtnData to JSON DATA 전환 처리
	$resData = StringToJsonProc($rtnData);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>
			FDK 결제 테스트 페이지
		</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<style type="text/css">
			body { margin: 0; padding: 15px; }
		</style>
	</head>
	<body>
		* 서비스종류 : <?php echo $resData['PayMethod']; ?></br>
		* 가맹점 ID : <?php echo $resData['MxID']; ?></br>
 		* 주문번호 : <?php echo $resData['MxIssueNO']; ?></br>
 		* 주문시간 : <?php echo $resData['MxIssueDate']; ?></br>
 		* 결제금액 : <?php echo $resData['Amount']; ?></br>
 		* 거래모드 : <?php echo $resData['CcMode']; ?></br>
 		<font color="red"><b>* 응답코드 : <?php echo $resData['ReplyCode']; ?></b></font></br>
 		<font color="red"><b>* 응답메세지 : <?php echo $resData['ReplyMessage']; ?></b></font></br>
 		* 승인번호 : <?php echo $resData['AuthNO']; ?></br>
 		* 매입사코드 : <?php echo $resData['AcqCD']; ?></br>
 		* 매입사명 : <?php echo $resData['AcqName']; ?></br>
 		* 발급사코드 : <?php echo $resData['IssCD']; ?></br>
 		* 발급사명 : <?php echo $resData['IssName']; ?></br>
 		* 체크카드여부 : <?php echo $resData['CheckYn']; ?></br>
 		* 카드번호 : <?php echo $resData['CcNO']; ?></br>
 		* 가맹점번호 : <?php echo $resData['AcqNO']; ?></br>
 		* 할부개월 : <?php echo $resData['Installment']; ?></br>
 		* 잔여사용가능금액 : <?php echo $resData['CAP']; ?></br>
 		* 가상계좌은행코드 : <?php echo $resData['BkCode']; ?></br>
 		* 가상계좌번호 : <?php echo $resData['vactno']; ?></br>
 		* 에스크로결제여부 : <?php echo $resData['EscrowYn']; ?></br>
 		* 에스크로회원번호 : <?php echo $resData['EscrowCustNo']; ?></br>
 		* 가상계좌은행명 : <?php echo $resData['BkName']; ?></br>
	</body>
</html>
<?php
function sendHttps($host, $path, $post, $hashValue, $EncodeType){
	
	$sock=0;
	$ssl = "ssl://";
	$port = "443";
// HTTP 버전으로 테스트가 필요한 경우 사용
//	$ssl = "";
//	$port = "80";

	$sendData = "";
	$recvData = "";
	
	$sendData = setSendParameters($post, $hashValue, $EncodeType);
	
	/** CONNECT **/
	/** HTTPS : PHP 5 & OPENSSL REQUIRED **/
	if (!$sock = @fsockopen( $ssl.$host, $port, $errno, $errstr, 5)) {
	
		$SocketCode = $errno;
	
		switch($errno) 
		{
	    case -3:
	    		$recvData = "{\"ReplyCode\":\"9999\",\"ReplyMessage\":\"Socket Creation Failed\"}";
	    case -4:
	    		$recvData = "{\"ReplyCode\":\"9999\",\"ReplyMessage\":\"DNS Lookup Failure\"}";
	    case -5:
	    		$recvData = "{\"ReplyCode\":\"9999\",\"ReplyMessage\":\"Connection Refused or Timed Out\"}";
	    default:
	    		$recvData = "{\"ReplyCode\":\"9999\",\"ReplyMessage\":\"Connection failed\"}";
	
	    if($recvData == ""){
	    	
	    		$recvData = "{\"ReplyCode\":\"".$errno."\",\"ReplyMessage\":".$errstr."\"}";
	    }
		}
	}

	if($recvData == ""){
		//SEND
		$send  = "POST ".$path." HTTP/1.0\r\n";
		$send .= "Connection: close\r\n";
		$send .= "Host: ".$host."\r\n";
		$send .= "Content-type: application/x-www-form-urlencoded\r\n";
		$send .= "Content-length: ".strlen($sendData)."\r\n";
		$send .= "Accept: */*\r\n";
		$send .= "\r\n";
		$send .= $sendData."\r\n";
		$send .= "\r\n";
		
		fwrite($sock, $send);
		
		//RECV
		stream_set_blocking($sock, FALSE ); 
	
		$streamstart = true;
		$streamheader = true;
		$streamtimeout = false;
		$streamstarttm = time();
		$readtimeout = 15;
		
		while ( !feof($sock) && !$streamtimeout )
		{
			$readline = fgets($sock, 4096);
	
			$waitingtm = time()-$streamstarttm;
	
			if( $waitingtm >= $readtimeout )
			{
				$streamtimeout = true;
			}
			if( $streamheader )
			{
				if( $readline == "" ) //for stream_set_blocking
				{
					continue;
				}
				
				if( substr( $readline, 0, 2 ) == "\r\n" )  //end of header
				{
					$streamheader = false;
					continue;
				}
				
				$headerdata .= $readline;
				
	      if ($streamstart) 
				{
	       	$streamstart = false;
	              	
					if (!preg_match('/HTTP\/(\\d\\.\\d)\\s*(\\d+)\\s*(.*)/', $readline, $httpdata)) 
					{
		    		$recvData = "{\"ReplyCode\":\"9998\",\"ReplyMessage\":\"Status code line invalid\"}";
						fclose( $sock );
	        }
	        
	      	continue;
				}
	  	}
	  	else
	  	{
					$recvData .= $readline;
			}
		}
		
		fclose( $sock );
	
		if( $streamtimeout )
		{
   			$recvData = "{\"ReplyCode\":\"9998\",\"ReplyMessage\":\"Socket Timeout\"}";
		}
	}
	
	return urldecode($recvData);
}

function setSendParameters($post, $hashData, $EncodeType){

	$rtnValue = "";
	
	foreach($post as $Key=>$value){
		$rtnValue .= $Key."=".urlencode(iconv("utf-8","euc-kr",$value))."&";
	} 
	
	//hashData 추가
	$rtnValue .= "FDHash=".$hashData."&";

	//EncodeType 추가
	$rtnValue .= "EncodeType=".$EncodeType."&";
	
	//SpecVer 추가
	$rtnValue .= "SpecVer=F100C000";

	return $rtnValue;
}

function StringToJsonProc($data){
	
	$jsonObj = json_decode($data, true);
	
	return $jsonObj;
}
?>