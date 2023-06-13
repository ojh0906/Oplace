<?php
    include_once('./head.php');
    include_once('./default.php');

    $id = $_GET['id'];
    // 리스트에 출력하기 위한 sql문
    $admin_sql = "select * from order_member_tbl where id = $id";
    $admin_stt=$db_conn->prepare($admin_sql);
    $admin_stt->execute();
    $row = $admin_stt -> fetch();
    $name = $row[1];
    $phone = $row[2];
    $email = $row[3];
    $regdate = $row[5];


?>

<style>
    .value{
        font-size: 15px;
        font-weight: 600;
    }
</style>

<link rel="stylesheet" type="text/css" href="./css/manager_form.css" rel="stylesheet" />
    <div class="page-header">
        <h4 class="page-title">구매회원 관리</h4>
        <form name="manager_form" id="manager_form" method="post" action="./ajax/manager_setting.php">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="type" value="<?= $type ?>" />
            </div>
                <div class="input-wrap">
                    <p class="label-name">이름</p>
                    <p class="value"><?= $name ?></p>
                </div>
                <div class="input-wrap">
                    <p class="label-name">전화번호</p>
                    <p class="value"><?= $phone ?></p>
                </div>
                <div class="input-wrap">
                    <p class="label-name">이메일</p>
                    <p class="value"><?= $email ?></p>
                </div>
                <div class="input-wrap">
                    <p class="label-name">최초 가입일</p>
                    <p class="value"><?= $regdate ?></p>
                </div>
            </div>
                <div class="btn-wrap">
                    <input type="submit" class="submit" value="확인" />
                    <a href="./manager_list.php" class="go-back">목록</a>
                </div>
        </form>
    </div>
    <!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type='text/javascript'>
    $( document ).ready(function() {
        $('#password').val('');
    });

</script>
