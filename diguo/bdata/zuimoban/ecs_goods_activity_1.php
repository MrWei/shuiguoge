<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_goods_activity`;");
E_C("CREATE TABLE `ecs_goods_activity` (
  `act_id` mediumint(8) unsigned NOT NULL auto_increment,
  `act_name` varchar(255) NOT NULL,
  `act_desc` text NOT NULL,
  `act_type` tinyint(3) unsigned NOT NULL,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `product_id` mediumint(8) unsigned NOT NULL default '0',
  `goods_name` varchar(255) NOT NULL,
  `start_time` int(10) unsigned NOT NULL,
  `end_time` int(10) unsigned NOT NULL,
  `is_finished` tinyint(3) unsigned NOT NULL,
  `ext_info` text NOT NULL,
  PRIMARY KEY  (`act_id`),
  KEY `act_name` (`act_name`,`act_type`,`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_goods_activity` values('1','双口USB充电器lfmartian测试商品','','1','1','0','双口USB充电器lfmartian测试商品','1388908800','1516867200','0','a:4:{s:12:\"price_ladder\";a:1:{i:0;a:2:{s:6:\"amount\";i:1;s:5:\"price\";d:100;}}s:15:\"restrict_amount\";i:10;s:13:\"gift_integral\";i:10;s:7:\"deposit\";d:10;}');");
E_D("replace into `ecs_goods_activity` values('2','001','001','2','2','0','Adiaos限量T恤（白色L）lfmartian测试商品','1388908800','1548835200','0','a:5:{s:7:\"deposit\";d:100;s:11:\"start_price\";d:10;s:9:\"end_price\";i:0;s:9:\"amplitude\";d:10;s:6:\"no_top\";i:1;}');");
E_D("replace into `ecs_goods_activity` values('3','000','0101','0','2','0','Adiaos限量T恤（白色L）lfmartian测试商品','1388992200','1485443400','0','a:4:{s:11:\"start_price\";s:4:\"1.00\";s:9:\"end_price\";s:6:\"800.00\";s:9:\"max_price\";s:2:\"10\";s:11:\"cost_points\";s:2:\"10\";}');");

require("../../inc/footer.php");
?>