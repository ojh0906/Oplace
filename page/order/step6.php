<?php
include_once('../../head.php');

//접속 확인
if(!isset($_SERVER['HTTP_REFERER']) && !isset($_SESSION['MxIssueNO'])){
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
$prevPage = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
//TODO 아래 경로 "oplace" 수정해야함
if($prevPage != '/Oplace/page/order/step5-1.php') {
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
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
    function submit() {
        $("#order-common").submit();
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

        <article class="order-container contact-form order-form" id="contact-page" >
            <form id="order-common" method="post" action="ajax/order_common_file_insert.php" enctype="multipart/form-data">
                <p class="title">자료 첨부</p>
                <p class="sub-tit">컨셉 개발을 위해 아래 자료를 요청드립니다. 자료를 첨부하시거나 내용을 적어 주십시오.</p>

                <!-- 개발 단계 -->
                <div class="contact-form">
                    <div class="contact-container">
                        <div class="field select-wrap">
                            <p class="input-title">개발 단계</p>
                            <div class="select">
                                <input type="radio" id="field1" value="구상 단계" name="step" checked required>
                                <label for="field1">
                                    <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                                    <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                                    <span>구상 단계</span>
                                </label>
                                <input type="radio" id="field2" value="개발 중" name="step">
                                <label for="field2">
                                    <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                                    <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                                    <span>개발 중</span>
                                </label>
                                <input type="radio" id="field3" value="완료 단계" name="step">
                                <label for="field3">
                                    <img class="off" src="<?php echo $site_url ?>/img/contact/offcheck.png" />
                                    <img class="on" src="<?php echo $site_url ?>/img/contact/oncheck.png" />
                                    <span class="open-date">
                                        완료 단계 / 오픈 예정일
                                        <input type="date" id="date" name="date" value=""/>
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
                            <input class="input-text" type="text" name="company" required value=""
                                placeholder="기업 철학, 비즈니스 유형, 유사 개발 실적 외 회사 기본 정보 (회사 소개서 첨부 권장)" />
                            <div class="input-btn">
                                <label for="company-file">
                                    <img src="<?php echo $site_url ?>/img/attach.png" />
                                    파일 선택
                                </label>
                                <input id="company-file" name="file0" type="file" onchange="checkSize(this)" />
                            </div>
                        </div>
                        <div class="input-wrap">
                            <p class="input-title">개발 현황</p>
                            <input class="input-text" type="text" name="dev_status" required value=""
                                placeholder="주소, 면적, 평면도, 조감도, 입지분석, 지역 현황 (자료 첨부 권장)" />
                            <div class="input-btn">
                                <label for="dev_status_file">
                                    <img src="<?php echo $site_url ?>/img/attach.png" />
                                    파일 선택
                                </label>
                                <input id="dev_status_file" name="file1" type="file" onchange="checkSize(this)" />
                            </div>
                        </div>
                        <div class="input-wrap">
                            <p class="input-title">개발 목표, 비전</p>
                            <input class="input-text" type="text" name="dev_goal" required value=""
                                placeholder="개발의 목표, 목적, 예상 효과, 업계에 미치는 영향, 확장 방향, 공공성(지역사회 역할 및 연계 부분)" />
                            <div class="input-btn">
                                <label for="dev_goal_file">
                                    <img src="<?php echo $site_url ?>/img/attach.png" />
                                    파일 선택
                                </label>
                                <input id="dev_goal_file" name="file2" type="file" onchange="checkSize(this)" />
                            </div>
                        </div>
                        <div class="input-wrap">
                            <p class="input-title">시설 개요</p>
                            <input class="input-text" type="text" name="facility" required value=""
                                placeholder="도입시설 구성의 목표와 방향성, 확정된 도입시설, 콘텐츠, MD 등의 정보 (자료 첨부 권장)" />
                            <div class="input-btn">
                                <label for="facility_file">
                                    <img src="<?php echo $site_url ?>/img/attach.png" />
                                    파일 선택
                                </label>
                                <input id="facility_file" name="file3" type="file" onchange="checkSize(this)" />
                            </div>
                        </div>
                        <div class="input-wrap">
                            <p class="input-title">예상 타겟</p>
                            <input class="input-text" type="text" name="target" required value=""
                                   placeholder="주요 예상 고객층, 도입시설별 예상 고객" />
                            <div class="input-btn">
                                <label for="target_file">
                                    <img src="<?php echo $site_url ?>/img/attach.png" />
                                    파일 선택
                                </label>
                                <input id="target_file" name="file4" type="file" onchange="checkSize(this)" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="next-btn">
                    <!--부가 서비스가 있을 경우 : 다음으로 -->
                    <p onclick="submit()">제출하기<img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
                </div>
            </form>
        </article>
    </div>
</section>

<script>
    function checkSize(input) {
        if (input.files && input.files[0].size > (15 * 1024 * 1024)) {
            alert("파일 첨부는 15mb 이하만 가능합니다.");
            input.value = null;
        }
    }
</script>

<?php
include_once('../../tale.php');
?>
