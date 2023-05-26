<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('../head.php');

//팝업 출력하기 위한 sql문
$popup_sql = "select * from popup_tbl where `end_date` > NOW() order by id ";
$popup_stt = $db_conn->prepare($popup_sql);
$popup_stt->execute();

$today = date("Y-m-d H:i:s");
$view_sql = "insert into view_log_tbl
                              (view_cnt,  reg_date)
                         value
                              (? ,?)";

$db_conn->prepare($view_sql)->execute(
    [1, $today]
);
?>

<link rel="stylesheet" type="text/css" href="../css/popup.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../css/concept.css" rel="stylesheet" />

<!-- 팝업 화면 -->
<section class="layer-popup-wrap">
    <!-- PC -->
    <div class="layer-popup pc"
        style="max-width: <?= $popup_stt->fetch()['width'] ?> max-height: <?= $popup_stt->fetch()['height'] ?>">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
        <?
        $arr = array();
        while ($popup = $popup_stt->fetch()) {
            $arr[] = $popup['id'];
            ?>
            <img src="data/popup/<?= $popup['file_name'] ?>" alt="<?= $popup['popup_name'] ?>" />
            <!-- <img class="popup-img" src="<?php echo $site_url ?>/img/popup.png" alt=""> -->
            <?
        }
        ?>
    </div>

    <!-- MOBILE -->
    <div class="layer-popup mobile"
        style="max-width: <?= $popup_stt->fetch()['width'] ?> max-height: <?= $popup_stt->fetch()['height'] ?>">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
        <?
        $arr = array();
        while ($popup = $popup_stt->fetch()) {
            $arr[] = $popup['id'];
            ?>
            <img src="data/popup/<?= $popup['file_name'] ?>" alt="<?= $popup['popup_name'] ?>" />
            <!-- <img class="popup-img" src="<?php echo $site_url ?>/img/popup.png" alt=""> -->
            <?
        }
        ?>
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
</script>

<!-- 컨셉 개발 페이지 -->
<section id="concept-page">
    <article class=" ">
        <div class="title-wrap max">
            CONCEPT CREATION<br class="mo-br1024" /> SERVICE AREAS<br />
            <p class="title">
                컨셉개발서비스 영역
            </p>
        </div>
        <div class="service-areas">
            <p class="title">비즈 분야</p>
            <div class="area-box">
                <div class="area">도시 및 지역</div>
                <div class="area">주거 및 오피스</div>
                <div class="area">복합공간 및 리테일</div>
                <div class="area">리조트 및 테마파크</div>
                <div class="area">재생공간</div>
            </div>
        </div>

    </article>

    <!-- 슬라이드1 도시 및 지역 개발  -->
    <article class="bg1 concept-slide">
        <p class="title">도시 및 지역 개발</p>
        <div class="concept-service-wrap">
            <div class="concept-service-box">
                <div class="swiper concept-service-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" onclick="detailPopup()"><img src="<?php echo $site_url ?>/img/concept/1city/1.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/1city/2.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/1city/3.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/1city/4.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/1city/4.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-btn">
            자세히 알아보기<img class="more-icon1" src="<?php echo $site_url ?>/img/concept/arrow-white.png" />
        </div>
    </article>

    <!-- 슬라이드2 주거 및 오피스 -->
    <article class="bg2 concept-slide">
        <p class="title text-color1">주거 및 오피스</p>
        <div class="concept-service-wrap">
            <div class="concept-service-box">
                <div class="swiper concept-service-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/2office/1.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/2office/2.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/2office/3.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/2office/4.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-btn more-btn2">
            자세히 알아보기<img class="more-icon1" src="<?php echo $site_url ?>/img/concept/arrow-gray.png" />
        </div>
    </article>

    <!-- 슬라이드3 복합 공간 및 리테일 -->
    <article class="bg3 concept-slide">
        <p class="title">복합 공간 및 리테일</p>
        <div class="concept-service-wrap">
            <div class="concept-service-box">
                <div class="swiper concept-service-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/3retail/1.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/3retail/2.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/3retail/3.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/3retail/4.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-btn">
            자세히 알아보기<img class="more-icon1" src="<?php echo $site_url ?>/img/concept/arrow-white.png" />
        </div>
    </article>

    <!-- 슬라이드4 리조트 및 테마파크 -->
    <article class="bg4 concept-slide">
        <p class="title text-color1">리조트 및 테마파크</p>
        <div class="concept-service-wrap">
            <div class="concept-service-box">
                <div class="swiper concept-service-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/4resort/1.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/4resort/2.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/4resort/3.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/4resort/4.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-btn more-btn2">
            자세히 알아보기<img class="more-icon1" src="<?php echo $site_url ?>/img/concept/arrow-gray.png" />
        </div>
    </article>

    <!-- 슬라이드5 재생공간 -->
    <article class="bg5 concept-slide">
        <p class="title">재생공간</p>
        <div class="concept-service-wrap">
            <div class="concept-service-box">
                <div class="swiper concept-service-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/5space/1.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/5space/2.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/5space/3.png" />
                        </div>
                        <div class="swiper-slide"><img src="<?php echo $site_url ?>/img/concept/5space/4.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-btn">
            자세히 알아보기<img class="more-icon1" src="<?php echo $site_url ?>/img/concept/arrow-white.png" />
        </div>
    </article>

</section>

<script type="text/javascript">
    /* 비즈 분야 버튼 클릭 시 해당 영역으로 스크롤 */
    const areaBtn = document.querySelectorAll('.area');
    for (let i = 0; i < areaBtn.length; i++) {
        areaBtn[i].addEventListener('click', function (e) {
            // this.classList.toggle("click");
            e.preventDefault();
            document.querySelector('.bg' + (i + 1)).scrollIntoView({ behavior: "smooth", block: "center" });
        });
    }

    /* 비즈 분야 클릭 시 클래스 변경 */
    $(function () {
        $('.area').click(function () {
            $('.area').removeClass('click');
            $(this).addClass('click');
        })
    })

    $(function () {
        /* 프로젝트 실적 슬라이드 */
        var projectResult = new Swiper(".concept-service-slide", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
            },
        });

    });
    function detailPopup(){
        $(".layer-popup-wrap").show();
    }

</script>

<?php
include_once('../tale.php');
?>
