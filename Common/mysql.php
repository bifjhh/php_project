<?php

/**
 * 数据库相关的自定义函数
 */

function initDb()
{
	 // 连接数据库
	$link = @mysql_connect('localhost', 'root', '123456') or die('数据库连接失败');
	 // 选择数据库
	mysql_select_db('blog', $link);
	 // 设置编码
	mysql_query("set names utf8");
}

/**
 * 查询多条数据
 * @param  string $sql SQL语句
 * @return array  查询到的结果集
 */
function findAll($sql)
{
	if (empty($sql)) return false;
	$result = mysql_query($sql);
	if (is_resource($result)) {
		$rows= array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$rows[] = $row;
		}
		return $rows;
	} else {
		return false;
	}
}


?>