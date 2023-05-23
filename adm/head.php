<?php

//2022.05.24 Update - Juno
// commit test
// commit test - by Yujin

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');
session_start();
// 로그인 세션 체크
//print_r($_SESSION);

include_once($_SERVER["DOCUMENT_ROOT"].'/DB_Solution/db/dbconfig.php');

//사이트 정보 쿼리
$site_info_sql = "select * from site_setting_tbl";
$site_info_stt = $db_conn -> prepare($site_info_sql);
$site_info_stt -> execute();
$site = $site_info_stt -> fetch();
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="imagetoolbar" content="no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta property="og:title" content="<?=$site[1]?>" />
    <meta property="og:description" content="<?=$site[2]?>" />
    <meta property="og:type" content="article" />
    <title><?=$site[1]?></title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/reset.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/css/common.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet" />

    <script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<?php
$menu = isset($_GET["menu"]) ? $_GET["menu"] : '';

?>

