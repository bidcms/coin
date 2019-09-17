<?php
/*
	[Bidcms.com!] (C)2009-2014 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author: limengqi
	$Id: common.simple.php 2010-08-24 10:42 $
*/
define('IN_BIDCMS',1);

date_default_timezone_set('Asia/Shanghai');
define('BIDCMS_CLIENT_SESSION','bidcms');
define('ROOT_PATH',str_replace('inc','',str_replace('\\','/',dirname(__FILE__))));
if(!is_file(ROOT_PATH.'/data/config.inc.php'))
{
	exit('config.inc.php is lost,Please <a href="install/index.php">install</a> it before using Bidcms.');
}
include ROOT_PATH.'/data/config.inc.php';


header("Content-type:text/html;charset=".$bidcmscharset);
if(!is_file(ROOT_PATH.'/data/cache/setting.php'))
{
	exit('setting.php is lost,Make sure "cache" directory has write permissions.');
}
include ROOT_PATH.'/data/cache/setting.php';
require(ROOT_PATH.'/inc/rep.inc.php');
require(ROOT_PATH.'/inc/session/session_operator_native.class.php');
require(ROOT_PATH.'/inc/global.func.php');
$session=new session_operator_native();
$session->session_start();
$setting=$content;
define('TPL_DIR',!empty($setting['site_template_dir'])?$setting['site_template_dir']:'default');
$_REQUEST=global_addslashes($_REQUEST);
$_GET=global_addslashes($_GET);
$_POST=global_addslashes($_POST);
$serverset = 'character_set_connection='.$bidcmsdbcharset.', character_set_results='.$bidcmsdbcharset.', character_set_client=binary';
$link=mysql_pconnect($bidcmsdbhost,$bidcmsdbuser,$bidcmsdbpw);
mysql_query('use '.$bidcmsdbname,$link);
$version=mysql_get_server_info($link);
$serverset .= $version> '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
$serverset && mysql_query("SET $serverset", $link);