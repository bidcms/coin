<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$coins['BID']='必得币';
	$coins=array_keys($coins);
	$infolist=array();
	$pagesize=30;
	$page=intval($_GET['page']);
	if(!empty($_GET['coinname']) && in_array(strtoupper($_GET['coinname']),array_keys($coins)))
	{
		$coinname=strtolower($_GET['coinname']);
		$exchange_coin=strtolower($_GET['exchange_coins']);
		//详细成交记录
		$query=mysql_query("select id,coinname,exchange_coin,price,coin,updatetime,buyer_uid,seller_uid from bidcms_history where (buyer_uid=".$uid." or seller_uid=".$uid.") and coinname='".$coinname."' order by id desc limit ".($page*$pagesize).",".$pagesize);
		while($rows=mysql_fetch_assoc($query))
		{
			$infolist[]=array('id'=>$rows['id'],'buyer_id'=>$rows['buyer_uid'],'seller_id'=>$rows['seller_uid'],'volume'=>$rows['coin'],'price'=>$rows['price'],'coinname'=>$rows['coinname'],'exchange_coin'=>$rows['exchange_coin'],'time'=>date('Y-m-d H:i:s',$rows['updatetime']));
		}
	}
	echo json_encode($infolist);
}
