<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	if($uid>0)
	{
		$s=mysql_fetch_assoc(mysql_query("select count(id) as total from bidcms_qaa"));
		$s1=mysql_fetch_assoc(mysql_query("select count(id) as total from bidcms_qaa where qaa_status=1"));
		$s2=mysql_fetch_assoc(mysql_query("select count(id) as total from bidcms_qaa where qaa_status=0"));
		$infolist=array();
		$query=mysql_query('select * from bidcms_qaa where uid='.$uid.' order by id asc');
		$i=0;
		while($rows=mysql_fetch_assoc($query))
		{
			$infolist[]=array('id'=>$rows['id'],'qaa_desc'=>$rows['qaa_desc'],'qaa_time'=>date('Y-m-d H:i:s',$rows['qaa_time']),'qaa_status'=>$rows['qaa_status'],'qaa_answer'=>$rows['qaa_answer'],'qaa_answer_time'=>date('Y-m-d H:i:s',$rows['qaa_answer_time']),'qaa_wait'=>$i,'qaa_score'=>$rows['qaa_score'],'qaa_cser'=>'bidcms');
			if($rows['qaa_status']==0)
			{
				$i++;
			}
		}
	}
	$r=!empty($infolist)?json_encode($infolist):'no_qaa';
	echo intval($s2['total']).'|'.intval($s1['total']).'|'.intval($s['total']).'|'.$r;
}