<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";
$uid=$_COOKIE['bidcms_id'];
$coins['CNY']='人民币';
if(!empty($_GET['coinname']) && in_array(strtoupper($_GET['coinname']),array_keys($coins)))
{
	//判断钱包地址
	$rows=mysql_fetch_assoc(mysql_query("select id,getaddr,addr,balance from bidcms_balance where uid=".$uid." and coinname='".strtolower($_GET['coinname'])."'"));
	if($rows['id']>0)
	{
		
		if(!empty($rows['getaddr']))
		{
			echo 'addr'.$rows['getaddr'];
			exit;
		}
		else
		{
			$newaddr=substr(md5(microtime()),rand(0,10),5).$uid;
			mysql_query("update bidcms_balance set getaddr='".$newaddr."' where id=".$rows['id']);
			echo 'addr'.$newaddr;
			exit;
		}
	}
	else
	{
		$newaddr=substr(md5(microtime()),rand(0,10),5).$uid;
		mysql_query("insert into bidcms_balance(getaddr,coinname,uid) values('".$newaddr."','".strtolower($_GET['coinname'])."',".$uid.")");
		echo 'addr'.$newaddr;
		exit;
	}
}
}