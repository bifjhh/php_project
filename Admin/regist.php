<?php

/**
 * 后台注册功能模板
 */
header("content-type:text/html;charset=utf8");
include_once '../Common/function.php';
include_once '../Common/mysql.php';
initDb();
// 判断用户输入的合法性
if (!empty($_POST)) {
  if (empty($_POST['username'])) back('用户名密码不能为空');
  if (empty($_POST['password'])) back('密码不能为空');
  if (empty($_POST['password1'])) back('确认密码不能为空');
  if ($_POST['password'] !== $_POST['password1']) back('两次密码不一致');
  if (empty($_POST['mobile'])) back('手机号不能为空');

// 判断数据的合理性 验证用户名是否重复 
  $sql = "SELECT * FROM user WHERE username = '{$_POST['username']}' LIMIT 1";
  $query = mysql_query($sql);
  $result = mysql_fetch_array($query, MYSQLI_ASSOC);
  if (!empty($result)) {
    back('当前用户名' . $_POST['username'] . '已经存在，请更换用户名');
  }
  // 组合数据，将用户信息写入数据库
  $_POST['password'] = md5($_POST['password']);
  // 返回当前时间的 Unix 时间戳，并格式化为日期：
  $now = time();
  $sql = "INSERT INTO user VALUES (null,'{$_POST['username']}','{$_POST['password']}','{$_POST['email']}','{$_POST['mobile']}',{$now})";

// 将组合好的数据指令发送到mysql数据库
  $result = mysql_query($sql);

  if ($result) {
    jump('注册成功', 'Admin',3);
  } else {
    jump('注册失败', 'Admin/regist.php', 3);
  }
//  echo '<pre>';
//     var_dump($user);
//     echo '</pre>';
//     exit();

}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台注册页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
  <div class="top"><h2>注册页面</h2></div>
  <div class="main">
    <form class="form" action="" method="post">
      <label for="txtname">用&ensp;户&ensp;名：</label>
      <input type="text" name="username" /><br>
      <label for="txtpswd">密&#12288;&#12288;码：</label>
      <input type="password" name="password" /><br>
      <label for="txtpswd">确认密码：</label>
      <input type="password" name="password1" /><br>  
      <label for="txtpswd">邮&#12288;&#12288;箱：</label>
      <input type="text" name="email" /><br>
      <label for="txtpswd">手&ensp;机&ensp;号：</label>
      <input type="text" name="mobile" /><br>
      <div class="btn">
        <input type="reset" />
        <input type="submit" value="注册" />
        <a href="login.html">已有账号？点击登录</a>
      </div>
    </form>
  </div>
</body>
</html>