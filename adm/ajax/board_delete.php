<?
include_once('../head.php');

$id = $_GET['id'];
$file = $_GET['file'];
$file_link = $site_path . '/data/community/';

// 게시글 정보 삭제
$delete_sql = "delete from community_board_tbl
               where
                  id = $id";
$deleteStmt = $db_conn->prepare($delete_sql);
$deleteStmt->execute();
$count = $deleteStmt->rowCount();

// 게시글 첨부파일 삭제
$select_file = "select * from file_tbl where id =" .$file;
$selectStmt = $db_conn->prepare($select_file);
$selectStmt->execute();
$row = $selectStmt->fetch();
$file_name = $row[2];
unlink($file_link.$file_name);

// 게시글 첨부파일 DB 삭제
$file_delete_sql = "delete from file_tbl
               where
                  id = $file";
$file_deleteStmt = $db_conn->prepare($file_delete_sql);
$file_deleteStmt->execute();
$count = $file_deleteStmt->rowCount();


echo "<script type='text/javascript'>";
echo "alert('삭제 되었습니다.'); location.href='../board_list.php?menu=33&'";
echo "</script>";
?>
