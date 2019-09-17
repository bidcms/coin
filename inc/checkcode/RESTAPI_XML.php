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

/**
* 发起HTTPS请求
*/
function curl_postXML($url,$data,$header,$post=1)
{
     //初始化curl
     $ch = curl_init();
     //参数设置     
     $res= curl_setopt ($ch, CURLOPT_URL,$url);  
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt ($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_POST, $post);
	 if( $post)
     	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
     $result = curl_exec ($ch);
     //连接失败
	 if($result == FALSE){
		print curl_error($ch);
	 }
     curl_close($ch);
	 return $result;
}


class RESTAPI_XML{
	private $main_account;
	private $main_token;
	private $app_id;  
	private $batch;
	private $address;
	private $soft_version;
	function __construct($main_account,$main_token,$app_id,$address)	
	{
				$this->main_account = $main_account;
				$this->main_token = $main_token;
				$this->app_id = $app_id;
				$this->address = $address;
   			$this->soft_version = "2013-12-26";
	}

    /**
    * 创建子账户
    * @param friendlyName 子账户名称
    */
	function CreateSubAccount($friendlyName)
	{
        // 拼接请求包体
        $body="<SubAccount>
            	 		<appId>$this->app_id</appId>
							 		<friendlyName>$friendlyName</friendlyName>
						   </SubAccount>";
        // 大写的sig参数  
        $sig =  strtoupper(md5($this->main_account . $this->main_token . date("YmdHis")));
        // 生成请求URL
        $url="https://$this->address/$this->soft_version/Accounts/$this->main_account/SubAccounts?sig=$sig";
        // 生成授权：主账户Id + 英文冒号 + 时间戳。
        $authen = base64_encode($this->main_account . ":" . date("YmdHis"));
        // 生成包头 
        $header = array("Accept:application/xml","Content-Type:application/xml;charset=utf-8","Authorization:$authen");
        
        // 发送请求
				$result = curl_postXML($url,$body,$header);
				return $result;
	}

    /**
    * 双向回呼
    * @param from 主叫电话号码。
    * @param to 被叫电话号码。
    * @param sub_account 子账户Id
    * @param sub_token 子账户的授权令牌   
    */
	function CallBack($from,$to,$sub_account,$sub_token)
	{
    // 拼接请求包体
    		$body= "<CallBack>       
										<from>$from</from>
										<to>$to</to>
		  					</CallBack>"; 		  					          					
        // 大写的sig参数  
				$sig =  strtoupper(md5($sub_account . $sub_token . date("YmdHis")));
        // 生成请求URL
    		$url="https://$this->address/$this->soft_version/SubAccounts/$sub_account/Calls/Callback?sig=$sig";
        // 生成授权：子账户Id + 英文冒号 + 时间戳。 
				$authen=base64_encode($sub_account . ":" . date("YmdHis"));
        // 生成包头
				$header = array("Accept:application/xml","Content-Type:application/xml;charset=utf-8","Authorization:$authen");
        // 发送请求
				$result = curl_postXML($url,$body,$header);
        return $result;
	}
    
    /**
    * 发送短信
    * @param to 短信接收端手机号码集合,用逗号分开
    * @param body 短信正文
    * @param msgType 消息类型。取值0（普通短信）、1（长短信），默认值 0
    * @param sub_account 子账户Id
    */
	function SendSMS($to,$body,$msgType,$sub_account)
	{
        // 拼接请求包体
        $body="<SMSMessage>
										<to>$to</to> 
										<body>$body</body>
										<msgType>$msgType</msgType>
										<appId>$this->app_id</appId>
           				  <subAccountSid>$sub_account</subAccountSid>
							</SMSMessage>"; 				
        // 大写的sig参数 
        $sig =  strtoupper(md5($this->main_account . $this->main_token . date("YmdHis")));
        // 生成请求URL        
        $url="https://$this->address/$this->soft_version/Accounts/$this->main_account/SMS/Messages?sig=$sig";
        // 生成授权：主账户Id + 英文冒号 + 时间戳。
        $authen = base64_encode($this->main_account . ":" . date("YmdHis"));
        // 生成包头
        $header = array("Accept:application/xml","Content-Type:application/xml;charset=utf-8","Authorization:$authen");
        // 发送请求
        
        $result = curl_postXML($url,$body,$header);
        return $result;
	}
    
}
?>
