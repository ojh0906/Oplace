<?php
    include_once('../../../head.php');

    $posted = date("Y-m-d H:i:s");
    $step = $_POST['step'] ." ".$_POST['date'];
    $company_info = $_POST['company'];
    $dev_status = $_POST['dev_status'];
    $dev_goal = $_POST['dev_goal'];
    $facility = $_POST['facility'];
    $target = $_POST['target'];


    for($o=0; $o <= 4; $o++){
        $file_fk[$o] = 0;
    }


    for($i=0; $i <= 4; $i++) {
        if (isset($_FILES['file'.$i]) && $_FILES['file'.$i]['name'] != "") {
            $file = $_FILES['file'.$i];
            $file_link = $site_path . '/data/order_common/';

            //파일명 변경
            $chg_file = date("Y-m-d H:i:s:u")."_".$i .$file['name'];
            $chg_file = str_replace(' ', '', $chg_file);
            if (move_uploaded_file($file['tmp_name'], $file_link .  $chg_file)) {
                // 파일 DB에 저장
                $file_sql = "insert into order_common_file_tbl (type, file_title, chg_title, regdate)
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




    $info_sql = "insert into order_common_info_tbl
                              (
                               step,
                               company_info, company_info_file_fk,
                               dev_status, dev_status_file_fk,
                               dev_goal, dev_goal_file_fk,
                               facility, facility_file_fk,
                               target, target_file_fk,
                               regdate, orderNo_fk
                                )
                         value
                              (?,
                                ?, ?,
                                ?, ?,
                                ?, ?,
                                ?, ?,
                                ?, ?,
                                ?, ?
                               )";


      $db_conn->prepare($info_sql)->execute(
          [
              $step,
              $company_info, $file_fk[0],
              $dev_status, $file_fk[1],
              $dev_goal, $file_fk[2],
              $facility, $file_fk[3],
              $target, $file_fk[4],
              $posted, $_SESSION['MxIssueNO']]);


    echo "<script type='text/javascript'>";
    echo "alert('등록되었습니다.'); location.href='../step7.php'";
    echo "</script>";
?>
