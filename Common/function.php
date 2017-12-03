<?php
/**
 * auth:chenxqq
 * @param $msg 提示信息
 * desc:返回上一步
 */

function back($msg){
    echo $msg;
    $back = <<<eof
    <script type="text/javascript">
    setTimeout('window.history.go(-1);',1000);
    </script>
eof;
    echo $back;
    exit();    
}
$sql = "SELECT * FROM user where username = '{$_POST['username']}'";
$query = mysql_query($sql);
$result = mysql_fetch_array($query,MYSQL_ASSOC);
if(!empty($result)){
    back('当前用户名'.$_POST['username'].'已经存在，请更换用户名');
}
?>