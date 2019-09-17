<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>我的成交记录 小时代交易-诚信比特币,山寨币交易平台</title>
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
		<div>
			<img src="/statics/images/v9/m_icon_1.jpg" style="float:left; margin:9px 12px 0 0">
			<div style="font-size:28px">我的成交记录</div>
			<div style="font-size:14px">说明：系统默认加载最新的30条成交记录，如果您需要查看更早的记录，请点击“加载更多”。</div>
		</div>
		<div class="bk30"></div>
		<div style="width:866px; text-align:left" class="trade_info">
			<div style="font-size:20px; color:#009900">
				我最近的成交记录
				<select onchange="JavaScript:getUserClinch(this.options[this.options.selectedIndex].value);">
					<?php 
					foreach($GLOBALS['coins'] as $k=>$v){?>
					<option value="<?php echo $k;?>" <?php echo $defaultcoin==$k?'selected':'';?>>只看<?php echo $k;?><?php echo $v;?></option>
					<?php }?>
					<option value="BID" <?php echo $defaultcoin=='BID'?'selected':'';?>>只看BID必得币</option>
				</select>
			</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<table width="866" id="myClinchTable">
				<tr height=35 bgcolor="#eeeeee">
					<th width=190>成交时间</th>
					<th width=100>成交类型</th>
					<th width=100>币名</th>
					<th width=100>成交价格</th>
					<th width=100>成交数量</th>
					<th width=130>成交金额</th>
					<th width=146>兑换币种</th>
				</tr>
				<tr height="35">
					<td colspan=7 id="loadBTN">正在加载最新的成交记录</td>
				</tr>
			</table>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:18px; color:#666666">服务标准说明</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、小时代交易平台的交易手续费为0.1%，因此，当您的委单成交后，您将会自动支付0.1%的成交额作为手续费。比如：您购买了100个BTC，成交后，您的帐号实际上会进账99.9个BTC<br />
				2、由于计算精度问题，我们最多为您保留6位小数，如果您在交易时的计算结果的小数位数大于6位，我们将采用四舍五入的方法最终保留6位小数（实际上，6位小数以后的金额已经没有什么价值了）
			</div>
		</div>
    </div>
    <div class="trade_menu">
<?php include 'left.php';?></div>
</div>
<script type="text/javascript" language="javascript">
if (isLogin == false) window.location.href="index.php";

var ajaxObj = null;
var coinname_cur = "<?php echo $defaultcoin;?>";
var page = 0;
getUserClinch(coinname_cur);

function getUserClinch(coinname)
{
	if (coinname != coinname_cur) 
	{
		page = 0;
		coinname_cur = coinname;
	}
	
	if (window.XMLHttpRequest)
	{
		ajaxObj=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (ajaxObj!=null)
	{
		var url = "trade/getUserClinch.php?coinname="+coinname+"&page="+page.toString()+"&n="+Math.random();
		ajaxObj.onreadystatechange = updateUserClinchInfo;
		ajaxObj.open("GET", url, true);
		ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj.send(null);
		page++;
	}
}

function updateUserClinchInfo()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			
			var myClinchTable = document.getElementById("myClinchTable");
			if (page == 1)
			{
				while (myClinchTable.rows.length > 2)
				{
					myClinchTable.deleteRow(1);
				}
			}
			
			if (result == "no_trade_clinch") return;
			var jsonObj = eval( "(" + result + ")" );
			for (var i = 0; i < jsonObj.length; i++)
			{
				var newTr = myClinchTable.insertRow(myClinchTable.rows.length - 1);
				newTr.style.height = "35px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].time;
				
				var newTd_2 = newTr.insertCell(1);
				if (jsonObj[i].buyer_id == jsonObj[i].seller_id)
					newTd_2.innerHTML = "<font color=\"#0000CC\">自买自卖</font>";
				else if (jsonObj[i].buyer_id == glb_user_id.toString())
					newTd_2.innerHTML = "<font color=\"#00CC00\">买入</font>";
				else
					newTd_2.innerHTML = "<font color=\"#CC0000\">卖出</font>";
				
				var newTd_3 = newTr.insertCell(2);
				newTd_3.innerHTML = jsonObj[i].coinname.toLocaleUpperCase();
				
				var newTd_4 = newTr.insertCell(3);
				newTd_4.innerHTML = parseFloat(jsonObj[i].price).bidcmsToFixed(9).toString();;
				
				var newTd_5 = newTr.insertCell(4);
				newTd_5.innerHTML = jsonObj[i].volume;
				
				var newTd_6 = newTr.insertCell(5);
				newTd_6.innerHTML = (parseFloat(jsonObj[i].volume) * parseFloat(jsonObj[i].price)).bidcmsToFixed(6).toString();

				var newTd_7 = newTr.insertCell(6);
				newTd_7.innerHTML = jsonObj[i].exchange_coin.toLocaleUpperCase();
			}
			
			if (jsonObj.length == 30) document.getElementById("loadBTN").innerHTML = "<a href=\"JavaScript:getUserClinch(coinname_cur);\"><font color=\"#3377AA\">加载更多记录</font></a>";
			else document.getElementById("loadBTN").innerHTML = "成交记录已全部加载完毕";
		}
	}
}
</script>
<?php include 'footer.php';?>
</body>
</html>