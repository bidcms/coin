<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>我的推广 小时代交易-诚信比特币,山寨币交易平台</title>
<meta name="keywords" content="专业虚拟币交易平台,莱特币交易平台,BTC交易,LTC交易">
<meta name="description" content="小时代交易市场是专业的虚拟币交易平台，是支持比特币BTC交易、莱特币LTC交易、狗币DOGE交易、无限币LFC交易、安全币SRC交易等诸多币种的交易平台。">
<link href="statics/css/reset.css" rel="stylesheet" type="text/css" />
<link href="statics/css/default_blue.css?2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="statics/js/jquery.min.js"></script>
<script type="text/javascript" src="statics/js/jquery.sgallery.js"></script>
<script type="text/javascript" src="statics/js/search_common.js?22"></script>
<meta property="qc:admins" content="2171603177615616375" />
<link rel="icon" href="favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.png" type="image/x-icon" /> 
</head>
<body>
<?php include 'top.php';?>
<div class="main">
	<div class="trade_main">
		<div style="width:866px; text-align:left;" class="trade_info">
			<table width="866" id="depositTable">
				<tr height="50">
					<td><strong>我的推广链接：</strong><input type="input" value="http://www.im61.com/index.php?fid=<?php echo $_COOKIE['bidcms_id']>0?$_COOKIE['bidcms_id']:0;?>" style="font-size:14px; font-family: verdana; color: #990000;width:500px;"> 手动复制此链接地址发送给你的朋友。</td>
				</tr>
				
			</tbody></table>
		</div>
		<textarea style="width:866px;height:100px;">还在后悔元通3800倍涨幅的0.01元认购吗？还在后悔国际的0.01元认购吗？，小时代BID币你还想错过吗，量更少，升值空间更大，必得币(BID)1000万限量认购发行，首期认购400万，认购单价0.1元，目标价格30元，每人限购500 BID，官方承诺认购价0.1元回收，开盘价在0.2元，只要认购，就会只赚不亏，你还在等什么，暴富神话就在眼前，地址:http://www.im61.com/index.php?fid=<?php echo $_COOKIE['bidcms_id']>0?$_COOKIE['bidcms_id']:0;?> 官方千人群：340061231</textarea>
		<textarea style="width:866px;height:100px;">50元变15000不是梦，必得币帮你实现,第一期认购价0.1元，短期目标价30元，量少质好，持续性商业支持，认购必得币为明天的富豪买张船票，官方底价回购没任何风险，地址：http://www.im61.com/index.php?fid=<?php echo $_COOKIE['bidcms_id']>0?$_COOKIE['bidcms_id']:0;?> 官方千人群：340061231</textarea>

		<textarea style="width:866px;height:100px;">虚拟币市场掀起认购风波，哪种币最保险呢？小时代的必得币,专业平台支持，官方认购价回收，只要买到就是赚到，首期400万认购量只需50元就可以认购500个，升值潜力无限，地址：http://www.im61.com/index.php?fid=<?php echo $_COOKIE['bidcms_id']>0?$_COOKIE['bidcms_id']:0;?> 官方千人群：340061231</textarea>
		<div class="bk30"></div>
		<div style="width:866px; text-align:left" class="trade_info">
			<div style="font-size:20px; color:#009900">我的推广记录(前10个)</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<table width="866" id="depositTable">
				<tbody>
			<?php
			$uid=$_COOKIE['bidcms_id'];
			if($uid>0)
			{
				$query=mysql_query("select * from bidcms_user where frienduid=".$uid." order by uid desc limit 0,10 ");
				while($rows=mysql_fetch_assoc($query))
				{
			?>
			
				<tr height="50">
					<th><?php echo $rows['username'];?></th>
					<td><?php echo date("Y-m-d H:i:s",$rows['updatetime']);?></td>
				</tr>
			<?php
				}
			}
			?>
			</tbody></table>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">推广奖励方式：</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
			经团队协商决定推广奖励如下：<br/>
			1、每个推荐者将永久享受被推荐人充值人民币的0.1%，每月20号结算。<br/>
			2、将得到被推荐人每次交易的0.01%人民币，买卖双方都有效。<br/>
			3、将在每月分红前1天内奖励被推荐人必得币总数的1%，永久有效。<br/>
			以上规则,必得币交易除外3.13日生效。
			</div>
		</div>
    </div>
    <div class="trade_menu">
	<?php include 'left.php';?>
	</div>
</div>

<?php include 'footer.php';?>
</body></html>