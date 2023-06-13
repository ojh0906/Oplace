<?php
session_start();
include_once('../../../head.php');

    session_unset();
    session_destroy();
    echo "<script type='text/javascript'>";
    echo "location.href='../step1.php'";
    echo "</script>";

?>
