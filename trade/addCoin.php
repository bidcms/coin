<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$coin_name=strtolower(trim($_GET['name']));
	$coin_cn=strip_tags(trim($_GET['ccn']));
	$coin_country=strip_tags(trim($_GET['country']));
	$coin_time=strip_tags(trim($_GET['updtime']));
	$coin_desc=strip_tags(trim($_GET['cdesc']));
	if(empty($coin_name))
	{
		echo '币名不能为空';
		exit;
	}
	if(empty($coin_cn))
	{
		echo '中文名不能为空';
		exit;
	}
	if($uid<1)
	{
		echo '请登录后参与投票';
		exit;
	}
	$check=mysql_fetch_assoc(mysql_query("select id from bidcms_vote_bak where coin_name='".$coin_name."'"));
	if($check['id']<1)
	{
		mysql_query("insert into bidcms_vote_bak(coin_name,coin_cn,coin_country,coin_time,coin_desc) values('".$coin_name."','".$coin_cn."','".$coin_country."','".$coin_time."','".$coin_desc."')");
		echo 'succ';
		exit;
	}
	echo '已经提交过了';
	exit;

}
exit('错误的请求');
