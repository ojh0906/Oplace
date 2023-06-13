<?php
include_once('../../../head.php');

ini_set( 'display_errors', '0' );

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
$addition = $_POST['addition'];
$productName = $_POST['productName'];



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





//결제 테이블 Insert
$sql = "
                insert into payment_order_tbl
                    (payMethod, companyId,
                     orderNo, orderDate, 
                     productName, addition, price,
                     ccMode, replyCode, replyMessage,
                     AuthNo, acqCD,
                     acqName, issName, 
                     issCD, checkYn,
                     ccNO, acqNO, 
                     installment, cap, 
                     bkCode, vactno, 
                     escrowYn, escrowCustNo, 
                     bkName, appFlag, member_fk)
                value
                    (?, ?, 
                    ?, ?, 
                    ?, ?, ?,
                    ?, ? ,?,
                    ?, ?,
                    ?, ?,
                    ?, ?,
                    ?, ?,
                    ?, ?,
                    ?, ?,
                    ?, ?,
                    ?, ?, ?)";


$db_conn->prepare($sql)->execute(
    [
        $resData['PayMethod'], $resData['MxID'],
        $resData['MxIssueNO'], $resData['MxIssueDate'],
        $productName, $addition, $resData['Amount'],
        $resData['CcMode'], $resData['ReplyCode'],  $resData['ReplyMessage'],
        $resData['AuthNO'], $resData['AcqCD'],
        $resData['AcqName'], $resData['IssCD'],
        $resData['IssName'], $resData['CheckYn'],
        $resData['CcNO'], $resData['AcqNO'],
        $resData['Installment'], $resData['CAP'],
        $resData['BkCode'], $resData['vactno'],
        $resData['EscrowYn'], $resData['EscrowCustNo'],
        $resData['AppFlag'],    $resData['BkName'],
        $_SESSION['member']
    ]
);

//세션 추가
$_SESSION['MxIssueNO'] = $resData['MxIssueNO'];


echo "<script type='text/javascript'>";
echo "alert('결제가 완료되었습니다');";
echo "location.href = '../step5-1.php?no=".$resData['MxIssueNO']."&type=".$resData['PayMethod']."';";
echo "</script>";


?>
