<?php
include_once('../head.php');
?>

<link rel="stylesheet" type="text/css" href="../css/contact.css" rel="stylesheet" />

<!-- 프로젝트 실적 페이지 -->
<section id="contact-page">
    <article class="max banner">
        <p class="main-title">CONTACT US</p>
        <p class="sub-title">문의하기</p>
    </article>

    <article class="contact-form">
        <div class="max">
            <!-- <form name="contact_form" id="contact_form" method="post" action="contact_write.php" onsubmit="return FormSubmit();"> -->
            <!-- <input type="hidden" name="writer_ip" value="get_client_ip()" /> -->
            <!-- <input type="hidden" name="action" value="go"> -->
            <div class="contact-img">
                <img src="<?php echo $site_url ?>/img/concept/1city/3.png" />
                <p class="text"><strong>주소</strong> 서울특별시....</p>
            </div>

            <aside class="contact-container">
                <!-- 담당자 & 이메일 -->
                <div class="name-email-box input-text">
                    <div class="name-box">
                        <p class="input-title">담당자명</p>
                        <input type="text" name="name" placeholder="담당자 성함을 입력해주세요." required>
                    </div>
                    <div class="email-box">
                        <p class="input-title">이메일 주소</p>
                        <input type="email" name="email" placeholder="이메일 주소를 입력해주세요." required>
                    </div>
                </div>

                <!-- 분야 선택 -->
                <div class="field select-wrap">
                    <p class="input-title">분야 선택</p>
                    <div class="select">
                        <input type="radio" id="field1" value="0" name="field" checked required>
                        <label for="field1">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>도시&지역</span>
                        </label>
                        <input type="radio" id="field2" value="1" name="field">
                        <label for="field2">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>주거&오피스</span>
                        </label>
                        <input type="radio" id="field3" value="2" name="field">
                        <label for="field3">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>복합공간&리테일</span>
                        </label>
                        <input type="radio" id="field4" value="3" name="field">
                        <label for="field4">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>리조트&테마파크</span>
                        </label>
                        <input type="radio" id="field5" value="4" name="field">
                        <label for="field5">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>재생공간</span>
                        </label>
                    </div>
                </div>

                <!-- 개발 단계 -->
                <div class="step select-wrap">
                    <p class="input-title">분야 선택</p>
                    <div class="select">
                        <input type="radio" id="step1" value="0" name="step" checked required>
                        <label for="step1">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>구상 단계</span>
                        </label>
                        <input type="radio" id="step2" value="1" name="step">
                        <label for="step2">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>진행 단계</span>
                        </label>
                        <input type="radio" id="step3" value="2" name="step">
                        <label for="step3">
                            <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                            <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                            <span>완료 단계</span>
                        </label>
                    </div>
                </div>

                <!-- 잘문 및 의견 -->
                <div class="question-box input-text">
                    <p class="input-title">질문 및 의견</p>
                    <div class="input-item">
                        <textarea rows="3" name="contact_desc"></textarea>
                    </div>
                </div>

                <!-- 문의하기 버튼 -->
                <input class="send" type="submit" value="문의하기" onclick="sendTo();" />
            </aside>
            <!-- </form> -->
        </div>

    </article>



</section>

<?php
include_once('../tale.php');
?>