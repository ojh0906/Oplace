<?
include_once('../head.php');

$id = $_GET['id'];
$file_name1 = $_GET['file1'];
$file_name2 = $_GET['file2'];
$file_link1 = $_SERVER["DOCUMENT_ROOT"] . '/data/popup/' . $file_name1;
$file_link2 = $_SERVER["DOCUMENT_ROOT"] . '/data/popup/' . $file_name2;

$delete_sql = "delete from popup_tbl
               where
                  id = $id";

$deleteStmt = $db_conn->prepare($delete_sql);
$deleteStmt->execute();

$count = $deleteStmt->rowCount();

unlink($file_link1);
unlink($file_link2);

echo "<script type='text/javascript'>";
echo "alert('삭제 되었습니다.'); location.href='../popup_list.php?menu=3&'";
echo "</script>";
?>
