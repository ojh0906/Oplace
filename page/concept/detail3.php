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
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail2.php'">주거 및
                        오피스</p>
                    <p class="click" onClick="location.href ='<?php echo $site_url ?>/page/concept/detail3.php'">복합공간 및
                        리테일</p>
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
                            <span>복합공간 및 리테일</span> 개발에<br />
                            브랜드 컨셉이 필요한 이유
                        </p>
                    </div>
                    <ul class="text-wrap">
                        <li>
                            새로운 경험 및 가치 창출을 스토리화 할 수 있습니다.
                        </li>
                        <li>
                            개발 컨셉으로 정체성과 목적의 명확화가 가능합니다.
                        </li>
                        <li>
                            건축 디자인과 기능 결정에 도움을 줄 수 있습니다.
                        </li>
                        <li>
                            콘텐츠 구성에 컨셉 스토리를 활용할 수 있습니다.
                        </li>
                        <li>
                            고객 만족도 및 경쟁력 향상에 기여할 수 있습니다.
                        </li>
                    </ul>
                </aside>
                <img class="round" src="<?php echo $site_url ?>/img/concept/detail/retail/round.png" />
            </div>
        </article>

        <article class="result-box">
            <div class="max">
                <p class="text">
                    <span>도시 및 지역</span>의 컨셉 개발 사례
                </p>
                <aside class="result-wrap">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/retail/1.png" />
                        <div class="img-title">
                            뚜레쥬르 - 믿을 수 있는 베이커리<br />
                            <p>Trustful Bakery</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/retail/2.png" />
                        <div class="img-title">
                            길리안 초코렛 - 즐거운 초코렛 공방<br />
                            <p>The playful Chocolate Atelier</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/retail/3.png" />
                        <div class="img-title">
                            도쿄 미드타운 - 녹색의 다양성<br />
                            <p>Diversity on green</p>
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/retail/4.png" />
                        <div class="img-title">
                            더 링크 - 링크로 발견하고 발전하라<br />
                            <p>Go ahead, get your Linq on</p>
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
                                주문하기<img src="<?php echo $site_url ?>/img/concept/detail/check.png" />
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