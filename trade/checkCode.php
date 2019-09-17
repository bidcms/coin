<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";


	$uid=$_COOKIE['bidcms_id'];
	$code=trim($_GET['code']);
	if(!empty($code))
	{
		//判断是否正确
		$checks=mysql_fetch_assoc(mysql_query("select id,errors,type from bidcms_checkcode where code='".$code."' and uid=".$uid." and updatetime>".(time()-300)." order by id desc"));
		if($checks['errors']==5)
		{
			exit('overstep');
		}
		if($checks['id']>0)
		{
			if($checks['type']=='telphone')
			{
				$tel=trim($_GET['tel_num']);
				mysql_query("update bidcms_user set telphone='".$tel."' where uid=".$uid);
			}
			elseif($checks['type']=='setaddr')
			{
				if(!empty($_GET['wallet_addr_type']) && in_array(strtoupper($_GET['wallet_addr_type']),array_keys($coins)))
				{
					$addr=trim(strip_tags($_GET['wallet_addr']));
					//检查地址
					$info=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where coinname='".$_GET['wallet_addr_type']."' and uid=".$uid));
					if($info['id']<1)
					{
						mysql_query("insert into bidcms_balance(addr,coinname,uid,updatetime) values('".$addr."','".$_GET['wallet_addr_type']."',".$uid.",".time().")");
					}
					else
					{
						mysql_query("update bidcms_balance set addr='".$addr."' where id=".$info['id']);
					}
				}
			}
			exit('succ');
		}
		else
		{
			mysql_query("update bidcms_checkcode set errors=errors+1 where id=".$checks['id']);
			exit('wrongCode');
		}
	}	
}
