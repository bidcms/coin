<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$qaaid=intval($_GET['qaa_id']);
	if($uid>0 && $qaaid>0)
	{
		mysql_query("update bidcms_qaa set qaa_status=2 where uid=".$uid." and id=".$qaaid);
	}
	echo 'succ';
}