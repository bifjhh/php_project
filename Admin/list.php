<?php

/**
 * 后台新闻列表功能
 */
header("content-type:text/html;charset=utf8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>新闻列表</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>新闻列表</h2>
  <span>欢迎<b>admin</b>登录后台</span>
</div>
<div class="nav">
  <ul>
   <li><a href="index.php">后台首页</a></li>
   <li><a href="addNews.php">发布文章</a></li>
   <li><a href="list.php">文章列表</a></li>
   <li><a href="addNav.php">导航添加</a></li>
   <li><a href="nav.php">导航列表</a></li>
   <li><a href="addPics.php">上传图片</a></li>
   <li><a href="picList.php">相册列表</a></li>
   <li><a href="logout.php">退出后台</a></li>
 </ul>
</div>
<div class="main">
  <table>
  <tr>
    <td><label for="txtname">ID</label></td>
    <td><label for="txtname">标&nbsp;&nbsp;&nbsp;题</label></td>
    <td><label for="txtname">内&nbsp;&nbsp;&nbsp;容</label></td>
    <td><label for="txtname">用户名</label></td>
    <td><label for="txtname">发布时间</label></td>
    <td><label for="txtname">操作</label></td>
  </tr>

  <tr>
    <td><label for="txtname">1</label></td>
    <td><label for="txtname">小米Max手机</label></td>
    <td><label for="txtname">小米，为发烧而生</label></td>
    <td><label for="txtname">admin</label></td>
    <td><label for="txtname">2017年7月19日15:49:38</label></td>
    <td><label for="txtname">&nbsp;<a href="detail.php?news_id=1">查看</a> | <a href="editNews.php?news_id=1">修改</a> | <a href="delNews.php?news_id=1" onclick="if(!confirm('确定删除该新闻吗？')){return false;}">删除</a></label></td>
  </tr>
  <tr>
    <td><label for="txtname">1</label></td>
    <td><label for="txtname">小米Max手机</label></td>
    <td><label for="txtname">小米，为发烧而生</label></td>
    <td><label for="txtname">admin</label></td>
    <td><label for="txtname">2017年7月19日15:49:38</label></td>
    <td><label for="txtname">&nbsp;<a href="detail.php?news_id=1">查看</a> | <a href="editNews.php?news_id=1">修改</a> | <a href="delNews.php?news_id=1" onclick="if(!confirm('确定删除该新闻吗？')){return false;}">删除</a></label></td>
  </tr>
  <tr>
    <td><label for="txtname">1</label></td>
    <td><label for="txtname">小米Max手机</label></td>
    <td><label for="txtname">小米，为发烧而生</label></td>
    <td><label for="txtname">admin</label></td>
    <td><label for="txtname">2017年7月19日15:49:38</label></td>
    <td><label for="txtname">&nbsp;<a href="detail.php?news_id=1">查看</a> | <a href="editNews.php?news_id=1">修改</a> | <a href="delNews.php?news_id=1" onclick="if(!confirm('确定删除该新闻吗？')){return false;}">删除</a></label></td>
  </tr>

  <!-- <tr>
    <td colspan="6"><label for="txtname">暂无新闻</label></td>
  </tr> -->
</table>
</div>
</body>
</html>