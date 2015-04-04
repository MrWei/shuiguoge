<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_sessions`;");
E_C("CREATE TABLE `ecs_sessions` (
  `sesskey` char(32) character set utf8 collate utf8_bin NOT NULL default '',
  `expiry` int(10) unsigned NOT NULL default '0',
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `adminid` mediumint(8) unsigned NOT NULL default '0',
  `ip` char(15) NOT NULL default '',
  `user_name` varchar(60) NOT NULL,
  `user_rank` tinyint(3) NOT NULL,
  `discount` decimal(3,2) NOT NULL,
  `email` varchar(60) NOT NULL,
  `data` char(255) NOT NULL default '',
  PRIMARY KEY  (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `ecs_sessions` values('a1d735009fb739351d0b66b850412bd2','1405305181','0','0','192.168.1.100','0','0','1.00','0','a:0:{}');");
E_D("replace into `ecs_sessions` values('cb5d9ccf26585cb59365a51d7a56246a','1405306447','0','1','127.0.0.1','0','0','0.00','0','a:4:{s:10:\"admin_name\";s:5:\"admin\";s:11:\"action_list\";s:3:\"all\";s:10:\"last_check\";i:1405277523;s:12:\"suppliers_id\";s:1:\"0\";}');");
E_D("replace into `ecs_sessions` values('7605f5aa91c94d83d8090f360728a5f8','1405305181','0','0','192.168.1.100','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('d924d1e4f3771eaa90b262587d60880d','1405306387','0','0','127.0.0.1','0','0','1.00','0','a:4:{s:7:\"from_ad\";i:24;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;s:12:\"captcha_word\";s:16:\"MDk3MzhhMmM3Mw==\";}');");
E_D("replace into `ecs_sessions` values('f128cc5fa0f5c7e611705d5fc2dc5ae1','1405305123','0','0','127.0.0.1','0','0','1.00','0','a:0:{}');");
E_D("replace into `ecs_sessions` values('10859419eeb89a63a5ac04e637676372','1405306421','0','0','127.0.0.1','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");

require("../../inc/footer.php");
?>