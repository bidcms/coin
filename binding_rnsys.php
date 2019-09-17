<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>实名认证 小时代交易-诚信比特币,山寨币交易平台</title>
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
			<div style="font-size:28px">实名认证系统</div>
			<div style="font-size:14px">说明：按人行五部委12月5日《通知》文件，遵循反洗钱精神，用户需要进行实名认证后方能进行人民币CNY充值提款。</div>
		</div>
		<div class="bk30"></div>
		<div width="100%">
			<div style="width:328px; float:left; margin-right:30px; text-align:left">
				<div style="font-size:20px; color:#FF9900; font-weight:600">我的认证状态</div>
				<hr style="border:0; height:3px; width:238px; margin: 0 0 10px 0" color="#FFCC00">
				<div style="font-size:14px;line-height:180%" id="rn_status">您的帐号当前尚未通过实名认证，请输入您的真实姓名和身份证信息以开启人民币充值提款功能。<br><font color=red>注意：您实名认证以后，您的人民币提现只能提到同一个姓名的银行卡中。</font></div>
			</div>
			<div id="rn_setting" style="width:500px; float:left; text-align:left">
				<div style="font-size:20px; color:#00AA00; font-weight:600">设置我的实名认证</div>
				<hr style="border:0; height:3px; width:268px; margin: 0 0 10px 0" color="#00DD00">
				<div style="font-size:16px;">
					<table width=500>
						<tr height=40>
							<td width=128>请输入真实姓名</td>
							<td width=372><input type="text" maxlength=4 name="real_name" id="real_name" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666" onblur="showNotice();"></td>
						</tr>
						<tr height=20 style="display:none" id="notice_row">
							<td></td>
							<td style="font-size:12px"><font color=red>注意：</font>认证后，CNY只能提到<span style="color:red" id="rn_span"></span>的银行卡</td>
						</tr>
						<tr height=40>
							<td>请输入身份证号</td>
							<td><input type="text" maxlength=18 name="cert_num" id="cert_num" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666"></td>
						</tr>
						<tr height=40>
							<td></td>
							<td id="submitBTN"><a href="JavaScript:checkInfo();"><img src="statics/images/v9/submit_rn.png"></a></td>
						</tr>
						<tr height=60>
							<td></td>
							<td><span id="check_words" class="check_words"></span></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:18px; color:#666666">实名认证以后，您会</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、获得更安全的帐号保护，凭借身份证信息可以证明帐号归属。<br />
				2、获得人民币充值和提款的权限。（不实名认证的用户无法充值CNY，也无法提走CNY）<br />
				3、人民币CNY提款，只能提到同一姓名的银行卡中。<br />
				4、无法随意更改认证信息，如果您希望修改，请使用您绑定的手机致电我们的客服。
			</div>
		</div>
		<div class="bk30"></div>
		<div class="bk30"></div>
    </div>
    <div class="trade_menu">
<?php include 'left.php';?>	

</div>
</div>
<script type="text/javascript" language="javascript">
if (isLogin == false) window.location.href="index.php";
var arr = document.cookie.split("; ");
for (var i = 0; i < arr.length; i++){
	if (arr[i].indexOf("=") < 0) continue;
	var cookie_arr_item = arr[i].split("=");
	if (cookie_arr_item[0] == "bidcms_credentials"){
		rn_info = cookie_arr_item[1];
		if (rn_info != "") {
			document.getElementById("rn_status").innerHTML = "您已经设置您的实名信息，身份证号码为：<br>" + rn_info + "********";
			document.getElementById("rn_setting").style.display = "none";
		}
		break;
	}
}
var ajaxObj = null;

function showNotice()
{
	document.getElementById("notice_row").style.display='';
	document.getElementById("rn_span").innerHTML = document.getElementById("real_name").value;
}

function isChn(str){
	var reg = /^[\u4E00-\u9FA5]+$/;
	if (!reg.test(str)) return false;
	else return true;
}

function checkInfo()
{
	var real_name = document.getElementById("real_name").value;
	var cert_num = document.getElementById("cert_num").value;
	if (real_name.indexOf(" ") >= 0)
	{
		alert("名字中不能有空格");
		return;
	}
	if (!isChn(real_name))
	{
		alert("名字必须是中文");
		return;
	}
	if (real_name.length < 2)
	{
		alert("请输入真实姓名");
		return;
	}
	if (cert_num.length < 18)
	{
		alert("身份证号码是18位的");
		return;
	}
	if (isNaN(cert_num.substr(0, 17)))
	{
		alert("身份证号码有误#1");
		return;
	}
	if (cert_num.substr(6, 2) != "19" && cert_num.substr(6, 2) != "20")
	{
		alert("身份证号码有误#2");
		return;
	}
	if (parseInt(cert_num.substr(10, 2), 10) < 1 || parseInt(cert_num.substr(10, 2), 10) > 12)
	{
		alert("身份证号码有误#3.");
		return;
	}
	if (parseInt(cert_num.substr(12, 2), 10) < 1 || parseInt(cert_num.substr(12, 2), 10) > 31)
	{
		alert("身份证号码有误#4");
		return;
	}
	
	document.getElementById("submitBTN").innerHTML = "<img src=\"statics/images/v9/submit_rn.png\">";
	
	if (window.XMLHttpRequest) ajaxObj=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");
	
	if (ajaxObj!=null)
	{
		var url = "trade/setCert.php?rn="+encodeURIComponent(real_name)+"&cn="+cert_num+"&n="+Math.random();
		ajaxObj.onreadystatechange = submitCertResult;
		ajaxObj.open("GET", url, true);
		ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj.send(null);
	}
}

function submitCertResult()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			if (result == "succ")
			{
				alert("您已完成实名设置。");
				var date=new Date();
				var expiresDays=1;
				date.setTime(date.getTime()+expiresDays*24*3600*1000);
				document.cookie = "bidcms_credentials=" + document.getElementById("cert_num").value.substr(0, 10) + "; path=/; expires=" + date.toGMTString();
				window.location.reload();
				return;
			}
			else
			{
				alert("发生了未知的错误，请您稍后再试");
				//window.location.reload();
				return;
			}
		}
	}
}
</script>
<?php include 'footer.php';?>

</body>
</html>