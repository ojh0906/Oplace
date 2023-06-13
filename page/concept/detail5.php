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
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail3.php'">복합공간 및 리테일</p>
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail4.php'">리조트 및 테마파크</p>
                    <p class="click" onClick="location.href ='<?php echo $site_url ?>/page/concept/detail5.php'">재생공간
                    </p>
                </div>
            </aside>
        </article>
        <article class="banner">
            <div class="max">
                <aside class="text-box">
                    <div class="title-wrap">
                        <p class="sub-title">
                            <span>재생공간</span> 개발에<br />
                            브랜드 컨셉이 필요한 이유
                        </p>
                    </div>
                    <ul class="text-wrap">
                        <li>
                            지역사회와 공감대를 형성할 수 있습니다.
                        </li>
                        <li>
                            지역 경제 및 문화 발전을 고려한 스토리를 제시합니다.
                        </li>
                        <li>
                            문화적, 예술적 측면에서 새로운 접근을 제공할 수 있습니다.
                        </li>
                        <li>
                            창의적 아이디어 및 감각적 디자인의 기초가 됩니다.
                        </li>
                        <li>
                            컨셉을 통해 개발 방향성을 구체화 할 수 있습니다.
                        </li>
                        <li>
                            건축 리뉴얼, 디자인, 기능, 콘텐츠 결정을 용이하게 합니다.
                        </li>
                    </ul>
                </aside>
                <img class="round" src="<?php echo $site_url ?>/img/concept/detail/space/round.png" />
            </div>
        </article>

        <article class="result-box">
            <div class="max">
                <p class="text">
                    <span>도시 및 지역</span>의 컨셉 개발 사례
                </p>
                <aside class="result-wrap">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/space/1.png" />
                        <div class="img-title">
                            프로보크 - 삶에 대한 호기심을 촉발하다<br />
                            <p>Provoke Curiosity</p>
                        </div>
                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/space/2.png" />
                        <div class="img-title">
                            서울혁신파크 - 전환적 사회혁신의 글로벌 생산 기지
                        </div>
                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/space/3.png" />
                        <div class="img-title">
                            뉴욕 하이라인 - 도시의 번잡함 위에서<br />
                            <p>Above the city.Above the fray</p>
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/space/4.png" />
                        <div class="img-title">
                            더 링크 - 링크로 발견하고 발전하라<br />
                            <p>Savor Life.Embrace Culture</p>
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
                                <a href="/oplace/page/order/step1.php?type=5">주문하기<img src="<?php echo $site_url ?>/img/concept/detail/check.png" /></a>
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
