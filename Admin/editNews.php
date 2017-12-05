<?php

/**
 * 编辑新闻
 */
header("content-type:text/html;charset=utf-8");
require_once '../Common/function.php';
include_once '../Common/mysql.php';
initDb();
checkLogin();
if (!empty($_POST)) {
    // 验证数据的合法性
    if(empty($_POST['news_id'])){
        back('参数错误');
    }
    if(empty($_POST['title'])){
        back('标题不能为空');
    }
    if(empty($_POST['content'])){
        back('内容不能为空');
    }

$sql = "UPDATE news set title = '{$_POST['title']}', content = '{$_POST['content']}' WHERE news_id = {$_POST['news_id']}";

$res = mysql_query($sql);
if($res!==false){
    jump('修改成功','Admin/list.php',3);
} else {
    jump('修改失败','Admin/editNews.php?news_id='.$_POST['news_id'],3);
}

} else {
    $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : 0;
    if (empty($news_id)) {
        back('参数错误');
    }
// 根据当前的新闻id查找新闻详情
    $sql = "SELECT * FROM news WHERE news_id = {$news_id} AND user_id = {$_SESSION['user_id']}";
    $query = mysql_query($sql);
    $info = find($sql);
}




// echo '<pre>';
// var_dump($info);
// echo '</pre>';
// exit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改新闻</h2>
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
    <input type="hidden" name="news_id" value="<?php echo $news_id ?>">
    <label for="txtname">标题：</label>
    <input type="text" name="title" value="<?php echo $info['title'];?>" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"><?php echo $info['content']?></textarea><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="修改" />
    </div>
  </form>
</div>
</body>
</html>