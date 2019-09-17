<?php 
error_reporting(0);
include "../inc/common.mini.php";
require_once("config.php");

function qq_callback()
{
	$state=$GLOBALS['session']->get("state");
    if($_REQUEST['state'] == $state) //csrf
    {
        $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
            . "client_id=" . $GLOBALS['session']->get("appid"). "&redirect_uri=" . urlencode($GLOBALS['session']->get("callback"))
            . "&client_secret=" . $GLOBALS['session']->get("appkey"). "&code=" . $_REQUEST["code"];

        $response = file_get_contents($token_url);
        if (strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response  = substr($response, $lpos + 1, $rpos - $lpos -1);
            $msg = json_decode($response);
            if (isset($msg->error))
            {
                echo "<h3>error:</h3>" . $msg->error;
                echo "<h3>msg  :</h3>" . $msg->error_description;
                exit;
            }
        }

        $params = array();
        parse_str($response, $params);

        //debug
        //print_r($params);

        //set access token to session
        $GLOBALS['session']->set("access_token",$params["access_token"]);
		$GLOBALS['session']->set("refresh_token",$params["refresh_token"]);
		$GLOBALS['session']->set("expires_in",$params["expires_in"]);

    }
    else 
    {
        echo("The state does not match. You may be a victim of CSRF.");
    }
}

function get_openid()
{
    $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=".$GLOBALS['session']->get('access_token');

    $str  = file_get_contents($graph_url);
    if (strpos($str, "callback") !== false)
    {
        $lpos = strpos($str, "(");
        $rpos = strrpos($str, ")");
        $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
    }

    $user = json_decode($str);
    if (isset($user->error))
    {
        echo "<h3>error:</h3>" . $user->error;
        echo "<h3>msg  :</h3>" . $user->error_description;
        exit;
    }

    //debug
    //echo("Hello " . $user->openid);

    //set openid to session
    $GLOBALS['session']->set("openid",$user->openid);
}
function getuserinfo()
{
	$url='https://graph.qq.com/user/get_user_info?access_token='.$GLOBALS['session']->get("access_token").'&oauth_consumer_key='.$GLOBALS['session']->get("appid").'&openid='.$GLOBALS['session']->get("openid");
	$info=file_get_contents($url);
	return json_decode($info,true);
}

//QQ登录成功后的回调地址,主要保存access token
qq_callback();
//获取用户标示id
get_openid();
$userinfo=getuserinfo();
$access_token=$GLOBALS['session']->get("access_token");
$openid=$GLOBALS['session']->get("openid");
$fid=intval($GLOBALS['session']->get("bidcms_fuid"));
if(!empty($access_token) && !empty($openid))
{
	$access=mysql_fetch_assoc(mysql_query("select uid,id from bidcms_user_plus where access_token='".$access_token."' and site='qq'"));
	if($access['id']<1)
	{
		$access=mysql_fetch_assoc(mysql_query("select uid,id from bidcms_user_plus where openid='".$openid."' and site='qq'"));
	}
	if($access['id']>0 && $access['uid']>0)
	{
		$user=mysql_fetch_assoc(mysql_query("select uid,username,pwd,avatar,telphone,credentials,trade_pwd from bidcms_user where uid=".$access['uid']));
		if($user['uid']>0)
		{
			setcookie('bidcms_id',$user['uid'],time()+86400,'/');
			setcookie('bidcms_nickname',$user['username'],time()+86400,'/');
			setcookie('bidcms_md5',$user['pwd'],time()+86400,'/');
			setcookie('bidcms_figureURL',$user['avatar'],time()+86400,'/');
			setcookie('bidcms_tel',$user['telphone'],time()+86400,'/');
			setcookie('bidcms_credentials',$user['credentials'],time()+86400,'/');
			setcookie('bidcms_trade_pwd',!empty($user['trade_pwd'])?'1':'0',time()+86400,'/');
			$insertid=$user['uid'];
		}
		else
		{
			mysql_query("insert into bidcms_user(username,pwd,avatar,updatetime,frienduid) values('".$userinfo['nickname']."','".md5(microtime())."','".$userinfo['figureurl_qq_2']."',".time().",".$fid.")");
			$insertid=mysql_insert_id();
			mysql_query("insert into bidcms_balance(uid,coinname,balance) values(".$insertid.",'bid',1)");
			mysql_query("update bidcms_balance set balance=balance+1000 where uid=1 and coinname='bid'");
		}
		mysql_query("update bidcms_user_plus set uid=".$insertid.",access_token='".$access_token."',openid='".$openid."' where id=".$access['id']);
	}
	else
	{
		mysql_query("insert into bidcms_user(username,pwd,avatar,updatetime,frienduid) values('".$userinfo['nickname']."','".md5(microtime())."','".$userinfo['figureurl_qq_2']."',".time().",".$fid.")") or die(mysql_error());
		$insertid=mysql_insert_id();
		mysql_query("insert into bidcms_balance(uid,coinname,balance) values(".$insertid.",'bid',1)");
		mysql_query("insert into bidcms_user_plus(uid,site,access_token,expires_in,refresh_token,openid) values(".$insertid.",'qq','".$access_token."','".$GLOBALS['session']->get("expires_in")."','".$GLOBALS['session']->get("refresh_token")."','".$openid."')") or die(mysql_error());
	}
}
header("location:http://www.im61.com/index.php");
?>
