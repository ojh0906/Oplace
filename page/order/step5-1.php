<?php
include_once('../../head.php');

$type = false;
$no = $_GET['no'];
if(isset($_GET['type'])){
    if($_GET['type'] == 'VA') {
        $type = true;
    }
}

if($type){
    $va_sql = "select * from payment_order_tbl where orderNo = '$no'";
    $va_stt = $db_conn->prepare($va_sql);
    $va_stt->execute();
    $va = $va_stt -> fetch();
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
                <p class="menu">4. 정보 입력</p>
                <p class="menu click">5. 결제</p>
                <p class="menu">6. 자료 첨부</p>
                <div class="menu-line"></div>
                <p class="menu">7. 부가서비스 자료 첨부</p>
                <p class="menu">8. 접수 완료</p>
            </div>
        </article>

        <!-- 결제 완료 창 -->
        <?php if(!$type) { ?>
         <article class="order-container done-container">
            <p class="title">결제 완료</p>

            <aside class="done-wrap">
                <img class="done" src="<?php echo $site_url ?>/img/order/Done.png" />
                <p class="done-text">결제가 완료되었습니다.</p>
                <div class="done-btn-wrap">
                    <div class="next-btn home-btn">
                        <p onClick="location.href ='<?php echo $site_url ?>'">홈으로 <img src="<?php echo $site_url ?>/img/order/arr-r-mint.png" /></p>
                    </div>
                    <div class="next-btn">
                        <p onClick="location.href ='<?php echo $site_url ?>/page/order/step6.php'">자료 입력 <img src="<?php echo $site_url ?>/img/order/arr-r.png" /></p>
                    </div>
                </div>
            </aside>
        </article>
        <?php } else { ?>
        <!-- 결제 창 -->
        <article class="order-container order-num-container">
            <p class="title">결제</p>
            <aside class="done-wrap">
                <p class="order-done-text">아래 계좌정보로 입금해 주시면<br class="mo-br480" /> 결제 완료 처리가 됩니다.</p>

                <div class="order-num">
                    <div class="order-wrap">
                        <div class="order">
                            <p class="tit">입금 계좌</p>
                            <p class=""><?php echo $va['bkName'] ?> <?php echo $va['vactno'] ?></p>
                        </div>
                        <div class="order">
                            <p class="tit">금액</p>
                            <p class=""><?php echo number_format(intval($va['price'])) ?> 원</p>
                        </div>
                        <div class="order">
                            <p class="tit">주문번호</p>
                            <p class=""><?php echo $no ?></p>
                        </div>
                    </div>
                </div>
                <div class="done-btn-wrap">
                    <div class="next-btn home-btn">
                        <p onClick="location.href ='<?php echo $site_url ?>'">홈으로 <img
                                src="<?php echo $site_url ?>/img/order/arr-r-mint.png" /></p>
                    </div>
                </div>
            </aside>
        </article>
        <?php } ?>
    </div>

</section>

<?php
include_once('../../tale.php');
?>
