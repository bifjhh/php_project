<?php
/**
 * 退出登录
 */
header("content-type:text/html;charset=utf8");
include_once '../Common/mysql.php';
include_once '../Common/function.php';
initDb();
@session_start();
$_SESSION = array();
jump('退出成功','Admin/login.php',3);
?>