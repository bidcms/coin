<?php
$dirname=str_replace('task','',dirname(__FILE__));
include $dirname."inc/common.mini.php";

$tt=array(3600,300,86400);
$coins['BID']='必得币';
//$coins['NTMC']='新时代币';

foreach($coins as $k=>$v)
{
	if(!in_array(strtolower($k),$pause))
	{
		$coinname=strtolower($k);
		foreach($exchange_coins as $key=>$val)
		{
			$ecoinname=strtolower($key);
			//一个买单
			$buys=mysql_fetch_assoc(mysql_query("select id,price,amount,uid,success,coinname,exchange_coin from bidcms_trade where tradetype=1 and status<2 and coinname='".$coinname."' and exchange_coin='".$ecoinname."' order by price desc,usertype asc"));
			$checkprice=$buys['price']>0;
			if($buys['uid']>0 && $checkprice && !empty($buys['coinname']) && !empty($buys['exchange_coin']))
			{
				//取出一个相应的卖单
				$sales=mysql_fetch_assoc(mysql_query("select id,price,amount,uid,success,coinname,exchange_coin from bidcms_trade where tradetype=2 and status<2 and price<=".$buys['price']." and coinname='".$buys['coinname']."' and exchange_coin='".$buys['exchange_coin']."' order by price asc,usertype desc,id asc"));
				//有符合的卖单
				if($sales['id']>0)
				{
					
					$coinname=$sales['coinname'];
					$amount=$buys['amount']<=$sales['amount']?$buys['amount']:$sales['amount'];
					//买单扣钱
					$buys_money=mysql_fetch_assoc(mysql_query("select id,balance_lock,balance from bidcms_balance where coinname='".$buys['exchange_coin']."' and uid=".$buys['uid']));
					//卖单扣币
					$sales_coins=mysql_fetch_assoc(mysql_query("select id,balance_lock,balance from bidcms_balance where coinname='".$coinname."' and uid=".$sales['uid']));
					
					$buys_cny=abs(round($buys['price']*$amount,6))-0.000001;
					if($buys_money['id']>0 && $buys_money['balance_lock']>=$buys_cny && $sales_coins['id']>0 && $sales_coins['balance_lock']>=$amount)
					{
						
						//扣买家款
						mysql_query("update bidcms_balance set balance_lock=balance_lock-".$buys_cny." where coinname='".$buys['exchange_coin']."' and uid=".$buys['uid']);
						//给买家付币
						$buys_coins=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where coinname='".$coinname."' and uid=".$buys['uid']));
						$realamount=round($amount*(1-$buy_scale[$coinname]),6);
						if($buys_coins['id']>0)
						{
							mysql_query("update bidcms_balance set balance=balance+".$realamount." where id=".$buys_coins['id']);
						}
						else
						{
							mysql_query("insert into bidcms_balance(uid,coinname,balance) values(".$buys['uid'].",'".$coinname."',".$realamount.")");
						}
						//扣卖家币
						mysql_query("update bidcms_balance set balance_lock=balance_lock-".$amount." where id=".$sales_coins['id']);
						//给卖家付款
						$sales_money=mysql_fetch_assoc(mysql_query("select id from bidcms_balance where coinname='".$buys['exchange_coin']."' and uid=".$sales['uid']));
						$sales_cny=round($amount*$sales['price']*(1-$sell_scale[$coinname]),6);
						if($sales_money['id']>0)
						{
							mysql_query("update bidcms_balance set balance=balance+".$sales_cny." where id=".$sales_money['id']);
						}
						else
						{
							mysql_query("insert into bidcms_balance(uid,coinname,balance) values(".$sales['uid'].",'".$buys['exchange_coin']."',".$sales_cny.")");
						}
						//更新状态
						if($buys['amount']<=$sales['amount'])
						{
							mysql_query("update bidcms_trade set amount=0,success=".$amount.",status=2 where id=".$buys['id']);
							mysql_query("update bidcms_trade set amount=amount-".$amount.",success=success+".$amount.",status=".($sales['amount']-$buys['amount']>0?1:2)." where id=".$sales['id']);
						}
						else
						{
							mysql_query("update bidcms_trade set amount=amount-".$amount.",success=success+".$amount.",status=1 where id=".$buys['id']);
							mysql_query("update bidcms_trade set amount=0,success=success+".$amount.",status=2 where id=".$sales['id']);
					
						}
						sendBid($buys['uid'],$coinname,$amount,$buys['price'],$ecoinname,$sales['uid']);
						sendBid($sales['uid'],$coinname,$amount,$sales['price'],$ecoinname,$buys['uid']);
						//详细成交记录
						mysql_query("insert into bidcms_history(coinname,exchange_coin,coin,price,updatetime,buyer_uid,seller_uid) values('".$coinname."','".$buys['exchange_coin']."',".$amount.",".$buys['price'].",".time().",".$buys['uid'].",".$sales['uid'].")");
						mysql_query("replace into bidcms_coinname(coinname,exchange_coin,price) values('".$coinname."','".$buys['exchange_coin']."',".$buys['price'].")");
					}
					else
					{
						echo $sales['uid'].'/'.$coinname.'/'.$buys_money['uid'].'/'.$buys_money['id'].'/'.$sales_coins['id'].'/'.$buys_money['balance_lock'].'/'.$buys_cny.'/'.$sales_coins['balance_lock'].'/'.$amount.'error<br/>';
					}
				}
			}
			mysql_query("insert into bidcms_success(coinname,exchange_coin,tradetype,volume,price,updatetime,uid) select coinname,exchange_coin,tradetype,success,price,".time().",uid from bidcms_trade where status=2");
			mysql_query("delete from bidcms_trade where status=2");
			if($coinname!=$ecoinname)
			{
				foreach($tt as $tk=>$tv)
				{
					$dt=$tv;
					$type=$tk;
					//写入或更新曲线图
					$minute=time()-time()%$dt;
					$r=mysql_fetch_assoc(mysql_query("select id from bidcms_timeline where difftime=".$minute." and coinname='".$coinname."' and exchange_coin='".$ecoinname."' and type=".$type));
					if($r['id']<1)
					{
						$t=mysql_fetch_assoc(mysql_query("select id,max(price) as mp,min(price) as minp,price,sum(volume) as total from bidcms_success where updatetime>".$minute." and updatetime<".($minute+$dt)." and coinname='".$coinname."' and exchange_coin='".$ecoinname."' order by id asc"));
						if($t['id']>0)
						{
							mysql_query("insert into bidcms_timeline(start,max_price,min_price,end,difftime,type,coinname,exchange_coin,total) values(".floatval($t['price']).",".floatval($t['mp']).",".floatval($t['minp']).",".floatval($t['price']).",".$minute.",".$type.",'".$coinname."','".$ecoinname."',".floatval($t['total']).")");
						}
					}
					else
					{
						$t=mysql_fetch_assoc(mysql_query("select max(price) as mp,min(price) as minp,sum(volume) as total from bidcms_success where updatetime>".$minute." and updatetime<".($minute+$dt)." and coinname='".$coinname."' and exchange_coin='".$ecoinname."'"));
						$e=mysql_fetch_assoc(mysql_query("select price from bidcms_success where updatetime>".$minute." and updatetime<".($minute+$dt)." and coinname='".$coinname."' and exchange_coin='".$ecoinname."' order by id desc"));
						mysql_query("update bidcms_timeline set max_price=".floatval($t['mp']).",min_price=".floatval($t['minp']).",total=".floatval($t['total']).",end=".floatval($e['price'])." where id=".$r['id']);
					}
				}
			}
		}
	}
}

//赠送bid币
function sendBid($uid,$coinname,$amount,$price,$ecoinname,$duid=0)
{
	global $bid_scale;
	$coinname=strtolower($coinname);
	if($coinname!='bid' && $duid>0)
	{
		$bids=isset($bid_scale[$ecoinname]) && $bid_scale[$ecoinname]>0?$bid_scale[$ecoinname]:0;
		if($uid>0 && $price>0 && $amount>0)
		{
			//奖励推荐人
			if($ecoinname=='cny')
			{
				$friend=mysql_fetch_assoc(mysql_query("select frienduid from bidcms_user where uid=".$uid));
				if($friend['frienduid']>0)
				{
					$cny=round($price*$amount*0.0001,6);
					mysql_query("update bidcms_balance set balance=balance+".$cny." where coinname='cny' and uid=".$friend['frienduid']);
				}
			}
			$s=floatval($price*$amount*$bids);
			//统计一天内总数
			$currtnetime=time()-time()%86400;
			$c=mysql_fetch_assoc(mysql_query("select sum(balance) as total from bidcms_bid_balance where updatetime>".$currtnetime));
			if($c['total']<10000)
			{
				mysql_query("insert into bidcms_bid_balance(uid,balance,response,updatetime) values(".$uid.",".$s.",'交易".$amount."个".$coinname."(".$ecoinname.")奖励',".time().")");
			}
		}
	}
}
?>