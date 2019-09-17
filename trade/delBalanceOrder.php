<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";


$uid=$_COOKIE['bidcms_id'];
if(!empty($_GET['order_id']) && $uid>0)
{
	$orderid=trim(strip_tags($_GET['order_id']));
	//判断余额
	$check=mysql_fetch_assoc(mysql_query("select id,status,balance,coinname from bidcms_balance_log where orderid='".$orderid."' and uid=".$uid));
	if($check['id']>0 && $check['status']==0)
	{
		$balance=floatval(abs($check['balance']));
		$coinname=$check['coinname'];
		mysql_query("delete from bidcms_balance_log where id=".$check['id']) or die(mysql_error());
		if(mysql_affected_rows())
		{
			//冻结
			mysql_query("update bidcms_balance set balance=balance+".$balance.",balance_lock=balance_lock-".$balance." where uid=".$uid." and coinname='".$coinname."'") or die(mysql_error());
			exit('succ');
		}
	}
}
}