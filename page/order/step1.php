<?php
include_once('../../head.php');

//접속 확인
if(!isset($_SERVER['HTTP_REFERER'])){
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
if(!isset($_GET['type'])) {
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
$product_type = "";
$price = "";
switch ($_GET['type']){
    case 1:
        $product_type = "도시 및 지역";
        $price = 3500000;
        break;
    case 2:
        $product_type = "주거 및 오피스";
        $price = 3500000;
        break;
    case 3:
        $product_type = "복합공간 및 리테일";
        $price = 3500000;
        break;
    case 4:
        $product_type = "리조트 및 테마파크";
        $price = 3500000;
        break;
    case 5:
        $product_type = "재생공간";
        $price = 3500000;
        break;
    default:
        GoToMain();
}


?>

<link rel="stylesheet" type="text/css" href="../../css/popup.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-popup.css" rel="stylesheet" />

<!-- 팝업 화면 -->
<section class="layer-popup-wrap layer-popup-order layer-popup-naming" id="order-popup">
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

<!-- 팝업 화면 -->
<section class="layer-popup-wrap layer-popup-order layer-popup-logo" id="order-popup">
    <div class="layer-popup">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
        <article class="naming-popup">
            <p class="naming-title">
                <img src="<?php echo $site_url ?>/img/header/logo.png" />
                Logo Design 로고 디자인 프로세스
            </p>
            <div>
                <div class="naming-container">
                    <div class="step-box">
                        <p class="step-title">
                            1. 브랜드 분석
                        </p>
                        <p class="step-text">
                            브랜드의 목적, 대상 시장, 경쟁사 등에 대한 정보를 수집하고 분석합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            2. 브랜드 스토리 개발
                        </p>
                        <p class="step-text">
                            브랜드가 어떤 가치와 이미지를 전달하고자 하는지에 대한 이야기를 만듭니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            3. 목표 설정
                        </p>
                        <p class="step-text">
                            로고 디자인을 통해 얻고자 하는 기업적, 사회적, 소비자적 목표를 설정합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            4. 벤치마킹 및 연구
                        </p>
                        <p class="step-text">
                            트렌드의 흐름과 경쟁사를 분석하여 차별화된 로고 디자인 요인을 찾습니다.
                        </p>
                    </div>
                    <br />

                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            5. 로고 디자인
                        </p>
                        <p class="step-text">
                            여러 가지 디자인 아이디어를 만들고 압축과 확장을 반복하면서 로고 디자인을 완성합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />

                    <br />

                    <div class="step-box">
                        <p class="step-title">
                            6. 로고 응용 디자인
                        </p>
                        <p class="step-text">
                            완료된 로고를 응용하여 명함 등 3가지의 매체에 테스트를 합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            7. 가이드라인 작성
                        </p>
                        <p class="step-text">
                            로고를 사용하는 방법과 용도, 색상, 크기 등에 대한 가이드라인을 제공합니다.
                        </p>
                    </div>
                </div>
            </div>

            <div class="naming-result">
                <p class="result-title">
                    로고 디자인 결과물
                    <span>
                        로고 디자인 비용 : 3,000,000원 (VAT 별도)
                    </span>
                </p>

                <div class="result-box">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/Creating.png" />
                        <p>
                            로고 디자인 프로세스
                        </p>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/3.png" />
                        <p>
                            로고 디자인 3안
                        </p>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/Flashcards.png" />
                        <p>
                            로고 디자인 응용 3안
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

<!-- 컨셉 영상 디자인 : 팝업 화면 -->
<section class="layer-popup-wrap layer-popup-order layer-popup-concept" id="order-popup">
    <div class="layer-popup">
        <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
        <article class="naming-popup">
            <p class="naming-title">
                <img src="<?php echo $site_url ?>/img/header/logo.png" />
                Concept Video 컨셉 영상 제작 프로세스
            </p>
            <div>
                <div class="naming-container">
                    <div class="step-box">
                        <p class="step-title">
                            1. 사내용 컨셉 영상의 목표
                        </p>
                        <p class="step-text">
                            투자사, 협력사 또는 직원 교육을 포함한 사업 소개 영상을 제작하는 것입니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            2. 사내용 영상 제작의 한계점
                        </p>
                        <p class="step-text">
                            사내 자료(스틸, 영상)을 기본적으로 활용하고 사업을 효과적으로 이해시킬 수 있는 인터넷(사진, 영상/경우에 따라 저작권 있는 사진)을 자료로 활용합니다.
                            즉 본 컨셉 영상은 순수 내부용 영상입니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            3. 타겟 그룹의 주안점 파악
                        </p>
                        <p class="step-text">
                            주요 대상 그룹의 주안점을 파악하여 영상 안에 포함합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            4. 아이디어 도출
                        </p>
                        <p class="step-text">
                            영상의 논리적인 흐름과 감성적인 요소를 동시에 고려 합니다.
                        </p>
                    </div>
                    <br />

                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            5. 시나리오 작성
                        </p>
                        <p class="step-text">
                            영상의 구성과 순서를 구체적으로 스토리보드화 합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />

                    <br />

                    <div class="step-box">
                        <p class="step-title">
                            6. 제작 및 편집
                        </p>
                        <p class="step-text">
                            디자인 요소, 편집, 효과음, 음악 등을 포함하여 전체적인 영상 제작을 진행합니다.
                        </p>
                    </div>
                    <img class="arrow" src="<?php echo $site_url ?>/img/order/arr-r-gray.png" />
                    <div class="step-box">
                        <p class="step-title">
                            7. 검수 및 수정
                        </p>
                        <p class="step-text">
                            제작된 영상을 검수하고 필요한 부분을 수정 작업하여 완료합니다.
                        </p>
                    </div>
                </div>
            </div>

            <div class="naming-result">
                <p class="result-title">
                    컨셉 영상 제작 결과물
                    <span>
                        컨셉 영상 제작 비용 : 2,500,000원 (VAT 별도)
                    </span>
                </p>

                <div class="result-box">
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/Creating.png" />
                        <p>
                            컨셉 영상 프로세스
                        </p>
                    </div>
                    <div class="result">
                        <img src="<?php echo $site_url ?>/img/order/naming/film.png" />
                        <p>
                            2분 전후 영상
                        </p>
                    </div>
                    <div class="result">
                        <img class="mp4" src="<?php echo $site_url ?>/img/order/naming/pptmp4.png" />
                        <p>
                            MP4, PPT
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
    function detailPopupLogo() {
        $(".layer-popup-logo").css('display', 'flex');
    }
    function detailPopupConcept() {
        $(".layer-popup-concept").css('display', 'flex');
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
                                    <input id="target1" name="target" type="checkbox" />
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
                                <p class="click-more" onclick="detailPopupLogo()">자세히 알아보기<img
                                        src="<?php echo $site_url ?>/img/order/arr-r-gray.png" /></p>
                                <label>
                                    <input id="target2" name="target" type="checkbox" />
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
                                <p class="click-more" onclick="detailPopupConcept()">자세히 알아보기<img
                                        src="<?php echo $site_url ?>/img/order/arr-r-gray.png" /></p> <label>
                                    <input id="target3" name="target" type="checkbox" />
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
                        <p><?php echo $product_type ?></p>
                        <p><?php echo number_format($price); ?></p>

                    </div>
                </aside>
                <aside>
                    <div class="th">
                        <p>추가된 부가 서비스</p>
                        <p>견적</p>
                    </div>
                    <div id="target1_re" class="tr target_re">
                        <p>네이밍</p>
                        <p>3,000,000 원</p>
                    </div>
                    <div id="target2_re" class="tr target_re">
                        <p>로고 디자인</p>
                        <p>3,000,000 원</p>
                    </div>
                    <div id="target3_re" class="tr target_re">
                        <p>사업 컨셉 영</p>
                        <p>2,500,000 원</p>
                    </div>
                </aside>
                <aside class="total-wrap">
                    <div class="price">
                        <p>합계</p>
                        <p><span id="total-text"><?php echo number_format($price); ?></span> 원</p>
                    </div>
                    <div class="price">
                        <p>부가가치세 (+10%)</p>
                        <p><span id="vat-text"></span> 원</p>
                    </div>
                    <div class="price">
                        <p>총 합계</p>
                        <p><span id="total-price"></span> 원</p>
                    </div>
                </aside>
            </div>

            <div class="next-btn">
                <form id="step-form" action="ajax/order_temp_insert.php" method="post" >
                    <input type="hidden" name="service_type" value="<?= $_GET['type'] ?>">
                    <input type="hidden" name="addition" id="addition" value="0">
                    <input type="hidden" name="total" id="total" value="<?= $price ?>">
                    <input type="hidden" name="vat" id="vat" value="950000">
                    <input type="hidden" name="total_price" id="total_price" value="10450000">
                    <p id="submit">다음 <img
                                src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
                </form>

            </div>
        </article>
    </div>
</section>

<script>
    var service = 0;
    var total = 0;
    var addition = 0
    var vat = 0;
    var total_price = 0;
    var additionYn1 = 0;
    var additionYn2 = 0;
    var additionYn3 = 0;

    $( document ).ready(function() {
        service = $("#total").val();
        total = $("#total").val();
        vat = total / 10;
        total_price = parseInt(total) + parseInt(vat);

        $("#vat-text").text(vat.toLocaleString());
        $("#total-price").text(total_price.toLocaleString());
    });


    $("#target1").click(function (){
        var status = $(this).prop('checked');
        if(status){
            $("#target1_re").removeClass("target_re");
            addition += 3000000;
            additionYn1 = 1;
        }
        else{
            $("#target1_re").addClass("target_re");
            addition -= 3000000;
            additionYn1 = 0;
        }
        calculate()
    });
    $("#target2").click(function (){
        var status = $(this).prop('checked');
        if(status){
            $("#target3_re").removeClass("target_re");
            addition += 3000000;
            additionYn2 = 1;
        }
        else{
            $("#target1_re").addClass("target_re");
            addition -= 3000000;
            additionYn2 = 0;
        }
        calculate()
    });
    $("#target3").click(function (){
        var status = $(this).prop('checked');
        if(status){
            $("#target1_re").removeClass("target_re");
            addition += 2500000;
            additionYn3 = 1;
        }
        else{
            $("#target1_re").addClass("target_re");
            addition -= 2500000;
            additionYn3 = 0;
        }
        calculate()
    });

    $("#submit").click(function (){
        var additionYn = "";
        $("#total").val(total);
        $("#vat").val(vat);
        $("#total_price").val(total_price);
        if(additionYn1){
            additionYn += "|1"
        }
        if(additionYn2){
            additionYn += "|2"
        }
        if(additionYn3){
            additionYn += "|3"
        }
        $("#addition").val(additionYn);

        $("#step-form").submit();
    });

    function calculate(){
        total = parseInt(service) + parseInt(addition)
        vat = total / 10;
        total_price = parseInt(total) + parseInt(vat);

        $("#total-text").text(total.toLocaleString());
        $("#vat-text").text(vat.toLocaleString());
        $("#total-price").text(total_price.toLocaleString());
    }



</script>

<?php
include_once('../../tale.php');
?>
