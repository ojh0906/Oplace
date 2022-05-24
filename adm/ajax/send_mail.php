<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $mail_from = "ojh0906@naver.com";          // 보내는 사람 메일주소
    $mail_to = "ojh0906@naver.com";           // 받는 사람 메일주소

    $Headers  = "from: send test<$mail_from>";
    $Headers .= "Content-Type: text/html; charset=UTF-8";

    $subject = "Mail Send Test - mail()";
    $contents = "mail message";

    mail($mail_to, $subject, $contents, $Headers);
    echo "success!"


?>
