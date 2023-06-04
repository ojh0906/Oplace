<?
header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');
$adm_login = false;
if( isset( $_SESSION[ 'manager_id' ] ) ) {
    $adm_login = TRUE;
}
else if( !$adm_login ) {
    ?>
    <meta http-equiv="refresh" content="0;url=index.php" />
    <?
}
?>

<script type="text/javascript">

    $( document ).ready(function() {

        $('.navbar-toggler').click(function(){
            $('body').toggleClass('sidebar-open');
        });
    });
</script>



<body>
<!-- admin menu -->
<div class="gnb-container">
    <div class="sidebar">
        <div class="brand-wrapper">
            <a class="brand" href="home.php">Oh! Place</a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li <?php if($menu == 0  || $menu == "") echo "class='active'" ?> >
                    <a href="home.php?menu=1">
                        <i class="far fa-address-book"></i>
                        <p>전체보기</p>
                    </a>
                </li>
                <li <?php if($menu == 2) echo "class='active'" ?> >
                    <a href="config_form.php?menu=2">
                        <i class="fas fa-list-ul"></i>
                        <p>기본 설정</p>
                    </a>
                </li>
                <li <?php if($menu == 33) echo "class='active'" ?> >
                    <a href="board_list.php?menu=33">
                        <i class="fab fa-flipboard"></i>
                        <p>커뮤니티 관리</p>
                    </a>
                </li>
                <li <?php if($menu == 3) echo "class='active'" ?> >
                    <a href="popup_list.php?menu=3">
                        <i class="far fa-clone"></i>
                        <p>팝업 설정</p>
                    </a>
                </li>
                <li <?php if($menu == 4) echo "class='active'" ?> >
                    <a href="manager_list.php?menu=4">
                        <i class="far fa-user"></i>
                        <p>담당자 설정</p>
                    </a>
                </li>
                <li class="line"></li>
            </ul>
        </div>
        <div class="service-center-wrap">
            <p class="tit"><i class="fas fa-headphones"></i> 고객센터</p>
            <p class="text">사용 중인 관리서비스에<br>필요한 내용을 확인하세요.</p>
            <a href="service_center.php?menu=10">고객센터</a>
        </div>
    </div>
</div>

<!-- 컨텐츠 영역 시작 -->
<div class="main-wrapper" id="wrapper">

    <!-- 상단 레이아웃 -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <!--a class="navbar-brand" href="apply_list.php">예반스</a-->
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./ajax/logout.php?is_login=<?= $adm_login ?>"> <i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="/index.php"> <i class="fas fa-home"></i> </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>


    <div class="panel-header"></div>

    <div id="container">
        <div class="content-box-wrap">
            <div class="box">
                <div class="page-header">
