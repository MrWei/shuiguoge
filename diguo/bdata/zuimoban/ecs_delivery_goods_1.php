<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_delivery_goods`;");
E_C("CREATE TABLE `ecs_delivery_goods` (
  `rec_id` mediumint(8) unsigned NOT NULL auto_increment,
  `delivery_id` mediumint(8) unsigned NOT NULL default '0',
  `goods_id` mediumint(8) unsigned NOT NULL default '0',
  `product_id` mediumint(8) unsigned default '0',
  `product_sn` varchar(60) default NULL,
  `goods_name` varchar(120) default NULL,
  `brand_name` varchar(60) default NULL,
  `goods_sn` varchar(60) default NULL,
  `is_real` tinyint(1) unsigned default '0',
  `extension_code` varchar(30) default NULL,
  `parent_id` mediumint(8) unsigned default '0',
  `send_number` smallint(5) unsigned default '0',
  `goods_attr` text,
  PRIMARY KEY  (`rec_id`),
  KEY `delivery_id` (`delivery_id`,`goods_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_delivery_goods` values('2','2','10','0','','红米手机','小米','ECS000010','1','','0','1','');");
E_D("replace into `ecs_delivery_goods` values('3','3','10','0','','红米手机','小米','ECS000010','1','','0','1','');");
E_D("replace into `ecs_delivery_goods` values('4','4','9','0','','小米手机3','小米','ECS000009','1','','0','1','');");
E_D("replace into `ecs_delivery_goods` values('5','5','9','0','','小米手机3','小米','ECS000009','1','','0','1','');");

require("../../inc/footer.php");
?>