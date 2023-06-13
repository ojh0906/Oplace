<?
include_once('../head.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$reg_date = date("Y-m-d H:i:s");

$id = "";
$type = $_POST['type'];
$title = $_POST['title'];
$writer = $_POST['writer'];
$content = $_POST['content'];
$file_link = $site_path . '/data/community/';


//입력
if ($type == 'insert') {
     if (isset($_FILES['img_upload1']) && $_FILES['img_upload1']['name'] != "") {
          $file1 = $_FILES['img_upload1'];
          $upload_directory = $site_path . '/data/community/';
          $ext_str = "jpg,gif,png";
          $allowed_extensions = explode(',', $ext_str);
          $max_file_size = 5242880;
          $ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);

          // 확장자 체크
          if (!in_array($ext1, $allowed_extensions)) {
               echo "<script type='text/javascript'>";
               echo "alert('이미지 파일만 업로드 하실 수 있습니다.'); history.back()";
               echo "</script>";
          }
          // 파일 크기 체크
          if ($file1['size'] >= $max_file_size) {
               echo "<script type='text/javascript'>";
               echo "alert('5MB 이하의 파일만 업로드 가능합니다.'); history.back()";
               echo "</script>";
          }
          //파일명 변경
          $chg_file = date("Y-m-d H:i:s:u") .$file1['name'];
          $chg_file = str_replace(' ', '', $chg_file);
          if (move_uploaded_file($file1['tmp_name'], $upload_directory .  $chg_file)) {
               // 파일 DB에 저장
               $file_sql = "insert into community_file_tbl (file_title, chg_title, ftype)
                                value  
                                    (?, ?, ?)";
               $db_conn->prepare($file_sql)->execute(
                   [
                       $file1['name'],
                       $chg_file,
                        1,
                   ]
               );
               $last_id = $db_conn->lastInsertId();

               $insert_sql = "insert into community_board_tbl
                                        (title, writer, content_desc, view_cnt, thumb_file, regdate, last_update)
                                   value
                                        (?, ?, ?, ?, ?, ?, ?)";

               $db_conn->prepare($insert_sql)->execute(
                   [
                       $title,
                       $writer,
                       $content,
                       "0",
                       $last_id,
                       $reg_date,
                       $reg_date,
                   ]
               );

          }
     }

     echo "<script type='text/javascript'>";
     echo "alert('등록 되었습니다.'); location.href='../board_list.php?menu=33&'";
     echo "</script>";
}

//수정
if ($type == 'modify') {
     $id = $_POST['id'];
     $file_fk = $_POST['file_fk'];


     //기존 파일 정보 불러오기
     $file_sql = "select * from community_file_tbl where id = " .$file_fk;
     $file_stt = $db_conn->prepare($file_sql);
     $file_stt->execute();
     $file = $file_stt->fetch();



     //첨부파일 변경시
     if (isset($_FILES['img_upload1']) && $_FILES['img_upload1']['name'] != "") {

          // 기존파일 삭제
          unlink($file_link.$file[2]);

          $file1 = $_FILES['img_upload1'];
          $upload_directory = $site_path . '/data/community/';
          $ext_str = "jpg,gif,png";
          $allowed_extensions = explode(',', $ext_str);
          $max_file_size = 5242880;
          $ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);

          // 확장자 체크
          if (!in_array($ext1, $allowed_extensions)) {
               echo "<script type='text/javascript'>";
               echo "alert('이미지 파일만 업로드 하실 수 있습니다.'); history.back()";
               echo "</script>";
          }
          // 파일 크기 체크
          if ($file1['size'] >= $max_file_size) {
               echo "<script type='text/javascript'>";
               echo "alert('5MB 이하의 파일만 업로드 가능합니다.'); history.back()";
               echo "</script>";
          }
          //파일명 변경
          $chg_file = date("Y-m-d H:i:s:u") .$file1['name'];
          $chg_file = str_replace(' ', '', $chg_file);
          if (move_uploaded_file($file1['tmp_name'], $upload_directory .  $chg_file)) {
               // 파일 DB에 저장
               $file_sql = "insert into community_file_tbl (file_title, chg_title, ftype)
                           value
                               (?, ?, ?)";
               $db_conn->prepare($file_sql)->execute(
                   [
                       $file1['name'],
                       $chg_file,
                       1,
                   ]
               );
               $file_fk = $db_conn->lastInsertId();
          }
     }


     $modify_sql = "update community_board_tbl
               set
          title = '$title',
          writer = '$writer',
          content_desc = '$content',
          thumb_file = '$file_fk',
          last_update = '$reg_date'
               where
          id = $id";

     $updateStmt = $db_conn->prepare($modify_sql);
     $updateStmt->execute();

     $count = $updateStmt->rowCount();

     echo "<script type='text/javascript'>";
     echo "alert('수정을 완료했습니다.'); location.href='../board_list.php?menu=4&type=modify&id=$id'";
     echo "</script>";
}
?>
