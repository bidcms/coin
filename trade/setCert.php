<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$cert_num=$_GET['cn'];
	$rn=$_GET['rn'];
	if(!empty($cert_num) && !empty($rn) && $uid>0)
	{
		mysql_query("update bidcms_user set credentials='".$cert_num."',realname='".$rn."' where uid=".$uid) or die(mysql_error());
		exit('succ');
	}
}
