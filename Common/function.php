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
?>