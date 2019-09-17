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
$id=intval($_GET['id']);
if($id>0)
{
	$r=mysql_fetch_assoc(mysql_query("select id,balance from bidcms_balance_log where coinname='cny' and ordertype=1 and status=2 and id=".$id));
	if($r['id']>0)
	{
		$a=$r['balance']*0.99;
		mysql_query("update bidcms_balance_log set status=1,actually=".$a." where id=".$r['id']);
		echo mysql_affected_rows();
	}
}
?>