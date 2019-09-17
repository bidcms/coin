<?php
/**
 * PHP SDK for QQ登录 OpenAPI(based on OAuth2.0)
 *
 * @version 1.0
 * @author connect@qq.com
 * @copyright © 2011, Tencent Corporation. All rights reserved.
 */

/**
 * @brief 本文件作为demo的配置文件。
 */

/**
 * 正式运营环境请关闭错误信息
 * ini_set("error_reporting", E_ALL);
 * ini_set("display_errors", TRUE);
 * QQDEBUG = true  开启错误提示
 * QQDEBUG = false 禁止错误提示
 * 默认禁止错误信息
 */
define("QQDEBUG", true);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", TRUE);
}


/**
 * 在你运行本demo之前请到 http://connect.opensns.qq.com/申请appid, appkey, 并注册callback地址
 */
//申请到的appid
$session->set("appid",'212067'); 

//申请到的appkey
$session->set("appkey","a187e9e5329c5032c7812e622bf55183"); 

//QQ登录成功后跳转的地址,请确保地址真实可用，否则会导致登录失败。
$session->set("callback","http://www.im61.com/oauth/callback.php"); 

//QQ授权api接口.按需调用
$session->set("scope","get_user_info,add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo");

?>
