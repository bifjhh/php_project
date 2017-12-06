<?php

/**
 * 删除相册功能
 */
header("content-type:text/html;charset=utf-8");
include_once '../Common/function.php';
include_once '../Common/mysql.php';
checkLogin();
initDb();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id <= 0) {
    back('参数错误');
}
// 根据主键ID查找图片信息，获取图片地址去服务器上删除源图片
$sql = "SELECT * FROM pics WHERE id = {$id} LIMIT 1";
$pic = find($sql);
// 删除原图
unlink('../Public/Upload/'.$pic['pic_url']);

// 删除数据库中的对应记录
$sql = "DELETE FROM pics WHERE id = {$id}";
$res = mysql_query($sql);
if($res){
    jump('图片删除成功','Admin/picList.php',3);
}else {
    jump('图片删除失败', 'Admin/picList.php', 3);
}
?>