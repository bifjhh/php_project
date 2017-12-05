<?php

/**
 * 后台管理新闻发布功能
 */
header("content-type:text/html;charset=utf8");
include_once '../Common/function.php';
include_once '../Common/mysql.php';
checkLogin();
initDb();

if (!empty($_POST)) {
    if (empty($_POST['title'])) {
        back('标题不能为空');
    }
    if (empty($_POST['content'])) {
        back('内容不能为空');
    }
    $title = trim($_POST['title']);//标题
    $content = trim($_POST['content']);//内容
    $user_id = $_SESSION['user_id'];//用户id
    $now = time();//时间戳
    $sql = "INSERT INTO news VALUES (null,{$user_id},'{$title}','{$content}','{$now}')";
   
    $res = mysql_query($sql);
    if ($res) {
        jump('发布成功', 'Admin/list.php', 3);
    } else {
        jump('发布失败', 'Admin/addNews.php', 3);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>发布新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>发布新闻</h2>
  <span>欢迎<b>admin</b>登录后台</span>
</div>
<div class="nav">
  <ul>
   <li><a href="index.html">后台首页</a></li>
   <li><a href="addNews.html">发布文章</a></li>
   <li><a href="list.html">文章列表</a></li>
   <li><a href="addNav.html">导航添加</a></li>
   <li><a href="nav.html">导航列表</a></li>
   <li><a href="addPics.html">上传图片</a></li>
   <li><a href="picList.html">相册列表</a></li>
   <li><a href="logout.html">退出后台</a></li>
 </ul>
</div>
<div class="main">
  <form class="form" action="" method="post">
    <label for="txtname">标题：</label>
    <input type="text"  name="title" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"></textarea><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="发布" />
    </div>
  </form>
</div>
</body>
</html>