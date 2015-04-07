<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_weixin_menu`;");
E_C("CREATE TABLE `ecs_weixin_menu` (
  `cat_id` smallint(5) NOT NULL auto_increment,
  `cat_name` varchar(255) NOT NULL default '',
  `cat_type` tinyint(1) unsigned NOT NULL default '1',
  `keywords` varchar(255) NOT NULL default '',
  `weixin_key` varchar(255) NOT NULL default '',
  `links` varchar(255) NOT NULL default '',
  `sort_order` tinyint(3) unsigned NOT NULL default '50',
  `weixin_type` tinyint(1) unsigned NOT NULL default '0',
  `parent_id` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_type` (`cat_type`),
  KEY `sort_order` (`sort_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_weixin_menu` values('43','热卖商品','1','','hot','','50','0','38');");
E_D("replace into `ecs_weixin_menu` values('44','促销活动','1','','promote','','50','0','38');");
E_D("replace into `ecs_weixin_menu` values('38','商品信息','1','','shop','','1','0','0');");
E_D("replace into `ecs_weixin_menu` values('39','会员功能','1','','member','http://www.mrfruit.net','2','0','0');");
E_D("replace into `ecs_weixin_menu` values('40','更多..','1','','more','','3','0','0');");
E_D("replace into `ecs_weixin_menu` values('41','新品上市','1','','new','','50','0','38');");
E_D("replace into `ecs_weixin_menu` values('42','精品推荐','1','','best','','50','0','38');");
E_D("replace into `ecs_weixin_menu` values('46','重新绑定','1','','cxbd','','5','0','39');");
E_D("replace into `ecs_weixin_menu` values('47','会员中心','1','','member','','4','0','39');");
E_D("replace into `ecs_weixin_menu` values('48','帮助','1','帮助','help','','3','0','40');");
E_D("replace into `ecs_weixin_menu` values('49','首页','1','','','http://xiaomi.codes5.com','2','1','40');");
E_D("replace into `ecs_weixin_menu` values('50','图文消息','1','','图文消息','','4','0','40');");
E_D("replace into `ecs_weixin_menu` values('51','文本消息','1','','文本消息','','5','0','40');");
E_D("replace into `ecs_weixin_menu` values('52','订单查询','1','','ddcx','','2','0','39');");
E_D("replace into `ecs_weixin_menu` values('53','快递查询','1','','kdcx','','3','0','39');");
E_D("replace into `ecs_weixin_menu` values('54','帐户资金','1','','jfcx','','1','0','39');");
E_D("replace into `ecs_weixin_menu` values('55','签到','1','','qiandao','','1','0','40');");

require("../../inc/footer.php");
?>