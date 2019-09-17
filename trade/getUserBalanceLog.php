<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
include "../inc/common.mini.php";

$page=intval($_GET['page']);
$limit=10;
$uid=$_COOKIE['bidcms_id'];
$query=mysql_query("select * from bidcms_balance_log where uid=".$uid." order by id desc limit ".($page*$limit).",".$limit);
$d=array();
$data=array();
while($rows=mysql_fetch_assoc($query))
{
	$d['id']=$rows['orderid'];
	$d['type']=$rows['coinname'].($rows['ordertype']==1?'提款订单':'充值订单');
	$d['desc']=$rows['balance'];
	$d['time']=date('Y-m-d H:i:s',$rows['updatetime']);
	$d['status']=$rows['status'];
	$d['actually']=$rows['actually'];
	$d['confirms']=$rows['confirms'];
	$d['coinname']=$rows['coinname'];
	$data[]=$d;
}
echo json_encode($data);
}