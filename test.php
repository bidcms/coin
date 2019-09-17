<?php
include "inc/common.mini.php";
$rows=mysql_fetch_assoc(mysql_query("select * from bidcms_trade where uid=1 and coinname='ppc' and tradetype=2 order by price asc"));
if($_POST['a']==1)
{
	if($rows['id']>0)
	{
		$price=floatval($_POST['pr']>0?$_POST['pr']:$rows['price']);
		$amount=floatval($_POST['am']>0?$_POST['am']:$rows['amount']);
		$t=intval($_POST['type']);
		mysql_query("insert into bidcms_success(coinname,exchange_coin,tradetype,volume,price,updatetime,uid) values('ppc','cny',".$t.",".$amount.",".$price.",".time().",1)");
		mysql_query("delete from bidcms_trade where id=".$rows['id']);
		echo '<script type="text/javascript">
		<!--
			window.location="test.php";
		//-->
		</script>';
	}
}
?>
<form method="post" action="test.php">
	<select name="type">
		<option value="1">买入
		<option value="2" selected>卖出
	</select>数量：<input type="text" name='am' value="<?php echo $rows['amount'];?>">价格：<input type="text" name='pr' value="<?php echo $rows['price'];?>"><input type="hidden" name="a" value=1><input type="submit" value="成交">
</form>