<?php
include_once('../head.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$posted = date("Y-m-d H:i:s");
$name = $_POST["name"];
$email = $_POST["email"];
$type = $_POST["field"];
$step = $_POST["step"];
$desc = $_POST["contact_desc"];
$writer_ip = $_POST["writer_ip"];

$sql = "
        insert into contact_tbl
            (name, email, type, step, contact_desc, writer_ip, write_date)
        value
            (?, ?, ?, ?, ?, ?, ?)";

$db_conn->prepare($sql)->execute(
    [
        $name,
        $email,
        $type,
        $step,
        $desc,
        $writer_ip,
        $posted
    ]
);

echo "<script type='text/javascript'>";
echo "alert('등록 되었습니다.');";
echo "try{";
echo "setTimeout(function(){";
echo "location.href = 'contact.php';";
echo "}, 500);";
echo "}catch(e){}";
echo "</script>";
?>
