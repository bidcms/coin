<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	if($uid>0)
	{
		$query=mysql_query("select * from bidcms_bid_bonus where uid=".$uid);
		$infolist=array();
		while($rows=mysql_fetch_array($query))
		{
			$infolist[]=array('balance'=>$rows['bonus'],'amount'=>$rows['amount'],'time'=>date('Y-m-d H:i:s',$rows['updatetime']));
		}
	}
	echo json_encode($infolist);
}