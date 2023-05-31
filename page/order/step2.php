<?php
include_once('../../head.php');
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
                <p class="menu click">2. 규정 동의</p>
                <p class="menu">3. 약관 동의</p>
                <p class="menu">4. 정보 입력</p>
                <p class="menu">5. 결제 방법</p>
                <p class="menu">6. 자료 요청</p>
                <p class="menu">7. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">부가 서비스</p>
            <ol class="term">
                <li>
                    결제를 하시면 관련된 자료 요청 리스트를 보내 드립니다.
                </li>
                <li>
                    항목에 답하여 주시거나 자료를 첨부하여 주십시오.
                </li>
                <li>
                    회신 내용과 첨부 자료를 기준으로 작업이 시작됩니다.
                </li>
                <li>
                    질문 사항이 있으시면 적어주세요.
                </li>
                <li>
                    요청된 오더는 7~10일 후 전달 됩니다.
                </li>
                <li>
                    선택한 안에 대해 1회의 보안 작업이 이루어집니다.
                </li>
                <li>
                    이해를 돕기 위해 사용하는 사진은 저작권이 있을 수 있습니다. 사진은 외부 노출을 자제하여 주십시오.
                </li>
                <li>
                    본 내용에 동의하시면 아래를 버튼을 클릭하여 주십시오.
                </li>
            </ol>
            <div class="next-btn">
                <p onClick="location.href ='<?php echo $site_url ?>/page/order/step3.php'">다음 <img
                        src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>