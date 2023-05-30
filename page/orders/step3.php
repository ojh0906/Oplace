<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/popup.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/orders.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />

<!-- 팝업 화면 -->
<section class="layer-popup-wrap" id="order-popup">
    <div class="layer-popup">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
        <div class="order-data">
            <div>
                <p><span>주문번호</span> 2023-00000-00</p>
                <p><span>이름</span> 홍길동전</p>
                <p><span>이메일</span>hong@</p>
                <p><span>휴대폰 번호</span> 010-1234-1234</p>
            </div>
            <div>
                <p><span>서비스</span> 컨셉개발</p>
                <div class="data-service">
                    <p>
                        <span>부가서비스</span>
                    </p>
                    <ul>
                        <li>슬로건</li>
                        <li>네이밍</li>
                    </ul>
                </div>
                <p><span>결제 일자</span> 2023.00.00</p>
                <p><span>결제 금액</span> 118,000,000원</p>
            </div>
        </div>

        <div class="input-info">
            <p class="title">입력 정보 및 첨부파일</p>
            <div class="input-box">
                <div class="input-wrap">
                    <p class="input-title">회사 소개서</p>
                    <input class="input-text" type="text" name="company"
                        placeholder="기업 철학, 비즈니스 유형, 유사 개발 실적 외 회사 기본 정보 (회사 소개서 첨부 권장)" />
                    <div class="input-btn">
                        <label for="company-file">
                            <img src="<?php echo $site_url ?>/img/attach.png" />
                            파일 선택
                        </label>
                        <input id="company-file" name="company-file" type="file" @change="handleChange($event)" />
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
                        <input id="company-file" name="company-file" type="file" @change="handleChange($event)" />
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
                        <input id="company-file" name="company-file" type="file" @change="handleChange($event)" />
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
                        <input id="company-file" name="company-file" type="file" @change="handleChange($event)" />
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
                        <input id="target" name="target" type="file" @change="handleChange($event)" />
                    </div>
                </div>
            </div>
        </div>
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
                <p class="detail" onclick="detailPopup()">상세보기</p>
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