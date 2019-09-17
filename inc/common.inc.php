<?php
/*
	[Bidcms.com!] (C)2009-2014 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author: limengqi
	$Id: common.inc.php 2010-08-24 10:42 $
*/
date_default_timezone_set("Asia/Shanghai");
define('ROOT_PATH',str_replace('\\','/',substr(dirname(__FILE__),0,-3)));
define('IN_BIDCMS',1);
define('VERSION','BidCms_WeiXin_1.1');
define('BIDCMS_CLIENT_SESSION','bidcms');

if(!is_file(ROOT_PATH.'/data/config.inc.php'))
{
	exit('config.inc.php is lost,Please <a href="install/index.php">install</a> it before using Bidcms.');
}
require(ROOT_PATH.'/data/config.inc.php');

header("Content-type:text/html;charset=".$bidcmscharset);
if(PHP_VERSION < '4.1.0') {
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}
if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])) {
	exit('Request tainting attempted.');
}
require(ROOT_PATH.'/inc/mysql.class.php');

require(ROOT_PATH.'/inc/rep.inc.php');
require(ROOT_PATH.'/inc/global.func.php');
$_REQUEST=global_addslashes($_REQUEST);
$_GET=global_addslashes($_GET);
$_POST=global_addslashes($_POST);
//初始化数据连接
$db=new bidcms_mysql();
$db->connect($bidcmsdbhost,$bidcmsdbuser,$bidcmsdbpw,$bidcmsdbname);
require(ROOT_PATH.'/inc/session/session_operator_native.class.php');
$session=new session_operator_native();
$session->session_start();
if(!checkfile('setting',0))
{
	$query=$db->query('select variable,content from '.tname('setting'));
	while($rows=$db->fetch_array($query))
	{
		$setting[$rows['variable']]=$rows['content'];
	}
	write('setting',$setting);
}
else
{
	$setting=read('setting');
}
if(!is_file(ROOT_PATH.'/data/cache/setting.php'))
{
	exit('setting.php is lost,Make sure "cache" directory has write permissions.');
}
define('ADMIN_DIR',!empty($setting["adminpath"])?$setting["adminpath"]:'admin');
define('TPL_DIR',!empty($setting['site_template_dir'])?$setting['site_template_dir']:'default');
define('INDEX',!empty($setting['index_file'])?$setting['index_file']:'index.php');
define('SITE_ROOT',$GLOBALS['setting']['site_url']);
require(ROOT_PATH.'/inc/sql.inc.php');
require(ROOT_PATH.'/inc/page.class.php');
require(ROOT_PATH.'/inc/cache.inc.php');