<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$qaa_desc=$_GET['qaa_desc'];
	if($uid>0 && !empty($qaa_desc))
	{
		//判断未解决的
		$info=mysql_fetch_array(mysql_query("select count(id) as total from bidcms_qaa where uid=".$uid." and qaa_status=0"));
		if($info['total']>2)
		{
			exit('too_many');
		}
		else
		{
			mysql_query("insert into bidcms_qaa(uid,qaa_desc,qaa_time) values(".$uid.",'".$qaa_desc."',".time().")");
		}
	}
	echo 'succ';
}