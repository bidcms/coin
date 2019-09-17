<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";
$infolist=array();
$uid=$_COOKIE['bidcms_id'];
$coins=array_keys($coins);
$infolist['cny_addr']='';
$infolist['cny_balance']='0';
$infolist['cny_balance_lock']='0';
foreach($coins as $k=>$v)
{
	$cname=strtolower($v);
	$infolist[$cname.'_addr']='';
	$infolist[$cname.'_balance']='0';
	$infolist[$cname.'_balance_lock']='0';
}
$infolist['bid_addr']='';
$infolist['bid_balance']='0';
$infolist['bid_balance_lock']='0';
$infolist['bid_balance_immature']='0';

$infolist['ntmc_addr']='';
$infolist['ntmc_balance']='0';
$infolist['ntmc_balance_lock']='0';
if($uid>0)
{
	$query=mysql_query("select coinname,addr,balance,balance_lock from bidcms_balance where uid=".$uid);
	while($rows=mysql_fetch_assoc($query))
	{
		if(isset($infolist[$rows['coinname'].'_addr']))
		{
			$infolist[$rows['coinname'].'_addr']=$rows['addr'];
			$infolist[$rows['coinname'].'_balance']=$rows['balance'];
			$infolist[$rows['coinname'].'_balance_lock']=$rows['balance_lock'];
		}
	}
}
echo json_encode($infolist);
}