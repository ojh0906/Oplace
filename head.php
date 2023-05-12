<?php
include_once('./db/dbconfig.php');


//사이트 정보 쿼리
$site_info_sql = "select * from site_setting_tbl";
$site_info_stt = $db_conn->prepare($site_info_sql);
$site_info_stt->execute();
$site = $site_info_stt->fetch();

?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="imagetoolbar" content="no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta property="og:title" content="<?= $site[1] ?>" />
    <meta property="og:description" content="<?= $site[2] ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <title>
        <?= $site[1] ?>
    </title>

    <!-- <link rel="stylesheet" type="text/css" href="css/common.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="css/header.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script>
        /* 모바일 메뉴 열기 */
        let openMenu = false;
        function onMenu() {
            document.querySelector(".menu").classList.toggle("menu-show");
            openMenu = !openMenu;
        }

        /* 헤더를 제외한 다른 영역 클릭 시 상단 메뉴 닫기 */
        document.addEventListener('click', function (e) {
            if (openMenu) {
                let header = e.target.closest('#header');
                if (!header) {
                    document.querySelector(".menu").classList.toggle("menu-show");
                    openMenu = false;
                }
            }
        });

        /* 상단 메뉴 클릭 시 색상 변경 */
        $(function () {
            $('.link').click(function () {
                $('.link').removeClass('clicked');
                $(this).addClass('clicked');
            })
        })
    </script>
</head>

<body>
    <!-- 상단 레이아웃 -->
    <header id="header">
        <img class="logo" src="img/header/logo.png" />
        <div class="mo-menu-icon" onclick="onMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="menu">
            <span class="link">홈</span>
            <span class="link">컨셉개발서비스</span>
            <span class="link">프로젝트실적</span>
            <span class="link">커뮤니티</span>
            <span class="link">문의하기</span>
            <span class="link">주문내역</span>
        </div>
    </header>

    <div id="wrapper">
        <div id="container">