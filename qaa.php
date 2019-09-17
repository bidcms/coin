<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>有问必答 小时代交易-诚信比特币,山寨币交易平台</title>
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
			<img src="statics/images/v9/m_icon_1.jpg" style="float:left; margin:9px 12px 0 0">
			<div style="font-size:28px">客服有问必答</div>
			<div style="font-size:14px">您可以在这里提交您遇到的问题，我们会尽最大努力为您解决。(工作时间9-23点)/div>
		</div>
		<div class="bk30"></div>
		<div style="width:866px; text-align:left" class="trade_info">
			<div style="font-size:20px; color:#009900">我的问题及状态 | <a href="JavaScript:showSubmitBox();" style="color:#CC8833">提交新问题</a></div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<div id="submitBox" style="display:none">
				<textarea maxlength=200 id="qaa_submit" onfocus="if(value=='请在这里输入您的问题信息(限200字)，我们的客服会尽快帮您解决(工作时间9-23点)'){value='';}" style="width:650px;height:120px;border:2px solid #336699;">请在这里输入您的问题信息(限200字)，我们的客服会尽快帮您解决(工作时间9-23点)</textarea>
				<br/>
				<a href="JavaScript:addQAA();"><img src="statics/images/v9/qaa_submit_btn.jpg"></a>
			</div>
			<div class="bk20"></div>
			<table width="866">
				<tr height=45 bgcolor="#eeeeee">
					<th width=158>当前排队问题数</th>
					<td width=275 bgcolor="#ffffff" id="qaa_now" style="color:red;font-size:15px">Loading</td>
					<th width=158>我们已解决的问题数</th>
					<td width=275 bgcolor="#ffffff" id="qaa_all" style="color:red;font-size:15px">Loading</td>
				</tr>
			</table>
			<div class="bk20"></div>
			<div id="QAACards"></div>

		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">为什么采用客服有问必答而不用QQ客服</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、QQ客服闲聊太多，影响工作效率，从以往的经验看，诸如在吗、你今年多大之类的问题十分影响处理问题的效率。<br>
				2、QQ客服无法多个客服同时并发地处理问题，容易堆积问题，用户发送QQ消息后，经常半天没有反馈，体验糟糕。<br>
				3、客服QQ号在不同的电脑登录后，无法对一个问题形成持续的跟踪，对解决问题造成门槛。<br>
				4、公司难以对QQ客服的质量进行监控和评测，难以针对性地对客服进行培训。<br>
				5、我们希望有问必答这个系统可以有效解决以上问题，最终更好地解决大家的问题。
			</div>
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
var ajaxObj3 = null;
if (window.XMLHttpRequest) ajaxObj=new XMLHttpRequest();
else if (window.ActiveXObject) ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");
if (ajaxObj!=null)
{
	var url = "trade/getMyQAA.php?n="+Math.random();
	ajaxObj.onreadystatechange = updateQAAInfo;
	ajaxObj.open("GET", url, true);
	ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj.send(null);
}
function setScore(qaaScore, qaa_id)
{
	if (window.XMLHttpRequest) ajaxObj4=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj4=new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj4!=null)
	{
		var url = "/trade/setQAAScore.php?qid="+qaa_id+"&score="+qaaScore+"&n="+Math.random();
		ajaxObj4.onreadystatechange = setScoreResult;
		ajaxObj4.open("GET", url, true);
		ajaxObj4.setRequestHeader("X-Requested-With","XMLHttpRequest");
		ajaxObj4.send(null);
	}
}

function setScoreResult()
{
	if (ajaxObj4.readyState == 4)
	{
		if (ajaxObj4.status == 200)
		{
			var result = ajaxObj4.responseText;
			if (result == "ok")
			{
				alert("感谢您的评价，我们会努力做得更好。");
				window.location.reload();
				return;
			}
		}
	}
}
function addQAA()
{
	var qaa_desc = document.getElementById("qaa_submit").value;
	if (qaa_desc.length < 20)
	{
		alert("您的问题过短，请详细描述一下");
		return;
	}
	
	if (window.XMLHttpRequest) ajaxObj2=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj2=new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj2!=null)
	{
		var url = "trade/addQAA.php?qaa_desc="+encodeURIComponent(qaa_desc)+"&n="+Math.random();
		ajaxObj2.onreadystatechange = submitQAAResult;
		ajaxObj2.open("GET", url, true);
		ajaxObj2.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj2.send(null);
	}
}

function submitQAAResult()
{
	if (ajaxObj2.readyState == 4)
	{
		if (ajaxObj2.status == 200)
		{
			var result = ajaxObj2.responseText;
			if (result == "succ")
			{
				alert("提交成功，请您耐心等待客服为您解决。");
				window.location.reload();
				return;
			}
			else if (result == "too_many")
			{
				alert("您当前提交的问题已经很多了，请等待前面的问题解决后再提交新的问题吧 ^_^");
				window.location.reload();
				return;
			}
			else
			{
				alert("提交失败");
				return;
			}
		}
	}
}

function showSubmitBox()
{
	document.getElementById("submitBox").style.display = '';
}
function showQAACard(margin_right, qaa_id, user_pic, user_nickname, qaa_desc, cs_pic, cs_nickname, cs_answer, qaa_score, qaa_status, qaa_time, qaa_queue)
{
	var score_str = "";
	if (qaa_score == "0") score_str = "对于这个回答，您感到：<a href=\"JavaScript:setScore('5', '"+qaa_id+"');\" style=\"color:#3377AA\">太棒了</a> | <a href=\"JavaScript:setScore('4', '"+qaa_id+"');\" style=\"color:#3377AA\">不错</a> | <a href=\"JavaScript:setScore('3', '"+qaa_id+"');\" style=\"color:#3377AA\">没感觉</a> | <a href=\"JavaScript:setScore('2', '"+qaa_id+"');\" style=\"color:#3377AA\">无语</a> | <a href=\"JavaScript:setScore('1', '"+qaa_id+"');\" style=\"color:#3377AA\">愤怒</a>";
	else if (qaa_score == "1") score_str = "对于这个回答，您感到愤怒，该客服考核-3分";
	else if (qaa_score == "2") score_str = "对于这个回答，您感到无语，该客服考核-1分";
	else if (qaa_score == "3") score_str = "对于这个回答，您感到没感觉。";
	else if (qaa_score == "4") score_str = "对于这个回答，您感到不错，该客服考核+1分";
	else if (qaa_score == "5") score_str = "对于这个回答，您感到太棒了，该客服考核+3分";
	if (qaa_status == "1") document.getElementById("QAACards").innerHTML = document.getElementById("QAACards").innerHTML +  "<div style=\"border:1px solid #AAAAAA;float:left;margin-right:" + margin_right + ";width:418px;height:368px\"><div style=\"background:#EEEEEE;width:402px;padding:8px;font-size:14px;color:#990000\">问题编号" + qaa_id + "<span style=\"float:right;color:#666666\">" + qaa_time + "</span> [<a href=\"JavaScript:delThisQAA('"+qaa_id+"');\" title=\"如果您的问题里面包含有敏感信息，我们强烈建议您在问题解决后删除掉它\" style=\"color:#3377AA\">删除</a>]</div><div style=\"padding:10px;width:418;font-size:13px;line-height:180%\"><img src=\"" + user_pic + "\" width=40 height=40 style=\"float:left;margin:5px 8px 0 0;\"><span style=\"font-weight:600;font-size:15px;color:#3377AA\">" + user_nickname +"：</span><br/>" + qaa_desc + "</div><hr size=1 color=#DDDDDD width=398 style=\"margin-left:10px\"/><div style=\"padding:10px;width:418;font-size:13px;line-height:180%\"><img src=\"" + cs_pic + "\" width=40 height=40 style=\"float:right;margin:5px 0 0 8px;\"><span style=\"font-weight:600;font-size:15px;color:#3377AA\">时代客服" + cs_nickname + "：</span><br/>" + cs_answer + "</div><hr size=1 color=#DDDDDD width=398 style=\"margin-left:10px\"/><div style=\"padding:10px;color:#007722;font-size:13px\">" + score_str + "</div></div>";
	else if (qaa_status == "0") document.getElementById("QAACards").innerHTML = document.getElementById("QAACards").innerHTML +  "<div style=\"border:1px solid #AAAAAA;float:left;margin-right:" + margin_right + ";width:418px;height:368px\"><div style=\"background:#EEEEEE;width:402px;padding:8px;font-size:14px\">问题编号" + qaa_id + "<span style=\"float:right\">2014-01-10 00:00:23</span></div><div style=\"padding:10px;width:418;font-size:13px;line-height:180%\"><img src=\"" + user_pic + "\" width=40 height=40 style=\"float:left;margin:5px 8px 0 0;\"><span style=\"font-weight:600;font-size:15px\">" + user_nickname +"：</span><br/>" + qaa_desc + "</div><hr size=1 color=#DDDDDD width=398 style=\"margin-left:10px\"/><div style=\"padding:10px;font-size:14px;line-height:180%\">该问题前面还有 <font color=red>" + qaa_queue + "</font> 个问题排队，请您稍候...<br/><span style=\"font-size:12px\">如果您的问题已经解决，您可以<a href=\"JavaScript:cancelQAA('" + qaa_id + "');\" style=\"color:#3377AA\">撤销该问题</a>，以减少我们客服的工作量</span></div></div>";
	else if (qaa_status == "5") document.getElementById("QAACards").innerHTML = document.getElementById("QAACards").innerHTML +  "<div style=\"border:1px solid #AAAAAA;float:left;margin-right:" + margin_right + ";width:418px;height:368px\"><div style=\"background:#EEEEEE;width:402px;padding:8px;font-size:14px\">问题编号" + qaa_id + "<span style=\"float:right\">2014-01-10 00:00:23</span></div><div style=\"padding:10px;width:418;font-size:13px;line-height:180%\"><img src=\"" + user_pic + "\" width=40 height=40 style=\"float:left;margin:5px 8px 0 0;\"><span style=\"font-weight:600;font-size:15px\">" + user_nickname +"：</span><br/>" + qaa_desc + "</div><hr size=1 color=#DDDDDD width=398 style=\"margin-left:10px\"/><div style=\"padding:10px;font-size:14px;line-height:180%\">技术同事正在处理您的问题，请您稍候</div></div>";
	else if (qaa_status == "6") document.getElementById("QAACards").innerHTML = document.getElementById("QAACards").innerHTML +  "<div style=\"border:1px solid #AAAAAA;float:left;margin-right:" + margin_right + ";width:418px;height:368px\"><div style=\"background:#EEEEEE;width:402px;padding:8px;font-size:14px\">问题编号" + qaa_id + "<span style=\"float:right\">2014-01-10 00:00:23</span></div><div style=\"padding:10px;width:418;font-size:13px;line-height:180%\"><img src=\"" + user_pic + "\" width=40 height=40 style=\"float:left;margin:5px 8px 0 0;\"><span style=\"font-weight:600;font-size:15px\">" + user_nickname +"：</span><br/>" + qaa_desc + "</div><hr size=1 color=#DDDDDD width=398 style=\"margin-left:10px\"/><div style=\"padding:10px;font-size:14px;line-height:180%\">财务同事正在处理您的问题，请您稍候</div></div>";
}
function updateQAAInfo()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			var arr = result.split("|");
			
			document.getElementById("qaa_now").innerHTML = arr[0];
			document.getElementById("qaa_all").innerHTML = arr[1];
			
			var qaa_table = document.getElementById("QAACards");
			
			if (arr[3] == "no_qaa")
			{
				qaa_table.innerHTML="您还没有向客服提交过问题。";
				return;
			}
			
			var jsonObj = eval( "(" + arr[3] + ")" );
			for (var i = 0; i < jsonObj.length; i++)
			{
				var margin_right = "0px";
				if (i % 2 == 0) margin_right = "26px";
				showQAACard(margin_right, jsonObj[i].id, glb_user_pic, glb_user_nickname, jsonObj[i].qaa_desc, "statics/images/v9/cs_pic.png", jsonObj[i].qaa_cser, jsonObj[i].qaa_answer, jsonObj[i].qaa_score, jsonObj[i].qaa_status, jsonObj[i].qaa_time, jsonObj[i].qaa_wait);

				if (i % 2 == 1) document.getElementById("QAACards").innerHTML = document.getElementById("QAACards").innerHTML + "<div class=\"bk30\"></div>";
				/*
				var newTr = qaa_table.insertRow(qaa_table.rows.length);
				newTr.style.height = "90px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].id;
				
				var newTd_2 = newTr.insertCell(1);
				newTd_2.innerHTML = jsonObj[i].qaa_desc + "<br>(" + jsonObj[i].qaa_time + ")";
				
				var newTd_3 = newTr.insertCell(2);
				if (jsonObj[i].qaa_status == 0) newTd_3.innerHTML = "该问题前面还有<font color=red>" + jsonObj[i].qaa_wait + "</font>个问题排队。如果您的问题已经解决，请 <a href=\"JavaScript:cancelQAA('" + jsonObj[i].id + "');\"><font color='#3377AA'>点此撤销该问题</font></a> ，以缓解我们客服的工作量，谢谢";
				else if (jsonObj[i].qaa_status == 1) newTd_3.innerHTML = jsonObj[i].qaa_answer;
				else if (jsonObj[i].qaa_status == 2) newTd_3.innerHTML = "该问题已被撤销";
				*/
			}
		}
	}
}

function cancelQAA(qaa_id)
{
	if (window.XMLHttpRequest) ajaxObj3=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj3=new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj3!=null)
	{
		var url = "trade/cancelQAA.php?qaa_id="+qaa_id+"&n="+Math.random();
		ajaxObj3.onreadystatechange = cancelQAAResult;
		ajaxObj3.open("GET", url, true);
		ajaxObj3.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj3.send(null);
	}
}

function cancelQAAResult()
{
	if (ajaxObj3.readyState == 4)
	{
		if (ajaxObj3.status == 200)
		{
			if (ajaxObj3.responseText == "succ")
			{
				alert("您的问题已经撤销，感谢您对客服工作的支持");
				window.location.reload();
				return;
			}
		}
	}
}
function delThisQAA(qaa_id)
{
	if (window.XMLHttpRequest) ajaxObj5=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj5=new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj5!=null)
	{
		var url = "/trade/delQAA.php?qid="+qaa_id+"&n="+Math.random();
		ajaxObj5.onreadystatechange = delThisQAAResult;
		ajaxObj5.open("GET", url, true);
		ajaxObj5.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj5.send(null);
	}
}

function delThisQAAResult()
{
	if (ajaxObj5.readyState == 4)
	{
		if (ajaxObj5.status == 200)
		{
			var result = ajaxObj5.responseText;
			if (result == "ok")
			{
				alert("您已经成功删除了一个问题");
				window.location.reload();
				return;
			}
		}
	}
}

</script>
<?php include 'footer.php';?>

</body>
</html>