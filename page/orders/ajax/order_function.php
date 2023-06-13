<?php
// 서비스명
function productName($type){
    $service_name = "";
    switch ($type){
        case 1:
            $service_name = "도시 및 지역";
            break;
        case 2:
            $service_name = "주거 및 오피스";
            break;
        case 3:
            $service_name = "복합공간 및 리테일";
            break;
        case 4:
            $service_name = "리조트 및 테마파크";
            break;
        case 5:
            $service_name = "재생공간";
            break;
    }
    return $service_name;
}
// 결제 방식
function orderType($type){
    $order = "";
    switch ($type){
        case 'CC':
            $order = "신용카드";
            break;
        case 'IC':
            $order = "계좌이체";
            break;
        case 'MO':
            $order = "핸드폰결제";
            break;
        case 'VA':
            $order = "가상계좌";
            break;
        case 'CA':
            $order = "현금영수증";
            break;
        case 'KF':
            $order = "현금IC결제";
            break;
    }

    return $order;
}
// 결제 시간
function dateTime($date){
    return substr($date, 0, 4)."."
        .substr($date, 4, 2)."."
        .substr($date, 6, 2)." "
        .substr($date, 8, 2).":"
        .substr($date, 10, 2);
}
// 결제 완료 처리 여부
function orderSuccess($reply, $type, $msg){
    if($reply == '0000'){
        if($type == 'VA'){
            return "정상발급";
        }
        else{
            return "결제완료";
        }
    }
    else{
        return $msg;
    }
}
// 결제 취소시 구분
function cancel($type){
    switch ($type){
        case 'CC':
           return 'EC131400';
           break;
        case 'IC':
            return 'EC601200';
            break;
        case 'MO':
            return 'EC1D1100';
            break;
        case 'VA':
            return 'EC801200';
            break;
        case 'CA':
            return 'EC301200';
            break;
    }
}

?>
