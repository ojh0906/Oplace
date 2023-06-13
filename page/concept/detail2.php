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
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail1.php'">도시 및 지역</p>
                    <p class="click" onClick="location.href ='<?php echo $site_url ?>/page/concept/detail2.php'">주거 및
                        오피스</p>
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
                            <span>주거 및 오피스</span> 개발에<br />
                            브랜드 컨셉이 필요한 이유
                        </p>
                    </div>
                    <ul class="text-wrap">
                        <li>
                            건축물의 핵심 가치 및 정체성을 선정해 줍니다.
                        </li>
                        <li>
                            디자인, 기능, 콘텐츠 선정을 가이드 하여 줍니다.
                        </li>
                        <li>
                            사용자의 라이프스타일을 반영할 수 있습니다.
                        </li>
                        <li>
                            맞춤형 건축물 구현을 용이하게 해줍니다.
                        </li>
                        <li>
                            사용자의 만족도 향상을 도모할 수 있습니다.
                        </li>
                    </ul>
                </aside>
                <img class="round" src="<?php echo $site_url ?>/img/concept/detail/office/round.png" />
            </div>
        </article>

        <article class="result-box">
            <div class="max">
                <p class="text">
                    <span>도시 및 지역</span>의 컨셉 개발 사례
                </p>
                <aside class="result-wrap">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/office/1.png" />
                        <div class="img-title">
                            신세계건설 빌리브 - 새로움에 살다<br />
                            <p>Life-Connected Home</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/office/2.png" />
                        <div class="img-title">
                            라한호텔 - 가장 한국적인 환대<br />
                            <p>Authentic Pleasure</p>
                        </div>
                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/office/3.png" />
                        <div class="img-title">
                            세일즈포스 타워 - 새로운 집에 오신걸 환영합니다<br />
                            <p>The Ohana Floor</p>
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/office/4.png" />
                        <div class="img-title">
                            롯본기힐 - 문화.역사.경제 도교문화의 핵<br />
                            <p>Artelligent City</p>
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
                                <a href="/oplace/page/order/step1.php?type=2">주문하기<img src="<?php echo $site_url ?>/img/concept/detail/check.png" /></a>
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
