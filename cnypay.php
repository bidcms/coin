<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>小时代CNY充值 小时代交易-诚信比特币,山寨币交易平台</title>
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
			<div style="font-size:28px">小时代CNY充值（虚拟币投资风险较大，请谨慎参与）</div>
			<div style="font-size:14px">由于第三方支付平台受政策限制，目前我们只支持银行转账这一个充值模式。</div>
		</div>
		<div class="bk30"></div>
		<div style="width:866px; text-align:left" class="trade_info">
			<div style="font-size:20px; color:#009900">选择支付方式</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<table width="866" id="depositTable">
				<tbody><tr height="50" bgcolor="#eeeeee">
					<th>支付方式</th>
					<th>服务时间</th>
					<th>到账时间</th>
					<th>优惠加送</th>
					<th>充值金额</th>
					<th>操作</th>
				</tr>
				<tr height="50">
					<th>网银转账/银行汇款</th>
					<td>9-23点</td>
					<td>服务时间内1小时到账</td>
					<td>赠送0.5%</td>
					<td><input type="input" id="Amount" name="Amount" value="1000" size="9" maxlength="6" style="font-size:14px; font-family: verdana; color: #990000; text-align: center"></td>
					<td id="payBTN"><a href="Javascript:submitPay();"><font color="#3377AA">确定充值</font></a></td>
				</tr>
				<tr id="bankInfoRow" style="display:none">
					<td colspan="6" height="360" bgcolor="#B2FFB2" align="left">
						<div style="text-align:left;padding:0 20px;line-height:200%;float:left;border-right:1px dashed #999;">
							收款银行：<font color="#3377AA"><b>招商银行太原市分行</b></font><br>
							收款户名：<font color="#3377AA"><b>李孟琦</b></font><br>
							收款帐号：<font color="#3377AA"><b>6225883510662658</b></font><br>
							收款支行：<font color="#3377AA"><b>学府街支行</b></font><br>
							转账备注：<span id="userID" style="color:red">Loading</span>(务必正确填写)

							<br/><br/>
							支付宝帐号：<font color="#3377AA"><b>vr21xt@163.com</b></font><br>
							收款户名：<font color="#3377AA"><b>李孟琦</b></font><br>
							转账备注：<span id="userID2" style="color:red">Loading</span>(务必正确填写)

						</div>
						<div style="text-align:left;padding:0 20px;line-height:200%;float:left">
							1、请将<span id="depositBalance" style="color:red">Loading</span>元人民币汇入左侧帐号(2选1)，我们会在收到您的款项后1小时内为您入账(9-23点)<br>
							2、请务必填写正确的备注，否则您的充值有可能无法到账<br>
							3、请您尽量选择实时汇款模式进行充值，如果不是实时模式，您的充值到账时间可能会较长<br>
							4、您下次充值时，不要直接将款项汇入该帐号，请先到本页面点击充值后再汇款<br>
							5、虚拟币投资风险较大，请保持冷静的心态，谨慎投资。<br>
							6、周末对公账户到账有延迟，建议选择招商银行账户充值。
						</div>
					</td>
				</tr>
				<!--<tr height="50">
					<th>第三方在线支付</th>
					<td>暂停服务</td>
					<td>1-15分钟</td>
					<td>赠送0.7%</td>
					<td>——</td>
					<td>——</td>
				</tr>-->
			</tbody></table>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">充值说明：</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、由于第三方支付平台受政策限制，目前我们只支持银行转账这一个充值模式。<a href="/btc/btc_news/623.html" target="_blank" style="color:#3377AA;font-weight:600;">查看汇款免费的银行卡</a><br>
				2、您充值以后，可以获得0.5%的额外赠送，比如您通过银行转账充值1000元，实际到达您的帐号为1005元。由于银行转账模式使我们的人力成本大大提高，因此我们不能像第三方在线支付一样为您赠送0.7%的额度，请您谅解。<br>
				<font color="red">3、汇款时，请您务必正确填写转账备注，如果您错填转账备注，我们将无法为您正确入账。</font><br>
				4、转账汇款所需的银行手续费由用户自行承担，实际上，很多银行卡都已经支持跨行实时免费转账，比如光大银行、招商银行金卡专业版等，我们建议您向银行咨询。<br>
				5、由于银行转账需要我们的财务为您人工入账，因此为了避免用户多笔小额充值给客服带来不必要的工作量，我们限制银行转账充值模式最低充值额度为100元，请您谅解。<br>
				6、您每笔充值，都需要先到本页面提交充值订单，这样我们的财务才能从后台看到您的充值申请，为您入账，如果您没有提交充值订单就直接转账，那么请补提一次充值订单。
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

function submitPay()
{
	if (isCert == false)
	{
		alert('对不起，您尚未填写实名认证信息，无法充值CNY');
		return;
	}

	if (isNaN(document.getElementById("Amount").value))
	{
		alert('请输入正确的充值金额');
		return;
	}
	
	if (parseFloat(document.getElementById("Amount").value) < 100)
	{
		alert('因银行转账需要耗费较多的人力，为避免小额多笔充值，我们限制最低充值金额为100元，请您谅解');
		return;
	}
	
	document.getElementById("payBTN").innerHTML = "正在提交";
	
	if (window.XMLHttpRequest) ajaxObj=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");

	if (ajaxObj!=null)
	{
		var url = "trade/saveBalance.php?coinname=cny&balance=" + document.getElementById("Amount").value.toString() + "&n=" + Math.random();
		ajaxObj.onreadystatechange = submitPayResult;
		ajaxObj.open("GET", url, true);
		ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj.send(null);
	}
}

function submitPayResult()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			if (result.substr(0, 4) == "addr")
			{
				mnotice=result.replace('addr','');
				document.getElementById("payBTN").innerHTML = "↓↓↓↓↓↓";
				document.getElementById("userID").innerHTML = mnotice;
				document.getElementById("userID2").innerHTML = mnotice;
				document.getElementById("depositBalance").innerHTML = document.getElementById("Amount").value.toString();
				document.getElementById("bankInfoRow").style.display = "";
				return;
			}
			else
			{
				alert("您尚未登录或发生其它错误");
				return;
			}
		}
	}
}
</script>
<?php include 'footer.php';?>
</body></html>