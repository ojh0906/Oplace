<?php
    include_once('head.php');
    include_once('default.php');

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    if(!isset($_GET['page']))
    {
      $_GET['page']=1;
    }

    // 선택삭제 쿼리
    $req = isset($_POST['req']) ? $_POST['req'] : '';

    if($req != ""){
        if($req == 'delete'){
            $chk_count = count($_POST['chk']);
            for ($i = 0; $i < $chk_count; $i ++) {
                $id = $_POST['chk'][$i];
                $delete_sql = "delete form contact_tbl where id = $id";
                $deleteStmt = $db_conn->prepare($delete_sql);
                $deleteStmt->execute();
            }

            echo "<script type='text/javascript'>";
            echo "alert('삭제했습니다.'); location.href='/adm/home.php";
            echo "</script>";
        }
    }
    $change = isset($_POST['change']) ? $_POST['change'] : '';
    $wr_id = isset($_POST['wr_id']) ? $_POST['wr_id'] : '';
    $result = isset($_POST['result']) ? $_POST['result'] : '';



    //검색 쿼리용
    $sch_date = isset($_POST['sch_date']) ? $_POST['sch_date'] : '';
    $stx = isset($_POST['stx']) ? $_POST['stx'] : '';



    // 날짜 검색
    if($sch_date != "" || $stx != ""){
        $search = "WHERE ";
    }
    else{
        $search = "";
    }
    if($sch_date == ""){
        $sch_date_key = "";
    }else{
        $sch_date_key = "WHERE write_date between '$sch_date 00:00:00' and '$sch_date 23:59:59'";
    }
    // 통합 검색
    if($stx == ""){
        $stx_key = "";
    }else{
        $stx_key = "";
        if($sch_date == ""){
            $stx_key = $stx_key."WHERE";
        }
        else{
            $stx_key = $stx_key." AND";
        }
        $stx_key = " ( name like '%$stx%' OR email like '%$stx%' OR step like '%$stx%' OR type like '%$stx%' OR contact_desc like '%$stx%' OR  writer_ip like '%$stx%' )";
    }


     // 리스트에 출력하기 위한 sql문
     $list_size = 10;
     $page_size = 10;
     $first = ($_GET['page']*$list_size)-$list_size;


    $list_sql = "select * from contact_tbl "
                .$search
                .$sch_date_key
                .$stx_key
                ." order by id desc limit $first, $list_size";
    $list_stt=$db_conn->prepare($list_sql);
    $list_stt->execute();

    //총 페이지를 구하기 위한 sql문
    $total_sql = "select count(*) from contact_tbl";
    $total_stt=$db_conn->prepare($total_sql);
    $total_stt->execute();
    $total_row=$total_stt->fetch();

    $total_list = $total_row['count(*)'];
    $total_page = ceil($total_list/$list_size);
    $row = ceil($_GET['page']/$page_size);

    $start_page=(($row-1)*$page_size)+1;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="./css/apply_list.css" rel="stylesheet" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <form name="fboardlist" id="fboardlist" method="post" onsubmit="return fboardlist_submit(this);">
            <input type="hidden" name="sst" value="a.wr_id">
            <input type="hidden" name="sod" value="desc">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="sch_pay" value="">
            <input type="hidden" name="sort_name" id="sort_name" value="">
            <input type="hidden" name="sort_date" id="sort_date" value="">

            <div class="page">
                <div class="page-header">
                    <h4 class="page-title">전체보기
                        <small class="text-muted text-xs">(<?= $total_list ?>)</small>
                    </h4>
                    <div class="btn_fixed_top">
                        <div class="d-none">
                            <button type="submit" value="검색" onclick="document.pressed = this.value">삭제방지</button>
                        </div>
                        <button type="submit" name="act_button" id="delete_btn" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-danger btn-sm shadow">선택삭제</button>
                        <button type="submit" id="export_chks" class="btn btn-primary btn-sm float-right shadow" onclick="document.pressed = '다운로드'" data-href="./ajax/apply_list_export.php">선택 엑셀 다운로드</button>
                        <a id="export_all" href="./ajax/apply_list_export.php?type=all" target="_self" class="btn btn-sm float-right shadow">액셀 다운로드</a>
                    </div>
                </div>
                <div class="mx-3 my-2 p-3 page-header border">
                    <div class="my-2">상세검색</div>
                    <div class="d-none d-md-block">
                        <div class="row mx-0">
                            <div class="col-md-2 my-1 my-md-0 px-1" >
                                <label>생성일</label>
                            </div>
                            <div class="col-md-4 my-1 my-md-0 px-1">
                                <label>통합검색</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 mb-2">
                        <div class="col-12 col-md-2 py-md-0 my-1 my-md-0 px-1 position-relative">
                            <input type="text" class="form-control h-100 bg-white date-picker" value="<?= $sch_date ?>" name="sch_date" id="sch_date" autocomplete="off" placeholder="생성일" style="border-radius: 0;border: 1px solid #ced4da;">
                            <a class="position-absolute" href="javascript:initSchDate();" style="top:23%; right:6%;"><img src="https://www.heedafranchise.co.kr/adm/img/close.png" class="w-75"></a>
                        </div>
                        <div class="col-12 col-md-2 my-1 my-md-0 px-1 position-relative">
                            <input type="text" class="form-control h-100 pr-5" value="<?= $stx ?>" name="stx" id="sch_str" placeholder="검색어 입력" style="border-radius: 0;border: 1px solid #ced4da;">
                            <a class="position-absolute" href="javascript:initSchStr();" style="top:23%; right:6%;"><img src="https://www.heedafranchise.co.kr/adm/img/close.png" class="w-75"></a>
                        </div>
                        <div class="col-12 col-md-2 my-1 my-md-0 px-1">
                            <div class="w-100 py-1 py-md-1 my-md-auto row mx-0 rounded-0" style="background-color:#F66332; border-radius: 3px; color:white; border:none; cursor:pointer" onclick="search();">
                                <div class="m-auto text-center">검색</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="table-responsive">
                        <table class="table border-bottom border-top" style="min-width: 1850px;">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" style="width: 70px;"><input type="checkbox" class="checkbox-controller" onclick="check_all(this)"></th>
                                    <th scope="col" style="cursor: pointer; width: 182px;" class="text-left" onclick="sortColumn('sort_date');">작성일</th>
                                    <th scope="col" style="width:102px;cursor: pointer;" onclick="sortColumn('sort_name');">이름</th>
                                    <th scope="col" style="width: 192px;">이메일</th>
                                    <th scope="col" style="width: 192px;">분야 선택</th>
                                    <th scope="col" style="width: 192px;">계발 단계</th>
                                    <th scope="col" style="width: 192px;">문의 내용</th>
                                    <th scope="col" style="width: 250px;">아이피</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $is_data = 0;
                                while($list_row=$list_stt->fetch()){
                                    $is_data = 1;
                            ?>
                                <tr class="bg0">
                                    <td class="td_chk text-center">
                                        <label for="chk_0" class="sound_only"></label>
                                        <input type="checkbox" name="chk[]" class="checkbox-list" value="<?= $list_row['id'] ?>" id="chk_">
                                    </td>
                                    <td><?=$list_row['write_date']?></td>
                                    <td><?=$list_row['name']?></td>
                                    <td><?=$list_row['email']?></td>
                                    <td><?=$list_row['type']?></td>
                                    <td><?=$list_row['step']?></td>
                                    <td>
                                        <button type="button" class="button button4" style="width: 100px;" onclick="openContactDescModal(<?= $list_row['id'] ?>);">문의 내용</button>
                                    </td>
                                    <!-- <td>
                                        <button type="button" class="button button4" style="width: 90px;" onclick="openCounselLogModal(2630);">기록보기</button>
                                    </td> -->
                                    <td><?=$list_row['writer_ip']?></td>
                                    <td class="d-none">
                                        <select class="custom-select" onchange="changeImportance('2630', this.value);">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($is_data != 1) { ?>
                                <tr><td colspan="20" class="text-center text-dark bg-light">문의 사항이 없습니다.</td></tr> </tbody>
                                <?php } ?>
                            </tbody>
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
                                if($_GET['page']!=1){
                                    $back=$_GET['page']-$page_size;
                                    if($back<=0){
                                        $back=1;
                                    }
                                    echo "<li class='page-item'>";
                                    echo "  <a class='page-link' href='$_SERVER[PHP_SELF]?page=$back'>처음</a>";
                                    echo "</li>";
                                }
                                for($i=$start_page; $i<=$end_page; $i++){
                                    if($_GET['page']!=$i){
                                        echo "<li class='page-item'>";
                                        echo "  <a class='page-link' href='$_SERVER[PHP_SELF]?page=$i'>";
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
                                if($_GET['page']!=$total_page){
                                    $next=$_GET['page']+$page_size;
                                    if($total_page<$next){
                                        $next=$total_page;
                                    }
                                    echo "<li class='page-item'>";
                                    echo "<a class='page-link' href='$_SERVER[PHP_SELF]?page=$next'>맨끝</a>";
                                    echo "</li>";
                                }
                            ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- box end -->
</div>
<!-- content-box-wrap end -->


<!-- Popup Modal -->
<?


?>
<div class="modal-container">
</div>


<script type="text/javascript">

// 상담 상태 동적 변경
function changeResultStatus(index, result){
    $.ajax({
        type:'post',
        dataType:'json',
        url:'./apply_list.php',
        data:{wr_id:index, result:result, change:'resultStatus'},
        success:function(json){
        }
    });
}

// 담당자 동적 변경
function changeManager(index, result){
    $.ajax({
        type:'post',
        dataType:'json',
        url:'./apply_list.php',
        data:{wr_id:index, result:result, change:'manager'},
        success:function(json){
        }
    });
}

function check_all(thisobj) {
	var $this = $(thisobj);

	if($this.prop("checked") == true) {
		$this.closest("#fboardlist").find("input[type=checkbox]").prop("checked", true);
	} else {
		$this.closest("#fboardlist").find("input[type=checkbox]").prop("checked", false);
	}
}

function fboardlist_submit(f) {
    var count = 0;
    var obj = document.getElementsByName("chk[]");

    for(var i=0 ; i < obj.length ; i++){
        if( obj[i].checked == true ){
            count++;
        }
    }
    if( count == 0) {
        alert("한 개 이상을 선택해주세요.");
        return false;
    } else {
        if(document.pressed == "선택삭제") {
            if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
                return false;
            }else{
                document.fboardlist.action = "./ajax/contact_delete.php";
            }
        } else if(document.pressed == "다운로드"){
            document.fboardlist.action = "./ajax/apply_list_export.php";
        }
        return true;
    }
}
function search(){
    document.getElementById('fboardlist').submit();
}
// 검색 input text 지움
function initSchDate(){
    $('#sch_date').val('');
}
function initSchStr(){
    $('#sch_str').val('');
}
//datepicker
$( function() {
    $( "#sch_date" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});
//문의 내용 팝업
function openCounselModal(index){

    $.ajax({
        type:'post',
        url:'./ajax/counsel_modal_open.php',
        data:{wr_id:index},
        success:function(html){

            $('.modal-container').empty();
            $('.modal-container').html(html);
            $('#contactModal').modal('show');

        }
    });
}
//상담 내역 팝업
function openContactDescModal(index){

    $.ajax({
        type:'post',
        url:'./ajax/contact_desc_modal_open.php',
        data:{wr_id:index},
        success:function(html){

            $('.modal-container').empty();
            $('.modal-container').html(html);
            $('#contactModal').modal('show');

        }
    });
}

</script>
