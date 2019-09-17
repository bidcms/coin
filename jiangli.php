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
//$p=intval($_GET['p']);
$d=array();
$query=mysql_query("select * from bidcms_user where frienduid>0");
while($row=mysql_fetch_assoc($query))
{
	$d[$row['frienduid']][]=$row['uid'];
}
foreach($d as $k=>$v)
{
	$sql="select sum(balance) as total from bidcms_balance where uid in (".implode(',',$v).")";
	echo $sql.'<br/>';
}
//echo '<a href="jiangli.php?p='.($p+1).'">下一页</a>';
