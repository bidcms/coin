<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>绑定手机，让帐号更安全 小时代交易-诚信比特币,山寨币交易平台</title>
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
			<div style="font-size:28px">绑定手机，让帐号更安全！</div>
			<div style="font-size:14px">说明：绑定手机后，一些关键的操作将需要手机验证，万一您的帐号被盗或丢失，也可以保证您的财产安全。</div>
		</div>
		<div class="bk30"></div>
		<div width="100%">
			<div style="width:328px; float:left; margin-right:30px; text-align:left">
				<div style="font-size:20px; color:#FF9900; font-weight:600">我的绑定状态</div>
				<hr style="border:0; height:3px; width:238px; margin: 0 0 10px 0" color="#FFCC00">
				<div style="font-size:16px;" id="binding_status">您的帐号当前尚未绑定手机号，绑定手机号可以更好地保护帐号的安全。</div>
			</div>
			<div id="binding_new_tel" style="width:500px; float:left; text-align:left">
				<div style="font-size:20px; color:#00AA00; font-weight:600">绑定新的手机号码</div>
				<hr style="border:0; height:3px; width:268px; margin: 0 0 10px 0" color="#00DD00">
				<div style="font-size:16px;">
					<table width=500>
						<tr height=40>
							<td width=108>请输入手机号</td>
							<td width=392><input type="text" maxlength=11 name="tel_num" id="tel_num" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666"></td>
						</tr>
						<tr height=40>
							<td>请再次输入</td>
							<td><input type="text" maxlength=11 name="tel_num_1" id="tel_num_1" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666"></td>
						</tr>
						<tr height=40>
							<td></td>
							<td id="submitBTN"><a href="JavaScript:check_tel_num();"><img src="/statics/images/v9/m_btn_binding.png"></a></td>
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
			<div style="font-size:18px; color:#666666">绑定后，这些操作将需要验证你的手机号</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、修改或设定资金的转出地址（包括电子货币的提现地址和支付宝提现地址）<br />
				2、修改绑定的手机号（需要先验证当前绑定的手机号，方可修改为新的手机号）<br />
				3、帐号丢失后，若您希望找回帐号，可以找客服人员验证您绑定的手机号
			</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:18px; color:#666666">手机号验证流程</div>
			<hr style="border:0; height:3px; width:188px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				当您出现以上操作时，系统会拨打您的电话，请您接听，系统会通过语音将“验证码”告诉您，而后您将该验证码填到网页上即可，接听验证码电话是免费的。（如果您多次尝试都无法接到电话，请联系客服人员为您绑定手机号）
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
function check_tel_num()
{
	var tel_num = document.getElementById("tel_num").value;
	var tel_num_1 = document.getElementById("tel_num_1").value;
	if (tel_num != tel_num_1)
	{
		alert("两次输入的手机号不一样");
		return;
	}
	if (tel_num.length != 11)
	{
		alert("请输入正确的手机号(手机号为11位)");
		return;
	}
	if (tel_num.substr(0, 1) != "1")
	{
		alert("请输入正确的手机号。");
		return;
	}
	if (isNaN(tel_num) || tel_num.indexOf(".") > 0)
	{
		alert("请输入正确的手机号！");
		return;
	}
	
	var cookie_user_tel = "";
	var cookie_arr = document.cookie.split("; ");
	for (var i = 0; i < cookie_arr.length; i++)
	{
		var cookie_arr_item = cookie_arr[i].split("=");
		if (cookie_arr_item[0] == "bidcms_tel")
		{
			cookie_user_tel = cookie_arr_item[1];
			break;
		}
	}
	
	if (cookie_user_tel == tel_num)
	{
		alert("该手机号已绑定，无须重复操作。");
		return;
	}
	
	document.getElementById("tel_num").disabled = "disabled";
	document.getElementById("tel_num_1").disabled = "disabled";
	document.getElementById("submitBTN").innerHTML = "<img src=\"statics/images/v9/m_btn_binding_gray.png\">";
	document.getElementById("check_words").innerHTML = "确定要绑定 <font color=red>" + tel_num + "</font> 吗？<br/><a href=\"JavaScript:submitTel();\">确定</a> <a href=\"JavaScript:submitCancel();\">取消</a>";
	return;
}

function submitTel()
{
	document.getElementById("check_words").innerHTML = "提交中，请稍候...";
	submitTelAjax();
}

function submitCancel()
{
	document.getElementById("tel_num").value = "";
	document.getElementById("tel_num_1").value = "";
	document.getElementById("tel_num").disabled = "";
	document.getElementById("tel_num_1").disabled = "";
	document.getElementById("check_words").innerHTML = "";
	document.getElementById("submitBTN").innerHTML = "<a href=\"JavaScript:check_tel_num();\"><img src=\"statics/images/v9/m_btn_binding.png\"></a>";
}

var ajaxObj = null;
var ajaxObj2 = null;
function submitTelAjax()
{
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
		var url = "trade/binding.php?tel_num=" + document.getElementById("tel_num").value+"&n="+Math.random();
		ajaxObj.onreadystatechange = submitTelResult;
		ajaxObj.open("GET", url, true);
		ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj.send(null);
	}
}

function submitTelResult()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			if (result == "succ")
			{
				alert("您的帐号已成功绑定手机！");
				document.cookie = "bidcms_tel=" + document.getElementById("tel_num").value + "; path=/";
				window.location.reload();
				return;
			}
			if (result == "exist")
			{
				alert("该手机号已被其它帐号绑定，无法再次绑定，若有疑问请联系客服");
				window.location.reload();
				return;
			}
			if (result.substr(0,9) == "code_sent")
			{
				c=result.split('-');
				var cookie_user_tel = "";
				var cookie_arr = document.cookie.split("; ");
				for (var i = 0; i < cookie_arr.length; i++)
				{
					var cookie_arr_item = cookie_arr[i].split("=");
					if (cookie_arr_item[0] == "bidcms_tel")
					{
						cookie_user_tel = cookie_arr_item[1];
						break;
					}
				}
				wxnotice="(<a href='javascript:;' onclick=\"window.open('wxhelp.php','','width:300px;height:300px;');\">如何关注？</a>)";
				document.getElementById("check_words").innerHTML = "关注微信号”<?php echo $weixin;?>“并回复"+c[1]+"换取验证码"+wxnotice+"<br /><table width=300><tr><td width=108>请输入验证码</td><td width=72><input type=\"text\" maxlength=6 name=\"verify_code\" id=\"verify_code\" style=\"width: 60px; height: 20px; font-size: 14px; font-family: Verdana; color: #666666\"></td><td width=120 id=\"submitCodeStatus\"><a href=\"JavaScript:submitCode();\"><img src=\"/statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
				return;
			}
			
			document.getElementById("check_words").innerHTML = "对不起，系统故障，请联系客服。"+result;
			return;
		}
	}
}

function submitCode()
{
	var code = document.getElementById("verify_code").value;
	if (code.length != 6 || code.indexOf(".") > 0)
	{
		alert("请输入正确的验证码(发送到您微信中的的6位字符)");
		return;
	}
	document.getElementById("submitCodeStatus").innerHTML = "正在确认...";
	submitCodeAjax();
}

function submitCodeAjax()
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
		var url = "trade/checkCode.php?code=" + document.getElementById("verify_code").value + "&tel_num=" + document.getElementById("tel_num").value+"&n="+Math.random();
		ajaxObj2.onreadystatechange = submitCodeResult;
		ajaxObj2.open("GET", url, true);
		ajaxObj2.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj2.send(null);
	}
}

function submitCodeResult()
{
	if (ajaxObj2.readyState == 4)
	{
		if (ajaxObj2.status == 200)
		{
			var result = ajaxObj2.responseText;
			if (result == "succ")
			{
				alert("您已成功修改绑定手机号");
				var date=new Date();
				var expiresDays=1;
				date.setTime(date.getTime()+expiresDays*24*3600*1000);
				document.cookie = "bidcms_tel=" + document.getElementById("tel_num").value + "; path=/; expires=" + date.toGMTString();
				window.location.reload();
				return;
			}
			
			if (result == "wrongCode")
			{
				alert("验证码输入错误，请重试。");
				document.getElementById("submitCodeStatus").innerHTML = "<a href=\"JavaScript:submitCode();\"><img src=\"statics/images/v9/m_btn_submit.png\"></a>";
				return;
			}
			
			if (result == "overstep")
			{
				alert("您已提交了多次错误的验证码，请重新获取验证码。");
				window.location.reload();
				return;
			}
			
			document.getElementById("check_words").innerHTML = "对不起，系统故障，请联系客服。"+result;
			return;
		}
	}
}

if (isLogin == false)
{
	window.location.href="index.php";
}
</script>
<?php include 'footer.php';?>
</body>
</html>