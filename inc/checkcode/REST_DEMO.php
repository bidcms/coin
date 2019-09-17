<?php
/*
 *  Copyright (c) 2013 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.cloopen.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */
header("Content-type:text/html;charset=utf-8");
include_once("RESTAPI_XML.php");
include_once("RESTAPI_JSON.php");

$xml_config = simplexml_load_file('config.xml'); //将XML中的数据,读取到数组对象中 

$main_account = "$xml_config->main_account";//从配置文件里读取主账号
$main_token = "$xml_config->main_token";//从配置文件里读取主账号Token
$sub_account = "$xml_config->sub_account";//从配置文件里读取子账号
$sub_token = "$xml_config->sub_token";//从配置文件里读取子账号Token
$voip_account = "$xml_config->voip_account"; //从配置文件里读取VoIP账号
$voip_password = "$xml_config->voip_password"; //从配置文件里读取VoIP账号密码
$app_id = "$xml_config->app_id"; //从配置文件里读取APPID 
$address = "$xml_config->server_address";//从配置文件里读取REST服务器地址


$sendType = 0;//xml为0，json为1

/**
 * 创建子账户
 * @param friendlyName 子账户名称
 * @param status 子账户状态
 * @param type 子账户类型
 */
function test_createSubAccount($friendlyName) {
	// 创建REST对象实例
  global $main_account,$main_token,$app_id,$sub_account,$sub_token,$voip_account,$sendType,$address;
  $rest = NULL;
  if ($sendType == 0)//xml方式
			$rest = new RESTAPI_XML($main_account,$main_token,$app_id,$address);
	else//json方式
			$rest = new RESTAPI_JSON($main_account,$main_token,$app_id,$address);
	// 调用云通讯平台的创建子账号,绑定您的子账号名称
	echo "Try to create a subaccount, binding to user $friendlyName <br/>";
    $result = $rest->CreateSubAccount($friendlyName);
    if($result == NULL ) {
        echo "result error!";
        break;
    }
    
    $data = "";
    if ($sendType == 0)
    {
    	// 解析xml
    	$data = simplexml_load_string(trim($result," \t\n\r"));
    }
    else
    {
    	// 解析json
    	$data = json_decode(trim($result," \t\n\r"));
    }
    
    if($data->statusCode !=0) {
        echo "error code :" . $data->statusCode . "<br/>";
        //TODO 添加错误处理逻辑
    } else {
        echo "create SubbAccount success<br/>";
        // 获取返回信息
        $subaccount = $data->SubAccount;
        echo "subAccountid:".$subaccount->subAccountSid."<br/>";
        echo "subToken:".$subaccount->subToken."<br/>";
        echo "dateCreated:".$subaccount->dateCreated."<br/>";
        echo "voipAccount:".$subaccount->voipAccount."<br/>";
        echo "voipPwd:".$subaccount->voipPwd."<br/>";
        //TODO 把云平台创建账号信息存储在您的服务器上.
        //TODO 添加成功处理逻辑 
    }	 
}

/**
 * 发送短信
 * @param to 短信接收端手机号码集合，用逗号分开
 * @param body 短信正文
 * @param msgType 消息类型。取值0（普通短信）、1（长短信），默认值 0 
 */
function test_sendSMS($to,$body,$msgType) {
	// 创建REST对象实例
  global $main_account,$main_token,$app_id,$sub_account,$sub_token,$voip_account,$sendType,$address;
  $rest = NULL;
  if ($sendType == 0)//xml方式
			$rest = new RESTAPI_XML($main_account,$main_token,$app_id,$address);
	else//json方式
			$rest = new RESTAPI_JSON($main_account,$main_token,$app_id,$address);
			
	// 发送短信
	 echo "Sending message to $to <br/>";
	 $result = $rest->SendSMS($to,$body,$msgType,$sub_account);
     if($result == NULL ) {
         echo "result error!";
         break;
     }
     
    $data = "";
    if ($sendType == 0)
    {
    	// 解析xml
    	$data = simplexml_load_string(trim($result," \t\n\r"));
    }
    else
    {
    	// 解析json
    	$data = json_decode(trim($result," \t\n\r"));
    } 
        
    if($data->statusCode!=0) {
         echo "error code :" . $data->statusCode . "<br>";
         //TODO 添加错误处理逻辑
     }else{
         echo "Sendind message success!<br/>";
         // 获取返回信息
         $smsmessage = $data->SMSMessage;
         echo "dateCreated:".$smsmessage->dateCreated."<br/>";
         echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
         //TODO 添加成功处理逻辑
     }
}

/**
 * 双向回呼
 * @param from 主叫电话号码。
 * @param to 被叫电话号码。
 */
function test_callBack($from,$to) 
{
        // 创建REST对象实例
        global $main_account,$main_token,$app_id,$sub_account,$sub_token,$voip_account,$sendType,$address;
        $rest = NULL;
        if ($sendType == 0)//xml方式
							$rest = new RESTAPI_XML($main_account,$main_token,$app_id,$address);
				else//json方式
							$rest = new RESTAPI_JSON($main_account,$main_token,$app_id,$address);
        // 调用回拨接口
        echo "Try to make a callback,called is $to <br/>";
        $result = $rest->CallBack($from,$to,$sub_account,$sub_token);
		print_r($result);
		exit;
        if($result == NULL ) {
            echo "result error!";
            break;
        }
                
        $data = "";
    		if ($sendType == 0)
    		{
    			// 解析xml
    			$data = simplexml_load_string(trim($result," \t\n\r"));
  		  }
  		  else
  		  {
    			// 解析json
    			$data = json_decode(trim($result," \t\n\r"));
   			}  
        
        if($data->statusCode!=0) {
            echo "error code :" . $data->statusCode . "<br>";
            //TODO data
        } else {
            echo "callback success!<br>";
            // 获取返回信息
            $callback = $data->CallBack;
            echo "callSid:".$callback->callSid."<br/>";
            echo "dateCreated:".$callback->dateCreated."<br/>";
           //TODO 添加成功处理逻辑 
        }        
}

//test_createSubAccount("子账户名称123");
test_callBack("01052823293","15503598151");
//test_sendSMS("短信接收端手机号码集合，用英文逗号分开","短信正文","消息类型");
?>
