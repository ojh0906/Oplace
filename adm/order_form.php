<?php
    include_once('./head.php');
    include_once('./default.php');
    include_once('./order_function.php');

    $id = $_GET['id'];
    // 리스트에 출력하기 위한 sql문
    $admin_sql = "select * from payment_order_tbl where id = $id";
    $admin_stt=$db_conn->prepare($admin_sql);
    $admin_stt->execute();
    $row = $admin_stt -> fetch();

    //회원정보
    $member_sql = "select * from order_member_tbl where id =" .$row['member_fk'];
    $member_stt = $db_conn->prepare($member_sql);
    $member_stt->execute();
    $member = $member_stt->fetch();


    // 부가 서비스
    $addArr = explode("|", $row['addition']);
    $addYn1 = false;
    $addYn2 = false;
    $addYn3 = false;

    // 결제액 계산
    $total = 3500000;
    for ($i = 0; $i < count($addArr); $i++) {
        if($addArr[$i] == 1){
            $addYn1 = true;
            $total += 3000000;
        }else if($addArr[$i] == 2) {
            $addYn2 = true;
            $total += 3000000;
        }else if($addArr[$i] == 3) {
            $addYn3 = true;
            $total += 2500000;
        }
    }
    $vat = $total / 10;

    // 기본 자료 첨부 데이터
    $common_info_sql = "select * from order_common_info_tbl where orderNo_fk = '" .$row['orderNo'] ."'";
    $common_info_stt = $db_conn->prepare($common_info_sql);
    $common_info_stt->execute();
    $common_info = $common_info_stt->fetch();

    // 기본 자료 파일
    $file_link = $site_url . '/data/order_common/';
    $common_file_fk = [
            $common_info['company_info_file_fk'],
            $common_info['dev_status_file_fk'],
            $common_info['dev_goal_file_fk'],
            $common_info['facility_file_fk'],
            $common_info['target_file_fk'],
            ];

    for($i = 0;count($common_file_fk) > $i; $i++){
        $common_file_sql[$i] = "select * from order_common_file_tbl where id = $common_file_fk[$i]";
        $common_file_stt[$i] = $db_conn->prepare($common_file_sql[$i]);
        $common_file_stt[$i]->execute();
        $common_info_file[$i] = $common_file_stt[$i]->fetch();
    }


    // 부가서비스 자료 첨부 데이터
    $addition_info_sql = "select * from order_addition_info_tbl where orderNo_fk = '" .$row['orderNo'] ."'";
    $addition_info_stt = $db_conn->prepare($addition_info_sql);
    $addition_info_stt->execute();
    $addition_info = $addition_info_stt->fetch();

    $addition_file_link = $site_url . '/data/order_addition/';

    $addition_file_fk = [
        $addition_info['n_case_file_fk'],
        $addition_info['n_directional_file_fk'],
        $addition_info['n_contact_file_fk'],
        $addition_info['l_case_file_fk'],
        $addition_info['l_directional_file_fk'],
        $addition_info['l_contact_file_fk'],
        $addition_info['c_case_file_fk'],
        $addition_info['c_directional_file_fk'],
        $addition_info['c_contact_file_fk'],
    ];

    for($o = 0;count($addition_file_fk) > $o; $o++){
        $addition_file_sql[$o] = "select * from order_addition_file_tbl where id = $addition_file_fk[$o]";
        $addition_file_stt[$o] = $db_conn->prepare($addition_file_sql[$o]);
        $addition_file_stt[$o]->execute();
        $addition_info_file[$o] = $addition_file_stt[$o]->fetch();
    }





?>


<link rel="stylesheet" type="text/css" href="./css/manager_form.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="./css/order.css" rel="stylesheet" />
<div class="page-header">
    <h4 class="page-title">주문내역 관리</h4>
        <p class="tit">결제정보</p>
        <div class="member-info-wrap">
            <div class="line">
                <div class="label">
                    주문자명:
                </div>
                <div class="val">
                    <?= $member['name'] ?>
                    <a class="detail" href="member_form.php?id=<?= $row['member_fk'] ?>&menu=4">상세 보기</a>
                </div>
            </div>
            <div class="line">
                <div class="label">
                    결제일:
                </div>
                <div class="val">
                    <?= dateTime($row['orderDate']) ?>
                </div>
            </div>
            <div class="line">
                <div class="label">
                    결제상태:
                </div>
                <div class="val">
                    <?php
                    if(orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) == "정상발급" || orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) == "결제완료"){ $msg = "sc"; }
                    else if(orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) == "결제취소"){$msg = "cancel";}
                    else {$msg = "fail";}?>
                    <span class="<?php echo $msg;?>"><? echo orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) ?></span>
                </div>
            </div>
            <div class="line">
                <div class="label">
                    결제수단:
                </div>
                <div class="val">
                    <?= orderType($row['payMethod']) ?>
                </div>
            </div>
            <div class="line">
                <div class="label">
                    주문번호:
                </div>
                <div class="val">
                    <?= $row['orderNo'] ?>
                </div>
            </div>
            <!--    신용 결제     -->
            <?php if($row['payMethod'] == 'CC') { ?>
            <div class="line">
                <div class="label">
                    카드정보:
                </div>
                <div class="val">
                    <?= $row['acqName'] ?> <?= $row['ccNO'] ?>
                </div>
            </div>
            <div class="line">
                <div class="label">
                    할부:
                </div>
                <div class="val">
                    <?php if($row['installment'] == '00'){ ?>
                    일시불
                    <?php } else { ?>
                    <?= $row['installment'] ?> 개월
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <!--    간편 결제     -->
<!--                --><?php //if($row['payMethod'] == '') { ?>
<!---->
<!---->
<!--                --><?php //} ?>
        </div>
        <?php if($row['replyCode'] != '결제취소' && $row['replyCode'] == '0000'){ ?>
        <div class="pay-cancel">
            <span class="btn" id="cancel">결제취소</span>
        </div>
        <?php } ?>
        <form id="cancel-form" method="post" action="ajax/payment_cancel.php">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="MxID" id="MxID" value="testcorp" />
            <input type="hidden" name="MxIssueNO" id="MxIssueNO" value="<?= $row['orderNo'] ?>" />
            <input type="hidden" name="MxIssueDate" id="MxIssueDate" value="<?= $row['orderDate'] ?>" />
            <input type="hidden" name="Amount" id="Amount" value="<?= $row['price'] ?>" />
            <input type="hidden" name="CcMode" id="CcMode" value="10" />
            <input type="hidden" name="PayMethod" id="PayMethod" value="<?= $row['payMethod'] ?>" />
            <input type="hidden" name="TxCode" id="TxCode" value="<?php echo cancel($row['payMethod']); ?>" />
            <input type="hidden" name="RefundBankCode" id="RefundBankCode" value="" />
            <input type="hidden" name="HolderName" id="HolderName" value="" />
            <input type="hidden" name="RefundAccount" id="RefundAccount" value="" />
        </form>
        <div class="order-table-wrap">
            <div class="table-wrap">
                <aside>
                    <div class="th">
                        <p>서비스 명</p>
                        <p>견적</p>
                    </div>
                    <div class="tr">
                        <p> <?= productName($row['productName']) ?></p>
                        <p>3,500,000 원</p>
                    </div>
                </aside>
                <aside>
                    <div class="th">
                        <p>추가된 부가 서비스</p>
                        <p>견적</p>
                    </div>
                    <?php if($addYn1){ ?>
                        <div id="target1_re" class="tr">
                            <p>네이밍</p>
                            <p>3,000,000 원</p>
                        </div>
                    <?php } ?>
                    <?php if($addYn2){ ?>
                        <div id="target2_re" class="tr">
                            <p>로고 디자인</p>
                            <p>3,000,000 원</p>
                        </div>
                    <?php } ?>
                    <?php if($addYn3){ ?>
                        <div id="target3_re" class="tr">
                            <p>사업 컨셉 영상</p>
                            <p>2,500,000 원</p>
                        </div>
                    <?php } ?>
                </aside>
                <aside class="total-wrap">
                    <div class="price">
                        <p>합계</p>
                        <p><span id="total-text"><?php echo number_format(intval($total)); ?></span> 원</p>
                    </div>
                    <div class="price">
                        <p>부가가치세 (+10%)</p>
                        <p><span id="vat-text"><?php echo number_format(intval($vat)); ?></span> 원</p>
                    </div>
                    <div class="price">
                        <p>총 결제액</p>
                        <p><span id="total-price"><?php echo number_format(intval($row['price'])); ?></span> 원</p>
                    </div>
                </aside>
            </div>
        </div>
        <div class="tab-container">
            <div class="tab active">
                기본 자료 첨부
            </div>
            <div class="tab">
                부가서비스 자료 첨부
            </div>
        </div>
        <div class="tab-content">

            <div class="common-info-container tab-wrap">
                <p class="label">개발단계</p>
                <div class="textbox">
                    <?php if( strlen($common_info['step']) > 20 ) {?>
                        <?php
                            echo iconv_substr($common_info['step'], 0, 5) ." / 오픈 예정일: " .iconv_substr($common_info['step'], 6, 10)
                        ?>
                    <? } else { ?>
                        <?= $common_info['step'] ?>
                    <? } ?>
                </div>
                <p class="label">회사 소개</p>
                <div class="textbox">
                    <?= $common_info['company_info'] ?>
                </div>
                <?php if($common_info['company_info_file_fk'] != "") { ?>
                <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
                <p class="label">개발 현황</p>
                <div class="textbox">
                    <?= $common_info['dev_status'] ?>
                </div>
                <?php if($common_info['dev_status_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
                <p class="label">개발 목표, 비전</p>
                <div class="textbox">
                    <?= $common_info['dev_goal'] ?>
                </div>
                <?php if($common_info['dev_goal_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
                <p class="label">시설 개요</p>
                <div class="textbox">
                    <?= $common_info['facility'] ?>
                </div>
                <?php if($common_info['facility_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
                <p class="label">예상 타겟</p>
                <div class="textbox">
                    <?= $common_info['target'] ?>
                </div>
                <?php if($common_info['target_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
            </div>
            <div class="common-info-container tab-wrap">
                <p class="title">네이밍</p>
                <p class="label">좋은 느낌을 받으신 사례</p>
                <div class="textbox">
                    <?= $addition_info['n_case'] ?>
                </div>
                <?php if($addition_info['n_case_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[0]['chg_title'] ?>" class="download" download="<?= $addition_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[0]['file_title'] ?></a>
                <?php } ?>
                <p class="label">네이밍 방향성에 대한 의견</p>
                <div class="textbox">
                    <?= $addition_info['n_directional'] ?>
                </div>
                <?php if($addition_info['n_directional_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[1]['chg_title'] ?>" class="download" download="<?= $addition_info_file[1]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[1]['file_title'] ?></a>
                <?php } ?>
                <p class="label">지문 있으시면 적어주세요</p>
                <div class="textbox">
                    <?= $addition_info['n_contact'] ?>
                </div>
                <?php if($addition_info['n_contact_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[2]['chg_title'] ?>" class="download" download="<?= $addition_info_file[2]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[2]['file_title'] ?></a>
                <?php } ?>
                <p class="title">로고 디자인</p>
                <p class="label">좋은 느낌을 받으신 사례</p>
                <div class="textbox">
                    <?= $addition_info['l_case'] ?>
                </div>
                <?php if($addition_info['l_case_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[3]['chg_title'] ?>" class="download" download="<?= $addition_info_file[3]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[3]['file_title'] ?></a>
                <?php } ?>
                <p class="label">네이밍 방향성에 대한 의견</p>
                <div class="textbox">
                    <?= $addition_info['l_directional'] ?>
                </div>
                <?php if($addition_info['l_directional_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[4]['chg_title'] ?>" class="download" download="<?= $addition_info_file[4]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[4]['file_title'] ?></a>
                <?php } ?>
                <p class="label">지문 있으시면 적어주세요</p>
                <div class="textbox">
                    <?= $addition_info['l_contact'] ?>
                </div>
                <?php if($addition_info['l_contact_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[5]['chg_title'] ?>" class="download" download="<?= $addition_info_file[5]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[5]['file_title'] ?></a>
                <?php } ?>
                <p class="title">컨셉 영상</p>
                <p class="label">좋은 느낌을 받으신 사례</p>
                <div class="textbox">
                    <?= $addition_info['c_case'] ?>
                </div>
                <?php if($addition_info['c_case_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[6]['chg_title'] ?>" class="download" download="<?= $addition_info_file[6]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[6]['file_title'] ?></a>
                <?php } ?>
                <p class="label">네이밍 방향성에 대한 의견</p>
                <div class="textbox">
                    <?= $addition_info['c_directional'] ?>
                </div>
                <?php if($addition_info['c_directional_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[7]['chg_title'] ?>" class="download" download="<?= $addition_info_file[7]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[7]['file_title'] ?></a>
                <?php } ?>
                <p class="label">지문 있으시면 적어주세요</p>
                <div class="textbox">
                    <?= $addition_info['c_contact'] ?>
                </div>
                <?php if($addition_info['c_contact_file_fk'] != "") { ?>
                    <a href="<?php echo $addition_file_link.$addition_info_file[8]['chg_title'] ?>" class="download" download="<?= $addition_info_file[8]['file_title'] ?>"><i class="fas fa-download"></i><?= $addition_info_file[8]['file_title'] ?></a>
                <?php } ?>
            </div>
        </div>


        <div class="btn-wrap">
            <input type="submit" class="submit" value="확인" />
            <a href="./manager_list.php" class="go-back">목록</a>
        </div>
    </div>
    <!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type='text/javascript'>
    $( document ).ready(function() {
        $(".tab-wrap").eq(0).show();
    });


    $('#cancel').click(function() {
        var result = confirm('취소시, 다시 되돌릴 수 없습니다.\n결제를 취소하시겠습니까? ');
        if(result) {
            $("#cancel-form").submit();
        } else {

        }
    });

    $(".tab").click(function (){
        var idx = $(this).index();

        $(".tab").removeClass("active");
        $(this).addClass("active");

        $(".tab-wrap").hide();
        $(".tab-wrap").eq(idx).show();
    });

</script>
