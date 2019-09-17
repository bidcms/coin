<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=intval($_COOKIE['bidcms_id']);
	$data=array();
	$coins['BID']='±ØµÃ±Ò';
	$coins=array_keys($coins);
	$pagesize=30;
	$page=intval($_GET['page']);
	if($uid>0)
	{
		if(!empty($_GET['coinname']) && in_array(strtoupper($_GET['coinname']),$coins))
		{
			$coinname=strtolower($_GET['coinname']);
			$exchange_coin=in_array(strtoupper($_GET['exchange_coins']),array_keys($exchange_coins))?$_GET['exchange_coins']:$defaultecoin;
			$sql="select * from bidcms_trade where uid=".$uid." and coinname='".$coinname."' and exchange_coin='".$exchange_coin."' and status<2";
		}
		else
		{
			$sql="select * from bidcms_trade where uid=".$uid." and status<2";
		}
		$sql.=" limit ".($page*$pagesize).",".$pagesize;
		$query=mysql_query($sql);
		while($rows=mysql_fetch_assoc($query))
		{
			$data[]=array('id'=>$rows['id'],'coinname'=>$rows['coinname'],'exchange_coin'=>$rows['exchange_coin'],'price'=>$rows['price'],'amount'=>$rows['amount'],'type'=>$rows['tradetype'],'time'=>date('Y-m-d H:i:s',$rows['updatetime']));
		}
	}
	echo json_encode($data);
}
