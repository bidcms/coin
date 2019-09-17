<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$pwd=md52($_GET['pwd']);
	$oldpwd=md52($_GET['oldpwd']);
	if(!empty($pwd) && $uid>0)
	{
		//判断是否正确
		$checks=mysql_fetch_assoc(mysql_query("select trade_pwd from bidcms_user where uid=".$uid));
		if(!empty($checks['trade_pwd']))
		{
			if($oldpwd==$checks['trade_pwd'])
			{
				mysql_query("update bidcms_user set trade_pwd='".$pwd."' where uid=".$uid);
			}
			else
			{
				exit('wrongpwd');
			}
		}
		else
		{
			mysql_query("update bidcms_user set trade_pwd='".$pwd."' where uid=".$uid);
		}
		exit('succ');
	}
}
