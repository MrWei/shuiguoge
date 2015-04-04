<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_brand`;");
E_C("CREATE TABLE `ecs_brand` (
  `brand_id` smallint(5) unsigned NOT NULL auto_increment,
  `brand_name` varchar(60) NOT NULL default '',
  `brand_logo` varchar(80) NOT NULL default '',
  `brand_desc` text NOT NULL,
  `site_url` varchar(255) NOT NULL default '',
  `sort_order` tinyint(3) unsigned NOT NULL default '50',
  `is_show` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`brand_id`),
  KEY `is_show` (`is_show`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_brand` values('1','小米','1397811674628637833.jpg','','http://www.xiaomi.com','50','1');");
E_D("replace into `ecs_brand` values('2','三星','','三星三星','http://xiaomi.codes5.com','50','1');");
E_D("replace into `ecs_brand` values('3','苹果','','苹果苹果苹果','http://xiaomi.codes5.com','50','1');");

require("../../inc/footer.php");
?>