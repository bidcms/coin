<?php 
// php �ж��Ƿ�Ϊ ajax ���� 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")
{ 
	include "../inc/common.mini.php";
	$coins['BID']='�صñ�';
	foreach($coins as $k=>$v)
	{
		$price[strtolower($k).'2cny']=0;
	}
	$query=mysql_query('select coinname,price from bidcms_coinname where exchange_coin="cny"');
	while($rows=mysql_fetch_array($query))
	{
		$price[$rows['coinname'].'2cny']=$rows['price'];
		
	}
	$price['updatetime']=time();
	echo json_encode($price);
}