<?php
include_once('../../head.php');

//접속 확인
if(!isset($_SERVER['HTTP_REFERER']) && !isset($_SESSION['order_temp_id'])){
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
$prevPage = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
//TODO 아래 경로 "oplace" 수정해야함
if($prevPage != '/oplace/page/order/step2.php') {
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
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
                <p class="menu click">3. 약관 동의</p>
                <p class="menu">4. 정보 입력</p>
                <p class="menu">5. 결제</p>
                <p class="menu">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">약관 동의</p>

            <aside class="term-wrap">
                <div class="term-box">
                    <p class="term-title">(필수) 이용 약관</p>
                    <div class="term-text">
                        약관 내용이 들어가는 영역입니다.<br />
                        약관 내용이 들어가는 영역입니다.<br />
                        약관 내용이 들어가는 영역입니다.<br />
                    </div>
                    <label class="term-checkbox">
                        <input id="target1" required name="target" type="checkbox" required/>
                        이용약관에 동의합니다.
                    </label>
                </div>
                <div class="term-box">
                    <p class="term-title">(필수) 개인정보처리방침</p>
                    <div class="term-text">
                        개인정보처리방침이 들어가는 영역입니다. 개인정보처리방침이 들어가는 영역입니다.
                        개인정보처리방침이 들어가는 영역입니다. 개인정보처리방침이 들어가는 영역입니다.
                        개인정보처리방침이 들어가는 영역입니다. 개인정보처리방침이 들어가는 영역입니다.
                    </div>
                    <label class="term-checkbox">
                        <input id="target2" required name="target" type="checkbox" required/>
                        개인정보처리방침에 동의합니다.
                    </label>
                </div>
                <div class="term-box">
                    <p class="term-title">(선택) 마케팅 정보제공</p>
                    <div class="term-text">
                        약관 내용이 들어가는 영역입니다.<br />
                        약관 내용이 들어가는 영역입니다.<br />
                        약관 내용이 들어가는 영역입니다.<br />
                    </div>
                    <label class="term-checkbox">
                        <input id="target3" name="target" type="checkbox" required/>
                        마케팅 정보제공에 동의합니다.
                    </label>
                </div>

                <label class="all-term">
                    <input id="cbx_chkAll" name="target" type="checkbox" />
                    <p>위의 모든 약관 (이용약관, 개인정보처리방침, 마케팅 정보제공)에 동의합니다.</p>
                </label>
            </aside>

            <div class="next-btn">
                <p onClick="validation();">다음 <img
                        src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>
</section>

<script>
    function validation(){
        var target1 = $("#target1").prop('checked');
        var target2 = $("#target2").prop('checked');
        if(!target1){
            alert("이용 약관에 동의해주세요")
            $("#target1").focus();
            return false;
        } else if(!target2){
            alert("개인정보처리방침에 동의해주세요")
            $("#target2").focus();
            return false;
        } else{
            location.href ='step4.php';
            return true;
        }
    }

    $("#cbx_chkAll").click(function(){
        if($("#cbx_chkAll").is(":checked")){
            $("input[name=target]").prop("checked", true);
        }else {
            $("input[name=target]").prop("checked", false);
        }
    });
</script>
<?php
include_once('../../tale.php');
?>
