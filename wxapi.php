<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: wxapi.php 2010-08-24 10:42 $
*/
error_reporting(0);
include 'inc/common.mini.php';
$token=empty($_REQUEST['token'])?'bidcms':$_REQUEST['token'];
if(checkSignature())
{
	if(!empty($GLOBALS["HTTP_RAW_POST_DATA"]))
	{
		$postObj = @simplexml_load_string($GLOBALS["HTTP_RAW_POST_DATA"], 'SimpleXMLElement', LIBXML_NOCDATA);
		$fromUsername = $postObj->FromUserName;
		$toUsername = $postObj->ToUserName;
		$Location_X = $postObj->Location_X;
		$Location_Y = $postObj->Location_Y;
		$Scale = $postObj->Scale;
		$Label = $postObj->Label;
		$PicUrl = $postObj->PicUrl;
		$MsgType = strtolower($postObj->MsgType);
		$MsgId  = $postObj->MsgId;
		$Url = $postObj->Url;
		$Event = strtolower($postObj->Event);
		$Latitude = $postObj->Latitude;
		$Longitude = $postObj->Longitude;
		$Precision = $postObj->Precision;
		$EventKey = $postObj->EventKey;
		$Ticket = $postObj->Ticket;
		$MediaId = $postObj->MediaId;
		$Format = $postObj->Format;
		$Recognition = $postObj->Recognition;
		if(!empty($fromUsername) && !empty($toUsername))
		{
			
			$str="<xml><ToUserName><![CDATA[".$fromUsername."]]></ToUserName><FromUserName><![CDATA[".$toUsername."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType>";
			$Message=trim($postObj->Content);
			if('subscribe'==$Event)
			{
				$str.="<Content><![CDATA[此微信为小时代官方唯一收取验证码公众号，多谢您的支持]]></Content>";
			}
			else
			{
				if(strlen($Message)>6)
				{
					$hash=substr($Message,0,6);
					$uid=intval(substr($Message,6));
					$rows=mysql_fetch_array(mysql_query("select code from bidcms_checkcode where uid=".$uid." and hash='".$hash."'"));
					if(!empty($rows['code']) && $rows['updatetime']+300<time())
					{
						$content='验证码为:'.$rows['code'];
					}
					else
					{
						$content='验证码已经过期';
					}
					$str.="<Content><![CDATA[".$content."]]></Content>";
				}
				else
				{
					$str.="<Content><![CDATA[密钥有误]]></Content>";
				};
			}
			$str.="<FuncFlag>".$flag."</FuncFlag></xml>";
			echo $str;
		}
	}
	elseif(@$_GET["timestamp"])
	{
		echo htmlspecialchars($_GET["echostr"]);
		exit;
	}
}

function checkSignature()
{
	global $token;
	$signature = $_GET["signature"];
	$timestamp = $_GET["timestamp"];
	$nonce = $_GET["nonce"];	
			
	$tmpArr = array($token, $timestamp, $nonce);
	sort($tmpArr, SORT_STRING);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );
	
	if( $tmpStr == $signature ){
		return true;
	}else{
		return false;
	}
}
?>