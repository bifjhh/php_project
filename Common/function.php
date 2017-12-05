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
    setTimeout('window.history.go(-1);',3000);
    </script>
eof;
    echo $back;
    exit();    
}
/**
 * 跳转函数
 * @param string $msg 提示信息
 * @param string $url 跳转地址
 * @param integer $time 延迟时间
 * @return [type]   [description]
 */

 function jump($msg,$url,$time = 1){
    //  设置跳转地址
     $url = "http://www.blog.com/".$url;
    //  跳转提示功能
    header("Refresh:{$time};url='{$url}'");
    echo $msg . "系统将在{$time}秒之后自动跳转到{$url}!";
    // 
    exit();
 }
?>