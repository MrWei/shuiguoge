<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_delivery_order`;");
E_C("CREATE TABLE `ecs_delivery_order` (
  `delivery_id` mediumint(8) unsigned NOT NULL auto_increment,
  `delivery_sn` varchar(20) NOT NULL,
  `order_sn` varchar(20) NOT NULL,
  `order_id` mediumint(8) unsigned NOT NULL default '0',
  `invoice_no` varchar(50) default NULL,
  `add_time` int(10) unsigned default '0',
  `shipping_id` tinyint(3) unsigned default '0',
  `shipping_name` varchar(120) default NULL,
  `user_id` mediumint(8) unsigned default '0',
  `action_user` varchar(30) default NULL,
  `consignee` varchar(60) default NULL,
  `address` varchar(250) default NULL,
  `country` smallint(5) unsigned default '0',
  `province` smallint(5) unsigned default '0',
  `city` smallint(5) unsigned default '0',
  `district` smallint(5) unsigned default '0',
  `sign_building` varchar(120) default NULL,
  `email` varchar(60) default NULL,
  `zipcode` varchar(60) default NULL,
  `tel` varchar(60) default NULL,
  `mobile` varchar(60) default NULL,
  `best_time` varchar(120) default NULL,
  `postscript` varchar(255) default NULL,
  `how_oos` varchar(120) default NULL,
  `insure_fee` decimal(10,2) unsigned default '0.00',
  `shipping_fee` decimal(10,2) unsigned default '0.00',
  `update_time` int(10) unsigned default '0',
  `suppliers_id` smallint(5) default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `agency_id` smallint(5) unsigned default '0',
  PRIMARY KEY  (`delivery_id`),
  KEY `user_id` (`user_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_delivery_order` values('2','20140314202456278','2014031461109','54','','1394770967','1','上门取货','1','sclzz','刘路','二环路西888号','1','2','52','501','','asdf@asdf.com','','028-87760898','13981750563','','','等待所有商品备齐后再发','0.00','0.00','1394771094','0','0','0');");
E_D("replace into `ecs_delivery_order` values('3','20140314202525074','2014031489993','53','','1394770877','1','上门取货','1','sclzz','刘路','北京 西城区 二环路西888号','1','2','52','501','','asdf@asdf.com','','028-87760898','13981750563','','','等待所有商品备齐后再发','0.00','0.00','1394771142','0','0','0');");
E_D("replace into `ecs_delivery_order` values('4','20140322191646593','2014032283144','75','','1395458140','1','上门取货','1','sclzz','刘路','北京 西城区 二环路西888号','1','2','52','501','','asdf@asdf.com','','028-87760898','13981750563','','','等待所有商品备齐后再发','0.00','0.00','1395458165','0','0','0');");
E_D("replace into `ecs_delivery_order` values('5','20140425225283653','2014042510546','319','768557902737','1398408677','2','申通快递','1','sclzz','刘路','北京 西城区 二环路西888号','1','2','52','501','','asdf@asdf.com','','028-87760898','13981750563','','','等待所有商品备齐后再发','0.00','0.00','1398408728','0','0','0');");

require("../../inc/footer.php");
?>