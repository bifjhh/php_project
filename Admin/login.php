<?php

/**
 * 后台登录功能
 */
header("content-type:text/html;charset=utf8");
include_once '../Common/mysql.php';
include_once '../Common/function.php';
initDb();
if (!empty($_POST)) {
  // 判断用户输入的合法性
  if (empty($_POST['username'])) back('用户名不能为空');

  if (empty($_POST['password'])) back('密码不能为空');
// 根据用户名查询用户信息
  $sql = "SELECT * FROM user WHERE username = '{$_POST['username']}'";
  $query = mysql_query($sql);
  $info = mysql_fetch_array($query, MYSQL_ASSOC);
  if (!empty($info)) {
  // 查询到用户 需要校验密码
    if (md5($_POST['password']) !== $info['password']) {
      back('密码错误');
    };
  // 密码匹配成功 则 将用户信息持久化
    @session_start();//开启本地存储
    $_SESSION['username'] = $info['username'];
    $_SESSION['user_id'] = $info['user_id'];
    jump('登录成功', 'Admin', 3);
  } else {
    back('用户名不存在');
  }
  // echo '<pre>';
  // var_dump($_POST);
  // echo '</pre>';
  // exit();
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台登录页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
    <div class="top"><h2>后台登录</h2></div>
    <div class="main">
      <form class="form" action="" method="post">
        <label for="txtname">账号：</label>
        <input type="text"  name="username" value="" /><br>
        <label for="txtpswd">密码：</label>
        <input type="password"  name="password" /><br>
        <div class="btn">
          <input type="reset" />
          <input type="submit" value="登录" />
          <a href="regist.php">没有账号？点击注册</a>
        </div>
      </form>
    </div>
 </body>
 </html>