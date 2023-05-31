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
                <p class="menu click">4. 정보 입력</p>
                <p class="menu">5. 결제 방법</p>
                <p class="menu">6. 자료 요청</p>
                <p class="menu">7. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">정보 입력</p>
            <aside class="info-wrap">
                <div class="info-input">
                    <p>이름</p>
                    <input id="name" name="name" type="text" required placeholder="이름을 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>휴대폰 번호</p>
                    <input id="name" name="name" type="text" required placeholder="휴대폰번호를 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>이메일</p>
                    <input id="name" name="name" type="email" required placeholder="이메일을 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>비밀번호</p>
                    <input id="name" name="name" type="password" required placeholder="비밀번호를 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>비밀번호 확인</p>
                    <input id="name" name="name" type="password" required placeholder="비밀번호를 입력해주세요." />
                </div>
            </aside>


            <div class="next-btn">
                <p onClick="location.href ='<?php echo $site_url ?>/page/order/step5.php'">다음 <img
                        src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>