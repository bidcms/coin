<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>我的必得币和分红 小时代交易-诚信比特币,山寨币交易平台</title>
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
			<div style="font-size:28px">我的必得币和分红</div>
			<div style="font-size:14px">必得币(BID)是小时代免费赠送的分红权益凭证，点这里阅读详细规则《<a href="help.php" target="_blank" style="color:#3377AA">必得币分红计划</a>》</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">认购必得币</div>
			<hr style="border:0;height:3px;width:508px;margin:0 0 10px 0" color="#00DD00">
			<table class="tableBoder1" width="868">
				<tr height=40 bgcolor="#eeeeee">
					<th width=216>认购期数</th>
					<th width=216>认购数量</th>
					<th width=216>成功数量</th>
					<th width=216>认购时间</th>
					<th width=216>回购状态</th>
					<th width=216>操作</th>
				</tr>
				<tr height=40>
					<td style="font-weight:600">1</td>
					<td>500</td>
					<td id="reserve_succ">0</td>
					<td id="reserve_time">0</td>
					<td id="reserve_buy">0</td>
					<td id="re_btn"><a href="javascript:buyBid();">我要回购</a></td>
				</tr>
			</table>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">我的必得币总览</div>
			<hr style="border:0;height:3px;width:508px;margin:0 0 10px 0" color="#00DD00">
			<div style="margin:10px 0;padding:10px;width:846px;font-size:15px;color:#990000;background:#FFCCCC;border:solid 1px #990000;display:none;" id="balanceNotice"></div>
			<table class="tableBoder1" width="868">
				<tr height=40 bgcolor="#eeeeee">
					<th width=216>我的必得币总数量</th>
					<th width=216>可用的必得币</th>
					<th width=216>挂单的必得币</th>
					<th width=216>未成熟的必得币 <a href="JavaScript:alert('用户获得的必得币，均为“未成熟的必得币”，必得币需要7天的时间成熟，未成熟的必得币可以参加分红，但无法在交易市场上挂单，必得币成熟以后，可以正常交易。');" style="color:#3377AA;font-size:12px;font-weight:400">帮助</a></th>
				</tr>
				<tr height=40>
					<td id="myTotalTMC" style="font-weight:600">Loading</td>
					<td id="myActiveTMC">Loading</td>
					<td id="myLockTMC">Loading</td>
					<td id="myImmatureTMC">Loading</td>
				</tr>
			</table>
			<table width=868 style="display:none" id="myTMCStatusTable">
				<tr>
					<td id="myTMCStatus" height=40 align=center bgcolor="#DDEEFF">
						正在查询是否有已成熟的必得币...
					</td>
				</tr>
			</table>
			<table class="get_free_coins">
				<tr>
					<td valign=middle height="50"><div style="font-size:16px">必得币赠送进度&nbsp;&nbsp;</div></td>
					<td valign=middle><div style="margin-top:3px; padding: 2px 2px 2px 2px; text-align: left; width:500px; height:20px; background: url(/statics/images/v9/fill_bg.png) no-repeat;"><div id="tmc_giveaways_banner" style="width:99%; height:16px; background:#009900;"></div></div></td>
					<td valign=middle>&nbsp;&nbsp;<span id="tmc_giveaways">Loading</span>/16000000</td>
				</tr>
			</table>
			<div style="font-size:13px">
			<b>说明：</b>您每周的分红数额 = (分红总额 / 已送出必得币数量) * 你的必得币数量。获赠必得币请查看详细规则《<a href="help.php" target="_blank" style="color:#3377AA">必得币分红计划</a>》<br/>
			未成熟的必得币需要7天的时间成熟，7天后，您可以通过点击“接收”按钮来获得它。
			</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">我的必得币获取记录</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<div style="height:37px;width:800px;margin:10px 0">
				<div style="float:left;height:37px;width:301px;background:url(/statics/images/v9/tmc_status_2_5.png) no-repeat;margin-right:15px"><span style="color:#990000;position:relative;left:129px;top:10px;" id="today_tmc">Loading</span></div>
				<div style="float:left;height:37px;width:186px;background:url(/statics/images/v9/tmc_status_3.png) no-repeat;margin-right:15px"><span style="color:#990000;position:relative;left:133px;top:10px;" id="newbie_tmc">Loading</span></div>
			</div>
			<table class="tableBoder1" width="868" id="myTMCTable">
				<tr height=40 bgcolor="#eeeeee">
					<th width=238>获取时间</th>
					<th width=280>获取原因</th>
					<th width=220>获取数量</th>
					<th width=130>成熟状态 <a href="JavaScript:alert('用户获得的必得币，均为“未成熟的必得币”，必得币需要7天的时间成熟，未成熟的必得币可以参加分红，但无法在交易市场上挂单，必得币成熟以后，可以正常交易。');" style="color:#3377AA;font-size:12px;font-weight:400">帮助</a></th>
				</tr>
				<tr height=40>
					<td colspan=4 align=center>正在加载必得币记录...</td>
				</tr>
			</table>
			<div style="font-size:13px;margin-top:10px">
			<b>说明：</b><font color="red">为了账户安全和避免小号刷币，您必须绑定手机号以后，才能够获得系统赠送的必得币。</font>
			</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">我的分红记录</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<table class="tableBoder1" width="868" id="myBonusTable">
				<tr height=40 bgcolor="#eeeeee">
					<th width=208>分红时间</th>
					<th width=300>我的必得币数量（四舍五入取整）</th>
					<th width=180>每个必得币可得</th>
					<th width=180>总共获得分红</th>
				</tr>
				<tr height=40>
					<td colspan=4 align=center>正在加载我的分红记录</td>
				</tr>
			</table>
			<div style="font-size:13px;margin-top:10px">
			<b>说明：</b>每周五凌晨，我们会对过去7天的CNY手续费进行分红，若遇上节假日，分红时间会顺延。<br/>
			其它分红问题请阅读详细规则《<a href="help.php" target="_blank" style="color:#3377AA">必得币分红计划</a>》
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
var ajaxObj4 = null;
var ajaxObj5 = null;
var ajaxObj6 = null;
var ajaxObj7 = null;
if (window.XMLHttpRequest)
{
	ajaxObj = new XMLHttpRequest();
	ajaxObj2 = new XMLHttpRequest();
	ajaxObj3 = new XMLHttpRequest();
	ajaxObj6 = new XMLHttpRequest();
	ajaxObj7 = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
	ajaxObj = new ActiveXObject("Microsoft.XMLHTTP");
	ajaxObj2 = new ActiveXObject("Microsoft.XMLHTTP");
	ajaxObj3 = new ActiveXObject("Microsoft.XMLHTTP");
	ajaxObj6 = new ActiveXObject("Microsoft.XMLHTTP");
	ajaxObj7 = new ActiveXObject("Microsoft.XMLHTTP");
}

if (ajaxObj!=null)
{
	var url = "trade/getBidAmount.php?n=" + Math.random();
	ajaxObj.onreadystatechange = updateBIDAmount;
	ajaxObj.open("GET", url, true);
	ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj.send(null);
}

if (ajaxObj2!=null)
{
	var url = "trade/getBidList.php?n=" + Math.random();
	ajaxObj2.onreadystatechange = updateBIDList;
	ajaxObj2.open("GET", url, true);
	ajaxObj2.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj2.send(null);
}

if (ajaxObj3!=null)
{
	var url = "trade/getMyBonus.php?n=" + Math.random();
	ajaxObj3.onreadystatechange = updateMyBonus;
	ajaxObj3.open("GET", url, true);
	ajaxObj3.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj3.send(null);
}
if (ajaxObj7!=null)
{
	var url = "trade/getReserve.php?n=" + Math.random();
	ajaxObj7.onreadystatechange = updateMyReserve;
	ajaxObj7.open("GET", url, true);
	ajaxObj7.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj7.send(null);
}
function updateMyReserve()
{
	if (ajaxObj7.readyState == 4)
	{
		if (ajaxObj7.status == 200)
		{
			var result = ajaxObj7.responseText;
			if(result!='wrongmd5')
			{
				var data=eval("("+ajaxObj7.responseText+")");
				document.getElementById('reserve_succ').innerHTML=data.balance;
				document.getElementById('reserve_time').innerHTML=data.updatetime;
				document.getElementById('reserve_buy').innerHTML=data.status;
				if(data.status==1)
				{
					document.getElementById('re_btn').innerHTML='已经回购';
				}
				
			}
		}
	}
}
function buyBid()
{
	var url = "trade/buyBid.php?n=" + Math.random();
	ajaxObj6.onreadystatechange = updateBIDBuy;
	ajaxObj6.open("GET", url, true);
	ajaxObj6.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj6.send(null);
}
function updateBIDBuy()
{
	if (ajaxObj6.readyState == 4)
	{
		if (ajaxObj6.status == 200)
		{
			var result = ajaxObj6.responseText;
			if(result=='wrongmd5')
			{
				alert("请登录后回购");
				return;
			}
			else if(result=='zombie')
			{
				alert("用户由于多次恶意操作被冻结。");
				return;
			}
			else if(result=='succ')
			{
				alert("恭喜你回购成功,资金已经返还到你的帐户中。");
				window.location.reload();
				return;
			}
			else if(result=='timeout')
			{
				alert("回购未开始或暂停。");
				return;
			}
			else
			{
				alert("信息错误");
				return;
			}
		}
	}
}
function reserveBid()
{
	var url = "trade/reserveBid.php?n=" + Math.random();
	ajaxObj6.onreadystatechange = updateBIDReserve;
	ajaxObj6.open("GET", url, true);
	ajaxObj6.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj6.send(null);
}
function updateBIDReserve()
{
	if (ajaxObj6.readyState == 4)
	{
		if (ajaxObj6.status == 200)
		{
			var result = ajaxObj6.responseText;
			if(result=='wrongmd5')
			{
				alert("请登录后认购");
				return;
			}
			else if(result=='zombie')
			{
				alert("用户由于多次恶意操作被冻结。");
				return;
			}
			else if(result=='succ')
			{
				alert("恭喜你认购成功。");
				window.location.reload();
				return;
			}
			else if(result=='balance')
			{
				alert("对不起，资金不足。");
				return;
			}
			else if(result=='timeout')
			{
				alert("首期认购已暂停。");
				return;
			}
			else
			{
				alert("每个人只能认购一次哦");
				return;
			}
		}
	}
}
function updateMyBonus()
{
	if (ajaxObj3.readyState == 4)
	{
		if (ajaxObj3.status == 200)
		{
			var result = ajaxObj3.responseText;
			var myBonusTable = document.getElementById("myBonusTable");
			if (result == "no_bonus")
			{
				myBonusTable.rows[1].cells[0].innerHTML = "您目前没有获得分红的记录";
				return;
			}
			myBonusTable.deleteRow(1);
			var jsonObj = eval( "(" + result + ")" );
			for (var i = 0; i < jsonObj.length; i++)
			{
				var newTr = myBonusTable.insertRow(myBonusTable.rows.length);
				newTr.style.height = "40px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].time;
				
				var newTd_2 = newTr.insertCell(1);
				newTd_2.innerHTML = jsonObj[i].amount;
				
				var newTd_3 = newTr.insertCell(2);
				newTd_3.innerHTML = jsonObj[i].balance;
				
				var newTd_4 = newTr.insertCell(3);
				newTd_4.innerHTML = (parseFloat(jsonObj[i].amount) * parseFloat(jsonObj[i].balance)).bidcmsToFixed(6).toString();
			}
		}
	}
}

function updateBIDList()
{
	if (ajaxObj2.readyState == 4)
	{
		if (ajaxObj2.status == 200)
		{
			var result = ajaxObj2.responseText;
			var arr= new Array();
			arr = result.split("|");
			var today_tmc = arr[0];
			var total_vol = arr[1];
			result = arr[2];
			
			document.getElementById("today_tmc").innerHTML = today_tmc;

			if (parseFloat(total_vol) > 0) document.getElementById("newbie_tmc").innerHTML = "已获得";
			else document.getElementById("newbie_tmc").innerHTML = "未获得";
			
			var tmcListTable = document.getElementById("myTMCTable");
			if (result.length < 20)
			{
				tmcListTable.rows[1].cells[0].innerHTML = "您目前没有获得必得币BID的记录";
				return;
			}
			tmcListTable.deleteRow(1);
			var jsonObj = eval( "(" + result + ")" );
			for (var i = 0; i < jsonObj.length; i++)
			{
				var newTr = tmcListTable.insertRow(tmcListTable.rows.length);
				newTr.style.height = "40px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].time;
				
				var newTd_2 = newTr.insertCell(1);
				newTd_2.innerHTML = jsonObj[i].desc;
				
				var newTd_3 = newTr.insertCell(2);
				newTd_3.innerHTML = jsonObj[i].alteration;
				
				var newTd_4 = newTr.insertCell(3);
				if (jsonObj[i].imma == "n")
					newTd_4.innerHTML = "<font color='#990000'>未成熟</font>";
				else
					newTd_4.innerHTML = "<font color='#009900'>已成熟</font>";
			}
		}
	}
}

function updateBIDAmount()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			if (result.substr(0, 4) == "succ")
			{
				var arr= new Array();
				arr = result.split("|");
				document.getElementById("myTotalTMC").innerHTML = (parseFloat(arr[3]) + parseFloat(arr[4]) + parseFloat(arr[5])).bidcmsToFixed(6);
				document.getElementById("myActiveTMC").innerHTML = arr[3];
				document.getElementById("myLockTMC").innerHTML = arr[4];;
				document.getElementById("myImmatureTMC").innerHTML = arr[5] + " <a href=\"JavaScript:showBIDStatus();\">接收</a>";
				
				document.getElementById("tmc_giveaways").innerHTML = arr[2];
				document.getElementById("tmc_giveaways_banner").style.width = parseInt(parseInt(arr[2]) / 16000000 * 99).toString() + "%";
			}
		}
	}
}

function showBIDStatus()
{
	document.getElementById("myTMCStatusTable").style.display = '';
	
	if (window.XMLHttpRequest) ajaxObj4 = new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj4 = new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj4!=null)
	{
		var url = "trade/checkImma.php?n=" + Math.random();
		ajaxObj4.onreadystatechange = updateBIDStatus;
		ajaxObj4.open("GET", url, true);
		ajaxObj4.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj4.send(null);
	}
}

function updateBIDStatus()
{
	if (ajaxObj4.readyState == 4)
	{
		if (ajaxObj4.status == 200)
		{
			var result = ajaxObj4.responseText;
			if (result == "wrong_code")
			{
				alert("验证码错误，请重新输入");
				return;
			}
			var arr= new Array();
			arr = result.split("|");
			if (arr[0] == "noMature")
			{
				if (arr[1] == "noImmature") document.getElementById("myTMCStatus").innerHTML = "您当前没有未成熟的必得币";
				else document.getElementById("myTMCStatus").innerHTML = "您未成熟的必得币最快要到<font color='#CC0000'>" + arr[1] + "</font>成熟，现在不能接收噢 ^_^";
				return;
			}
			else if (arr[0] == "normalMature")
			{
				document.getElementById("myTMCStatus").innerHTML = "恭喜，您的<font color='#CC0000'>" + arr[1] + "</font>个必得币已成熟，刷新即可看到最新状态噢 ^_^";
				return;
			}
			else if (arr[0] == "zombieMature")
			{
				document.getElementById("myTMCStatus").innerHTML = "<table><tr><td>您的<font color='#CC0000'>" + arr[1] + "</font>个必得币已成熟，系统已拨打您绑定的手机并告知您验证码，请输入&nbsp;&nbsp;</td><td><input type=text size=4 maxlength=4 id=\"tmcImmaCode\" style=\"font-size:14px\"></td><td>&nbsp;&nbsp;<a href=\"JavaScript:checkImmaCode();\"><font color='#3377AA'>确认接收</font></a></td></tr></table>";
				return;
			}
		}
	}
}

function checkImmaCode()
{
	var code = document.getElementById("tmcImmaCode").value;
	if (window.XMLHttpRequest) ajaxObj4 = new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj4 = new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj4!=null)
	{
		var url = "trade/checkImma.php?code=" + code + "&n=" + Math.random();
		ajaxObj4.onreadystatechange = updateBIDStatus;
		ajaxObj4.open("GET", url, true);
		ajaxObj4.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj4.send(null);
	}
}
</script>
<?php include 'footer.php';?>
</body>
</html>