<?php 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$uid=$_COOKIE['bidcms_id'];
	$qid=intval($_GET['qid']);
	$score=intval($_GET['score']);
	if($uid>0 && $qid>0 && $score>0)
	{
		mysql_query("update bidcms_qaa set qaa_score=".$score." where id=".$qid);
	}
	echo 'ok';
}