<?php
include 'inc/common.mini.php';
$fuid=intval(!empty($_GET['fid'])?$_GET['fid']:$session->get('bidcms_fuid'));
if($fuid>0)
{
	$session->set('bidcms_fuid',$fuid);
}
include 'inc/coinname.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo $c[$current_coin];?>(<?php echo $current_coin;?>)/<?php echo $exchange_coins[$current_ecoin];?>(<?php echo $current_ecoin;?>)-小时代交易-诚信比特币,山寨币交易平台</title>
<meta name="keywords" content="专业虚拟币交易平台,莱特币交易平台,BTC交易,LTC交易">
<meta name="description" content="小时代交易市场是专业的虚拟币交易平台，是支持比特币BTC交易、莱特币LTC交易、狗币DOGE交易、无限币LFC交易、安全币SRC交易等诸多币种的交易平台。">
<link href="statics/css/reset.css" rel="stylesheet" type="text/css" />
<link href="statics/css/default_blue.css?2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="statics/js/jquery.min.js"></script>
<script type="text/javascript" src="statics/js/jquery.sgallery.js"></script>
<script type="text/javascript" src="statics/js/search_common.js"></script>
<meta property="qc:admins" content="2171603177615616375" />
<link rel="icon" href="favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.png" type="image/x-icon" /> 
</head>
<body>
<?php include 'top.php';?>
<script type="text/javascript" language="javascript">
gQuery=parseQuery();
var coins=<?php echo json_encode($coins);?>;
coins.BID='必得币';
coins.NTMC='新时代币';
var exchange_coins=<?php echo json_encode($exchange_coins);?>;
var buy_scale=<?php echo json_encode($buy_scale);?>;
var sell_scale=<?php echo json_encode($sell_scale);?>;
coinName='<?php echo $current_coin;?>';
ecoinName='<?php echo $current_ecoin;?>';
coinNameCN = coins[coinName];
ecoinNameCN = exchange_coins[ecoinName];
</script>
<div class="main">
	<div class="trade_main">
		<table>
			<tr>
				<td width=50 height=35 id="coinLOGO"></td>
				<td><strong style="font-size:26px;"><span id="market_name"><span id="coinNameCN1"></span>(<b id="coinName1"></b>/<b id="ecoinName"></b>)</span>交易</strong> <span style="font-size:13px;"><?php echo in_array(strtolower($current_coin),$pause)?'暂停交易':'2分钟自动更新';?></span> </td>
				
			</tr>
		</table>
		<div class="bk10"></div>
		<div style="width:880px;position:relative;">
			<div style="position: absolute;top:10px;z-index:99;right:235px;"><b>行情显示方式</b> <a href="JavaScript:get5minLine();" style="color:#3377AA" id="fiveLineBTN">5分钟线</a> <a href="JavaScript:getTimeLine();" style="color:#3377AA" id="timeLineBTN">小时线</a> <a href="JavaScript:getDayLine();" style="color:#3377AA" id="dayLineBTN">日线</a></div>
			<div id="graphbox" style="width:658px;height:330px;float:left"></div>
			<div style="width:205px;height:330px;float:left">
				<div>
					<img src="statics/images/v9/m_icon_2.png" style="float:left;margin:4px 8px 0 0">
					<div style="font-size:21px;color:#FF9933;font-weight:600;height:46px;overflow:hidden;">￥<span style="font-size:30px;line-height:130%" id="newestPrice">0.00</span></div>
				</div>
				<div class="bk10"></div>
				<div>
					<img src="statics/images/v9/m_icon_3.png" style="float:left;margin:4px 8px 0 0">
					<div style="font-size:16px;font-weight:600">买1档价(<?php echo $current_ecoin;?>)</div>
					<div style="font-size:13px;color:#0AB92B;font-weight:600" id="buy1Price">0.00</div>
				</div>
				<div class="bk10"></div>
				<div>
					<img src="statics/images/v9/m_icon_4.png" style="float:left;margin:4px 8px 0 0">
					<div style="font-size:16px;font-weight:600">卖1档价(<?php echo $current_ecoin;?>)</div>
					<div style="font-size:13px;color:#F01717;font-weight:600" id="sell1Price">0.00</div>
				</div>
				<div class="bk10"></div>
				<div>
					<img src="statics/images/v9/m_icon_5.png" style="float:left;margin:4px 8px 0 0">
					<div style="font-size:16px;font-weight:600">24小时成交量(<span id="coinName2"></span>)</div>
					<div style="font-size:13px" id="volumeOf24Hours">0.00</div>
				</div>
				<div class="bk10"></div>
				<div>
					<img src="statics/images/v9/m_icon_5.png" style="float:left;margin:4px 8px 0 0">
					<div style="font-size:16px;font-weight:600">24小时成交额(<?php echo $current_ecoin;?>)</div>
					<div style="font-size:13px" id="balanceOf24Hours">0.00</div>
				</div>
				<div class="bk20"></div>
				<div class="bk20"></div>
				<div>
					<div class="btn_buy"><a href="JavaScript:displayBuyBanner();">买入<span id="coinName3"></span></a></div>
					<div class="btn_sell"><a href="JavaScript:displaySellBanner();">卖出<span id="coinName4"></span></a></div>
				</div>
			</div>
		</div>
		<div id="buyBox" style="clear:both;display:none;width:868px;height:108px;background:url(statics/images/v9/m_banner_buy.png) no-repeat;margin-top:5px;" class="inputNum">
			<table height=68 style="font-size:13px;">
				<tr height=25><td></td></tr>
				<tr height=35>
					<th width=108 align=right>我的<?php echo $current_ecoin;?>余额&nbsp;</th>
					<td width=108><input type=text readonly="readonly" id="cny_balance1"></td>
					<th width=108 align=right>买入价格(<?php echo $current_ecoin;?>)&nbsp;</th>
					<td width=108><input type=text style="background:#FFFFFF;border:1px solid #05A500;color:#0AA91B;font-weight:600" id="price1" onkeyup="JavaScript:resetInputsNumByPrice1();"></td>
					<th width=108 align=right>买入数量(<span id="coinName5"></span>)&nbsp;</th>
					<td width=108><input type=text style="background:#FFFFFF;border:1px solid #05A500;color:#0AA91B;font-weight:600" id="amount1" onkeyup="JavaScript:resetInputsNumByAmount1();"></td>
					<th width=108 align=right>成交额(<?php echo $current_ecoin;?>)&nbsp;</th>
					<td width=108><input type=text readonly="readonly" id="totalBalance1"></td>
				</tr>
				<tr height=35>
					<th align=right>我的<span id="coinName6"></span>数量&nbsp;</th>
					<td><input type=text readonly="readonly" id="coin_balance1"></td>
					<th align=right>最多可买(<span id="coinName7"></span>)&nbsp;</th>
					<td><input type=text readonly="readonly" id="maxNum1"></td>
					<th align=right>实际到账(<span id="coinName8"></span>)&nbsp;</th>
					<td colspan=2><table><tr><td><input type=text readonly="readonly" id="actuallyGet1"></td><td style="font-size:12px">&nbsp;(手续费<span id="fee"></span>)</td></tr></table></td>
					<td id="submitOrderBTN1"><a href="JavaScript:submitOrder('1');"><img src="statics/images/v9/m_confirm_buy.png"></a></td>
				</tr>
			</table>
		</div>
		<div id="sellBox" style="clear:both;display:none;width:868px;height:108px;background:url(statics/images/v9/m_banner_sell.png) no-repeat;margin-top:5px" class="inputNum">
			<table height=68 style="font-size:13px;">
				<tr height=25><td></td></tr>
				<tr height=35>
					<th width=108 align=right>我的<?php echo $current_ecoin;?>余额&nbsp;</th>
					<td width=108><input type=text readonly="readonly" id="cny_balance2"></td>
					<th width=108 align=right>卖出价格(<?php echo $current_ecoin;?>)&nbsp;</th>
					<td width=108><input type=text style="background:#FFFFFF;border:1px solid #D65E4B;color:#DD2222;font-weight:600" id="price2" onkeyup="JavaScript:resetInputsNumByPrice2();"></td>
					<th width=108 align=right>卖出数量(<span id="coinName9"></span>)&nbsp;</th>
					<td width=108><input type=text style="background:#FFFFFF;border:1px solid #D65E4B;color:#DD2222;font-weight:600" id="amount2" onkeyup="JavaScript:resetInputsNumByAmount2();"></td>
					<th width=108 align=right>成交额(<?php echo $current_ecoin;?>)&nbsp;</th>
					<td width=108><input type=text readonly="readonly" id="totalBalance2"></td>
				</tr>
				<tr height=35>
					<th align=right>我的<span id="coinName10"></span>数量&nbsp;</th>
					<td><input type=text readonly="readonly" id="coin_balance2"></td>
					<th align=right>全卖可得(<?php echo $current_ecoin;?>)&nbsp;</th>
					<td><input type=text readonly="readonly" id="maxNum2"></td>
					<th align=right>实际到账(<?php echo $current_ecoin;?>)&nbsp;</th>
					<td colspan=2><table><tr><td><input type=text readonly="readonly" id="actuallyGet2"></td><td style="font-size:12px">&nbsp;(手续费<span id="fee1"></span>)</td></tr></table></td>
					<td id="submitOrderBTN2"><a href="JavaScript:submitOrder('2');"><img src="statics/images/v9/m_confirm_sell.png"></a></td>
				</tr>
			</table>
		</div>
		<div class="trade_info" id="myOrderDiv" style="display:none">
			<div class="bk20"></div>
			<table width="866" id="myOrderTable">
				<tr><th colspan=6 height=38 valign=middle bgcolor="#EFF4FA" style="font-size:16px;color:#3377AA">我的<span id="coinName11"></span>委单</th></tr>
				<tr height=35>
					<th width=160>挂单时间</th>
					<th width=108>挂单类型</th>
					<th width=160>挂单价格(<?php echo $current_ecoin;?>)</th>
					<th width=160>挂单数量(<span id="coinName12"></span>)</th>
					<th width=160>挂单总额(<?php echo $current_ecoin;?>)</th>
					<th width=118>操作</th>
				</tr>
				<tr height="35">
					<td colspan=6>正在加载我的委托挂单数据</td>
				</tr>
			</table>
		</div>
		<div class="bk20"></div>
		<div class="trade_info">
			<table style="margin-right:10px;float:left" width="428" id="buyOrderTable">
				<tr><th colspan=4 height=38 valign=middle bgcolor="#D0F0BF" style="font-size:16px;color:#009900">买入盘面</th></tr>
				<tr>
					<th width="68" height="35">档位</th>
					<th width="120">买入价(<?php echo $current_ecoin;?>)</th>
					<th width="120">买入量(<span id="coinName21"></span>)</th>
					<th width="120">总额(<?php echo $current_ecoin;?>)</th>
				</tr>
				<tr>
					<td colspan=4 height="35">正在加载委托买入的盘面数据</td>
					
				</tr>
			</table>
			<table style="float:left" width="428" id="sellOrderTable">
				<tr><th colspan=4 height=38 valign=middle bgcolor="#FDE3E3" style="font-size:16px;color:#D01515">卖出盘面</th></tr>
				<tr>
					<th width="68" height="35">档位</th>
					<th width="120">卖出价(<?php echo $current_ecoin;?>)</th>
					<th width="120">卖出量(<span id="coinName23"></span>)</th>
					<th width="120">总额(<?php echo $current_ecoin;?>)</th>
				</tr>
				
				<tr>
					<td colspan=4 height="35">正在加载委托卖出的盘面数据</td>
				</tr>
			</table>
		</div>
		<div class="bk20"></div>
		<div class="trade_info">
			<table style="float:left" width="866" id="tradeTable">
				<tr><th colspan=5 height=38 valign=middle bgcolor="#EFF4FA" style="font-size:16px;color:#3377AA">最新成交记录</th></tr>
				<tr>
					<th width="196" height="35">成交时间</th>
					<th width="130">类型</th>
					<th width="180">成交价(<?php echo $current_ecoin;?>)</th>
					<th width="180">成交量(<span id="coinName22"></span>)</th>
					<th width="180">成交额(<?php echo $current_ecoin;?>)</th>
				</tr>
				<tr>
					<td colspan=5 height="35">正在加载最新的成交记录数据</td>
				</tr>
			</table>
		</div>
    </div>
	<script src="statics/js/highstock.js?v=4"></script>
<div class="trade_menu">
<?php include 'left.php';?>
</div>
</div>
<script type="text/javascript" language="javascript">
sacle=coinName.toLowerCase();

var t_fee=1-eval('buy_scale.'+sacle);
document.getElementById("fee").innerHTML = eval('buy_scale.'+sacle)*100+"%";
document.getElementById("fee1").innerHTML = eval('sell_scale.'+sacle)*100+"%";

document.getElementById("coinName1").innerHTML = coinName;
document.getElementById("coinName2").innerHTML = coinName;
document.getElementById("coinName3").innerHTML = coinName;
document.getElementById("coinName4").innerHTML = coinName;
document.getElementById("coinName5").innerHTML = coinName;
document.getElementById("coinName6").innerHTML = coinName;
document.getElementById("coinName7").innerHTML = coinName;
document.getElementById("coinName8").innerHTML = coinName;
document.getElementById("coinName9").innerHTML = coinName;
document.getElementById("coinName10").innerHTML = coinName;
document.getElementById("coinName11").innerHTML = coinName;
document.getElementById("coinName12").innerHTML = coinName;
document.getElementById("coinName21").innerHTML = coinName;
document.getElementById("coinName22").innerHTML = coinName;
document.getElementById("coinName23").innerHTML = coinName;
document.getElementById("coinNameCN1").innerHTML = coinNameCN;
document.getElementById("coinLOGO").innerHTML = "<img src=\"statics/images/coin_logos/" + coinName + "_logo.png\" width=\"35\" height=\"35\">";
document.getElementById("ecoinName").innerHTML=ecoinName;
var ajaxObj = null;
var ajaxObj2 = null;
var ajaxObj3 = null;
var ajaxObj4 = null;
var ajaxObj5 = null;

function getTradeInfo()
{
	if (window.XMLHttpRequest)
	{
		ajaxObj2=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj2=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (ajaxObj2!=null)
	{
		var url = "trade/getTradeList.php?coinname="+coinName+"&exchange_coins="+ecoinName+"&n="+Math.random();
		ajaxObj2.onreadystatechange = updateTradeInfo;
		ajaxObj2.open("GET", url, true);
		ajaxObj2.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj2.send(null);
	}
	if (isLogin)
	{
		if (window.XMLHttpRequest)
		{
			ajaxObj4=new XMLHttpRequest();
		}
		else if (window.ActiveXObject)
		{
			ajaxObj4=new ActiveXObject("Microsoft.XMLHTTP");
		}
		if (ajaxObj4!=null)
		{
			var url = "trade/getUserOrder.php?coinname="+coinName+"&exchange_coins="+ecoinName+"&n="+Math.random();
			ajaxObj4.onreadystatechange = updateUserOrderInfo;
			ajaxObj4.open("GET", url, true);
			ajaxObj4.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
			ajaxObj4.send(null);
		}
	}
}

function updateUserOrderInfo()
{
	if (ajaxObj4.readyState == 4)
	{
		if (ajaxObj4.status == 200)
		{
			var result = ajaxObj4.responseText;
			
			document.getElementById("myOrderDiv").style.display="block";
			var myOrderTable = document.getElementById("myOrderTable");
			
			if (result == "no_order")
			{
				myOrderTable.rows[2].cells[0].innerHTML="您目前没有"+coinName+"挂单记录";
				return;
			}
			
			var tableRows = myOrderTable.rows.length;
			for (var i = 2; i < tableRows; i++)
			{
				myOrderTable.deleteRow(2);
			}
			
			var jsonObj = eval( "(" + result + ")" );
			for (var i = 0; i < jsonObj.length; i++)
			{
				var newTr = myOrderTable.insertRow(myOrderTable.rows.length);
				newTr.style.height = "35px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].time.substring(5);
				
				var newTd_2 = newTr.insertCell(1);
				if (jsonObj[i].type == "1")
					newTd_2.innerHTML = "<font color=\"#0AB92B\">买入</font>";
				else
					newTd_2.innerHTML = "<font color=\"#F01717\">卖出</font>";
				
				var newTd_3 = newTr.insertCell(2);
				newTd_3.innerHTML = parseFloat(jsonObj[i].price).bidcmsToFixed(9).toString();
				
				var newTd_4 = newTr.insertCell(3);
				newTd_4.innerHTML = jsonObj[i].amount;
				
				var newTd_5 = newTr.insertCell(4);
				newTd_5.innerHTML = (parseFloat(jsonObj[i].amount) * parseFloat(jsonObj[i].price)).bidcmsToFixed(4).toString();
				
				var newTd_6 = newTr.insertCell(5);
				newTd_6.id = "delOrder_" + jsonObj[i].id.toString();
				newTd_6.innerHTML = "<a href=\"JavaScript:delOrder('"+jsonObj[i].id+"')\"><font color=\"#3377AA\">撤单</font></a>";
			}
		}
	}
}

function updateTradeInfo()
{
	if (ajaxObj2.readyState == 4)
	{
		if (ajaxObj2.status == 200)
		{
			var result = ajaxObj2.responseText;
			
			//更新成交记录
			var tradeTable = document.getElementById("tradeTable");
			var jsonObj = eval( "(" + result + ")" );
			
			if (jsonObj.trade.length == 0)
			{
				tradeTable.rows[2].cells[0].innerHTML = "当前还没有成交记录";
			}
			else
			{
				var tableRows = tradeTable.rows.length;
				for (var i = 2; i < tableRows; i++)
				{
					tradeTable.deleteRow(2);
				}
				
				for (var i = 0; i < jsonObj.trade.length; i++)
				{
					if (i == 0) document.getElementById("newestPrice").innerHTML = parseFloat(jsonObj.trade[i].price).toString();
					
					var newTr = tradeTable.insertRow(tradeTable.rows.length);
					newTr.style.height = "35px";
					
					var newTd_1 = newTr.insertCell(0);
					newTd_1.innerHTML = jsonObj.trade[i].time.substring(5);
					
					var newTd_2 = newTr.insertCell(1);
					if (jsonObj.trade[i].type == "1")
						newTd_2.innerHTML = "<font color=\"#0AB92B\">买入</font>";
					else
						newTd_2.innerHTML = "<font color=\"#F01717\">卖出</font>";
					
					var newTd_3 = newTr.insertCell(2);
					newTd_3.innerHTML = parseFloat(jsonObj.trade[i].price).bidcmsToFixed(8).toString();
					
					var newTd_4 = newTr.insertCell(3);
					newTd_4.innerHTML = parseFloat(jsonObj.trade[i].volume).toString();
					
					var newTd_5 = newTr.insertCell(4);
					newTd_5.innerHTML = (parseFloat(jsonObj.trade[i].price)*parseFloat(jsonObj.trade[i].volume)).bidcmsToFixed(2).toString();
				}
			}
			
			//更新买单
			var buyOrderTable = document.getElementById("buyOrderTable");
			
			if (jsonObj.buyOrder.length == 0)
			{
				buyOrderTable.rows[2].cells[0].innerHTML = "当前还没有用户挂买单";
			}
			else
			{
				var tableRows = buyOrderTable.rows.length;
				for (var i = 2; i < tableRows; i++)
				{
					buyOrderTable.deleteRow(2);
				}
				
				for (var i = 0; i < jsonObj.buyOrder.length; i++)
				{
					if (i == 0) document.getElementById("buy1Price").innerHTML = parseFloat(jsonObj.buyOrder[i].price).bidcmsToFixed(9).toString();
					
					var newTr = buyOrderTable.insertRow(buyOrderTable.rows.length);
					newTr.style.height = "35px";
					
					var newTd_1 = newTr.insertCell(0);
					newTd_1.innerHTML = "<font color=\"#0AB92B\">买"+(i+1).toString()+"</font>";
					
					var newTd_2 = newTr.insertCell(1);
					newTd_2.innerHTML = parseFloat(jsonObj.buyOrder[i].price).bidcmsToFixed(9).toString();
					
					var newTd_3 = newTr.insertCell(2);
					newTd_3.innerHTML = parseFloat(jsonObj.buyOrder[i].amount).toString();
					
					var newTd_4 = newTr.insertCell(3);
					newTd_4.innerHTML = (parseFloat(jsonObj.buyOrder[i].amount) * parseFloat(jsonObj.buyOrder[i].price)).bidcmsToFixed(6).toString();
				}
			}
			
			//更新卖单
			var sellOrderTable = document.getElementById("sellOrderTable");
			
			if (jsonObj.sellOrder.length == 0)
			{
				sellOrderTable.rows[2].cells[0].innerHTML = "当前还没有用户挂卖单";
			}
			else
			{
				var tableRows = sellOrderTable.rows.length;
				for (var i = 2; i < tableRows; i++)
				{
					sellOrderTable.deleteRow(2);
				}
				 
				for (var i = 0; i < jsonObj.sellOrder.length; i++)
				{
					if (i == 0) document.getElementById("sell1Price").innerHTML = parseFloat(jsonObj.sellOrder[i].price).bidcmsToFixed(9).toString();
					
					var newTr = sellOrderTable.insertRow(sellOrderTable.rows.length);
					newTr.style.height = "35px";
					
					var newTd_1 = newTr.insertCell(0);
					newTd_1.innerHTML = "<font color=\"#F01717\">卖"+(i+1).toString()+"</font>";
					
					var newTd_2 = newTr.insertCell(1);
					newTd_2.innerHTML = parseFloat(jsonObj.sellOrder[i].price).bidcmsToFixed(9).toString();
					
					var newTd_3 = newTr.insertCell(2);
					newTd_3.innerHTML = parseFloat(jsonObj.sellOrder[i].amount).toString();
					
					var newTd_4 = newTr.insertCell(3);
					newTd_4.innerHTML = (parseFloat(jsonObj.sellOrder[i].amount) * parseFloat(jsonObj.sellOrder[i].price)).bidcmsToFixed(6).toString();
				}
			}
		}
	}
}

function delOrder(order_id)
{
	document.getElementById("delOrder_" + order_id).innerHTML = "正在提交...";
	
	if (window.XMLHttpRequest)
	{
		ajaxObj5=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj5=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (ajaxObj5!=null)
	{
		var url = "trade/delOrder.php?order_id="+order_id+"&n="+Math.random();
		ajaxObj5.onreadystatechange = delOrderResponse;
		ajaxObj5.open("GET", url, true);
		ajaxObj5.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj5.send(null);
	}
}

function delOrderResponse()
{
	if (ajaxObj5.readyState == 4)
	{
		if (ajaxObj5.status == 200)
		{
			var result = ajaxObj5.responseText;
			if (result == "succ")
			{
				alert("您已成功撤掉该委单");
				window.location.reload();
				return;
			}
			else alert("撤单失败，失败原因"+result);
		}
	}
}

function submitOrder(type)
{
	var price = document.getElementById("price"+type).value;
	var amount = document.getElementById("amount"+type).value;
	var totalBalance = document.getElementById("totalBalance"+type).value;
	var min=<?php echo json_encode($mintrade);?>;
	if (isNaN(price) || isNaN(amount) || parseFloat(price) <= 0 || parseFloat(amount) <= 0)
	{
		alert("请正确输入挂单价格和数量。");
		return;
	}
	minprice=parseFloat(eval('min.'+ecoinName.toLowerCase()));
	minprice=minprice>0?minprice:1;
	if (ecoinName=='CNY' && parseFloat(totalBalance) < minprice)
	{
		alert("对不起，您的挂单金额太小，现在不支持交易额在"+minprice+"元以下的挂单");
		return;
	}
	
	if (type == "1")
	{
		if (parseFloat(totalBalance) > parseFloat(document.getElementById("cny_balance1").value))
		{
			alert("<?php echo $current_ecoin;?>余额不足，您挂单的成交额已经超出了您的<?php echo $current_ecoin;?>余额。");
			return;
		}
	}
	else if (type == "2")
	{
		if (parseFloat(amount) > parseFloat(document.getElementById("coin_balance2").value))
		{
			alert(coinName+"余额不足，您挂单的"+coinName+"数量已经超出了您的"+coinName+"余额。");
			return;
		}
	}
	
	if (type == "1") document.getElementById("submitOrderBTN"+type).innerHTML = "<img src=\"statics/images/v9/m_confirm_buy_gray.png\">";
	else if (type == "2") document.getElementById("submitOrderBTN"+type).innerHTML = "<img src=\"statics/images/v9/m_confirm_sell_gray.png\">";
	
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
		var url = "trade/newOrder.php?coinname="+coinName+"&exchange_coins="+ecoinName+"&type="+type+"&price="+price+"&amount="+amount+"&n="+Math.random();
		ajaxObj.onreadystatechange = newOrderResponse;
		ajaxObj.open("GET", url, true);
		ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj.send(null);
	}
}

function newOrderResponse()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			if (ajaxObj.responseText == "succ")
			{
				alert("您已成功挂单");
				window.location.reload();
				return;
			}
			else if (ajaxObj.responseText == "system_busy")
			{
				alert("系统繁忙，您的挂单可能没有成功，请您核查。");
				window.location.reload();
				return;
			}
			else if (ajaxObj.responseText == "zombie")
			{
				alert("您的帐号太多，本帐号的交易功能已被关闭，若您有交易需求，请使用您的其它帐号，给您带来不便，我们深表歉意。");
				return;
			}
			else if (ajaxObj.responseText == "wrongmd5")
			{
				alert("您的登录信息已失效，请点击右上角QQ头像旁边的“退出登录”按钮，重新登录");
				return;
			}
			else
			{
				alert("挂单失败，失败原因：" + ajaxObj.responseText);
				return;
			}
		}
	}
}

function displayBuyBanner()
{
	if (isLogin)
	{
		document.getElementById("sellBox").style.display="none";
		document.getElementById("buyBox").style.display="block";
		document.getElementById("price1").value=document.getElementById("sell1Price").innerHTML;
		getUserBalance();
	}
	else
	{
		alert("对不起，请先登录再操作。");
	}
}
function displaySellBanner()
{
	if (isLogin)
	{
		document.getElementById("buyBox").style.display="none";
		document.getElementById("sellBox").style.display="block";
		document.getElementById("price2").value=document.getElementById("buy1Price").innerHTML;
		getUserBalance();
	}
	else
	{
		alert("对不起，请先登录再操作。");
	}
}

function getUserBalance(type)
{
	if (window.XMLHttpRequest)
	{
		ajaxObj3=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj3=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if (ajaxObj3!=null)
	{
		var url = "trade/getUserBalance.php?n="+Math.random();
		ajaxObj3.onreadystatechange = updateUserBalance;
		ajaxObj3.open("GET", url, true);
		ajaxObj3.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj3.send(null);
	}
}

function updateUserBalance()
{
	if (ajaxObj3.readyState == 4)
	{
		if (ajaxObj3.status == 200)
		{
			var result = ajaxObj3.responseText;
			if (result.length > 32)
			{
				var jsonObj = eval( "(" + result + ")" );
				
				var coin_balance = "0.000000";
				coin_balance = eval('jsonObj.'+coinName.toLowerCase()+'_balance');
				cny_balance=eval('jsonObj.'+ecoinName.toLowerCase()+'_balance');
				document.getElementById("cny_balance1").value = cny_balance;
				document.getElementById("cny_balance2").value = cny_balance;
				document.getElementById("coin_balance1").value = coin_balance;
				document.getElementById("coin_balance2").value = coin_balance;
				initInputsNum();
			}
		}
	}
}

function initInputsNum()
{
	if (parseFloat(document.getElementById("price1").value) > 0) document.getElementById("maxNum1").value = (parseFloat(document.getElementById("cny_balance1").value) / parseFloat(document.getElementById("price1").value)).bidcmsToFixed(6).toString();
	else document.getElementById("maxNum1").value = "0.000000";
	
	document.getElementById("amount1").value = document.getElementById("maxNum1").value;
	document.getElementById("actuallyGet1").value = (parseFloat(document.getElementById("amount1").value) * t_fee).bidcmsToFixed(6).toString();
	document.getElementById("totalBalance1").value = (parseFloat(document.getElementById("price1").value) * parseFloat(document.getElementById("amount1").value)).bidcmsToFixed(6).toString();
	
	document.getElementById("maxNum2").value = (parseFloat(document.getElementById("coin_balance2").value) * parseFloat(document.getElementById("price2").value)).bidcmsToFixed(9).toString();
	document.getElementById("amount2").value = document.getElementById("coin_balance2").value;
	document.getElementById("totalBalance2").value = (parseFloat(document.getElementById("price2").value) * parseFloat(document.getElementById("amount2").value)).bidcmsToFixed(6).toString();
	document.getElementById("actuallyGet2").value = (parseFloat(document.getElementById("totalBalance2").value) * t_fee).bidcmsToFixed(6).toString();
}

function resetInputsNumByPrice1()
{
	var point_pos = document.getElementById("price1").value.indexOf(".");
	
	if (point_pos >= 0 && point_pos + 10 < document.getElementById("price1").value.length)
		document.getElementById("price1").value = document.getElementById("price1").value.substring(0, point_pos + 10);
	
	if (parseFloat(document.getElementById("price1").value) > 0)
		document.getElementById("maxNum1").value = (parseFloat(document.getElementById("cny_balance1").value) / parseFloat(document.getElementById("price1").value)).bidcmsToFixed(6).toString();
	else
		document.getElementById("maxNum1").value = "0.000000";
	
	document.getElementById("totalBalance1").value = (parseFloat(document.getElementById("price1").value) * parseFloat(document.getElementById("amount1").value)).bidcmsToFixed(6).toString();
}

function resetInputsNumByPrice2()
{
	var point_pos = document.getElementById("price2").value.indexOf(".");
	
	if (point_pos >= 0 && point_pos + 10 < document.getElementById("price2").value.length)
		document.getElementById("price2").value = document.getElementById("price2").value.substring(0, point_pos + 10);
	
	document.getElementById("maxNum2").value = (parseFloat(document.getElementById("coin_balance2").value) * parseFloat(document.getElementById("price2").value)).bidcmsToFixed(6).toString();
	document.getElementById("totalBalance2").value = (parseFloat(document.getElementById("price2").value) * parseFloat(document.getElementById("amount2").value)).bidcmsToFixed(6).toString();
	document.getElementById("actuallyGet2").value = (parseFloat(document.getElementById("totalBalance2").value) * t_fee).bidcmsToFixed(6).toString();
}

function resetInputsNumByAmount1()
{
	var point_pos = document.getElementById("amount1").value.indexOf(".");
	
	if (point_pos >= 0 && point_pos + 7 < document.getElementById("amount1").value.length)
		document.getElementById("amount1").value = document.getElementById("amount1").value.substring(0, point_pos + 7);
	
	document.getElementById("actuallyGet1").value = (parseFloat(document.getElementById("amount1").value) * t_fee).bidcmsToFixed(6).toString();
	document.getElementById("totalBalance1").value = (parseFloat(document.getElementById("price1").value) * parseFloat(document.getElementById("amount1").value)).bidcmsToFixed(6).toString();
}

function resetInputsNumByAmount2()
{
	var point_pos = document.getElementById("amount2").value.indexOf(".");
	
	if (point_pos >= 0 && point_pos + 7 < document.getElementById("amount2").value.length)
		document.getElementById("amount2").value = document.getElementById("amount2").value.substring(0, point_pos + 7);
	
	document.getElementById("totalBalance2").value = (parseFloat(document.getElementById("price2").value) * parseFloat(document.getElementById("amount2").value)).bidcmsToFixed(6).toString();
	document.getElementById("actuallyGet2").value = (parseFloat(document.getElementById("totalBalance2").value) * t_fee).bidcmsToFixed(6).toString();
}

getTradeInfo();
window.setInterval(getTradeInfo, 120000);

var ajaxObj6 = null;
var ajaxObj7 = null;
var ajaxObj8 = null;
$(document).ready(function(){
	getTimeLine();
});

function getDayLine()
{
	if (window.XMLHttpRequest)
	{
		ajaxObj7=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj7=new ActiveXObject("Microsoft.XMLHTTP");
	}

	if (ajaxObj7!=null)
	{
		var url = "trade/getTradeTimeLine.php?coinname="+coinName+"&exchange_coins="+ecoinName+"&type=2&n="+Math.random();
		ajaxObj7.onreadystatechange = displayDayLine;
		ajaxObj7.open("GET", url, true);
		ajaxObj7.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj7.send(null);
	}
}

function displayDayLine()
{
	if (ajaxObj7.readyState == 4)
	{
		if (ajaxObj7.status == 200)
		{
			var trade_day_line = eval(ajaxObj7.responseText);
			
			var datas = trade_day_line;
			var rates = [];
			var vols = [];
			for(i = 0; i < datas.length; i++){
				rates.push([
					datas[i][0],
					datas[i][2],
					datas[i][3],
					datas[i][4],
					datas[i][5]
				]);

				vols.push([
					datas[i][0],
					datas[i][1]
				])
			}

			Highcharts.setOptions({
				colors: ['#DD1111', '#FF0000', '#DDDF0D', '#7798BF', '#55BF3B', '#DF5353', '#aaeeee', '#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
				lang: {
					loading: 'Loading...',
					months: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					shortMonths: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					weekdays: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
					decimalPoint: '.',
					numericSymbols: ['k', 'M', 'G', 'T', 'P', 'E'],
					resetZoom: 'Reset zoom',
					resetZoomTitle: 'Reset zoom level 1:1',
					thousandsSep: ','
				},
				credits: {enabled: false},
				global: {useUTC: false}
			});

			trade_day_line.main_chart = new Highcharts.StockChart({
				chart: { renderTo: 'graphbox', width: 658},
				xAxis: { type: 'datetime' },
				legend: { enabled: false },
				plotOptions: { candlestick: {color: '#f01717', upColor: '#0ab92b'} },
				tooltip: { xDateFormat: '%Y-%m-%d %H:%M %A', color: '#f0f', changeDecimals: 4, borderColor: '#058dc7' },
				scrollbar: {enabled: false},
				navigator: {enabled: false},
				rangeSelector: {enabled: false},
				yAxis: [
					{ top: 35, height: 193, labels: { style: { color: '#CC3300' } }, title: { text: '价格', style: { color: '#CC3300' } }, gridLineDashStyle : 'Dash' },
					{ top: 228, height: 70, labels: { style: { color: '#4572A7' } }, title: { text: '成交量', style: { color: '#4572A7' } }, gridLineDashStyle : 'Dash', offset: 0 }
				],
				series: [
					{ animation: false, name: '成交量', type: 'column', color: '#4572A7', marker: { enabled: false }, yAxis: 1, data: vols },
					{ animation: false, name: '价格', type: 'candlestick', marker: { enabled: false }, data: rates }
				]
			});
		}
	}
}

function getTimeLine()
{
	if (window.XMLHttpRequest)
	{
		ajaxObj6=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj6=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if (ajaxObj6!=null)
	{
		var url = "trade/getTradeTimeLine.php?coinname="+coinName+"&exchange_coins="+ecoinName+"&n="+Math.random();
		ajaxObj6.onreadystatechange = displayTimeLine;
		ajaxObj6.open("GET", url, true);
		ajaxObj6.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj6.send(null);
	}
}

function displayTimeLine()
{
	if (ajaxObj6.readyState == 4)
	{
		if (ajaxObj6.status == 200)
		{
			var trade_time_line = eval(ajaxObj6.responseText);
			var volumeOf24Hours = 0;
			var balanceOf24Hours = 0;
			var time_line_length = trade_time_line.length;
			var t=new Date().getTime()-86400000;
			for (var i = 0; i < time_line_length; i++)
			{
				if(trade_time_line[time_line_length - i - 1][0]>t)
				{
					volumeOf24Hours += trade_time_line[time_line_length - i - 1][1];
					balanceOf24Hours += trade_time_line[time_line_length - i - 1][1]*trade_time_line[time_line_length - i - 1][5];
				}
			}
			document.getElementById("volumeOf24Hours").innerHTML = volumeOf24Hours.bidcmsToFixed(2).toString();
			document.getElementById("balanceOf24Hours").innerHTML = balanceOf24Hours.bidcmsToFixed(2).toString();
			
			var datas = trade_time_line;
			var rates = [];
			var vols = [];
			for(i = 0; i < datas.length; i++){
				rates.push([
					datas[i][0],
					datas[i][2],
					datas[i][3],
					datas[i][4],
					datas[i][5]
				]);

				vols.push([
					datas[i][0],
					datas[i][1]
				])
			}

			Highcharts.setOptions({
				colors: ['#DD1111', '#FF0000', '#DDDF0D', '#7798BF', '#55BF3B', '#DF5353', '#aaeeee', '#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
				lang: {
					loading: 'Loading...',
					months: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					shortMonths: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					weekdays: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
					decimalPoint: '.',
					numericSymbols: ['k', 'M', 'G', 'T', 'P', 'E'],
					resetZoom: 'Reset zoom',
					resetZoomTitle: 'Reset zoom level 1:1',
					thousandsSep: ','
				},
				credits: {enabled: false},
				global: {useUTC: false}
			});

			trade_time_line.main_chart = new Highcharts.StockChart({
				chart: { renderTo: 'graphbox', width: 658},
				xAxis: { type: 'datetime' },
				legend: { enabled: false },
				plotOptions: { candlestick: {color: '#f01717', upColor: '#0ab92b'} },
				tooltip: { xDateFormat: '%Y-%m-%d %H:%M %A', color: '#f0f', changeDecimals: 4, borderColor: '#058dc7' },
				scrollbar: {enabled: false},
				navigator: {enabled: false},
				rangeSelector: {enabled: false},
				yAxis: [
					{ top: 35, height: 193, labels: { style: { color: '#CC3300' } }, title: { text: '价格', style: { color: '#CC3300' } }, gridLineDashStyle : 'Dash' },
					{ top: 228, height: 70, labels: { style: { color: '#4572A7' } }, title: { text: '成交量', style: { color: '#4572A7' } }, gridLineDashStyle : 'Dash', offset: 0 }
				],
				series: [
					{ animation: false, name: '成交量', type: 'column', color: '#4572A7', marker: { enabled: false }, yAxis: 1, data: vols },
					{ animation: false, name: '价格', type: 'candlestick', marker: { enabled: false }, data: rates }
				]
			});
		}
	}
}

function get5minLine()
{
	if (window.XMLHttpRequest)
	{
		ajaxObj8=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		ajaxObj8=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if (ajaxObj8!=null)
	{
		var url = "trade/getTradeTimeLine.php?coinname="+coinName+"&exchange_coins="+ecoinName+"&type=1&n="+Math.random();
		ajaxObj8.onreadystatechange = display5minLine;
		ajaxObj8.open("GET", url, true);
		ajaxObj8.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj8.send(null);
	}
}

function display5minLine()
{
	if (ajaxObj8.readyState == 4)
	{
		if (ajaxObj8.status == 200)
		{
			var trade_5min_line = eval(ajaxObj8.responseText);
			
			var datas = trade_5min_line;
			var rates = [];
			var vols = [];
			for(i = 0; i < datas.length; i++){
				rates.push([
					datas[i][0],
					datas[i][2],
					datas[i][3],
					datas[i][4],
					datas[i][5]
				]);

				vols.push([
					datas[i][0],
					datas[i][1]
				])
			}

			Highcharts.setOptions({
				colors: ['#DD1111', '#FF0000', '#DDDF0D', '#7798BF', '#55BF3B', '#DF5353', '#aaeeee', '#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
				lang: {
					loading: 'Loading...',
					months: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					shortMonths: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					weekdays: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
					decimalPoint: '.',
					numericSymbols: ['k', 'M', 'G', 'T', 'P', 'E'],
					resetZoom: 'Reset zoom',
					resetZoomTitle: 'Reset zoom level 1:1',
					thousandsSep: ','
				},
				credits: {enabled: false},
				global: {useUTC: false}
			});

			trade_5min_line.main_chart = new Highcharts.StockChart({
				chart: { renderTo: 'graphbox', width: 658},
				xAxis: { type: 'datetime' },
				legend: { enabled: false },
				plotOptions: { candlestick: {color: '#f01717', upColor: '#0ab92b'} },
				tooltip: { xDateFormat: '%Y-%m-%d %H:%M %A', color: '#f0f', changeDecimals: 4, borderColor: '#058dc7' },
				scrollbar: {enabled: false},
				navigator: {enabled: false},
				rangeSelector: {enabled: false},
				yAxis: [
					{ top: 35, height: 193, labels: { style: { color: '#CC3300' } }, title: { text: '价格', style: { color: '#CC3300' } }, gridLineDashStyle : 'Dash' },
					{ top: 228, height: 70, labels: { style: { color: '#4572A7' } }, title: { text: '成交量', style: { color: '#4572A7' } }, gridLineDashStyle : 'Dash', offset: 0 }
				],
				series: [
					{ animation: false, name: '成交量', type: 'column', color: '#4572A7', marker: { enabled: false }, yAxis: 1, data: vols },
					{ animation: false, name: '价格', type: 'candlestick', marker: { enabled: false }, data: rates }
				]
			});
		}
	}
}
</script>
<?php include 'footer.php';?>
<a href="http://webscan.360.cn/index/checkwebsite/url/www.im61.com"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/479991304a3cb86b09eca6e42adab3a6"/></a>
</body>
</html>