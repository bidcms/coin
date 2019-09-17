<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=intval($_COOKIE['bidcms_id']);
	if($uid<1)
	{
		exit('wrongmd5');
	}
	//判断用户是否已经认购了
	$check=mysql_fetch_assoc(mysql_query("select * from bidcms_bid_reserve where uid=".$uid));
	if($check['id']>0)
	{
		echo '{"id":"'.$check['id'].'","balance":"'.$check['balance'].'","updatetime":"'.date('Y-m-d H:i:s',$check['updatetime']).'","status":"'.$check['status'].'"}';
		exit;
	}
	exit('wrongmd5');
}