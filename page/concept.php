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


<!-- 컨셉 개발 페이지 -->
<section id="concept-page">
</section>

<?php
include_once('../tale.php');
?>