<?php
    include_once('../../../head.php');
    include_once('order_function.php');


    // 주문정보
    $admin_sql = "select * from payment_order_tbl where orderNo = '".$_POST['orderNo'] ."'";
    $admin_stt=$db_conn->prepare($admin_sql);
    $admin_stt->execute();
    $row = $admin_stt -> fetch();

    //부가서비스
    $addArr = explode("|", $row['addition']);
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

    //회원정보
    $member_sql = "select * from order_member_tbl where id =" .$_POST['member_id'];
    $member_stt = $db_conn->prepare($member_sql);
    $member_stt->execute();
    $member = $member_stt->fetch();

    // 기본 자료 첨부 데이터
    $common_info_sql = "select * from order_common_info_tbl where orderNo_fk = '" . $row['orderNo'] . "'";
    $common_info_stt = $db_conn->prepare($common_info_sql);
    $common_info_stt->execute();

    $company_info_text = "";
    $company_info_file = "";
    $dev_status = "";
    $dev_status_file = "";
    $dev_goal = "";
    $dev_goal_file = "";
    $facility = "";
    $facility_file = "" ;
    $target = "";
    $target_file = "";

    if($common_info = $common_info_stt->fetch()){
        // 기본 자료 파일
        $file_link = $site_url . '/data/order_common/';
        $common_file_fk = [
            $common_info['company_info_file_fk'],
            $common_info['dev_status_file_fk'],
            $common_info['dev_goal_file_fk'],
            $common_info['facility_file_fk'],
            $common_info['target_file_fk'],
        ];

        for ($i = 0; count($common_file_fk) > $i; $i++) {
            $common_file_sql[$i] = "select * from order_common_file_tbl where id = $common_file_fk[$i]";
            $common_file_stt[$i] = $db_conn->prepare($common_file_sql[$i]);
            $common_file_stt[$i]->execute();
            $common_info_file[$i] = $common_file_stt[$i]->fetch();
        }

        $company_info_text = $common_info['company_info'];
        $dev_status = $common_info['dev_status'];
        $dev_goal = $common_info['dev_goal'];
        $facility = $common_info['facility'];
        $target = $common_info['target'];

    }
?>

<div class="layer-popup">
    <img class="close-btn close-popup" src="<?php echo $site_url ?>/img/close-btn.png" />
    <div class="order-data">
        <div>
            <p><span>주문번호</span> <?= $row['orderNo'] ?></p>
            <p><span>이름</span> <?= $member['name'] ?></p>
            <p><span>이메일</span> <?= $member['email'] ?></p>
            <p><span>휴대폰 번호</span> <?= $member['phone'] ?></p>
        </div>
        <div>
            <p><span>서비스</span> <?= productName($row['productName']) ?></p>
            <div class="data-service">
                <p>
                    <span>부가서비스</span>
                </p>
                <ul>
                    <?php if($addYn1){ ?>
                    <li>네이밍</li>
                    <? } ?>
                    <?php if($addYn2){ ?>
                    <li>로고 디자인</li>
                    <? } ?>
                    <?php if($addYn3){ ?>
                    <li>사업 컨셉 영상</li>
                    <? } ?>
                </ul>
            </div>
            <p><span>결제 일자</span> <?= dateTime($row['orderDate']) ?></p>
            <p><span>결제 금액</span> <?php echo number_format(intval($row['price'])); ?>원</p>
        </div>
    </div>

    <div class="input-info">
        <p class="title">입력 정보 및 첨부파일</p>
        <div class="input-box">
            <div class="input-wrap">
                <p class="input-title">계발 단계</p>

            </div>
            <div class="input-wrap">
                <p class="input-title">회사 소개서</p>
                <input class="input-text" type="text" name="company" value="<?= $company_info_text ?>"
                       placeholder="기업 철학, 비즈니스 유형, 유사 개발 실적 외 회사 기본 정보 (회사 소개서 첨부 권장)" />
                <div class="input-btn">
                    <label for="company-file">
                        <img src="<?php echo $site_url ?>/img/attach.png" />
                        파일 선택
                    </label>
                    <input id="company-file" name="company-file" type="file" />
                </div>
                <?php if($common_info['company_info_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
            </div>
            <div class="input-wrap">
                <p class="input-title">개발 현황</p>
                <input class="input-text" type="text" name="company" value="<?= $dev_status ?>"
                       placeholder="주소, 면적, 평면도, 조감도, 입지분석, 지역 현황 (자료 첨부 권장)" />
                <div class="input-btn">
                    <label for="company-file">
                        <img src="<?php echo $site_url ?>/img/attach.png" />
                        파일 선택
                    </label>
                    <input id="company-file" name="company-file" type="file" />
                </div>
                <?php if($common_info['dev_status_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
            </div>
            <div class="input-wrap">
                <p class="input-title">개발 목표, 비전</p>
                <input class="input-text" type="text" name="company" value="<?= $dev_goal ?>"
                       placeholder="개발의 목표, 목적, 예상 효과, 업계에 미치는 영향, 확장 방향, 공공성(지역사회 역할 및 연계 부분)" />
                <div class="input-btn">
                    <label for="company-file">
                        <img src="<?php echo $site_url ?>/img/attach.png" />
                        파일 선택
                    </label>
                    <input id="company-file" name="company-file" type="file" />
                </div>
                <?php if($common_info['dev_goal_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
            </div>
            <div class="input-wrap">
                <p class="input-title">시설 개요</p>
                <input class="input-text" type="text" name="company" value="<?= $facility ?>"
                       placeholder="도입시설 구성의 목표와 방향성, 확정된 도입시설, 콘텐츠, MD 등의 정보 (자료 첨부 권장)" />
                <div class="input-btn">
                    <label for="company-file">
                        <img src="<?php echo $site_url ?>/img/attach.png" />
                        파일 선택
                    </label>
                    <input id="company-file" name="company-file" type="file" />
                </div>
                <?php if($common_info['facility_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
            </div>
            <div class="input-wrap">
                <p class="input-title">예상 타겟</p>
                <input class="input-text" type="text" name="company" value="<?= $target ?>"
                       placeholder="주요 예상 고객층, 도입시설별 예상 고객" />
                <div class="input-btn">
                    <label for="target">
                        <img src="<?php echo $site_url ?>/img/attach.png" />
                        파일 선택
                    </label>
                    <input id="target" name="target" type="file" />
                </div>
                <?php if($common_info['target_file_fk'] != "") { ?>
                    <a href="<?php echo $file_link.$common_info_file[0]['chg_title'] ?>" class="download" download="<?= $common_info_file[0]['file_title'] ?>"><i class="fas fa-download"></i><?= $common_info_file[0]['file_title'] ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".close-popup").click(function () {
            console.log('close-popup')
            $(".layer-popup-wrap").hide();
        });
    });
</script>
