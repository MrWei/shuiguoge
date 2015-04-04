<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_cfg`;");
E_C("CREATE TABLE `ecs_weixin_cfg` (
  `cfg_id` int(3) unsigned NOT NULL auto_increment,
  `cfg_name` varchar(64) NOT NULL default '',
  `cfg_value` varchar(100) NOT NULL,
  `autoload` varchar(20) NOT NULL default 'yes',
  PRIMARY KEY  (`cfg_id`),
  UNIQUE KEY `cfg_name` (`cfg_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_cfg` values('1','murl','mobile/','yes');");
E_D("replace into `ecs_weixin_cfg` values('2','baseurl','http://xiaomi.codes5.com/','yes');");

require("../../inc/footer.php");
?>