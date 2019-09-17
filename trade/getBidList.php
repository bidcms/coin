<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$data='0|0|[]';
	if($uid>0)
	{
		$todays=mysql_fetch_assoc(mysql_query("select avg(balance) as vol from bidcms_bid_balance where updatetime>".(time()-86400)));
		$today_vol=$todays['vol'];
		$query=mysql_query("select * from bidcms_bid_balance where uid=".$uid." order by id desc limit 0,30");
		$infolist=array();
		$today_bid=0;
		while($rows=mysql_fetch_array($query))
		{
			if(time()-$rows['updatetime']<86400)
			{
				$today_bid+=$rows['balance'];
			}
			$infolist[]=array('desc'=>$rows['response'],'alteration'=>$rows['balance'],'imma'=>$rows['status']==0?'n':'y','time'=>date('Y-m-d H:i:s',$rows['updatetime']));
		}
		$data=$today_bid.'|'.$today_vol.'|'.json_encode($infolist);
	}
	echo $data;
}