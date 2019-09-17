<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";
$coins['BID']='±ØµÃ±Ò';
$infolist=array('buyOrder'=>array(),'sellOrder'=>array(),'trade'=>array());
if(!empty($_GET['coinname']) && $_GET['coinname']!=$_GET['exchange_coins'] && in_array(strtoupper($_GET['coinname']),array_keys($coins)) && in_array(strtoupper($_GET['exchange_coins']),array_keys($exchange_coins)))
{
	$coinname=strtolower($_GET['coinname']);
	$exchange_coin=strtolower($_GET['exchange_coins']);
	$query=mysql_query("select price,sum(amount) as amount from bidcms_trade where status<2 and tradetype=1 and coinname='".$coinname."' and exchange_coin='".$exchange_coin."' group by price desc limit 0,10");
	while($rows=mysql_fetch_assoc($query))
	{
		$rows['price']=sprintf("%.9f",$rows['price']);
		$infolist['buyOrder'][]=$rows;
	}
	$query=mysql_query("select price,sum(amount) as amount from bidcms_trade where status<2 and tradetype=2 and coinname='".$coinname."' and exchange_coin='".$exchange_coin."' group by price asc limit 0,10");
	while($rows=mysql_fetch_assoc($query))
	{
		$infolist['sellOrder'][]=$rows;
	}
	$query=mysql_query("select volume,price,updatetime,tradetype from bidcms_success where  coinname='".$coinname."' and exchange_coin='".$exchange_coin."' order by id desc limit 0,20");
	$success=array();
	while($rows=mysql_fetch_assoc($query))
	{
		$rows['time']=date('Y-m-d H:i:s',$rows['updatetime']);
		$rows['type']=$rows['tradetype'];
		$infolist['trade'][]=$rows;
	}
	echo json_encode($infolist);
	}
}