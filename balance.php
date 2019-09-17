<?php
include 'inc/common.mini.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>资金管理-小时代交易-诚信比特币,山寨币交易平台</title>
<meta name="keywords" content="专业虚拟币交易平台,莱特币交易平台,BTC交易,LTC交易">
<meta name="description" content="小时代交易市场是专业的虚拟币交易平台，是支持比特币BTC交易、莱特币LTC交易、狗币DOGE交易、无限币LFC交易、安全币SRC交易等诸多币种的交易平台。">
<link href="statics/css/reset.css" rel="stylesheet" type="text/css" />
<link href="statics/css/default_blue.css?2" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="statics/js/jquery.min.js"></script>
<script type="text/javascript" src="statics/js/jquery.sgallery.js"></script>
<script type="text/javascript" src="statics/js/search_common.js?22"></script>
<link rel="icon" href="favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.png" type="image/x-icon" /> 

</head>
<body>
<?php include 'top.php';?>
<div class="main">
	<div class="trade_main">
		<div>
			<img src="statics/images/v9/m_icon_1.jpg" style="float:left; margin:9px 12px 0 0">
			<div style="font-size:28px">管理我的资金</div>
			<div style="font-size:14px">说明：如果您当前尚未绑定手机号，请尽快绑定，这样有助于保障您的资金安全。</div>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">我的资金一览表</div>
			<hr style="border:0;height:3px;width:508px;margin:0 0 10px 0" color="#00DD00">
			<div style="margin:10px 0;padding:10px;width:846px;font-size:15px;color:#990000;background:#FFCCCC;border:solid 1px #990000;display:none;" id="balanceNotice"></div>
			<table class="tableBoder1" width="868" id="balanceTable">
				<tr height=40 bgcolor="#eeeeee">
					<th width=90>资金名称</th>
					<th width=110>可用资金</th>
					<th width=110>挂单资金</th>
					<th width=110>总计</th>
					<th width=338>资金提款地址</th>
					<th width=110>操作</th>
				</tr>
				<tr height=38>
					<td>人民币(CNY)</td>
					<td id="cny_balance">Loading</td>
					<td id="cny_balance_lock">Loading</td>
					<td id="cny_balance_total">Loading</td>
					<td id="cny_addr" style="font-size:12px">Loading</td>
					<td><a href="cnypay.php">充值</a> <a href="JavaScript:showSettingRow('cny',1,'draw');">提款</a></td>
				</tr>
				<?php 
				$i=2;
				foreach($GLOBALS['coins'] as $k=>$v){?>
				<tr height=38>
					<td><?php echo $v;?>(<?php echo $k;?>)</td>
					<td id="<?php echo strtolower($k);?>_balance">Loading</td>
					<td id="<?php echo strtolower($k);?>_balance_lock">Loading</td>
					<td id="<?php echo strtolower($k);?>_balance_total">Loading</td>
					<td id="<?php echo strtolower($k);?>_addr" style="font-size:12px">Loading</td>
					<td><a href="JavaScript:showSettingRow('<?php echo strtolower($k);?>',<?php echo $i;?>,'save');">充值</a> <a href="JavaScript:showSettingRow('<?php echo strtolower($k);?>',<?php echo $i;?>,'draw');">提款</a> <span id="sync<?php echo strtolower($k);?>"><a href="JavaScript:sync('<?php echo strtolower($k);?>');" title="充值后点击同步，资金可立即到账">同步</a></span></td>
				</tr>
				<?php 
				$i++;
				}?>
			</table>
			<table class="tableBoder1" width="868" style="margin:10px 0">
				<tr height=38>
					<th bgcolor="#eeeeee" width=118>可用必得币(BID)</th>
					<td id="bid_balance" width=138>Loading</td>
					<th bgcolor="#eeeeee" width=118>挂单必得币(BID)</th>
					<td id="bid_balance_lock" width=138>Loading</td>
					<th bgcolor="#eeeeee" width=150>未成熟的必得币(BID)</th>
					<td id="bid_balance_immature" width=138>Loading</td>
					<td width=68><a href="bonus.php" target="_blank">查看详情</a></td>
				</tr>
			</table>
			<table class="tableBoder1" width="868">
				<tr height=40 bgcolor="#eeeeee">
					<th>账户总资产估算：<span style="color:#990000" id="totalBalance">Loading...</span>元人民币(CNY)</th>
				</tr>
			</table>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:20px; color:#009900">近期充值提款记录</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#00DD00">
			<table class="tableBoder1" width="868" id="balanceLogTable">
				<tr height=40 bgcolor="#eeeeee">
					<th width=98>订单号</th>
					<th width=130>类型</th>
					<th width=125>订单金额</th>
					<th width=180>时间</th>
					<th width=108>状态</th>
					<th width=125>实际到账金额</th>
					<th width=102>操作</th>
				</tr>
				<tr height=40>
					<td colspan=7 align=center id="balanceLogInfo"><a href="JavaScript:getBalanceLog();">点此加载近期充值提款记录</a></td>
				</tr>
			</table>
		</div>
		<div class="bk30"></div>
		<div style="width:850px; text-align:left">
			<div style="font-size:18px; color:#666666">服务标准说明</div>
			<hr style="border:0; height:3px; width:508px; margin: 0 0 10px 0" color="#999999">
			<div style="font-size:15px;">
				1、到账时间说明：人民币网银充值、虚拟币的充值提款，都由系统操作，实时到账。而人民币的提款每天17点前的提款订单会在当天到账、17点以后的提款订单需要次日到账。充值和提款目前是人工处理，工作时间内大约1小时到账(9-23点)。<br />
				2、充值资金将会获得额外1%的赠送（网银充值送0.7%），而提款资金则需要收取1%的手续费。比如，若您充值1000元，实际到账将为1010元（网银充值为1007元），若您提款10个比特币，实际到账为9.9个。<br />
				3、交易手续费为成交额的0.1%，以实际成交金额为基数进行计算。比如您购买了100个LTC，扣除手续费后，实际到账为99.9个LTC。<br />
				4、在您绑定了手机号以后，每次设定或修改资金的提款地址时，系统都会发送一条验证码到您的手机上，这样可以保障您的资金安全。<br />
				5、由于计算精度问题，我们最多为您保留6位小数，如果您在交易时的计算结果的小数位数大于6位，我们将采用四舍五入的方法最终保留6位小数（实际上，6位小数以后的金额已经没有什么价值了）
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
var coins=<?php echo json_encode($coins)?>;
var deposit_scale=<?php echo json_encode($deposit_scale);?>;
var withdrawal_scale=<?php echo json_encode($withdrawal_scale);?>;
var confirms=<?php echo json_encode($confirms);?>;
var minbalance=<?php echo json_encode($minbalance);?>;
cityArray = new Array();
cityArray[0] = new Array("北京","北京市");
cityArray[1] = new Array("上海","上海市");
cityArray[2] = new Array("天津","天津市");
cityArray[3] = new Array("重庆","重庆市");
cityArray[4] = new Array("河北","石家庄市|唐山市|秦皇岛市|邯郸市|邢台市|保定市|张家口市|承德市|沧州市|廊坊市|衡水市");
cityArray[5] = new Array("山西","太原市|大同市|阳泉市|长治市|晋城市|朔州市|运城市|忻州市|临汾市|吕梁市|晋中市");
cityArray[6] = new Array("内蒙古","呼和浩特市|包头市|乌兰察布市|阿拉善盟|锡林郭勒盟|兴安盟|乌海市|赤峰市|通辽市|鄂尔多斯市|呼伦贝尔市|巴彦淖尔市");
cityArray[7] = new Array("辽宁","沈阳市|大连市|抚顺市|本溪市|丹东市|锦州市|营口市|阜新市|辽阳市|盘锦市|铁岭市|朝阳市|鞍山市|葫芦岛市");
cityArray[8] = new Array("吉林","吉林市|辽源市|白山市|松原市|白城市|延边朝鲜族自治州|长春市|四平市|通化市");
cityArray[9] = new Array("黑龙江","齐齐哈尔市|牡丹江市|佳木斯市|大庆市|伊春市|鸡西市|鹤岗市|双鸭山市|七台河市|绥化市|哈尔滨市|黑河市|大兴安岭地区");
cityArray[10] = new Array("江苏","无锡市|徐州市|南京市|常州市|苏州市|南通市|连云港市|淮安市|盐城市|扬州市|镇江市|泰州市|宿迁市");
cityArray[11] = new Array("浙江","舟山市|台州市|杭州市|宁波市|温州市|嘉兴市|湖州市|绍兴市|金华市|衢州市|丽水市");
cityArray[12] = new Array("安徽","淮南市|马鞍山市|淮北市|铜陵市|安庆市|黄山市|滁州市|阜阳市|宣城市|合肥市|芜湖市|蚌埠市|宿州市|六安市|亳州市|池州市");
cityArray[13] = new Array("福建","福州市|厦门市|莆田市|三明市|泉州市|漳州市|南平市|龙岩市|宁德市");
cityArray[14] = new Array("江西","南昌市|赣州市|宜春市|吉安市|上饶市|萍乡市|新余市|鹰潭市|抚州市|九江市|景德镇市");
cityArray[15] = new Array("山东","济南市|青岛市|淄博市|枣庄市|东营市|烟台市|济宁市|泰安市|威海市|德州市|聊城市|日照市|滨州市|潍坊市|临沂市|菏泽市|莱芜市");
cityArray[16] = new Array("河南","洛阳市|开封市|郑州市|商丘市|安阳市|平顶山市|新乡市|焦作市|濮阳市|许昌市|漯河市|三门峡市|鹤壁市|周口市|驻马店市|南阳市|信阳市");
cityArray[17] = new Array("湖北","鄂州市|荆门市|黄冈市|孝感市|十堰市|荆州市|宜昌市|襄阳市|随州市|潜江市|恩施土家族苗族自治州|武汉市|黄石市|咸宁市");
cityArray[18] = new Array("湖南","株洲市|湘潭市|衡阳市|邵阳市|岳阳市|郴州市|湘西土家族苗族自治州|长沙市|益阳市|常德市|娄底市|怀化市|张家界市|永州市");
cityArray[19] = new Array("广东","广州市|深圳市|珠海市|汕头市|佛山市|韶关市|湛江市|肇庆市|江门市|茂名市|汕尾市|河源市|阳江市|清远市|梅州市|中山市|潮州市|揭阳市|云浮市|惠州市|东莞市");
cityArray[20] = new Array("广西","南宁市|贵港市|桂林市|梧州市|北海市|崇左市|贺州市|柳州市|来宾市|玉林市|百色市|河池市|钦州市|防城港市");
cityArray[21] = new Array("海南","三亚市|海口市|三沙市");
cityArray[22] = new Array("四川","成都市|绵阳市|自贡市|攀枝花市|泸州市|德阳市|广元市|遂宁市|内江市|乐山市|资阳市|宜宾市|南充市|达州市|雅安市|广安市|巴中市|眉山市|凉山彝族自治州|阿坝藏族羌族自治州|甘孜藏族自治州");
cityArray[23] = new Array("贵州","贵阳市|六盘水市|遵义市|安顺市|毕节市|铜仁市|黔西南布依族苗族自治州|黔南布依族苗族自治州|黔东南苗族侗族自治州");
cityArray[24] = new Array("云南","丽江市|保山市|文山壮族苗族自治州|昆明市|昭通市|曲靖市|玉溪市|普洱市|临沧市|迪庆藏族自治州|楚雄彝族自治州|红河哈尼族彝族自治州|西双版纳傣族自治州|大理白族自治州|德宏傣族景颇族自治州|怒江傈僳族自治州");
cityArray[25] = new Array("西藏","拉萨市|山南地区|日喀则地区|阿里地区|昌都地区|林芝地区|那曲地区");
cityArray[26] = new Array("陕西","西安市|宝鸡市|咸阳市|铜川市|汉中市|安康市|商洛市|延安市|榆林市|渭南市");
cityArray[27] = new Array("甘肃","陇南市|兰州市|嘉峪关市|金昌市|白银市|天水市|酒泉市|张掖市|武威市|定西市|平凉市|庆阳市|甘南藏族自治州|临夏回族自治州");
cityArray[28] = new Array("宁夏","银川市|石嘴山市|吴忠市|固原市|中卫市");
cityArray[29] = new Array("青海","海南藏族自治州|海西蒙古族藏族自治州|果洛藏族自治州|玉树藏族自治州|黄南藏族自治州|西宁市|海东地区|海北藏族自治州");
cityArray[30] = new Array("新疆","乌鲁木齐市|克拉玛依市|阿克苏地区|哈密地区|巴音郭楞蒙古自治州|昌吉回族自治州|博尔塔拉蒙古自治州|伊犁哈萨克自治州|克孜勒苏柯尔克孜自治州|吐鲁番地区|塔城地区|阿勒泰地区|喀什地区|和田地区");

function getCity(currProvince)
{
	var currProvincecurrProvince = currProvince;
	var i,j,k;
	
	document.all.selCity.length = 0;
	for (i = 0 ;i <cityArray.length;i++)   
	{
		if(cityArray[i][0]==currProvince)
		{
			tmpcityArray = cityArray[i][1].split("|");
			for(j=0;j<tmpcityArray.length;j++)
			{
				document.all.selCity.options[document.all.selCity.length] = new Option(tmpcityArray[j],tmpcityArray[j]);
			}
		}
	}
}

var ajaxObj = null;
var ajaxObj2 = null;
var ajaxObj3 = null;
var ajaxObj4 = null;
var ajaxObj5 = null;
var ajaxObj6 = null;
var ajaxObj7 = null;
var ajaxObj8 = null;
var ajaxObj9 = null;
var ajaxObj10 = null;
var ajaxObj11 = null;
var ajaxObj12 = null;
var log_page = 0;

if (window.XMLHttpRequest)
{
	ajaxObj=new XMLHttpRequest();
	ajaxObj6=new XMLHttpRequest();
	ajaxObj8=new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
	ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");
	ajaxObj6=new ActiveXObject("Microsoft.XMLHTTP");
	ajaxObj8=new ActiveXObject("Microsoft.XMLHTTP");
}

if (ajaxObj!=null)
{
	var url = "trade/getUserBalance.php?n=" + Math.random();
	ajaxObj.onreadystatechange = updateUserBalance;
	ajaxObj.open("GET", url, true);
	ajaxObj.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj.send(null);
}

if (ajaxObj8!=null)
{
	var url = "trade/getBalanceNotice.php?n=" + Math.random();
	ajaxObj8.onreadystatechange = updateBalanceNotice;
	ajaxObj8.open("GET", url, true);
	ajaxObj8.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
	ajaxObj8.send(null);
}

function getBalanceLog()
{
	document.getElementById("balanceLogInfo").innerHTML = "正在加载，请稍候...";
	if (ajaxObj6!=null)
	{
		var url = "trade/getUserBalanceLog.php?page="+log_page.toString()+"&n=" + Math.random();
		ajaxObj6.onreadystatechange = updateUserBalanceLog;
		ajaxObj6.open("GET", url, true);
		ajaxObj6.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj6.send(null);
		log_page++;
	}
}

function sync(coinname)
{
	document.getElementById("sync"+coinname).innerHTML = "同步中";
	
	if (window.XMLHttpRequest) ajaxObj11=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj11=new ActiveXObject("Microsoft.XMLHTTP");
	
	if (ajaxObj11!=null)
	{
		var poolurl = "trade/getBalanceSync.php?coinname=" + coinname + "&n=" + Math.random();
		ajaxObj11.onreadystatechange = function(){syncResult(coinname);}
		ajaxObj11.open("GET", poolurl, true);
		ajaxObj11.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj11.send(null);
	}
}

function syncResult(coinname)
{
	if (ajaxObj11.readyState == 4)
	{
		if (ajaxObj11.status == 200)
		{
			if(ajaxObj11.responseText!='')
			{
				alert(ajaxObj11.responseText);
			}
			else
			{
				var c=eval('confirms.'+coinname.toLowerCase());
				alert("同步完成，若充值仍未到账，请确认您的钱包转出记录是否已经有"+c+"个确认");
			}
			window.location.reload();
			return;
		}
		
	}
}

function updateBalanceNotice()
{
	if (ajaxObj8.readyState == 4)
	{
		if (ajaxObj8.status == 200)
		{
			var result = ajaxObj8.responseText;
			if (result != "normal")
			{
				document.getElementById("balanceNotice").style.display = "block";
				document.getElementById("balanceNotice").innerHTML = result;
			}
		}
	}
}

function updateUserBalanceLog()
{
	if (ajaxObj6.readyState == 4)
	{
		if (ajaxObj6.status == 200)
		{
			var result3 = ajaxObj6.responseText;
			var balanceLogTable = document.getElementById("balanceLogTable");
			if (result3.length < 20)
			{
				document.getElementById("balanceLogInfo").innerHTML = "没有更多的记录";
				return;
			}
			
			//balanceLogTable.deleteRow(1);
			document.getElementById("balanceLogInfo").innerHTML = "<a href=\"JavaScript:getBalanceLog();\">加载更多记录</a>";
			var jsonObj = eval( "(" + result3 + ")" );
			
			for (var i = 0; i < jsonObj.length; i++)
			{
				var newTr = balanceLogTable.insertRow(balanceLogTable.rows.length - 1);
				newTr.style.height = "40px";
				
				var newTd_1 = newTr.insertCell(0);
				newTd_1.innerHTML = jsonObj[i].id;
				
				var newTd_2 = newTr.insertCell(1);
				newTd_2.innerHTML = jsonObj[i].type;
				
				var newTd_3 = newTr.insertCell(2);
				newTd_3.innerHTML = jsonObj[i].desc;
				
				var newTd_4 = newTr.insertCell(3);
				newTd_4.innerHTML = jsonObj[i].time;
				
				var newTd_5 = newTr.insertCell(4);
				if (jsonObj[i].status == "0")
				{
					newTd_5.innerHTML = "<font color=\"#CC0000\">等待付款</font>";
				}
				else if (jsonObj[i].status == "1" || jsonObj[i].status == "5")
				{
					newTd_5.innerHTML = "<font color=\"#00CC00\">已到账</font>";
				}
				else if (jsonObj[i].status == "2")
				{
					newTd_5.innerHTML = "<font color=\"#666666\">确认数"+jsonObj[i].confirms+"</font>";
				}
				else if (jsonObj[i].status == "3")
				{
					newTd_5.innerHTML = "<font color=\"#666666\">已失效</font>";
				}
				else if (jsonObj[i].status == "4")
				{
					newTd_5.innerHTML = "<font color=\"#666666\">信息有误</font>";
				}
				
				var newTd_6 = newTr.insertCell(5);
				newTd_6.innerHTML = parseFloat(jsonObj[i].actually).bidcmsToFixed(6).toString();
				var newTd_7 = newTr.insertCell(6);
				if (jsonObj[i].status == "0")
				{
					newTd_7.id = "delBTN" + jsonObj[i].id;
					newTd_7.innerHTML = "<a href=\"JavaScript:delBalanceOrder('" + jsonObj[i].id + "');\">撤销订单</a>";
				}
			}
		}
	}
}

function delBalanceOrder(bo_id)
{
	document.getElementById("delBTN" + bo_id).innerHTML = "正在提交...";
	
	if (window.XMLHttpRequest) ajaxObj9 = new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj9 = new ActiveXObject("Microsoft.XMLHTTP");
	if (ajaxObj9!=null)
	{
		var url = "trade/delBalanceOrder.php?order_id=" + bo_id + "&n=" + Math.random();
		ajaxObj9.onreadystatechange = updateDelOrderResult;
		ajaxObj9.open("GET", url, true);
		ajaxObj9.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj9.send(null);
	}
}

function updateDelOrderResult()
{
	if (ajaxObj9.readyState == 4)
	{
		if (ajaxObj9.status == 200)
		{
			if (ajaxObj9.responseText == "succ")
			{
				alert("您已成功撤销该订单");
				window.location.reload();
				return;
			}
		}
	}
}

function updateUserBalance()
{
	if (ajaxObj.readyState == 4)
	{
		if (ajaxObj.status == 200)
		{
			var result = ajaxObj.responseText;
			if (result == "wrongmd5")
			{
				alert("您的登录信息已失效，请点击右上角QQ头像旁边的“退出登录”按钮，重新登录。");
				return;
			}
			
			if (result.length > 32)
			{
				var jsonObj = eval( "(" + result + ")" );
				
				document.getElementById("cny_addr").innerHTML = (jsonObj.cny_addr == "") ? "未设置（<a href=\"JavaScript:showSettingRow('cny', 1, 'setAddr');\">点此设置</a>）" : jsonObj.cny_addr.substr(0, 33) + "...";
				document.getElementById("cny_balance").innerHTML = jsonObj.cny_balance;
				document.getElementById("cny_balance_lock").innerHTML = jsonObj.cny_balance_lock;
				document.getElementById("cny_balance_total").innerHTML = (parseFloat(jsonObj.cny_balance) + parseFloat(jsonObj.cny_balance_lock)).bidcmsToFixed(6).toString();
				i=2;
				for(key in coins)
				{
					k=key.toLowerCase();
					document.getElementById(k+"_addr").innerHTML = (eval('jsonObj.'+k+'_addr') == "") ? "未设置（<a href=\"JavaScript:showSettingRow('"+k+"', "+i+", 'setAddr');\">点此设置</a>）" : eval('jsonObj.'+k+'_addr') + " <a href=\"JavaScript:showSettingRow('"+k+"', "+i+", 'setAddr');\">修改</a>";
					document.getElementById(k+"_balance").innerHTML = parseFloat(eval('jsonObj.'+k+'_balance')).bidcmsToFixed(6).toString();
					document.getElementById(k+"_balance_lock").innerHTML = parseFloat(eval('jsonObj.'+k+'_balance_lock')).bidcmsToFixed(6).toString();
					document.getElementById(k+"_balance_total").innerHTML = (parseFloat(eval('jsonObj.'+k+'_balance')) + parseFloat(eval('jsonObj.'+k+'_balance_lock'))).bidcmsToFixed(6).toString();
					i++;
				}
				document.getElementById("bid_balance").innerHTML = jsonObj.bid_balance;
				document.getElementById("bid_balance_lock").innerHTML = jsonObj.bid_balance_lock;
				document.getElementById("bid_balance_immature").innerHTML = jsonObj.bid_balance_immature;
			}
			
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
				var url = "trade/httpAPI.php?n=" + Math.random();
				ajaxObj7.onreadystatechange = updateTotalBalance;
				ajaxObj7.open("GET", url, true);
				ajaxObj7.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
				ajaxObj7.send(null);
			}
		}
	}
}

function updateTotalBalance()
{
	if (ajaxObj7.readyState == 4)
	{
		if (ajaxObj7.status == 200)
		{
			var result = ajaxObj7.responseText;
			var jsonObj = eval( "(" + result + ")" );
			var t=parseFloat(document.getElementById("cny_balance_total").innerHTML);
			for(key in coins)
			{
				k=key.toLowerCase();
				t+=parseFloat(eval('jsonObj.'+k+'2cny') * parseFloat(document.getElementById(k+"_balance_total").innerHTML));
			}
			t+=parseFloat(jsonObj.bid2cny) * parseFloat(document.getElementById("bid_balance").innerHTML) + parseFloat(jsonObj.bid2cny) * parseFloat(document.getElementById("bid_balance_lock").innerHTML) + parseFloat(jsonObj.bid2cny) * parseFloat(document.getElementById("bid_balance_immature").innerHTML);

			document.getElementById("totalBalance").innerHTML = t.bidcmsToFixed(2).toString();
		}
	}
}

function showSettingRow(coinName, rowsNum, operate)
{
	if (coinName == "cny" && isCert == false)
	{
		alert("对不起，您尚未填写实名认证信息，无法提款CNY");
		return;
	}
	var deposit=eval('deposit_scale.'+coinName.toLowerCase());
	var withdrawal=eval('withdrawal_scale.'+coinName.toLowerCase());
	var balanceTable = document.getElementById("balanceTable");
	var settingRow = document.getElementById("settingRow");
	if (settingRow) balanceTable.deleteRow(settingRow.rowIndex);
	var vCodeRow = document.getElementById("vCodeRow");
	if (vCodeRow) balanceTable.deleteRow(vCodeRow.rowIndex);
	
	var settingTr = balanceTable.insertRow(rowsNum + 1);
	settingTr.style.height = "50px";
	settingTr.style.background = "#B2FFB2";
	settingTr.id = "settingRow";
	
	var settingTd = settingTr.insertCell(0);
	settingTd.colSpan = "6";
	settingTd.style.textAlign = "right";
	settingTd.id = "settingCell";
	if (operate == "setAddr")
	{
		if (coinName == "cny")
		{
			settingTr.style.height = "80px";
			settingTd.innerHTML = "<table align=left style=\"margin-left:15px;\"><tr><td style=\"border:0px;font-size:13px;text-align:left;height:35px\"><nobr>请设置<span id=\"addr_type\">" + coinName.toLocaleUpperCase() + "</span>提款银行卡<select id=\"bank_name\"><option value=\"支付宝\" selected>支付宝</option><option value=\"工商银行\">工商银行</option><option value=\"建设银行\">建设银行</option><option value=\"农业银行\">农业银行</option><option value=\"交通银行\">交通银行</option><option value=\"中国银行\">中国银行</option><option value=\"广发银行\">广发银行</option><option value=\"中信银行\">中信银行</option><option value=\"民生银行\">民生银行</option><option value=\"平安银行\">平安银行</option><option value=\"光大银行\">光大银行</option><option value=\"兴业银行\">兴业银行</option><option value=\"浦发银行\">浦发银行</option><option value=\"招商银行\">招商银行</option></select><select id=\"selProvince\" onChange=\"JavaScript:getCity(this.options[this.options.selectedIndex].value);\"><option value=\"\">-请选择省份-</option><option value=\"北京\">北京</option><option value=\"上海\">上海</option><option value=\"天津\">天津</option><option value=\"重庆\">重庆</option><option value=\"河北\">河北</option><option value=\"山西\">山西</option><option value=\"内蒙古\">内蒙古</option><option value=\"辽宁\">辽宁</option><option value=\"吉林\">吉林</option><option value=\"黑龙江\">黑龙江</option><option value=\"江苏\">江苏</option><option value=\"浙江\">浙江</option><option value=\"安徽\">安徽</option><option value=\"福建\">福建</option><option value=\"江西\">江西</option><option value=\"山东\">山东</option><option value=\"河南\">河南</option><option value=\"湖北\">湖北</option><option value=\"湖南\">湖南</option><option value=\"广东\">广东</option><option value=\"广西\">广西</option><option value=\"海南\">海南</option><option value=\"四川\">四川</option><option value=\"贵州\">贵州</option><option value=\"云南\">云南</option><option value=\"西藏\">西藏</option><option value=\"陕西\">陕西</option><option value=\"甘肃\">甘肃</option><option value=\"宁夏\">宁夏</option><option value=\"青海\">青海</option><option value=\"新疆\">新疆</option></select><select id=\"selCity\"><option>-城市-</option></select></nobr></td></tr><tr><td style=\"border:0px;height:35px\"><input type=hidden maxlength=12 value=\"\" id=\"bank_branch\" style=\"font-family: Verdana; font-size:14px;width:100px;\" onclick=\"javascript:this.value='';\"> <input type=text maxlength=34 value=\"输入帐号\" id=\"bank_account\" style=\"font-family: Verdana; font-size:14px;width:180px;\" onclick=\"javascript:this.value='';\"> <input type=text maxlength=8 value=\"输入姓名\" id=\"bank_uname\" style=\"font-family: Verdana; font-size:14px;width:80px;\" onclick=\"javascript:this.value='';\"> <span id=\"submitBTN\"><a href=\"JavaScript:submitAddr('cny');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></span> <font color=red>设定后无法更改，请仔细核实，资料必须正确才能收到款项</font></td></tr></table>";
		}
		else
		{
			var gWords = "请设置您的<span id=\"addr_type\">" + coinName.toLocaleUpperCase() + "</span>钱包地址";
			settingTd.innerHTML = "<table align=right style=\"margin-right:22px;\"><tr><td width=180 style=\"border:0px;font-size:13px;text-align:right\">"+gWords+"</td><td width=338 style=\"border:0px;\"><input type=text maxlength=34 id=\"addr_input\" style=\"font-family: Verdana; font-size:14px;width:320px;\"></td><td width=40 style=\"border:0px;\" id=\"submitBTN\"><a href=\"JavaScript:submitAddr('"+coinName+"');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
		}
	}
	else if (operate == "save")
	{
		if (document.cookie.indexOf("BTC38_is_zombie=2") >= 0)
		{
			alert("您的帐号太多，本帐号的充值功能已被关闭，若您有交易需求，请使用您的其它帐号，给您带来不便，我们深表歉意。");
			return;
		}
		
		if (coinName == "cny")
		{
			var gWords = "请输入充值金额(<span id=\"addr_type\">" + coinName.toLocaleUpperCase() + "</span>)";
			settingTd.innerHTML = "<table align=right style=\"margin-right:22px;\"><tr><td width=180 style=\"border:0px;font-size:13px;text-align:right\">"+gWords+"</td><td width=130 style=\"border:0px;\"><input type=text maxlength=8 id=\"balance_input\" style=\"font-family: Verdana; font-size:14px; width:120px;\" onkeyup=\"JavaScript:updateActuallyBalance('save');\"></td><td style=\"border:0px;font-size:13px;width:60px;color:red\">优惠加送</td><td style=\"border:0px;width:50px\"><input type=text disabled=disabled value=\""+(deposit*100)+"%\" style=\"font-family:Verdana;font-size:14px;width:40px;color:red\"></td><td style=\"border:0px;font-size:13px;width:60px\">实际到账</td><td style=\"border:0px;width:130px\"><input type=text disabled=disabled id=\"actuallyBalance\" style=\"font-family: Verdana; font-size:14px; width:120px;\"></td><td width=40 style=\"border:0px;\" id=\"submitBTN\"><a href=\"JavaScript:submitSave('"+coinName+"');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
		}
		/*else if (coinName == "xrp" || coinName == "yac")
		{
			var gWords = "请输入充值金额(<span id=\"addr_type\">" + coinName.toLocaleUpperCase() + "</span>)";
			settingTd.innerHTML = "<table align=right style=\"margin-right:22px;\"><tr><td width=180 style=\"border:0px;font-size:13px;text-align:right\">"+gWords+"</td><td width=130 style=\"border:0px;\"><input type=text maxlength=8 id=\"balance_input\" style=\"font-family: Verdana; font-size:14px; width:120px;\" onkeyup=\"JavaScript:updateActuallyBalance('save');\"></td><td style=\"border:0px;font-size:13px;width:60px;color:red\">优惠加送</td><td style=\"border:0px;width:35px\"><input type=text disabled=disabled value=\"1%\" style=\"font-family:Verdana;font-size:14px;width:25px;color:red\"></td><td style=\"border:0px;font-size:13px;width:60px\">实际到账</td><td style=\"border:0px;width:130px\"><input type=text disabled=disabled id=\"actuallyBalance\" style=\"font-family: Verdana; font-size:14px; width:120px;\"></td><td width=40 style=\"border:0px;\" id=\"submitBTN\"><a href=\"JavaScript:submitSave('"+coinName+"');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
		}*/
		else
		{
			settingTd.innerHTML = "请将" + coinName.toLocaleUpperCase() + "转入这个地址<span id=\"save_addr\" style=\"color:#CC0000\">Loading...</span>（充值后请点击<font color=#CC0000><b>同步</b></font>按钮，可查看最新充值确认数。）<a href=\"/altcoin/general/242.html\" target=\"_blank\" title=\"无论充值多少，到账即额外加送"+(deposit*100)+"%(冲100到账"+(100+deposit*100)+")\">[优惠加送"+(deposit*100)+"%]</a>";
			/*
			if (coinName.toLocaleUpperCase() == "DIME") settingTd.innerHTML = settingTd.innerHTML + "<br/><font color=blue>温馨提示：系统还在测试阶段，每个会员充值不要超过10000个，不然无法提款哦！ ^_^</font>";
			
			if (coinName.toLocaleUpperCase() == "ZCC") settingTd.innerHTML = settingTd.innerHTML + "<br/><font color=red><b>注意：请确保您的招财币钱包在主链上，否则充值无法到账，我们亦无法负责！</b><a href=\"http://www.zhaocaibi.com/?p=361\" target=_blank>核实方法点这里</font>";*/
			if (window.XMLHttpRequest) ajaxObj10=new XMLHttpRequest();
			else if (window.ActiveXObject) ajaxObj10=new ActiveXObject("Microsoft.XMLHTTP");

			if (ajaxObj10!=null)
			{
				var url = "trade/saveBalance2.php?coinname=" + coinName + "&n=" + Math.random();
				ajaxObj10.onreadystatechange = updateSaveAddr;
				ajaxObj10.open("GET", url, true);
				ajaxObj10.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
				ajaxObj10.send(null);
			}
		}
	}
	else if (operate == "draw")
	{
		if (coinName == "cny")
		{
			settingTr.style.height = "68px";
			var gWords = "请输入提款金额(<span id=\"addr_type\">" + coinName.toLocaleUpperCase() + "</span>)";
			settingTd.innerHTML = "<table align=right style=\"margin-right:22px;\"><tr><td width=180 style=\"border:0px;font-size:13px;text-align:right\">"+gWords+"</td><td width=130 style=\"border:0px;\"><input type=text maxlength=8 id=\"balance_input\" style=\"font-family: Verdana; font-size:14px; width:120px;\" onkeyup=\"JavaScript:updateActuallyBalance('draw');\"></td><td style=\"border:0px;font-size:13px;width:45px\">手续费</td><td style=\"border:0px;width:35px\"><input type=text disabled=disabled value=\""+(withdrawal*100)+"%\" style=\"font-family:Verdana;font-size:14px;width:25px\"></td><td style=\"border:0px;font-size:13px;width:60px\">实际到账</td><td style=\"border:0px;width:130px\"><input type=text disabled=disabled id=\"actuallyBalance\" style=\"font-family: Verdana; font-size:14px; width:120px;\"></td><td width=40 style=\"border:0px;\" id=\"submitBTN\"><a href=\"JavaScript:submitDraw('"+coinName+"');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table><table align=right style=\"margin-right:22px;\"><tr><td width=680 style=\"border:0px;font-size:13px;text-align:right;height:28px\">CNY最低提款为2元，200元以下加收2元手续费，提款超过2天不到账的用户，可联系提款客服QQ 253947468</td></tr></table>";
		}
		else
		{
			var gWords = "请输入提款金额(<span id=\"addr_type\">" + coinName.toLocaleUpperCase() + "</span>)";
			settingTd.innerHTML = "<table align=right style=\"margin-right:22px;\"><tr><td width=180 style=\"border:0px;font-size:13px;text-align:right\">"+gWords+"</td><td width=130 style=\"border:0px;\"><input type=text maxlength=8 id=\"balance_input\" style=\"font-family: Verdana; font-size:14px; width:120px;\" onkeyup=\"JavaScript:updateActuallyBalance('draw');\"></td><td style=\"border:0px;font-size:13px;width:45px\">手续费</td><td style=\"border:0px;width:35px\"><input type=text disabled=disabled value=\""+(withdrawal*100)+"%\" style=\"font-family:Verdana;font-size:14px;width:25px\"></td><td style=\"border:0px;font-size:13px;width:60px\">实际到账</td><td style=\"border:0px;width:130px\"><input type=text disabled=disabled id=\"actuallyBalance\" style=\"font-family: Verdana; font-size:14px; width:120px;\"></td><td width=40 style=\"border:0px;\" id=\"submitBTN\"><a href=\"JavaScript:submitDraw('"+coinName+"');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
		}
	}
}


function updateSaveAddr()
{
	if (ajaxObj10.readyState == 4)
	{
		if (ajaxObj10.status == 200)
		{
			var result = ajaxObj10.responseText;
			if (result.length == 33 || result.length == 34)
			{
				document.getElementById("save_addr").innerHTML = result;
				return;
			}
			else if (result == "zombie")
			{
				alert("您的帐号太多，本帐号的充值功能已被关闭，若您有交易需求，请使用您的其它帐号，给您带来不便，我们深表歉意。");
				return;
			}
			else
			{
				document.getElementById("save_addr").innerHTML = "(获取失败，请重试)";
				return;
			}
		}
	}
}

function updateActuallyBalance(type)
{
	if (type == "save")
	{
		document.getElementById("actuallyBalance").value = parseFloat(document.getElementById("balance_input").value*1000000)*101/100/1000000;
	}
	if (type == "draw")
	{
		document.getElementById("actuallyBalance").value = parseFloat(document.getElementById("balance_input").value*1000000)*99/100/1000000;
	}
}

function submitDraw(coinName)
{
	var balance = document.getElementById("balance_input").value;
	if (isNaN(balance) || parseFloat(balance) <= 0)
	{
		alert("请正确输入提款金额");
		return;
	}
	min=eval('minbalance.'+coinName);
	min=min>0?min:1;
	if (coinName == "cny")
	{
		if (parseFloat(balance) < 2)
		{
			alert("CNY最低提款额度为2元");
			return;
		}
		else if (parseFloat(balance) > 50000)
		{
			alert("CNY单笔提款额度为50000元，如果您需要大额提款，请分多次操作");
			return;
		}
	}
	else if (parseFloat(balance) < min)
	{
		alert(coinName.toLocaleUpperCase() + "最低提款额度为"+min+"个" + coinName.toLocaleUpperCase());
		return;
	}
	
	if (document.getElementById(coinName + "_addr").innerHTML.indexOf("未设置") == 0)
	{
		alert("您尚未设置资金提款地址，请先设置再提款。");
		return;
	}
	
	if (balance > parseFloat(document.getElementById(coinName + "_balance").innerHTML))
	{
		alert("资金不足，您提款金额超过了您的可用资金。");
		return;
	}
	
	var balanceTable = document.getElementById("balanceTable");
	var settingTr = balanceTable.insertRow(document.getElementById("settingRow").rowIndex + 1);
	settingTr.style.height = "50px";
	settingTr.style.background = "#B2FFB2";
	settingTr.id = "vCodeRow";
	
	var settingTd = settingTr.insertCell(0);
	settingTd.colSpan = "6";
	settingTd.style.textAlign = "right";
	settingTd.id = "vCodeCell";
	settingTd.innerHTML = "<span style=\"font-size:13px; margin-right:22px\">正在提交提款请求，请稍候...</span>";
	
	document.getElementById("balance_input").disabled = "disabled";
	document.getElementById("submitBTN").innerHTML = "<img src=\"statics/images/v9/m_btn_submit_gray.png\">";
	
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
		if(getCookie('bidcms_tel')!='')
		{
			var poolurl = "trade/drawBalance2.php?coinname=" + coinName + "&balance=" + balance+"&n="+Math.random();
			ajaxObj5.onreadystatechange = submitDrawResult;
			ajaxObj5.open("GET", poolurl, true);
			ajaxObj5.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
			ajaxObj5.send(null);
		}
		else
		{
			alert('请先绑定手机');
		}
	}
}

function submitDrawResult()
{
	if (ajaxObj5.readyState == 4)
	{
		if (ajaxObj5.status == 200)
		{
			var result = ajaxObj5.responseText;
			var succ_pos = result.indexOf("succ");
			if (succ_pos > 0) result = result.substr(succ_pos);
			
			if (result.substr(0,4) == "succ")
			{
				if (result.substr(5) == "cny")
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">已成功提交CNY提款订单，当天17点前的提款当天到账，17点后的提款订单次日到账，请耐心等待。</span>";
					return;
				}
				/*else if (result.substr(5) == "xrp")
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">已成功提交提款订单，我们将在2小时内将XRP转给您(非工作时间不超过12小时)</span>";
					return;
				}*/
				else
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">提款成功，资金稍候将支付到您的钱包。</span>";
					return;
				}
			}
			else if(result.substr(0,5)=='bemax')
			{
				alert("最大提现额度为1000万，超出请分多次");
				return;
			}
			else if (result.substr(0,13) == "bind_telphone")
			{
				alert("为了您的资金安全，请先绑定手机");
				window.location.reload();
				return;
			}
			else if (result.substr(0,9) == "code_sent")
			{
				c=result.split('-');
				wxnotice="(<a href='javascript:;' onclick=\"window.open('wxhelp.php','','width:300px;height:300px;');\">如何关注？</a>)";
				document.getElementById("vCodeCell").innerHTML = "<table align=right style=\"margin-right:22px\"><tr><td width=408  style=\"border:0px\">关注微信公众号”<?php echo $weixin;?>“并回复"+c[3]+"换取验证码"+wxnotice+"，输入验证码以完成提款</td><td width=68 style=\"border:0px\"><input type=text maxlength=6 id=\"drawCode\" style=\"font-family: Verdana; font-size:14px;width:58px;\"></td><td id=\"drawSubmitTD\" style=\"border:0px\"><a href=\"JavaScript:submitDrawCode('" + c[1] + "', '" + c[2] + "');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table>";
				return;
			}
			else if (result == "sendWrong")
			{
				document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">提款失败，资金可能尚未转出，请您核实后重新操作。</span>";
				return;
			}
			
			document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">提款成功，资金稍候将支付到您的钱包。</span>";
		}
	}
}

function submitDrawCode(coinName, balance)
{
	var vCode = document.getElementById("drawCode").value;
	if (vCode.length != 6)
	{
		alert("请输入正确的验证码");
		return;
	}
	
	document.getElementById("drawSubmitTD").innerHTML = "提交中";
	document.getElementById("drawCode").disabled = "disabled";

	if (window.XMLHttpRequest) ajaxObj12=new XMLHttpRequest();
	else if (window.ActiveXObject) ajaxObj12=new ActiveXObject("Microsoft.XMLHTTP");
	
	if (ajaxObj12!=null)
	{
		var url = "trade/drawBalance2.php?coinname=" + coinName + "&balance=" + balance + "&vCode=" + vCode.toString() + "&n=" + Math.random();
		ajaxObj12.onreadystatechange = submitDrawCodeResult;
		ajaxObj12.open("GET", url, true);
		ajaxObj12.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj12.send(null);
	}
}

function submitDrawCodeResult()
{
	if (ajaxObj12.readyState == 4)
	{
		if (ajaxObj12.status == 200)
		{
			var result = ajaxObj12.responseText;
			var succ_pos = result.indexOf("succ");
			if (succ_pos > 0) result = result.substr(succ_pos);
			
			if (result.substr(0,11) == "wrong_vCode")
			{
				c=result.split('-');
				alert("对不起，验证码不正确");
				document.getElementById("drawCode").disabled = "";
				document.getElementById("drawSubmitTD").innerHTML = "<a href=\"JavaScript:submitDrawCode('" + c[1] + "', '" + c[2] + "');\"><img src=\"statics/images/v9/m_btn_submit.png\"></a>";
				return;
			}
			else if (result.substr(0,4) == "succ")
			{
				if (result.substr(5) == "cny")
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">已成功提交CNY提款订单，当天17点前的提款当天到账，17点后的提款订单次日到账，请耐心等待。</span>";
					return;
				}
				/*else if (result.substr(5) == "xrp")
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">已成功提交提款订单，我们将在2小时内将XRP转给您(非工作时间不超过12小时)</span>";
					return;
				}*/
				else
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">提款成功，资金已稍后转到你的钱包中，请注意查收。</span>";
					return;
				}
			}
			else if (result == "sendWrong")
			{
				document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">提款失败，资金可能尚未转出，请您核实后重新操作。</span>";
				return;
			}
		}
	}
}

function submitSave(coinName)
{
	var balance = document.getElementById("balance_input").value;
	if (isNaN(balance) || parseFloat(balance) <= 0)
	{
		alert("请正确输入充值金额");
		return;
	}
	
	if (parseFloat(balance) < 1)
	{
		alert("最低充值金额为1 " + coinName.toLocaleUpperCase());
		return;
	}
	
	var balanceTable = document.getElementById("balanceTable");
	var settingTr = balanceTable.insertRow(document.getElementById("settingRow").rowIndex + 1);
	settingTr.style.height = "50px";
	settingTr.style.background = "#B2FFB2";
	settingTr.id = "vCodeRow";
	
	var settingTd = settingTr.insertCell(0);
	settingTd.colSpan = "6";
	settingTd.style.textAlign = "right";
	settingTd.id = "vCodeCell";
	settingTd.innerHTML = "<span style=\"font-size:13px; margin-right:22px\">正在提交充值请求，请稍候...</span>";
	
	document.getElementById("balance_input").disabled = "disabled";
	document.getElementById("submitBTN").innerHTML = "<img src=\"statics/images/v9/m_btn_submit_gray.png\">";
	
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
		var poolurl = "trade/saveBalance.php?coinname=" + coinName + "&balance=" + balance+"&n="+Math.random();
		ajaxObj4.onreadystatechange = submitSaveResult;
		ajaxObj4.open("GET", poolurl, true);
		ajaxObj4.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj4.send(null);
	}
}

function submitSaveResult()
{
	if (ajaxObj4.readyState == 4)
	{
		if (ajaxObj4.status == 200)
		{
			var result = ajaxObj4.responseText;
			if (result.substr(0, 4) == "addr")
			{
				result = result.substr(4);
				var coinname = document.getElementById("addr_type").innerHTML;
				if (coinname == "CNY")
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">请使用支付宝将<font color=red>" + document.getElementById("balance_input").value + "元CNY</font>转账到这个支付宝帐号<font color=red>" + result + "</font>，并在付款说明中填写数字<font color=red>" + glb_user_id + "</font> (工作时间内一般10分钟左右到账) <a href=\"http://alipay.com\" target=\"_blank\">前往支付宝</a>";
				}
				else
				{
					document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">请将<font color=red>" + document.getElementById("balance_input").value + "个" + coinname + "</font>转账到这个钱包地址<font color=red>" + result + "</font>。";
				}
				return;
			}
			else if (result == "zombie")
			{
				alert("您的帐号太多，本帐号的充值功能已被关闭，若您有交易需求，请使用您的其它帐号，给您带来不便，我们深表歉意。");
				return;
			}
			
			document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">对不起，获取失败，请重新尝试。</span>";
		}
	}
}

function submitAddr(coinName)
{
	var addr = "";
	var bank_name = "";
	var bank_account = "";
	var bank_uname = "";
	var bank_branch = "";
	var selProvince = "";
	var selCity = "";

	if (document.getElementById("addr_input")) addr = document.getElementById("addr_input").value;
	if (document.getElementById("bank_name")) bank_name = document.getElementById("bank_name").value;
	if (document.getElementById("bank_account")) bank_account = document.getElementById("bank_account").value;
	if (document.getElementById("bank_uname")) bank_uname = document.getElementById("bank_uname").value;
	if (document.getElementById("bank_branch")) bank_branch = document.getElementById("bank_branch").value;
	if (document.getElementById("selProvince")) selProvince = document.getElementById("selProvince").value;
	if (document.getElementById("selCity")) selCity = document.getElementById("selCity").value;

	if (coinName == "cny")
	{
		if (bank_uname.length < 2)
		{
			alert("请填写正确的持卡人姓名，否则无法收到款项噢 ^_^");
			return;
		}

		addr = bank_name + "|" + bank_account + "|" + bank_uname + "|" + bank_branch + "|" + selProvince + "|" + selCity;
		document.getElementById("bank_name").disabled = "disabled";
		document.getElementById("bank_account").disabled = "disabled";
		document.getElementById("bank_uname").disabled = "disabled";
		document.getElementById("bank_branch").disabled = "disabled";
		document.getElementById("selProvince").disabled = "disabled";
		document.getElementById("selCity").disabled = "disabled";
	}
	else
	{
		if (addr.length < 33 || addr.length > 34 || addr.indexOf(" ") > 0)
		{
			alert("请输入正确的"+coinName.toLocaleUpperCase()+"钱包地址");
			return;
		}
		
		document.getElementById("addr_input").disabled = "disabled";
	}
	
	var balanceTable = document.getElementById("balanceTable");
	var settingTr = balanceTable.insertRow(document.getElementById("settingRow").rowIndex + 1);
	settingTr.style.height = "50px";
	settingTr.style.background = "#B2FFB2";
	settingTr.id = "vCodeRow";
	
	var settingTd = settingTr.insertCell(0);
	settingTd.colSpan = "6";
	settingTd.style.textAlign = "right";
	settingTd.id = "vCodeCell";
	settingTd.innerHTML = "<span style=\"font-size:13px; margin-right:22px\">正在提交地址，请稍候...</span>";
	
	document.getElementById("submitBTN").innerHTML = "<img src=\"statics/images/v9/m_btn_submit_gray.png\">";
	
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
		if(getCookie('bidcms_tel')!='')
		{
			var poolurl = "trade/setAddr.php?coinname=" + coinName + "&addr=" + encodeURIComponent(addr) + "&n="+Math.random();
			ajaxObj2.onreadystatechange = submitAddrResult;
			ajaxObj2.open("GET", poolurl, true);
			ajaxObj2.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
			ajaxObj2.send(null);
		}
		else
		{
			alert('请先绑定手机');
		}
	}
}

function submitAddrResult()
{
	if (ajaxObj2.readyState == 4)
	{
		if (ajaxObj2.status == 200)
		{
			var returnStr2 = ajaxObj2.responseText;
			
			if (returnStr2 == "succ")
			{
				alert("您已成功设置了您的资金提款地址。");
				window.location.reload();
				return;
			}
			
			if (returnStr2 == "invalid_addr")
			{
				alert("您输入的提款地址不是一个正确的地址，请核查");
				window.location.reload();
				return;
			}
			
			if (returnStr2 == "our_addr")
			{
				alert("对不起，您输入的提款地址是本站其它帐号的充值地址，目前不支持直接提款到本站的其它帐号，请先提款到个人钱包后再充值到其它帐号");
				window.location.reload();
				return;
			}
			if (returnStr2 == "bind_telphone")
			{
				alert("为了您的资金安全，请先绑定手机");
				window.location.reload();
				return;
			}
			if (returnStr2.substr(0,9) == "code_sent")
			{
				c=returnStr2.split('-');
				wxnotice="(<a href='javascript:;' onclick=\"window.open('wxhelp.php','','width:300px;height:300px;');\">如何关注？</a>)";
				document.getElementById("vCodeCell").innerHTML = "<table align=right style=\"margin-right:22px;\"><tr><td width=300 style=\"border:0px;font-size:13px;\">关注微信公众号”<?php echo $weixin;?>“并回复"+c[1]+"换取验证码"+wxnotice+"，请输入验证码</td><td width=68 style=\"border:0px;\"><input type=text maxlength=6 id=\"code\" style=\"font-family: Verdana; font-size:14px;width:58px;\"></td><td width=50 style=\"border:0px;\" id=\"codeSubmitStatus\"><a href=\"JavaScript:submitCode();\"><img src=\"statics/images/v9/m_btn_submit.png\"></a></td></tr></table>"
				return;
			}
			
			document.getElementById("vCodeCell").innerHTML = "<span style=\"font-size:13px; margin-right:22px\">对不起，操作失败，请重新尝试。</span>";
		}
	}
}

function submitCode()
{
	var addr = "";
	var bank_name = "";
	var bank_account = "";
	var bank_uname = "";
	var bank_branch = "";
	var selProvince = "";
	var selCity = "";

	if (document.getElementById("addr_input")) addr = document.getElementById("addr_input").value;
	if (document.getElementById("bank_name")) bank_name = document.getElementById("bank_name").value;
	if (document.getElementById("bank_account")) bank_account = document.getElementById("bank_account").value;
	if (document.getElementById("bank_uname")) bank_uname = document.getElementById("bank_uname").value;
	if (document.getElementById("bank_branch")) bank_branch = document.getElementById("bank_branch").value;
	if (document.getElementById("selProvince")) selProvince = document.getElementById("selProvince").value;
	if (document.getElementById("selCity")) selCity = document.getElementById("selCity").value;
	
	var code = document.getElementById("code").value;
	var addr_type = document.getElementById("addr_type").innerHTML.toLocaleLowerCase();
	
	if (addr_type == "cny")
	{
		addr = bank_name + "|" + bank_account + "|" + bank_uname + "|" + bank_branch + "|" + selProvince + "|" + selCity;
	}
	
	if (code.length != 6 || code.indexOf(".") > 0)
	{
		alert("请输入正确的验证码(发送到您微信中的的6位字符)");
		return;
	}
	
	document.getElementById("codeSubmitStatus").innerHTML = "提交中";
	
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
		var poolurl = "trade/checkCode.php?code=" + code + "&wallet_addr=" + encodeURIComponent(addr) + "&wallet_addr_type=" + addr_type+"&n="+Math.random();
		ajaxObj3.onreadystatechange = submitCodeResult;
		ajaxObj3.open("GET", poolurl, true);
		ajaxObj3.setRequestHeader("X-Requested-With","XMLHttpRequest"); 
		ajaxObj3.send(null);
	}
}

function submitCodeResult()
{
	if (ajaxObj3.readyState == 4)
	{
		if (ajaxObj3.status == 200)
		{
			var result2 = ajaxObj3.responseText;
			
			if (result2 == "succ")
			{
				alert("您已成功修改了您的资金提款地址。");
				window.location.reload();
				return;
			}
			
			if (result2 == "wrongCode")
			{
				alert("验证码输入错误，请重试。");
				document.getElementById("codeSubmitStatus").innerHTML = "<a href=\"JavaScript:submitCode();\"><img src=\"http://rs.btc38.com/statics/images/v9/m_btn_submit.png\"></a>";
				return;
			}
			
			if (result2 == "overstep")
			{
				alert("您已提交了多次错误的验证码，请重新获取验证码。");
				window.location.reload();
				return;
			}
			
			document.getElementById("check_words").innerHTML = "对不起，操作失败，请重新尝试。";
			return;
		}
	}
}
</script>
<?php include 'footer.php';?>

</body>
</html>