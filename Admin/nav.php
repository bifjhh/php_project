<?php

/**
 * 导航列表功能代码
 */
header("content-type:text/html;charset=utf-8");
include_once '../Common/function.php';
include_once '../Common/mysql.php';
checkLogin();
initDb();
// 按照nav_order升序排列导航列表
$sql = "SELECT * FROM nav ORDER BY nav_order ASC";
$navs = findAll($sql);

// echo '<pre>';
// var_dump($navs);
// echo '</pre>';
// exit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>导航菜单项列表</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>导航菜单项列表</h2>
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
  <table cellspacing="0">
  <tr>
    <td><label for="txtname">ID</label></td>
    <td><label for="txtname">菜单名称</label></td>
    <td><label for="txtname">菜单url地址栏</label></td>
    <td><label for="txtname">排序</label></td>
    <td><label for="txtname">发布时间</label></td>
    <td><label for="txtname">操作</label></td>
  </tr>
<?php 
if (!empty($navs)) {
    foreach ($navs as $key => $nav) {
        ?>           
       
  <tr>
    <td><label for="txtname"><?php echo $nav['id']; ?></label></td>
    <td><label for="txtname"><?php echo $nav['nav_name']; ?></label></td>
    <td><label for="txtname"><?php echo $nav['nav_url']; ?></label></td>
    <td><label for="txtname"><?php echo $nav['nav_order']; ?></label></td>
    <td><label for="txtname"><?php echo $nav['update_time']; ?></label></td>
    <td><label for="txtname"><a href="editNav.php?id=<?php echo $nav['id']; ?>">修改</a> | <a href="delNav.php?id=<?php echo $nav['id']; ?>" onclick="if(!confirm('确定删除该新闻吗？')){return false;}">删除</a></label></td>
  </tr>
 <?php 

}
} else {

?>
    <tr>
    <td colspan="6"><label for="txtname">暂无数据</label></td>
  </tr>
  <?php 
}
?>
</table>
</div>
</body>
</html>