<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/popup.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
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
                <p class="menu click">1. 부가서비스</p>
                <p class="menu">2. 규정 동의</p>
                <p class="menu">3. 약관 동의</p>
                <p class="menu">4. 정보 입력</p>
                <p class="menu">5. 결제 방법</p>
                <p class="menu">6. 자료 요청</p>
                <p class="menu">7. 접수 완료</p>
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
                <p onClick="location.href ='<?php echo $site_url ?>/page/order/step2.php'">다음 <img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>

<?php
include_once('../../tale.php');
?>