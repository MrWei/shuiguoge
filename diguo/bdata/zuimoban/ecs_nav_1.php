<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_nav`;");
E_C("CREATE TABLE `ecs_nav` (
  `id` mediumint(8) NOT NULL auto_increment,
  `ctype` varchar(10) default NULL,
  `cid` smallint(5) unsigned default NULL,
  `name` varchar(255) NOT NULL,
  `ifshow` tinyint(1) NOT NULL,
  `vieworder` tinyint(1) NOT NULL,
  `opennew` tinyint(1) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `ifshow` (`ifshow`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_nav` values('1','','0','免责条款','1','1','0','#','bottom');");
E_D("replace into `ecs_nav` values('2','','0','隐私保护','1','2','0','#','bottom');");
E_D("replace into `ecs_nav` values('3','','0','咨询热点 ','1','3','0','#','bottom');");
E_D("replace into `ecs_nav` values('4','','0','联系我们','1','4','0','#','bottom');");
E_D("replace into `ecs_nav` values('5','','0','公司简介','1','5','0','#','bottom');");
E_D("replace into `ecs_nav` values('6','','0','批发方案','1','6','0','#','bottom');");
E_D("replace into `ecs_nav` values('7','','0','配送方式','1','7','0','#','bottom');");
E_D("replace into `ecs_nav` values('8','c','1','小米手机','1','2','0','category.php?id=1','middle');");
E_D("replace into `ecs_nav` values('9','c','5','配件','1','4','0','category.php?id=5','middle');");
E_D("replace into `ecs_nav` values('10','c','6','手机外壳','1','6','0','category.php?id=6','middle');");
E_D("replace into `ecs_nav` values('11','c','7','软件','1','8','0','category.php?id=7','middle');");
E_D("replace into `ecs_nav` values('12','c','8','贴纸','1','10','0','category.php?id=8','middle');");
E_D("replace into `ecs_nav` values('13','','0','积分商城','1','11','0','exchange.php','middle');");
E_D("replace into `ecs_nav` values('14','','0','留言板','1','12','0','message.php','middle');");
E_D("replace into `ecs_nav` values('15','','0','WAP手机版','1','127','1','/mobile/','middle');");

require("../../inc/footer.php");
?>