<?php
include_once('head.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$posted = date("Y-m-d H:i:s");
$name = $_POST["name"];
$phone = $_POST["email"];
$phone = $_POST["field"];
$phone = $_POST["step"];
$desc = $_POST["desc"];

$writer_ip = $_POST["writer_ip"];

$sql = "
        insert into contact_tbl
            (name, email, contact_desc, field, step, result_status,
             consult_fk, manager_fk, writer_ip, write_date)
        value
            (?, ?, ?, ?, ?,
            ?, ?, ?, ?)";

$db_conn->prepare($sql)->execute(
    [
        $name,
        $email,
        $desc,
        $field,
        $step,
        '대기',
        0,
        0,
        $writer_ip,
        $posted
    ]
);


$contact_cnt_sql = "insert into contact_log_tbl
                                  (contact_cnt,  reg_date)
                             value
                                  (? ,?)";


$db_conn->prepare($contact_cnt_sql)->execute(
    [1, $posted]
);

echo "<script type='text/javascript'>";
echo "alert('등록 되었습니다.');";
echo "try{";
echo "setTimeout(function(){";
echo "location.href = '/index.php';";
echo "}, 500);";
echo "}catch(e){}";
echo "</script>";
?>