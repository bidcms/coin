<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$data='--|--|0|0|0|0';
	if($uid>0)
	{
		$bidcounts=mysql_fetch_assoc(mysql_query('select sum(balance+balance_lock) as v from bidcms_balance where coinname="bid"'));
		$balance=mysql_fetch_assoc(mysql_query("select balance,balance_lock from bidcms_balance where uid=".$uid." and coinname='bid'"));
		$balance_un=mysql_fetch_assoc(mysql_query("select sum(balance) as v from bidcms_bid_balance where uid=".$uid." and status=0"));
		$data='succ|--|'.floatval($bidcounts['v']).'|'.floatval($balance['balance']).'|'.floatval($balance['balance_lock']).'|'.floatval($balance_un['v']);
	}
	echo $data;
}