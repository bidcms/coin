<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>我的委单 小时代交易-诚信比特币,山寨币交易平台</title>
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
<div class="main">
	<div class="trade_main">
		<div>
			<img src="/statics/images/v9/m_icon_1.jpg" style="float:left; margin:9px 12px 0 0">
			<div style="font-size:28px">我的委单</div>
			<div style="font-size:14px">说明：当您挂单后，当前没有成交的单会显示在这里，如果已成交，则只会显示在成交记录中。</div>
		</div>
		<div class="bk30"></div>
		<div style="width:866px; text-align:left" class="trade_info">
			<div style="font-size:20px; color:#009900">我当前的所有委单</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<table width="866" id="myOrderTable">
				<tr height=35 bgcolor="#eeeeee">
					<th width=190>挂单时间</th>
					<th width=108>挂单类型</th>
					<th width=108>币名</th>
					<th width=130>挂单价格</th>
					<th width=130>挂单数量</th>
					<th width=100>兑换币名</th>
					<th width=100>操作</th>
				</tr>
				<tr height="35">
					<td colspan=6>正在加载我的委托挂单数据</td>
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
<?php include 'left.php';?>
</div>
</div>
<script type="text/javascript" language="javascript">
if (isLogin == false)
{
	window.location.href="index.php";
}

var ajaxObj = null;
var ajaxObj2 = null;
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
	var url = "trade/getUserOrder.php?n="+Math.random();
	ajaxObj.onreadystatechange = updateUserOrderInfo;
	ajaxObj.open("GET", url, true);
	ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest");
	ajaxObj.send(null);
}

function updateUserOrderInfo()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			
			var myOrderTable = document.getElementById("myOrderTable");
			
			if (result == "no_order")
			{
				myOrderTable.rows[1].cells[0].innerHTML="您当前没有任何挂单记录";
				return;
			}
			
			myOrderTable.deleteRow(1);
			var jsonObj = eval( "(" + result + ")" );
			for (var i = 0; i < jsonObj.length; i++)
			{
				var newTr = myOrderTable.insertRow(myOrderTable.rows.length);
				newTr.style.height = "35px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].time.substring(5);
				
				var newTd_2 = newTr.insertCell(1);
				if (jsonObj[i].type == "1")
					newTd_2.innerHTML = "<font color=\"#00CC00\">买入</font>";
				else
					newTd_2.innerHTML = "<font color=\"#CC0000\">卖出</font>";
				
				var newTd_3 = newTr.insertCell(2);
				newTd_3.innerHTML = jsonObj[i].coinname.toLocaleUpperCase();
				
				var newTd_4 = newTr.insertCell(3);
				newTd_4.innerHTML = parseFloat(jsonObj[i].price).bidcmsToFixed(9).toString();
				
				var newTd_5 = newTr.insertCell(4);
				newTd_5.innerHTML = jsonObj[i].amount;
				
				var newTd_7 = newTr.insertCell(5);
				newTd_7.innerHTML = jsonObj[i].exchange_coin.toLocaleUpperCase();

				var newTd_6 = newTr.insertCell(6);
				newTd_6.id = "delOrder_" + jsonObj[i].id.toString();
				newTd_6.innerHTML = "<a href=\"JavaScript:delOrder('"+jsonObj[i].id+"')\"><font color=\"#3377AA\">撤单</font></a>";
			}
		}
	}
}

function delOrder(order_id)
{
	document.getElementById("delOrder_" + order_id).innerHTML = "正在提交...";
	
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
		var url = "trade/delOrder.php?order_id="+order_id+"&n="+Math.random();
		ajaxObj2.onreadystatechange = delOrderResponse;
		ajaxObj2.open("GET", url, true);
		ajaxObj2.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj2.send(null);
	}
}

function delOrderResponse()
{
	if (ajaxObj2.readyState == 4)
	{
		if (ajaxObj2.status == 200)
		{
			var result = ajaxObj2.responseText;
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
</script>
<?php include 'footer.php';?>
</body>
</html>