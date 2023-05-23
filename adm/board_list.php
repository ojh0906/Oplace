<?php
include_once('./head.php');
include_once('./default.php');

// 리스트에 출력하기 위한 sql문
$admin_sql = "select * from community_board_tbl order by id";
$admin_stt = $db_conn->prepare($admin_sql);
$admin_stt->execute();
?>

<div class="page-header">
    <h4 class="page-title">커뮤니티 관리</h4>
    <div class="btn_fixed_top">
        <button type="button" onclick="location.href='./popup_form.php?menu=3&type=insert'"
            class="btn btn-danger btn-sm">게시글 작성</button>
    </div>
</div>
<!-- page-header end -->

<div class="page-body">
    <div class="table-responsive">
        <table class="table border-bottom" style="min-width: 800px;">
            <thead>
                <tr class="text-center">
                    <th scope="col" width="5%" class="text-center">번호</th>
                    <th scope="col" width="30%">제목</th>
                    <th scope="col" width="10%">작성자</th>
                    <th scope="col" width="8%">작성일</th>
                    <th scope="col" width="8%">최종수정일</th>
                    <th scope="col" class="text-center" width="15%">관리</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $is_data = 0;
                while ($list_row = $admin_stt->fetch()) {
                    $is_data = 1;
                    ?>
                    <tr class="text-center">
                        <td>
                            <?= $list_row['id'] ?>
                        </td>
                        <td class="text-left">
                            <?= $list_row['title'] ?>
                        </td>
                        <td>
                            <?= $list_row['writer'] ?>
                        </td>
                        <td>
                            <?= $list_row['regdate'] ?>
                        </td>
                        <td>
                            <?= $list_row['last_update'] ?>
                        </td>
                        <td>
                            <a href="./popup_form.php?menu=33&type=modify&id=<?= $list_row['id'] ?>"
                                class="btn btn_03">수정</a>
                            <a href="./ajax/popup_delete.php?id=<?= $list_row['id'] ?>&file=<?= $list_row['file_id'] ?>"
                                onclick="return confirm('선택한 팝업을 삭제하시겠습니까?');" class="btn btn_03">삭제</a>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($is_data != 1) { ?>
                    <tr>
                        <td colspan="20" class="text-center text-dark bg-light">새창이 없습니다.</td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>

</div>
<!-- box end -->
</div>
<!-- content-box-wrap end -->
