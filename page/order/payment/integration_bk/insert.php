<?php
	$returnMsg	  = "";

	$Amount    		= trim( $_POST["Amount"] );				//결제금액
	$ReplyCode 		= trim( $_POST["ReplyCode"] );		//결과코드
	$ReplyMessage = trim( $_POST["ReplyMessage"] );	//결과메세지
	$MxIssueNO    = trim( $_POST["MxIssueNO"] );		//거래번호
	$MxIssueDate  = trim( $_POST["MxIssueDate"] );	//거래일자
	$MxHASH    		= trim( $_POST["MxHASH256"] );		//HASHDATA

	/* 1. return받은 MxHASH값과 거래 data를 이용해 만든 HASH값을 비교한다.
		HASH값 설정 관련
		아래의 예제와 같이 
		MxID, MxOTP, MxIssueNO, MxIssueDate, Amount, Currency 6개의 값을 이용하여
		HASH key를 만들어 거래시 넘겨주시면
		dbpath에서 HASH key를 넘겨 받아 
		원거래의 정보가 바뀌지 않았는지 확인 할 수 있습니다.
		
		아래의 mxid, mxotp, Currency는 가맹점 주문번호(mxissueno), 주문시간(mxissuedate)로 
		가맹점이 가지고 있는 data를 가져 와야 합니다.
	*/

	//주문번호(mxissueno), 주문시간(mxissuedate)로 가맹점이 가지고 있는 data를 조회한다.
	$mxid = "testcorp";
	$mxotp = "6aMoJujE34XnL9gvUqdKGMqs9GzYaNo6";
	$currency = "KRW";

	//////////////////////////////////////////////////////////////////////////////
	// SHA-256 알고리즘 이용한 Hash 값 생성
	$output = hash("sha256",$mxid.$mxotp.$MxIssueNO.$MxIssueDate.$Amount.$currency);

	$isOK = "N"; 

	if($MxHASH == $output){
		
		if($ReplyCode == "00003000") {
			//입금성공이면
			// 이 부분에 승인성공 결과를 data base에 저장하는 부분을 coding한다.
			// data base 저장  성공 시 $isOK를 "Y"로 바꿔 주세요.
			if($isOK == "Y") {
				//'디비저장성공' 등은 실제 코드가 아닙니다. 알맞은 코드로 바꾸어 주세요.
				$returnMsg = "ACK=200OKOK";
			}else{
				$returnMsg = "ACK=400FAIL";
			}
		}else if($ReplyCode == "00003100") {
			//입금취소이면
			// 이 부분에 입금취소 결과를 data base에 저장하는 부분을 coding한다.
			// data base 저장  성공 시 $isOK를 "Y"로 바꿔 주세요.
			if($isOK == "Y") {
				//'디비저장성공' 등은 실제 코드가 아닙니다. 알맞은 코드로 바꾸어 주세요.
				$returnMsg = "ACK=200OKOK";
			}else{
				$returnMsg = "ACK=400FAIL";
			}
		}else{
			//입금실패인경우
			// 이 부분에 승인실패 결과를 data base에 저장하는 부분을 coding한다.
			// 입금 실패인 경우 DB처리를 하지 않을때는 $isOK를 "Y"로 바꿔 주세요.
			if($isOK == "Y") {
				$returnMsg = "ACK=200OKOK";
			}else{
				$returnMsg = "ACK=400FAIL";
			}
		}
	} else { 
		//보낸 거래 정보와 넘겨 받은 거래 정보가 다르다 => 3자의 의한 조작 가능성 내포
		$returnMsg = "ACK=400FAIL";
	}
	$returnMsg = "ACK=200OKOK";//테스트용(임시)
	
	echo $returnMsg;
?>