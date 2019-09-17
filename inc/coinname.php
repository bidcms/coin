<?php
/*
	[Bidcms.com!] (C)2009-2014 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author: limengqi
	$Id: common.simple.php 2010-08-24 10:42 $
*/
$c=$coins;
$c['BID']='必得币';
$current_coin=strtoupper(!empty($_GET['bidcms_trade_coin_name']) && in_array(strtoupper($_GET['bidcms_trade_coin_name']),array_keys($c))?$_GET['bidcms_trade_coin_name']:$defaultcoin);
$current_ecoin=strtoupper(!empty($_GET['bidcms_exchange_coin_name']) && in_array(strtoupper($_GET['bidcms_exchange_coin_name']),array_keys($exchange_coins))?$_GET['bidcms_exchange_coin_name']:$defaultecoin);
$current_ecoin=$current_ecoin!=$current_coin && $current_coin!='BID'?$current_ecoin:'CNY';
