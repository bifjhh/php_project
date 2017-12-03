<?php
/**
 * 数据库相关的自定义函数
 */

 function initDb(){
	 // 连接数据库
	 $link = @mysql_connect('localhost','root','123456') or die('数据库连接失败');
	 // 选择数据库
	 mysql_select_db('blog',$link);
	 // 设置编码
	 mysql_query("set names utf8");
 }
?>