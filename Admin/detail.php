<?php

/**
 * 新闻详情页
 */
header("content-type:text/html;charset=utf-8");
require_once '../Common/function.php';
include_once '../Common/mysql.php';
initDb();
checkLogin();
$news_id=isset($_GET['news_id'])? $_GET['news_id']:0;
// 根据用户id和新闻id查看新闻详情
$sql = "SELECT * FROM news WHERE news_id = {$news_id} AND user_id = {$_SESSION['user_id']}";
$query = mysql_query($sql);
$info = mysql_fetch_array($query,MYSQL_ASSOC);

// echo '<pre>';
// var_dump($info);
// echo '</pre>';
// exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>新闻详情</title>
 <link rel="stylesheet" href="../Public/css/basic.css" />
 <link rel="stylesheet" href="../Public/css/Admin-detail.css" />
</head>
<body>
<div class="top"><h2>文章列表页面</h2></div>
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
  <h3><?php echo $info['title'] ?></h3>
  <p><font size="2">发布时间：<?php echo date('Y-m-d H:i:s', $info['addtime']); ?></font></p>
  <hr width="100%" align="left" />
  <div class="con">
    <p><?php echo $info['content'] ?></p>
  </div>
</div>
</body>
</html>