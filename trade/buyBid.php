<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	exit('timeout');
	/*include "../inc/common.mini.php";
	$uid=intval($_COOKIE['bidcms_id']);
	
	if($uid<1)
	{
		exit('wrongmd5');
	}
	if(in_array($uid,$limit_uid))
	{
		exit('zombie');
	}
	//判断用户是否已经回购了
	$check=mysql_fetch_assoc(mysql_query("select id,status from bidcms_bid_reserve where uid=".$uid));
	if($check['id']>0 && $check['status']==0)
	{
		//判断用户必得
		$balance=mysql_fetch_assoc(mysql_query("select balance from bidcms_balance where uid=".$uid." and coinname='bid'"));
		if($balance['balance']>0)
		{
			$amount=$balance['balance']>=500?500:$balance['balance'];
			$cny=$amount*0.1;
			mysql_query("update bidcms_balance set balance=balance-".$amount." where uid=".$uid." and coinname='bid'");
			//付款
			mysql_query("update bidcms_balance set balance=balance+".$cny." where uid=".$uid." and coinname='cny'");
			mysql_query("update bidcms_bid_reserve set status=1 where id=".$check['id']);
			exit('succ');
		}
	}
	exit('error');*/
}