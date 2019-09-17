<?php
set_time_limit(0);
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
$p=!empty($_GET['p'])?intval($_GET['p']):0;
$query=mysql_query("select * from bidcms_bid_reserve where status=0");
$s=0;
while($rows=mysql_fetch_assoc($query))
{
	$d=mysql_fetch_assoc(mysql_query("select * from bidcms_balance where uid=".$rows['uid']." and coinname='bid'"));
	if($d['balance']>1)
	{
		$a=$d['balance']>500?500:$d['balance'];
		$s+=$a;
		echo $d['balance'].'<br/>';
	}
}
echo $s-30000;
?>