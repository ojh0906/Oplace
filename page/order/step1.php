<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/popup.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-popup.css" rel="stylesheet" />

<!-- 팝업 화면 -->
<section class="layer-popup-wrap layer-popup-naming" id="order-popup">
    <div class="layer-popup">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />

        <article class="naming-popup">
            <p class="naming-title">
                <img src="<?php echo $site_url ?>/img/header/logo.png" />
                Naming 네이밍 프로세스
            </p>
            <div>
                <div class="naming-container">
                    <div class="step-box">
                        <p class="step-title">
                            1. 브랜드 목표 설정
                        </p>
                        <p class="step-text">
                            브랜드의 성장과 비전, 사회적 기여 등을 함축한 브랜드 목표를 설정합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            2. 브랜드 스토리 개발
                        </p>
                        <p class="step-text">
                            브랜드가 어떤 이유로 존재하는지, 어떤 가치를 제공하는지에 대한 이야기입니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            3. 주요 단어 도출
                        </p>
                        <p class="step-text">
                            브랜드의 핵심 가치와 이미지를 고려하여 주요 단어를 도출합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            4. 네이밍 개발
                        </p>
                        <p class="step-text">
                            브랜드의 기술적, 이미지적, 시대적, 지리적 네이밍 연구와 신조어, 합성어 등 다양한 방식을 실행합니다.
                        </p>
                    </div>
                    <br />

                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            5. 네이밍 검증
                        </p>
                        <p class="step-text">
                            발음이나 철자, 브랜드 이미지와의 일치도, 유니크함, 검색 엔진 최적화(SEO) 등도 충분히 고려합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />

                    <br />


                    <div class="step-box">
                        <p class="step-title">
                            6. 명칭후보 선정
                        </p>
                        <p class="step-text">
                            개발안 중에서 등록 가능성이 높은 ‘중, 상’의 네이밍 중 최종 3종의 네이밍을 선정합니다.
                            <span>
                                * 등록 가능성 높은 중, 상으로 3종 제안 (1류 기준 / 1류 추가 시 100만원)
                            </span>
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            7. 광고주 컨펌
                        </p>
                        <p class="step-text">
                            광고주 검토후, 선정된 한가지 안에 대해 보안 작업을 진행하여 완료합니다.
                        </p>
                    </div>
                </div>
            </div>

            <div class="naming-result">
                <p class="result-title">
                    네이밍 결과물
                    <span>
                        네이밍 개발 비용 : 3,000,000원 (VAT 별도)
                    </span>
                </p>

                <div class="result-box">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/Creating.png" />
                        <p>
                            네이밍 프로세스
                        </p>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/3.png" />
                        <p>
                            네이밍 3안
                        </p>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/PPT.png" />
                        <p>
                            제출형식: PPT
                        </p>
                    </div>
                </div>
            </div>

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
        $(".layer-popup-naming").css('display', 'flex');
    }
</script>


<!-- 결제 정보 확인 -->
<section id="order-page">
    <div class="main-container">
        <article class="menu-box">
            <p class="title">주문하기</p>
            <div class="menu-text">
                <p class="menu click">1. 부가서비스</p>
                <p class="menu">2. 규정 동의</p>
                <p class="menu">3. 약관 동의</p>
                <p class="menu">4. 정보 입력</p>
                <p class="menu">5. 결제</p>
                <p class="menu">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">부가 서비스</p>
            <div class="service-box-wrap">

                <aside class="service-wrap">
                    <div class="service-box">
                        <img src="<?php echo $site_url ?>/img/order/1.png" />
                        <div class="text-box">
                            <div class="text">
                                <p class="tit">강력한 네이밍 개발로 장소를 완성하세요!</p>
                                <p class="sub-tit">장소 및 개발지에 좋은 네이밍을 개발하면 브랜드 인지도를 높일 수 있으며, 경쟁 우위를 점하고, 브랜드 가치를 창출하는 데
                                    큰
                                    도움을 줍니다. 또한 지역사회와의 관계 강화, 마케팅 효과 상승, 검색 엔진 최적화(SEO) 등 다양한 이점을 생깁니다.</p>
                            </div>
                            <div class="more-box">
                                <p class="click-more" onclick="detailPopup()">자세히 알아보기<img
                                        src="<?php echo $site_url ?>/img/order/arr-r-gray.png" /></p> <label>
                                    <input id="target" name="target" type="checkbox" />
                                    선택하기
                                </label>
                            </div>
                        </div>
                    </div>
                </aside>

                <aside class="service-wrap">
                    <div class="service-box">
                        <img src="<?php echo $site_url ?>/img/order/2.png" />
                        <div class="text-box">
                            <div class="text">
                                <p class="tit">브랜드 시각화는 성공의 시작!</p>
                                <p class="sub-tit">우리의 현장은 오프라인이지만 현대의 모든 고객과의 소통은 디지털 세상에서 이루어집니다.<br />
                                    차별화되고 확장성과 유연성을 가진 세련된 멋진 로고 디자인은 디지털 기반에서 브랜드의 유니크 함과 재미, 브랜드 가치와 신뢰를 줄 것입니다.</p>
                            </div>
                            <div class="more-box">
                                <p class="click-more">자세히 알아보기<img
                                        src="<?php echo $site_url ?>/img/order/arr-r-gray.png" /></p>
                                <label>
                                    <input id="target" name="target" type="checkbox" />
                                    선택하기
                                </label>
                            </div>
                        </div>
                    </div>
                </aside>

                <aside class="service-wrap">
                    <div class="service-box">
                        <img src="<?php echo $site_url ?>/img/order/3.png" />
                        <div class="text-box">
                            <div class="text">
                                <p class="tit">관계사, 투자사들을 효율적으로 이해시키고 공감대를 형성하는 영상 제작!</p>
                                <p class="sub-tit">
                                    사업 방향과 컨셉 등을 영상으로 제작하여 발표하면 체제적이고 일관적으로 내용을 전달 할 수 있습니다.<br />
                                    또한 시각적 효과를 통한 쉬운 이해와 공감대를 형성하고 비즈니스의 구조를 빠르게 안착하는 것에 도움을 줍니다.
                                </p>
                            </div>
                            <div class="more-box">
                                <p class="click-more">자세히 알아보기<img
                                        src="<?php echo $site_url ?>/img/order/arr-r-gray.png" /></p> <label>
                                    <input id="target" name="target" type="checkbox" />
                                    선택하기
                                </label>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="table-wrap">
                <aside>
                    <div class="th">
                        <p>서비스 명</p>
                        <p>견적</p>
                    </div>
                    <div class="tr">
                        <p>도시와 지역 컨셉 개발</p>
                        <p>3,500,000 원</p>
                    </div>
                </aside>
                <aside>
                    <div class="th">
                        <p>추가된 부가 서비스</p>
                        <p>견적</p>
                    </div>
                    <div class="tr">
                        <p>네이밍</p>
                        <p>3,000,000 원</p>
                    </div>
                    <div class="tr">
                        <p>로고 디자인</p>
                        <p>3,000,000 원</p>
                    </div>
                </aside>
                <aside class="total-wrap">
                    <div class="price">
                        <p>합계</p>
                        <p>9,500,000 원</p>
                    </div>
                    <div class="price">
                        <p>부가가치세 (+10%)</p>
                        <p>950,000 원</p>
                    </div>
                    <div class="price">
                        <p>총 합계</p>
                        <p>10,450,000 원</p>
                    </div>
                </aside>
            </div>

            <div class="next-btn">
                <p onClick="location.href ='<?php echo $site_url ?>/page/order/step2.php'">다음 <img
                        src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>