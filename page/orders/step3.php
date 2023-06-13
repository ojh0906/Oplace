<?php
include_once('../../head.php');
include_once('ajax/order_function.php');

$user_login = "";
if( isset( $_SESSION[ 'user_id' ] ) ) {
    $user_login = TRUE;
}
else{
    $user_login = FALSE;
}
if( !$user_login ) {
    ?>
    <script>
        alert("접근 권한이 없습니다.");
        location.href = 'step1.php';
    </script>

    <?
}
//회원정보
$member_sql = "select * from order_member_tbl WHERE id = " .$_SESSION[ 'user_id' ];
$member_stt=$db_conn->prepare($member_sql);
$member_stt->execute();
$member = $member_stt->fetch();

// 리스트에 출력하기 위한 sql문
$admin_sql = "select * from payment_order_tbl"
            ." where member_fk = " .$_SESSION[ 'user_id' ]
         ." order by id";
$admin_stt=$db_conn->prepare($admin_sql);
$admin_stt->execute();

?>

<link rel="stylesheet" type="text/css" href="../../css/popup.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/orders.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/contact.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../css/order-form.css" rel="stylesheet" />

<!-- 팝업 화면 -->
<section class="layer-popup-wrap" id="order-popup">
</section>

<script>


    function detailPopup(member, orderNo) {
        $.ajax({
            type:'post',
            url:'./ajax/order_detail_modal.php',
            data:{member_id:member, orderNo: orderNo},
            success:function(html){

                $('.layer-popup-wrap').empty();
                $('.layer-popup-wrap').html(html);
                $(".layer-popup-wrap").css('display', 'flex');

            }
        });
    }

</script>


<!-- 결제 정보 확인 -->
<section id="contact-page">
    <article class="max banner">
        <p class="main-title">ORDERS</p>
        <p class="sub-title">결제 정보 확인</p>
    </article>

    <article class="contact-form order-form" id="orders-page">
        <div class="logout-wrap">
            <a href="ajax/logout.php">로그아웃</a>
        </div>
        <?php
            while($list_row=$admin_stt->fetch()){

                //부가서비스
                $addArr = explode("|", $list_row['addition']);
                $addYn1 = false;
                $addYn2 = false;
                $addYn3 = false;
                for ($i = 0; $i < count($addArr); $i++) {
                    if($addArr[$i] == 1){
                        $addYn1 = true;
                    }else if($addArr[$i] == 2) {
                        $addYn2 = true;
                    }else if($addArr[$i] == 3) {
                        $addYn3 = true;
                    }
                }
        ?>
        <div class="max order-data-box">
            <aside class="order-regdate-box">
                <div class="num-regdate">
                    <p><span>주문번호</span> <?= $list_row['orderNo'] ?></p>
                    <p class="line">|</p>
                    <p><span>결제일자</span> <?= dateTime($list_row['orderDate']) ?></p>
                </div>
                <p class="detail" onclick="detailPopup(<?= $member['id'] ?>, '<?= $list_row['orderNo'] ?>')">상세보기</p>
            </aside>
            <aside class="order-data">
                <div>
                    <p><span>이름</span> <?= $member['name'] ?></p>
                    <p><span>이메일</span><?= $member['email'] ?></p>
                </div>
                <div>
                    <p><span>휴대폰 번호</span> <?= $member['phone'] ?></p>
                    <p><span>선택한 서비스</span> <?= productName($list_row['productName']) ?></p>
                </div>
                <div>
                    <p><span>부가서비스</span>
                        <?php
                        if($addYn1){ echo "네이밍 / "; }
                        if($addYn2){ echo "로고 디자인 / "; }
                        if($addYn3){ echo "사업 컨셉 영상"; }
                        ?>
                    </p>
                    <p><span>결제 금액</span> <?php echo number_format(intval($list_row['price'])); ?>원</p>
                </div>
            </aside>
        </div>
        <?php } ?>
    </article>
</section>



<?php
include_once('../../tale.php');
?>
