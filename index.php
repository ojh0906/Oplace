<?php
include_once('head.php');

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
    opcache_reset();
}


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

<link rel="stylesheet" type="text/css" href="css/index.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/reset.css" rel="stylesheet" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- layer popup -->
<!-- <?
$arr = array();
$left_count = 0;
$top = 10;
$top2 = 10;
$z_index = 9999;
while ($popup = $popup_stt->fetch()) {
    $arr[] = $popup['id'];
    ?>
    <div class="layer-popup pc"
        style="display: block; width: 80%; max-width: <?= $popup['width'] ?>px; height: <?= $popup['height'] ?>px; top: 10%; left: 5%; z-index: <?= $z_index ?>;">
        <div id="agreePopup<?= $popup['id'] ?>" class="agree-popup-frame">
            <img src="data/popup/<?= $popup['file_name'] ?>" style=" height:calc(<?= $popup['height'] ?>px - 36px);"
                alt="<?= $popup['popup_name'] ?>">
            <div class="show-chk-wrap">
                <a href="javascript:todayClose('agreePopup<?= $popup['id'] ?>', 1);" class="today-x-btn">오늘하루닫기</a>
                <a class="close-popup x-btn">닫기</a>
            </div>
        </div>
    </div>

    <div class="layer-popup mobile"
        style="display: block; width: 80%; max-width: <?= $popup['width_mobile'] ?>px; height: <?= $popup['height_mobile'] ?>px; top: 10%; left: 10%; z-index: <?= $z_index ?>;">
        <div id="agreePopup_mo<?= $popup['id'] ?>" class="agree-popup-frame">
            <img src="data/popup/<?= $popup['file_name_mobile'] ?>" style=" height:calc(<?= $popup['height'] ?>px - 36px);"
                alt="<?= $popup['popup_name'] ?>">
            <div class="show-chk-wrap">
                <a href="javascript:todayClose('agreePopup_mo<?= $popup['id'] ?>', 1);" class="today-x-btn">오늘하루닫기</a>
                <a class="close-popup x-btn">닫기</a>
            </div>
        </div>
    </div>
    <?
    $z_index -= 1;
    $top += 10;
    $top2 += 15;
}
?> -->

<script>
    // * today popup close
    $(document).ready(function () {
        <?
        for ($i = 0; $i < count($arr); $i++) {
            ?>
            todayOpen('agreePopup<?= $arr[$i] ?>');
            todayOpen('agreePopup_mo<?= $arr[$i] ?>');
        <? } ?>
        $(".close-popup").click(function () {
            $(this).parent().parent().hide();
        });
    });

    // 창열기
    function todayOpen(winName) {
        var blnCookie = getCookie(winName);
        var obj = eval("window." + winName);
        console.log(blnCookie);
        if (blnCookie != "expire") {
            $('#' + winName).show();
        } else {
            $('#' + winName).hide();
        }
    }
    // 창닫기
    function todayClose(winName, expiredays) {
        setCookie(winName, "expire", expiredays);
        var obj = eval("window." + winName);
        $('#' + winName).hide();
    }

    // 쿠키 가져오기
    function getCookie(name) {
        var nameOfCookie = name + "=";
        var x = 0;
        while (x <= document.cookie.length) {
            var y = (x + nameOfCookie.length);
            if (document.cookie.substring(x, y) == nameOfCookie) {
                if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
                    endOfCookie = document.cookie.length;
                return unescape(document.cookie.substring(y, endOfCookie));
            }
            x = document.cookie.indexOf(" ", x) + 1;
            if (x == 0)
                break;
        }
        return "";
    }

    // 24시간 기준 쿠키 설정하기
    // 만료 후 클릭한 시간까지 쿠키 설정
    function setCookie(name, value, expiredays) {
        var todayDate = new Date();
        todayDate.setDate(todayDate.getDate() + expiredays);
        document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    }
</script>

<!-- 메인 페이지 -->
<section id="main-page">
    <div class="banner-container">
        <p class="title">
            <strong>Concept makes place</strong><br />
            멋진 장소에는<br class="mo480-br" /> 멋진 컨셉이 있습니다.<br />
            <span>오!플레이스</span>는<br class="mo480-br" /> 멋진 컨셉을 만드는 곳입니다.
        </p>
        <p class="sub-title">
            빠른 컨셉 개발과 효율적인 비용,<br />
            공신력 있는 <span>컨셉 개발</span><br />
            프로필 확보
        </p>
        <img class="location" src="img/main/circle-location.png" />
    </div>

    <div class="what-is-service-container">
        <div class="text-wrap">
            <p class="title">
                오!플레이스의<br />
                컨셉개발<br />
                서비스란?
            </p>
            <div>
                <p class="sub-title">오!플레이스는 플레이스브랜딩연구소(PBI)의 컨셉 개발 사이트입니다.</p>
                <div>
                    컨셉이 꼭 필요하고, 컨셉이 있으면 너무 좋은 것은 알지만, 컨셉을 직접 만들기는 어렵고,<br />
                    그렇다고 컨셉을 전문적으로 만들어 주는 곳도 없습니다.<br />
                    물론 수천만원의 비용을 받고 한 두달 이상의 시간을 소요하여 만들어 주는 곳은 있습니다만<br />
                    그동안 컨셉이 없다고 해서 하고 싶은 일을 못한 것은 아니라서, 망설여지는 상황입니다.<br />
                    오!플레이스는, 이런 안타까움을 타개하기 위해 “플레이스” 즉 사람들이 방문하고 머무르고,<br />
                    자랑하거나 기억에 남길만한 “장소(곳)”에 대한 컨셉을 혁신적으로 저렴한 비용과<br />
                    짧은 기간에 전문적으로 만들어드리는 “컨셉개발서비스”를 제공하게 되었습니다.<br />
                    오!플레이스에서 제공하는 “컨셉개발서비스”는 사업요약, 자산조사, 컨셉안 3개 그리고 부록으로<br />
                    구성되어 있는 20페이지 “컨셉개발 보고서”로 이루어져 있으며 네임, 로고 같은 부가적인 서비스를<br />
                    추가적으로 선택하여 진행할 수 있습니다.
                </div>
            </div>
        </div>
    </div>

    <div class="concept-area-container">
        <div class="item item1">
            <p class="main-title">컨셉개발<br /> 서비스 영역</p>
            <p class="main-sub-title">CONCEPT CREATION<br /> SERVICE</p>
        </div>
        <div class="item item2">
            <div class="title-btn-wrap">
                <p class="title">도시 & 지역 개발</p>
                <a class="more-btn">
                    더 알아보기
                    <img class="more-icon" src="img/main/concept-area/arrow.png" />
                </a>
            </div>
        </div>
        <div class="item item3">
            <div class="title-btn-wrap">
                <p class="title">주거 & 오피스</p>
                <a class="more-btn">
                    더 알아보기
                    <img class="more-icon" src="img/main/concept-area/arrow.png" />
                </a>
            </div>
        </div>
        <div class="item item4">
            <div class="title-btn-wrap">
                <p class="title">복합공간 & 리테일</p>
                <a class="more-btn">
                    더 알아보기
                    <img class="more-icon" src="img/main/concept-area/arrow.png" />
                </a>
            </div>
        </div>
        <div class="item item5">
            <div class="title-btn-wrap">
                <p class="title">리조트 & 테마파크</p>
                <a class="more-btn">
                    더 알아보기
                    <img class="more-icon" src="img/main/concept-area/arrow.png" />
                </a>
            </div>
        </div>
        <div class="item item6">
            <div class="title-btn-wrap">
                <p class="title">재생공간</p>
                <a class="more-btn">
                    더 알아보기
                    <img class="more-icon" src="img/main/concept-area/arrow.png" />
                </a>
            </div>
        </div>
    </div>

    <div class="project-result-container">
        <div class="slide-gradient"></div>
        <div class="result-box">
            <aside>
                <div class="text-wrap">
                    <p class="title">프로젝트 실적</p>
                    <p class="sub-title">
                        <strong>
                            PROJECT RESULT
                        </strong><br />
                        본 실적은 <span>플레이스브랜딩연구소</span> 실적입니다.
                    </p>
                    <a class="more-btn">
                        <p>클릭하시면 자세히 볼 수 있습니다.</p>
                    </a>
                </div>
                <!-- project -->
                <div class="project-result-box">
                    <div class="swiper project-result-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div>
                        </div>
                    </div>
                    <div class="project-result-slide-nav">
                        <div class="project-result-prev">
                            <img class="slide-btn" src="img/main/pre-btn.png" />

                        </div>
                        <div class="project-result-next">
                            <img class="slide-btn" src="img/main/next-btn.png" />
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>


    <div class="community-container">
        <div class="community-wrap">
            <div class="text-wrap">
                <p class="title">커뮤니티</p>
                <p class="sub-title">COMMUNITY</p>
            </div>
            <div class="community-box-wrap">
                <div class="community-box">
                    <!-- 첫 번째 박스 -->
                    <div class="img-text-box">
                        <div class="img">
                        </div>
                        <div class="text-wrap">
                            <p class="sub-title"><span>PLACE BRANDING<span></p>
                            <p class="title">
                                <span>오래된 것을 즐겁게 만드는 요소! 오래된 것을 즐겁게 만드는 요소!</span>
                                <a><img class="detail-btn" src="img/main/right.png" /></a>
                            </p>
                            <p class="writer"><span>Place Branding Insight BY SIMON<span></p>
                        </div>
                    </div>
                    <div class="line"></div>
                    
                    <!-- 두 번째 박스 -->
                    <div class="img-text-box">
                        <div class="img">
                        </div>
                        <div class="text-wrap">
                            <p class="sub-title"><span>PLACE BRANDING<span></p>
                            <p class="title">
                                <span>오래된 것을 즐겁게 만드는 요소! 오래된 것을 즐겁게 만드는 요소!</span>
                                <a><img class="detail-btn" src="img/main/right.png" /></a>
                            </p>
                            <p class="writer"><span>Place Branding Insight BY SIMON<span></p>
                        </div>
                    </div>
                    <div class="line"></div>

                    <!-- 세 번째 박스 -->
                    <div class="img-text-box">
                        <div class="img">
                        </div>
                        <div class="text-wrap">
                            <p class="sub-title"><span>PLACE BRANDING<span></p>
                            <p class="title">
                                <span>오래된 것을 즐겁게 만드는 요소! 오래된 것을 즐겁게 만드는 요소!</span>
                                <a><img class="detail-btn" src="img/main/right.png" /></a>
                            </p>
                            <p class="writer"><span>Place Branding Insight BY SIMON<span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        var $w = $(window),
            footerHei = $('.contact-wrap').outerHeight(),
            $floating = $('.floating-container');
        $w.on('scroll', function () {
            var sT = $w.scrollTop();
            var val = $(document).height() - $w.height() - footerHei;

            if (sT >= val)
                $floating.fadeOut('600');
            else
                $floating.fadeIn('600');
        });

        // popup //
        var noticeCookie = getCookie("name");  // 쿠키 가져오기
        if (noticeCookie == "value") {
            // 팝업창 띄우기
        }
    });
    $(function () {
        /* 프로젝트 실적 슬라이드 */
        var projectResult = new Swiper(".project-result-slide", {
            slidesPerView: "auto",
            // centeredSlides: true,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".project-result-next",
                prevEl: ".project-result-prev",
            },
            // breakpoints: {

            //     768: {
            //         slidesPerView: 2.3, 
            //         spaceBetween: 40,
            //     },
            //     1024: {
            //         slidesPerView: "auto", 
            //         spaceBetween: 40,
            //     },
            // },
        });

    });


    //리캡쳐
    // function FormSubmit() {
    //     if (grecaptcha.getResponse() == "") {
    //         alert("로봇이 아닙니다를 체크해주세요.");
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }


    //popup
    function setCookie(name, value, expiredays) {
        var today = new Date();
        today.setDate(today.getDate() + expiredays);
        document.cookie = name + '=' + escape(value) + '; expires=' + today.toGMTString();
    }

    function getCookie(name) {
        var cookie = document.cookie;
        if (document.cookie != "") {
            var cookie_array = cookie.split("; ");
            for (var index in cookie_array) {
                var cookie_name = cookie_array[index].split("=");
                if (cookie_name[0] == "mycookie") {
                    return cookie_name[1];
                }
            }
        }
        return;
    }
    $(".modal-today-close").click(function () {
        var popupId = $(this).siblings('.pid').val();
        $(".popup" + popupId).modal("hide");
        setCookie("mycookie", 'popupEnd', 1);
    });

    var checkCookie = getCookie("mycookie");



    // close layer popup
    function hidePopup(popupType) {
        var showChk = $('#show-chk-' + popupType).is(':checked');
        if (showChk) {
            setCookie('popup' + popupType, 'Y', 1);
        }
        $('.popup' + popupType).fadeOut();
    }

    //유튜브 팝업
    $('.video').click(function () {
        $('#videoModal').modal('show');
    });

    //상담 내역 팝업
    $('.open-agree').click(function () {
        $('#agreeModal').modal('show');
    });

</script>

<!--문자 알림-->
<script type="text/javascript">
    function setPhoneNumber(val) {
        var numList = val.split("-");
        document.smsForm.sphone1.value = numList[0];
        document.smsForm.sphone2.value = numList[1];
        if (numList[2] != undefined) {
            document.smsForm.sphone3.value = numList[2];
        }
    }
    function loadJSON() {
        var data_file = "message_send2.php";
        var http_request = new XMLHttpRequest();
        try {
            // Opera 8.0+, Firefox, Chrome, Safari
            http_request = new XMLHttpRequest();
        } catch (e) {
            // Internet Explorer Browsers
            try {
                http_request = new ActiveXObject("Msxml2.XMLHTTP");

            } catch (e) {

                try {
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    // Eror
                    alert("지원하지 않는브라우저!");
                    return false;
                }

            }
        }
        http_request.onreadystatechange = function () {
            if (http_request.readyState == 4) {
                // Javascript function JSON.parse to parse JSON data
                var jsonObj = JSON.parse(http_request.responseText);
                if (jsonObj['result'] == "Success") {
                    var aList = jsonObj['list'];
                    var selectHtml = "<select name=\"sendPhone\" onchange=\"setPhoneNumber(this.value)\">";
                    selectHtml += "<option value='' selected>발신번호를 선택해주세요</option>";
                    for (var i = 0; i < aList.length; i++) {
                        selectHtml += "<option value=\"" + aList[i] + "\">";
                        selectHtml += aList[i];
                        selectHtml += "</option>";
                    }
                    selectHtml += "</select>";
                    document.getElementById("sendPhoneList").innerHTML = selectHtml;
                }
            }
        }

        http_request.open("GET", data_file, true);
        http_request.send();
    }

</script>

<!-- 쳇봇 -->
<!-- CLOUDTURING -->
<script>
    window.dyc = {
        chatbotUid: "8a010adf4847bdbc"
    };
</script>
<script async src="https://cloudturing.chat/v1.0/chat.js"></script>
<!-- End CLOUDTURING -->

<?php
include_once('tale.php');
?>