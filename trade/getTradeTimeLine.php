<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$coins['BID']='ฑุตรฑา';
	$d=array();
	if(!empty($_GET['coinname']) && $_GET['coinname']!=$_GET['exchange_coins'] && in_array(strtoupper($_GET['coinname']),array_keys($coins)) && in_array(strtoupper($_GET['exchange_coins']),array_keys($exchange_coins)))
	{
		$coinname=strtolower($_GET['coinname']);
		$exchange_coin=strtolower($_GET['exchange_coins']);
		$type=intval($_GET['type']);
		$query=mysql_query("select * from bidcms_timeline where coinname='".$coinname."' and exchange_coin='".$exchange_coin."' and type=".$type." order by id desc limit 0,70");
		
		while($rows=mysql_fetch_assoc($query))
		{
			$d[]='['.$rows['difftime'].'000'.','.$rows['total'].','.$rows['start'].','.$rows['max_price'].','.$rows['min_price'].','.$rows['end'].']';
		}
		krsort($d);
	}
	echo '['.implode(',',$d).']';
}