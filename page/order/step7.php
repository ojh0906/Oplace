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
                <p class="menu">5. 결제 방법</p>
                <p class="menu">6. 자료 요청</p>
                <p class="menu click">7. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">결제 완료</p>
            <aside class="thank-wrap">
                <p class="thank-text">
                    접수 해 주셔서 감사합니다.<br />
                    아래 장바구니 확인하기를 통해 결제한 내역을 확인할 수 있습니다.
                </p>
                <div class="next-btn">
                    <p onClick="location.href ='<?php echo $site_url ?>/page/orders/step1.php'">확인하기
                        <img class="cart" src="<?php echo $site_url ?>/img/order/shopping-cart.png" />
                    </p>
                </div>
            </aside>
        </article>
    </div>
</section>

<?php
include_once('../../tale.php');
?>