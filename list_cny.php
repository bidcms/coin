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
$query=mysql_query("select * from bidcms_balance_log where coinname='cny' and ordertype=1 and status=2 order by updatetime asc");
echo '<h2>提现</h2>';
echo '<table border="1">';
$t=0;
$i=0;
while($rows=mysql_fetch_assoc($query))
{
	$tel=mysql_fetch_assoc(mysql_query("select telphone from bidcms_user where uid=".$rows['uid']));
	$r=$rows['balance']*0.99;
	$vr=$r<200?$r-2:$r;
	$t+=$vr;
	
	echo '<tr><td>('.$i.')'.date("Y-m-d H:i:s",$rows['updatetime']).'</td><td>'.$rows['addr'].'</td><td>'.$rows['uid'].'</td><td><input type="text" value="'.$rows['balance'].'"/></td><td><input type="text" value="'.$vr.'"/></td><td>'.$tel['telphone'].' <a href="dolist_cny.php?id='.$rows['id'].'" target="_blank">结束</a></td></tr>';
	$i++;
}
echo '</table>';
$q=mysql_query("select sum(balance+balance_lock) as total ,coinname from bidcms_balance where uid!=1 and uid!=39 group by coinname");
echo '<table border="1">';
$tp=0;
while($rows=mysql_fetch_assoc($q))
{
	if($rows['coinname']=='cny')
	{
		$tp=$rows['total'];
	}
	echo '<tr><td>'.$rows['coinname'].'</td><td>'.$rows['total'].'</td></tr>';
}

echo '<tr><td colspan="2">'.$t.'-'.($t+$tp).'</td></tr>';

echo '</table>';
?>