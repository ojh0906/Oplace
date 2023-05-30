<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/orders.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />

<!-- 주문내역 페이지 -->
<section id="contact-page">
    <article class="max banner">
        <p class="main-title">ORDERS</p>
        <p class="sub-title">주문내역</p>
    </article>

    <article class="contact-form" id="orders-page">
        <div class="max">
            <!-- <form name="contact_form" id="contact_form" method="post" action="contact_write.php" onsubmit="return FormSubmit();"> -->
            <!-- <input type="hidden" name="writer_ip" value="get_client_ip()" /> -->
            <!-- <input type="hidden" name="action" value="go"> -->
            <aside class="contact-container">
                <p class="contact-title">비밀번호 확인하기</p>
                <div class="input-text">
                    <p class="input-title">휴대폰 번호</p>
                    <input type="email" name="email" placeholder="휴대폰 번호를 입력해주세요." required>
                    <div class="send phone-btn">
                        인증번호 전송
                    </div>
                </div>
                <div class="input-text">
                    <p class="input-title">비밀번호</p>
                    <input type="password" name="password" placeholder="비밀번호를 입력해주세요." required>
                </div>

                <div class="re-find-box">
                    <label for="rememberPW" class="re-pw">
                        <input type="checkbox" name="rememberPW">
                        이메일 기억하기
                    </label>
                    <a class="find-pw">비밀번호 찾기</a>
                </div>
                <input class="send" type="submit" value="조회하기" onclick="sendTo();" />
            </aside>
            <!-- </form> -->
        </div>

    </article>



</section>

<?php
include_once('../../tale.php');
?>