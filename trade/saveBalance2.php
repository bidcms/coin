<?php 
error_reporting(0);
set_time_limit(5);
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";

$uid=$_COOKIE['bidcms_id'];
if(!empty($_GET['coinname']) && in_array(strtoupper($_GET['coinname']),array_keys($coins)))
{
	$coinname=strtolower($_GET['coinname']);
	
	include "../inc/wallet/".$coinname."/client.php";
	$client=new client();
	//ÅÐ¶ÏÇ®°üµØÖ·
	$rows=mysql_fetch_assoc(mysql_query("select id,getaddr,addr,balance from bidcms_balance where uid=".$uid." and coinname='".$coinname."'"));
	if($rows['id']>0)
	{
		if(!empty($rows['getaddr']))
		{
			echo $rows['getaddr'];
		}
		else
		{
			$newaddr=$client->getaddress($uid);
			if(!empty($newaddr))
			{
				mysql_query("update bidcms_balance set getaddr='".$newaddr."' where id=".$rows['id']);
				echo $newaddr;
			}
		}
	}
	else
	{
		$newaddr=$client->getaddress($uid);
		if(!empty($newaddr))
		{
			mysql_query("insert into bidcms_balance(getaddr,coinname,uid) values('".$newaddr."','".$coinname."',".$uid.")");
			echo $newaddr;
		}
	}
}
}
