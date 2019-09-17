<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";
$uid=$_COOKIE['bidcms_id'];
$coins=array_keys($coins);
$coins[]='CNY';
if(!empty($_GET['coinname']) &&  in_array(strtoupper($_GET['coinname']),array_keys($coins)))
{
	$coinname=strtolower($_GET['coinname']);
	$balance=floatval($_GET['balance']);
	if($uid>0 && $balance>0)
	{
		$min=$minbalance[$coinname]>0?$minbalance[$coinname]:1;
		if($coinname=='cny')
		{
			if($balance<2 || $balance>50000)
			{
				exit('sendWrong');
			}
		}
		elseif($balance>10000000)
		{
			exit('bemax');
		}
		elseif($balance<$min)
		{
			exit('sendWrong');
		}
		$oid=substr(md5(microtime()),rand(5,20),8);
		//判断余额
		$check=mysql_fetch_assoc(mysql_query("select balance,id,addr from bidcms_balance where coinname='".$coinname."' and uid=".$uid));
		
		
		if($check['id']>0 && !empty($check['addr']))
		{
			if($check['balance']<$balance)
			{
				exit('sendWrong');
			}
			if($setting['balance_needcode']==1)
			{
				if(!empty($_GET['vCode']))
				{
					$checkcode=mysql_fetch_assoc(mysql_query("select id,errors,type,code,updatetime from bidcms_checkcode where uid=".$uid." and type='draw' order by id desc"));
					if($checkcode['id']>0 && $_GET['vCode']==$checkcode['code'] && $checkcode['updatetime']>=time()-300)
					{
						mysql_query("insert into bidcms_balance_log(orderid,ordertype,balance,coinname,updatetime,uid,addr,status) values('".$oid."',1,".$balance.",'".$coinname."',".time().",".$uid.",'".$check['addr']."',2)") or die(mysql_error());
						//冻结
						mysql_query("update bidcms_balance set balance=balance-".$balance.",balance_send=balance_send+".$balance." where uid=".$uid." and coinname='".$coinname."'") or die(mysql_error());
						exit($coinname.'_succ');
					}
					else
					{
						exit('wrong_vCode-'.$coinname.'-'.$balance);
					}
				}
				else
				{
					$code=setCode('draw');
					if(!empty($code))
					{
						exit('code_sent-'.$coinname.'-'.$balance.'-'.$code);
					}
					else
					{
						exit('bind_telphone');
					}
				}
			}
			else
			{
				mysql_query("insert into bidcms_balance_log(orderid,ordertype,balance,coinname,updatetime,uid,addr,status) values('".$oid."',1,".$balance.",'".$coinname."',".time().",".$uid.",'".$check['addr']."',2)") or die(mysql_error());
				//冻结
				mysql_query("update bidcms_balance set balance=balance-".$balance.",balance_send=balance_send+".$balance." where uid=".$uid." and coinname='".$coinname."'") or die(mysql_error());
				exit($coinname.'_succ');
			}
		}
		else
		{
			exit('sendWrong');
		}
	}
}
}
exit('sendWrong');
