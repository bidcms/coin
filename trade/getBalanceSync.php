<?php 
error_reporting(0);
set_time_limit(10);
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	if($uid>0 && !empty($_GET['coinname']) && in_array(strtoupper($_GET['coinname']),array_keys($coins)))
	{
		$coinname=strtolower($_GET['coinname']);
		include "../inc/wallet/".$coinname."/client.php";
		$client=new client();
		$trans=$client->transactions($uid,1,0);
		//得到最后一条记录
		$checkinfo=$trans[0];
		if(!empty($checkinfo['address']))
		{
			exit("您的最后一条充值记录为\n数量：".$checkinfo['amount']."\n地址：".$checkinfo['address']."\n时间：".date('Y-m-d H:i:s',$checkinfo['time'])."\n确认数：".$checkinfo['confirmations']."\n系统同步需要时间请耐心等待。");
		}
	}
}
