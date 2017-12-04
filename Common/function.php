<?php
/**
 * auth:chenxqq
 * @param $msg 提示信息
 * desc:返回上一步
 */
// 当用户输入的数据有误时告知用户并返回上一页
function back($msg){
    echo $msg;
    $back = <<<eof
    <script type="text/javascript">
    setTimeout('window.history.go(-1);',22000);
    </script>
eof;
    echo $back;
    exit();    
}

?>