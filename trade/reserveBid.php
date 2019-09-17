<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=intval($_COOKIE['bidcms_id']);
	if(time()>1396843200)
	{
		exit('timeout');
	}
	if($uid<1)
	{
		exit('wrongmd5');
	}
	if(in_array($uid,$limit_uid))
	{
		exit('zombie');
	}
	$reserve_bid=500;
	$reserve_price=0.1;
	//判断用户是否已经认购了
	$check=mysql_fetch_assoc(mysql_query("select id from bidcms_bid_reserve where uid=".$uid));
	if($check['id']<1)
	{
		
		//判断用户资金
		$balance=mysql_fetch_assoc(mysql_query("select balance from bidcms_balance where uid=".$uid." and coinname='cny'"));
		$total=$reserve_bid*$reserve_price;
		if($balance['balance']>=$total)
		{
			mysql_query("insert into bidcms_bid_reserve(uid,balance,reserve,updatetime) values(".$uid.",".$reserve_bid.",1,".time().")");
			//扣款
			mysql_query("update bidcms_balance set balance=balance-".$total." where uid=".$uid." and coinname='cny'");
			//付必得币
			$userbid=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where uid=".$uid." and coinname='bid'"));
			if($userbid['id']>0)
			{
				mysql_query("update bidcms_balance set balance=balance+".$reserve_bid." where uid=".$uid." and coinname='bid'");
			}
			else
			{
				mysql_query("insert into bidcms_balance(balance,coinname,uid,updatetime) values(".$reserve_bid.",'bid',".$uid.",".time().")");
			}
			//奖励
			$friend=mysql_fetch_assoc(mysql_query("select frienduid from bidcms_user where uid=".$uid));
			if($friend['frienduid'])
			{
				mysql_query("insert into bidcms_bid_balance(balance,status,response,updatetime,uid) values(10,0,'推荐人成功认购奖励',".time().",".$friend['frienduid'].")");
			}
			exit('succ');
		}
		else
		{
			exit('balance');
		}
	}
	exit('error');
}