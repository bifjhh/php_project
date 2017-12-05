<?php

/**
 * 后台首页功能代码
 */
// 表头代码
header("content-type:text/html;charset=utf8");

require_once '../Common/function.php';
include_once '../Common/mysql.php';
initDb();
@session_start();//开启本地存储

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="../Public/css/basic.css" />
  <link rel="stylesheet" href="../Public/css/Admin-index.css">
</head>
<body>
<div class="top">
  <h2>后台首页</h2>
  <span>欢迎<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '';?>登录后台</span>
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
   <li><a href="logout.php" onclick="if(!confirm('确定退出登录吗？')){return false}">退出后台</a></li>
  </ul>
</div>
<div class="banner"><img src="../Public/img/index_banner.jpg" height="900" width="1440" alt=""></div>
<div class="info"><p>本站共有文章<b>3</b>篇，注册会员<b>5</b>人</p></div>
</body>
</html>