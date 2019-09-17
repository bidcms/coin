<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$coin_id=intval($_GET['id']);
	if($uid<1)
	{
		echo '{"status":"error","msg":"请登录后参与投票","id":"'.$coin_id.'"}';
		exit;
	}
	$ip=$_SERVER['REMOTE_ADDR'];
	$check=mysql_fetch_assoc(mysql_query("select id from bidcms_vote_history where coin_id=".$coin_id." and uid=".$uid." and ip='".$ip."'"));
	if($check['id']>0)
	{
		echo '{"status":"error","msg":"您已经参与过此币的投票了","id":"'.$coin_id.'"}';
		exit;
	}
	mysql_query("insert into bidcms_vote_history(coin_id,ip,uid,updatetime) values(".$coin_id.",'".$ip."',".$uid.",".time().")");
	mysql_query("update bidcms_vote set coin_vote=coin_vote+1 where id=".$coin_id);
	echo '{"status":"succ","msg":"投票成功","id":"'.$coin_id.'"}';
	exit;

}
exit('错误的请求');
