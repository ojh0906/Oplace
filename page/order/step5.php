<?php
include_once('../../head.php');
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

//접속 확인
if(!isset($_SERVER['HTTP_REFERER']) && !isset($_SESSION['order_temp_id'])){
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
$prevPage = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
//TODO 아래 경로 "oplace" 수정해야함
if($prevPage != '/Oplace/page/order/ajax/member_insert.php') {
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}

$order_temp_id = $_SESSION['order_temp_id'];

$sql = "select * from order_temp_tbl where id = ".$order_temp_id;
$sql_stt=$db_conn->prepare($sql);
$sql_stt->execute();
$order = $sql_stt -> fetch();

// 서비스 명
switch ($order[1]){
    case 1:
        $product_type = "도시 및 지역";
        $price = 3500000;
        break;
    case 2:
        $product_type = "주거 및 오피스";
        $price = 3500000;
        break;
    case 3:
        $product_type = "복합공간 및 리테일";
        $price = 3500000;
        break;
    case 4:
        $product_type = "리조트 및 테마파크";
        $price = 3500000;
        break;
    case 5:
        $product_type = "재생공간";
        $price = 3500000;
        break;
}

// 부가 서비스
$addArr = explode("|", $order[2]);
$addYn1 = false;
$addYn2 = false;
$addYn3 = false;

for ($i = 0; $i < count($addArr); $i++) {
    if($addArr[$i] == 1){
        $addYn1 = true;
    }else if($addArr[$i] == 2) {
        $addYn2 = true;
    }else if($addArr[$i] == 3) {
        $addYn3 = true;
    }
}
?>

<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />


<!-- 결제 정보 확인 -->
<section id="order-page">
    <div class="main-container">
        <article class="menu-box">
            <p class="title">주문하기</p>
            <div class="menu-text">
                <p class="menu">1. 부가서비스</p>
                <p class="menu">2. 규정 동의</p>
                <p class="menu">3. 약관 동의</p>
                <p class="menu">4. 정보 입력</p>
                <p class="menu click">5. 결제</p>
                <p class="menu">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">정보 입력</p>

            <div class="table-wrap step5-table">
                <aside>
                    <div class="th">
                        <p>서비스 명</p>
                        <p>견적</p>
                    </div>
                    <div class="tr">
                        <p><?= $product_type ?></p>
                        <p><?php echo number_format(intval($price)); ?> 원</p>
                    </div>
                </aside>
                <aside>
                    <div class="th">
                        <p>추가된 부가 서비스</p>
                        <p>견적</p>
                    </div>
                    <?php if($addYn1){ ?>
                    <div id="target1_re" class="tr">
                        <p>네이밍</p>
                        <p>3,000,000 원</p>
                    </div>
                    <?php } ?>
                    <?php if($addYn2){ ?>
                    <div id="target2_re" class="tr">
                        <p>로고 디자인</p>
                        <p>3,000,000 원</p>
                    </div>
                    <?php } ?>
                    <?php if($addYn3){ ?>
                    <div id="target3_re" class="tr">
                        <p>사업 컨셉 영</p>
                        <p>2,500,000 원</p>
                    </div>
                    <?php } ?>
                </aside>
                <aside class="total-wrap">
                    <div class="price">
                        <p>합계</p>
                        <p><?php echo number_format(intval($order[4])); ?> 원</p>
                    </div>
                    <div class="price">
                        <p>부가가치세 (+10%)</p>
                        <p><?php echo number_format(intval($order[3])); ?> 원</p>

                    </div>
                    <div class="price">
                        <p>총 합계</p>
                        <p><?php echo number_format(intval($order[5])); ?> 원</p>
                    </div>
                </aside>
            </div>
            <form name="pay" id="pay" method="post">
                <input type="hidden" name="MxID" value="" />
                <input type="hidden" name="MxIssueNO" value="" />
                <input type="hidden" name="FDTid" value="" />
                <input type="hidden" name="productName" value="<?= $order[1] ?>" />
                <input type="hidden" name="addition" value="<?= $order[2] ?>" />
            </form>
            <form name="fdpay" id="fdpay" method="post">
                <input type="hidden" name="PAYDATA" id="PAYDATA" value="">
                <input type="hidden" name="MxID" id="MxID" value="testcorp">
                <input type="hidden" name="MxIssueNO" id="MxIssueNO" value="">
                <input type="hidden" name="MxIssueDate" id="MxIssueDate" value="" />
                <input type="hidden" name="CcProdDesc" id="CcProdDesc" value="<?= $product_type ?>">
<!--                <input type="text" name="Amount" id="Amount" value="--><?//= $order[5] ?><!--" />-->
                <input type="hidden" name="Amount" id="Amount" value="1000" />
                <input type="hidden" name="addition" id="addition" value="1" />
                <input type="hidden" name="ItemInfo" id="ItemInfo" value="1">
                <input type="hidden" name="SelectPayment" id="SelectPayment" value="ALL">
                <input type="hidden" name="CardSelect" id="CardSelect" value="00">
                <input type="hidden" name="cashYn" id="cashYn" value="Y">
                <input type="hidden" name="LangType" id="LangType" value="HAN">
                <input type="hidden" name="EncodeType" id="EncodeType" value="U">
                <input type="hidden" name="connectionType" id="connectionType" value="http">
                <input type="hidden" name="URL" id="URL" value="<?php echo $site_url ?>">
                <input type="hidden" name="DBPATH" id="DBPATH" value="<?php echo $site_url ?>/page/order/payment/integration/insert.php" />
                <?php
                if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){?>
                    <input type="hidden" name="rtnUrl" id="rtnUrl" value="<?php echo $site_url ?>/page/order/payment/integration/layer.php">
                <?php } else {?>
                    <input type="hidden" name="rtnUrl" id="rtnUrl" value="<?php echo $site_url ?>/page/order/payment/integration/layer.php">
                <?php } ?>
            </form>
            <!-- 레이어 팝업 처리 시 화면 영역 시작 -->
            <div id="mask"></div>
            <div id="fdpayWin" class="fdLayer">
                <div class="fdContainer">
                    <div class="pop-conts">
                        <iframe id="FD_PAY_FRAME" name="FD_PAY_FRAME" frameborder="0" width="560" height="600" style="background-color:#FFFFFF;" src="payment/integration/blank.html"></iframe>
                        <div class="fdBtn">
                            <a href="#" class="closeBtn">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 레이어 팝업 처리 시 화면 영역 끝 -->
            <div class="next-btn">
                <?php
                if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
                ?>
                    <p onclick="payProcMobile()">결제 <img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>

                    <?php
                }else{
                ?>
                    <p onclick="payProcPC()">결제 <img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
                <?php
                }
                ?>

            </div>
        </article>
    </div>
</section>

<script type="text/javascript" src="payment/integration/js/sha256.js"></script>
<script>
    var popflag = "L";									//P:팝업창 호출 결제, L:Layer 팝업 호출 결제(Default)
    var keyData = "6aMoJujE34XnL9gvUqdKGMqs9GzYaNo6";	//가맹점 배포 PASSKEY 입력

    $(document).ready(function(){
        initValue();
        makePayData();
    });

    //주문번호, 주문시간 자동 생성 처리
    function initValue(){
        document.fdpay.MxIssueDate.value = date_data();
        document.fdpay.MxIssueNO.value = document.fdpay.MxID.value + date_data();
    }

    //현재 시간 생성 처리(YYYYMMDDHHMMSS)
    function date_data() {
        var time = new Date();
        var year = time.getFullYear() + "";
        var month = time.getMonth() + 1;
        var date = time.getDate();
        var hour = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        if (month < 10) {
            month = "0" + month;
        }
        if (date < 10) {
            date = "0" + date;
        }
        if (hour < 10) {
            hour = "0" + hour;
        }
        if (min < 10) {
            min = "0" + min;
        }
        if (sec < 10) {
            sec = "0" + sec;
        }
        return year + month + date + hour + min + sec;
    }

    //결제 창 호출 요청 전문 생성 처리
    function makePayData(){

        var mxid = document.fdpay.MxID.value;
        var mxissueno = document.fdpay.MxIssueNO.value;
        var amount = document.fdpay.Amount.value;

        //HASH DATA 생성!!
        var callhash = Sha256.hash(mxid + mxissueno + amount + keyData).toUpperCase();

        var temp = "";

        try{ temp += "MxID=" + document.fdpay.MxID.value + "|"; }catch (e) { temp += "MxID=|"; }
        try{ temp += "MxIssueNO=" + document.fdpay.MxIssueNO.value + "|"; }catch (e) { temp += "MxIssueNO=|"; }
        try{ temp += "MxIssueDate=" + document.fdpay.MxIssueDate.value + "|"; }catch (e) { temp += "MxIssueDate=|"; }
        try{ temp += "CcProdDesc=" + document.fdpay.CcProdDesc.value + "|"; }catch (e) { temp += "CcProdDesc=|"; }
        try{ temp += "Amount=" + document.fdpay.Amount.value + "|"; }catch (e) { temp += "Amount=|"; }
        try{ temp += "rtnUrl=" + document.fdpay.rtnUrl.value + "|"; }catch (e) { temp += "rtnUrl=|"; }
        try{ temp += "ItemInfo=" + document.fdpay.ItemInfo.value + "|"; }catch (e) { temp += "ItemInfo=|"; }
        try{ temp += "connectionType=" + document.fdpay.connectionType.value + "|"; }catch (e) { temp += "connectionType=|"; }
        try{ temp += "URL=" + document.fdpay.URL.value + "|"; }catch (e) { temp += "URL=|"; }
        try{ temp += "DBPATH=" + document.fdpay.DBPATH.value + "|"; }catch (e) { temp += "DBPATH=|"; }
        try{ temp += "Currency=" + document.fdpay.Currency.value + "|"; }catch (e) { temp += "Currency=|"; }
        try{ temp += "SelectPayment=" + document.fdpay.SelectPayment.value + "|"; }catch (e) { temp += "SelectPayment=|"; }
        try{ temp += "Tmode=" + document.fdpay.Tmode.value + "|"; }catch (e) { temp += "Tmode=|"; }
        try{ temp += "LangType=" + document.fdpay.LangType.value + "|"; }catch (e) { temp += "LangType=|"; }
        try{ temp += "BillType=" + document.fdpay.BillType.value + "|"; }catch (e) { temp += "BillType=|"; }
        try{ temp += "CardSelect=" + document.fdpay.CardSelect.value + "|"; }catch (e) { temp += "CardSelect=|"; }
        try{ temp += "escrowYn=" + document.fdpay.escrowYn.value + "|"; }catch (e) { temp += "escrowYn=|"; }
        try{ temp += "cashYn=" + document.fdpay.cashYn.value + "|"; }catch (e) { temp += "cashYn=|"; }
        try{ temp += "CcNameOnCard=" + document.fdpay.CcNameOnCard.value + "|"; }catch (e) { temp += "CcNameOnCard=|"; }
        try{ temp += "PhoneNO=" + document.fdpay.PhoneNO.value + "|"; }catch (e) { temp += "PhoneNO=|"; }
        try{ temp += "Email=" + document.fdpay.Email.value + "|"; }catch (e) { temp += "Email=|"; }
        try{ temp += "SupportDate=" + document.fdpay.SupportDate.value + "|"; }catch (e) { temp += "SupportDate=|"; }
        try{ temp += "EncodeType=" + document.fdpay.EncodeType.value + "|"; }catch (e) { temp += "EncodeType=|"; }

        temp += "CallHash=" + callhash + "|"; //CallHash DATA 추가!!

        document.fdpay.PAYDATA.value = temp;

    }

    //결제하기 호출 시 처리 (Mobile)
    function payProcMobile(){

        var frm = document.fdpay;

        frm.acceptCharset = 'euc-kr';
        if(document.all)document.charset = 'euc-kr';

        frm.action = "https://testpg.firstpay.co.kr/jsp/mobile.jsp";
        frm.submit();

    }
    //결제하기 호출 시 처리 (PC)
    function payProcPC(){
        if(popflag == "P"){	//POPUP 호출 시
            window.open("payment/integration/pop.html","PAY_POP","width=560, height=602, scrollbars=1");
        }else{				//LAYER 호출 시
            FD_PAY_FRAME.location.href = "payment/integration/layer.php";	//FDK 결제 창 호출 페이지로 프레임 영역 변경
            layer_open('fdpayWin');						//"FD_PAY_FRAME" 프레임을 가지고 있는 DIV 영역의 ID를 입력(sample 이용 시 : id="fdpayWin")
        }
    }

    //레이어 팝업 호출 시 처리
    function layer_open(el){

        wrapWindowByMask();			//레이어 팝업 활성화 시 하단 MASKING 처리를 위한 함수

        var fdlayer = $('#' + el);	//레이어의 id를 fdlayer변수에 저장

        fdlayer.fadeIn();			//레이어 실행

        // 화면의 중앙에 레이어를 띄운다.
        fdlayer.css('margin-top', '-'+fdlayer.outerHeight()/2+'px');
        fdlayer.css('margin-left', '-'+fdlayer.outerWidth()/2+'px');

        fdlayer.find('a.closeBtn').click(function(e){

            fdlayer.fadeOut();			//'Close'버튼을 클릭하면 레이어가 사라진다.

            e.preventDefault();

            document.getElementById("mask").style.display = "none";	//레이어 팝업 비활성화 시 하단 MASKING 표시 해제

            FD_PAY_FRAME.location.href = "blank.html";				//빈 페이지로 프레임 영역 변경

        });
    }

    //레이어 팝업 하단 영역 마스킹 처리(레이어 팝업 호출 시 사용)
    function wrapWindowByMask(){

        //화면의 높이와 너비를 구한다.
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

        //마스크의 높이와 너비를 화면 것으로 만들어 전체 화면을 채운다.
        $('#mask').css({'width':maskWidth,'height':maskHeight});

        //애니메이션 효과
        $('#mask').fadeIn(1000);
        $('#mask').fadeTo("slow",0.6);
    }

    //결제 창 결과 return 처리
    function result(rtncode, rtnmsg, fdtid){

        //레이어 팝업으로 호출한 경우만 처리
        if(popflag != "P"){
            FD_PAY_FRAME.location.href = "blank.html";					//결제창 결과 수신 시 빈 페이지로 프레임 영역 변경
            document.getElementById("fdpayWin").style.display = "none";	//결제창 결과 수신 시 프레임 영역 표시 해제
            document.getElementById("mask").style.display = "none";		//결제창 결과 수신 시 하단 MASKING 표시 해제
            window.addEventListener( 'message', function( e ) {
                console.log( e.data );
            } );
        }
        if(rtncode == "0000"){
            var mxid = document.fdpay.MxID.value;
            var mxissueno = document.fdpay.MxIssueNO.value;
            var product_name = document.fdpay.MxIssueNO.value;

            document.pay.MxID.value = mxid;
            document.pay.MxIssueNO.value = mxissueno;
            document.pay.FDTid.value = fdtid;

            document.pay.action = "ajax/payment_order_insert.php";
            document.pay.submit();
        }else{
            alert("인증실패["+rtncode+"("+rtnmsg+")]");
        }
    }


</script>
<?php
include_once('../../tale.php');
?>
