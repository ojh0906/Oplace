<?php
include_once('../../../head.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');

$email = $_POST["email"];
$password = $_POST["password"];

$login_sql = "select * from order_member_tbl WHERE email = '$email'";
$login_stt=$db_conn->prepare($login_sql);
$login_stt->execute();

echo $login_sql;
$i = 0;
while($list_row=$login_stt->fetch()){
    $i++;
    if($email == $list_row['email'] && password_verify( $password , $list_row['password'] )){
        $_SESSION['user_id'] = $list_row['id'];
        ?>
        <meta http-equiv="refresh" content="0;url=../step3.php" />
        <?php
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('주문한 이메일 주소가 아니거나 비밀번호가 틀립니다.'); location.href='../step1.php'";
        echo "</script>";
    }
}
if($i == 0){
    echo "<script type='text/javascript'>";
    echo "alert('주문한 이메일 주소가 아니거나 비밀번호가 틀립니다.'); location.href='../step1.php'";
    echo "</script>";
}

?>
