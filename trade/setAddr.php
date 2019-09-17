<?php
error_reporting(0);
set_time_limit(10);
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";
$uid=$_COOKIE['bidcms_id'];
$coins['CNY']='人民币';
if(!empty($_GET['coinname']) && in_array(strtoupper($_GET['coinname']),array_keys($coins)))
{
	$coinname=strtolower($_GET['coinname']);
	$exchange_coin=strtolower($_GET['exchange_coins']);
	$addr=trim(strip_tags($_GET['addr']));
	if($coinname!='cny')
	{
		//判断是否已经其它人使用
		$checks=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where addr='".$addr."' and coinname='".$coinname."'"));
		if($checks['id']>0)
		{
			exit('our_addr');
		}
		/*include "../inc/wallet/".$coinname."/client.php";
		$client=new client();
		$valid=$client->check($addr);
		//判断钱包是否正确
		if($valid['isvalid']!=true)
		{
			exit('invalid_addr');
		}*/
	}
	//判断钱包地址
	$rows=mysql_fetch_assoc(mysql_query("select id,getaddr,addr,balance from bidcms_balance where uid=".$uid." and coinname='".$coinname."'"));
	
	if($rows['id']>0)
	{
		if($setting['setaddr_needcode']==1)
		{
			$code=setCode('setaddr');
			if(!empty($code))
			{
				exit('code_sent-'.$code);
			}
			else
			{
				exit('bind_telphone');
			}
		}
		else
		{
			mysql_query("update bidcms_balance set addr='".$addr."' where coinname='".$coinname."' and uid=".$uid);
			exit('succ');
		}
	}
	else
	{
		if($setting['setaddr_needcode']==1)
		{
			$code=setCode('setaddr');
			if(!empty($code))
			{ 
				exit('code_sent-'.$code);
			}
		}
		else
		{
			mysql_query("insert into bidcms_balance(addr,coinname,uid) values('".$addr."','".$coinname."',".$uid.")");
			exit('succ');
		}
	}
}
}
