Number.prototype.bidcmsToFixed=function(n){
	var number=this.toFixed(n);
	var reg=/0+$/g;
	r=number.replace(reg,"");
	len=r.length;
	if(r.substr(len-1,1)=='.')
	{
		return r.substr(0,len-1);
	}
	return r;
}
function setmodel(value, id, siteid, q) {
	$("#typeid").val(value);
	$("#search a").removeClass();
	id.addClass('on');
	if(q!=null && q!='') {
		window.location='?m=search&c=index&a=init&siteid='+siteid+'&typeid='+value+'&q='+q;
	}
}

var xmlhttp;
var xmlhttp2;
var xmlhttp3;
var xmlhttp4;
var xmlhttp5;
var xmlhttp6;
var xmlhttp7;

function parseQuery()
{
	var search=window.location.search ? window.location.search.substr(1) : '';
	param=search.split('&');
	str='{';
	for (var i in param) {
		d=param[i].split('=');
		str+='"'+d[0]+'":"'+d[1]+'",';
	}
	str+='"rand":'+Math.random()+'}';
	eval('var gQuery='+str);
	return gQuery;
}
function getCookie(c_name)
{
	if(document.cookie.length>0){
	   c_start=document.cookie.indexOf(c_name + "=")
	   if(c_start!=-1){ 
		 c_start=c_start + c_name.length+1 
		 c_end=document.cookie.indexOf(";",c_start)
		 if(c_end==-1) c_end=document.cookie.length
		 return unescape(document.cookie.substring(c_start,c_end))
	   }
	}
	return ""
}
var isLogin = false;
var isCert = false;
var glb_user_id = 0;
var glb_user_pic = "";
var glb_user_nickname = "";
//显示登录信息到登录区域
function displayLoginInfo()
{
	var cookie_arr = document.cookie.split("; ");
	var cookie_user_nickname = "";
	var cookie_user_figureURL = "";
	var cookie_user_tel = "";
	var cookie_user_credentials = "";
	var cookie_user_tel_status = "手机未绑定";
	var cookie_user_credentials_status = "实名未认证";
	for (var i = 0; i < cookie_arr.length; i++)
	{
		if (cookie_arr[i].indexOf("=") < 0) continue;
		var cookie_arr_item = cookie_arr[i].split("=");
		if (cookie_arr_item[0] == "bidcms_id")
		{
			glb_user_id = cookie_arr_item[1]; 
			continue;
		}
		if (cookie_arr_item[0] == "bidcms_nickname")
		{
			cookie_user_nickname = cookie_arr_item[1];
			continue;
		}
		if (cookie_arr_item[0] == "bidcms_figureURL")
		{
			cookie_user_figureURL = cookie_arr_item[1];
			continue;
		}
		if (cookie_arr_item[0] == "bidcms_tel")
		{
			cookie_user_tel = cookie_arr_item[1];
			if (cookie_user_tel != "")
			{
				cookie_user_tel_status = "手机已绑定";
				var binding_status = document.getElementById("binding_status");
				if (binding_status)
				{
					binding_status.innerHTML = "您已绑定手机号 <font color=red>" + cookie_user_tel.substr(0,5) + "******</font><br /><font style=\"font-size:13px; color:#999999\">如须更改绑定手机号，请<a href=\"JavaScript:displayChangeTel();\"><font color='#3377AA'>点此修改</font></a></font>";
				}
				
				var binding_new_tel = document.getElementById("binding_new_tel");
				if (binding_new_tel)
				{
					binding_new_tel.style.display = "none";
				}
			}
			continue;
		}
		if (cookie_arr_item[0] == "bidcms_credentials")
		{
			cookie_user_credentials = cookie_arr_item[1];
			if (cookie_user_credentials != "")
			{
				cookie_user_credentials_status = "实名已认证";
				isCert = true;
			}
			continue;
		}
	}
	
	if (cookie_user_nickname != "" && cookie_user_figureURL != "")
	{
		glb_user_nickname = decodeURI(cookie_user_nickname);
		glb_user_pic = unescape(cookie_user_figureURL);
		isLogin = true;
		var login_div = document.getElementById("login_div");
		login_div.style.margin = "0 0 20px 0";
		login_div.innerHTML = "<div style=\"width:309px; text-align:left\"><img src=\"" + unescape(cookie_user_figureURL) + "\" style=\"float:left;margin:5px 10px 0 0\" width=40 height=40><span style=\"font-size:16px;font-weight:600\">" + decodeURI(cookie_user_nickname) + "</span> [ <a href=\"JavaScript:logout();\">退出登录</a> ]<br />我的ID " + glb_user_id + "</div><div class=\"hr bk10\"></div><table><tr><td valign=middle width=21><img src=\"statics/images/v9/m_tel_icon.png\"></td><td valign=middle width=75 align=left><a href=\"binding_tel.php\" >" + cookie_user_tel_status + "</a></td><td valign=middle width=23><img src=\"statics/images/v9/m_card_icon.png\"></td><td valign=middle width=75 align=left><a href=\"binding_rnsys.php\">" + cookie_user_credentials_status + "</a></td><td valign=middle width=23><img src=\"statics/images/v9/m_lock_icon.png\"></td><td valign=middle width=75  align=left><a href=\"trade_pwd.php\">交易密码</a></td></tr></table><div class=\"hr bk10\"></div><div style=\"width:309px; text-align:left; font-size:15px; margin-top: 5px\"><a href=\"balance.php\">资金管理/充值/提款</a> | <a href=\"order.php\">我的委单</a> | <a href=\"clinch.php\">成交记录</a></div><div style=\"width:309px; text-align:left; font-size:15px; margin-top: 5px\"><a href=\"bonus.php\">我的必得币和分红</a>(<a href=\"help.php\">规则</a>) | <a href=\"qaa.php\">客服有问必答</a></div>";
	}
}

function displayChangeTel()
{
	document.getElementById('binding_new_tel').style.display='';
}

function logout()
{
	var null_string = "";
	document.cookie = "bidcms_id=" + null_string + "; path=/";
	document.cookie = "bidcms_md5=" + null_string + "; path=/";
	document.cookie = "bidcms_nickname=" + null_string + "; path=/";
	document.cookie = "bidcms_figureURL=" + null_string + "; path=/";
	document.cookie = "bidcms_tel=" + null_string + "; path=/";
	document.cookie = "bidcms_credentials=" + null_string + "; path=/";
	alert("您已安全退出登录。");
	window.location.reload();
}

//固定位置浮动层
$.fn.smartFloat = function() {
    var position = function(element) {
        var top = element.position().top, pos = element.css("position");
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > top) {
                if (window.XMLHttpRequest) {
                    element.css({
                        position: "fixed",
                        top: 0
                    });    
                } else {
                    element.css({
                        top: scrolls
                    });    
                }
            }else {
                element.css({
                    position: "absolute",
                    top: top
                });    
            }
        });
    };
    return $(this).each(function() {
        position($(this));                         
    });
};

//设为首页，兼容FF、chrome、IE
function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
        obj.setHomePage(url);
    }catch(e){
        if(window.netscape){
            try{
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }catch(e){
                alert("抱歉，您的浏览器不支持自动设置首页。\n\n请使用浏览器菜单手动设置。");
            }
        }else{
            alert("抱歉，您的浏览器不支持自动设置首页。\n\n请使用浏览器菜单手动设置。");
        }
    }
}

//加入收藏
function AddFavorite(title, url) {
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("请按键盘Ctrl+D将比特时代加入收藏夹。");
        }
    }
}