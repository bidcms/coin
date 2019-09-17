<?php
class bidcmsHttp
{
	function __construct($url,$cacert_url='')
	{
		$this->cacert_url=$cacert_url;
		$this->url=$url;
		$this->type='GET';
		$this->ssl=false;
		
	}
	function request()
	{
		if(function_exists('curl_init'))
		{
			$result=$this->curlExec($this->ssl);
		}
		else
		{
			$result=$this->sockExec($this->ssl);
		}
		return $result;
	}
	function curlExec($ssl)
	{
		$url=parse_url($this->url);
		$url1=$url['scheme']."://".$url['host'].$url['path'];
		$curl = curl_init($url1);
		if($ssl)
		{
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
			curl_setopt($curl, CURLOPT_CAINFO,$this->cacert_url);//证书地址
		}
		curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
		if($this->type=='POST')
		{
			
			curl_setopt($curl,CURLOPT_POST,true); // post传输数据
			curl_setopt($curl,CURLOPT_POSTFIELDS,$url['query']);// post传输数据
		}
		$responseText = curl_exec($curl);
		//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
		curl_close($curl);
		return $responseText;
	}
	function sockExec($ssl)
	{
		$timeout = 30;
		$url=parse_url($this->url);
		$context = stream_context_create();
		if($ssl)
		{
			stream_context_set_option($context, 'ssl', 'local_cert', $this->cacert_url);
			stream_context_set_option($context, 'ssl', 'passphrase', 'PEM');
			stream_context_set_option($context,'ssl','allow_self_signed',true); 
		}
		if(substr(phpversion(),0,1)>=5){
			$fp = stream_socket_client($url['host'].":80",$errno,$errstr,$timeout,STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,$context);
		}
		else{
			$fp = fsockopen($url['host'],80,$errno,$errstr,$timeout);
		}
		$responseText='';
		if ($fp) {
			$out = $this->type." ".$url['path']."?".$url['query']." ".strtoupper($url['scheme'])."/1.1\r\n";
			$out .= "Host: ".$url['host']."\r\n";
			$out .= "Connection: Close\r\n\r\n";
			fputs($fp, $out);
			while (!feof($fp)) {
				$responseText.=fgets($fp, 128);
			}
			fclose($fp);
		}
		preg_match("/Content-Length:.?(\d+)/", $responseText, $matches);
		$length = $matches[1];
		$responseText = substr($responseText, strlen($responseText) - $length);
		return $responseText;
	}
}