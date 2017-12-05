<?php
/**
 * 删除新闻功能
 */

 header("content-type:text/html;charset=utf-8");
 include_once '../Common/function.php';
 include_once '../Common/mysql.php';
 checkLogin();
 initDb();
 $new_id = isset($_GET['news_id'])? $_GET['news_id']:0;
 if(empty($new_id)){
     back('参数错误');
 }
$sql = "DELETE FROM news WHERE news_id = {$new_id} AND user_id = {$_SESSION['user_id']}";
$res = mysql_query($sql);
if($res!==false){
    jump('删除成功','Admin/list.php',3);
}else {
    jump('删除失败', 'Admin/list.php', 3);
}
?>