<?php
include_once('../../head.php');
?>

<link rel="stylesheet" type="text/css" href="../../css/result.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/concept-detail.css" rel="stylesheet" />

<!-- 프로젝트 실적 페이지 -->
<section id="result-page" class="">
    <div id="concept-detail">
        <article class="menu">
            <aside class="max">
                <div class="title">
                    CONCEPT<br />
                    CREATION SERVICE
                </div>
                <div class="btn-wrap">
                    <p class="click" onClick="location.href ='<?php echo $site_url ?>/page/concept/detail1.php'">도시 및 지역
                    </p>
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail2.php'">주거 및 오피스</p>
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail3.php'">복합공간 및 리테일</p>
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail4.php'">리조트 및 테마파크</p>
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail5.php'">재생공간</p>
                </div>
            </aside>
        </article>
        <article class="banner">
            <div class="max">
                <aside class="text-box">
                    <div class="title-wrap">
                        <p class="sub-title">
                            <span>도시 및 지역</span> 개발에<br />
                            브랜드 컨셉이 필요한 이유
                        </p>
                    </div>
                    <ul class="text-wrap">
                        <li>
                            도시나 지역의 진정한 가치를 선정해 줍니다.
                        </li>
                        <li>
                            관광 및 산업 육성 방향을 제시해 줍니다.
                        </li>
                        <li>
                            현지 상권 활성화 촉진 방향을 제시해 줍니다.
                        </li>
                        <li>
                            주민 자부심 고취 및 인구 증대 방안에 도움을 줍니다.
                        </li>
                        <li>
                            지역 문화 및 역사 보호와 발전 방향에 도움을 줍니다.
                        </li>
                        <li>
                            유니크한 분위기로 방문객 만족도 증대에 도움을 줍니다.
                        </li>
                        <li>
                            재방문 및 추천 동기의 근거를 제시해 줍니다.
                        </li>
                    </ul>
                </aside>
                <img class="round" src="<?php echo $site_url ?>/img/concept/detail/city/round.png" />
            </div>
        </article>

        <article class="result-box">
            <div class="max">
                <p class="text">
                    <span>도시 및 지역</span>의 컨셉 개발 사례
                </p>
                <aside class="result-wrap">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/city/1.png" />
                        <div class="img-title">
                            공주시 - 흥미진진<br />
                            <p>興美眞進</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/city/2.png" />
                        <div class="img-title">
                            평택 신장지구 - 5구역 5길 55 스토리<br />
                            <p>Sinjang Fly</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/city/3.png" />
                        <div class="img-title">
                            싱가폴 마리나베이 - 정원 속 도시<br />
                            <p>City in a garden</p>
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/city/4.png" />
                        <div class="img-title">
                            상하이 신천지 - 상하이의 거실<br />
                            <p>Shanghai’s living room</p>
                        </div>
                    </div>
                </aside>
            </div>
        </article>
        <article class="result-box report-box">
            <div class="max">
                <p class="text">
                    <img src="<?php echo $site_url ?>/img/logo.png" />
                    의 컨셉 개발 사례
                </p>

                <img class="round pc" src="<?php echo $site_url ?>/img/concept/detail/dev-report-pc.png" />
                <img class="round mobile" src="<?php echo $site_url ?>/img/concept/detail/dev-report-mo.png" />

                <div class="sample">
                    <p class="title">컨셉 개발 보고서 예시</p>
                    <div class="sample-box">
                        <img class="img" src="<?php echo $site_url ?>/img/concept/detail/sample.png" />
                        <div class="sample-text">
                            <p>
                                컨셉이 모든 개발 작업의 시작이자 끝입니다.<Br />
                                꼭 함께 하세요!
                            </p>
                            <p class="order-btn">
                                <a href="/oplace/page/order/step1.php?type=1">주문하기<img src="<?php echo $site_url ?>/img/concept/detail/check.png" /></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

</section>

<?php
include_once('../../tale.php');
?>
