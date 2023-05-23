<?php
include_once('./head.php');
include_once('./default.php');

$type = $_GET['type'];

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$today = date("Y-m-d");
$timestamp = strtotime("+1 week");
$seven_day = date("Y-m-d", $timestamp);

$start_date = '';
$end_date = '';
$width = '';
$height = '';
$width2 = '';
$height2 = '';
$popup_name = '';
$file1 = '';
$file2 = '';

if ($type == 'modify') {
    // 리스트에 출력하기 위한 sql문
    $admin_sql = "select * from popup_tbl where id = $id";
    $admin_stt = $db_conn->prepare($admin_sql);
    $admin_stt->execute();
    $row = $admin_stt->fetch();

    $file1 = '/data/popup/' . $row[6]; // pc
    $file2 = '/data/popup/' . $row[8]; // mobile

    $start_date = $row[2];
    $end_date = $row[3];
    $width = $row[4];
    $height = $row[5];
    $width2 = $row[9];
    $height2 = $row[10];
    $popup_name = $row[1];
}
?>

<link rel="stylesheet" type="text/css" href="./css/popup_form.css" rel="stylesheet" />
<script type="text/javascript" src="ajax/smartEditor2/js/HuskyEZCreator.js" charset="utf-8"></script>

<div class="page-header">
    <h4 class="page-title">커뮤니티 관리</h4>
    <form name="popup_form" id="popup_form" method="post" enctype="multipart/form-data"
        action="./ajax/popup_setting.php">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <input type="hidden" name="type" value="<?= $type ?>" />
        <div>
            <div class="input-wrap">
                <p class="label-name">제목</p>
                <input type="text" name="start_date" id="start_date" class="form-control" value="<?= $start_date ?>"
                    placeholder="ex) 2021-01-01 00:00:00" required>
                <label>
                    <input type="checkbox" name="today_chk"
                        onclick="if (this.checked == true) this.form.start_date.value=this.form.today_chk.value; else this.form.start_date.value = this.form.start_date.defaultValue;"
                        value="<?= $today ?> 00:00:00">
                    시작일시를 오늘로
                </label>
            </div>
            <hr>
            <textarea id="content" name="content"></textarea>
            <hr>
            <div class="input-wrap input-file">
                <p class="label-name">썸네일 </p>
                <input type="file" id="img_upload1" name="img_upload1" class="form-control">
                <small>5MB 이하의 파일만 업로드 가능합니다.</small>
                <div class="img-preview">
                    <img src="<?= $file1 ?>" id="preview1">
                </div>
            </div>
            <hr>
        </div>
        <div class="btn-wrap">
            <input type="submit" class="submit" value="확인" required />
            <a href="./popup_list.php" class="go-back">목록</a>
        </div>
    </form>
</div>
<!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type="text/javascript">
    var sel_file;

    $(document).ready(function () {
        $("#img_upload1").on("change", handleImgFileSelect1);
        $("#img_upload2").on("change", handleImgFileSelect2);
    });

    $(function(){
        //전역변수
        var obj = [];
        //스마트에디터 프레임생성
        nhn.husky.EZCreator.createInIFrame({
            oAppRef: obj,
            elPlaceHolder: "content", // textarea의 name태그
            sSkinURI: "ajax/smartEditor2/SmartEditor2Skin.html",  // 본인 경로게 맞게 수정
            htParams : {
                // 툴바 사용 여부
                bUseToolbar : true,
                // 입력창 크기 조절바 사용 여부
                bUseVerticalResizer : true,
                // 모드 탭(Editor | HTML | TEXT) 사용 여부
                bUseModeChanger : true,
            },
            fCreator: "createSEditor2"
        });
        function pasteHTML(filepath) {
            var sHTML = '';
            oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
        }
        //전송버튼
        $("#insertBoard").click(function(){
            //id가 smarteditor인 textarea에 에디터에서 대입
            obj.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
            $("#insertBoardFrm").submit();
        });
    });


    function handleImgFileSelect1(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);

        filesArr.forEach(function (f) {
            if (!f.type.match("image.*")) {
                alert("확장자는 이미지 확장자만 가능합니다.");
                return;
            }
            sel_file = f;

            var reader = new FileReader();
            reader.onload = function (e) {
                $("#preview1").attr("src", e.target.result);
            }
            reader.readAsDataURL(f);
        });
    }
    function handleImgFileSelect2(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);

        filesArr.forEach(function (f) {
            if (!f.type.match("image.*")) {
                alert("확장자는 이미지 확장자만 가능합니다.");
                return;
            }
            sel_file = f;

            var reader = new FileReader();
            reader.onload = function (e) {
                $("#preview2").attr("src", e.target.result);
            }
            reader.readAsDataURL(f);
        });
    }
</script>
