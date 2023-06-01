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

        <article class="order-container done-container">
            <p class="title">결제 완료</p>

            <aside class="done-wrap">
                <img class="done" src="<?php echo $site_url ?>/img/order/Done.png" />
                <p class="done-text">결제가 완료되었습니다.</p>
                <div class="done-btn-wrap">
                    <div class="next-btn home-btn">
                        <p onClick="location.href ='<?php echo $site_url ?>'">홈으로 <img src="<?php echo $site_url ?>/img/order/arr-r-mint.png" /></p>
                    </div>
                    <div class="next-btn">
                        <p onClick="location.href ='<?php echo $site_url ?>/page/order/step6.php'">자료 입력 <img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
                    </div>
                </div>
            </aside>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>