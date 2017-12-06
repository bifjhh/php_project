<?php

/**
 * 图片上传功能代码
 */
header("content-type:text/html;charset=utf-8");
include_once '../Common/function.php';
include_once '../Common/mysql.php';
checkLogin();
initDb();
if (!empty($_FILES)) {
    if ($_FILES['pic']['error'] == 0) {
        // error 为 0 表示图片上传没有错误
        $ext = strrchr($_FILES['pic']['name'], '.');// 获取图片的后缀名
        // 随机生成新的文件名-时间戳+四位随机数+文件后缀名
        $newPicName = time() . mt_rand(1000, 9999) . $ext;
        $res = move_uploaded_file($_FILES['pic']['tmp_name'], '../Public/Upload/' . $newPicName);
        if ($res) {
            // 将图片地址存入到数据库
            $now = time();
            $sql = "INSERT INTO pics VALUES (nUll,'{$newPicName}',{$now})";
            mysql_query($sql);
            
            jump('上传成功', 'Admin/picList.php', 3);
        } else {
            back('上传失败');
        }
    }
    
    // echo '<pre>';
    // var_dump($_FILES);
    // echo '</pre>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>图片上传</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
 <h2>图片上传页</h2>
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
  <form class="form" action="" method="post" enctype="multipart/form-data">
    <label for="txtname">选择图片：</label>
    <input type="file" multiple name="pic"><br>
    <div class="btn"><input type="submit"></div>
  </form>
</div>
</body>
</html>