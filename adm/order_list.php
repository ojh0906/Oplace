<?php
include_once('./head.php');
include_once('./default.php');
include_once('./order_function.php');

if (isset($_GET["page"]))
    $page = $_GET["page"]; //1,2,3,4,5
else
    $page = 1;


// 리스트에 출력하기 위한 sql문
$list_size = 10;
$page_size = 10;
$first = ($page*$list_size)-$list_size;


$admin_sql = "select * from payment_order_tbl "
                ." order by id desc limit $first, $list_size";
$admin_stt = $db_conn->prepare($admin_sql);
$admin_stt->execute();

//총 페이지를 구하기 위한 sql문
$total_sql = "select count(*) from payment_order_tbl";
$total_stt=$db_conn->prepare($total_sql);
$total_stt->execute();
$total_row=$total_stt->fetch();

$total_list = $total_row['count(*)'];
$total_page = ceil($total_list/$list_size);
$row = ceil($page/$page_size);

$start_page=(($row-1)*$page_size)+1;



?>

<div class="page-header">
    <h4 class="page-title">주문내역 관리</h4>
    <div class="btn_fixed_top">
    </div>
</div>
<!-- page-header end -->

<div class="page-body">
    <div class="table-responsive">
        <table class="table border-bottom" style="min-width: 800px;">
            <thead>
                <tr class="text-center">
                    <th scope="col" width="5%" class="text-center">주문일</th>
                    <th scope="col" width="15%" class="text-center">주문번호</th>
                    <th scope="col" width="10%">주문자</th>
                    <th scope="col" width="15%">상품명</th>
                    <th scope="col" class="text-center" width="15%">결제금액</th>
                    <th scope="col" class="text-center" width="8%">결제수단</th>
                    <th scope="col" class="text-center" width="15%">결제상태</th>
                    <th scope="col" class="text-center" width="15%"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $is_data = 0;
                while ($row = $admin_stt->fetch()) {
                    $is_data = 1;

                    $member_sql = "select * from order_member_tbl where id =" .$row['member_fk'];
                    $member_stt = $db_conn->prepare($member_sql);
                    $member_stt->execute();
                    $member = $member_stt->fetch();

                    ?>
                    <tr class="text-center">
                        <td>
                            <?= dateTime($row['orderDate']) ?>
                        </td>
                        <td class="text-center">
                            <?= $row['orderNo'] ?>
                        </td>
                        <td>
                            <?= $member['name'] ?>
                        </td>
                        <td>
                            <?= productName($row['productName']) ?>
                        </td>
                        <td>
                            <?= number_format(intval($row['price'])); ?> 원
                        </td>
                        <td>
                            <?= orderType($row['payMethod']) ?>
                        </td>
                        <td>
                            <?php
                            if(orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) == "정상발급" || orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) == "결제완료"){ $msg = "sc"; }
                            else if(orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) == "결제취소"){$msg = "cancel";}
                            else {$msg = "fail";}
                            ?>
                            <span class="<?php echo $msg;?>"><? echo orderSuccess($row['replyCode'],$row['payMethod'],$row['replyMessage']) ?></span>
                        </td>
                        <td>
                            <a href="./order_form.php?menu=5&&id=<?= $row['id'] ?>"
                                class="btn btn_03">상세보기</a>
                            <a href="./ajax/board_delete.php?id=<?= $row['id'] ?>&file=<?= $row['thumb_file'] ?>"
                                onclick="return confirm('선택한 구매내역을 삭제하시겠습니까?');" class="btn btn_03">삭제</a>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($is_data != 1) { ?>
                    <tr>
                        <td colspan="20" class="text-center text-dark bg-light">등록된 글이 없습니다.</td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
        <nav>
            <ul class="pagination">
                <?php
                if($start_page<=0){
                    $start_page = 1;
                }
                $end_page=($start_page+$page_size)-1;
                if($total_page<$end_page){
                    $end_page=$total_page;
                }
                if($page!=1){
                    $back=$page-$page_size;
                    if($back<=0){
                        $back=1;
                    }
                    echo "<li class='page-item'>";
                    echo "  <a class='page-link' href='$_SERVER[PHP_SELF]?page=$back&menu=5'>처음</a>";
                    echo "</li>";
                }
                for($i=$start_page; $i<=$end_page; $i++){
                    if($page!=$i){
                        echo "<li class='page-item'>";
                        echo "  <a class='page-link' href='$_SERVER[PHP_SELF]?page=$i&menu=5'>";
                        echo "      $i ";
                        echo "  </a>";
                        echo "</li>";
                    }else{
                        echo "<li class='page-item'>";
                        echo "  <strong class='page-link active'>";
                        echo "      $i 페이지 ";
                        echo "  </strong>";
                        echo "</li>";
                    }
                }
                if($page!=$total_page){
                    $next=$page+$page_size;
                    if($total_page<$next){
                        $next=$total_page;
                    }
                    echo "<li class='page-item'>";
                    echo "<a class='page-link' href='$_SERVER[PHP_SELF]?page=$next&menu=5'>맨끝</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

</div>
<!-- box end -->
</div>
<!-- content-box-wrap end -->

<style>
    .search-input{
        width: 200px;
    }
    .table{
        min-width: 1500px !important;
        overflow-x: scroll !important;
    }
    .sc{
        color: #1717a4;
    }
    .fail{
        color: #d82b2b;
    }
    .cancel{
        color: #b74b4b;
        background: #cfd2d4;
        padding: 3px 10px;
        border-radius: 12px;
    }
</style>
