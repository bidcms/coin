<?php 

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";
$coins['BID']='必得币';
$uid=intval($_COOKIE['bidcms_id']);

if($uid<1)
{
	exit('wrongmd5');
}
if(in_array($uid,$limit_uid))
{
	exit('zombie');
}

if(!empty($_GET['coinname']) && $_GET['coinname']!=$_GET['exchange_coins'] && in_array(strtoupper($_GET['coinname']),array_keys($coins)) && in_array(strtoupper($_GET['exchange_coins']),array_keys($exchange_coins)))
{
	$coinname=strtolower($_GET['coinname']);
	$exchange_coin=strtolower($_GET['exchange_coins']);
	$type=intval($_GET['type']>0?$_GET['type']:1);
	$price=round($_GET['price'],9);
	$amount=round($_GET['amount'],4)-0.0001;
	if($price>0 && $amount>0 && $uid>0)
	{
		if($type==1) //买入
		{
			//判断用户余额
			$balance=mysql_fetch_assoc(mysql_query("select balance,id from bidcms_balance where coinname='".$exchange_coin."' and uid=".$uid));
			$min=floatval($mintrade[$exchange_coin]>0?$mintrade[$exchange_coin]:1);
			$total=abs(round($price*$amount,6));
			if($total<$min)
			{
				exit('交易金额不能小于'.$min);
			}
			if($balance['balance']>=$total)
			{
				$utype=in_array($uid,array(1,39))?1:0;
				//开始挂单
				mysql_query("insert into bidcms_trade(coinname,exchange_coin,tradetype,amount,price,updatetime,uid,usertype) values('".$coinname."','".$exchange_coin."',".$type.",".$amount.",".$price.",".time().",".$uid.",".$utype.")");
				$insertid=mysql_insert_id();
				if($insertid>0)
				{
					//冻结
					mysql_query("update bidcms_balance set balance=balance-".$total.",balance_lock=balance_lock+".$total." where id=".$balance['id']);
					$updateid=mysql_affected_rows();
					if($updateid>0)
					{
						exit('succ');
					}
				}
			}
			else
			{
				exit('资金不足');
			}
		}
		elseif($type==2) //卖出
		{
			$utype=in_array($uid,array(1,39))?1:0;
			//判断用户余额
			$balance=mysql_fetch_assoc(mysql_query("select balance,id from bidcms_balance where coinname='".$coinname."' and uid=".$uid));
			$min=round(floatval($mintrade[$coinname]>0?$mintrade[$coinname]:1),6);
			if($amount<$min)
			{
				exit('最小挂单数量为'.$min);
			}
			if($balance['balance']>=$amount)
			{
				//开始挂单
				mysql_query("insert into bidcms_trade(coinname,exchange_coin,tradetype,amount,price,updatetime,uid,usertype) values('".$coinname."','".$exchange_coin."',".$type.",".$amount.",".$price.",".time().",".$uid.",".$utype.")");
				$insertid=mysql_insert_id();
				if($insertid>0)
				{
					//冻结
					mysql_query("update bidcms_balance set balance=balance-".$amount.",balance_lock=balance_lock+".$amount." where id=".$balance['id']);
					$updateid=mysql_affected_rows();
					if($updateid>0)
					{
						exit('succ');
					}
				}
			}
			else
			{
				exit('资金不足');
			}
		}
	}
	else
	{
		exit('价格或数量必须大于0');
	}
	exit('system_busy');

}
}