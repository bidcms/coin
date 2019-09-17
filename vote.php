<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>下一个新币-小时代交易-诚信比特币,山寨币交易平台</title>
<meta name="keywords" content="专业虚拟币交易平台,莱特币交易平台,BTC交易,LTC交易">
<meta name="description" content="小时代交易市场是专业的虚拟币交易平台，是支持比特币BTC交易、莱特币LTC交易、狗币DOGE交易、无限币LFC交易、安全币SRC交易等诸多币种的交易平台。">
<link href="statics/css/reset.css" rel="stylesheet" type="text/css" />
<link href="statics/css/default_blue.css?2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="statics/js/jquery.min.js"></script>
<script type="text/javascript" src="statics/js/jquery.sgallery.js"></script>
<script type="text/javascript" src="statics/js/search_common.js?22"></script>
<link rel="icon" href="favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.png" type="image/x-icon" /> 

</head>
<body>
<?php include 'top.php';?>
<div class="main">
	<div class="trade_main">
		<div>
			<img src="statics/images/v9/m_icon_1.jpg" style="float:left; margin:9px 12px 0 0">
			<div style="font-size:28px">下一个新币，你说了算！</div>
			<div style="font-size:14px">说明：此处投票只代表关注程度不代表小时代一定会上线此种币。</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">小时代新币候选区</div>
			<hr style="border:0;height:3px;width:508px;margin:0 0 10px 0" color="#00DD00">
			<div style="margin:10px 0;padding:10px;width:846px;font-size:15px;color:#990000;background:#FFCCCC;border:solid 1px #990000;display:none;" id="balanceNotice"></div>
			<table class="tableBoder1" width="868" id="balanceTable">
				<tr height=40 bgcolor="#eeeeee">
					<th width=90>英文简称</th>
					<th width=110>中文名</th>
					<th width=110>国家</th>
					<th width=110>发布时间</th>
					<th width=338>简介</th>
					<th width=110>投票</th>
				</tr>
				<?php
				$query=mysql_query("select * from bidcms_vote order by coin_vote desc");
				while($rows=mysql_fetch_assoc($query))
				{	
				?>
				<tr height=38>
					<td><img src="<?php echo $rows['coin_logo'];?>" style="width:35px;height:35px;"> <?php echo $rows['coin_name'];?> </td>
					<td id=""><?php echo $rows['coin_cn'];?></td>
					<td id=""><?php echo $rows['coin_country'];?></td>
					<td id=""><?php echo $rows['coin_time'];?></td>
					<td style="text-align:left;"><?php echo $rows['coin_desc'];?></td>
					<td><strong style="color:#ff0000;" id="vote_<?php echo $rows['id'];?>"><?php echo $rows['coin_vote'];?></strong>&nbsp;&nbsp;<button type="button" onclick="submitVote('<?php echo $rows['id'];?>');" id="vote_btn_<?php echo $rows['id'];?>">投1票</button></span></td>
				</tr>
				<?php 
				}
				?>
				<tr height=40>
					<th width=90><input type="text" id="c_name" style="width:88px;border:1px solid #333;height:35px;"></th>
					<th width=110><input type="text" id="c_cn" style="width:109px;border:1px solid #333;height:35px;"></th>
					<th width=110><input type="text" id="c_country" style="width:109px;border:1px solid #333;height:35px;"></th>
					<th width=110><input type="text" id="c_updatetime" style="width:109px;border:1px solid #333;height:35px;"></th>
					<th width=338><input type="text" id="c_desc" style="width:336px;border:1px solid #333;height:35px;"></th>
					<th width=110><input type="button" value="提交新币" onclick="addCoin();"></th>
				</tr>
			</table>
			
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:18px; color:#666666">注意事项</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、提交新币只能做为小时代获取新币资料的一个途径，不代表一定可以参与投票，提交的新币经过小时代审核后方可进入投票流程。<br />
			</div>
		</div>
    </div>
<div class="trade_menu">
<?php include 'left.php';?>
</div>
</div>
<script type="text/javascript">
<!--
var ajaxObj12=null;
var ajaxObj11=null;
function submitVote(id)
{
	document.getElementById("vote_btn_"+id).innerHTML = "提交中";

	if (window.XMLHttpRequest) ajaxObj12=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj12=new ActiveXObject("Microsoft.XMLHTTP");
	
	if (ajaxObj12!=null)
	{
		var url = "trade/setVote.php?id=" + id + "&n=" + Math.random();
		ajaxObj12.onreadystatechange = submitVoteResult;
		ajaxObj12.open("GET", url, true);
		ajaxObj12.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj12.send(null);
	}
}
function addCoin()
{
	if (window.XMLHttpRequest) ajaxObj11=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj11=new ActiveXObject("Microsoft.XMLHTTP");
	
	if (ajaxObj11!=null)
	{
		cname=document.getElementById('c_name').value;
		ccn=document.getElementById('c_cn').value;
		country=document.getElementById('c_country').value;
		ctime=document.getElementById('c_updatetime').value;
		cdesc=document.getElementById('c_desc').value;
		var url = "trade/addCoin.php?name=" + cname + "&ccn=" + ccn+"&country="+country+"&updtime="+ctime+"&cdesc="+cdesc;
		ajaxObj11.onreadystatechange = submitCoinResult;
		ajaxObj11.open("GET", url, true);
		ajaxObj11.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj11.send(null);
	}
}
function submitCoinResult()
{
	if (ajaxObj11.readyState == 4)
	{
		if (ajaxObj11.status == 200)
		{
			var result = ajaxObj11.responseText;
			if(result=='succ')
			{
				alert("新币提交成功");
			}
			else
			{
				alert(result);
			}
		}
	}
	
}
function submitVoteResult()
{
	if (ajaxObj12.readyState == 4)
	{
		if (ajaxObj12.status == 200)
		{
			var result = eval("("+ajaxObj12.responseText+")");
			if(result.status=='succ')
			{
				var ovote=parseInt(document.getElementById("vote_"+result.id).innerHTML);
				document.getElementById("vote_"+result.id).innerHTML= ovote+1;
			}
			else
			{
				alert(result.msg);
			}
			document.getElementById("vote_btn_"+result.id).innerHTML = "投1票";
		}
	}
	
}
//-->
</script>
<?php include 'footer.php';?>

</body>
</html>