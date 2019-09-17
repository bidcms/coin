<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$tel_num=$_GET['tel_num'];
	if(!empty($tel_num) && $uid>0)
	{
		$check=mysql_fetch_assoc(mysql_query("select uid from bidcms_user where telphone='".$tel_num."'"));
		if($check['uid']>0)
		{
			exit('exist');
		}
		else
		{
			if($setting['binding_needcode']==1)
			{
				$code=setCode('telphone');
				if(!empty($code))
				{
					exit('code_sent-'.$code);
				}
			}
			else
			{
				mysql_query("update bidcms_user set telphone='".$tel_num."' where uid=".$uid);
				exit('succ');
			}
		}
	}
}
