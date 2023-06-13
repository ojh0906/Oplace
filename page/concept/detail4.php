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
                    <p class="click" onClick="location.href ='<?php echo $site_url ?>/page/concept/detail4.php'">리조트 및
                        테마파크</p>
                    <p onClick="location.href ='<?php echo $site_url ?>/page/concept/detail5.php'">재생공간</p>
                </div>
            </aside>
        </article>
        <article class="banner">
            <div class="max">
                <aside class="text-box">
                    <div class="title-wrap">
                        <p class="sub-title">
                            <span>리조트 및 테마파크</span> 개발에<br />
                            브랜드 컨셉이 필요한 이유
                        </p>
                    </div>
                    <ul class="text-wrap">
                        <li>
                            공간 디자인과 컨셉 간 관련성을 높일 수 있습니다.
                        </li>
                        <li>
                            일관된 공간 구성 및 경험 제공을 도모할 수있습니다.
                        </li>
                        <li>
                            매력적인 체험과 추억 창출을 가능하게 합니다.
                        </li>
                        <li>
                            브랜드 가치 향상 기여할 수 있습니다.
                        </li>
                        <li>
                            방문객 만족도 및 재방문 동기를 부여할 수 있습니다.
                        </li>
                    </ul>
                </aside>
                <img class="round" src="<?php echo $site_url ?>/img/concept/detail/resort/round.png" />
            </div>
        </article>

        <article class="result-box">
            <div class="max">
                <p class="text">
                    <span>도시 및 지역</span>의 컨셉 개발 사례
                </p>
                <aside class="result-wrap">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/resort/1.png" />
                        <div class="img-title">
                            서울 마리나클럽&요트 - 바람처럼 자유롭게<br />
                            <p>Feel Your Breeze</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/resort/2.png" />
                        <div class="img-title">
                            야마가 오센 리조트 - 당신의 평화를 찾아보세요<br />
                            <p>Find Your Serenity</p>
                        </div>

                        <div class="mark">
                            PBI
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/resort/3.png" />
                        <div class="img-title">
                            디즈니 캘리포니아 어드벤처 - 모험과 상상력의 충돌<br />
                            <p>Where Adventure & Imagination Collide</p>
                        </div>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/concept/detail/resort/4.png" />
                        <div class="img-title">
                            웨스틴 에너하임 리조트 - 천상의 휴식<br />
                            <p>Heavenly bed, Heavenly bath</p>
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
                                <a href="/oplace/page/order/step1.php?type=4">주문하기<img src="<?php echo $site_url ?>/img/concept/detail/check.png" /></a>
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
