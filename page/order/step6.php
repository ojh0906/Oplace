<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/popup.css" rel="stylesheet" />

<!-- 팝업 화면 -->
<section class="layer-popup-wrap" id="order-popup">
    <div class="layer-popup submit-layer-popup">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
        <article class="submit-popup">
            <p class="title">
                <img class="" src="<?php echo $site_url ?>/img/header/logo.png" />
                최종 절차 안내
            </p>

            <p class="text">
                자료가 접수 되었습니다. 본 자료를 기준으로 작업이 진행됩니다.<br />
                <strong>2023.00.00 18:00</strong>에 자료를 받으실 수 있습니다.<br />
                안을 선택하시면 1회의 보안 작업을 요청하실 수 있습니다.
            </p>

            <p class="submit-btn">
                제출하기<img class="" src="<?php echo $site_url ?>/img/order/submit.png" />
            </p>
        </article>
    </div>
</section>

<script>
    $(document).ready(function () {
        $(".close-popup").click(function () {
            console.log('close-popup')
            $(this).parent().parent().hide();
        });
    });

    // 창열기
    function todayOpen(winName) {
        var obj = eval("window." + winName);
    }
    // 창닫기
    function todayClose(winName, expiredays) {
        setCookie(winName, "expire", expiredays);
        var obj = eval("window." + winName);
        $('#' + winName).hide();
    }
    function detailPopup() {
        $(".layer-popup-wrap").css('display', 'flex');
    }
</script>


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
                <p class="menu">5. 결제</p>
                <p class="menu click">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form" id="contact-page">
            <p class="title">자료 첨부</p>
            <p class="sub-tit">컨셉 개발을 위해 아래 자료를 요청드립니다. 자료를 첨부하시거나 내용을 적어 주십시오.</p>

            <!-- 개발 단계 -->
            <div class="contact-form">
                <div class="contact-container">
                    <div class="field select-wrap">
                        <p class="input-title">개발 단계</p>
                        <div class="select">
                            <input type="radio" id="field1" value="0" name="field" checked required>
                            <label for="field1">
                                <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                                <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                                <span>구상 단계</span>
                            </label>
                            <input type="radio" id="field2" value="1" name="field">
                            <label for="field2">
                                <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                                <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                                <span>개발 중</span>
                            </label>
                            <input type="radio" id="field3" value="2" name="field">
                            <label for="field3">
                                <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                                <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                                <span class="open-date">
                                    완료 단계 / 오픈 예정일
                                    <input type="date" id="date" name="date" />
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-info">
                <div class="input-box">
                    <div class="input-wrap">
                        <p class="input-title">회사 소개</p>
                        <input class="input-text" type="text" name="company"
                            placeholder="기업 철학, 비즈니스 유형, 유사 개발 실적 외 회사 기본 정보 (회사 소개서 첨부 권장)" />
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">개발 현황</p>
                        <input class="input-text" type="text" name="company"
                            placeholder="주소, 면적, 평면도, 조감도, 입지분석, 지역 현황 (자료 첨부 권장)" />
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">개발 목표, 비전</p>
                        <input class="input-text" type="text" name="company"
                            placeholder="개발의 목표, 목적, 예상 효과, 업계에 미치는 영향, 확장 방향, 공공성(지역사회 역할 및 연계 부분)" />
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">시설 개요</p>
                        <input class="input-text" type="text" name="company"
                            placeholder="도입시설 구성의 목표와 방향성, 확정된 도입시설, 콘텐츠, MD 등의 정보 (자료 첨부 권장)" />
                        <div class="input-btn">
                            <label for="company-file">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="company-file" name="company-file" type="file" />
                        </div>
                    </div>
                    <div class="input-wrap">
                        <p class="input-title">예상 타겟</p>
                        <input class="input-text" type="text" name="company" placeholder="주요 예상 고객층, 도입시설별 예상 고객" />
                        <div class="input-btn">
                            <label for="target">
                                <img src="<?php echo $site_url ?>/img/attach.png" />
                                파일 선택
                            </label>
                            <input id="target" name="target" type="file" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="next-btn">
                <!--부가 서비스가 있을 경우 : 다음으로 -->
                <p onclick="detailPopup()">제출하기<img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>