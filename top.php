<style type="text/css"> 
<!-- 
#nav ul{margin:0px;padding:0px;}
#nav { 
line-height: 24px; list-style-type: none;; 
} 
 
#nav li ul { 
line-height: 27px; list-style-type: none;text-align:left; 
left: -999em;position: absolute;z-index:100000;
} 
#nav li ul li{ 
background: #666;
width:120px;
clear:both;
} 
#nav li:hover ul { 
left: auto; 
} 
#nav li.sfhover ul { 
left: auto; 
} 
#content { 
clear: left; 
} 
--> 
</style> 
<div class="header">
<div class="logo"><a href="http://www.im61.com/" title="小时代官网首页"><img src="statics/images/v9/logo.png?1006" alt="小时代官方LOGO"/></a></div>
<div class="banner" style="font-size:18px;padding-right:20px;text-align:left;float:left;margin-top:20px;"><a href="reserve.php" style="color:#3377AA;">必得币认购</a> | <a href="vote.php" style="color:#3377AA;">选币投票</a> | <a href="changyi.php" style="color:#3377AA;">行业倡仪书</a> | <a href="tuiguang.php" style="color:#3377AA;">我要推广</a> | <a href="help.php" style="color:#3377AA;">必得币规则</a></div>
<div style="float:right;margin-right:20px;">
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=253947468&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:253947468:51" alt="小时代客服欢迎你" title="小时代客服欢迎你"/></a>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=875429071&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:875429071:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
 <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=01cd24dbb44720aca09a68b222ccc860962aaafe795be0b0f0a47d0793342953"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="小时代交易群1" title="小时代交易群1"></a>
 <p style="font-size:16px;">
 电话：0359-6367637<br/>手机服务：15503598151(时间9-23点)</p>
 </div>
<div class="bk3"></div>
<div class="nav-bar">
<ul class="nav-site" id="nav">
<li><span><a href="http://www.im61.com/index.php?bidcms_trade_coin_name=bid&bidcms_exchange_coin_name=cny" style="color:#ffff00;">必得币交易市场</a></span></li>
<?php foreach($GLOBALS['coins'] as $k=>$v){?>
<li class="line">|</li>
<li><span><a href="index.php?bidcms_trade_coin_name=<?php echo strtolower($k);?>"><?php echo $v;?></a></span>
</li>
<?php }?>
</ul>
<script type=text/javascript> 
function menuFix() { 
var sfEls = document.getElementById("nav").getElementsByTagName("li"); 
for (var i=0; i<sfEls.length; i++) { 
sfEls[i].onmouseover=function() { 
this.className+=(this.className.length>0? " ": "") + "sfhover"; 
} 
sfEls[i].onMouseDown=function() { 
this.className+=(this.className.length>0? " ": "") + "sfhover"; 
} 
sfEls[i].onMouseUp=function() { 
this.className+=(this.className.length>0? " ": "") + "sfhover"; 
} 
sfEls[i].onmouseout=function() { 
this.className=this.className.replace(new RegExp("( ?|^)sfhover\\b"), 
""); 
} 
} 
} 
window.onload=menuFix;
</script> 
</div> 
</div>