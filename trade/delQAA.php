<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$qid=intval($_GET['qid']);
	if($uid>0 && $qid>0)
	{
		mysql_query("delete from bidcms_qaa where id=".$qid." and uid=".$uid);
	}
	echo 'ok';
}