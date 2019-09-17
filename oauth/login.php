<?php
include "../inc/common.mini.php";
require_once("config.php");


function qq_login($appid, $scope, $callback)
{
	global $session;
    $session->set('state', md5(uniqid(rand(), TRUE))); //CSRF protection
    $login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=" 
        . $appid . "&redirect_uri=" . urlencode($callback)
        . "&state=" . $session->get('state')
        . "&scope=".$scope;
    header("Location:$login_url");
}
//用户点击qq登录按钮调用此函数
qq_login($session->get("appid"), $session->get("scope"), $session->get("callback"));
?>
