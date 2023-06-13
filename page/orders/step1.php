<?php
include_once('../../head.php');

$user_login = "";
if( isset( $_SESSION[ 'user_id' ] ) ) {
    $user_login = TRUE;
}
else{
    $user_login = FALSE;
}
if( $user_login ) {
    ?>
    <script>
        location.href = 'step3.php';
    </script>

    <?
}

?>

<link rel="stylesheet" type="text/css" href="../../css/orders.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />

<!-- 주문내역 페이지 -->
<section id="contact-page">
    <article class="max banner">
        <p class="main-title">ORDERS</p>
        <p class="sub-title">주문내역</p>
    </article>
    <article class="contact-form" id="orders-page">
        <div class="max">
             <form name="contact_form" id="contact_form" method="post" action="ajax/login.php" onsubmit="return FormSubmit();">
                <aside class="contact-container">
                    <p class="contact-title">주문정보 확인하기</p>
                    <div class="input-text">
                        <p class="input-title">이메일 주소</p>
                        <input type="email" id="email" name="email" placeholder="이메일 주소를 입력해주세요." required>
                    </div>
                    <div class="input-text">
                        <p class="input-title">비밀번호</p>
                        <input type="password" name="password" placeholder="비밀번호를 입력해주세요." required>
                    </div>
                    <div class="re-find-box">
                        <label for="rememberPW" class="re-pw">
                            <input type="checkbox" id="rememberPW" name="rememberPW">
                            이메일 기억하기
                        </label>
                        <a class="find-pw">비밀번호 찾기</a>
                    </div>
                    <input class="send" type="submit" value="조회하기" onclick="sendTo();" />
                </aside>
             </form>
        </div>
    </article>
</section>

<script>
    $(document).ready(function(){

        // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
        var key = getCookie("key");
        $("#email").val(key);

        if($("#email").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
            $("#rememberPW").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
        }

        $("#rememberPW").change(function(){ // 체크박스에 변화가 있다면,
            if($("#rememberPW").is(":checked")){ // ID 저장하기 체크했을 때,
                setCookie("key", $("#userId").val(), 7); // 7일 동안 쿠키 보관
            }else{ // ID 저장하기 체크 해제 시,
                deleteCookie("key");
            }
        });

        // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
        $("#email").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
            if($("#rememberPW").is(":checked")){ // ID 저장하기를 체크한 상태라면,
                setCookie("key", $("#email").val(), 7); // 7일 동안 쿠키 보관
            }
        });
    });

    function setCookie(cookieName, value, exdays){
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
        document.cookie = cookieName + "=" + cookieValue;
    }

    function deleteCookie(cookieName){
        var expireDate = new Date();
        expireDate.setDate(expireDate.getDate() - 1);
        document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
    }

    function getCookie(cookieName) {
        cookieName = cookieName + '=';
        var cookieData = document.cookie;
        var start = cookieData.indexOf(cookieName);
        var cookieValue = '';
        if(start != -1){
            start += cookieName.length;
            var end = cookieData.indexOf(';', start);
            if(end == -1)end = cookieData.length;
            cookieValue = cookieData.substring(start, end);
        }
        return unescape(cookieValue);
    }

</script>

<?php
include_once('../../tale.php');
?>
