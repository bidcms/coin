<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	if($uid>0)
	{
		$balance_un=mysql_fetch_assoc(mysql_query("select sum(balance) as v from bidcms_bid_balance where uid=".$uid." and status=0 and updatetime<=".(time()-604800)));
		if($balance_un['v']>0)
		{
			if($setting['bonus_isneed']==1)
			{
				exit('zombieMature|'.$balance_un['v']);
			}
			else
			{
				mysql_query("update bidcms_bid_balance set status=1 where uid=".$uid." and status=0 and updatetime<=".(time()-604800));
				$mybid=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where uid=".$uid." and coinname='bid'"));
				if($mybid['id']>0)
				{
					mysql_query("update bidcms_balance set balance=balance+".$balance_un['v']." where id=".$mybid['id']);
				}
				else
				{
					mysql_query("insert into bidcms_balance(coinname,balance,uid) values('bid',".$balance_un['v'].",".$uid.")");
				}
				exit('normalMature|'.$balance_un['v']);
			}
		}
		else
		{
			//ÅÐ¶Ï¼´½«³ÉÊìµÄ
			$imma=mysql_fetch_assoc(mysql_query("select id,updatetime,balance from bidcms_bid_balance where uid=".$uid." and status=0 order by updatetime asc"));
			if($imma['id']>0)
			{
				exit('noMature|'.date('Y-m-d H:i:s',$imma['updatetime']+604800));
			}
			else
			{
				exit('noMature|noImmature');
			}
		}
	}
}