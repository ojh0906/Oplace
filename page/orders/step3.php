<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/orders.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />

<!-- 결제 정보 확인 -->
<section id="contact-page">
    <article class="max banner">
        <p class="main-title">ORDERS</p>
        <p class="sub-title">결제 정보 확인</p>
    </article>

    <article class="contact-form order-form" id="orders-page">
        <div class="max order-data-box">
            <aside class="order-regdate-box">
                <div class="num-regdate">
                    <p><span>주문번호</span> 2023-11111-11</p>
                    <p class="line">|</p>
                    <p><span>결제일자</span> 2023.05.00</p>
                </div>
                <p class="detail">상세보기</p>
            </aside>
            <aside class="order-data">
                <div>
                    <p><span>이름</span> 홍길동전</p>
                    <p><span>이메일</span>hong@</p>
                </div>
                <div>
                    <p><span>휴대폰 번호</span> 010-1234-1234</p>
                    <p><span>선택한 서비스</span> 컨셉개발</p>
                </div>
                <div>
                    <p><span>부가서비스</span> 슬로건</p>
                    <p><span>결제 금액</span> 118,000,000원</p>
                </div>
            </aside>
        </div>
    </article>
</section>

<?php
include_once('../../tale.php');
?>