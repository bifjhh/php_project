<?php 
/**
 * 图片列表
 */
header("content-type:text/html;charset=utf-8");
include_once '../Common/function.php';
include_once '../Common/mysql.php';
checkLogin();
initDb();
// 查询全部的图片
$sql = "SELECT * FROM pics";
$pics = findAll($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>相册列表</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
 <link rel="stylesheet" href="../Public/css/Admin-picList.css">
</head>
<body>
  <div class="top">
    <h2>相册列表</h2>
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
  <div class="pic">
    <ul>
    <?php
    if (!empty($pics)) {
      foreach ($pics as $key => $value) {

        ?>
        <li><img src="/Public/Upload/<?php echo $value['pic_url']; ?>"><a href="delPic.php?id=<?php echo $value['id']; ?>" onclick="if(!confirm('确定删除该图片吗，删除之后不可恢复！')) {return false;}" title="点击删除该图片">X</a></li>
       <?php

    }

  } else { ?>
         <p>暂无相关照片，请选择图片上传</p> 
  <?php 
} ?>  
      
      
     
    </ul>
  </div>
</body>
<script src="../Public/js/Admin-effect.js"></script>
</html>