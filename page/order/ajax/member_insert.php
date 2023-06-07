<?php
    include_once('../../../head.php');

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $posted = date("Y-m-d H:i:s");

    //비밀번호 암호화
    $encrypted_password = password_hash($password , PASSWORD_DEFAULT );

    //중복회원 확인
    $member_sql =
        "select (select COUNT(*) from order_member_tbl where name = '" .$name. "' and email = '" .$email. "') as cnt
                , id 
            from
                    order_member_tbl where name = '" .$name. "' and email = '" .$email. "'";
    $member_stt=$db_conn->prepare($member_sql);
    $member_stt->execute();
    $idMember = $member_stt -> fetch();

    if($idMember[0] > 0){
        //기존 가입 회원
        //세션 추가
        $_SESSION['member'] = $idMember[1];

        echo "<script type='text/javascript'>";
        echo "location.href = '../step5.php';";
        echo "</script>";
    }
    else{
        //신규 회원
        $sql = "
                insert into order_member_tbl
                    (name, phone, email, password, regdate)
                value
                    (?, ?, ?, ?, ?)";

        $db_conn->prepare($sql)->execute(
            [
                $name,
                $phone,
                $email,
                $encrypted_password,
                $posted
            ]
        );
        $last_id = $db_conn->lastInsertId();
        //세션 추가
        $_SESSION['member'] = $last_id;

        echo "<script type='text/javascript'>";
        echo "location.href = '../step5.php';";
        echo "</script>";
    }


?>
