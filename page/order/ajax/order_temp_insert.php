<?php
    include_once('../../../head.php');

    $service_type = $_POST['service_type'];
    $addition = $_POST['addition'];
    $total = $_POST['total'];
    $vat = $_POST['vat'];
    $total_price = $_POST['total_price'];
    $posted = date("Y-m-d H:i:s");


$sql = "
        insert into order_temp_tbl
            (service_type, addition, total, vat, total_price, regdate)
        value
            (?, ?, ?, ?, ?, ?)";

$db_conn->prepare($sql)->execute(
    [
        $service_type,
        $addition,
        $total,
        $vat,
        $total_price,
        $posted
    ]
);
$last_id = $db_conn->lastInsertId();
//세션 추가
$_SESSION['order_temp_id'] = $last_id;

echo "<script type='text/javascript'>";
echo "location.href = '../step2.php';";
echo "</script>";

?>
