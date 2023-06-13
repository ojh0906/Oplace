<?php
    include_once('../../../head.php');
    $posted = date("Y-m-d H:i:s");
    $n_case = $_POST['n_case'];
    $l_case = $_POST['l_case'];
    $c_case = $_POST['c_case'];
    $n_directional = $_POST['n_directional'];
    $l_directional = $_POST['l_directional'];
    $c_directional = $_POST['c_directional'];
    $n_contact = $_POST['n_contact'];
    $l_contact = $_POST['l_contact'];
    $c_contact = $_POST['c_contact'];

    for($o=0; $o <= 8; $o++){
        $file_fk[$o] = 0;
    }

    for($i=0; $i <= 8; $i++) {
        if (isset($_FILES['file'.$i]) && $_FILES['file'.$i]['name'] != "") {
            $file = $_FILES['file'.$i];
            $file_link = $site_path . '/data/order_addition/';

            //파일명 변경
            $chg_file = date("Y-m-d H:i:s:u")."_".$i .$file['name'];
            $chg_file = str_replace(' ', '', $chg_file);
            if (move_uploaded_file($file['tmp_name'], $file_link .  $chg_file)) {
                // 파일 DB에 저장
                $file_sql = "insert into order_addition_file_tbl (type, file_title, chg_title, regdate)
                                    value  
                                        (?, ?, ?, ?)";
                $db_conn->prepare($file_sql)->execute(
                    [
                        $i + 1,
                        $file['name'],
                        $chg_file,
                        $posted,
                    ]
                );
                $file_fk[$i] = $db_conn->lastInsertId();
            }
        }
    }

    $info_sql = "insert into order_addition_info_tbl
                                  (
                                   n_case, n_case_file_fk,
                                   n_directional, n_directional_file_fk,
                                   n_contact, n_contact_file_fk,
                                   l_case, l_case_file_fk,
                                   l_directional, l_directional_file_fk,
                                   l_contact, l_contact_file_fk,
                                   c_case, c_case_file_fk,
                                   c_directional, c_directional_file_fk,
                                   c_contact, c_contact_file_fk,
                                   regdate, orderNo_fk
                                    )
                             value
                                  (
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?,
                                    ?, ?
                                   )";


    $db_conn->prepare($info_sql)->execute(
        [
            $n_case, $file_fk[0],
            $n_directional, $file_fk[1],
            $n_contact, $file_fk[2],
            $l_case, $file_fk[3],
            $l_directional, $file_fk[4],
            $l_contact, $file_fk[5],
            $c_case, $file_fk[6],
            $c_directional, $file_fk[7],
            $c_contact, $file_fk[8],
            $posted, $_SESSION['MxIssueNO']]);


    echo "<script type='text/javascript'>";
    echo "alert('등록되었습니다.'); location.href='../step8.php'";
    echo "</script>";



?>
