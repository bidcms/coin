<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>设置交易密码 小时代交易-诚信比特币,山寨币交易平台</title>
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
			<div style="font-size:28px">设置您的交易密码</div>
			<div style="font-size:14px">说明：您设置交易密码以后，每次登录后的首次挂单，需要输入交易密码，这样可以保障您的帐号安全。</div>
		</div>
		<div class="bk30"></div>
		<div width="100%">
			<div style="width:328px; float:left; margin-right:30px; text-align:left">
				<div style="font-size:20px; color:#FF9900; font-weight:600">我的交易密码状态</div>
				<hr style="border:0; height:3px; width:238px; margin: 0 0 10px 0" color="#FFCC00">
				<div style="font-size:16px;" id="trade_pwd_status">您当前的帐号尚未设置交易密码，设置交易密码有助于保护您的帐号安全。</div>
			</div>
			<div id="set_trade_pwd_div" style="width:500px; float:left; text-align:left">
				<div style="font-size:20px; color:#00AA00; font-weight:600">设置新的交易密码</div>
				<hr style="border:0; height:3px; width:268px; margin: 0 0 10px 0" color="#00DD00">
				<div style="font-size:16px;">
					<table width=500>
						<tr height=40 style="display:none" id="old_pwd">
							<td width=118>请输入旧密码</td>
							<td width=382><input type="password" maxlength=16 name="trade_pwd_old" id="trade_pwd_old" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666"></td>
						</tr>
						<tr height=40>
							<td width=118>请输入新密码</td>
							<td width=382><input type="password" maxlength=16 name="trade_pwd" id="trade_pwd" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666"></td>
						</tr>
						<tr height=40>
							<td>请再次输入</td>
							<td><input type="password" maxlength=16 name="trade_pwd_1" id="trade_pwd_1" style="width: 228px; height: 25px; font-size: 16px; font-family: Verdana; color: #666666"></td>
						</tr>
						<tr height=40>
							<td></td>
							<td id="submitBTN"><a href="JavaScript:check_pwd();"><img src="/statics/images/v9/m_btn_tradepwd.png"></a></td>
						</tr>
						<tr height=60>
							<td></td>
							<td><span id="check_words" class="check_words">密码最少6位，可包含任意字符。<br/><font color=red>请不要设置和QQ密码相同的交易密码</font></span></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:18px; color:#666666">设置交易密码后，您会</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、每次使用QQ登录小时代以后的首次挂单，需要输入交易密码才能挂单<br />
				2、登录后的第二次挂单开始，不再需要输入交易密码，直到您下次登录后，才会需要输入交易密码<br />
				3、这可以有效保护您的帐号安全，万一您的QQ号被盗，盗号者也无法动用您的资产<br />
				4、原则上，我们鼓励用户都设置自己的交易密码，交易密码设置以后，可以修改，但不能取消<br/>
				5、请不要设置和QQ密码相同的交易密码
			</div>
		</div>
		<div class="bk30"></div>
		<div class="bk30"></div>
    </div>
    <div class="trade_menu">
<?php include 'left.php';?></div>
</div>
<script type="text/javascript" language="javascript">
if (isLogin == false) window.location.href="index.php";

var arr = document.cookie.split("; ");
for (var i = 0; i < arr.length; i++){
	if (arr[i].indexOf("=") < 0) continue;
	var cookie_arr_item = arr[i].split("=");
	if (cookie_arr_item[0] == "bidcms_trade_pwd"){
		rn_info = cookie_arr_item[1];
		if (rn_info == "1") {
			document.getElementById("trade_pwd_status").innerHTML = "您已经设置了交易密码，每次登录后的首次挂单，您需要输入交易密码才能继续，这样可以保障您的帐号安全。<a href=\"JavaScript:showChangePwdDiv();\" style=\"color:#3377AA\">修改交易密码</a>";
			document.getElementById("set_trade_pwd_div").style.display = "none";
		}
		break;
	}
}

function showChangePwdDiv()
{
	document.getElementById("old_pwd").style.display = "";
	document.getElementById("set_trade_pwd_div").style.display = "";
	return;
}

var ajaxObj = null;

function check_pwd()
{
	var trade_pwd = document.getElementById("trade_pwd").value;
	var trade_pwd_1 = document.getElementById("trade_pwd_1").value;
	var trade_pwd_old = document.getElementById("trade_pwd_old").value;
	if (trade_pwd != trade_pwd_1)
	{
		alert("两次输入的密码不一样噢");
		return;
	}
	if (trade_pwd.length < 6 || trade_pwd_1.length < 6)
	{
		alert("密码最少需要6位噢");
		return;
	}
	
	document.getElementById("submitBTN").innerHTML = "<img src=\"statics/images/v9/m_btn_tradepwd.png\">";
	
	if (window.XMLHttpRequest) ajaxObj=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj!=null)
	{
		var url = "trade/setTradePWD.php?pwd=" + encodeURIComponent(trade_pwd) + "&oldpwd=" + encodeURIComponent(trade_pwd_old)+"&n="+Math.random();
		ajaxObj.onreadystatechange = submitPWDResult;
		ajaxObj.open("GET", url, true);
		ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj.send(null);
	}
	
	return;
}

function submitPWDResult()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			if (result == "succ")
			{
				alert("您已成功设置您的交易密码");
				var date=new Date();
				var expiresDays=1;
				date.setTime(date.getTime()+expiresDays*24*3600*1000);
				document.cookie = "bidcms_trade_pwd=1; path=/; expires=" + date.toGMTString();
				document.cookie = "bidcms_trade_pwd_is_need=1; path=/; expires=" + date.toGMTString();
				window.location.reload();
				return;
			}
			else if (result == "wrongpwd")
			{
				alert("您输入的旧密码有误，设置失败");
				window.location.reload();
				return;
			}
		}
	}
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
	document.getElementById("submitBTN").innerHTML = "<a href=\"JavaScript:check_tel_num();\"><img src=\"/statics/images/v9/m_btn_binding.png\"></a>";
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
		var url = "/trade/binding.php?tel_num=" + document.getElementById("tel_num").value+"&n="+Math.random();
		ajaxObj.onreadystatechange = submitTelResult;
		ajaxObj.open("GET", url, true);
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
				document.cookie = "BTC38_tel=" + document.getElementById("tel_num").value + "; path=/";
				window.location.reload();
				return;
			}
			if (result == "exist")
			{
				alert("该手机号已被其它帐号绑定，无法再次绑定，若有疑问请联系客服");
				window.location.reload();
				return;
			}
			if (result == "code_sent")
			{
				var cookie_user_tel = "";
				var cookie_arr = document.cookie.split("; ");
				for (var i = 0; i < cookie_arr.length; i++)
				{
					var cookie_arr_item = cookie_arr[i].split("=");
					if (cookie_arr_item[0] == "BTC38_tel")
					{
						cookie_user_tel = cookie_arr_item[1];
						break;
					}
				}
				
				document.getElementById("check_words").innerHTML = "系统将拨打您的手机并通过语音告知验证码，请接听<br /><table width=300><tr><td width=108>请输入验证码</td><td width=72><input type=\"text\" maxlength=4 name=\"verify_code\" id=\"verify_code\" style=\"width: 60px; height: 20px; font-size: 14px; font-family: Verdana; color: #666666\"></td><td width=120 id=\"submitCodeStatus\"><a href=\"JavaScript:submitCode();\"><img src=\"/statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
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
	if (code.length != 4 || isNaN(code) || code.indexOf(".") > 0)
	{
		alert("请输入正确的验证码(发送到您手机上的4位数字)");
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
	
	if (ajaxObj!=null)
	{
		var url = "/trade/checkCode.php?code=" + document.getElementById("verify_code").value + "&tel_num=" + document.getElementById("tel_num").value+"&n="+Math.random();
		ajaxObj2.onreadystatechange = submitCodeResult;
		ajaxObj2.open("GET", url, true);
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
				document.cookie = "BTC38_tel=" + document.getElementById("tel_num").value + "; path=/; expires=" + date.toGMTString();
				window.location.reload();
				return;
			}
			
			if (result == "wrongCode")
			{
				alert("验证码输入错误，请重试。");
				document.getElementById("submitCodeStatus").innerHTML = "<a href=\"JavaScript:submitCode();\"><img src=\"/statics/images/v9/m_btn_submit.png\"></a>";
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

</script>
<?php include 'footer.php';?>
</body>
</html>