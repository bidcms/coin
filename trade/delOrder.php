<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";


$id=intval($_GET['order_id']);
$uid=intval($_COOKIE['bidcms_id']);
if($id>0 && $uid>0)
{
	$rows=mysql_fetch_assoc(mysql_query("select id,tradetype,price,amount,success,coinname,exchange_coin from bidcms_trade where id=".$id." and uid=".$uid));
	$exchange=in_array(strtoupper($rows['exchange_coin']),array_keys($exchange_coins))?$rows['exchange_coin']:'cny';
	if($rows['id']>0)
	{
		mysql_query("delete from bidcms_trade where id=".$rows['id']);
		$updateid=mysql_affected_rows();
		if($updateid>0)
		{
			//撤单退款
			if($rows['tradetype']==1)
			{
				$rs=mysql_fetch_assoc(mysql_query("select * from bidcms_balance  where coinname='".$exchange."' and uid=".$uid));
				$money=round($rows['price']*$rows['amount'],6);
				if($money>0)
				{
					$money=$rs['balance_lock']<$money?$rs['balance_lock']:$money;
					mysql_query("update bidcms_balance set balance=balance+".$money.",balance_lock=balance_lock-".$money." where id=".$rs['id']);
				}
			}
			elseif($rows['tradetype']==2)
			{
				$rs=mysql_fetch_assoc(mysql_query("select * from bidcms_balance  where coinname='".$rows['coinname']."' and uid=".$uid));
				$amount=$rs['balance_lock']<$rows['amount']?$rs['balance_lock']:$rows['amount'];
				mysql_query("update bidcms_balance set balance=balance+".$amount.",balance_lock=balance_lock-".$amount." where id=".$rs['id']);
			}
			exit('succ');
		}
	}
	exit('撤单失败');
}
else
{
	exit('参数为空');
}
}