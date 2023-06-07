<?php
include_once('../../head.php');

//접속 확인
if(!isset($_SERVER['HTTP_REFERER']) && !isset($_SESSION['order_temp_id'])){
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
$prevPage = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
//TODO 아래 경로 "oplace" 수정해야함
if($prevPage != '/Oplace/page/order/step3.php') {
    echo "<script>alert('허용되지 않는 잘못된 접근입니다.');</script>";
    GoToMain();
}
?>

<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />

<!-- 결제 정보 확인 -->
<section id="order-page">
    <div class="main-container">
        <article class="menu-box">
            <p class="title">주문하기</p>
            <div class="menu-text">
                <p class="menu">1. 부가서비스</p>
                <p class="menu">2. 규정 동의</p>
                <p class="menu">3. 약관 동의</p>
                <p class="menu click">4. 정보 입력</p>
                <p class="menu">5. 결제</p>
                <p class="menu">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <article class="order-container contact-form order-form">
            <p class="title">정보 입력</p>
            <form class="info-wrap" id="member-form" method="post" action="ajax/member_insert.php">
                <div class="info-input">
                    <p>이름</p>
                    <input id="name" name="name" maxlength="11" type="text" required placeholder="이름을 입력해주세요."/>
                </div>
                <div class="info-input">
                    <p>휴대폰 번호</p>
                    <input id="phone" name="phone" type="text" required placeholder="휴대폰번호를 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>이메일</p>
                    <input id="email" name="email" type="email" required placeholder="이메일을 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>비밀번호</p>
                    <input id="password" name="password" type="password" required placeholder="비밀번호를 입력해주세요." />
                </div>
                <div class="info-input">
                    <p>비밀번호 확인</p>
                    <input id="password_chk" name="password_chk" type="password" required placeholder="비밀번호를 입력해주세요." />
                </div>
            </form>

            <div class="next-btn">
                <p onClick="validation()">다음 <img
                        src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
            </div>
        </article>
    </div>


</section>
<script>

    $(document).on("keyup", "#phone", function() {
        $(this).val( $(this).val().replace(/[^0-9]/g, "").replace(/(^02|^0505|^1[0-9]{3}|^0[0-9]{2})([0-9]+)?([0-9]{4})/,"$1-$2-$3").replace("--", "-") );
    });

    function validation(){
        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var password_chk = $("#password_chk").val();

        if(name == ""){
            alert("이름을 입력해주세요.");
            $("#name").focus();
            return false;
        }
        else if(phone == ""){
            alert("전화번호을 입력해주세요.");
            $("#phone").focus();
            return false;
        }
        else if(email == ""){
            alert("이메을 입력해주세요.");
            $("#email").focus();
            return false;
        }
        else if(password != password_chk){
            alert("비밀번호가 일치하지 않습니다.");
            $("#password").focus();
            return false;
        }
        else{
            $("#member-form").submit();
            return true;
        }
    }
</script>
<?php
include_once('../../tale.php');
?>
