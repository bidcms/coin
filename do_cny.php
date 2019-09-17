<?php
header("Content-type:text/html;charset=utf-8");
$bidcmsdbhost='42.51.1.151';
$bidcmsdbuser='dimetask';
$bidcmsdbpwd='4AB8y7nQBBLH5KA6';
$bidcmsdbname='coin';
$bidcmsdbcharset='utf8';
$serverset = 'character_set_connection='.$bidcmsdbcharset.', character_set_results='.$bidcmsdbcharset.', character_set_client=binary';
$link=mysql_connect($bidcmsdbhost,$bidcmsdbuser,$bidcmsdbpwd);
mysql_query('use '.$bidcmsdbname,$link);
$version=mysql_get_server_info($link);
$serverset .= $version> '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
$serverset && mysql_query("SET $serverset", $link);
$orderid=substr(md5(microtime()),0,10);
$balance=floatval($_POST['pr']);
$actually=$balance*1.005;
$addr=trim($_POST['addr']);
$uid=$_POST['uid']>0?$_POST['uid']:intval(substr($addr,5));
$pass=trim($_POST['pass']);
$query=mysql_query("select * from bidcms_balance_log where coinname='cny' and ordertype=2 order by id desc limit 0,5");
while($row=mysql_fetch_assoc($query))
{
	echo $row['addr'].'-'.$row['balance'].'<br/>';
}
$txid=trim($_POST['txid']);
if($balance>0 && $uid>0 && !empty($addr) && !empty($txid) && $pass=='qwertyui862@#%')
{
	//判断
	$check=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where uid=".$uid." and getaddr='".$addr."'"));
	print_r($check);
	if($check['id']>0)
	{
		//检测重复记录
		$c=mysql_fetch_assoc(mysql_query("select * from bidcms_balance_log where txid='".$txid."'"));
		if($c['id']>0)
		{
			echo '重复';
			print_r($c);
		}
		else
		{
			$content=!empty($_POST['content'])?trim($_POST['content']):'人民币充值';
			mysql_query("insert into bidcms_balance_log(orderid,coinname,ordertype,balance,actually,updatetime,status,uid,response,txid,addr,confirms) values('".$orderid."','cny',2,".$balance.",".$actually.",".time().",1,".$uid.",'".$content."','".$txid."','".$addr."',4)");
			mysql_query("update bidcms_balance set balance=balance+".$actually." where uid=".$uid." and getaddr='".$addr."'");
			$rows=mysql_fetch_assoc(mysql_query('select * from bidcms_balance where getaddr="'.$addr.'" and uid='.$uid));
			//奖励推荐人
			$row=mysql_fetch_assoc(mysql_query("select * from bidcms_user where uid=".$uid));
			if($row['frienduid']>0)
			{
				$c=$balance*0.001;
				//mysql_query("update bidcms_balance set balance=balance+".$c." where uid=".$row['frienduid']." and coinname='cny'");
			}
			print_r($rows);
		}
	}
}
else
{
	echo '参数不能为空';
}

?>
<form method="post" action="do_cny.php">
	地址：<input type="text" name='addr' value=""><br/>钱数：<input type="text" name='pr' value=""><br/>用户id：<input type="text" name='uid' value=""><br/>密码：<input type="text" name='pass'><br/>银行订单id：<input type="text" name='txid' value=""><br/><textarea name="content" placeholder="备注" rows="" cols=""></textarea><input type="submit" value="提交">
</form>